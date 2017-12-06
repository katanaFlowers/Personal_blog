<?php
namespace app\index\controller;
  use think\Controller;
  class Content extends Controller
{
  public function content()
  {

    $article = selectArt();
    $value = $_GET[key($_GET)];
    if($value <= 4)
     $value=1;
    else $value=$value;
    $cat = \think\Db::table('blog_category')->where('id',$value)->select();
    $catName =  \think\Db::table('blog_category')->select();
    $titleName = isTitle($catName[0]['cat_name'],$catName[1]['cat_name'],$catName[2]['cat_name']);

    $info=config(
      'siteName'
    );
    $links = getLink();
    $this->assign('links',$links);
    $data = rightInfor();
    $active = isset($_GET['cat'])?$_GET['cat']:0;
    $this->assign('active',$active);
    $this->assign('act','');
    $this->assign('data',$data);
    $this->assign('info',$info);
    $this->assign('catName',$catName);
    $this->assign('titleName',$titleName);
    $this->assign('article',$article);
    $this->assign('cat',$cat);
     return $this->fetch();
  }
}
