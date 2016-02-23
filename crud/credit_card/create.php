<?php

         require 'database.php';

    if ( !empty($_POST)) {
        // keep track validation errors
        $nameError = null;
        $numberError = null;
        $security_codeError = null;
        $expirationError = null;
        $typeError = null;

        // keep track post values
        $name = $_POST['name'];
        $number = $_POST['number'];
        $security_code = $_POST['security_code'];
        $expiration = $_POST['expiration'];
        $type = $_POST['type'];

        // validate input
        $valid = true;
        if (empty($name)) {
            $nameError = 'Please enter Name';
            $valid = false;
        }

        if (empty($number)) {
            $numberError = 'Please enter number';
            $valid = false;
        } 

        if (empty($security_code)) {
            $mobileError = 'Please enter security code';
            $valid = false;
        }

        if (empty($expiration)) {
                $expirationError = 'Please enter expiration date';
                $valid = false;
        }

        if (empty($type)) {
                $typeError = 'Please enter a card type';
                $valid = false;
        }


        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO credit_card (name,number,security_code,expiration,type) values(?, ?, ?, ?, ?)";
            $q = $pdo->prepare($sql);

           $q->execute(array($name,$number,$security_code,$expiration,$type));

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
                        <h3>Create a Credit Card</h3>
                    </div>


     <form class="form-horizontal" action="create.php" method="post">

        <div class="control-group <?php echo !empty($nameError)?'error':'';?>">                         <label class="control-label">Name</label>
         <div class="controls">
 <input name="name" type="text"  placeholder="Name" value="<?php echo !empty($name)?$name:'';?>">

          <?php if (!empty($nameError)): ?>
          <span class="help-inline"><?php echo $nameError;?></span>
          <?php endif; ?>
          </div>
          </div>




        <div class="control-group <?php echo !empty($numberError)?'error':'';?>">
        <label class="control-label">Number</label>
        <div class="controls">
       <input name="number" type="text" placeholder="number" value="<?php echo !empty($number)?$number:'';?>">

       <?php if (!empty($numberError)): ?>
        <span class="help-inline"><?php echo $numberError;?></span>
        <?php endif;?>
       </div>
       </div>


       <div class="control-group <?php echo !empty($security_code)?'error':'';?>">
        <label class="control-label">security_code</label>

        <div class="controls">
 <input name="security_code" type="text"  placeholder="security_code" value="<?php echo !empty($security_code)?$security_code:'';?>">
  <?php if (!empty($security_code)): ?>
     <span class="help-inline"><?php echo $security_code;?></span>
   <?php endif;?>
     </div>
     </div>




         <div class="control-group <?php echo !empty($expirationError)?'error':'';?>">
        <label class="control-label">expiration</label>
       <div class="controls">
 <input name="expiration" type="text"  placeholder="expiration" value="<?php echo !empty($expiration)?$expiration:'';?>">
  <?php if (!empty($expirationError)): ?>
     <span class="help-inline"><?php echo $expirationError;?></span>
   <?php endif;?>
     </div>
     </div>

     <div class="control-group <?php echo !empty($typeError)?'error':'';?>">
        <label class="control-label">type</label>
       <div class="controls">
 <input name="type" type="text"  placeholder="type" value="<?php echo !empty($type)?$type:'';?>">
  <?php if (!empty($typeError)): ?>
     <span class="help-inline"><?php echo $typeError;?></span>
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
