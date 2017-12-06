<?php
namespace app\admin\controller;
use think\Controller;
class Update extends controller
{
  public function update()
{
  $param_arr = array_keys($_GET);
  $catCurrent = \think\Db::table('blog_category')->where('id',$_GET[$param_arr[1]])->select();
  $catName =  \think\Db::table('blog_category')->select();
  $titleName = isTitle($catName[0]['cat_name'],$catName[1]['cat_name'],$catName[2]['cat_name']);
  $info=config(
  'siteName'
  );
  $this->assign('info',$info);
  $this->assign('catName',$catName);
  $this->assign('titleName',$titleName);
  $this->assign('catCurrent',$catCurrent);
  return $this->fetch();
}
}
