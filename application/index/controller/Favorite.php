<?php
namespace app\index\controller;
use think\Controller;


class Favorite extends Controller
{

    
    public function index()
     {
        $user_name = session('username');  //获取到登录人的名字
        $favoriteres=db('favorite')->alias('r')->join('user u','r.uid = u.id')->field('r.id,r.aid,u.username')->join('article a','r.aid = a.id')->field('r.id,r.aid,u.username,a.title,a.pic,a.descript,a.article_time,a.click')->where("username",'eq', $user_name)->paginate(8);
        $favoriteC = count($favoriteres);
      
        // 搜索右侧的书籍推荐
        $recommend_articles = db('article')->where(array('belong_nav'=>1,'article_state'=>1))->limit(10)->select();
       
       $this->assign(array(
            'recommend_articles'=>$recommend_articles,
            'favoriteres'=>$favoriteres,
            'favoriteC'=>$favoriteC,

        ));




    	return $this->fetch('favorite');

    }



    public function favorite_click(){
        $data=input('post.');  //传入提交的信息
        $uid = $data['uid'];
         $aid = $data['aid'];
        
        if(request()->isPost()){  //判断是否是提交信息

            if( db('favorite')->where('aid',$aid)->where('uid','eq',$uid)->find() ){
                echo json_encode(array('code'=>2,'msg'=>'该文章已收藏'));
            }else{
                 if(db('favorite')->insert($data)){
                    echo json_encode(array('code'=>1,'msg'=>'文章收藏成功~'));
                    db('favorite')->where('aid',$aid)->where('uid','eq',$uid)->update(['favoriteN' => 1]);
                }else{
                     echo json_encode(array('code'=>0,'msg'=>'文章收藏失败！'));
                    db('favorite')->where('aid',$aid)->where('uid','eq',$uid)->update(['favoriteN' => 0]);

                }
            }
        }
           
    }


    public function favorite_cancle(){
        $data=input('post.');  //传入提交的信息
        $uid = $data['uid'];
        $aid = $data['aid'];
        if(db('favorite')->where('uid','eq',$uid)->where('aid','eq',$aid)->delete()){  //删除操作是返回删除的条数
            echo json_encode(array('code'=>3,'msg'=>'已取消收藏'));
            db('favorite')->where('aid',$aid)->where('uid','eq',$uid)->update(['favoriteN' => 0]);

        }else{
            echo json_encode(array('code'=>4,'msg'=>'取消收藏失败！'));
            db('favorite')->where('aid',$aid)->where('uid','eq',$uid)->update(['favoriteN' => 1]);

        }
    }

}
