<?php
include ('connect.php');
// get the post records
$Name = $_POST['Name'];
$Email= $_POST['Email'];
$BookName = $_POST['BookName'];
$ISBN = $_POST['ISBN'];
$Author = $_POST['Author'];
$sql="select * from bookreq where ISBN='$ISBN'";
$rs = mysqli_query($con, $sql);
$count= mysqli_num_rows($rs);
if($count>0)
{
	echo "<script>alert('Book Not available!Currently Issued');history.back()</script>";
}
// database insert SQL code
else{
$qry="INSERT INTO `bookreq` (`Name`,`Email`,`Bookname`,`ISBN`,`Author`) VALUES ('$Name','$Email','$BookName','$ISBN','$Author')";
// insert in database 
$rs = mysqli_query($con, $qry);
if ($rs)
{
	echo "<script>history.back()</script>";
}
mysqli_close($con);
}
?>