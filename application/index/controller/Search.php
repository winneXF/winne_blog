<?php
namespace app\index\controller;
use think\Controller;


class Search extends Controller
{

    
    public function index()
     {
  

        //接收传过来的关键字，进行搜索（对js和html注入进行字符替换）
        $keywords =trim(str_replace('<', '&lt;', input('keywords'))) ;
        $keywords = str_replace('&nbsp;', ' ', $keywords);  //把空格替换回来，不然有空格的搜索不出来
        if($keywords){
            //查找标题含有的关键字
            $map['title']=['like','%'.$keywords.'%'];
            $searchres=db('article')->where($map)->order('id desc')->paginate($listRows = 4, $simple = false, $config = [
                'query'=>array('keywords'=>$keywords),
                ]);
            if(count($searchres) != 0){
                 $this->assign(array(
                    'searchres'=>$searchres,
                    'keywords'=>$keywords
                ));
            }else{
                $this->assign(array(
                'searchres'=>[''],
                'keywords'=>$keywords
                ));
            }
           
        }else{
            $this->error("请输入关键字");
           
        }

        // 搜索右侧的书籍推荐
        $recommend_articles = db('article')->where(array('belong_nav'=>1,'article_state'=>1))->limit(10)->select();
       
       $this->assign(array(
            'recommend_articles'=>$recommend_articles,

        ));




    	return $this->fetch('search');

    }

}
