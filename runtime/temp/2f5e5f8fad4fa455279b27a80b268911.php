<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:91:"F:\website\php.travel.com\winne_blog\public/../application/index\view\html_games\mario.html";i:1524491612;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>HTML5超级玛丽游戏重体验</title>
</head>

<body>
<div id="wrap"></div>

</body>
<script src="__PUBLIC__js/cnGame_v1.0.js"></script>
<script>
var canvas=document.createElement("canvas");
canvas.innerHTML="请使用支持canvas的浏览器查看";
canvas.id="gameCanvas";
var wrap=document.getElementById("wrap");
wrap.appendChild(canvas);
/* 图片src对象 */
var srcObj={
    startSrc:"__PUBLIC__images/gamestart.png",
    backgroundSrc:"__PUBLIC__images/background.png",
    enemySrc:"__PUBLIC__images/enemy.png",
    playerSrc:"__PUBLIC__images/player.png",
    stoneSrc:"__PUBLIC__images/stone.png",
    stoneSrc2:"__PUBLIC__images/stone2.png",
    pillarSrc:"__PUBLIC__images/pillar.png",
    bulletSrc:"__PUBLIC__images/bullet.png"
}
/* 初始化 */
cnGame.init('gameCanvas',{width:500,height:400});

var gameStart=function(){
    cnGame.loader.start([srcObj.backgroundSrc,srcObj.playerSrc,srcObj.enemySrc,srcObj.stoneSrc,srcObj.stoneSrc2,srcObj.bulletSrc,srcObj.pillarSrc],maryGame);
    cnGame.input.clearDownCallbacks("enter");//保证只执行一次
}
/* 游戏开始界面对象 */
var menuObj={
    initialize:function(){
        
        cnGame.context.drawImage(cnGame.loader.loadedImgs[srcObj.startSrc],0,0,cnGame.width,cnGame.height);//画出开始界面
    
        var text=cnGame.shape.Text("超级玛丽游戏demo",{x:20,y:280,style:"#FFF",font:"bold 22px sans-serif"});
        text.draw();
        text=cnGame.shape.Text("by Cson",{x:145,y:300,style:"#FFF",font:"15px sans-serif"});
        text.draw();
        text=cnGame.shape.Text("按回车键开始",{x:40,y:350,style:"#FFF",font:"bold 18px sans-serif"});
        text.draw();
        text=cnGame.shape.Text("方向键控制移动和跳跃",{x:30,y:380,style:"#FFF",font:"bold 14px sans-serif"});
        text.draw();
        cnGame.input.onKeyDown("enter",gameStart);
        cnGame.input.preventDefault("enter");
    }
}



    
/* 游戏对象 */
var maryGame=(function(){
    var spriteList=[];//所有sprite的数组
    var floorY=cnGame.height-40;//地面Y坐标

    /* 玩家对象 */
    var player=function(options){
        this.init(options); 
        this.speedX=0;
        this.preSpeedX=0;
        this.moveSpeed=10;
        this.jumpSpeed=-10;
        this.speedY=0;
        this.moveDir;
        this.isJump=false;
    }
    cnGame.core.inherit(player,cnGame.Sprite);
    player.prototype.initialize=function(){
        this.addAnimation(new cnGame.SpriteSheet("playerRight",srcObj.playerSrc,{frameSize:[50,60],loop:true,width:150,height:60}));
        this.addAnimation(new cnGame.SpriteSheet("playerLeft",srcObj.playerSrc,{frameSize:[50,60],loop:true,width:150,height:120,beginY:60}));
    }
    player.prototype.moveRight=function(){
        if(cnGame.core.isUndefined(this.moveDir)||this.moveDir!="right"){
        
            this.moveDir="right";
            this.speedX<0&&(this.speedX=0);
            this.setMovement({aX:10,maxSpeedX:15});
            this.setCurrentAnimation("playerRight");
        }
    }
    player.prototype.moveLeft=function(){
        if(cnGame.core.isUndefined(this.moveDir)||this.moveDir!="left"){
        
            this.moveDir="left";
            this.speedX>0&&(this.speedX=0);
            this.setMovement({aX:-10,maxSpeedX:15});
            this.setCurrentAnimation("playerLeft");
        }
    }
    player.prototype.jump=function(){
    if(!this.isJump){
            this.isJump=true;
            this.setMovement({aY:50,speedY:-18});
            if(this.speedX<0){
                this.setCurrentImage(srcObj.playerSrc,100,60);
            }
            else{
                this.setCurrentImage(srcObj.playerSrc,100);
            }
        
        }
        else{
            var speedY=this.speedY;
            if(speedY<0){
                speedY-=1;
            }
            this.setMovement({speedY:speedY});
            
        }
    
        
    }
    player.prototype.stopMove=function(){
        if(!this.isJump){
            if(this.speedX<0){
                this.setCurrentImage(srcObj.playerSrc,0,60);
            }
            else if(this.speedX>0){
                this.setCurrentImage(srcObj.playerSrc);
            }   
            this.moveDir=undefined;
            this.resetMovement();
        }
    }
    player.prototype.update=function(){
        player.prototype.parent.prototype.update.call(this);//调用父类update
        
        if(this.isJump){
        //如果在跳跃中则X加速度为0
            this.setMovement({aX:0});
        }
        if(this.y>=floorY-this.height&&this.speedY>0){
            this.isJump=false;
            this.moveDir=undefined;
            this.y=floorY-this.height
            this.setCurrentImage(srcObj.playerSrc);
            this.speedY=0;
        }
        if(cnGame.input.isPressed("up")){
            this.jump();
            
        }
        else if(cnGame.input.isPressed("right")){
            this.moveRight();   
        }
        else if(cnGame.input.isPressed("left")){
            this.moveLeft();
        }
        else{
            this.stopMove();
        }
        
        
    }
    /* 玩家死亡 */
    player.prototype.die=function(){
        alert("U lost!");
        cnGame.loop.end();
    };
    
    

    /* 敌人对象 */
    var enemy=function(options){
        this.init(options);
        this.speedX=options.speedX;

    }
    cnGame.core.inherit(enemy,cnGame.Sprite);

    /* 敌人死亡 */
    enemy.prototype.die=function(){
        this.setCurrentAnimation("enemyDie");
        this.hasDie=true;
        this.speedX=0;
    };
    /* 飞弹对象 */
    var bullet=function(options){
        this.init(options);
        this.speedX=options.speedX;
    }
    cnGame.core.inherit(bullet,cnGame.Sprite);

    
    
    /* 敌人对象管理器 */
    var enemyManager=(function(){   
        return{
            createEnemy:function(){
                var newEnemy=new enemy({src:srcObj.enemySrc,width:50,height:48,x:cnGame.width,y:floorY-48,speedX:-3});
                newEnemy.addAnimation(new cnGame.SpriteSheet("enemyDie",srcObj.enemySrc,{frameSize:[50,48],width:150,height:48}));
                spriteList.push(newEnemy);
            
            },
            createBullet:function(){
                var randomArr=[45,130,180];
                var ranNum=randomArr[Math.floor(Math.random()*3)];
                var newBullet=new bullet({src:srcObj.bulletSrc,width:56,height:35,x:cnGame.width,y:floorY-ranNum,speedX:-15});
                spriteList.push(newBullet);
            }
            
        }
    })();
    
    /* 石头 */
    var stone=function(options){
        this.init(options);
    }
    cnGame.core.inherit(stone,cnGame.Sprite);
    
    /* 玩家与其他游戏元素的碰撞检测 */
    var coliDetect=function(player,spriteList){
            var playerRect=player.getRect();
            var enemyRect;
            for(var i=0,len=spriteList.length;i<len;i++));
                                }
                                else{
                                    player.die();
                                }
                            }
                            else if(spriteList[i] instanceof bullet){
                                player.die();
                            }
                            else if(spriteList[i] instanceof stone){
                                if(playerRect.bottom>spriteRect.y&&playerRect.y+playerRect.height/2<spriteRect.y){
                                    player.y=spriteRect.y-player.height;    //修正y，使player在石头上，并且不再和石头产生collision    
                                    spriteList[i].state="on";
                                    player.setMovement({speedY:0,aY:0});//踩上石头后速度和Y加速度为0
                                    player.isJump=false;
                                    player.moveDir=undefined;
                                                
                                }
                                else if(playerRect.y<spriteRect.bottom&&playerRect.bottom-playerRect.height/2>spriteRect.bottom){
                                    var speed=player.speedY;//从下往上撞石头则速度取反，弹回
                                    speed*=-1;
                                    player.setMovement({speedY:speed});
                                    player.y=spriteRect.y+spriteRect.height;//修正y
                                }
                                
                                else if(player.speedX<0){
                                    player.setMovement({speedX:0,aX:0});
                                    player.x=spriteList[i].x+spriteList[i].width;           
                                }
                                else if(player.speedX>0){
                                    player.x=spriteList[i].x-player.width;
                                    player.setMovement({speedX:0,aX:0});
                                }   
                            }
                        }
                    }       
                }
                for(var i=0,len=spriteList.length;i<len;i++){
                    if(spriteList[i] instanceof stone){
                        var spriteRect=spriteList[i].getRect();
                        //当player离开石头，则恢复向下的重力加速度
                    
                        if((spriteList[i].state=="on"&&(playerRect.x+playerRect.width<spriteRect.x||playerRect.x>spriteRect.right))&&player.y==spriteRect.y-player.height){
                            spriteList[i].state=undefined;
                            player.isJump=true;
                            player.setMovement({speedY:0,aY:17});
                        }
                    }
                        
                    spriteList[i].update();
            
                    
                }
    
    }

    return {
        initialize:function(){
            cnGame.input.preventDefault(["left","right","up","down"]);
        
            this.player=new player({src:srcObj.playerSrc,width:50,height:60,x:0,y:floorY-60});
            this.player.initialize();
            spriteList.push(this.player);
            
            
            var newStone=new stone({src:srcObj.stoneSrc2,width:128,height:33,x:550,y:floorY-100});
            spriteList.push(newStone);
            newStone=new stone({src:srcObj.stoneSrc,width:219,height:30,x:720,y:floorY-200});
            spriteList.push(newStone);
            newStone=new stone({src:srcObj.stoneSrc,width:219,height:30,x:1000,y:floorY-120});
            spriteList.push(newStone);
            newStone=new stone({src:srcObj.stoneSrc,width:219,height:30,x:1190,y:floorY-240});
            spriteList.push(newStone);
            newStone=new stone({src:srcObj.stoneSrc2,width:128,height:33,x:1700,y:floorY-220});
            spriteList.push(newStone);
            newStone=new stone({src:srcObj.stoneSrc2,width:128,height:33,x:1900,y:floorY-240});
            spriteList.push(newStone);
            
            newStone=new stone({src:srcObj.pillarSrc,width:91,height:75,x:200,y:floorY-75});
            spriteList.push(newStone);
            newStone=new stone({src:srcObj.pillarSrc,width:91,height:75,x:900,y:floorY-75});
            spriteList.push(newStone);
            newStone=new stone({src:srcObj.pillarSrc,width:91,height:75,x:1500,y:floorY-75});
            spriteList.push(newStone);
            
            this.background=new cnGame.View({src:srcObj.backgroundSrc,player:this.player,imgWidth:2301});
            this.background.centerPlayer(true);
            this.background.insideView(this.player,"x");
            this.times=0;
            this.times2=0;
            enemyManager.createEnemy();
    
        },
        update:function(){
            this.times++;
            this.times2++;
            if(this.times==100){  //每100次游戏循环 添加一次敌人
                this.times=0;
                enemyManager.createEnemy();
            }
            if(this.times2==150){  //每150次游戏循环 添加一次飞弹
                this.times2=0;
                enemyManager.createBullet();
            }
            coliDetect(this.player,spriteList);
            this.background.update(spriteList);
            
        },
        draw:function(){
            this.background.draw();
            for(var i=0,len=spriteList.length;i<len;i++){
                spriteList[i].draw();
            }
        }
    
    }


})();

cnGame.loader.start([srcObj.startSrc],menuObj);

</script>
</html>
