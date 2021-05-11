<?php
$db=mysqli_connect('localhost','root','','jerix');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JERIX media</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <style>
    #video {
    display: inline-block;
    width: 100%;
    height:100%;
    margin: 2px;
    border-radius:25px;
    border:2px solid black;
    padding:25px;
  }
    </style>
</head>
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
                        <a class="nav-link" href="#">Home <span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About Us</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact Us</a>
                    </li>
                </ol>
                <ol class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="policy.php">Privacy Policy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="feedback.php">Feedback</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="right.php">Copyright</a>
                    </li>
                </ol>
            </div>
        </nav>
        
    </div>
    <div class="container">
    <div class="col-12" id="ads">
    </div>
    <div class="col-12" id="video" style="background-color:white;">
        <h3 style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;color:blue">NEWS</h3>
        <?php
         $records=mysqli_query($db,"select * from contents");
         while($data=mysqli_fetch_array($records))
        {
        ?>
        
        <h3><?php echo $data['title']; ?></h3>
        <p><?php echo $data['content']; ?></p>
        <?php
        if ($data['link']==''||
        $data['link']==null ||
        empty($data['link']) ||
        !$data['link'])
        {?>
        <?php  echo '<img src="data:image;base64,' .base64_encode($data['image']).'" alt="image" style="width:320px;height:240px;">'?>
        <?php
        }
        else
        {?>
        <iframe width="320" height="240" src="<?php echo $data['link'] ?>" title="YouTube video player"  allow="accelerometer;  clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe><br>
         
        <?php
        }?>
        <a href="<?php echo $data['ext_link']; ?>"><?php echo $data['ext_link'];?></a>
        <?php
    }?>

    </div>
    </div>
    
        <footer class="footer" style="margin-top:40px">
            
        <div class="row">
            <div class="d-md-flex py-4 col-12" id="footer">
                <div class="mr-md-auto col-12 text-center ">
                  <div class="copyright" style="font-size:x-large">
                    Copyright <strong><span> &copy; 2021</span></strong> All Rights Reserved.
                  </div>
                  <div>
                  <a href="disclaimer.php">Disclaimer</a>
                  </div>
                </div>
         </div>
        </div>
            <div class="container col-12 text-center">
              <a href="https://www.facebook.com/Jerix-Media-103691908470442/"><i class="fa fa-facebook" aria-hidden="true"></i></a>
              <a href="https://twitter.com/explore"><i class="fa fa-twitter" aria-hidden="true"></i></a>
              <a href="https://www.instagram.com/jabirjerix10/?hl=en"><i class="fa fa-instagram" aria-hidden="true"></i></a>
              <a href="https://youtube.com/c/PadayappaRealestate"><i class="fa fa-youtube" aria-hidden="true"></i></a>
            </div>
          </footer>
        
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>