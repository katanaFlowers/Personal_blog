<?php
namespace app\admin\controller;
use think\Controller;
class Category extends controller
{
  public function category()
  {
    $catName =  \think\Db::table('blog_category')->select();
    $titleName = isTitle($catName[0]['cat_name'],$catName[1]['cat_name'],$catName[2]['cat_name']);
    $info=config(
    'siteName'
    );
    $data = rightInfor();
    $this->assign('data',$data);
    $this->assign('info',$info);
    $this->assign('catName',$catName);
    $this->assign('titleName',$titleName);
    return $this->fetch();
}
}
