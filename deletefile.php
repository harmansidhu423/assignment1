<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete File</title>
</head>
<body>
<?php
if (!empty($_GET['car_ID']) ) {
    $car_ID = $_GET['car_ID'];
    //Step 1 - connect to the database
    $conn = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200358428', 'gc200358428', 'j5SmXe7bDI' );
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // turn on the error handling
    //Step 2 - create the SQL statement
    $sql = "DELETE FROM car
                WHERE car_ID = :car_ID";
    //Step 3 - prepare and execute the sql statement
    $cmd = $conn->prepare($sql);
    $cmd->bindParam(':car_ID', $car_ID, PDO::PARAM_INT);
    $cmd->execute();
    //Step 4 - disconnect from the DB
    $conn = null;
}
//step 5 - redirect back to the assignments1c.php page
header('location:assignment1c.php');
?>
</body>
</html>