
<?php
include('config.php');
if(isset($_POST["submit"]))
{
    $name = $_POST['username'];
     $email = $_POST['email'];
     $password = $_POST['password'];
     $conf = $_POST['cname'];
     $mode= $_POST['Librarian'];
     $uid= rand();
     $codee= $_POST['Code'];
     $date= date("Y/m/d");
     $checker = mysqli_query($con,"SELECT * FROM `login` WHERE `Email ID`='$email'"); 
     $numrow = mysqli_num_rows($checker);
     $namechecker=mysqli_query($con,"SELECT * FROM `login` WHERE `Username`='$name'"); 
     $numrowname = mysqli_num_rows($namechecker);
     if($numrow>0 or $numrowname>0)
     {
      echo '<script type="text/javascript">alert("That Email or Username already exits !!Try another Email");
      history.back();</script>';
     }
     if($codee!="007" and $mode=="librarian")
     {
      echo '<script type="text/javascript">alert("Enter Valid Library Code Given by your institution!!");
      history.back();</script>';
     }
     else{
        if($conf!=$password)
        {
         echo '<script type="text/javascript">alert("Password and confirm Password Should be Same");
         history.back();</script>';
        }
        else{
     $sql = "INSERT INTO `login` (`UID`,`Username`,`Email ID`,`Password`,`Role`,`Date of Registration`) VALUES ('$uid','$name','$email','$password','$mode','$date')";
     if (mysqli_query($con, $sql)) {
      echo "<script>
      alert('registration successfull');
      window.location.href='http://localhost/AbsoluteMinds/index.html';
      </script>";
       // header("Location: http://localhost/frontend/index.html");
        //exit();
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($con);
     }
   }
     mysqli_close($con);
}
}
?>


