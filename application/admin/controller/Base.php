<?php
namespace app\admin\controller;
use think\Controller;
class Base extends Controller
{
    //在所有函数执行之前都会先执行这个_initialize初始函数
    public function _initialize(){
        //判断如果没有session中没有保留的username字段，那么就是没有登录(所有管理页面都需要先判断是否登录，所以作为一个基类来继承)
        if(!session('adminname')){
            $this->error('请先登录系统！','login/index');
        }
    }
}
