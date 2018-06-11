<?php
namespace app\admin\controller;
use app\admin\controller\Base;
class Movie extends Base
{

    public function movie_list()
    {
    	//内置分页
    	$list = db('movie')->paginate(6);
    	$this->assign('list',$list); //把list传到模板页进行循环输出
    	return $this->fetch('movie_list');

    }
    public function movie_add()
    {
    	if(request()->isPost()){
    		$data = [
                'title' => input('title'),
                'movie_type' => input('movie_type'),
                'language' => input('language'),
                'recommend_num' => input('recommend_num'),
                'movie_time' =>input('movie_time') , 
                'download_desc' => input('download_desc'), 
                'download_url' => input('download_url'),  
                'top_desc' => input('top_desc'),  
                'movie_content' => input('movie_content'),
                'create_time' => date("Y-m-d"),
            ];
            //判断是否推荐
            if(input('state') == 'on'){
                $data['state'] = 1;
            }else{
                 $data['state'] = 0;
            }
            //判断是否首页推荐，覆盖上面的推荐
            if(input('indexstate') == 'on'){
                $data['state'] = 2;
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

    		$validate = validate('Movie');
			if(!$validate->scene('addF')->check($data)){
			    $this->error($validate->getError());
			    die;
			}
			// 查询用户名称是否重复了
			if( db('movie')->where('title',input('title'))->find() ){
				$this->error('电影已存在，不能重复!');
			}else{
				if(db('movie')->insert($data)){
    			//第二个参数是跳转到当前空间的某个方法
	    			return $this->success('电影推荐成功！','movie_list'); 
	    		}else{
	    			return $this->error('电影推荐失败！'); 
	    		}
			}

    		
    		return;
    	}
    	return $this->fetch('movie_add');

    }

    //修改电影操作
    public function movie_edit(){

    	$editId = input('id');
    	$editName = input('title');
    	$movies = db('movie')->find($editId); //根据id在数据库中找出那条数据
    	
    	if(request()->isPost()){  //判断是否是提交信息

    		$data = [
                'id' => $editId,
                'title' => input('title'),
                'movie_type' => input('movie_type'),
                'language' => input('language'),
                'recommend_num' => input('recommend_num'),
                'movie_time' =>input('movie_time') , 
                'download_desc' => input('download_desc'), 
                'download_url' => input('download_url'),  
                'top_desc' => input('top_desc'),  
                'movie_content' => input('movie_content'),
                'create_time' => date("Y-m-d"),
            ];
            //判断是否推荐
            if(input('state') == 'on'){
                $data['state'] = 1;
            }else{
                 $data['state'] = 0;
            }
            //判断是否首页推荐，覆盖上面的推荐
            if(input('indexstate') == 'on'){
                $data['state'] = 2;
            }
            
            //判断是否有选择文件
            if($_FILES['pic']['tmp_name']){

                if($movies['pic'] != ""){
                    // 绝对路径才能删除
                    $url=$_SERVER["DOCUMENT_ROOT"]."/static".$movies['pic'];
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
    		$validate = validate('Movie');
			if(!$validate->scene('editF')->check($data)){
			    $this->error($validate->getError());
			    die;
			}

			if( db('movie')->where('title',$editName)->where('id','neq',$editId)->find() ){
				$this->error('电影已存在，不能重复!');
			}else{
				$save = db('movie')->update($data);
				if($save !== false){ //用变量存储，这样就算原来的保持不变，那么也是修改成功 
				//update 方法返回影响数据的条数，没修改任何数据返回 0
	    			$this->success('电影修改成功！','movie/movie_list');  //成功后跳转到listF页面
	    		}else{  //当修改的数据完全没有变化时，返回0，就是没有影响数据更新
	    			dump($data);
	    			$this->error('电影修改失败!');
	    		}
			}
			
    	}

    	$this->assign('movies',$movies); //把变量输出给view模板使用,使用时不是循环就要加$
    	return $this->fetch('movie_edit');
    }




    //删除操作
    public function movie_del(){
    	$delId = input('id');
    	
		if(db('movie')->delete($delId)){  //删除操作是返回删除的条数
			$this->success('电影删除成功！');
		}else{
			$this->error('电影删除失败！');
		}
    	
    	
    }


    // public function logout(){
    //     session(null);
    //     $this->success('退出成功','login/index');
    // }





}
