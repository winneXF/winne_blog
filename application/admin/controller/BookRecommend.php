<?php
namespace app\admin\controller;
use app\admin\controller\Base;
class BookRecommend extends Base
{

    public function book_recommend_list()
    {
    	//内置分页
    	$list = db('book_recommend')->paginate(6);
    	$this->assign('list',$list); //把list传到模板页进行循环输出
    	return $this->fetch('book_recommend_list');

    }
    public function book_recommend_add()
    {
    	if(request()->isPost()){
            //dump($_POST);die;
            $data = [
                'bookname' => input('bookname'),
                'publish_time' => input('publish_time'),
                'author' => input('author'),
                'recommend_num' => input('recommend_num'),
                'page_num' =>input('page_num') , 
                'recommend_desc' => input('recommend_desc'), 
                'recommend_show_desc' => input('recommend_show_desc'),  
                'top_desc' => input('top_desc'),  
                'book_type' => input('book_type'),  
                'content' => input('content'),
                'book_time' => date("Y-m-d"),
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


            $validate = validate('Book');

            if(!$validate->scene('addF')->check($data)){
                $this->error($validate->getError());
                die;
            }

            if( db('book_recommend')->where('bookname',input('bookname'))->find() ){
                $this->error('推荐书籍已存在，不能重复!');
            }else{
                if(db('book_recommend')->insert($data)){
                //第二个参数是跳转到当前空间的某个方法
                    return $this->success('添加书籍成功！','book_recommend_list'); 
                }else{
                    return $this->error('添加书籍失败！'); 
                }
            }
            
            return;
        }
        //把所属导航栏目传入模板视图
        // $nav = db('nav')->where("fatherid",'eq' ,0)->select();
        // $this->assign('nav',$nav);

        return $this->fetch('book_recommend_add');

    }

    //修改用户信息操作
    public function book_recommend_edit(){

    	$editId = input('id');
    	$editName = input('bookname');
    	$book_recommends = db('book_recommend')->find($editId); //根据id在数据库中找出那条数据
    	
    	if(request()->isPost()){  //判断是否是提交信息

    		$data = [
                'id' => $editId,
                'bookname' => input('bookname'),
                'publish_time' => input('publish_time'),
                'author' => input('author'),
                'recommend_num' => input('recommend_num'),
                'page_num' =>input('page_num') , 
                'recommend_desc' => input('recommend_desc'), 
                'recommend_show_desc' => input('recommend_show_desc'),  
                'top_desc' => input('top_desc'),  
                'book_type' => input('book_type'),  
                'content' => input('content'),
                'book_time' => date("Y-m-d"),
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

                if($book_recommends['pic'] != ""){
                    // 绝对路径才能删除
                    $url=$_SERVER["DOCUMENT_ROOT"]."/static".$book_recommends['pic'];
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
    		$validate = validate('Book');
			if(!$validate->scene('editF')->check($data)){
			    $this->error($validate->getError());
			    die;
			}

			if( db('book_recommend')->where('bookname',$editName)->where('id','neq',$editId)->find() ){
				$this->error('书籍已存在，不能重复!');
			}else{
				$save = db('book_recommend')->update($data);
				if($save !== false){ //用变量存储，这样就算原来的保持不变，那么也是修改成功 
				//update 方法返回影响数据的条数，没修改任何数据返回 0
	    			$this->success('推荐书籍修改成功！','book_recommend/book_recommend_list');  //成功后跳转到listF页面
	    		}else{  //当修改的数据完全没有变化时，返回0，就是没有影响数据更新
	    			dump($data);
	    			$this->error('推荐书籍修改失败!');
	    		}
			}
			
    	}

    	$this->assign('book_recommends',$book_recommends); //把变量输出给view模板使用,使用时不是循环就要加$
    	return $this->fetch('book_recommend_edit');
    }




    //删除操作
    public function book_recommend_del(){
    	$delId = input('id');
    	
		if(db('book_recommend')->delete($delId)){  //删除操作是返回删除的条数
			$this->success('推荐书籍删除成功！');
		}else{
			$this->error('推荐书籍删除失败！');
		}
    	
    	
    }


    // public function logout(){
    //     session(null);
    //     $this->success('退出成功','login/index');
    // }





}
