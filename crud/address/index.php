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
                        <div class="row">
                                <h3>Address</h3>
                        </div>

                        <div class="row">
                                <p>
                                <a href="create.php" class="btn btn-success">Create</a>
                                </p>

                        <table class="table table-striped table-bordered">

                        <thead>

                                <tr>
                                <th>zip</th>
                                <th>street_one</th>
                                <th>street_two</th>
                                <th>city</th>
                                <th>state</th>
				<th>country</th>
                                <th>Action</th>
                                </tr>


                        </thead>


                       <tbody>

                           <?php
                       include 'database.php';
                       $pdo = Database::connect();
                       $sql = 'SELECT * FROM address  ORDER BY id DESC';
                       foreach ($pdo->query($sql) as $row) {
                                echo '<tr>';
                                echo '<td>'. $row['zip'] . '</td>';
                                echo '<td>'. $row['street_one'] . '</td>';
                                echo '<td>'. $row['street_two'] . '</td>';
                                echo '<td>'. $row['city'] . '</td>';
                                echo '<td>'. $row['state'] . '</td>';
				echo '<td>'. $row['country'] . '</td>';
                                echo '<td width=250>';
                                echo '<a class="btn" href="read.php?id='.$row['id'].'">Read</a>';
                                echo ' ';
                                echo '<a class="btn btn-success" href="update.php?id='.$row['id'].'">Update</a>';
                                echo ' ';
                                echo '<a class="btn btn-danger" href="delete.php?id='.$row['id'].'">Delete</a>';
                                echo '</td>';
                                echo '</tr>';
                       }
                       Database::disconnect();
                      ?>





                        </tbody>

                        </table>


                </div>
                </div> <!-- /container -->

</body>
</html>
