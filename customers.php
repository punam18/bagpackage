<!DOCTYPE html>
<html lang="en">
<head>
   <link rel="icon" href="images/favicon.jpg" type="images/jpg" sizes="16x16">
  <title>Customers</title>
  <meta charset="utf-8">
 
  
  
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    #logo
    {

      height: 50px;
      width: 150px;
      margin: -15px -15px -15px -15px;
    }
    .new_Application{
  display:none;
  margin-top: 15px;
  /*border: 1px solid #CCC;*/
  padding: 2%;
}
#basicTable
{
  margin-left: 20px;
  margin-top: 20px;
}
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php">
				
							<img src="images/bpv.png" id="logo">
						</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
     
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid">    
  <div class="row content">
   <div class="col-sm-2 sidenav">
      <p style="font-size: 18px;border-bottom: 1px solid #ddd;"><a href="admin.php" ><span class="pull-left">
             <i class="fa fa-briefcase" style="font-size:18px;  margin-right: 10px;"></i>
              </span>Packages<span class="pull-right">
                <i class="fa fa-chevron-right"></i>
              </span></a></p>


      <p style="font-size: 18px;border-bottom: 1px solid #ddd;"><a href="location.php"><span class="pull-left">
               <i class="fa fa-bus" style="font-size:18px; margin-right: 10px;"></i>
              </span>
              </span>Location<span class="pull-right">
                <i class="fa fa-chevron-right"></i>
              </span></a></p>
      
       <p style="font-size: 18px;"><a href="customers.php"><span class="pull-left">
               <i class="fa fa-group" style="font-size:18px; margin-right: 10px;"></i>
              </span>
              </span>Customers<span class="pull-right">
                <i class="fa fa-chevron-right"></i>
              </span></a></p>
      
    
    </div>
	  
  
    <div class="col-sm-8 text-left"> 
  <!-- 
       <button class="btn btn-warning new_Apply_btn">Add Package</button>
	<div class="new_Application" id="packages">
         <h1>Add Package</h1>
	  <form method="POST" id="package_form">
<div class="col-md-6">
    <div class="form-group">
   <label for="package">Package</label>
    <input type="file" class="form-control" id="package"  name="pkg">
    </div>

      <div class="form-group">
    <label for="detailes">Name</label>
    <input type="text" class="form-control" id="name"  placeholder="Enter Name">
   </div>

      <div class="form-group">
    <label for="Price">Price</label>
    <input type="text" class="form-control" id="price"  placeholder="Enter Price">
   </div>


   <div class="form-group">
    <label for="Day">Day</label>
    <input type="text" class="form-control" id="day"  placeholder="Enter Day">
   </div>


   <div class="form-group">
    <label for="Travel By">Travel By</label>
    <input type="text" class="form-control" id="travel_By"  placeholder="Enter Travel By">
   </div>


    <button type="submit" id="savebtn" class="btn btn-success"  style="margin-left: 412px;
    margin-top: -84px; ">Submit</button>
  
</div>


</form>
    </div>
 -->

<div class="row">
              <?php         

              require_once ("lib/helper.php");
              require_once("lib/library_functions.php");
              $customer_arr = array();
              array_push($customer_arr,1);
              $get_customer = $obj->select_prepare("*","customer","status=?","s",$customer_arr);


              ?>


              <table id="basicTable" class="table table-striped table-bordered responsive myDatatable">
                <thead class="">
                  <tr>
                    <th>Sr.no</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Members</th>
                   
                    <th>Options</th>
                  </tr>
                </thead>
                <tbody id="tbody">
                  <?php
                  if(is_array($get_customer)){
                    $count =0;
                    foreach ($get_customer as $get_cust) {
                      $count+=1;
                      ?>
                      <tr>
                        <td><?php echo $count; ?> </td>                      
                        <td><?php echo $get_cust['firstname']  .''.$get_cust['lastname']; ?> </td>
                        <td><?php echo $get_cust['phone']; ?> </td>
                        <td><?php echo $get_cust['email']; ?> </td>
                        <td><?php echo $get_cust['address']; ?> </td>
                         <td><?php echo $get_cust['persons']; ?> </td>
                       <td>
                          <?php echo '
                           <a href="edit_package_form.php?id='.$get_cust['cid'].'"><i class="fa fa-pencil-square-o" aria-hidden="true" onclick="return editing()"></i></a>';
                           echo'<a href="del_package.php?id='.$get_cust['cid'].'"></i><i class="fa fa-trash-o" aria-hidden="true" onclick="return deleting();"></i></a>';
                         ?>
                       </td>
                      </tr>
                      <?php
                    }
                  }
                  else{
                    ?>
                    <tr>
                      <td>No Records</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td> 
                      <td></td>                    
                      <td></td> 
                    </tr>
                    <?php
                  }
                  ?>

                </tbody>
              </table>

            </div><!-- row -->

       


    <!--  -->
      
  
  </div>




</div>
</div>
<footer class="container-fluid text-center">
  <p>Footer Text</p>
</footer>
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.responsive.js"></script>
<script src="js/dataTables.bootstrap.js"></script>
<script src="js/responsiveslides.min.js"></script>
<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
<script src="js/jquery-ui.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<!-- Bootstrap-JavaScript --> <script type="text/javascript" src="js/bootstrap.js"></script>

<!-- Responsive-Slider-JavaScript -->

 <link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="all">
<script src="admin_form.js"></script>
<script>
    jQuery(document).ready(function(){

      jQuery('#basicTable').DataTable({
        responsive: true
      });
    });
  </script>
  <script>
  function editing()
{
  confirm("ARE YOU SURE U WANT TO EDIT");
}
function deleting()
{
  confirm("ARE YOU SURE U WANT TO DELETE");
}



  </script>



</body>
</html>
