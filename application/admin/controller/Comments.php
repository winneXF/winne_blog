<?php
namespace app\admin\controller;
use app\admin\controller\Base;
class Comments extends Base
{

    public function comments_list()
    {
    	
        //comments表和user表的连接查询(得到user表中的username)
        $comments = db('comments')->alias('c')->join('user u','c.user_id = u.id')->field('c.id,c.content,c.up_num,c.pic,c.create_time,u.username')->order("create_time desc")->paginate(8);
        $this->assign('comments',$comments); //把comments传到模板页进行循环输出
    	return $this->fetch('comments_list');

    }

  

    //修改评论信息操作
    public function comments_edit(){

    	$editId = input('id');
    	$comments = db('comments')->find($editId); //根据id在数据库中找出那条数据
    	
    	if(request()->isPost()){  //判断是否是提交信息

    		$data = [
                'id' => $editId,    //修改的时候一定要添加主键，不然修改的时候有时会报错，说缺少更新条件
                'up_num' => input('up_num'),         
                'content' => input('content'),
            ];  

            //unlink('uppic/'.$img);
            //判断是否有选择文件
            if($_FILES['pic']['tmp_name']){
                if($comments['pic'] != ""){
                    // 绝对路径才能删除
                    $url=$_SERVER["DOCUMENT_ROOT"]."/static".$comments['pic'];
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

			$save = db('comments')->update($data);
			if($save !== false){  
			//update 方法返回影响数据的条数，没修改任何数据返回 0
    			$this->success('评论修改成功！','comments/comments_list');  //成功后跳转到listF页面
    		}else{  //当修改的数据完全没有变化时，好像返回0，就是没有影响数据更新
    			
    			$this->error('评论修改失败!');
    		}
			
    	}
    	$this->assign('comments',$comments); //把变量输出给view模板使用,使用时不是循环就要加$
    	return $this->fetch('comments_edit');
    }




    //删除操作
    public function comments_del(){
    	$delId = input('id');
		if(db('comments')->delete($delId)){  //删除操作是返回删除的条数
			$this->success('评论删除成功！');
		}else{
			$this->error('评论删除失败！');
		}
    	
    }





}
