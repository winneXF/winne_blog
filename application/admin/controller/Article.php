<?php
namespace app\admin\controller;
use app\admin\controller\Base;
class Article extends Base
{

    public function article_list()
    {
    	
        //article表和nav表的连接查询(得到nav表中的nav_name)
        $articles = db('article')->alias('a')->join('nav c','c.id = a.navid')->field('a.id,a.title,a.title_anchor_id,a.keywords,a.article_state,a.article_time,a.click,a.pic,c.nav_name')->paginate(5);
        $this->assign('articles',$articles); //把articles传到模板页进行循环输出
    	return $this->fetch('article_list');

    }

    public function link_nav(){
        // 接收post请求发过来的data数据
        $id = input('post.id');
        $navres = db('nav')->where("fatherid",'eq' ,$id)->select();
        echo json_encode(array('code'=>1,'mes'=>'请求成功','navs'=>$navres));
    }

    // public function link_navs(){
    //     // 接收post请求发过来的data数据
    //     $id = input('post.id');
    //     //dump($id);
    //     //die;
    //     $navres = db('nav')->where("fatherid",'eq' ,$id)->select();
    //     echo json_encode(array('code'=>1,'mes'=>'请求成功','navs'=>$navres));
    // }
    public function article_add()
    {
    	if(request()->isPost()){
            //dump($_POST);die;
    		$data = [
                'title' => input('title'),
 				'title_anchor_id' => input('title_anchor_id'),
                'author' => input('author'),
                'descript' => input('descript'),
                //关键字，我们是用逗号分隔的，把所有的中文逗号替换成英文逗号
                'keywords' =>str_replace('，', ',', input('keywords')) , 
                'navid' => input('navid'),  ///二级导航id
                'belong_nav' => input('belong_nav'),  //一级导航id
                'content' => input('content'),
 				'article_time' => date("Y-m-d"),
    		];
            //判断是否推荐
            if(input('article_state') == 'on'){
                $data['article_state'] = 1;
            }else{
                 $data['article_state'] = 0;
            }
            
            //判断是否有选择文件
            if($_FILES['pic']['tmp_name']){
                // 获取表单上传文件 例如上传了001.jpg
                 $file = request()->file('pic');
                 // 移动到框架应用根目录/public/static/uploads/ 目录下
                 $info = $file->move(ROOT_PATH . 'public' . DS . 'static/uploads');
                // dump($info);die;
                 $data['pic'] = '/uploads/'.$info->getSaveName();
            }else{
                $data['pic'] = '';
            }


    		$validate = validate('Article');

			if(!$validate->scene('addF')->check($data)){
			    $this->error($validate->getError());
			    die;
			}

			if( db('article')->where('title',input('title'))->find() ){
				$this->error('文章标题已存在，不能重复!');
			}else{
				if(db('article')->insert($data)){
    			//第二个参数是跳转到当前空间的某个方法
	    			return $this->success('添加文章成功！','article_list'); 
	    		}else{
	    			return $this->error('添加文章失败！'); 
	    		}
			}
    		
    		return;
    	}
        //把所属导航栏目传入模板视图
        $nav = db('nav')->where("fatherid",'eq' ,0)->select();
        $this->assign('nav',$nav);

    	return $this->fetch('article_add');

    }

    //修改文章信息操作
    public function article_edit(){

    	$editId = input('id');
    	$editName = input('title');
    	$articles = db('article')->find($editId); //根据id在数据库中找出那条数据
    	
    	if(request()->isPost()){  //判断是否是提交信息

    		$data = [
                'id' => $editId,    //修改的时候一定要添加主键，不然修改的时候有时会报错，说缺少更新条件
                'title' => input('title'),
                'title_anchor_id' => input('title_anchor_id'),
                'author' => input('author'),
                'descript' => input('descript'),
                'keywords' => str_replace('，', ',', input('keywords')),
                'navid' => input('navid'),
                'belong_nav' => input('belong_nav'),  //一级导航id
                'content' => input('content'),
                'article_time' => date("Y-m-d"),
            ];
            //判断是否推荐
            if(input('article_state') == 'on'){
                $data['article_state'] = 1;
            }else{
                 $data['article_state'] = 0;
            }
           
            
            //判断是否有选择文件
            if($_FILES['pic']['tmp_name']){

                if($articles['pic'] != ""){
                    // 绝对路径才能删除
                    $url=$_SERVER["DOCUMENT_ROOT"]."/static".$articles['pic'];
                    // 删除原来的图片
                    unlink($url);
                }   

                // 获取表单上传文件 例如上传了001.jpg
                 $file = request()->file('pic');
                 // 移动到框架应用根目录/public/static/uploads/ 目录下
                 $info = $file->move(ROOT_PATH . 'public' . DS . 'static/uploads');
                // dump($info);die;
                 $data['pic'] = '/uploads/'.$info->getSaveName();
            }

    		//修改信息的验证
    		$validate = validate('Article');
			if(!$validate->scene('editF')->check($data)){
			    $this->error($validate->getError());
			    die;
			}

			if( db('article')->where('title',$editName)->where('id','neq',$editId)->find() ){
				$this->error('文章标题已存在，不能重复!');
			}else{
				$save = db('article')->update($data);
				if($save !== false){  
				//update 方法返回影响数据的条数，没修改任何数据返回 0
	    			$this->success('文章信息修改成功！','article/article_list');  //成功后跳转到listF页面
	    		}else{  //当修改的数据完全没有变化时，好像返回0，就是没有影响数据更新
	    			dump($data);
	    			$this->error('文章信息修改失败!');
	    		}
			}
			//dump(db('article')->where('title',$editName)->where('id','neq',$editId)->find());
    		
    		



    	}

        //把所属导航栏目传入模板视图
        $nav = db('nav')->where("fatherid",'eq' ,0)->select();
        $this->assign('nav',$nav);

    	$this->assign('articles',$articles); //把变量输出给view模板使用,使用时不是循环就要加$
    	return $this->fetch('article_edit');
    }




    //删除操作
    public function article_del(){
    	$delId = input('id');
        //删除操作是返回删除的条数
		if(db('article')->delete($delId)){  
			$this->success('文章删除成功！');
		}else{
			$this->error('文章删除失败！');
		}    
    }





}
