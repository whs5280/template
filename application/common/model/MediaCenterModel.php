<?php

namespace app\common\model;
use think\Model;
use think\Db;

class MediaCenterModel extends Model
{
    //定义model表名
    protected $name = 'mediacenter';
    protected $autoWriteTimestamp = false;
    /**
     * 获取一条作品
     * @param $data
     * @return int|string
     */
    public function  getMediaCenterById($file,$media_id){
     $where['file']=$file;
        $data['media_id']=$media_id;
        $result=$this->view('mediacenter','*')->
        where($where)->whereOr($data)->
        find();
        return $result;

    }

    public function getOneWords($where = []) {
        return $this->where($where)->find();
    }

    /**
     * 插入一条作品信息
     * @param $data
     * @return int|string
     */
    public function addOneWords($data) {
        return $this->allowField(true)->save($data);
    }

    /**
     * 软删除作品
     * @param array $where
     */
    public function softDelWords($where = []) {
        $save['is_del'] = config('code.is_del')['yes'];
        return $this->save($save,$where);
    }

    /**
     * 根据条件获取作品总数
     * @param array $where
     */
    public function getWordsCountByCondit($where = [], $curr_user_id = 0) {
        $where['Words.is_del'] = config('code.is_del')['no'];
        $where1['Words.audit_status'] = config('code.words_audit_status')['pass'];
        $whereOr['Words.user_id'] = $curr_user_id;
        $result = $this->view('Words','*')
            ->view('WordsCategory',['title'=>'category_name'],'Words.category_id=WordsCategory.id','LEFT')
            ->view('User',['nickname'=>'author', 'head_img'],'User.id=Words.user_id','LEFT')
            ->where($where)
            ->where(function($query)use($where1,$whereOr){
                $query->where($where1)
                    ->whereOr($whereOr);
            })
            ->count();
        return $result;
    }

    /**
     * 根据条件获取作品（要获取作品内容）
     * 其他用户只能看见审核过的作品，作品的作者可以看见所有审核状态的作品
     * @param array $where
     */
    public function getWordsByCondit($where = [], $curr_user_id = 0, $page, $size) {
        $where['Words.is_del'] = config('code.is_del')['no'];
        $where1['Words.audit_status'] = config('code.words_audit_status')['pass'];
        $whereOr['Words.user_id'] = $curr_user_id;
        $result = $this->view('Words','*')
            ->view('WordsCategory',['title'=>'category_name'],'Words.category_id=WordsCategory.id','LEFT')
            ->view('User',['nickname'=>'author', 'head_img'],'User.id=Words.user_id','LEFT')
            ->with('details')   //一对多（一个作品多个张图片或视频）
            ->where($where)
            ->where(function($query)use($where1,$whereOr){
                $query->where($where1)
                    ->whereOr($whereOr);
            })
            ->order('create_time DESC')
            ->page($page, $size)
            ->select();
        return $result;
    }

    /**
     * 根据条件获取作品（不用获取作品内容）
     * @param array $where
     */
    public function getWordsByCondit1($where = [], $page, $size) {
        $where['Words.is_del'] = config('code.is_del')['no'];
        $result = $this->view('Words','*')
            //LEFT JOIN  获取作品分类
            ->view('WordsCategory',['title'=>'category_name'],'Words.category_id=WordsCategory.id','LEFT')
            //LEFT JOIN 获取作品作者
            ->view('User',['nickname'=>'author','head_img'=>'author_img'],'User.id=Words.user_id','LEFT')
            //LEFT JOIN 获取作品视频信息，无视频者null
            ->view('WordsDetails',['video_path'=>'video','img_path'=>'video_img'],'Words.id=WordsDetails.words_id and WordsDetails.type="' . config('code.words_detail_type')['video'] . '"','LEFT')
            ->where($where)
            ->order('create_time DESC')
            ->page($page, $size)
            ->select();
        return $result;
    }

    /**
     * 根据作品ID获取某一条作品信息
     * @param $words_id
     * @return array|false|\PDOStatement|string|Model
     */
    public function getWordsDetailsById($words_id) {
        $where['Words.is_del'] = config('code.is_del')['no'];
        $where['Words.audit_status'] = config('code.words_audit_status')['pass'];
        $where['Words.id'] = $words_id;
        $result = $this->view('Words','*')
            ->view('WordsCategory',['title'=>'category_name'],'Words.category_id=WordsCategory.id','LEFT')
            ->view('User',['nickname'=>'author', 'head_img'],'User.id=Words.user_id','LEFT')
            ->with('details')  //一对多（一个作品多个张图片或视频）
            ->where($where)
            ->find();
        return $result;
    }

    /**
     * 获取指定用户关注的作品总数
     * @param $user_id  用户ID
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function getLikeWordsCountByUserId ($user_id, $curr_user_id) {
        $where = [
            "UserLikes.is_del" => config('code.is_del')['no'],
        ];
        $wordsOn = "UserLikes.user_id={$user_id} and UserLikes.type=" . config('code.user_likes_type')['words'] . " and Words.id=UserLikes.like_words_id";
        $where1['Words.audit_status'] = config('code.words_audit_status')['pass'];
        $whereOr['Words.user_id'] = $curr_user_id;

        $result = $this->view('UserLikes',['user_id'=>'curr_user_id'])
            ->view('Words', '*', $wordsOn)
            ->view('WordsCategory', ['title'=>'category_name'], 'WordsCategory.id=Words.category_id')
            ->view('User',['nickname'=>'author', 'head_img'],'User.id=Words.user_id')
            ->where($where)
            //当前用户可以看见自己没有审核的作品
            ->where(function($query)use($where1,$whereOr){
                $query->where($where1)
                    ->whereOr($whereOr);
            })
            ->count();
        return $result;
    }

    /**
     * 获取指定用户关注的作品列表
     * @param $user_id  用户ID
     * @param $page
     * @param $size
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function getLikeWordsByUserId($user_id, $curr_user_id, $page, $size) {
        $where = [
            "UserLikes.is_del" => config('code.is_del')['no'],
        ];
        $wordsOn = "UserLikes.user_id={$user_id} and UserLikes.type=" . config('code.user_likes_type')['words'] . " and Words.id=UserLikes.like_words_id";
        $where1['Words.audit_status'] = config('code.words_audit_status')['pass'];
        $whereOr['Words.user_id'] = $curr_user_id;

        $result = $this->view('UserLikes',['user_id'=>'curr_user_id'])
            ->view('Words', '*', $wordsOn)
            ->view('WordsCategory', ['title'=>'category_name'], 'WordsCategory.id=Words.category_id')
            ->view('User',['nickname'=>'author', 'head_img'],'User.id=Words.user_id')
            ->with('details')
            ->where($where)
            ->where(function($query)use($where1,$whereOr){
                $query->where($where1)
                    ->whereOr($whereOr);
            })
            ->order('UserLikes.create_time DESC')
            ->page($page, $size)
            ->select();
        return $result;

    }

    /**
     * 按分类获取前4条最新的作品
     * @param array $where
     */
    public function getWordsByCategory($category_id) {
        $where['Words.is_del'] = config('code.is_del')['no'];
        $where['Words.audit_status'] = config('code.words_audit_status')['pass'];
        $where['category_id'] = $category_id;
        $where['is_overt']  =   config('code.words_is_overt')['yes'];
        $result = $this->view('Words','*')
            //LEFT JOIN  获取作品分类
            ->view('WordsCategory',['title'=>'category_name'],'Words.category_id=WordsCategory.id','LEFT')
            //LEFT JOIN 获取作品作者
            ->view('User',['nickname'=>'author'],'User.id=Words.user_id','LEFT')
            //LEFT JOIN 获取作品视频信息，无视频者null
            ->view('WordsDetails',['video_path'=>'video','img_path'=>'video_img'],'Words.id=WordsDetails.words_id and WordsDetails.type="' . config('code.words_detail_type')['video'] . '"','LEFT')
            ->where($where)
            ->order('create_time DESC')
            ->limit(0, 4)
            ->select();
        return $result;
    }
    /**
     * 作品表跟作品内容表关联-作品图片-作品视频（一对多）
     * @return \think\model\relation\HasMany
     */
    public function details() {
        $where['is_del'] = config('code.is_del')['no'];
        return $this->hasMany('WordsDetailsModel','words_id','id')->where($where);
    }

    public function user() {
        return $this->belongsTo('UserModel','id','words_id');
    }

    /**
     * 指定某条作品喜欢人数-1
     * @param $words_id
     * @return int|true
     */
    public function reduceLikesCount($words_id) {
        return $this->where('id',$words_id)->setDec('likes_count',1);
    }

    /**
     * 指定某条作品喜欢人数+1
     * @param $words_id
     * @return int|true
     */
    public function addLikesCount($words_id) {
        return $this->where('id',$words_id)->setInc('likes_count',1);
    }


    /**
     * 获取指定用户的所有作品被收藏的次数总和
     * @param $user_id
     * @return float|int
     */
    public function getAllLikesCountBy($user_id) {
        return $this->where(['user_id'=>$user_id])->sum('likes_count');
    }

    /**
     * 作品评论数+1
     * @param $words_id
     * @return int|true
     */
    public function addWordsCommentCount($words_id) {
        return $this->where('id',$words_id)->setInc('comment_count',1);
    }

    /**
     * 作品评论数-1
     * @param $words_id
     * @return int|true
     */
    public function reduceWordsCommentCount($words_id) {
        return $this->where('id',$words_id)->setDec('comment_count',1);
    }

    /**
     * 获取前100条关注数量最多的作品
     */
    public function getLikeWordsRank () {
        $where = [
            'Words.is_overt'  =>  config('code.words_is_overt')['yes'],
            'Words.is_del'    =>  config('code.is_del')['no'],
            'Words.audit_status'    =>  config('code.words_audit_status')['pass'],
        ];
        return $this->view('Words','*')
            ->view('WordsCategory',['title'=>'category_name'],'Words.category_id=WordsCategory.id','LEFT')
            ->view('User',['nickname'=>'author', 'head_img'],'User.id=Words.user_id','LEFT')
            ->with('details')   //一对多（一个作品多个张图片或视频）
            ->where($where)
            ->order('likes_count DESC,id DESC')
            ->limit(0,100)
            ->select();
    }

    /**
     * @param array $where
     * @param array $data
     */
    public function updateWords ($where, $data) {
        return $this->allowField(true)->save($data, $where);
    }

    /**
     * 指定某条作品分享数+1
     * @param $words_id
     * @return int|true
     */
    public function addShareCount($words_id) {
        return $this->where('id',$words_id)->setInc('share_count',1);
    }
    //根据ＩＤ查询媒体上传信息
//    public function  medaiacenterByid($media_id){
//        $where['media_id']=$media_id;
//        $result=$this->veiw('mediacenter','*')->
//            where($where)->
//            find();
//        return $result;
//
//    }
}