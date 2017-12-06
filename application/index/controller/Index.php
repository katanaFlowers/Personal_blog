<?php
namespace app\index\controller;
use think\Controller;
class Index extends Controller
{
    public function index()
    {
         $artList = do_art_table('blog_article');
        //dump($artList);
         $catName =  \think\Db::table('blog_category')->select();
         $titleName = isTitle($catName[0]['cat_name'],$catName[1]['cat_name'],$catName[2]['cat_name']);
        // dump($titleName);
         $info=config(
           'siteName'
         );
         $links = getLink();
         $this->assign('links',$links);
         $active = isset($_GET['cat'])?$_GET['cat']:0;
         $this->assign('active',$active);
         $this->assign('act','');
         $data = rightInfor();
         $this->assign('data',$data);
         $this->assign('info',$info);
         $this->assign('catName',$catName);
         $this->assign('titleName',$titleName);
         return $this->fetch('',['artList'=>$artList]);
    }
    public function tech()
    {
      $table = 'blog_article';
      $where = 'where `cat_id`=1';
      $order = 'order by `order` DESC' ;
      $art1 =  do_page($table,$where,$order);
      $where2 = 'where `cat_id`=2';
      $art2 =  do_page($table,$where2,$order);
      $where3 = 'where `cat_id`=3';
      $art3 =  do_page($table,$where3,$order);
      $where4 = 'where `cat_id`=4';
      $art4 =  do_page($table,$where4,$order);
      $catName =  \think\Db::table('blog_category')->select();
      $titleName = isTitle($catName[0]['cat_name'],$catName[1]['cat_name'],$catName[2]['cat_name']);
      $info=config(
        'siteName'
      );
      $links = getLink();
      $this->assign('links',$links);
      $active = isset($_GET['cat'])?$_GET['cat']:0;
      $this->assign('active',$active);
      $this->assign('act','');
      $sum_page = do_pagi($art1);
      //$page2 = do_pagi($cat2);
      //$page3 = do_pagi($cat3);
      //$page4 = do_pagi($cat4);
      $url = getUrl();
      $pagecurrent = isset($_GET['page']) ? $_GET['page'] : 1;
      $data = rightInfor();
      $this->assign('data',$data);
      $this->assign('info',$info);
      $this->assign('catName',$catName);
      $this->assign('titleName',$titleName);
      $this->assign('art1',$art1);
      $this->assign('art2',$art2);
      $this->assign('art3',$art3);
      $this->assign('art4',$art4);
      $this->assign('page','');
      $this->assign('sum_page',$sum_page);
      //$this->assign('page2',$page2);
      //$this->assign('page3',$page3);
      //$this->assign('page4',$page4);
      $this->assign('pagecurrent',$pagecurrent);
      $this->assign('url',$url);
      return $this->fetch();
    }
    public function tech1()
    {
      $table = 'blog_article';
      $where = 'where `cat_id`=1';
      $order = 'order by `order` DESC' ;
      $art1 =  do_page($table,$where,$order);
      $where2 = 'where `cat_id`=2';
      $art2 =  do_page($table,$where2,$order);
      $where3 = 'where `cat_id`=3';
      $art3 =  do_page($table,$where3,$order);
      $where4 = 'where `cat_id`=4';
      $art4 =  do_page($table,$where4,$order);
      $catName =  \think\Db::table('blog_category')->select();
      $titleName = isTitle($catName[0]['cat_name'],$catName[1]['cat_name'],$catName[2]['cat_name']);
      $info=config(
        'siteName'
      );
      $links = getLink();
      $this->assign('links',$links);
      $active = isset($_GET['cat'])?$_GET['cat']:0;
      $this->assign('active',$active);
      $this->assign('act','');
      //$page1 = do_pagi($cat1);
      $sum_page = do_pagi($art2);
      //$page3 = do_pagi($cat3);
      //$page4 = do_pagi($cat4);
      $url = getUrl();
      $pagecurrent = isset($_GET['page']) ? $_GET['page'] : 1;
      $data = rightInfor();
      $this->assign('data',$data);
      $this->assign('info',$info);
      $this->assign('catName',$catName);
      $this->assign('titleName',$titleName);
      $this->assign('art1',$art1);
      $this->assign('art2',$art2);
      $this->assign('art3',$art3);
      $this->assign('art4',$art4);
      $this->assign('page','');
      //$this->assign('page1',$page1);
      $this->assign('sum_page',$sum_page);
      //$this->assign('page3',$page3);
      //$this->assign('page4',$page4);
      $this->assign('pagecurrent',$pagecurrent);
      $this->assign('url',$url);
      return $this->fetch();
    }
    public function tech2()
    {
      $table = 'blog_article';
      $where = 'where `cat_id`=1';
      $order = 'order by `order` DESC' ;
      $art1 =  do_page($table,$where,$order);
      $where2 = 'where `cat_id`=2';
      $art2 =  do_page($table,$where2,$order);
      $where3 = 'where `cat_id`=3';
      $art3 =  do_page($table,$where3,$order);
      $where4 = 'where `cat_id`=4';
      $art4 =  do_page($table,$where4,$order);
      $catName =  \think\Db::table('blog_category')->select();
      $titleName = isTitle($catName[0]['cat_name'],$catName[1]['cat_name'],$catName[2]['cat_name']);
      $info=config(
        'siteName'
      );
      $links = getLink();
      $this->assign('links',$links);
      $active = isset($_GET['cat'])?$_GET['cat']:0;
      $this->assign('active',$active);
      $this->assign('act','');
      //$page1 = do_pagi($cat1
      //$page2 = do_pagi($cat2);
      $sum_page = do_pagi($art3);
      //$page4 = do_pagi($cat4);
      $url = getUrl();
      $pagecurrent = isset($_GET['page']) ? $_GET['page'] : 1;
      $data = rightInfor();
      $this->assign('data',$data);
      $this->assign('info',$info);
      $this->assign('catName',$catName);
      $this->assign('titleName',$titleName);
      $this->assign('art1',$art1);
      $this->assign('art2',$art2);
      $this->assign('art3',$art3);
      $this->assign('art4',$art4);
      $this->assign('page','');
      //$this->assign('page1',$page1);
      //$this->assign('page2',$page2);
      $this->assign('sum_page',$sum_page);
      //$this->assign('page4',$page4);
      $this->assign('pagecurrent',$pagecurrent);
      $this->assign('url',$url);
      return $this->fetch();
    }
    public function tech3()
    {
      $table = 'blog_article';
      $where = 'where `cat_id`=1';
      $order = 'order by `order` DESC' ;
      $art1 =  do_page($table,$where,$order);
      $where2 = 'where `cat_id`=2';
      $art2 =  do_page($table,$where2,$order);
      $where3 = 'where `cat_id`=3';
      $art3 =  do_page($table,$where3,$order);
      $where4 = 'where `cat_id`=4';
      $art4 =  do_page($table,$where4,$order);
      $catName =  \think\Db::table('blog_category')->select();
      $titleName = isTitle($catName[0]['cat_name'],$catName[1]['cat_name'],$catName[2]['cat_name']);
      $info=config(
        'siteName'
      );
      $links = getLink();
      $this->assign('links',$links);
      $active = isset($_GET['cat'])?$_GET['cat']:0;
      $this->assign('active',$active);
      $this->assign('act','');
      //$page1 = do_pagi($cat1);
      //$page2 = do_pagi($cat2);
      //$page3 = do_pagi($cat3);
  $sum_page = do_pagi($art4);
      $url = getUrl();
      $pagecurrent = isset($_GET['page']) ? $_GET['page'] : 1;
      $data = rightInfor();
      $this->assign('data',$data);
      $this->assign('info',$info);
      $this->assign('catName',$catName);
      $this->assign('titleName',$titleName);
      $this->assign('art1',$art1);
      $this->assign('art2',$art2);
      $this->assign('art3',$art3);
      $this->assign('art4',$art4);
      $this->assign('page','');
      //$this->assign('page1',$page1);
      //$this->assign('page2',$page2);
      //$this->assign('page3',$page3);
      $this->assign('sum_page',$sum_page);
      $this->assign('pagecurrent',$pagecurrent);
      $this->assign('url',$url);
      return $this->fetch();
    }
}
