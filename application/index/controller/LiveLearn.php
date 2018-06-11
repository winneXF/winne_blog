<?php
namespace app\index\controller;

use app\index\controller\BaseMain;

class LiveLearn extends BaseMain
{
    public function index()
    {
        //获得学无止境下面的所有文章
        $nav_id = input('nav_id');
        if($nav_id == 1){  //学无止境
            $learnArticles = db('article')->where('belong_nav','=',1)->order('id desc')->paginate(6);
        }else{    //二级导航下面对应的文章
            $learnArticles = db('article')->where('navid','=',$nav_id)->order('id desc')->paginate(6);
        }        

        //学无止境右侧的所有特别推荐文章
        $recommend_articles = db('article')->where(array('belong_nav'=>1,'article_state'=>1))->limit(8)->select();
       
       $this->assign(array(
            'learnArticles'=>$learnArticles,
            'recommend_articles'=>$recommend_articles,

        ));

        
    	return $this->fetch("liveLearn");

    }


}
