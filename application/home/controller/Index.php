<?php
namespace app\home\controller;
use app\common\model\WordsModel;
use app\home\model\IndexModel;
use think\Db;

class Index extends Base
{

    public function index(){

        /*$key = input('key');

        $cate_id = input('param.cate_id');

        $map = [];

        if($key && $key !== ""){
            $map['title'] = ['like',"%" . $key . "%"];          
        }

        if($cate_id&&$cate_id!==""){
            $map['category_id'] = $cate_id;
        }
            
        $nowpage = input('get.page') ? input('get.page') : 1;
        $limits = config('home.paginate')['list_rows'];// 获取总条数
        $words_model = new WordsModel();
        $count = $words_model->getWordsCountByCondit($map);//计算总页面
        $allpage = intval(ceil($count / $limits));     
        $words = $words_model->getWordsByCondit($map, $nowpage, $limits);
        if($words) {
            foreach ($words as $item) {
                $temp = [
                    'id'    => $item['id'],
                    'title' => $item['title'],
                    'remark' => $item['remark'],
                    'author' => $item['author'],
                    'category_name' => $item['category_name'],
                    'likes_count'   =>  $item['likes_count'],
                    'cover_img' =>  return_http_url($item['cover_img']),
                    'video' => '',
                    'vide_img'  => '',
                    'create_time'   =>  $item['create_time']
                ];

                if(count($item['details']) > 0){//作品有内容(图片、视频)
                    foreach ($item['details'] as $details) {
                        if($details['type'] == config('code.words_detail_type')['video']) {
                            $temp['video'] = return_http_url($details['video_path']);
                            $temp['vide_img'] = return_http_url($details['img_path']);
                        }
                    }
                }
                $words_data[] = $temp;
            }
        }

        $this->assign('nowpage', $nowpage); //当前页
        $this->assign('allpage', $allpage); //总页数
        $this->assign('val', $key);
        $this->assign('lists', $words_data);*/
        return $this->fetch();
    }

}
