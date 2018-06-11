<?php
namespace app\index\controller;

use app\index\controller\BaseMain;

class LifeEmotion extends BaseMain
{
    public function index()
    {
        //获得情感生活下面的所有文章
        $nav_id = input('nav_id');
        if($nav_id == 5){   //情感生活
            $emotionArticles = db('article')->where('belong_nav','=',5)->order('id desc')->paginate(6);
        }else{    //二级导航下面对应的文章
            $emotionArticles = db('article')->where('navid','=',$nav_id)->order('id desc')->paginate(6);
        }
        
       //dump($emotionArticles);die;
       $this->assign('emotionArticles',$emotionArticles);

        
    	return $this->fetch("lifeEmotion");

    }


}
