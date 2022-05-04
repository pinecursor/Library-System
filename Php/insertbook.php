<?php
include ('connect.php');
// get the post records
$BookName = $_POST['BookName'];
$ISBN = $_POST['ISBN'];
$Author = $_POST['Author'];
$sql="select * from tab1 where ISBN='$ISBN'";
$res = mysqli_query($con, $sql);
$count = mysqli_num_rows($res);
if($count>0)
{
	echo "<script>alert('book exist cant be entered again');history.back();</script>";
}
else{
// database insert SQL code
$qry="INSERT INTO `tab1`(`BookName`, `ISBN`, `Author`,`IssueStatus`) VALUES ('$BookName','$ISBN','$Author','No')";

// insert in database 
$rs = mysqli_query($con, $qry);
if ($rs)
{
	echo "<script>history.back()</script>";
}
}
mysqli_close($con);

?>