<?php

         require 'database.php';

    if ( !empty($_POST)) {
        // keep track validation errors
        $idError = null;
        $nameError = null;
        $descriptionError = null;

        // keep track post values
        $id = $_POST['id'];
	$name = $_POST['name'];
        $description = $_POST['description'];

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

        if (empty($description)) {
            $descriptionError = 'Please enter description';
            $valid = false;
        }



        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO category (id,name,description) values(?, ?, ?)";
            $q = $pdo->prepare($sql);

           $q->execute(array($id,$name,$description));

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
                        <h3>Create a Category</h3>
                    </div>


     <form class="form-horizontal" action="create.php" method="post">

        <div class="control-group <?php echo !empty($idError)?'error':'';?>">                         <label class="control-label">ID</label>
         <div class="controls">
 <input name="id" type="text"  placeholder="id" value="<?php echo !empty($id)?$id:'';?>">

          <?php if (!empty($idError)): ?>
          <span class="help-inline"><?php echo $idError;?></span>
          <?php endif; ?>
          </div>
          </div>




        <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
        <label class="control-label">Name</label>
        <div class="controls">
       <input name="name" type="text" placeholder="name" value="<?php echo !empty($name)?$name:'';?>">

       <?php if (!empty($nameError)): ?>
        <span class="help-inline"><?php echo $nameError;?></span>
        <?php endif;?>
       </div>
       </div>


       <div class="control-group <?php echo !empty($descriptionError)?'error':'';?>">
        <label class="control-label">Description</label>

        <div class="controls">
 <input name="description" type="text"  placeholder="description" value="<?php echo !empty($description)?$description:'';?>">
  <?php if (!empty($descriptionError)): ?>
     <span class="help-inline"><?php echo $descriptionError;?></span>
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
