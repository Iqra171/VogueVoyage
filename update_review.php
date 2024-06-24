<?php include("connection2.php");
$id= $_GET['id'];
$query = "SELECT * FROM review where id ='$id'";
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
    margin-right: 10px; }

.radio-pair input[type="radio"] {
    margin-right: -39px; 
}

.radio-pair label {
    margin-right: 10px; 
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
                <label for="Review">Review:</label>
                <input type="text" id="review" name="review" value="<?php  echo isset($result['review']) ? htmlspecialchars($result['review']) : '';?>"required><br>
                <br>
               
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
    $review = $_POST["review"];
    $query = "INSERT INTO review (name, email, number, location, reser_date, room) VALUES ('$fname', '$femail', '$review')";
    $query= "UPDATE review SET name='$fname',email='$femail', review='$review' where id ='$id'";
    $data = mysqli_query($conn, $query);
    if ($data) {
        echo 'updatedd';
    } else {
        echo 'Failed';
    }
}
?>
