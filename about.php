<?php
require "conn.php"; ?>
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
	.about-section-box .founders{
		display: flex;
		flex-direction: row;
		justify-content: space-between;	
		text-align: center;
		align-items: center;	
		justify-self: center;
	}
	.found1{
		flex-basis: 50%;
		
	}
	.found2{
		flex-basis: 50%;
	}
	.about-section-box .founders .found1 .img{
	box-shadow: -20px 20px 0px #d65106;
	width: 250px;
	height: 300px;
}	.about-section-box .founders .found2 .img1{
	box-shadow: 20px 20px 0px #d65106;
	width: 250px;
	height: 300px;
}
.page-breadcrumb{
		padding: 250px 0 150px;
    background: url(images/misalpav/19939.jpg) no-repeat;
    background-attachment: fixed;
    background-size: cover;
    background-position: 0 0;
    position: relative;
	}
	@media only screen and (max-width: 500px){
	    .about-section-box .founders{
	        display: block;
	        justify-content: center;
	    }
	    .contact-imfo-box i{
	        width: 30px;
	        height: 30px;
	        line-height: 30px;
	        font-size: 20px;
	        margin-top: 10px;
	        margin-left: 18px;
	    }
	    .arrow-right::before {
        content: "\f101";
        font-family: 'FontAwesome';
        position: absolute;
        right: 14px;
        top: 0;
        color: #fff;
        font-size: 38px;
        line-height: 60px;
        }
	}
</style>
</head>

<body>
	<!-- Start header -->
	<?php require_once "header.php" ?>
	<!-- End header -->
	
	<!-- Start header -->
	<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>About Us</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End header -->
	<?php require_once "header.php" ?>
	<!-- Start About -->
	<div class="about-section-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-md-10 text-center">
					<div class="inner-column">
					    <b><h4>Hello Friends..!</h4>
						<h1>Welcome To Our<span> A.B.BROTHER'S</span></h1>
						<h4>Misal House Family..! </h4></b>
						<p class="text-justify">We A B brothers  have started the idea of "Good food for  good people" to serve the people of India 'spicy and quality hygienic food' 
we two brothers understood the need and necesssity of Misal in our area and therefore implemented  the idea of Misal Pav. 
Due to corona virus outbreak and lockdown we lost our jobs and dignity that encouraged us to go with this idea.</p>
      
                      <p class="text-justify">We are Happy to say that our first priority about people is their health & serve them hygienic food. we will always promote customer satisfaction. We proudly say that we are indians and are ready to serve the lovely people of Maharashtra and India..!</p>
					
						</div>
				</div>
				<div class="col-lg-2 col-md-2">
					<!-- <img src="images/about-img.jpg" alt="" class="img-fluid"> -->
				</div>
				<div class="col-lg-2 col-md-2">
					<!-- <img src="images/about-img.jpg" alt="" class="img-fluid img"> -->
				</div>
				<div class="col-md-1- col-lg-10">
					<div class="inner-column">
						<p> We Are Happy to say that our first priority about people's s health & serve to them cleanliness and hygiene food ..So  that finally to decide go with frenchise module. At last we have  see to started this for satisfied and happy customers not  for business thing..We proudly say that we are indians are ready to serve our lovely people to each and every happy customer of Maharashtra and Country of India..!</p>
				    </div>
				</div>
			</div>
		</div>
		<div class="container mt-3">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h1 style="color:#d65106;"><b>Founders</b></h1>
						<h2  style="color:#d65106;">Hello Friends..! Welcome to our A.B.Brothers Misal House Family..!</h2>
					</div>
				</div>
			</div>

			<div class="container">
				<div class="founders">
					<?php
				$stmt_team_mem=$conn->prepare("SELECT * FROM team_member_details ORDER BY member_id DESC");
				$stmt_team_mem->execute();
				$row_team_mem=$stmt_team_mem->fetchAll(PDO::FETCH_ASSOC);
				for($i=0;$i<count($row_team_mem);$i++)
            				    { ?>
					<div class="found1 ml-5">
					<!--<img src="images/about/WhatsApp Image 2021-10-14 at 11.05.18 AM.jpeg" alt="" class="img-fluid img">-->
					
					<img src="ab_admin/images/team_member/<?php echo $row_team_mem[$i]['image']; ?>" alt="" class="img-fluid img">
					<h3 class="mt-5">
					<b><?php echo  strtoupper($row_team_mem[$i]['member_name']); ?></b>
					</h3>
					<h4>
					    <b><?php echo  strtoupper($row_team_mem[$i]['position']); ?></b>
					</h4>
					<h4>
					    <b><?php echo  strtoupper($row_team_mem[$i]['education']); ?></b>
					</h4>
					</div>
				<?php } ?>
					<!-- <div class="found2 mr-5">
					<img src="images/about/WhatsApp Image 2021-10-14 at 11.05.21 AM.jpeg" alt="" class="img-fluid img1">
					<h3 class="mt-5">
						<b>ABHINEK MOHURLE</b>
					
					</h3>
					<h4>
					    <b>CO-FOUNDER, A.B BROTHER'S</b>
					</h4>
					<h4>
					    <b>M.Tech</b>
					</h4>
					</div>
					<div class="found2 mr-5">
					<img src="images/about/WhatsApp Image 2021-10-14 at 11.05.21 AM.jpeg" alt="" class="img-fluid img1">
					<h3 class="mt-5">
						<b>ABHINEK MOHURLE</b>
					
					</h3>
					<h4>
					    <b>CO-FOUNDER, A.B BROTHER'S</b>
					</h4>
					<h4>
					    <b>M.Tech</b>
					</h4>
					</div>
					 -->
				</div>
			</div>
		</div>
	</div>
	<!-- End About -->
	
	
	
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
	<script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>