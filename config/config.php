<?php
return [
    //blog_article：其中cat_id1/2/3/4分别对应技术页面下的php/数据库/框架/杂项
    //5/6对应konomi和diary
   'app_debug' => true,
   //网站名称
   'siteName'  => '-喃楠楠- 的博客',
   'active'    => 'active',
   'titleName' => '-喃楠楠- 的个人网站',
   //数据表名称
   'artTable'  => 'blog_article',
   'catTable'  => 'blog_category',
   'userTable' => 'blog_user',
   //存放art表的二维数组
   'artList'   => '',
   //存放cat表的二维数组
   'catList'   => '',
   //分类名称
   'catName'   => '',
   //分页显示条数
   'num'       => 5,
   //定义art_id数组
   'cat_array' => [
  ['cat'=>1,'name'=>'PHP'],
  [  'cat'=>2,'name'=>'数据库'],
      ['cat'=>3,'name'=>'框架'],
        ['cat'=>4,'name'=>'杂项'],
          ['cat'=>5,'name'=>'不务正业'],
          [  'cat'=>6,'name'=>'胡思乱语'],


   ],


];

 ?>
