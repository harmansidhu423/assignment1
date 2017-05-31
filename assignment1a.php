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

<main class="container">
    <h1>Car Detail</h1>

    <?php
    //check the URL for an car_D to determine if this is a new or edit album
    if (!empty($_GET['car_ID']))
        $car_ID = $_GET['car_ID'];
    else
        $car_ID = null;
    $car_name = null;
    $car_price = null;
    $horse_power = null;
    $car_selected = null;
    //to decide if the file is an edit, we look at the car_ID
    if (!empty($car_ID))
    {
        //Step 1 connect to the DB
        $conn = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200358428', 'gc200358428', 'j5SmXe7bDI' );
        //Step 2 create the SQL query
        $sql = "SELECT * FROM car WHERE car_ID = :car_ID";
        //Step 3 prepare and execute the SQL
        $cmd = $conn->prepare($sql);
        $cmd->bindParam(':car_ID', $car_ID, PDO::PARAM_INT);
        //Step 4 update the variables
        $cmd->execute();
        $car = $cmd->fetch();
        $car_name = $car['car_name'];
        $car_price = $car['car_price'];
        $horse_power = $car['horse_power'];
        $car_selected =$car['car_type'];
        //Step 5 close the DB connection
        $conn=null;
    }
    ?>
<form action="assignment1b.php" method="post">
    <fieldset class="form-group">
        <label for="car_name">Car Name:</label>
        <input name="car_name" id="car_name"
               value="<?php echo $car_name?>">
    </fieldset>
    <fieldset class="form-group">
        <label for="car_price">Car Price:</label>
        <input name="car_price" id="car_price"
               value="<?php echo $car_price?>">
    </fieldset>

    <fieldset class="form-group">
        <label for="horse_power">Horse Power:</label>
        <input name="horse_power" id="horse_power"
               value="<?php echo $horse_power?>">
    </fieldset>


    <fieldset class="form-group">
        <label for="car_type" class="col-sm-1">Car Type: *</label>
        <select name="car_type" id="car_type">
            <?php
            //Step 1 - connect to the DB
            $conn = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200358428', 'gc200358428', 'j5SmXe7bDI' );
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //Step 2 - create a SQL script
            $sql = "SELECT * FROM car_type";
            //Step 3 - prepare and execute the SQL script
            $cmd = $conn->prepare($sql);
            $cmd->execute();
            $car_type = $cmd->fetchAll();
            //Step 4 - display the results
            foreach($car_type as $car_types)
            {
                if ($car_selected == $car_types['car_type']){
                    echo '<option selected>'.$car_types['car_type'].'</option>';
                }
                else {
                    echo '<option>'.$car_types['car_type'].'</option>';
                }
            }
            //Step 5 - disconnect from the DB
            $conn=null;
            ?>
        </select>
    </fieldset>
    <input name="car_ID" id="car_ID" value="<?php echo $car_ID?>" type="hidden"/>

    <button class="btn btn-success col-sm-offset-1">Submit</button>

</form>

</body>
<script src="JS/bootstrap.min.js" ></script>

</html>