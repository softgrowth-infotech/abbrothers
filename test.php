<?php
require "conn.php";
?>

<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

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
        .image-all {
            height: 150px;
            width: 255px;
        }

        .img-gall {
            width: 260px;
            height: 170px;
        }

        h3 {
            color: #fff;
            font-size: 30px;
            line-height: 40px;
        }
    </style>
</head>

<body>
    <!-- Start header -->
    <?php require_once "header.php" ?>
    <!-- End header -->

    <!-- Start slides -->
    <div id="slides" class="cover-slides">
        <ul class="slides-container">
            <li class="text-left">
                <img src="images/misalpav/360_F_367950457_q5L44UUBzQHjAn3D2m6HDePoIfnurDoX.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Welcome To <br> A.B. <span>BROTHER'S</span></strong></h1>
                            <h3 class="m-b-40"><b>मिसळ आणि चाय कॉर्नर</b></h3>
                            <h3><b>असल झणझणीत वऱ्हाडी चव</b></h3>


                        </div>
                    </div>
                </div>
            </li>
            <li class="text-left">
                <img src="images/pani/gol-guppa-gujral.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Welcome To <br> A.B. <span>BROTHER'S</span></strong></h1>
                            <h3 class="m-b-40"><b>मिसळ आणि चाय कॉर्नर</b></h3>
                            <h3><b>असल झणझणीत वऱ्हाडी चव</b></h3>

                        </div>
                    </div>
                </div>
            </li>
            <li class="text-left">
                <img src="images/chai/chai_1_of_1_-6web_2000x.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Welcome To <br> A.B. <span>BROTHER'S</span></strong></h1>
                            <h3 class="m-b-40"><b>मिसळ आणि चाय कॉर्नर</b></h3>
                            <h3><b>असल झणझणीत वऱ्हाडी चव</b></h3>

                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <div class="slides-navigation">
            <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
            <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
        </div>
    </div>
    <!-- End slides -->

    <!-- Start About -->
    <div class="about-section-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 text-center">
                    <div class="inner-column">
                        <h1>Welcome To <span>A.B.BROTHER'S</span></h1>
                        <h4>Little Story</h4>
                        <p class="text-justify">We A B brothers have started the idea of "Good food for good people" to serve the people of India 'spicy and quality hygienic food'
                            we two brothers understood the need and necesssity of Misal in our area and therefore implemented the idea of Misal Pav.
                            Due to corona virus outbreak and lockdown we lost our jobs and dignity that encouraged us to go with this idea.</p>

                        <p class="text-justify">We are Happy to say that our first priority about people is their health & serve them hygienic food. we will always promote customer satisfaction. We proudly say that we are indians and are ready to serve the lovely people of Maharashtra and India..!</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <img src="images/misalpav/360_F_367950457_q5L44UUBzQHjAn3D2m6HDePoIfnurDoX.jpg" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
    <!-- End About -->

    <!-- Start QT -->
    <div class="qt-box qt-background">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto text-center">
                    <p class="lead">
                        " If you're not the one cooking, stay out of the way and compliment the chef. "
                    </p>
                    <!-- <span class="lead">Michael Strahan</span> -->
                </div>
            </div>
        </div>
    </div>
    <!-- End QT -->

    <!-- Start Menu -->
    <div class="menu-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading-title text-center">
                        <h2>Special Menu</h2>
                        <a href="test"><button class="btn btn-primary">FOOD</button></a>
                        <p>Hello Friends..! Welcome to our A.B.Brothers Misal House Family..!</p>
                    </div>
                </div>
            </div>

            <div class="row inner-menu-box">

                <div class="col-3">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                        <a class="nav-link active mt-2" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">All</a>

                        <!-- Query To Show List Of Categories -->
                        <?php

                            $getCategory=$conn->prepare("SELECT * FROM category_menu");
                            $getCategory->execute();
                            $categories=$getCategory->fetchAll(PDO::FETCH_ASSOC);
                            foreach($categories as $category)
                            {
                        
                        ?>
                            <a class="nav-link mt-2" id="v-pills-panipuri-tab" data-toggle="pill" href="#<?php echo $category['menu_id'];?>" role="tab" aria-controls="v-pills-panipuri" aria-selected="false"><?php echo $category['category_name'];?></a>

                        <?php
                            }
                        
                        ?>


                        <!-- Query To Show List Of Categories -->

                        <!-- <a class="nav-link mt-2" id="v-pills-panipuri-tab" data-toggle="pill" href="#v-pills-panipuri" role="tab" aria-controls="v-pills-panipuri" aria-selected="false">Pani Puri</a>
                        <a class="nav-link mt-2" id="v-pills-chai-tab" data-toggle="pill" href="#v-pills-chai" role="tab" aria-controls="v-pills-chai" aria-selected="false">Chai</a>
                        <a class="nav-link mt-2" id="v-pills-ice-tab" data-toggle="pill" href="#v-pills-ice" role="tab" aria-controls="v-pills-ice" aria-selected="false">Ice Cream</a>-->
                    </div> 
                </div>

                <div class="col-9">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                            <div class="row">

                                <!-- Query To Show all products -->
                                <?php
                                    $getProduct=$conn->prepare("SELECT * FROM menu_details");
                                    $getProduct->execute();
                                    $products=$getProduct->fetchAll(PDO::FETCH_ASSOC);
                                    foreach($products as $product)
                                    {
                                ?>
                                <div class="col-lg-4 col-md-6 special-grid drinks">
                                    <div class="gallery-single fix">
                                        <img src="ab_admin/images/menu_img/<?php echo $product['image'];?>" class="img-fluid image-all" alt="Image">
                                        <div class="why-text">
                                            <h4><?php echo $product['menu_name'];?></h4>
                                            <p>Pride Of Maharashtra</p>
                                            <h5><?php echo $product['prize'];?></h5>
                                        </div>
                                    </div>
                                </div> 
                                <?php
                            }

                                ?> 
                                </div>
                        </div>
                        <!-- Query To Show all products -->

                        <!-- Query To  Fetch Category -->
                        <?php
                         $getCategory=$conn->prepare("SELECT * FROM category_menu");
                         $getCategory->execute();
                         $categories=$getCategory->fetchAll(PDO::FETCH_ASSOC);
                         foreach($categories as $category)
                         {
                        
                        
                        ?>
                        

                          <!-- Query To Fetch Category -->
                    

                        <!-- 	Pani Puri Products -->
                        <div class="tab-pane fade" id="<?php echo $category['menu_id'];?>" role="tabpanel" aria-labelledby="v-pills-panipuri-tab">
                            
                            <div class="row">
                                <!-- Query To Fetch Product According to Category -->
                                <?php
                                $id=$category['menu_id'];

                                    $getProduct=$conn->prepare("SELECT * FROM menu_details WHERE category_id= $id");
                                    $getProduct->execute();
                                    $products=$getProduct->fetchAll(PDO::FETCH_ASSOC);
                                    foreach($products as $product)
                                    {
                                
                                
                                ?>

                               

                                <div class="col-lg-4 col-md-6 special-grid drinks">
                                    <div class="gallery-single fix">
                                        <img src="ab_admin/images/menu_img/<?php echo $product['image'];?>" class="img-fluid image-all" alt="Image">
                                        <div class="why-text">
                                            <h4><?php echo $product['menu_name'];?></h4>
                                            <p>Pride Of Maharashtra</p>
                                            <h5><?php echo $product['prize'];?></h5>
                                        </div>
                                    </div>
                                </div> 

                                 <!-- Query To Fetch Product According to Category -->
                                <?php

                                    }
                                
                                ?>
                               


                            </div>
                        </div>
                        <?php } ?>
                         <!-- 	Pani Puri Products -->

                        <!-- 	Chai Products -->
                        <!-- <div class="tab-pane fade" id="v-pills-chai" role="tabpanel" aria-labelledby="v-pills-chai-tab">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 special-grid dinner">
                                    <div class="gallery-single fix">
                                        <img src="images/chai/344-3446117_photo-wallpaper-chocolate-roses-bouquet-cup-book-.jpg" class="img-fluid image-all" alt="Image">

                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6 special-grid dinner">
                                    <div class="gallery-single fix">
                                        <img src="images/chai/istockphoto-1050716504-612x612.jpg" class="img-fluid image-all" alt="Image">

                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 special-grid dinner">
                                    <div class="gallery-single fix">
                                        <img src="images/chai/istockphoto-628964312-170667a.jpg" class="img-fluid image-all" alt="Image">

                                    </div>
                                </div>
                            </div>
                        </div> -->
                         <!-- 	Chai Products -->

                           <!-- Icecream Products -->
                            <!-- <div class="tab-pane fade" id="v-pills-ice" role="tabpanel" aria-labelledby="v-pills-ice-tab">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 special-grid dinner">
                                        <div class="gallery-single fix">
                                            <img src="images/ice/aliona-gumeniuk-pHDFgXWIOK0-unsplash.jpg" class="img-fluid image-all" alt="Image">

                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 special-grid dinner">
                                        <div class="gallery-single fix">
                                            <img src="images/ice/bryn-beatson-CHRSuUZonZ4-unsplash.jpg" class="img-fluid image-all" alt="Image">

                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 special-grid dinner">
                                        <div class="gallery-single fix">
                                            <img src="images/ice/prachi-palwe-qGHw7ffz8JE-unsplash.jpg" class="img-fluid image-all" alt="Image">

                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 special-grid dinner">
                                        <div class="gallery-single fix">
                                            <img src="images/ice/heather-barnes-XlBkpiB2nRw-unsplash.jpg" class="img-fluid image-all" alt="Image">

                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 special-grid dinner">
                                        <div class="gallery-single fix">
                                            <img src="images/ice/jasmina-rojko-dlje3NLZQ9Q-unsplash.jpg" class="img-fluid image-all" alt="Image">

                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 special-grid dinner">
                                        <div class="gallery-single fix">
                                            <img src="images/ice/sabri-tuzcu--RftbQ6sxG8-unsplash.jpg" class="img-fluid image-all" alt="Image">

                                        </div>
                                    </div>
                                </div>
                            </div> -->
                             <!-- Icecream Products -->

                        </div>
                    </div>

                </div>

            </div>
        </div>
        <!-- End Menu -->

        <!-- Start Gallery -->
        <div class="gallery-box">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="heading-title text-center">
                            <h2>Gallery</h2>
                            <p>Hello Friends..! Welcome to our A.B.Brothers Misal House Family..!</p>
                        </div>
                    </div>
                </div>
                <div class="tz-gallery">
                    <div class="row">
                        <?php
                        $stmt_gal = $conn->prepare("SELECT * FROM gallery ORDER BY gallery_id DESC");
                        $stmt_gal->execute();
                        $row_gal = $stmt_gal->fetchAll(PDO::FETCH_ASSOC);
                        for ($i = 0; $i < count($row_gal); $i++) {
                            // if ($row_gal[$i]['image']="")
                            //  {
                            // 	echo "No Gallery Image Uploaded";
                            //  }

                            //   else{
                        ?>
                            <div class="col-sm-12 col-md-4 col-lg-3">
                                <a class="lightbox" href="ab_admin/images/gallery/<?php echo $row_gal[$i]['image']; ?>">
                                    <img class="img-fluid img-gall" src="ab_admin/images/gallery/<?php echo $row_gal[$i]['image']; ?>" alt="Gallery Images">
                                </a>
                            </div>
                            <!-- <div class="col-sm-12 col-md-4 col-lg-3">
						<a class="lightbox" href="images/pani/istockphoto-1314329942-170667a.jpg">
							<img class="img-fluid img-gall" src="images/pani/istockphoto-1314329942-170667a.jpg" alt="Gallery Images">
						</a>
					</div> -->
                        <?php }
                        // }
                        ?>
                        <!-- <div class="col-sm-12 col-md-4 col-lg-3">
						<a class="lightbox" href="images/misalpav/360_F_367950457_q5L44UUBzQHjAn3D2m6HDePoIfnurDoX.jpg">
							<img class="img-fluid img-gall" src="images/misalpav/360_F_367950457_q5L44UUBzQHjAn3D2m6HDePoIfnurDoX.jpg" alt="Gallery Images">
						</a>
					</div>
					<div class="col-sm-12 col-md-4 col-lg-3">
						<a class="lightbox" href="images/ice/umesh-soni-MeGx6pA1zGA-unsplash.jpg">
							<img class="img-fluid img-gall" src="images/ice/umesh-soni-MeGx6pA1zGA-unsplash.jpg" alt="Gallery Images" style="width: 280px;">
						</a>
					</div>

					<div class="col-sm-12 col-md-4 col-lg-3">
						<a class="lightbox" href="images/chai/photo-1609855245578-0f3ffda50cf4.jpg">
							<img class="img-fluid img-gall" src="images/chai/photo-1609855245578-0f3ffda50cf4.jpg" alt="Gallery Images">
						</a>
					</div>
					<div class="col-sm-12 col-md-4 col-lg-3">
						<a class="lightbox" href="images/misalpav/f64673_fffd3749eb6c4848b9e794d24358da43_mv2.jpg">
							<img class="img-fluid img-gall" src="images/misalpav/f64673_fffd3749eb6c4848b9e794d24358da43_mv2.jpg" alt="Gallery Images">
						</a>
					</div>
					<div class="col-sm-12 col-md-4 col-lg-3">
						<a class="lightbox" href="images/pani/istockphoto-858151814-612x612.jpg">
							<img class="img-fluid img-gall" src="images/pani/istockphoto-858151814-612x612.jpg" alt="Gallery Images">
						</a>
					</div>
					

					<div class="col-sm-12 col-md-4 col-lg-3">
						<a class="lightbox" href="images/chai/photo-1561336526-2914f13ceb36.jpg">
							<img class="img-fluid img-gall" src="images/chai/photo-1561336526-2914f13ceb36.jpg" alt="Gallery Images">
						</a>
					</div> -->

                    </div>
                </div>
            </div>
        </div>
        <!-- End Gallery -->
        <!-- Start Customer Reviews -->
        <!-- <div class="customer-reviews-box">
	
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Customer Reviews</h2>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-8 mr-auto ml-auto text-center">
					<div id="reviews" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner mt-4">
							<div class="carousel-item text-center active">
								<div class="img-box p-1 border rounded-circle m-auto">
									<img class="d-block w-100 rounded-circle" src="images/quotations-button.png" alt="">
								</div>
								<h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Paul Mitchel</strong></h5>
								<h6 class="text-dark m-0">Web Developer</h6>
								<p class="m-0 pt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis vel, semper malesuada ante. Idac bibendum scelerisque non non purus. Suspendisse varius nibh non aliquet.</p>
							</div>
							<div class="carousel-item text-center">
								<div class="img-box p-1 border rounded-circle m-auto">
									<img class="d-block w-100 rounded-circle" src="images/quotations-button.png" alt="">
								</div>
								<h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Steve Fonsi</strong></h5>
								<h6 class="text-dark m-0">Web Designer</h6>
								<p class="m-0 pt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis vel, semper malesuada ante. Idac bibendum scelerisque non non purus. Suspendisse varius nibh non aliquet.</p>
							</div>
							<div class="carousel-item text-center">
								<div class="img-box p-1 border rounded-circle m-auto">
									<img class="d-block w-100 rounded-circle" src="images/quotations-button.png" alt="">
								</div>
								<h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Daniel vebar</strong></h5>
								<h6 class="text-dark m-0">Seo Analyst</h6>
								<p class="m-0 pt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis vel, semper malesuada ante. Idac bibendum scelerisque non non purus. Suspendisse varius nibh non aliquet.</p>
							</div>
						</div>
						<a class="carousel-control-prev" href="#reviews" role="button" data-slide="prev">
							<i class="fa fa-angle-left" aria-hidden="true"></i>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#reviews" role="button" data-slide="next">
							<i class="fa fa-angle-right" aria-hidden="true"></i>
							<span class="sr-only">Next</span>
						</a>
                    </div>
				</div>
			</div>
		</div>
	</div> -->
        <!-- End Customer Reviews -->

        <!-- Start Contact info -->

        <!-- End Contact info -->

        <!-- Start Footer -->
        <?php require_once "footer.php" ?>
        <!-- End Footer -->

        <a href="#" id="back-to-top" title="Back to top" style="display: none;"><i class="fa fa-paper-plane-o" aria-hidden="true">

            </i></a>

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