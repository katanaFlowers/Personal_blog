<?php
namespace app\admin\controller;
use think\Controller;
class Yonghu extends controller
{
  public function yonghu()
  {
    //友情链接
    $links = getLink();
    $userList = \think\Db::table('blog_user')->select();
    $catName =  \think\Db::table('blog_category')->select();
    $titleName = isTitle($catName[0]['cat_name'],$catName[1]['cat_name'],$catName[2]['cat_name']);
    $info=config(
    'siteName'
    );
    $this->assign('links',$links);
    $this->assign('info',$info);
    $this->assign('catName',$catName);
    $this->assign('titleName',$titleName);
    $this->assign('userList',$userList);
    return $this->fetch();
  }
   public function yonghuEdit()
   {

     $userCurrent = \think\Db::table('blog_user')->select($_GET['id']);
     $catName =  \think\Db::table('blog_category')->select();
     $titleName = isTitle($catName[0]['cat_name'],$catName[1]['cat_name'],$catName[2]['cat_name']);
     $info=config(
     'siteName'
     );
     $this->assign('info',$info);
     $this->assign('catName',$catName);
     $this->assign('titleName',$titleName);
     $this->assign('userCurrent',$userCurrent);
     return $this->fetch();
   }
   public function linkInsert()
   {
     $catName =  \think\Db::table('blog_category')->select();
     $titleName = isTitle($catName[0]['cat_name'],$catName[1]['cat_name'],$catName[2]['cat_name']);
     $info=config(
     'siteName'
     );
     $this->assign('info',$info);
     $this->assign('catName',$catName);
     $this->assign('titleName',$titleName);
    
     return $this->fetch();
   }
}
