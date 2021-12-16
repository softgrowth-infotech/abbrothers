<?php require "conn.php"; 
date_default_timezone_set("Asia/Kolkata");
if(isset($_POST['submit']))
{
	//print_r($_POST);
	extract($_POST); 
try{

		$stmt = $conn->prepare("INSERT INTO `franchise_from`(`name`,`email`,`mob_no`,`address`,`added_on`)VALUES(:name,:email,:mob_no,:address,:added_on)");

		$executed=$stmt->execute(array(':name' => $name,':email' => $email,':mob_no' => $mob_no,':address' => $address,':added_on' => date(('Y-m-d H:i:s'))));
			   if($executed)
			   {
				echo "<script>alert('Added Successfully....We Will Contact As Soon As Possible');window.location.href='franchise';</script>";
			   }
	}catch(Exception $e) {
	  echo 'Message: ' .$e->getMessage();
	}
}


?>
<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
	 <title>AB.Brothers's</title>   
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
<?php require_once "links.php" ?>
<style>
    .note h4{
       color: red;
       text-align: left;
    }
    .page-breadcrumb{
		padding: 250px 0 150px;
    background: url(images/misalpav/19939.jpg) no-repeat;
    background-attachment: fixed;
    background-size: cover;
    background-position: 0 0;
    position: relative;
	}
</style>
</head>

<body>
	<!-- Start header -->
	<?php require_once "header.php" ?>
	<!-- End header -->
	
	<!-- Start All Pages -->
	<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
                <h1>A.B.Brother's Franchise Application From </h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End All Pages -->
	
	<!-- Start Contact -->
	<!-- <div class="map-full"></div> -->
	<div class="contact-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Franchise Form</h2>
                      
					</div>
				</div>
			</div>
            <!-- <div class=" note">
                <h4>Note:</h4>
                <h4>First Form - Basic Information</h4>
                <h4>Second Form - Terms And Conditions</h4>
                <h4>Third From - Third From Is Compulsory For Franchise Application</h4>
            </div> -->
			<div class="row">
				<div class="col-lg-12">
					<form method="post" action="">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" class="form-control" id="name" name="name" placeholder="Please enter your Full Name" required data-error="Please enter your name">
									<div class="help-block with-errors"></div>
								</div>                                 
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input type="email" placeholder="Please enter your email" id="email" class="form-control" name="email" required data-error="Please enter your email">
									<div class="help-block with-errors"></div>
								</div> 
							</div>
                            <div class="col-md-6">
								<div class="form-group">
									<input type="tel" class="form-control" id="name" name="mob_no" placeholder="Please enter your Phone No." required data-error="Please enter your Phone No."  pattern="[789][0-9]{9}">
									<div class="help-block with-errors"></div>
								</div>                                 
							</div>
                        
                            <div class="col-md-6">
								<div class="form-group">
									<input type="text" class="form-control" id="name" name="address" placeholder="Please enter your Address" required data-error="Please enter your Address">
									<div class="help-block with-errors"></div>
								</div>                                 
							</div>
                            <div class="col-md-12 text-center">
							<button type="submit" class="btn btn-success" name="submit">Submit</button>                  
							</div>
						
						</div>            
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- End Contact -->
	
	<!-- Start Contact info -->
	<!-- End Contact info -->
	
	<!-- Start Footer -->
    <?php require_once "footer.php" ?>
	<!-- End Footer -->
	
	<a href="#" id="back-to-top" title="Back to top" style="display: none;"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></a>

	<!-- ALL JS FILES -->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
	
	<script src="js/jquery.superslides.min.js"></script>
	<script src="js/images-loded.min.js"></script>
	<script src="js/isotope.min.js"></script>
	<script src="js/baguetteBox.min.js"></script>
	<script src="js/jquery.mapify.js"></script>
	<script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/custom.js"></script>
	<script>
		$('.map-full').mapify({
			points: [
				{
					lat: 40.7143528,
					lng: -74.0059731,
					marker: true,
					title: 'Marker title',
					infoWindow: 'Live Dinner Restaurant'
				}
			]
		});	
	</script>
</body>
</html>