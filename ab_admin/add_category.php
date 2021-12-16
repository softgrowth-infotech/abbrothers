<?php
session_start();
require "../conn.php";
if(isset($_SESSION['admin_username']))
{
  
}
else if(isset($_SESSION['sub_admin_login_id']))
{
	$arr=explode('-',$_SESSION['sub_admin_role']);
	if(!in_array('6',$arr))
	{
		echo "<script>alert('Sorry, you do not have the permission to view this page.');</script>";
		echo "<script>window.location.href='loginfile';</script>";
	}
	
}
else
{
  echo "<script>window.location.href='loginfile';</script>";
}

if(isset($_POST['submit']))
 {
  extract($_POST);
    $stmt = $conn->prepare("INSERT INTO `category_menu`(`category_name`,`status`)VALUES(:category_name,:status)");

    $executed=$stmt->execute(array(':category_name' =>$category_name,':status' => $status));
         if($executed)
         {
        echo "<script>alert('Added Successfully....');window.location.href='add_category';</script>";
         }
}


if(isset($_GET['del_id']))
	{		
			$del_id=$_GET['del_id'];	
			$stmt=$conn->prepare("DELETE FROM category_menu WHERE menu_id=$del_id");	
      $executed=$stmt->execute();
				if($executed)
                      {
						 header("Location:add_category");
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

  <link href="js/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
  <link href="js/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="js/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="js/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="js/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css" />

  <script src="js/jquery.min.js"></script>


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
                  <h2>Add Category For Menu</h2>
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
                        <input id="" class="form-control col-md-7 col-xs-12" type="text" name="category_name" required="required" placeholder="Enter Category Name">
                      </div>
                    </div>

                     
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Status<span class="required">*</span></label>
            <div class="col-md-4 col-sm-4 col-xs-12">
            
              Active:
              <input type="radio" class="flat" name="status" id="genderM" value="active" checked> 
              Inactive:
              <input type="radio" class="flat" name="status" id="genderF" value="inactive">
            
            </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button type="submit" name="submit" class="btn btn-success">Submit</button>
                        <button type="submit" class="btn btn-primary">Cancel</button>
                      </div>
                    </div>

                  </form>
                </div>
              </div>
            </div>
          </div>







        <!-- table -->
        <div class="">
          
          <div class="clearfix"></div>

          <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Category List</h2>&nbsp;&nbsp;&nbsp;&nbsp;
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
				<?php
				$stmt=$conn->prepare("SELECT * FROM category_menu ORDER BY menu_id DESC");
				$stmt->execute();
				$row=$stmt->fetchAll(PDO::FETCH_ASSOC);
				
				?>
                  <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Sr. No.</th>
                        <th>Room Type</th>
						<th>Room Price</th>
						<th>Action</th>
                    </thead>
                    <tbody>
					<?php
					for($i=0;$i<count($row);$i++)
				    {
					?>
                      <tr>
                        <td><?php echo $i+1;?></td>
                        <td><?php echo $row[$i]['category_name']; ?></td>
						<td><?php echo $row[$i]['status']; ?></td>
						<td>
							<a href="update_category?id=<?php echo $row[$i]['menu_id']; ?>"><button>Update</button></a>
							<a href="add_category?del_id=<?php echo $row[$i]['menu_id']; ?>" onclick="return confirm('Are you sure you want to delete this?');"><button>Delete</button></a>
						</td>
                      </tr>
					<?php
					}
					?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            

                  
                </div>
              </div>
              
              <!-- footer content -->
                <!--<footer>
				  <div class="pull-right">
					Developed By <a href="http://www.softgrowthinfotech.com">Softgrowth Infotech</a>
				  </div>
				  <div class="clearfix"></div>
				</footer>-->
              <!-- /footer content -->
</div>

        </div>
         
            <!-- /page content -->
          

        <div id="custom_notifications" class="custom-notifications dsp_none">
          <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
          </ul>
          <div class="clearfix"></div>
          <div id="notif-group" class="tabbed_notifications"></div>
        </div>

        <script src="js/bootstrap.min.js"></script>

        <!-- bootstrap progress js -->
        <script src="js/progressbar/bootstrap-progressbar.min.js"></script>
        <!-- icheck -->
        <script src="js/icheck/icheck.min.js"></script>

        <script src="js/custom.js"></script>


        <!-- Datatables -->
        <!-- <script src="js/datatables/js/jquery.dataTables.js"></script>
  <script src="js/datatables/tools/js/dataTables.tableTools.js"></script> -->

        <!-- Datatables-->
        <script src="js/datatables/jquery.dataTables.min.js"></script>
        <script src="js/datatables/dataTables.bootstrap.js"></script>
        <script src="js/datatables/dataTables.buttons.min.js"></script>
        <script src="js/datatables/buttons.bootstrap.min.js"></script>
        <script src="js/datatables/jszip.min.js"></script>
        <script src="js/datatables/pdfmake.min.js"></script>
        <script src="js/datatables/vfs_fonts.js"></script>
        <script src="js/datatables/buttons.html5.min.js"></script>
        <script src="js/datatables/buttons.print.min.js"></script>
        <script src="js/datatables/dataTables.fixedHeader.min.js"></script>
        <script src="js/datatables/dataTables.keyTable.min.js"></script>
        <script src="js/datatables/dataTables.responsive.min.js"></script>
        <script src="js/datatables/responsive.bootstrap.min.js"></script>
        <script src="js/datatables/dataTables.scroller.min.js"></script>


        <!-- pace -->
        <script src="js/pace/pace.min.js"></script>
        <script>
          var handleDataTableButtons = function() {
              "use strict";
              0 !== $("#datatable-buttons").length && $("#datatable-buttons").DataTable({
                dom: "Bfrtip",
                buttons: [{
                  extend: "copy",
                  className: "btn-sm"
                }, {
                  extend: "csv",
                  className: "btn-sm"
                }, {
                  extend: "excel",
                  className: "btn-sm"
                }, {
                  extend: "pdf",
                  className: "btn-sm"
                }, {
                  extend: "print",
                  className: "btn-sm"
                }],
                responsive: !0
              })
            },
            TableManageButtons = function() {
              "use strict";
              return {
                init: function() {
                  handleDataTableButtons()
                }
              }
            }();
        </script>
        <script type="text/javascript">
          $(document).ready(function() {
            $('#datatable').dataTable();
            $('#datatable-keytable').DataTable({
              keys: true
            });
            $('#datatable-responsive').DataTable();
            $('#datatable-scroller').DataTable({
              ajax: "js/datatables/json/scroller-demo.json",
              deferRender: true,
              scrollY: 380,
              scrollCollapse: true,
              scroller: true
            });
            var table = $('#datatable-fixed-header').DataTable({
              fixedHeader: true
            });
          });
          TableManageButtons.init();
        </script>
</body>

</html>
