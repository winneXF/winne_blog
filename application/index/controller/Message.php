<?php
namespace app\index\controller;

use app\index\controller\BaseMain;

class Message extends BaseMain
{
    public function index()
    {
        //评论数据获取
        $comments = db('comments')->alias('c')->join('user u','c.user_id = u.id')->field('c.id,c.content,c.pic,c.up_num,c.create_time,c.user_id,u.username')->order('create_time desc')->paginate(5);
        
        $commentNum = count($comments);
//dump($commentNum);
        // 获取回复数据（两次连表，为了有两层回复的名字）
        $replays = db('replay')->alias('r')->join('user u','r.from_uid = u.id')->field('r.id,r.comment_id,r.replay_content,r.from_uid,r.to_uid,r.replay_time,u.username as from_name')->join('user us','r.to_uid = us.id')->field('r.id,r.comment_id,r.replay_content,r.from_uid,r.to_uid,r.replay_time,u.username as from_name,us.username as to_name')->select();
        // dump($replays);
        // die;
      $this->assign(array(
            'comments'=>$comments,
            'commentNum'=>$commentNum,
            'replays'=>$replays,
            ));

    	return $this->fetch("message");

    }

    public function up_click(){

        $data=input('post.');  //传入提交的信息
        $commentId = $data['id'];
        $upNum = $data['up_num'];
        //$comments = db('comments')->find($commentId); //根据id在数据库中找出那条数据
        
        if(request()->isPost()){  //判断是否是提交信息

            $save = db('comments')->update(['up_num' => $upNum,'id'=>$commentId]);
           // echo json_encode(array('code'=>$commentId,'msg'=>$upNum));
            if($save !== false){
                echo json_encode(array('code'=>1,'msg'=>'请求数据库修改成功！'));
            }else{
                 echo json_encode(array('code'=>0,'msg'=>'请求数据库修改失败！'));
            }
        }

    }

    public function repaly(){
        $data=input('post.');  //传入提交的信息

        $commentId = $data['comment_id'];
        // $upNum = $data['up_num'];
        //$replays = db('replay')->where('comment_id','eq',$commentId)->select(); //根据id在数据库中找出那条数据
        
        if(request()->isPost()){  //判断是否是提交信息

            $datas = [
                'comment_id' => $data['comment_id'],
                'from_uid' => $data['from_uid'],
                'to_uid' => $data['to_uid'],
                'replay_content' => $data['replay_content'],
                'replay_time' =>date("Y-m-d H:i:s"),
                ];
                $replays = db('user')->where('id','eq',$data['from_uid'])->find();
                // 如果用户不是禁用状态
                if($replays['state']){
                    $num = db('replay')->insert($datas);
                    // echo json_encode(array('code'=>2,'msg'=>$num));  
                    if($num){
                        echo json_encode(array('code'=>2,'msg'=>'回复成功',"data"=>$replays['state']));
                    }else{
                        echo json_encode(array('code'=>1,'msg'=>'回复失败'));
                    }
                }else{
                        echo json_encode(array('code'=>1,'msg'=>'您已被禁用！不能回复，请规范行为！'));
                    }
                
        }
    }

    public function comment_mes(){
       // echo json_encode(array('code'=>2,'msg'=>'成功评论','data'=>'ddd'));  
        $data=input('post.');  //传入提交的信息
        $userId = $data['user_id'];
        if(request()->isPost()){  //判断是否是提交信息

            $datas = [
                'content' => $data['content'],
                'user_id' => $data['user_id'],
                'create_time' => date("Y-m-d H:i:s"),
                ];
                $con = db('user')->where('id','eq',$userId)->find();
                //echo json_encode(array('code'=>2,'msg'=>'评论成功','data'=>$con['state']));
                if($con['state']){
                    $num = db('comments')->insert($datas);
                    //echo json_encode(array('code'=>2,'msg'=>'成功评论','data'=>$num));
                    if($num){
                       
                        echo json_encode(array('code'=>2,'msg'=>'评论成功','data'=>$con['state']));
                    }else{
                        echo json_encode(array('code'=>1,'msg'=>'评论失败'));
                    }
                }else{
                        echo json_encode(array('code'=>1,'msg'=>'您已被禁用！不能评论，请规范行为！'));
                    }
                
         }













    }


}
