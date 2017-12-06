<?php
namespace app\admin\controller;
use think\Controller;
class Write extends controller
{
  public function write()
  {

    //foreach($value as $vo)
  //  echo $vo['cat'].$vo['name'];
$catName =  \think\Db::table('blog_category')->select(); // dump($catName);
$titleName = isTitle($catName[0]['cat_name'],$catName[1]['cat_name'],$catName[2]['cat_name']);
$value = \think\Db::table('blog_article')->select();
$count = count($value);
 $info=config(
 'siteName'
 );
$this->assign('info',$info);
 $this->assign('catName',$catName);
$this->assign('titleName',$titleName);
$this->assign('count',$count);
return $this->fetch();
  }
  public function artEdit()
  {
    $url =$_GET['id'];
    $information = \think\Db::table('blog_article')->select($url);
    //dump($information);
    $order = $information[0]['order'];
$catName =  \think\Db::table('blog_category')->select(); // dump($catName);
$titleName = isTitle($catName[0]['cat_name'],$catName[1]['cat_name'],$catName[2]['cat_name']);
$value = \think\Db::table('blog_article')->select();
 $count = count($value);
  $info=config(
  'siteName'
 );
$this->assign('info',$info);
 $this->assign('catName',$catName);
$this->assign('titleName',$titleName);
  $this->assign('count',$count);
$this->assign('information',$information);
$this->assign('order',$order);
$this->assign('url',$url);
  return $this->fetch();
  }
}
