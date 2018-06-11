<?php
namespace app\index\controller;

use think\Controller;

class ToolsShare extends Controller
{
    public function index()
    {

        //工具的具体信息
        $tool_id = input('tool_id');
        $tool_detail = db('tool_tabcontent')->find($tool_id); 
        // dump($tool_detail);
        // die;

        // 右侧的工具推荐
        $recommend_tools = db('tool_tabcontent')->where('id','neq',$tool_id)->where('state',1)->limit(8)->select();


        $this->assign(array(
            'tool_detail'=>$tool_detail,
            'recommend_tools'=>$recommend_tools,
            ));

    

    	return $this->fetch("toolsShare");

    }

    // 下载次数存储
    public function tools_content_down(){
        $data=input('post.');  //传入提交的信息
        // echo json_encode(array('code'=>1,'msg'=>'请求数据库修改成功！','data'=>$data));
        $downId = $data['id'];
        $downNum = $data['download_num'];
        //$comments = db('tool_tabcontent')->find($downId); //根据id在数据库中找出那条数据
        
        if(request()->isPost()){  //判断是否是提交信息

            $save = db('tool_tabcontent')->update(['download_num' => $downNum,'id'=>$downId]);
           // echo json_encode(array('code'=>$downId,'msg'=>$downNum));
            if($save !== false){
                echo json_encode(array('code'=>1,'msg'=>'请求数据库修改成功！','num'=>$downNum));
            }else{
                 echo json_encode(array('code'=>0,'msg'=>'请求数据库修改失败！'));
            }
        }
        
        
        
    }



}
