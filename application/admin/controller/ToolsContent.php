<?php
namespace app\admin\controller;
use app\admin\controller\Base;
class ToolsContent extends Base
{

    public function tools_content_list()
    {
    	//内置分页
    	$list = db('tool_tabcontent')->paginate(6);
        $list = db('tool_tabcontent')->alias('tc')->join('tool_tabname tn','tn.id = tc.tabid')->field('tc.id,tc.name,tc.create_time,tc.download_url,tn.bg_url,tc.state,tc.pic,tn.tabname')->paginate(8);
    	$this->assign('list',$list); //把list传到模板页进行循环输出
    	return $this->fetch('tools_content_list');

    }
    public function tools_content_add()
    {
    	if(request()->isPost()){
    		$data = [
                'name' => input('name'),
 				'tabid' => input('tabid'),
                'recommend_num' => input('recommend_num'),
                'soft_size' => input('soft_size'),
                'version' => input('version'),
                'download_url' => input('download_url'),
                'soft_content' => input('soft_content'),
                'soft_desc' => input('soft_desc'),
                'create_time' => date("Y-m-d"),
    		];

             //判断是否推荐
            if(input('state') == 'on'){
                $data['state'] = 1;
            }else{
                 $data['state'] = 0;
            }
            
            //判断是否有选择文件
            if($_FILES['pic']['tmp_name']){
                // 获取表单上传文件 例如上传了001.jpg
                 $file = request()->file('pic');
                 // 移动到框架应用根目录/public/static/uploads/ 目录下
                 $info = $file->move(ROOT_PATH . 'public' . DS . 'static/uploads');
                // dump($info);die;
                 // $picName = '/uploads/'.$info->getSaveName();
                 // dump($picName);
                 // dump(str_replace('\\', '/', $picName));
                 // die;
                 $data['pic'] = '/uploads/'.$info->getSaveName();
            }else{
                $data['pic'] = '';
            }

            // if($_FILES['bg_url']['tmp_name']){
            //     // 获取表单上传文件 例如上传了001.jpg
            //      $file = request()->file('bg_url');
            //      // 移动到框架应用根目录/public/static/uploads/ 目录下
            //      $info = $file->move(ROOT_PATH . 'public' . DS . 'static/uploads');
            //     // dump($info);die;
            //      $picName = '/uploads/'.$info->getSaveName();
            //      $data['bg_url'] =  str_replace('\\', '/', $picName);
            // }else{
            //     $data['bg_url'] = '';
            // }


    		$validate = validate('Tabcontent');
			if(!$validate->scene('addF')->check($data)){
			    $this->error($validate->getError());
			    die;
			}
			// 查询工具名称是否重复了
			if( db('tool_tabcontent')->where('name',input('name'))->find() ){
				$this->error('工具名称已存在，不能重复!');
			}else{
				if(db('tool_tabcontent')->insert($data)){
    			//第二个参数是跳转到当前空间的某个方法
	    			return $this->success('添加工具成功！','tools_content_list'); 
	    		}else{
	    			return $this->error('添加工具失败！'); 
	    		}
			}

    		
    		return;
    	}
        //所属的工具tab栏目
        $tabnameres = db('tool_tabname')->select();
        $this->assign('tabnameres',$tabnameres);
    	return $this->fetch('tools_content_add');

    }

    //修改工具操作
    public function tools_content_edit(){

    	$editId = input('id');
    	$editName = input('name');
    	$tools_contents = db('tool_tabcontent')->find($editId); //根据id在数据库中找出那条数据
    	
    	if(request()->isPost()){  //判断是否是提交信息

    		$data = [
                'id' => input('id'),
                'name' => input('name'),
                'tabid' => input('tabid'),
                'recommend_num' => input('recommend_num'),
                'soft_size' => input('soft_size'),
                'version' => input('version'),
                'download_url' => input('download_url'),
                'soft_content' => input('soft_content'),
                'soft_desc' => input('soft_desc'),
                'create_time' => date("Y-m-d"),
            ];

             //判断是否推荐
            if(input('state') == 'on'){
                $data['state'] = 1;
            }else{
                 $data['state'] = 0;
            }
            
            //判断是否有选择文件
            if($_FILES['pic']['tmp_name']){

                if($tools_contents['pic'] != ""){
                    // 绝对路径才能删除
                    $url=$_SERVER["DOCUMENT_ROOT"]."/static".$tools_contents['pic'];
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

            // if($_FILES['bg_url']['tmp_name']){
            //     // 获取表单上传文件 例如上传了001.jpg
            //      $file = request()->file('bg_url');
            //      // 移动到框架应用根目录/public/static/uploads/ 目录下
            //      $info = $file->move(ROOT_PATH . 'public' . DS . 'static/uploads');
            //     // dump($info);die;
            //      $picName = '/uploads/'.$info->getSaveName();
            //      // 背景图中的路径斜杠很重要，不一致的话会显示不出来而报错
            //      $data['bg_url'] =  str_replace('\\', '/', $picName);
            // }
    		//修改信息的验证
    		$validate = validate('Tabcontent');
			if(!$validate->scene('editF')->check($data)){
			    $this->error($validate->getError());
			    die;
			}

			if( db('tool_tabcontent')->where('name',$editName)->where('id','neq',$editId)->find() ){
				$this->error('工具名称已存在，不能重复!');
			}else{
				$save = db('tool_tabcontent')->update($data);
				if($save !== false){ //用变量存储，这样就算原来的保持不变，那么也是修改成功 
				//update 方法返回影响数据的条数，没修改任何数据返回 0
	    			$this->success('工具修改成功！','tools_content/tools_content_list');  //成功后跳转到listF页面
	    		}else{  //当修改的数据完全没有变化时，返回0，就是没有影响数据更新
	    			dump($data);
	    			$this->error('工具修改失败!');
	    		}
			}
			
    	}
         //所属的工具tab栏目
        $tabnameres = db('tool_tabname')->select();
        $this->assign('tabnameres',$tabnameres);
    	$this->assign('tools_contents',$tools_contents); //把变量输出给view模板使用,使用时不是循环就要加$
    	return $this->fetch('tools_content_edit');
    }

    

    //删除操作
    public function tools_content_del(){
    	$delId = input('id');
    	
		if(db('tool_tabcontent')->delete($delId)){  //删除操作是返回删除的条数
			$this->success('工具删除成功！');
		}else{
			$this->error('工具删除失败！');
		}
    	
    	
    }


    // public function logout(){
    //     session(null);
    //     $this->success('退出成功','login/index');
    // }





}
