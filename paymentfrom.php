<!DOCTYPE html>
<html lang="en">
<head>
   <link rel="icon" href="images/favicon.jpg" type="images/jpg" sizes="16x16">
  <title>Bookings</title>
 
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
    #basicTable
{
  margin-left: 20px;
  margin-top: 20px;
}
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      /*padding: 15px;*/
    }
    .new_Application{
  display:none;
  margin-top: 15px;
  /*border: 1px solid #CCC;*/
  padding: 2%;
}
.foot
{
  margin-bottom: 0px;
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
   <?php
   require_once ("lib/helper.php");
              require_once("lib/library_functions.php");
              if(isset($_GET['id']))
{
  $id=$_GET['id'];
              $package_arr = array();
              array_push($package_arr,$id);
              $get_package = $obj->select_prepare("*","packages","package_id=?","s",$package_arr);

?>
  

      <form action="PayUMoney/PayUMoney_form.php" method="POST">
  <div class="form-row">
    <div class="form-group col-md-6 hide">
        <?php
                  if(is_array($get_package)){
                    $count =0;
                    foreach ($get_package as $get_pack) {
                      $count+=1;
                      ?> 
      <label for="inputEmail4">packageid</label>
      <input type="email" class="form-control hidden" id="package_id" name="package_id"> value="<?php echo $get_pack['package_id']; ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">FirstName</label>
      <input type="email" class="form-control" id="firstname" placeholder="FirstName">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Lastname</label>
      <input type="text" class="form-control" id="lastname" placeholder="Lastname">
    </div>
  </div>
  <div class="form-group col-md-6">
    <label for="inputAddress">Mobile</label>
    <input type="text" class="form-control" id="phone" placeholder="90 90 90 90 90">
  </div>
  <div class="form-group col-md-6" >
    <label for="inputAddress">email</label>
    <input type="text" class="form-control" id="email_process" placeholder="someone@gmail.com">
  </div>
  <div class="clearfix"></div>
  <div class="form-group col-md-12">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="Address" placeholder="Apartment, studio, or floor">
  </div>
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputCity">NO. of Person</label>
      <input type="text" class="form-control" name="persons" id="persons">
    </div>
   <!--  <div class="form-group col-md-4">
      <label for="inputState">State</label>
      <select id="inputState" class="form-control">
        <option selected>Choose...</option>
        <option>...</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Zip</label>
      <input type="text" class="form-control" id="inputZip">
    </div>
  </div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label> -->
    </div>
  

<div class="clearfix"></div>

  <button type="submit" id="process_order" name="payment" class="btn btn-warning">Proceed for payment</button>
 
  
</form>
</div>
<?php
}
}
}
?>

<footer class="container-fluid text-center foot">
Footer Text
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




           
<script src="js/process_order.js"></script>
<script>
    jQuery(document).ready(function(){

      jQuery('#basicTable').DataTable({
        responsive: true
      });
    });
  </script>
  
 



</body>
</html>
