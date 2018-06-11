<?php
namespace app\admin\controller;
use app\admin\controller\Base;
class Replay extends Base
{

    public function replay_list()
    {
    	
        //replay表和user表的连接查询(得到user表中的username)
        $replays = db('replay')->alias('r')->join('user u','r.from_uid = u.id')->field('r.id,r.comment_id,r.replay_content,r.from_uid,r.to_uid,r.replay_time,u.username as from_name')->join('user us','r.to_uid = us.id')->field('r.id,r.comment_id,r.replay_content,r.from_uid,r.to_uid,r.replay_time,u.username as from_name,us.username as to_name')->paginate(8);
        $this->assign('replays',$replays); //把replay传到模板页进行循环输出
    	return $this->fetch('replay_list');

    }

  

    //修改回复信息操作
    public function replay_edit(){

    	$editId = input('id');
    	$replays = db('replay')->find($editId); //根据id在数据库中找出那条数据
    	
    	if(request()->isPost()){  //判断是否是提交信息

    		$data = [
                'id' => $editId,    //修改的时候一定要添加主键，不然修改的时候有时会报错，说缺少更新条件
              
                'replay_content' => input('replay_content'),
            ];  

			$save = db('replay')->update($data);
			if($save !== false){  
			//update 方法返回影响数据的条数，没修改任何数据返回 0
    			$this->success('回复修改成功！','replay/replay_list');  //成功后跳转到listF页面
    		}else{  //当修改的数据完全没有变化时，好像返回0，就是没有影响数据更新
    			
    			$this->error('回复修改失败!');
    		}
			
    	}
    	$this->assign('replays',$replays); //把变量输出给view模板使用,使用时不是循环就要加$
    	return $this->fetch('replay_edit');
    }




    //删除操作
    public function replay_del(){
    	$delId = input('id');
		if(db('replay')->delete($delId)){  //删除操作是返回删除的条数
			$this->success('回复删除成功！');
		}else{
			$this->error('回复删除失败！');
		}
    	
    }





}
