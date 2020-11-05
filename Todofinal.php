<?php
require("dbconnect.php");
//從使用者表單取得資料
$msgID=(int)$_GET['id'];
#$msgstat=(int)$_GET['status'];
#$status=mysqli_real_escape_string($conn,$_GET['status']);
$sql = "select * from todo where id = $msgID;";
$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
$rs=mysqli_fetch_assoc($result);
$status=$rs['status'];
if ($msgID) {
	$sql = "update todo set status=2 where id=$msgID AND $status=1;";
	mysqli_query($conn,$sql) or die("MySQL query error"); //執行SQL
	$msg="Message:$msgID finished.";
} else {
	$msg="Todo thing id cannot be empty or status doesn't completed";
}
header("Location: Todoboss.php?m=$msg");
?>


