<?php
session_start();
require("dbconnect.php");
if (isset($_GET['m'])) {
	$msg='<font color="red">'.$_GET['m']."</font>";
} else {
	$msg="Good morning";
}
$sql = "select * from todo order by status,importance;";
$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>

<p>Thing list!! </p>
<hr />
<div><?php echo $msg;?></div><hr>
<table width="250" border="1">
  <tr>
    <td>id</td>
    <td>title</td>
    <td>content</td>
	<td>status</td>
	<td>importance</td>
  </tr>
<?php
//抓每筆資料
while (	$rs=mysqli_fetch_assoc($result)) {
	echo "<tr><td>" . $rs['id'] . "</td>";
	echo "<td>{$rs['title']}</td>";
	echo "<td>{$rs['content']}"; 
	echo "<a href = 'Todoeditform.php?id={$rs['id']}'> 修改</a>" . "</td>";
	echo "<td>" . $rs['status'] . "</td>";
	#echo "<a href = 'Todoset.php?id={$rs['id']}'>OK</a>" . "</td>";
	echo "<td>{$rs['importance']}</td>";
	echo "<td><a href = 'Tododeleteform.php?id={$rs['id']}'>刪除</a>" . "</td>";
	echo "<td><a href = 'Todoreset.php?id={$rs['id']}'>退件</a>" . "</td>";
	echo "<td><a href = 'Todofinal.php?id={$rs['id']}'>結案</a>" . "</td></tr>";

}
?>
</table>
<?php
$sql = "select count(*)  as c from todo where status=2;";
$result=mysqli_query($conn,$sql);
$rs=mysqli_fetch_assoc($result);
echo "總結案件數：".$rs['c'];
?>
<hr>
<a href="Todoadd.php">Add Task</a> 
<a href="Finishlist.php">結案工作</a> 
<a href="Todofirst.php">主畫面</a> 

</body>
</html>
