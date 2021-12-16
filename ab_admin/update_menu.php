<?php 
require "../conn.php";
date_default_timezone_set("Asia/Kolkata");
$id=$_GET['id'];
$stmt =$conn->prepare("SELECT * FROM menu_details WHERE menu_details_id=$id");
$stmt->execute();
$row=$stmt->fetchAll(PDO::FETCH_ASSOC);

if(isset($_POST['submit']))
{
	extract($_POST);
	//print_r($_FILES);exit;
	if($_FILES['image']['name']!="")
	{
		$file_size1=$_FILES['image']['size'];
		$file_name1=$_FILES['image']['name'];
		$file_tmp1=$_FILES['image']['tmp_name'];
		$file_type1=$_FILES['image']['type'];
		$errors1=array();
		$arr1=explode('.',$file_name1);
		$extension1=strtolower(end($arr1));
		//to check extension
		$allowed1=array('jpg','jpeg','png');
		/*if(!in_array($extension1,$allowed1))
		{
			$errors1[0]="extension not allowed,please choose jpg, jpeg or png file.";
			
		}*/
		//to check size
		/*if($file_size1>1536000)
		{
			$errors[1]="size should be less than 150kb";
		}*/
		
		//move_uploaded_file("location od temperory stored file","location where i want to store my file");
		
		$date1=$arr1[0]."_".date('dmYhis').".$extension1";
		if(empty($errors1))
		{
			if(move_uploaded_file($file_tmp1,"images/menu_img/".$date1))	
			{
				//2echo "File uploaded successfully.";
			}
			else
			{
				//echo "File not uploaded";
			}

		}
    
	}
   else
    {
       //if user did not upload logo then we will put old logo data in $date1
      $date1=$row[0]['image'];
    }
	

    
try{
	// if(isset($date1))
	// {
		$stmt2=$conn->prepare("UPDATE `menu_details` SET `category_id`=:category_id,`menu_name`=:menu_name,`image`=:image,`status`=:status ,`prize`=:prize WHERE menu_details_id=$id");	
		$executed=$stmt2->execute(array(':image' => $date1,':category_id' =>$category_id,':menu_name' =>$menu_name ,':prize' =>$prize ,':status' => $status));
    if ($executed) {
     echo "<script>alert('Updated Successfully....');window.location.href='menu_list';</script>";
    }
	  /*}
	   else
	   {
		 $stmt2=$conn->prepare("UPDATE `team_member_details` SET `status`=:status WHERE member_id=$id");	
		   $executed=$stmt2->execute(array(':status'=>$status));
	   }*/
	}catch(Exception $e) {
	  echo 'Message: ' .$e->getMessage();
	}
}



?>
<!DOCTYPE html>
<html>

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
  <link rel="stylesheet" type="text/css" href="css/maps/jquery-jvectormap-2.0.3.css" />
  <link href="css/icheck/flat/green.css" rel="stylesheet" />
  <link href="css/floatexamples.css" rel="stylesheet" type="text/css" />

  <script src="js/jquery.min.js"></script>
  <script src="js/nprogress.js"></script>

</head>


<body class="nav-md">

  <div class="container body">


    <div class="main_container">
		<?php require_once "header.php"; ?>
      <div class="right_col" role="main">
		<div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Update Menu Details</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br />
                  <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="" enctype="multipart/form-data">
					
                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Category Name <span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control" name="category_id" required="required">
                            <option>Select Course</option>
                                <?php
                                 $course=$conn->prepare("SELECT * FROM category_menu ORDER BY menu_id DESC");
                                 $course->execute();
                                 $row_course=$course->fetchAll(PDO::FETCH_ASSOC);
                                 for ($c=0; $c <count($row_course) ; $c++) { 
                                 ?>
                            <option value="<?php echo $row_course[$c]['menu_id']; ?>" <?php if($row_course[$c]['menu_id']==$row[0]['category_id']){echo "selected";}?>><?php echo $row_course[$c]['category_name']; ?></option>

                                <?php } ?>
                          </select>
                      </div>
                    </div>

                     <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Menu Name <span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="" class="form-control col-md-7 col-xs-12" type="text" name="menu_name" required="required" placeholder="Ex: Btech,Bsc,Mtech,etc..." value="<?php echo $row[0]['menu_name']; ?>">
                      </div>
                    </div>

                     <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Prize <span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="" class="form-control col-md-7 col-xs-12" type="text" name="prize" required="required" placeholder="Enter Prize" value="<?php echo $row[0]['prize']; ?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Previous Image <span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <img src="images/menu_img/<?php echo $row[0]['image']; ?>" style="width:100px;height:100px;">
                      </div>
                    </div> 
					
                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Upload New Image <span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input  class=" col-md-7 col-xs-12" type="file" name="image">
                        <input type="hidden" name="old_img" >
                      </div>
                    </div> 
                    
                    
			<script type="text/javascript">
				/*$('#file1').bind('change', function() {
					if((this.files[0].size/1024)>150)
					{
						alert("Image size should be less than 150kb");
						$('#file1').val('');
					}
					
					//alert('This file size is: ' + this.files[0].size/1024/1024 + "MB");
				});*/
				var _URL = window.URL || window.webkitURL;

				$("#file1").change(function(e) {
					var file, img;
					if ((file = this.files[0])) {
						img = new Image();
						//alert(file.size/1024);
						img.onload = function() {
							//alert(this.width + " " + this.height);
							if(file.size/1024>1023 || this.width!=1500 || this.height!=1500)
							{
								alert("Image size should be less than 1 MB, height=1500px and width=1500px.");
								$('#file1').val('');
							}
						};
						img.onerror = function() {
							alert( "not a valid file: " + file.type);
						};
						img.src = _URL.createObjectURL(file);
					}

				});
			</script> 
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Status<span class="required">*</span></label>
						<div class="col-md-4 col-sm-4 col-xs-12">
						
							Active:
							<input type="radio" class="flat" name="status" id="genderM" value="active" <?php if(isset($row[0]['status']) && $row[0]['status']=="active"){echo "checked";}?> checked> 
							Inactive:
							<input type="radio" class="flat" name="status" id="genderF" value="inactive"<?php if(isset($row[0]['status']) && $row[0]['status']=="inactive"){echo "checked";}?>>
						
						</div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button type="submit" name="submit" class="btn btn-success">Update</button>
						            <a href="member_list"><button class="btn btn-primary">Cancel</button></a>
                      </div>
                    </div>

                  </form>
                </div>
              </div>
            </div>
          </div>
        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Developed By <a href="http://www.softgrowthinfotech.com">Softgrowth Infotech</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
      <!-- /page content -->
    </div>

  </div>

  <div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
  </div>

  <script src="js/bootstrap.min.js"></script>

  <!-- gauge js -->
  <script type="text/javascript" src="js/gauge/gauge.min.js"></script>
  <script type="text/javascript" src="js/gauge/gauge_demo.js"></script>
  <!-- bootstrap progress js -->
  <script src="js/progressbar/bootstrap-progressbar.min.js"></script>
  <!-- icheck -->
  <script src="js/icheck/icheck.min.js"></script>
  <!-- daterangepicker -->
  <script type="text/javascript" src="js/moment/moment.min.js"></script>
  <script type="text/javascript" src="js/datepicker/daterangepicker.js"></script>
  <!-- chart js -->
  <script src="js/chartjs/chart.min.js"></script>

  <script src="js/custom.js"></script>

  <!-- flot js -->
  <!--[if lte IE 8]><script type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->
  <script type="text/javascript" src="js/flot/jquery.flot.js"></script>
  <script type="text/javascript" src="js/flot/jquery.flot.pie.js"></script>
  <script type="text/javascript" src="js/flot/jquery.flot.orderBars.js"></script>
  <script type="text/javascript" src="js/flot/jquery.flot.time.min.js"></script>
  <script type="text/javascript" src="js/flot/date.js"></script>
  <script type="text/javascript" src="js/flot/jquery.flot.spline.js"></script>
  <script type="text/javascript" src="js/flot/jquery.flot.stack.js"></script>
  <script type="text/javascript" src="js/flot/curvedLines.js"></script>
  <script type="text/javascript" src="js/flot/jquery.flot.resize.js"></script>
  <script>
    $(document).ready(function() {
      // [17, 74, 6, 39, 20, 85, 7]
      //[82, 23, 66, 9, 99, 6, 2]
      var data1 = [
        [gd(2012, 1, 1), 17],
        [gd(2012, 1, 2), 74],
        [gd(2012, 1, 3), 6],
        [gd(2012, 1, 4), 39],
        [gd(2012, 1, 5), 20],
        [gd(2012, 1, 6), 85],
        [gd(2012, 1, 7), 7]
      ];

      var data2 = [
        [gd(2012, 1, 1), 82],
        [gd(2012, 1, 2), 23],
        [gd(2012, 1, 3), 66],
        [gd(2012, 1, 4), 9],
        [gd(2012, 1, 5), 119],
        [gd(2012, 1, 6), 6],
        [gd(2012, 1, 7), 9]
      ];
      $("#canvas_dahs").length && $.plot($("#canvas_dahs"), [
        data1, data2
      ], {
        series: {
          lines: {
            show: false,
            fill: true
          },
          splines: {
            show: true,
            tension: 0.4,
            lineWidth: 1,
            fill: 0.4
          },
          points: {
            radius: 0,
            show: true
          },
          shadowSize: 2
        },
        grid: {
          verticalLines: true,
          hoverable: true,
          clickable: true,
          tickColor: "#d5d5d5",
          borderWidth: 1,
          color: '#fff'
        },
        colors: ["rgba(38, 185, 154, 0.38)", "rgba(3, 88, 106, 0.38)"],
        xaxis: {
          tickColor: "rgba(51, 51, 51, 0.06)",
          mode: "time",
          tickSize: [1, "day"],
          //tickLength: 10,
          axisLabel: "Date",
          axisLabelUseCanvas: true,
          axisLabelFontSizePixels: 12,
          axisLabelFontFamily: 'Verdana, Arial',
          axisLabelPadding: 10
            //mode: "time", timeformat: "%m/%d/%y", minTickSize: [1, "day"]
        },
        yaxis: {
          ticks: 8,
          tickColor: "rgba(51, 51, 51, 0.06)",
        },
        tooltip: false
      });

      function gd(year, month, day) {
        return new Date(year, month - 1, day).getTime();
      }
    });
  </script>

  <!-- worldmap -->
  <script type="text/javascript" src="js/maps/jquery-jvectormap-2.0.3.min.js"></script>
  <script type="text/javascript" src="js/maps/gdp-data.js"></script>
  <script type="text/javascript" src="js/maps/jquery-jvectormap-world-mill-en.js"></script>
  <script type="text/javascript" src="js/maps/jquery-jvectormap-us-aea-en.js"></script>
  <!-- pace -->
  <script src="js/pace/pace.min.js"></script>
  <script>
    $(function() {
      $('#world-map-gdp').vectorMap({
        map: 'world_mill_en',
        backgroundColor: 'transparent',
        zoomOnScroll: false,
        series: {
          regions: [{
            values: gdpData,
            scale: ['#E6F2F0', '#149B7E'],
            normalizeFunction: 'polynomial'
          }]
        },
        onRegionTipShow: function(e, el, code) {
          el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
        }
      });
    });
  </script>
  <!-- skycons -->
  <script src="js/skycons/skycons.min.js"></script>
  <script>
    var icons = new Skycons({
        "color": "#73879C"
      }),
      list = [
        "clear-day", "clear-night", "partly-cloudy-day",
        "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
        "fog"
      ],
      i;

    for (i = list.length; i--;)
      icons.set(list[i], list[i]);

    icons.play();
  </script>

  <!-- Doughnut Chart -->
  <script>
    $('document').ready(function() {
      var options = {
        legend: false,
        responsive: false
      };

      new Chart(document.getElementById("canvas1"), {
        type: 'doughnut',
        tooltipFillColor: "rgba(51, 51, 51, 0.55)",
        data: {
          labels: [
            "Symbian",
            "Blackberry",
            "Other",
            "Android",
            "IOS"
          ],
          datasets: [{
            data: [15, 20, 30, 10, 30],
            backgroundColor: [
              "#BDC3C7",
              "#9B59B6",
              "#E74C3C",
              "#26B99A",
              "#3498DB"
            ],
            hoverBackgroundColor: [
              "#CFD4D8",
              "#B370CF",
              "#E95E4F",
              "#36CAAB",
              "#49A9EA"
            ]
          }]
        },
        options: options
      });
    });
  </script>
  <!-- /Doughnut Chart -->
  
  <!-- datepicker -->
  <script type="text/javascript">
    $(document).ready(function() {

      var cb = function(start, end, label) {
        console.log(start.toISOString(), end.toISOString(), label);
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        //alert("Callback has fired: [" + start.format('MMMM D, YYYY') + " to " + end.format('MMMM D, YYYY') + ", label = " + label + "]");
      }

      var optionSet1 = {
        startDate: moment().subtract(29, 'days'),
        endDate: moment(),
        minDate: '01/01/2012',
        maxDate: '12/31/2015',
        dateLimit: {
          days: 60
        },
        showDropdowns: true,
        showWeekNumbers: true,
        timePicker: false,
        timePickerIncrement: 1,
        timePicker12Hour: true,
        ranges: {
          'Today': [moment(), moment()],
          'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days': [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month': [moment().startOf('month'), moment().endOf('month')],
          'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        opens: 'left',
        buttonClasses: ['btn btn-default'],
        applyClass: 'btn-small btn-primary',
        cancelClass: 'btn-small',
        format: 'MM/DD/YYYY',
        separator: ' to ',
        locale: {
          applyLabel: 'Submit',
          cancelLabel: 'Clear',
          fromLabel: 'From',
          toLabel: 'To',
          customRangeLabel: 'Custom',
          daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
          monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
          firstDay: 1
        }
      };
      $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
      $('#reportrange').daterangepicker(optionSet1, cb);
      $('#reportrange').on('show.daterangepicker', function() {
        console.log("show event fired");
      });
      $('#reportrange').on('hide.daterangepicker', function() {
        console.log("hide event fired");
      });
      $('#reportrange').on('apply.daterangepicker', function(ev, picker) {
        console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
      });
      $('#reportrange').on('cancel.daterangepicker', function(ev, picker) {
        console.log("cancel event fired");
      });
      $('#options1').click(function() {
        $('#reportrange').data('daterangepicker').setOptions(optionSet1, cb);
      });
      $('#options2').click(function() {
        $('#reportrange').data('daterangepicker').setOptions(optionSet2, cb);
      });
      $('#destroy').click(function() {
        $('#reportrange').data('daterangepicker').remove();
      });
    });
  </script>
  <script>
    NProgress.done();
  </script>
  <!-- /datepicker -->
  <!-- /footer content -->
</body>

</html>
