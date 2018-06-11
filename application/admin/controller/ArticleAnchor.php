<?php
namespace app\admin\controller;
use app\admin\controller\Base;
class ArticleAnchor extends Base
{

    public function article_anchor_list()
    {
    	//内置分页
    	//$list = db('anchor')->paginate(6);
       // $list = db('article')->alias('a')->join('anchor c','c.article_id = a.id')->field('a.title,c.id,c.id_name,c.anchor_name')->paginate(8);
        $list = db('anchor')->alias('c')->join('article a','c.article_id = a.id')->field('a.title,c.id,c.id_name,c.anchor_name')->paginate(8);
    	$this->assign('list',$list); //把list传到模板页进行循环输出
    	return $this->fetch('article_anchor_list');

    }
    public function article_anchor_add()
    {
    	if(request()->isPost()){
    		$data = [
 				'article_id' => input('article_id'),
                'id_name' =>str_replace('，', ',', input('id_name')) , 
 				'anchor_name' =>str_replace('，', ',', input('anchor_name')) , 
    		];

    		$validate = validate('Anchor');
			if(!$validate->scene('addF')->check($data)){
			    $this->error($validate->getError());
			    die;
			}
			// 查询用户名称是否重复了
			if( db('anchor')->where('article_id',input('article_id'))->find() ){
				$this->error('所选文章已存在锚点，不能重复!');
			}else{
				if(db('anchor')->insert($data)){
    			//第二个参数是跳转到当前空间的某个方法
	    			return $this->success('添加该文章锚点成功！','article_anchor_list'); 
	    		}else{
	    			return $this->error('添加该文章锚点失败！'); 
	    		}
			}

    		
    		return;
    	}

        //把文章标题传过去
        $article_title = db('article')->select();
        $this->assign('article_title',$article_title);


    	return $this->fetch('article_anchor_add');

    }

    //修改用户信息操作
    public function article_anchor_edit(){

    	$editId = input('id');
    	//$editName = input('article_anchorname');
    	$article_anchors = db('anchor')->find($editId); //根据id在数据库中找出那条数据
    	
    	if(request()->isPost()){  //判断是否是提交信息

    		$data = [
    			'id' => $editId,
                'article_id' => input('article_id'),
                'id_name' => input('id_name'),
    			'anchor_name' => input('anchor_name'),
    		];
            
    		//修改信息的验证
    		$validate = validate('Anchor');
			if(!$validate->scene('editF')->check($data)){
			    $this->error($validate->getError());
			    die;
			}

			if( db('anchor')->where('article_id',input('article_id'))->where('id','neq',$editId)->find() ){
				$this->error('文章锚点信息已存在，不能重复!');
			}else{
				$save = db('anchor')->update($data);
				if($save !== false){ //用变量存储，这样就算原来的保持不变，那么也是修改成功 
				//update 方法返回影响数据的条数，没修改任何数据返回 0
	    			$this->success('文章锚点信息修改成功！','article_anchor/article_anchor_list');  //成功后跳转到listF页面
	    		}else{  //当修改的数据完全没有变化时，返回0，就是没有影响数据更新
	    			dump($data);
	    			$this->error('文章锚点信息修改失败!');
	    		}
			}
			
    	}

    	//把文章标题传过去
        $articleres = db('article')->select();
        $this->assign('articleres',$articleres);
        $this->assign('article_anchors',$article_anchors); 
    	return $this->fetch('article_anchor_edit');
    }




    //删除操作
    public function article_anchor_del(){
    	$delId = input('id');
    	//echo $delId;
    	
		if(db('anchor')->delete($delId)){  //删除操作是返回删除的条数
			$this->success('文章锚点删除成功！');
		}else{
			$this->error('文章锚点删除失败！');
		}
    	
    }


    // public function logout(){
    //     session(null);
    //     $this->success('退出成功','login/index');
    // }





}
