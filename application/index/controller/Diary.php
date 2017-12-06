<?php
namespace app\index\controller;
  use think\Controller;
  class Diary extends Controller
  {
    public function diary()
    {
      $catName =  \think\Db::table('blog_category')->select();
      $titleName = isTitle($catName[0]['cat_name'],$catName[1]['cat_name'],$catName[2]['cat_name']);
      $info=config(
        'siteName'
      );
      $table = config('artTable');
      $where = 'where `cat_id`=6';
      $order = 'order by `order` desc';
      $art = do_page($table,$where,$order);
      $sum_page = do_pagi($art);
      $url = getUrl();
      $pagecurrent = isset($_GET['page']) ? $_GET['page'] : 1;
      $data = rightInfor();
      $active = isset($_GET['cat'])?$_GET['cat']:0;
      $links = getLink();
      $this->assign('links',$links);
      $this->assign('active',$active);
      $this->assign('act','');
      $this->assign('data',$data);
      $this->assign('info',$info);
      $this->assign('catName',$catName);
      $this->assign('titleName',$titleName);
      $this->assign('art',$art);
      $this->assign('sum_page',$sum_page);
      $this->assign('url',$url);
      $this->assign('pagecurrent',$pagecurrent);
      $this->assign('page','');
      return $this->fetch();
    }
  }
