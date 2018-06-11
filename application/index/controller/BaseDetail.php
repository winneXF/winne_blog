<?php
namespace app\index\controller;
use think\Controller;
class BaseDetail extends Controller
{
    public function _initialize()
    {
        //调用右侧推荐函数
    	//$this->right();
    	// $cateres=db('cate')->order('id asc')->select();
     //    $tagres=db('tags')->order('id desc')->select();
    	// $this->assign(array(
     //        'cateres'=>$cateres,
     //        'tagres'=>$tagres
     //        ));
        //导航栏显示（因为多个页面都需要用到这个展示，所以封装到基类里面去继承）
        $cateres = db('cate')->order('id asc')->select();
        $this->assign('cateres',$cateres);
    }



    //右边侧边栏的推荐
    public function right(){
        //热门点击
        $clickres=db('article')->order('click desc')->limit(8)->select();
        //推荐
        $tjres=db('article')->where('state','=',1)->order('click desc')->limit(8)->select();
        $this->assign(array(
                'clickres'=>$clickres,
                'tjres'=>$tjres
            ));

    }



}
