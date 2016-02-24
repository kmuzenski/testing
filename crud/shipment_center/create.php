<?php

    require '../database.php';

    if ( !empty($_POST)) {
        // keep track validation errors
        $idError = null;
        $nameError = null;
        $addressError = null;

        // keep track post values
        $id = $_POST['id'];
        $name = $_POST['name'];
        $address = $_POST['address'];

        // validate input
        $valid = true;
        if (empty($id)) {
            $idError = 'Please enter id';
            $valid = false;
        }

        if (empty($name)) {
            $nameError = 'Please enter name';
            $valid = false;
        }

        if (empty($address)) {
            $addressError = 'Please enter address';
            $valid = false;
        }




        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO product (id,name,address) values(?, ?, ?)";
            $q = $pdo->prepare($sql);

           $q->execute(array($id,$name,$passowrd));

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
                        <h3>Create a shipment center</h3>
                    </div>


     <form class="form-horizontal" action="create.php" method="post">

        <div class="control-group <?php echo !empty($idError)?'error':'';?>"> 
                        <label class="control-label">id</label>
         <div class="controls">
 <input name="id" type="text"  placeholder="id" value="<?php echo !empty($id)?$id:'';?>">

          <?php if (!empty($idError)): ?>
          <span class="help-inline"><?php echo $idError;?></span>
          <?php endif; ?>
          </div>
          </div>




        <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
        <label class="control-label">name</label>
        <div class="controls">
       <input name="name" type="text" placeholder="name" value="<?php echo !empty($name)?$name:'';?>">

       <?php if (!empty($nameError)): ?>
        <span class="help-inline"><?php echo $nameError;?></span>
        <?php endif;?>
       </div>
       </div>


       <div class="control-group <?php echo !empty($addressError)?'error':'';?>">
        <label class="control-label">address</label>

        <div class="controls">
 <input name="address" type="text"  placeholder="address" value="<?php echo !empty($address)?$address:'';?>">
  <?php if (!empty($addressError)): ?>
     <span class="help-inline"><?php echo $addressError;?></span>
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

