<?php
namespace app\index\controller;

use think\Controller;

class MovieShare extends Controller
{
    public function index()
    {
        // 获取电影的详细信息
        $movie_id = input('movie_id');
        $movie_detail = db('movie')->find($movie_id); 


        // 右侧的电影推荐
        $recommend_movie = db('movie')->where('id','neq',$movie_id)->where('state',1)->limit(8)->select();

        



        $this->assign(array(
            'movie_detail'=>$movie_detail,
            'recommend_movie'=>$recommend_movie,
            ));


    	return $this->fetch("movieShare");

    }


}
