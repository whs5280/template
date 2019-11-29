<?php

namespace app\common\model;
use think\Model;
use think\Db;

class UserModel extends Model
{
    //定义model表名
    protected $name = 'user';

    public function getOneUser($where = []){
        return $this->where($where)->find();
    }

    /**
     * 指定某个用户的粉丝数+1
     * @param $user_id
     * @return int|true
     */
    public function addFansCount($user_id) {
        return $this->where('id',$user_id)->setInc('fans_count',1);
    }

    /**
     * 指定某个用户的粉丝数-1
     * @param $user_id
     * @return int|true
     */
    public function reduceFansCount($user_id) {
        return $this->where('id',$user_id)->setDec('fans_count',1);
    }

    /**
     * 指定某个用户的关注用户数量+1
     * @param $user_id
     * @return int|true
     */
    public function addlikeUserCount($user_id) {
        return $this->where('id',$user_id)->setInc('like_user_count',1);
    }

    /**
     * 指定某个用户的关注用户数量-1
     * @param $user_id
     * @return int|true
     */
    public function reducelikeUserCount($user_id) {
        return $this->where('id',$user_id)->setDec('like_user_count',1);
    }

    /**
     * 指定某个用户关注的作品数量+1
     * @param $user_id
     * @return int|true
     */
    public function addlikeWordsCount($user_id) {
        return $this->where('id',$user_id)->setInc('like_words_count',1);
    }

    /**
     * 指定某个用户关注的作品数量-1
     * @param $user_id
     * @return int|true
     */
    public function reducelikeWordsCount($user_id) {
        return $this->where('id',$user_id)->setDec('like_words_count',1);
    }

    public function words() {
        return $this->hasMany('WordsModel','user_id','id');
    }

    public function updateUser($where, $data = []){
        return $this->save($data, $where);
    }


    /**
     * 作品数量+1
     * @param $user_id
     * @return int|true
     */
    public function addWordsCount($user_id) {
        return $this->where('id',$user_id)->setInc('words_count',1);
    }

    /**
     * 作品数量-1
     * @param $user_id
     * @return int|true
     */
    public function reduceWordsCount($user_id) {
        return $this->where('id',$user_id)->setDec('words_count',1);
    }
}