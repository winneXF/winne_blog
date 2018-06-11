<?php
namespace app\index\controller;

use app\index\controller\BaseMain;
class Index extends BaseMain
{
    public function index()
    {
        // 精彩推荐（精彩推荐只有四篇文章，用一个表来记录对应文章的id）
        $recommend_article_tag = db('wonder_recommend')->alias('w')->join('article a','w.aid = a.id')->field('w.aid,a.id,a.title,a.title_anchor_id,a.keywords,a.article_state,a.click,a.pic')->join('nav n','n.id = a.navid')->field('w.aid,a.id,a.title,a.title_anchor_id,a.keywords,a.article_state,a.click,a.pic,n.nav_name')->select();
    
        // 热门文章
        $hot_articles = db('article')->order('click desc')->limit(6)->select();

            	
    	//工具分享tabname
    	$toolTabName = db('tool_tabname')->order('id asc')->select();
       
        //获取工具分享tab下面对应的内容    
         $toolsCon=db('tool_tabname')->select();
         foreach ($toolsCon as $k=> $v){
             $children=db('tool_tabcontent')->alias('tc')->join('tool_tabname tn','tn.id = tc.tabid')->field('tc.id,tc.name,tc.create_time,tc.download_url,tn.bg_url,tc.state,tc.pic,tn.tabname')->where('tabid',$v['id'])->select();
             if($children){
                 $toolsCon[$k]['children']=$children;
                // dump($children);die;
             }else{
                 $toolsCon[$k]['children']=0;
             }
         }
         //dump($toolsCon);die;

         //HTML/CSS书籍推荐
         $html_css = db('book_recommend')->where('book_type','eq','1')->order('id desc')->paginate(5);
         //javascript书籍推荐
         $javascript = db('book_recommend')->where('book_type','eq','2')->order('id desc')->paginate(5);
         //休闲书籍
         $rest_book = db('book_recommend')->where('state','neq','2')->where('book_type','eq','3')->order('id desc')->paginate(5);
         $book_top_show = db('book_recommend')->where('state','eq','2')->find();


         //电影欣赏
         $movie_share = db('movie')->where('state','neq','2')->order('id desc')->paginate(5);
         $movie_top_show = db('movie')->where('state','eq','2')->find();

         // 友情链接
         $friend_link = db('friend_link')->select();

         // 标签集合（文章的关键字集合）
         $articles = db('article')->where('belong_nav','neq','5')->select();
         $tags = array();
         foreach ($articles as $k => $v) {
            //关键字可以使用英文逗号隔开的
            $arr = explode(',',$v['keywords']);
            foreach ($arr as $key => $value) {
                if($value != ""){
                    // 把空格替换，不然链接地址不能出现空格的
                    $tags[] = str_replace(' ', '&nbsp;', $value);
                }                
            }            
         }
         //一维数组去重后的关键字
         $tag_keyword = array_unique($tags);
        
      	//把数据传到模板文件中
        $this->assign(array(
            'recommend_article_tag'=>$recommend_article_tag,
            'hot_articles'=>$hot_articles,
	        'toolTabName'=>$toolTabName,
	        'toolsCon'=>$toolsCon,
	        'html_css'=>$html_css,
	        'javascript'=>$javascript,
            'rest_book'=>$rest_book,
	        'book_top_show'=>$book_top_show,
            'movie_share'=>$movie_share,
            'movie_top_show'=>$movie_top_show,
            'friend_link'=>$friend_link,
	        'tag_keyword'=>$tag_keyword,
        ));

    	return $this->fetch('index');


        

    }

    // html/css书籍的换一批接口数据
    public function html_css_refresh(){
        $html_css_share = db('book_recommend')->where('book_type','eq','1')->order('id desc')->paginate(5);
        echo json_encode(array('code'=>1,'msg'=>'成功查询到数据','html_css_share'=>$html_css_share));
    }

    // js书籍的换一批接口数据
    public function js_refresh(){
        $js_share = db('book_recommend')->where('book_type','eq','2')->order('id desc')->paginate(5);
        echo json_encode(array('code'=>1,'msg'=>'成功查询到数据','js_share'=>$js_share));
    }

    // 休闲书籍的换一批接口数据
    public function rest_book_refresh(){
        $rest_book_share = db('book_recommend')->where('state','neq','2')->where('book_type','eq','3')->order('id desc')->paginate(5);
        echo json_encode(array('code'=>1,'msg'=>'成功查询到数据','rest_book_share'=>$rest_book_share));
    }


    // 电影欣赏的换一批接口数据
    public function movie_refresh(){
        $movies_share = db('movie')->where('state','neq','2')->order('id desc')->paginate(5);       
        echo json_encode(array('code'=>1,'msg'=>'成功查询到数据','movie_share'=>$movies_share));

    }



}
