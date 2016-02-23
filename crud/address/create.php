<?php

         require 'database.php';

    if ( !empty($_POST)) {
        // keep track validation errors
        $zipError = null;
        $street_oneError = null;
        $street_twoError = null;
        $cityError = null;
        $stateError = null;
	$countryError = null;

        // keep track post values
        $zip = $_POST['zip'];
        $street_one = $_POST['street_one'];
        $street_two = $_POST['street_two'];
        $city = $_POST['city'];
        $state = $_POST['state'];
	$country = $_POST['country'];

        // validate input
        $valid = true;
        if (empty($zip)) {
            $zipError = 'Please enter Zip';
            $valid = false;
        }

        if (empty($street_one)) {
            $street_oneError = 'Please enter Street  Address';
            $valid = false;
        } 

        if (empty($street_two)) {
            $street_twoError = 'Please enter Unit  Number';
            $valid = false;
        }

        if (empty($city)) {
                $cityError = 'Please enter City';
                $valid = false;
        }

        if (empty($state)) {
                $stateError = 'Please enter a state';
                $valid = false;
        }

	if (empty($country)) {
		$countryError = 'Please enter a country';
		$valid = false;
	}


        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO address (zip,street_one,street_two,city,state,country) values(?, ?, ?, ?, ?, ?)";
            $q = $pdo->prepare($sql);

           $q->execute(array($zip,$street_one,$street_two,$city,$state,$country));

            Database::disconnect();
            header("Location: index.php");
       }

  }

?>



<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    

        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>


<body>
    <div class="container">

                <div class="span10 offset1">
                    <div class="row">
                        <h3>Create an Address</h3>
                    </div>


     <form class="form-horizontal" action="create.php" method="post">

        <div class="control-group <?php echo !empty($zipError)?'error':'';?>"> 
            <label class="control-label">Zip</label>
         <div class="controls">
 <input name="zip" type="text"  placeholder="Zip" value="<?php echo !empty($zip)?$zip:'';?>">

          <?php if (!empty($zipError)): ?>
          <span class="help-inline"><?php echo $zipError;?></span>
          <?php endif; ?>
          </div>
          </div>




        <div class="control-group <?php echo !empty($street_oneError)?'error':'';?>">
        <label class="control-label">Street One</label>
        <div class="controls">
       <input name="street_one" type="text" placeholder="street_one" value="<?php echo !empty($street_one)?$street_one:'';?>">

       <?php if (!empty($street_oneError)): ?>
        <span class="help-inline"><?php echo $street_oneError;?></span>
        <?php endif;?>
       </div>
       </div>


       <div class="control-group <?php echo !empty($street_twoError)?'error':'';?>">
        <label class="control-label">Street Two</label>

        <div class="controls">
 <input name="street_two" type="text"  placeholder="street_two" value="<?php echo !empty($street_two)?$street_two:'';?>">
  <?php if (!empty($street_twoError)): ?>
     <span class="help-inline"><?php echo $street_twoError;?></span>
   <?php endif;?>
     </div>
     </div>




         <div class="control-group <?php echo !empty($cityError)?'error':'';?>">
        <label class="control-label">City</label>
       <div class="controls">
 <input name="city" type="text"  placeholder="city" value="<?php echo !empty($city)?$city:'';?>">
  <?php if (!empty($cityError)): ?>
     <span class="help-inline"><?php echo $cityError;?></span>
   <?php endif;?>
     </div>
     </div>

     <div class="control-group <?php echo !empty($stateError)?'error':'';?>">
        <label class="control-label">State</label>
       <div class="controls">
 <input name="state" type="text"  placeholder="state" value="<?php echo !empty($state)?$state:'';?>">
  <?php if (!empty($stateError)): ?>
     <span class="help-inline"><?php echo $stateError;?></span>
   <?php endif;?>
     </div>
     </div>


<div class="control-group <?php echo !empty($countryError)?'error':'';?>">
        <label class="control-label">Country</label>
       <div class="controls">
 <input name="country" type="text"  placeholder="country" value="<?php echo !empty($country)?$country:'';?>">
  <?php if (!empty($countryError)): ?>
     <span class="help-inline"><?php echo $countryError;?></span>
   <?php endif;?>
     </div>
     </div>







      <div class="form-actions">
      <button type="submit" class="btn btn-success">Create</button>
      <a class="btn" href="index.php">Back</a>
       </div>
       </form>

         </div>
         </div> <!-- /container -->


 </body>
</html>
