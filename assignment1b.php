<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dream car</title>
</head>
<body>
<h1>saving data....</h1>
<?php
$car_ID =$_POST['car_ID'];
$car_name =$_POST['car_name'];
$car_price =$_POST['car_price'];
$horse_power =$_POST['horse_power'];
$car_type =$_POST['car_type'];

$conn = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200358428', 'gc200358428', 'j5SmXe7bDI' );
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//Step 2 - create a SQL command
if (!empty($car_ID))
{
    $sql = "UPDATE car
                SET car_name = :car_name, car_price = :car_price, horse_power = :horse_power, car_type = :car_type
                WHERE car_ID = :car_ID";
}
else {

    $sql = "INSERT INTO car(car_name,car_price,horse_power,car_type)
VALUES(:car_name,:car_price,:horse_power,:car_type)";
}


$cmd =$conn->prepare($sql);
$cmd->bindParam(':car_name',$car_name, PDO::PARAM_STR,  30);
$cmd->bindParam(':car_price',$car_price, PDO::PARAM_INT,  6);
$cmd->bindParam(':horse_power',$horse_power, PDO::PARAM_INT,  4);
$cmd->bindParam(':car_type', $car_type, PDO::PARAM_STR, 20);

if (!empty($car_ID))
{
    $cmd->bindParam(':car_ID',$car_ID, PDO::PARAM_INT);
}

$cmd->execute();

$conn =null;
//step 5 - redirect back to the assignments1c.php page

header('location:assignment1c.php');

?></body>
</html>