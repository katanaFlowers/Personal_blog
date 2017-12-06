<?php
$con=mysql_connect('localhost','root','');
if($con)
echo "连接成功";
else
echo '连接失败';
$re=mysql_select_db('blog',$con);
if($re)
echo '连接成功';
$sql="select * from blog_article";
if($result=mysql_query($sql)){
while($results = mysql_fetch_assoc($result))
var_dump($results);}
?>
