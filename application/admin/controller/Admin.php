<?php
namespace app\admin\controller;
use app\admin\controller\Base;
use app\admin\model\Admin as AdminModel;
class Admin extends Base
{

    public function admin_list()
    {
    	//内置分页
    	$list = AdminModel::paginate(6);
    	$this->assign('list',$list); //把list传到模板页进行循环输出
    	return $this->fetch('admin_list');

    }
    public function admin_add()
    {
    	if(request()->isPost()){
    		$data = [
 				'adminname' => input('adminname'),
 				'password' =>md5(input('password')) ,
    		];

    		$validate = validate('Admin');
			if(!$validate->scene('addF')->check($data)){
			    $this->error($validate->getError());
			    die;
			}
			// 查询管理员名称是否重复了
			if( db('admin')->where('adminname',input('adminname'))->find() ){
				$this->error('管理员信息已存在，不能重复!');
			}else{
				if(db('admin')->insert($data)){
    			//第二个参数是跳转到当前空间的某个方法
	    			return $this->success('添加管理员成功！','admin_list'); 
	    		}else{
	    			return $this->error('添加管理员失败！'); 
	    		}
			}

    		
    		return;
    	}
    	return $this->fetch('admin_add');

    }

    //修改管理员信息操作
    public function admin_edit(){

    	$editId = input('id');
    	$editName = input('adminname');
    	$admins = db('admin')->find($editId); //根据id在数据库中找出那条数据
    	
    	if(request()->isPost()){  //判断是否是提交信息

    		$data = [
    			'id' => $editId,
    			'adminname' => $editName,
    		];
            //判断是否输入新密码，有的话就替换之前的，没有的话留还是使用之前的密码
    		if( input('password') ){
    			$data['password'] = md5(input('password'));
    		}else{
    			$data['password'] = $admins['password'];
    		}
    		//修改信息的验证
    		$validate = validate('Admin');
			if(!$validate->scene('editF')->check($data)){
			    $this->error($validate->getError());
			    die;
			}

			if( db('admin')->where('adminname',$editName)->where('id','neq',$editId)->find() ){
				$this->error('管理员信息已存在，不能重复!');
			}else{
				$save = db('admin')->update($data);
				if($save !== false){ //用变量存储，这样就算原来的保持不变，那么也是修改成功 
				//update 方法返回影响数据的条数，没修改任何数据返回 0
	    			$this->success('管理员信息修改成功！','admin/admin_list');  //成功后跳转到listF页面
	    		}else{  //当修改的数据完全没有变化时，返回0，就是没有影响数据更新
	    			dump($data);
	    			$this->error('管理员信息修改失败!');
	    		}
			}
			
    	}

    	$this->assign('admins',$admins); //把变量输出给view模板使用,使用时不是循环就要加$
    	return $this->fetch('admin_edit');
    }




    //删除操作
    public function admin_del(){
    	$delId = input('id');
    	//echo $delId;
    	if($delId != 1){
    		if(db('admin')->delete($delId)){  //删除操作是返回删除的条数
    			$this->success('管理员删除成功！');
    		}else{
    			$this->error('管理员删除失败！');
    		}
    	}else{
    		$this->error('初始化管理员不能删除！');
    	}
    	
    }


    public function logout(){
        session(null);
        $this->success('退出成功','login/index');
    }





}
