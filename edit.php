<?php
$con=mysqli_connect('localhost','root','','jerix');
$id=$_GET['id'];
$qry=mysqli_query($con,"select * from contents where id='$id'");
$datas=mysqli_fetch_array($qry);
if(isset($_POST['update']))
{
    $title=$_POST['title'];
    $link=$_POST['link'];
    $content=$_POST['content'];
    $ext_link=$_POST['ext_link'];
    $edit=mysqli_query($con,"update contents set title='$title',link='$link',content='$content',ext_link='$ext_link' where id='$id'");
    if($edit)
    {
        mysqli_close($con);
        header("location:adminpc.php");
        exit;


    }
    else{
        echo mysqli_error();

    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<h1 style="text-align: center;background-color:gainsboro;font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Update Data</h1>
  <div class="container" id="feedback" >
    <form action="" method="post" id="submit-form">
      <div class="row">
        <div class="col-20">
          <label for="name"></label>
        </div>
        <div class="col-75">
        <input type="text" name="title" value="<?php echo $datas['title']?>">
        </div>
      </div>
      <div class="row">
        <div class="col-20">
          <label for="lname"></label>
        </div>
        <div class="col-75">
        <input type="text" name="link" value="<?php echo $datas['link']?>">
        </div>
      </div>
      
      <div class="row">
        <div class="col-20">
          <label for="subject"></label>
        </div>
        <div class="col-75">
          <textarea style="height:200px" name="content"  ><?php echo $datas['content']?></textarea>
        </div>
      </div>
      <div class="row">
        <div class="col-20">
          <label for="subject"></label>
        </div>
        <div class="col-75">
          <textarea style="height:100px" name="ext_link"  ><?php echo $datas['ext_link']?></textarea>
        </div>
      </div>
      <div class="row">
        <div class="col-20">
          <label for="subject"></label>
        </div>
        <input type="submit" name="update" value="Update">
      </div>
      </form>
    </div>
  </div>  
  <hr style="border: 1px solid black;border-radius: 5px;">  

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

