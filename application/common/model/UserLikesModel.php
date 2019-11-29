<?php

namespace app\common\model;
use think\Model;
use think\Db;

class UserLikesModel extends Model
{
    //定义model表名
    protected $name = 'user_likes';
    /**
     * 插入一条关联
     * @param $data
     * @return int|string
     */
    public function addLikes($data = []) {
        return $this->allowField(true)->save($data);
    }

    /**
     * 根据条件获取一条关联
     * @return int|string
     */
    public function getOneLikesByCondit($where = []) {
        return $this->where($where)->find();
    }

    /**
     * 加减用户和作品之间关联数量
     * 用户收藏的作品数量，作品被收藏的数量
     * @param $user_id
     * @param $words_id
     * @param $type
     * @return bool
     */
    public function userAndWordsRelationCount($user_id, $words_id, $type) {
        $user_model = new UserModel();
        $words_model = new WordsModel();
        if($type == '+') {
            $user_model->addlikeWordsCount($user_id);
            $words_model->addLikesCount($words_id);
            return true;
        }else if($type == '-') {
            $user_model->reducelikeWordsCount($user_id);
            $words_model->reduceLikesCount($words_id);
            return true;
        }
        return false;
    }

    /**
     * 加减用户和用户之间关联数量
     * 用户关注的用户数量，用户的粉丝数量
     * @param $user_id
     * @param $words_id
     * @param $type
     * @return bool
     */
    public function userAndUserRelationCount($user_id, $to_user_id, $type) {
        $user_model = new UserModel();
        if($type == '+') {
            $user_model->addlikeUserCount($user_id);
            $user_model->addFansCount($to_user_id);
            return true;
        }else if($type == '-') {
            $user_model->reducelikeUserCount($user_id);
            $user_model->reduceFansCount($to_user_id);
            return true;
        }
        return false;

    }

    /**
     * 获取某个用户关注的用户列表的总数
     * @param $user_id
     * @return int|string
     */
    public function getLikeUsersByUserIdCount($user_id) {
        $UserOn = "User.id=UserLikes.like_user_id and UserLikes.type=" . config('code.user_likes_type')['user']
            . ' and UserLikes.is_del=' . config('code.is_del')['no']
            . ' and UserLikes.user_id=' . $user_id;
        $result = $this->view('UserLikes', '*')
            ->view('User', ['nickname', 'head_img', 'remark', 'is_del'=>'user_is_del', 'status'=>'user_status'], $UserOn)
            ->count();
        return $result;
    }

    /**
     * 获取某个用户关注的用户列表
     * 并且标记用户列表中的用户是否和当前的用户相互关注
     * @param $user_id  某个用户ID
     * @param $curr_user_id 当前用户ID
     * @param $page
     * @param $size
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function getLikeUsersByUserId($user_id, $curr_user_id, $page, $size) {
        $UserOn = "User.id=UserLikes.like_user_id and UserLikes.type=" . config('code.user_likes_type')['user']
            . ' and UserLikes.is_del=' . config('code.is_del')['no']
            . ' and UserLikes.user_id=' . $user_id;

        //标记用户列表中关注的用户中是否有当前用户逻辑（有-like_user_like_user_id有值）
        $LikeUserLikesOn ='UserLikes.like_user_id=LikeUserLikes.user_id and LikeUserLikes.like_user_id='
            . $curr_user_id . " and LikeUserLikes.type="
            . config('code.user_likes_type')['user']
            . ' and LikeUserLikes.is_del=' . config('code.is_del')['no'];

        $result = $this->view('UserLikes', '*')
            ->view('User', ['nickname', 'head_img', 'remark', 'is_del'=>'user_is_del', 'status'=>'user_status'], $UserOn)
            ->view(['think_user_likes'=>'LikeUserLikes'], ['like_user_id'=>'like_user_like_user_id'], $LikeUserLikesOn, 'LEFT')
            ->order('UserLikes.create_time DESC')
            ->page($page, $size)
            ->select();
        return $result;

    }

    /**
     * 获取某个用户的所有粉丝总数
     * @param $user_id
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function getFansByUserIdCount($like_user_id) {
        $UserOn = "User.id=UserLikes.user_id and UserLikes.type="
            . config('code.user_likes_type')['user']
            . ' and UserLikes.like_user_id=' . $like_user_id
            . ' and UserLikes.is_del=' . config('code.is_del')['no'];
        $result = $this->view('UserLikes', '*')
            ->view('User', ['nickname', 'head_img', 'remark', 'is_del'=>'user_is_del', 'status'=>'user_status'], $UserOn)
            ->count();
        return $result;
    }

    /**
     * 获取某个用户的所有粉丝列表
     * @param $user_id
     * @param $page
     * @param $size
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function getFansByUserId($like_user_id, $curr_user_id, $page, $size) {

        $UserOn = "User.id=UserLikes.user_id and UserLikes.type="
            . config('code.user_likes_type')['user']
            . ' and UserLikes.like_user_id=' . $like_user_id
            . ' and UserLikes.is_del=' . config('code.is_del')['no'];
        //标记粉丝中关注的用户中是否有当前用户逻辑（有-like_user_like_user_id有值）
        $LikeUserLikesOn ='UserLikes.user_id=LikeUserLikes.user_id and LikeUserLikes.like_user_id=' . $curr_user_id
            . " and LikeUserLikes.type=" . config('code.user_likes_type')['user']
            . ' and LikeUserLikes.is_del=' . config('code.is_del')['no'];
        $result = $this->view('UserLikes', '*')
            ->view('User', ['nickname', 'head_img', 'remark', 'is_del'=>'user_is_del', 'status'=>'user_status'], $UserOn)
            ->view(['think_user_likes'=>'LikeUserLikes'], ['like_user_id'=>'like_user_like_user_id'], $LikeUserLikesOn, 'LEFT')
            ->order('UserLikes.create_time DESC')
            ->page($page, $size)
            ->select();
        return $result;

    }

    /**
     * 获取指定用户关注的用户集合
     * @param $user_id
     * @return array
     */
    public function getLikeUsersIdArrByUserId($user_id) {
        $where = [
            'is_del'    =>  config('code.is_del')['no'],
            'user_id'   =>  $user_id,
            'type'  =>  config('code.user_likes_type')['user']
        ];
        return $this->where($where)->column('like_user_id');
    }

    /**
     * 获取用户关注的作品ID集合
     */
    public function getLikeWordsIdArrByUserId($user_id) {
        $where = [
            'is_del'    =>  config('code.is_del')['no'],
            'user_id'   =>  $user_id,
            'type'  =>  config('code.user_likes_type')['words']
        ];
        return $this->where($where)->column('like_words_id');
    }

    /**
     * 根据用户ID获取粉丝关注该用户的记录总数
     * @param $user_id
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function getFansLikeLogCountByUserId ($user_id) {
        $userOn = "User.id=UserLikes.user_id";
        $userOn .= " and UserLikes.type=" . config('code.user_likes_type')['user'];
        $userOn .= " and UserLikes.like_user_id={$user_id}";

        $result = $this->view('UserLikes','*')
            ->view('User','*',$userOn)
            ->count();
        return $result;
    }

    /**
     * 根据用户ID获取粉丝关注该用户的记录列表
     * @param $user_id
     * @param $page
     * @param $size
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function getFansLikeLogByUserId ($user_id, $page, $size) {
        $userOn = "User.id=UserLikes.user_id";
        $userOn .= " and UserLikes.type=" . config('code.user_likes_type')['user'];
        $userOn .= " and UserLikes.like_user_id={$user_id}";

        $fansLikeUsersOn = 'FansLikeUsers.like_user_id=UserLikes.user_id';
        $fansLikeUsersOn .= " and FansLikeUsers.type=" . config('code.user_likes_type')['user'];
        $fansLikeUsersOn .= " and FansLikeUsers.user_id={$user_id}";
        $fansLikeUsersOn .= " and FansLikeUsers.is_del=" . config('code.is_del')['no'];

        $result = $this->view('UserLikes','is_del,create_time')
            ->view('User',['id'=>'user_id','nickname','head_img','status'=>'user_status','is_del'=>'user_is_del'],$userOn)
            //标记用户是否也关注了改粉丝
            ->view(['think_user_likes'=>'FansLikeUsers'],['IF(FansLikeUsers.id,1,0)'=>'is_like'],$fansLikeUsersOn,'LEFT')
            ->order('create_time DESC')
            ->page($page, $size)
            ->select();
        return $result;
    }

    /**
     * 获取器-修改头像链接
     * @param $value
     * @return string
     */
    public function getHeadImgAttr($value) {
        return return_http_url($value);
    }

    /**
     * 根据用户ID获取其他用户收藏该用户的作品记录总数
     * @param $user_id
     * @return int|string
     */
    public function getLikeWordsLogCountByUserId ($user_id) {
        $wordsOn = "Words.id=UserLikes.like_words_id";
        $wordsOn .= " and UserLikes.type=" . config('code.user_likes_type')['words'];
        $wordsOn .= " and Words.user_id={$user_id}";

        $userOn = "User.id=UserLikes.user_id";
        $result = $this->view('UserLikes','*')
            ->view('Words','*',$wordsOn)
            ->view('User','*',$userOn)
            ->count();
        return $result;
    }

    /**
     * 根据用户ID获取其他用户收藏该用户的作品记录
     * @param $user_id
     * @param $page
     * @param $size
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function getLikeWordsLogByUserId ($user_id, $page, $size) {
        $wordsOn = "Words.id=UserLikes.like_words_id";
        $wordsOn .= " and UserLikes.type=" . config('code.user_likes_type')['words'];
        $wordsOn .= " and Words.user_id={$user_id}";

        $userOn = "User.id=UserLikes.user_id";
        $result = $this->view('UserLikes',['is_del','create_time'])
            ->view('Words',['id'=>'words_id','title','remark','cover_img'],$wordsOn)
            ->view('User',['id'=>'user_id','nickname','head_img','status'=>'user_status','is_del'=>'user_is_del'],$userOn)
            ->order('create_time DESC')
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
}