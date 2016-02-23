<?php
    require 'database.php';
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }

    if ( null==$id ) {
        header("Location: index.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM address where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
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
                        <h3>Read an address</h3>
                    </div>

                    <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label">zip</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['zip'];?>
                            </label>
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label">street_one</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['street_one'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">street_two</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['street_two'];?>
                            </label>
                            </div>
                      </div>


                        <div class="control-group">
                        <label class="control-label">city</label>
                        <div class="controls">
                        <label class="checkbox">
                        <?php echo $data['city'];?>
                        </label>
                        </div>
                        </div>

                        <div class="control-group">
                        <label class="control-label">state</label>
                        <div class="controls">
                        <label class="checkbox">
                        <?php echo $data['state'];?>
                        </label>
                        </div>
                        </div>



			 <div class="control-group">
                        <label class="control-label">country</label>
                        <div class="controls">
                        <label class="checkbox">
                        <?php echo $data['country'];?>
                        </label>
                        </div>
                        </div>
                        <div class="form-actions">
                          <a class="btn" href="index.php">Back</a>
                       </div>


                    </div>
                </div>

    </div> <!-- /container -->
  </body>
</html>
