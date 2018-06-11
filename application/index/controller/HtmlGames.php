<?php
namespace app\index\controller;

use app\index\controller\BaseMain;
class HtmlGames extends BaseMain
{
//HTML5猜杯子游戏
    public function guessing_cup()
    {

    	return $this->fetch('guessing_cup');

    }
//HTML5版切水果游戏
   public function fruit_cut()
    {

        return $this->fetch('fruit_cut');

    }
//HTML5五子棋游戏
    public function gobang()
    {

        return $this->fetch('gobang');

    }
//HTML5重力感应游戏
   public function gravity()
    {

        return $this->fetch('gravity');

    }
// HTML5贪吃蛇小游戏
    public function snake()
    {

        return $this->fetch('snake');

    }
// HTML5吃豆人游戏
   public function pcman()
    {

        return $this->fetch('pcman');

    }


}
