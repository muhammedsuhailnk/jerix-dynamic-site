
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<?php 
$con=mysqli_connect('localhost','root','','jerix');
if(isset($_POST['submit']))
{
  $name=$_POST['txtname'];
  $email=$_POST['txtemail'];
  $msg=$_POST['subject'];

  $sql="insert into comment (name,email_id,message) values ('$name','$email','$msg')";
  $query=mysqli_query($con,$sql);
  mysqli_close($con);
  header("location:index.php");
  exit;
}

?>
  <h1 style="text-align: center;background-color:gainsboro;font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Feedback</h1>
  <div class="container" id="feedback" >
    <form action="" method="post" id="submit-form">
      <div class="row">
        <div class="col-20">
          <label for="name"></label>
        </div>
        <div class="col-75">
          <input type="text" id="fname" name="txtname" placeholder="Your name.." required="true">
        </div>
      </div>
      <div class="row">
        <div class="col-20">
          <label for="lname"></label>
        </div>
        <div class="col-75">
          <input type="text" id="lname" name="txtemail" placeholder="Your email id.." required="true">
        </div>
      </div>
      
      <div class="row">
        <div class="col-20">
          <label for="subject"></label>
        </div>
        <div class="col-75">
          <textarea id="subject" name="subject" placeholder="Write something.." required="true" style="height:200px"></textarea>
        </div>
      </div>
      <div class="row">
        <div class="col-20">
          <label for="subject"></label>
        </div>
        <input type="submit" name="submit" value="Submit">
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