<?php 
include "connection.php";
include "admin_header.php";
 ?>


<?php 
if(isset($_POST['login'])){
	extract($_POST);

	$qe="select * from login where username='$uname' and password='$pass'";
	$qw=select($qe);
	if(sizeof($qw)>0)
	{	
		$id=$qw[0]['login_id'];
		$_SESSION['login_id']=$id;
		if($qw[0]['user_type']=='admin'){
			return redirect('adminpc.php');
			alert("login success");

		}
		
	}
	else{
		alert("login failed");
	}
}

 ?>


      <!-- <div class="hero-slide owl-carousel site-blocks-cover"> -->
        <div class="intro-section" style="background-image: url('img/hero_1.jpg');">
          <div class="container">
            <div class="row align-items-center justify-content-center">
              <div class="col-md-7 mx-auto text-center" data-aos="fade-up">
               <center>
					<form method="post">
					<table class="table" style="width: 600px;color : #000;">
						<h2 style="color: #000;">LOGIN</h2>
						<tr>
							<th>Username</th>
							<td><input type="text" class="tx form-control" required name="uname"></td>
						</tr>
						<tr>
							<th>Password</th>
							<td><input type="password" class="tx form-control" required name="pass"></td>
						</tr>
						<tr>
							<td colspan="2" align="center"><input type="submit" name="login" class="bt btn btn-success" value="LOGIN"></td>
						</tr>
					</table>
					</form>
					</center>
                <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit, nihil.</p> -->
                <!-- <p><a href="#" class="btn btn-primary">Register</a></p> -->
              </div>
            </div>
          </div>
        </div>
        

        <!-- </div> -->




<?php 
include "footer.php";
 ?>
