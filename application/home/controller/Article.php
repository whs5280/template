<?php
namespace app\home\controller;
use app\home\model\IndexModel;
use think\Db;

class Article extends Base
{

    public function index(){

        $key = input('key');

        $cate_id = input('param.cate_id');

        $map = [];
        if($key&&$key!==""){
            $map['title'] = ['like',"%" . $key . "%"];          
        }
        if($cate_id&&$cate_id!==""){
            $map['think_article.cate_id'] = $cate_id;         
        }
            
        $nowpage = input('get.page') ? input('get.page'):1;
        $limits = 5;// 获取总条数
        $article = new IndexModel();
        $count = $article->getByCount($map);//计算总页面
        $allpage = intval(ceil($count / $limits));     
        $lists = $article->getArticleByWhere($map, $nowpage, $limits);
        if($lists){
            foreach ($lists as &$v){
                if($v['photo']){
                    $photo = explode(',',$v['photo']);
                    //ln -s /var/www/Upload/box/test/ /var/www/box_1003/public/box
                    //目录映射
                    $v['photo'] = return_http_url('box/'.$photo[0]);
                }
                $v['url'] = return_http_url('home/detail?id='.$v['id']);
            }
        }

        $this->assign('nowpage', $nowpage); //当前页
        $this->assign('allpage', $allpage); //总页数
        $this->assign('val', $key);
        $this->assign('lists', $lists);
        return $this->fetch();
    }

    public function test(){

        $cate_id = input('param.cate_id');

        $map = [];
        if($cate_id&&$cate_id!==""){
            $map['think_article.cate_id'] = $cate_id;
        }

        $nowpage = input('get.page') ? input('get.page'):1;
        $limits = 2;// 获取总条数
        $article = new IndexModel();
        $count = $article->getByCount($map);//计算总页面
        $allpage = intval(ceil($count / $limits));
        $lists = $article->getArticleByWhere($map, $nowpage, $limits);
        if($lists){
            foreach ($lists as &$v){
                if($v['photo']){
                    $photo = explode(',',$v['photo']);
                    //ln -s /var/www/Upload/box/test/ /var/www/box_1003/public/box
                    //目录映射
                    $v['photo'] = return_http_url('box/img/'.$photo[0]);
                }
                $v['url'] = return_http_url('home/detail?id='.$v['id']);
            }
        }
        //获取分类
        $articleCate_model = db('article_cate');
        $cateList = $articleCate_model->where('status',1)->column('name','id');

        $this->assign('nowpage', $nowpage); //当前页
        $this->assign('allpage', $allpage); //总页数
        $this->assign('cate_id', $cate_id);
        $this->assign('lists', $lists);
        $this->assign('cateList', $cateList);
        return $this->fetch();
    }
    public function test1(){
        $key = input('key');

        $cate_id = input('param.cate_id');

        $map = [];
        if($key&&$key!==""){
            $map['title'] = ['like',"%" . $key . "%"];
        }
        if($cate_id&&$cate_id!==""){
            $map['think_article.cate_id'] = $cate_id;
        }

        $nowpage = input('get.page') ? input('get.page'):1;
        $limits = 20;// 获取总条数
        $article = new IndexModel();
        $count = $article->getByCount($map);//计算总页面
        $allpage = intval(ceil($count / $limits));
        $lists = $article->getArticleByWhere($map, $nowpage, $limits);
        if($lists){
            foreach ($lists as &$v){
                if($v['photo']){
                    $photo = explode(',',$v['photo']);
                    //ln -s /var/www/Upload/box/test/ /var/www/box_1003/public/box
                    //目录映射
                    $v['photo'] = return_http_url('box/img/'.$photo[0]);
                }
                $v['url'] = return_http_url('home/detail?id='.$v['id']);
            }
        }

        $this->assign('nowpage', $nowpage); //当前页
        $this->assign('allpage', $allpage); //总页数
        $this->assign('val', $key);
        $this->assign('lists', $lists);
        return $this->fetch();
    }

    public function getArticlePhotos(){
        $id = input('id');
        $article_model = db('article');
        $data = $article_model->where('id',$id)->find();
        if(!$data){
            return json(['code'=>0,'msg'=>'数据丢失']);
        }
        $photo = explode(',',$data['photo']);
        $src = [];
        foreach ($photo as $v){
            $tem['src'] = return_http_url("box/img/".$v);
            $tem['title'] = $data['title'];
            $src[] = $tem;
        }
        return json(['code'=>1,'msg'=>'','data'=>$src]);
    }
}
