<?php
namespace app\admin\controller;
class Check
{
  public function check()
  {
    $user = \think\Db::table('blog_user')->select();
    if(empty($_POST['username'])||empty($_POST['password']))
    {
      echo '<script> alert("用户名或密码不能为空！");location.href="login?act=login";</script>';
    }
    if($_POST['username']==$user[0]['user_name'] && md5($_POST['password'])==$user[0]['password'])
    { $_SESSION['username']=$user[0]['user_name'];
      echo '<script> alert("登陆成功！");location.href="/";</script>';
    } else {
      echo '<script> alert("用户名或密码错误！");history.back();</script>';
    }
  }
  public function out()
  {
    if(session_destroy())
    echo '<script> location.href="/";</script>';
  }
   public function delete()
   {
     $param_arr = array_keys($_GET);
     $value = \think\Db::execute("delete from blog_category where id={$_GET[$param_arr[1]]}");
     if($value)
     echo '<script> alert("删除数据成功！");location.href="/category?act=cat_manage";</script>';
     else
      echo '<script> alert("该分类下面还有数据，请清空后删除！");history.back();</script>';
   }
   public function update()
   {
     $param_arr = array_keys($_GET);
     $time = time();
     $value = \think\Db::execute("update blog_category set cat_name='{$_POST['cat_name']}',`order`={$_POST['order']},update_time={$time} where id={$_GET[$param_arr[1]]}");
     if($value)
     echo '<script> alert("更新成功！");location.href="/category?act=cat_manage";</script>';
     else
      echo '<script> alert("更新失败！");history.back();</script>';
   }
    public function insert()
    {
      $title = $_POST['title'];
      $order = $_POST['order'];
      $content = stripslashes(trim($_POST['content']));
      $catId = $_POST['cat_id'];
      $artUrl ='content?cat='.$catId.'&id=';
      $createTime = time();
      $updateTime = time();
      $recommend = $_POST['recommend'];
      $data = [
        'art_title'=>$title,
        'order'    =>$order,
        'content'  =>$content,
        'cat_id'   =>$catId,
        'art_url'  =>$artUrl,
        'create_time'=>$createTime,
        'update_time'=>$updateTime,
        'recommend'=>$recommend,
      ];
      \think\Db::table('blog_article')->insert($data);
      $insertId= \think\Db::table('blog_article')->getLastInsId();
      $groupId = $artUrl.$insertId;
      $result = \think\Db::table('blog_article')->where('id',$insertId)->update(['art_url'=>$groupId]);
       if($result)
       echo '<script> alert("添加成功！");location.href="/article?act=art_manage";</script>';
       else
        echo '<script> alert("添加失败！");history.back();</script>';
    }

      public function artDelete()
      {
        $param_arr = array_keys($_GET);
        $value = \think\Db::execute("delete from blog_article where id={$_GET[$param_arr[1]]}");
        if($value)
        echo '<script> alert("删除数据成功！");location.href="/article?act=art_manage";</script>';
        else
         echo '<script> alert("该分类下面还有数据，请清空后删除！");history.back();</script>';
      }
      public function artUpdate()
      {
        $title = $_POST['title'];
        $order = $_POST['order'];
        $content = trim($_POST['content']);
        $catId = $_POST['cat_id'];
        $artUrl ='content?cat='.$catId.'&id='.$_GET['id'];
        $updateTime = time();
        $recommend = $_POST['recommend'];
        $data = [
          'art_title'=>$title,
          'order'    =>$order,
          'content'  =>$content,
          'cat_id'   =>$catId,
          'art_url'  =>$artUrl,
          'update_time'=>$updateTime,
          'recommend'=>$recommend,
        ];
        $result = \think\Db::table('blog_article')->where('id',$_GET['id'])->update($data);
         if($result)
         echo '<script> alert("修改成功！");location.href="/article?act=art_manage";</script>';
         else
          echo '<script> alert("修改失败！");history.back();</script>';
      }
      public function userUpdate()
      {
        $id = $_GET['id'];
        $user = $_POST['username'];
        $password = MD5($_POST['password']);
        $email = $_POST['email'];
        $time = time();
        $data = [
          'user_name'=>$user,
          'password'=>$password,
          'email'=>$email,
          'update_time'=>$time
        ];
        $result = \think\Db::table('blog_user')->where('id',$id)->update($data);
        if($result)
        echo '<script> alert("更新成功！");location.href="/yonghu?act=user_manage";</script>';
        else
         echo '<script> alert("更新失败！");history.back();</script>';
      }
      public function linkInsert()
      {

        $user = $_POST['username'];
        $link = $_POST['link'];
        $cate= $_POST['category'];

        $data = [
          'username'=>$user,
          'link'=>$link,
          'category'=>$cate,

        ];
        $result = \think\Db::table('blog_link')->insert($data);
        if($result)
        echo '<script> alert("新增成功！");location.href="/yonghu?act=manage";</script>';
        else
         echo '<script> alert("新增失败！");history.back();</script>';
      }
      public function linkDelete()
      {
        $param_arr = array_keys($_GET);
        $value = \think\Db::execute("delete from blog_link where id={$_GET[$param_arr[1]]}");
        if($value)
        echo '<script> alert("删除数据成功！");location.href="/yonghu?act=user_manage";</script>';
        else
         echo '<script> alert("该分类下面还有数据，请清空后删除！");history.back();</script>';
      }
}
