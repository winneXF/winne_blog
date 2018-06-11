<?php
namespace app\admin\controller;
use app\admin\controller\Base;
class ToolsName extends Base
{

    public function tools_name_list()
    {
    	//内置分页
    	$list = db('tool_tabname')->paginate(6);
    	$this->assign('list',$list); //把list传到模板页进行循环输出
    	return $this->fetch('tools_name_list');

    }
    public function tools_name_add()
    {
    	if(request()->isPost()){
    		$data = [
 				'tabname' => input('tabname'),
    		];
            
            if($_FILES['bg_url']['tmp_name']){
                // 获取表单上传文件 例如上传了001.jpg
                 $file = request()->file('bg_url');
                 // 移动到框架应用根目录/public/static/uploads/ 目录下
                 $info = $file->move(ROOT_PATH . 'public' . DS . 'static/uploads');
                // dump($info);die;
                 $picName = '/uploads/'.$info->getSaveName();
                 // 背景图中的路径斜杠很重要，不一致的话会显示不出来而报错
                 $data['bg_url'] =  str_replace('\\', '/', $picName);
            }else{
                $data['bg_url'] = '';
            }

    		$validate = validate('Tabname');
			if(!$validate->scene('addF')->check($data)){
			    $this->error($validate->getError());
			    die;
			}
			// 查询工具tab名称名称是否重复了
			if( db('tool_tabname')->where('tabname',input('tabname'))->find() ){
				$this->error('工具tab名称已存在，不能重复!');
			}else{
				if(db('tool_tabname')->insert($data)){
    			//第二个参数是跳转到当前空间的某个方法
	    			return $this->success('添加工具tab名称成功！','tools_name_list'); 
	    		}else{
	    			return $this->error('添加工具tab名称失败！'); 
	    		}
			}

    		
    		return;
    	}
    	return $this->fetch('tools_name_add');

    }

    //修改工具tab名称信息操作
    public function tools_name_edit(){

    	$editId = input('id');
    	$editName = input('tabname');
    	$tools_names = db('tool_tabname')->find($editId); //根据id在数据库中找出那条数据
    	
    	if(request()->isPost()){  //判断是否是提交信息

    		$data = [
    			'id' => $editId,
    			'tabname' => $editName,
    		];

            if($_FILES['bg_url']['tmp_name']){

                if($tools_names['pic'] != ""){
                    // 绝对路径才能删除
                    $url=$_SERVER["DOCUMENT_ROOT"]."/static".$tools_names['pic'];
                    // 删除原来的图片
                    unlink($url);
                }   

                
                // 获取表单上传文件 例如上传了001.jpg
                 $file = request()->file('bg_url');
                 // 移动到框架应用根目录/public/static/uploads/ 目录下
                 $info = $file->move(ROOT_PATH . 'public' . DS . 'static/uploads');
                // dump($info);die;
                 $picName = '/uploads/'.$info->getSaveName();
                 // 背景图中的路径斜杠很重要，不一致的话会显示不出来而报错
                 $data['bg_url'] =  str_replace('\\', '/', $picName);
            }
           
    		//修改信息的验证
    		$validate = validate('Tabname');
			if(!$validate->scene('editF')->check($data)){
			    $this->error($validate->getError());
			    die;
			}

			if( db('tool_tabname')->where('tabname',$editName)->where('id','neq',$editId)->find() ){
				$this->error('工具tab名称信息已存在，不能重复!');
			}else{
				$save = db('tool_tabname')->update($data);
				if($save !== false){ //用变量存储，这样就算原来的保持不变，那么也是修改成功 
				//update 方法返回影响数据的条数，没修改任何数据返回 0
	    			$this->success('工具tab名称信息修改成功！','tools_name/tools_name_list');  //成功后跳转到listF页面
	    		}else{  //当修改的数据完全没有变化时，返回0，就是没有影响数据更新
	    			dump($data);
	    			$this->error('工具tab名称信息修改失败!');
	    		}
			}
			
    	}

    	$this->assign('tools_names',$tools_names); //把变量输出给view模板使用,使用时不是循环就要加$
    	return $this->fetch('tools_name_edit');
    }




    //删除操作
    public function tools_name_del(){
    	$delId = input('id');
    	//echo $delId;
    	
		if(db('tool_tabname')->delete($delId)){  //删除操作是返回删除的条数
			$this->success('工具tab名称删除成功！');
		}else{
			$this->error('工具tab名称删除失败！');
		}
    	
    	
    }


    // public function logout(){
    //     session(null);
    //     $this->success('退出成功','login/index');
    // }





}
