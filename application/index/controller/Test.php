<?php
namespace app\index\controller;
use app\admin\model\DeviceTypeModel;
use app\index\model\ProductModel;
use app\index\model\ProductGroupModel;
use app\index\model\ProductTetailedModel;
use app\index\model\ProChildTetaModel;
use app\index\model\DeviceModel;
use app\index\model\ProStoModel;

use think\Controller;

class Test extends Controller
{
    public function index()
    {
        $productModel = new ProductModel();
        $productGroupModel = new ProductGroupModel();
        $deviceModel = new DeviceModel();
        $ProStoModel  = new ProStoModel();

        $key = input('key');
        $where = [];
        if($key&&$key!=="")
        {
            $where['name'] = ['like',"%" . $key . "%"];
        }

        $id = input('param.id');
        $device_id = input('param.device_id',0);
        $deviceData = $deviceModel -> where('device_id',$device_id) -> find();
        $where['pro_pri.uid'] = $deviceData['uid'];
        $where['pro_pri.state'] = 0;
        $where['pro_pri.is_del'] = 0;
        if (isset($id) && !empty($id) && is_numeric($id)) {
            $where['pro_pri.group_id'] = $id;
        }
        $data = [];
        $list = $ProStoModel
            ->alias('pro_pri')
            ->field('pro_pri.*,p.id,p.brand_id,p.group_id,p.name,p.sort,p.pro_img,pro_price')
            ->join('think_product p','pro_pri.product_id = p.id','LEFT')
            -> where($where)
            -> select();;
        if ($list) {
            $data = $list;
        }
        $cateWhere['state'] = 0;
        $cateWhere['is_del'] = 0;
        $cate = $productGroupModel -> where($cateWhere) -> select();
        $this -> assign('cate',$cate);
        $this-> assign('data',json_encode($data));
        $this->assign('id',$id);
        $this->assign('device_id',$device_id);
        $this->assign('val', $key);

        return $this->fetch();
    }

	public function getProductList() {
        if(request()->isAjax()){
            $productModel = new ProductModel();
            $id = input('param.id');
            $where = [
                'state' => 0,
                'is_del' => 0,
                'group_id' => $id
            ];
            if($id){
                $productList = $productModel ->where($where)->select();
                if($productList){
                    return json(['code'=>1,'datas'=>$productList,'msg'=>'获取成功']);
                }
            }else{
                $proWhere['state'] = 0;
                $proWhere['is_del'] = 0;
                $productList = $productModel -> where($proWhere)->select();
                if($productList){
                    return json(['code'=>1,'datas'=>$productList,'msg'=>'获取成功']);
                }
            }
        }
	}

	public function proDesc()
    {
        $proModel = new ProductModel();
        $proTetaModel = new ProductTetailedModel();
        $proChildTetaModel = new ProChildTetaModel();
        $deviceModel = new DeviceModel();
        $productGroupModel = new ProductGroupModel();
        $id = input('param.id');

        $device_id = input('param.device_id',0);
        $deviceData = $deviceModel -> where('device_id',$device_id) -> find();
//        $where['p_c_t.uid'] = $deviceData['uid'];
        $where = [
            'p_c_t.product_id' => $id,
            'p_c_t.state' => 0,
            'p_c_t.uid' => $deviceData['uid']
        ];
        $proTetaList = $proChildTetaModel
            -> where($where)
            ->alias('p_c_t')
            ->field('p_c_t.*,p_c_t.product_id ppid,pro_teta.product_id pid,pro_teta.pro_name,pro_teta.group_id,pro_teta.brand_id,pro_teta.img,pro_teta.imgs,pro_teta.remark,pro_teta.material,pro_teta.spec')
            ->join('think_product_tetailed pro_teta','p_c_t.pro_teta_id = pro_teta.id','LEFT')
            ->select();
        if($proTetaList){
            foreach ($proTetaList as &$item){
                $item['name'] = $proModel -> where('id',$item['product_id']) -> field('name')->find();
                $item['group_name'] = $productGroupModel -> where('id',$item['group_id']) -> field('group_name')->find();
            }
        }
        $proData = $proModel -> where('id',$id) -> find();
        $proData['video_path'] = return_http_url($proData['video_path']);

        $this ->assign('data',$proTetaList);
        $this -> assign('proData',$proData);
        return $this->fetch();
    }

    public function getOnePro(){
        if(request()->isAjax()){
            $proModel = new ProductModel();
            $id = input('param.id');

            $proData = $proModel -> where('id',$id) -> find();

            return json(['code'=>1,'data'=>return_http_url($proData['pro_img'])]);
        }
    }

    //
    public function getOneProVideo(){
        if(request()->isAjax()){
            $proModel = new ProductModel();
            $id = input('param.id');

            $proData = $proModel -> where('id',$id) -> find();

            return json(['code'=>1,'data'=>return_http_url($proData['video_path'])]);
        }
    }

    //
    public function getOneProTeta(){
        if(request()->isAjax()){
            $proTetaModel = new ProductTetailedModel();
            $proChildTetaModel = new ProChildTetaModel();
            $deviceTypeModel = new DeviceTypeModel();
            $param = input('param.');
            $deviceData = $deviceTypeModel->where('device_id',$param['device_id'])->find();
            $proChildTetaData = $proChildTetaModel->where('id',$param['id'])->where('uid',$deviceData['uid'])->find();
            $proTetaData = $proTetaModel->where('id',$proChildTetaData['pro_teta_id'])->find();

            $imgArr = explode(',',$proTetaData['imgs']);
            $imgArrs['path'] = '';
            if($imgArr){
                foreach ($imgArr as $k => $val){
                    $imgArrs['path'] .= return_http_url($val).',';
                }
            }
            return json(['code'=>1,'data'=>rtrim($imgArrs['path'],',')]);
        }
    }
}
