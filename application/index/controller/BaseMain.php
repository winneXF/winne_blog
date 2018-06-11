<?php
namespace app\index\controller;
use think\Controller;
class BaseMain extends Controller
{
    public function _initialize()
    {
        //获取导航列表及子列表
         $cateres=db('nav')->where('fatherid',0)->select();
         foreach ($cateres as $k=> $v){
             $children=db('nav')->where('fatherid',$v['id'])->select();
             if($children){
                 $cateres[$k]['children']=$children;
                // dump($children);die;
             }else{
                 $cateres[$k]['children']=0;
             }
         }
        //dump($cateres);die;
         $this->assign('cateres',$cateres);





    }

    



}
