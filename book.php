<?php
if(isset($_POST['Book']))
{
  $firstname = $_POST['firstname'];
  echo $firstname;
  exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="icon" href="images/favicon.jpg" type="images/jpg" sizes="16x16">
  <title>Booking</title>
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
    <div class="form-row hidden">
    <div class="form-group">
      <?php
                  if(is_array($get_package)){
                    $count =0;
                    foreach ($get_package as $get_pack) {
                      $count+=1;
                      ?> 
          <input type="text" class="form-control" id="amt" name="cost" value="<?php echo $get_pack['price']; ?>">
    </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Booking By</label>
      <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Email">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">email</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">no of persons</label>
    <input type="text" class="form-control"  id="persons" name="persons" placeholder="1234 Main St">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Address</label>
    <input type="text" class="form-control" id="Address" name="Address" placeholder="Apartment, studio, or floor">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input type="text" class="form-control" id="inputCity" name="city">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">State</label>
     <input type="text" class="form-control" id="inputState" name="state">
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">contact</label>
      <input type="text" class="form-control" id="phone" name="phone">
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Total Cost</label>
      <input type="text" class="form-control" id="cost" name="amount">
    </div>
  </div>
  <button type="submit" name="Book" id="process_order" class="btn btn-primary">Booking</button>
</form>
<?php
}
}
}
?>


</body>
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="js/process_order.js"></script>
<script>
  $(document).ready(function() {
    //this calculates values automatically 
    sum();
    $("#persons").on("keydown keyup", function() {
        sum();
    });
});
  function sum() {
            var num1 = document.getElementById('amt').value;
            var num2 = document.getElementById('persons').value;
      var result = parseInt(num1) * parseInt(num2);
     
            if (!isNaN(result)) {
                document.getElementById('cost').value = result;
        
            }
        }
</script>

</html>
