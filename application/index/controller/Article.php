<?php
namespace app\index\controller;

use think\Controller;

class Article extends Controller
{
    public function index()
    {

        $article_id = input('article_id');
        $article_detail = db('article')->find($article_id); //直接查主键不用写where
        db('article')->where('id','=',$article_id)->setInc('click');
        //获取到文章对应的锚点
        $article_anchor = db('anchor')->where('article_id','eq',$article_id)->find();
        $anchor_id = explode(',',$article_anchor['id_name']);
        $anchor_name = explode(',',$article_anchor['anchor_name']);
        //将两个一维数组合并成二维数组，
       $anchor = array();
       foreach($anchor_id as $k=>$v){
            $anchor[$k]['id'] = $v;
       }
       foreach($anchor_name as $k=>$v){
            $anchor[$k]['name'] = $v;
       }

       // 文章是否被收藏
       $user_id = session('userid');  //获取到登录人的id
       $favorite = db('favorite')->where('aid','=',$article_id)->where('uid','=',$user_id)->find();
      
       
        $this->assign(array(
            'article_detail'=>$article_detail,
            'favorite'=>$favorite,
            'anchor'=>$anchor,
           
            ));

    	return $this->fetch('article');

    }


}
