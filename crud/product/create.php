<?php

         require 'database.php';

    if ( !empty($_POST)) {
        // keep track validation errors
        $nameError = null;
        $emailError = null;
        $mobileError = null;
        $dobError = null;
        $passwordError = null;

        // keep track post values
        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $dob = $_POST['dob'];
        $password = $_POST['password'];

        // validate input
        $valid = true;
        if (empty($name)) {
            $nameError = 'Please enter Name';
            $valid = false;
        }

        if (empty($email)) {
            $emailError = 'Please enter Email Address';
            $valid = false;
        } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
            $emailError = 'Please enter a valid Email Address';
            $valid = false;
        }

        if (empty($mobile)) {
            $mobileError = 'Please enter Mobile Number';
            $valid = false;
        }

        if (empty($dob)) {
                $dobError = 'Please enter Birthday';
                $valid = false;
        }

        if (empty($password)) {
                $passwordError = 'Please enter a password';
                $valid = false;
        }


        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO customers (name,email,mobile,dob,password) values(?, ?, ?, ?, ?)";
            $q = $pdo->prepare($sql);

           $q->execute(array($name,$email,$mobile,$dob,$password));

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
                        <h3>Create a Customer</h3>
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




        <div class="control-group <?php echo !empty($emailError)?'error':'';?>">
        <label class="control-label">Email Address</label>
        <div class="controls">
       <input name="email" type="text" placeholder="Email Address" value="<?php echo !empty($email)?$email:'';?>">

       <?php if (!empty($emailError)): ?>
        <span class="help-inline"><?php echo $emailError;?></span>
        <?php endif;?>
       </div>
       </div>


       <div class="control-group <?php echo !empty($mobileError)?'error':'';?>">
        <label class="control-label">Mobile Number</label>

        <div class="controls">
 <input name="mobile" type="text"  placeholder="Mobile Number" value="<?php echo !empty($mobile)?$mobile:'';?>">
  <?php if (!empty($mobileError)): ?>
     <span class="help-inline"><?php echo $mobileError;?></span>
   <?php endif;?>
     </div>
     </div>




         <div class="control-group <?php echo !empty($dobError)?'error':'';?>">
        <label class="control-label">DOB</label>
       <div class="controls">
 <input name="dob" type="text"  placeholder="dob" value="<?php echo !empty($dob)?$dob:'';?>">
  <?php if (!empty($dobError)): ?>
     <span class="help-inline"><?php echo $dobError;?></span>
   <?php endif;?>
     </div>
     </div>

     <div class="control-group <?php echo !empty($passwordError)?'error':'';?>">
        <label class="control-label">Password</label>
       <div class="controls">
 <input name="password" type="text"  placeholder="Password" value="<?php echo !empty($password)?$pasword:'';?>">
  <?php if (!empty($passwordError)): ?>
     <span class="help-inline"><?php echo $passwordError;?></span>
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
