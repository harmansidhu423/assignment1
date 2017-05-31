<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dream Car</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="CSS/bootstrap.min.css"
    <!-- Optional theme -->
    <link rel="stylesheet" href=CSS/bootstrap-theme.min.css

</head>
<body>

<h1>Details</h1>

<a href="assignment1a.php">Add a new file</a>
<?php
//step 1- connect to the database
$conn = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200358428', 'gc200358428', 'j5SmXe7bDI' );

//step-2 create the sql command
$sql= "SELECT * FROM car";

// step-3 prepare the sql command(prevent sql injection)
$cmd = $conn->prepare($sql);

// step-4 execute the command
$cmd->execute();

//step-5 store the results
$car =$cmd->fetchAll();

//step-6 remove the DB connection
$conn = null;

//step-7 loop over the results and display them to the screen

echo '<table class="table table-striped table-hover">
<tr><th>Car Name</th>
<th>Car Price</th>
<th>Horse Power</th>
<th>Car Type</th>
<th>Edit</th>
<th>Delete</th></tr>';


foreach($car as $cars)
{
    echo '<tr><td>'.$cars['car_name'].'</td>
    <td>'.$cars['car_price'].'</td>
    <td>'.$cars['horse_power'].'</td>
    <td>'.$cars['car_type'].'</td>
    <td><a href="assignment1a.php?car_ID='.$cars['car_ID'].'"class="btn btn-primary"</a>Edit</td>
                      <td><a href="deletefile.php?car_ID='.$cars['car_ID'].'" class="btn btn-danger confirmation">Delete</td></td>';


}
echo '</table>';
?>
</body>
<!--latest jQuery-->
<script src="JS/jquery-3.2.1.min.js"></script>


<!-- Latest compiled and minified JavaScript -->

<script src="JS/bootstrap.min.js" ></script>

<!--custom js-->
<script src="JS/app.js"></script>

</html>