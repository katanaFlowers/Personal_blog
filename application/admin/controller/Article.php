<?php
namespace app\admin\controller;
use think\Controller;
class Article extends controller
{
  public function article()
  {

    $table= 'blog_article';
    $where= '';
    $order= 'order by id asc';
    $artList = do_page($table,$where,$order);
    $sum_page = do_sum_page();
    $pagecurrent = isset($_GET['page']) ? $_GET['page'] : 1 ;
    $url = getUrl();
    $catName =  \think\Db::table('blog_category')->select();
    $titleName = isTitle($catName[0]['cat_name'],$catName[1]['cat_name'],$catName[2]['cat_name']);
    $info=config(
    'siteName'
    );
    $this->assign('info',$info);
    $this->assign('catName',$catName);
    $this->assign('titleName',$titleName);
    $this->assign('artList',$artList);
    $this->assign('sum_page',$sum_page);
    $this->assign('pagecurrent',$pagecurrent);
    $this->assign('url',$url);
    return $this->fetch();
  }
}
