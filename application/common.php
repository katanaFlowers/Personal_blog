<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
//判断登陆

function isLogin()
{
  if(isset($_SESSION['username'])&&$_SESSION['username']=='admin')
  {
    return ture;
  }
  else return false;
}
//判断title
function isTitle($value1,$value2,$value3)
{
  if(isset($_GET)){
   if(array_key_exists('cat',$_GET)){
  switch($_GET['cat']){
    case '1' :
    case '2' :
    case '3' :
    case '4' : $title=$value1;break;
      case '5' : $title=$value2;break;
        case '6' : $title=$value3;break;
  }
  return $title;
}
  elseif(array_key_exists('act',$_GET))
  return $title='后台管理';
  else
    return $title="-喃楠楠- 的个人博客";
}
}
//选择随机5条数据库数据
function do_art_table($table)
{
  $result=\think\Db::table($table)->where('cat_id','<',5)->select();
  if(count($result)<6)
  {
    $value = $result;
  } else {
  for($i=1;$i<=5;$i++){
    $value[]=$result[rand(0,count($result)-1)];
  }
}
    return $value;
}
//分页数据输出
function do_page($table,$where,$order)
{
  $num = config('num');
  $page = isset($_GET['page']) ? $_GET['page'] : 1;
  $offset = ($page-1)*$num;
  $result = \think\Db::query("select * from `{$table}` {$where} {$order} limit $offset,$num");
  return $result;
}
//返回分页后的总页数
function do_sum_page()
{
  $sum= config('num');
  $result = \think\Db::table('blog_article')->select();
  $value = ceil(count($result)/$sum);
  $value == 0 ? $value = 1 : $value= $value ;
  return $value ;
}

//编页函数,返回总页数
function do_pagi($art)
{
  $num = config('num');
  $count = count($art);
  $page = ceil($count/$num);
  $page == 0 ? $page=1:$page= $page;
  return $page;
}
//获取当前url参数
function getUrl()
{
  $key=key($_GET);
  $value=current($_GET);
  return $url=$key.'='.$value;
}
//选择数据库博文
function selectArt()
{
  $keys=array_keys($_GET);
  $result =  \think\Db::query("select * from `blog_article` where `id`={$_GET[$keys[1]]} ");
  return $result;
}
//右侧信息时间/博文数量
function rightInfor()
{
  $user = \think\Db::table('blog_user')->select();
  $newTime = time();
  $newYear = date('Y',$newTime);
  $newMon = date('m',$newTime);
  $userY = date('Y',$user[0]['create_time']);
  $userM = date('m',$user[0]['create_time']);
  $year = $newYear - $userY;
  $mon = $newMon - $userM;
  $result1 = \think\Db::table('blog_article')->where('cat_id','<',5)->select();
  $tech = count($result1);
  $result2 = \think\Db::table('blog_article')->where('cat_id','=',5)->select();
  $konomi = count($result2);
  $result3 = \think\Db::table('blog_article')->where('cat_id','=',6)->select();
  $diary = count($result3);
  return $data=[
     'year'=>$year,
     'mon' =>$mon,
     'tech' => $tech,
     'konomi' =>$konomi,
     'diary' => $diary
  ];
}
//获取友情链接
function  getLink()
{
  $value = \think\Db::table('blog_link')->select();
  return $value;
}
