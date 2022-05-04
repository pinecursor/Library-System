<?php
include("connect.php");
$Name = $_POST['name'];
$Email= $_POST['email'];
$bname = $_POST['bname'];
$ISBN = $_POST['ISBN'];
$Author = $_POST['Author'];
$idate= $_POST['idate'];
$rdate=$_POST['rdate'];
$sql=  "select * from bookreq where Name = '$Name' and BookName='$bname'";
$result = mysqli_query($con, $sql);  
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
$count = mysqli_num_rows($result);
if($count==1)
{
    $sq="UPDATE tab1 SET BorrowerName='$Name' WHERE ISBN='$ISBN'";
    $resul = mysqli_query($con, $sq);
    $sq="UPDATE tab1 SET `Date of Borrow`='$idate' WHERE ISBN='$ISBN'";
    $resul = mysqli_query($con, $sq);
    $sq="UPDATE tab1 SET `Date of Return`='$rdate' WHERE ISBN='$ISBN'";
    $resul = mysqli_query($con, $sq);
    $sq="UPDATE tab1 SET `IssueStatus`='Yes' WHERE ISBN='$ISBN'";
    $resul = mysqli_query($con, $sq);
    echo "<script>alert('book issued');history.back();</script>";
}  
else
{
    echo "<script>alert('No Such request');history.back();</script>";
}
mysqli_close($con);
?>