<?php

namespace app\common\model;
use think\Model;
use think\Db;

class CommentZanModel extends Model
{
    //定义model表名
    protected $name = 'comment_zan';

    public function getOneCommentZan ($where = []) {
        return $this->where($where)->find();
    }

    /**
     * 添加一条点赞
     * @param array $data
     * @return false|int
     */
    public function addCommentZan ($data = []) {
        return $this->allowField(true)->save($data);
    }

    /**
     * 根据条件删除一条点赞
     * @param $id
     * @return int
     */
    public function delCommentZanByCondit ($where = []) {
        return $this->where($where)->delete();
    }

    /**
     * 获取用户所有点赞的评论ID
     */
    public function getZanCommentIdByUserId ($user_id) {
        $where = [
            'user_id'   =>  $user_id
        ];
        return $this->where($where)->column('comment_id');
    }
}