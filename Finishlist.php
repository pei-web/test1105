<?php
session_start();
require("dbconnect.php");
$sql = "select * from todo where status = 2;";
$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>

<p>my Finish list!! </p>
<hr />

<table width="200" border="1">
  <tr>
    <td>id</td>
    <td>title</td>
    <td>content</td>
  </tr>
<?php
//抓每筆資料
while (	$rs=mysqli_fetch_assoc($result)) {
	echo "<tr><td>" . $rs['id'] . "</td>";
	echo "<td>{$rs['title']}</td>";
	echo "<td>{$rs['content']}</td></tr>"; 
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
<a href="Todoboss.php">Back</a> 

</body>
</html>
