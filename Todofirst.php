<?php
session_start();
require("dbconnect.php");
$sql = "select * from todo;";
$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>

<p>First Page </p>
<hr />

<a href="Todolist.php">我是員工</a> 
<a href="Todoboss.php">老闆專用</a>
</body>
</html>
