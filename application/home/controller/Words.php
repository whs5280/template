<?php
namespace app\home\controller;
use app\common\model\WordsModel;
use think\Db;

class Words extends Base
{

    public function details()
    {
        $id = input('param.id');

        $words_model = new WordsModel();
        $words = $words_model->getWordsDetailsById($id);
        $data = [];
        if($words){
            $data = [
                'id'    => $words['id'],
                'author'    => $words['author'],
                'title' => $words['title'],
                'remark'    => $words['remark'],
                'category_id'   => $words['category_id'],
                'category_name' => $words['category_name'],
                'likes_count'   =>  $words['likes_count'],
                'cover_img' =>  return_http_url($words['cover_img']),
                'video' => '',
                'vide_img'  => '',
                'img'   =>  [],
                'create_time'   =>  $words['create_time']
            ];
            if(count($words['details']) > 0){//作品有内容(图片、视频)
                foreach ($words['details'] as $details) {
                    if($details['type'] == config('code.words_detail_type')['img']) {
                        $data['img'][] = return_http_url($details['img_path']);
                    } else if($details['type'] == config('code.words_detail_type')['video']) {
                        $data['video'] = return_http_url($details['video_path']);
                        $data['vide_img'] = return_http_url($details['img_path']);
                    }
                }
            }
        }


        //$up = Db::name('article')->where('views !=0 AND id <' . $id)->order('id desc')->limit(1)->find();
        //$down = Db::name('article')->where('views !=0 AND id >' . $id)->order('id')->limit(1)->find();
        $this->assign('detail',$data);
        //$this->assign('up',$up);
        //$this->assign('down',$down);
        return $this->fetch();
    }

}
