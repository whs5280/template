<?php

namespace app\common\model;
use think\Model;
use think\Db;

class CommentModel extends Model
{
    //定义model表名
    protected $name = 'comment';

    /**
     * 根据条件获取一条评论
     * @param array $where
     * @return array|false|\PDOStatement|string|Model
     */
    public function getOneComment ($where = []) {
        return $this->where($where)->find();
    }

    /**
     * 插入一条评论
     * @param array $data
     * @return false|int
     */
    public function addComment ($data = []) {
        return $this->allowField(true)->save($data);
    }

    /**
     * 指定某条评论zan_count+1
     * @param $comment_id
     * @return int|true
     */
    public function addZanCount($comment_id) {
        return $this->where('id',$comment_id)->setInc('zan_count',1);
    }

    /**
     * 指定某条评论zan_count-1
     * @param $comment_id
     * @return int|true
     */
    public function reduceZanCount($comment_id) {
        return $this->where('id',$comment_id)->setDec('zan_count',1);
    }

    /**
     * 根据条件软删除评论
     * @param array $where
     * @return false|int
     */
    public function softDelComment($where= []) {
        $data['is_del'] = config('code.is_del')['yes'];
        return $this->save($data,$where);
    }

    /**
     * 获取指定作品的评论的总数
     * @param $words_id
     * @return mixed
     */
    public function getCommentsCountByWordsId ($words_id, $curr_user_id) {
        $where['Comment.is_del'] = config('code.is_del')['no'];
        $where['Comment.words_id'] = $words_id;
        $where1['Comment.audit_status'] = config('code.comment_audit_status')['pass'];
        $whereOr['Comment.user_id'] = $curr_user_id;
        $result = $this->view('Comment','*')
            ->view('User',['nickname','head_img'],'User.id=Comment.user_id')
            ->where($where)
            ->where(function($query)use($where1,$whereOr){
                //当前用户能看见自己未被审核和被拒绝的评论
                $query->where($where1)
                    ->whereOr($whereOr);
            })
            ->count();
        return $result;
    }
    /**
     * 分页获取指定作品的评论
     * @param $words_id
     * @param $page
     * @param $size
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function getCommentsByWordsId($words_id, $curr_user_id, $page, $size) {
        $where['Comment.is_del'] = config('code.is_del')['no'];
        $where['Comment.words_id'] = $words_id;
        $where1['Comment.audit_status'] = config('code.comment_audit_status')['pass'];
        $whereOr['Comment.user_id'] = $curr_user_id;
        $result = $this->view('Comment','*')
            ->view('User',['nickname','head_img'],'User.id=Comment.user_id')
            ->view(['think_user'=>'TUser'],['IFNULL(TUser.nickname,"")'=>'to_nickname'],'TUser.id=Comment.to_user_id','LEFT')
            ->view(['think_comment'=>'PComment'],['IFNULL(PComment.content,"")'=>'to_content', 'IFNULL(PComment.is_del,"")'=>'parent_is_del'],'PComment.id=Comment.parent_id','LEFT')
            ->where($where)
            ->where(function($query)use($where1,$whereOr){
                //当前用户能看见自己未被审核和被拒绝的评论
                $query->where($where1)
                ->whereOr($whereOr);
            })
            ->order('Comment.create_time DESC')
            ->page($page, $size)
            ->select();
        return $result;
    }


    /**
     * 获取与指定用户相关的评论总数
     * @param $user_id  用户ID
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function getCommentCountByUser ($user_id) {
        $wordsOn = "Comment.words_id=Words.id";
        $userOn = "Comment.user_id=User.id";

        $where['Words.user_id'] = $user_id;
        $whereOr['Comment.to_user_id'] = $user_id;

        $result = $this->view('Comment','*')
            ->view('Words','*',$wordsOn)
            ->view('User','*',$userOn)
            ->where($where)
            ->whereOr($whereOr)
            ->count();
        return $result;
    }
    /**
     * 获取与指定用户相关的评论
     * @param $user_id  用户ID
     * @param $page
     * @param $size
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function getCommentByUser ($user_id, $page, $size) {
        $wordsOn = "Comment.words_id=Words.id";
        $userOn = "Comment.user_id=User.id";

        $where['Words.user_id'] = $user_id;
        $whereOr['Comment.to_user_id'] = $user_id;

        $result = $this->view('Comment',['id'=>'comment_id','words_id', 'user_id','content','is_del'=>'comment_is_del','create_time','type'])
            ->view('Words','cover_img',$wordsOn)
            ->view('User',['nickname','head_img','is_del'=>'user_is_del','status'=>'user_status'],$userOn)
            ->where($where)
            ->whereOr($whereOr)
            ->order('Comment.create_time DESC')
            ->page($page, $size)
            ->select();
        return $result;
    }

    /**
     * 修改封面图链接-获取器
     * @param $value
     */
    public function getCoverImgAttr ($value) {
        return return_http_url($value);
    }
    /**
     * 修改头像链接-获取器
     */
    public function getHeadImgAttr ($value) {
        return return_http_url($value);
    }
}