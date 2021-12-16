<?php
session_start();
include_once "../conn.php";
if(isset($_SESSION['admin_username']))
{
  //header("Location:homepage");
}
else
{
  
}
  if(isset($_POST['login']))
  {
		  try {
		    $u=$_POST['username'];
		    $p=$_POST['password'];
            $stmt = $conn->prepare("SELECT * FROM login_admin WHERE username=? and password=?");
            $stmt->bindValue(1,$u , PDO::PARAM_STR);
		    $stmt->bindValue(2,$p, PDO::PARAM_STR);
		    $stmt->execute();
		    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
  		    
     if($row)
     {
           $_SESSION["admin_username"]=$_POST['username'];
           header("Location:homepage");
     }
  }
		catch(PDOException $e) {
		    echo "Error: " . $e->getMessage();
		}
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>AB-Admin</title>

  <!-- Bootstrap core CSS -->

  <link href="css/bootstrap.min.css" rel="stylesheet">

  <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="css/animate.min.css" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="css/custom.css" rel="stylesheet">
  <link href="css/icheck/flat/green.css" rel="stylesheet">


  <script src="js/jquery.min.js"></script>


</head>

<body style="background:#F7F7F7;">

  <div class="">
    <a class="hiddenanchor" id="toregister"></a>
    <a class="hiddenanchor" id="tologin"></a>

    <div id="wrapper">
      <div id="login" class="animate form">
        <section class="login_content">
          <form method="post" action="">
            <h1>Login Form</h1>
            <div>
              <input type="text" class="form-control" placeholder="Username" required="" name="username" />
            </div>
            <div>
              <input type="password" class="form-control" placeholder="Password" required="" name="password" />
            </div>
            <div>
              <button class="btn btn-default submit" type="submit" name="login">Log in</button>
              
            </div>
            <div class="clearfix"></div>
            <div class="separator">

              
              <div>
         Developed by <a href=""><h1>Softgrowth Infotech</h1></a>

                <p>© All Rights Reserved.</p>
              </div>
            </div>
          </form>
          <!-- form -->
        </section>
        <!-- content -->
      </div>
      <div id="register" class="animate form">
        <section class="login_content">
          <form>
            <h1>Create Account</h1>
            <div>
              <input type="text" class="form-control" placeholder="Username" required="" />
            </div>
            <div>
              <input type="email" class="form-control" placeholder="Email" required="" />
            </div>
            <div>
              <input type="password" class="form-control" placeholder="Password" required="" />
            </div>
            <div>
              <a class="btn btn-default submit" href="index.php">Submit</a>
            </div>
            <div class="clearfix"></div>
            <div class="separator">

              <p class="change_link">Already a member ?
                <a href="#tologin" class="to_register"> Log in </a>
              </p>
              <div class="clearfix"></div>
              <br />
              <div>
                <h1><i class="fa fa-paw" style="font-size: 26px;"></i> Gentelella Alela!</h1>

                <p>©2015 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
              </div>
            </div>
          </form>
          <!-- form -->
        </section>
        <!-- content -->
      </div>
    </div>
  </div>

</body>

</html>
