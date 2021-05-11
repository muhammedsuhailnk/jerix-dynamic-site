<?php
$con=mysqli_connect('localhost','root','','jerix');
$id=$_GET['id'];
$del="delete from contents where id=$id";
if(mysqli_query($con,$del))
{
    mysqli_close($con);
    header("location:adminpc.php");
    exit;
}
else{
    echo "failed!";
}
?>
    


   



