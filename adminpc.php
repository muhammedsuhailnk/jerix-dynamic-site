<?php
$con=mysqli_connect('localhost','root','','jerix');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <body style="background-color: #ccc;">
        <div class="row " id="head">
            <h1 id="name">JERIX MEDIA</h1>
            <nav class="navbar  navbar-expand-md col-12 navbar-dark " >
                <a class="navbar-brand" href="#"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                
                <div class="collapse navbar-collapse " id="collapsibleNavbar" style="font-size: 20px;">
                    <ol class="navbar-nav ml-auto mr-1">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Home <span class="sr-only"></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="comment.php">Comments</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                    </ol>
                </div>
            </nav>  
        </div>
        
        <?php
        if(isset($_POST['submit']))
        {
          $file=addslashes(@file_get_contents($_FILES['image']['tmp_name']));
          $name=$_POST['txttitle'];
          $link=$_POST['txtlink'];
          $cnt=$_POST['content'];
          $lnk=$_POST['extlink'];
          $sql="insert into contents (title,link,content,ext_link,image) values ('$name','$link','$cnt','$lnk','$file')";
          $query=mysqli_query($con,$sql);
          header("refresh:1");
          
        }
        
        ?>
        <h1 style="text-align: center;background-color:gainsboro;font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Admin Panel</h1>
        <div class="container" id="feedback" >
          <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-20">
                <label for="name"></label>
              </div>
              <div class="col-75">
                <input type="text" id="fname" name="txttitle" placeholder="Title..." >
              </div>
            </div>
            <div class="row">
              <div class="col-20">
                <label for="lname"></label>
              </div>
              <div class="col-75">
                <input type="text" id="lname" name="txtlink" placeholder="Link..." >
              </div>
            </div>      
            <div class="row">
              <div class="col-20">
                <label for="subject"></label>
              </div>
              <div class="col-75">
                <textarea id="subject" name="content" placeholder="Write something..."  style="height:200px"></textarea>
              </div>
            </div>
            <div class="row">
              <div class="col-20">
                <label for="subject"></label>
              </div>
              <div class="col-75">
                <textarea id="link" name="extlink" placeholder="Add Related Links..."  style="height:100px"></textarea>
              </div>
            </div>
            <div class="row">
              <div class="col-20">
                <label for="lname"></label>
              </div>
              <div class="col-75">
              <input  type="file" id="img" name="image" id="image" />
              </div>
            </div>
            <div class="row">
              <div class="col-20">
                <label for="subject"></label>
              </div>
              <input type="submit"  name="submit" value="Upload">
            </div>
            </form>
          </div>
        </div>
        <h1 style="text-align: center;background-color:gainsboro;font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;padding: top 10px;margin-top:20px;">Content Details</h1>
        <div class="container" style="padding-top:20px;">
        <table  class="table" style="width: 100%;color: #000; padding-left:40px;padding-right:40px;" >
        <thead style="background-color: #fb924b;font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">
          <tr>
            <td>ID</td>
            <td>TITLE</td>
            <td>LINK</td>
            <td>CONTENT</td>
            <td>Extra Link</td>
            <td>Image</td>
            <td></td>
            <td></td>
          </tr>
          </thead>
          <?php
          $record=mysqli_query($con,"select * from contents");
          while($datas=mysqli_fetch_array($record))
          {
            ?>
            <tr>
              <td><?php echo $datas['id'];?></td>
              <td><?php echo $datas['title'];?></td>
              <td><?php echo $datas['link'];?></td>
              <td><?php echo $datas['content'];?></td>
              <td><?php echo $datas['ext_link'];?></td>
              <td><?php  echo '<img src="data:image;base64,' .base64_encode($datas['image']).'" alt="image" style="width:100px;height:100px;">'?></td>
              <td><a   href="edit.php?id=<?php echo $datas['id'];?>"><button class="btn btn-success" >EDIT</button></a></td>
              <td> <a  href="delete.php?id=<?php echo $datas['id'];?>"><button class="btn btn-danger"> DELETE</button></a></td>
            </tr>
            <?php
          }
          ?>
        </table>
        </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

        