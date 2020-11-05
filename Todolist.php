<?php
session_start();
require("dbconnect.php");
$sql = "select * from todo where status = 0;";
$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>

<p>my Todo list!! </p>
<hr />
<table width="200" border="1">
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
	echo "<td>{$rs['content']}</td>"; 
	echo "<td>" . $rs['status'] ;
	echo "<a href = 'Todoset.php?id={$rs['id']}'>OK</a>" . "</td>";
	echo "<td>{$rs['importance']}</td></tr>"; 
}
?>
</table>
<a href="Todofirst.php">主畫面</a> 
</body>
</html>
