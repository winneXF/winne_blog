<?php
namespace app\admin\controller;
use app\admin\controller\Base;
class FriendLink extends Base
{

    public function friend_link_list()
    {
    	//内置分页
    	$list = db('friend_link')->paginate(6);
    	$this->assign('list',$list); //把list传到模板页进行循环输出
    	return $this->fetch('friend_link_list');

    }
    public function friend_link_add()
    {
    	if(request()->isPost()){
    		$data = [
 				'link_name' => input('link_name'),
 				'url' => input('url'),
    		];

   //  		$validate = validate('FriendLink');
			// if(!$validate->scene('addF')->check($data)){
			//     $this->error($validate->getError());
			//     die;
			// }
			// 查询友情链接名称是否重复了
			if( db('friend_link')->where('link_name',input('link_name'))->find() ){
				$this->error('友情链接已存在，不能重复!');
			}else{
				if(db('friend_link')->insert($data)){
    			//第二个参数是跳转到当前空间的某个方法
	    			return $this->success('添加友情链接成功！','friend_link_list'); 
	    		}else{
	    			return $this->error('添加友情链接失败！'); 
	    		}
			}

    		
    		return;
    	}
    	return $this->fetch('friend_link_add');

    }

    //修改友情链接信息操作
    public function friend_link_edit(){

    	$editId = input('id');
    	$editName = input('link_name');
    	$friend_links = db('friend_link')->find($editId); //根据id在数据库中找出那条数据
    	
    	if(request()->isPost()){  //判断是否是提交信息

    		$data = [
    			'id' => $editId,
                'link_name' => $editName,
    			'url' => input('url'),
    		];
           

			if( db('friend_link')->where('link_name',$editName)->where('id','neq',$editId)->find() ){
				$this->error('友情链接信息已存在，不能重复!');
			}else{
				$save = db('friend_link')->update($data);
				if($save !== false){ //用变量存储，这样就算原来的保持不变，那么也是修改成功 
				//update 方法返回影响数据的条数，没修改任何数据返回 0
	    			$this->success('友情链接信息修改成功！','friend_link/friend_link_list');  //成功后跳转到listF页面
	    		}else{  //当修改的数据完全没有变化时，返回0，就是没有影响数据更新
	    			dump($data);
	    			$this->error('友情链接信息修改失败!');
	    		}
			}
			
    	}

    	$this->assign('friend_links',$friend_links); //把变量输出给view模板使用,使用时不是循环就要加$
    	return $this->fetch('friend_link_edit');
    }




    //删除操作
    public function friend_link_del(){
    	$delId = input('id');
    	
		if(db('friend_link')->delete($delId)){  //删除操作是返回删除的条数
			$this->success('友情链接删除成功！');
		}else{
			$this->error('友情链接删除失败！');
		}
    	
    	
    }


    // public function logout(){
    //     session(null);
    //     $this->success('退出成功','login/index');
    // }





}
