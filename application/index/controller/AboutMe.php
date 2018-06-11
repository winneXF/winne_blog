<?php
namespace app\index\controller;

use app\index\controller\BaseMain;

class AboutMe extends BaseMain
{
    public function index()
    {

        // $articleid = input('articleid');
        // $article_detail = db('article')->find($articleid); //直接查主键不用写where
        // //访问一次文章，click字段加1
        // db('article')->where('id','=',$articleid)->setInc('click');
        // //相关导航栏目下的推荐(先找出该篇文章所属的导航栏目，然后去文章表中找出这个栏目下的所有推荐文章)
        // $cates=db('cate')->find($article_detail['cateid']);
        // $recres=db('article')->where(array('cateid'=>$cates['id'],'state'=>1))->limit(8)->select();

        // $this->assign(array(
        //     'article_detail'=>$article_detail,
        //     'cates'=>$cates,   //文章页面的位置导航需要这个传值
        //     'recres'=>$recres,
        //     ));

        // $this->assign('article_detail',$article_detail);

    	return $this->fetch('aboutMe');

    }


}
