<?php
namespace app\admin\controller;
use app\admin\controller\Base;
//use app\admin\model\Nav as NavModel;
class Nav extends Base
{

    public function nav_list()
    {
    	//内置分页
    	$list = db('nav')->paginate(6);
    	$this->assign('list',$list); //把list传到模板页进行循环输出
    	return $this->fetch('nav_list');

    }
    public function nav_add()
    {
    	if(request()->isPost()){
    		$data = [
 				'nav_name' => input('nav_name'),
 				'fatherid' => input('fatherid'),
    		];

    		$validate = validate('nav');
			if(!$validate->scene('addF')->check($data)){
			    $this->error($validate->getError());
			    die;
			}
			// 查询导航栏目名称是否重复了
			if( db('nav')->where('nav_name',input('nav_name'))->find() ){
				$this->error('导航栏目信息已存在，不能重复!');
			}else{
				if(db('nav')->insert($data)){
    			//第二个参数是跳转到当前空间的某个方法
	    			return $this->success('添加导航栏目成功！','nav_list'); 
	    		}else{
	    			return $this->error('添加导航栏目失败！'); 
	    		}
			}

    		
    		return;
    	}

        //把所属导航栏目传入模板视图
        $nav = db('nav')->where("fatherid",'eq' ,0)->select();
        $this->assign('nav',$nav);
    	return $this->fetch('nav_add');

    }

    //修改导航栏目信息操作
    public function nav_edit(){

    	$editId = input('id');
    	$editName = input('nav_name');
    	$nav = db('nav')->find($editId); //根据id在数据库中找出那条数据
    	
    	if(request()->isPost()){  //判断是否是提交信息

    		$data = [
    			'id' => $editId,
    			'nav_name' => $editName,
                'fatherid' => input('fatherid'),
    		];
            
    		//修改信息的验证
    		$validate = validate('Nav');
			if(!$validate->scene('editF')->check($data)){
			    $this->error($validate->getError());
			    die;
			}

			if( db('nav')->where('nav_name',$editName)->where('id','neq',$editId)->find() ){
				$this->error('导航栏目信息已存在，不能重复!');
			}else{
				$save = db('nav')->update($data);
				if($save !== false){ //用变量存储，这样就算原来的保持不变，那么也是修改成功 
				//update 方法返回影响数据的条数，没修改任何数据返回 0
	    			$this->success('导航栏目信息修改成功！','nav/nav_list');  //成功后跳转到listF页面
	    		}else{  //当修改的数据完全没有变化时，返回0，就是没有影响数据更新
	    			dump($data);
	    			$this->error('导航栏目信息修改失败!');
	    		}
			}
			
    	}

    	//把所属导航栏目传入模板视图
        $navs = db('nav')->where("fatherid",'eq' ,0)->select();
        $this->assign('navs',$navs);
        $this->assign('nav',$nav);
    	return $this->fetch('nav_edit');
    }




    //删除操作
    public function nav_del(){
    	$delId = input('id');
    	
		if(db('nav')->delete($delId)){  //删除操作是返回删除的条数
			$this->success('导航栏目删除成功！');
		}else{
			$this->error('导航栏目删除失败！');
		}
    	
    	
    }


    // public function logout(){
    //     session(null);
    //     $this->success('退出成功','login/index');
    // }





}
