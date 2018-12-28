<html lang="en">
<head>
  <link rel="icon" href="images/favicon.jpg" type="images/jpg" sizes="16x16">
  <title>Location</title>
 
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
      padding: 15px;
    }
    .new_Application{
  display:none;
  margin-top: 15px;
  border: 1px solid #CCC;
  padding: 2%;
}
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }

      .row.content {height:auto;} 
      .warning
      {
        color: #f0ad4e;
      }
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
      <ul class="nav navbar-nav">
        <li class="active"><a class="btn-warning" href="#">Home</a></li>
        <li><a class="btn-warning" href="#">About</a></li>
        <li><a class="btn-warning" href="#" >Projects</a></li>
        <li><a class="btn-warning" href="#">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
<?php
   require_once ("lib/helper.php");
              require_once("lib/library_functions.php");
              if(isset($_GET['id']))
{
  $id=$_GET['id'];
              $location_arr = array();
              array_push($location_arr,$id);
              $get_location = $obj->select_prepare("*","location","location_id=?","s",$location_arr);

?>

<div class="container-fluid text-center">    
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
      

       <?php
                  if(is_array($get_location)){
                    $count =0;
                    foreach ($get_location as $get_loc) {
                      $count+=1;
                      ?>
    <form method="POST" >
      <input class="" type="text" class="form-control" id="location_id"  name="location_id" value="<?php echo $get_loc['location_id']; ?>">
<div class="col-md-6">
    <div class="form-group">
    <label for="Location">Location</label>
    <input type="file" class="form-control" id="location"  name="loc" value="<?php echo $get_loc['image']; ?>">
    </div>

      <div class="form-group">
    <label for="Name">Name</label>
    <input type="text" class="form-control" id="name"  placeholder="Enter Name" value="<?php echo $get_loc['place_name']; ?>">
   </div>

      <div class="form-group">
    <label for="Details">Details</label>
   <textarea id="details" maxlength="300" class="form-control " rows="3" cols="25"> <?php echo $get_loc['details']; ?>
 </textarea>
                        <span id="chars"  style="background-color:#E2EEF1;color:Red;font-weight:bold;">300</span> characters remaining


                        <span class="span_err" id="detail_err"></span> 
   </div>


    <button type="submit" id="editsavebtn" class="btn btn-warning" >Submit</button>
  
</div>


</form>
<?php
}

}
}

?>

  </div>
</div>

<footer class="container-fluid text-center">
  <p>Footer Text</p>
</footer>




           
  <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
  <script src="js/responsiveslides.min.js"></script>
<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/edit_location.js"></script>
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

 <link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="all">
 


</body>
</html>
