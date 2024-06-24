<?php include("connection2.php");
$id= $_GET['id'];
$query = "SELECT * FROM booking where id ='$id'";
$data = mysqli_query($conn, $query);

if ($data === false) {
    die("Query failed: " . mysqli_error($conn));
}

$total = mysqli_num_rows($data);
$result = mysqli_fetch_assoc($data);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Update Booking</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #003329;
        }

        .logo {
            text-align: center;
            color: #f3f3f3;
        }

        .navigation a {
            color: #359381;
            padding: 7px 13px;
            border-radius: 25px;
            margin: 0 10px;
            font-weight: 600;
        }

        .navigation a:hover,
        .navigation a.active {
            background: #359381;
            color: #fff;
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            border: 1px solid #e7e7e7;
            background-color: #f3f3f3;
        }

        li {
            float: right;
        }

        li a {
            display: block;
            color: #666;
            text-align: right;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover:not(.active) {
            background-color: #ddd;
        }

        li a.active {
            color: white;
            background-color: #04AA6D;
        }

        .container {
            width: 90%;
            display: flex;
            flex-wrap: wrap;
            text-align: center;
            margin: auto;
        }

        .div-item {
            background-color: lightgrey;
            height: auto;
            width: 600px;
            border: 5px solid rgb(248, 255, 248);
            padding: 20px;
            margin: 20px auto;
        }
        .radio-group {
    display: flex;
    flex-wrap: wrap;
}

.radio-pair {
    display: flex;
    align-items: center;
    margin-right: 10px; /* Adjust as needed */
}

.radio-pair input[type="radio"] {
    margin-right: -39px; /* Adjust as needed */
}

.radio-pair label {
    margin-right: 10px; /* Adjust as needed */
}

 

        input {
            border-radius: 10px;
            height: 30px;
            width: 250px;
            margin-bottom: 10px;
        }

        select {
            border-radius: 10px;
            height: 30px;
            width: 250px;
            margin-bottom: 10px;
        }

        button {
            align-content: center;
        }
    </style>
</head>
<body>
    <header>
        <h2 class="logo">VogueVoyage</h2>
        <nav class="navigation">
            <ul>
                <li><a href="review.php">Review</a></li>
                <li><a href="hunza.html">Services</a></li>
                <li><a href="c.html">Home</a></li>
            </ul>
        </nav>
    </header>
    <br><br>
    <div class="container">
        <div class="div-item">
            <form action="#" method="POST">
                <br>
                <h2>Update</h2>
                <label for="fname">Name:</label>
                <input type="text" id="fname" name="fname" value="<?php  echo isset($result['name']) ? htmlspecialchars($result['name']) : '';?>" required><br>
                <br>
                <label for="femail">Email:</label>
                <input type="email" id="femail" name="femail" value="<?php  echo isset($result['email']) ? htmlspecialchars($result['email']) : '';?>"required><br>
                <br>
                <label>Number:</label>
                <input type="tel" id="tel" name="tel" maxlength="11" size="11" value="<?php  echo isset($result['number']) ? htmlspecialchars($result['number']) : '';?> "required><br><br>
               
                
                <label>Location:</label><br>
<div class="radio-group">
    <input type="radio" name="location" id="location1" value="Riverdale, Gilgit " required
    <?php
     if($result['location']=="Riverdale, Gilgit"){
        echo "checked";
     }?>>
    <label>Riverdale, Gilgit</label>

    <input type="radio" name="location" id="location2" value="Serena, Gilgit" required  <?php
     if($result['location']=="Serena, Gilgit"){
        echo "checked";
     }?>  > 
    <label>Serena, Gilgit</label><br>

    <input type="radio" name="location" id="location3" value="Shangrilla, Gilgit" required  <?php
     if($result['location']=="Shangrilla, Gilgit"){
        echo "checked";
     }?>> 
    <label for="location3">Shangrilla, Gilgit</label>

    <input type="radio" name="location" id="location4" value="Mulberry, Hunza" required 
    <?php
     if($result['location']=="MULBERRY, HUNZA"){
        echo "checked";
     }?>> 
    <label for="location4">Mulberry, Hunza</label><br>

    <input type="radio" name="location" id="location5" value="Venus, Hunza" required
    <?php
     if($result['location']=="VENUS, HUNZA"){
        echo "checked";
     }?>> 
    <label for="location5">Venus, Hunza</label>

    <input type="radio" name="location" id="location6" value="Monarch, Hunza" required <?php
     if($result['location']=="MONARCH, HUNZA"){
        echo "checked";
     }?>> 
    <label for="location6">Monarch, Hunza</label><br>

    <input type="radio" name="location" id="location7" value="Biafo House, Skardu" required
    <?php
     if($result['location']=="BIAFO HOUSE, SKARDU"){
        echo "checked";
     }?>>  
    <label for="location7">Biafo House, Skardu</label>

    <input type="radio" name="location" id="location8" value="INDUS, SKARDU" required
    <?php
     if($result['location']=="INDUS, SKARDU"){
        echo "checked";
     }?>> 
    <label for="location8">Indus, Skardu</label><br>

    <input type="radio" name="location" id="location9" value="Orchard House, Skardu" required<?php
     if($result['location']=="ORCHAD HOUSE, SKARDU"){
        echo "checked";
     }?>> 
    <label for="location9">Orchard House, Skardu</label>

    <input type="radio" name="location" id="location10" value="Swat Bookrive" required 
    <?php
     if($result['location']=="SWAT BOOKRIVE"){
        echo "checked";
     }?>>  
    <label for="location10">Swat Bookrive</label><br>

    <input type="radio" name="location" id="location11" value="Swat Continental" required <?php
     if($result['location']=="SWAT CONTINENTAL"){
        echo "checked";
     }?>> 
    <label for="location11">Swat Continental</label>

    <input type="radio" name="location" id="location12" value="Swat Hilton" required <?php
     if($result['location']=="SWAT HILTON"){
        echo "checked";
     }?>> 
    <label for="location12">Swat Hilton</label><br>
</div>

<br>
                <label>Date For Staying:</label>
                <select id="date" name="date" required>
                    <option value="May24,2024"
                    <?php
                        if($result['reser_date']=='May24,2024'){
                            echo "SELECTED";
                        }
                        ?>>May 24,2024</option>
                    <option value="May27,2024"
                    <?php
                        if($result['reser_date']=='May27,2024'){
                            echo "SELECTED";
                        }
                        ?> >May 27,2024</option>
                    <option value="June1,2024"
                    <?php
                        if($result['reser_date']=='June1,2024'){
                            echo "SELECTED";
                        }
                        ?>>June 1,2024</option>
                    <option value="July23,2024"
                    <?php
                        if($result['reser_date']=='July23,2024'){
                            echo "SELECTED";
                        }
                        ?>>July 23, 2024</option>
                </select><br><br>
                <label>Room Required:</label>
                <select id="room" name="room" required>
                    <option value="1"
                    <?php
                        if($result['room']==1){
                            echo "SELECTED";
                        }
                        ?>>1</option>
                    <option value="2"
                    <?php
                        if($result['room']==2){
                            echo "SELECTED";
                        }
                        ?>
                        >2</option>
                    <option value="3"
                    <?php
                        if($result['room']==3){
                            echo "SELECTED";
                        }
                        ?>
                        >3</option>
                    <option value="4"
                    <?php
                        if($result['room']==4){
                            echo "SELECTED";
                        }
                        ?>>4</option>
                </select><br><br>
                <input type="submit" name="update" value="Submit" class="btn btn-success" style="align:center">
            </form>
        </div>
    </div>
</body>
</html>
<?php
if (isset($_POST["update" ])) {
    $fname = $_POST["fname"];
    $femail = $_POST["femail"];
    $tel = $_POST["tel"];
    $location = $_POST["location"];
    $date = $_POST["date"];
    $room = $_POST["room"];
    $query = "INSERT INTO booking (name, email, number, location, reser_date, room) VALUES ('$fname', '$femail', '$tel', '$location', '$date', '$room')";
    $query= "UPDATE booking SET name='$fname',email='$femail',number='$tel',location= '$location', reser_date='$date', room='$room' where id ='$id'";
    $data = mysqli_query($conn, $query);
    if ($data) {
        echo 'updatedd';
    } else {
        echo 'Failed';
    }
}
?>
