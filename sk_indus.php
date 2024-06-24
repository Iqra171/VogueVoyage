<?php include("connection2.php");

?>
<!Doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <title>Indus hotel</title>

</head>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');
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
    text-align:center;
    color: #f3f3f3;
}
.navigation a{
color: #359381;
padding: 7px 13px;
border-radius: 25px;
margin: 0 10px;  
font-weight: 600;
}
.navigation a:hover, 
.navigation a.active{
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
float:right ;
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
    /* Or any desired width */
    height: 30px;
    /* Or any desired height */
    display: flex;
    flex-wrap: wrap;
    text-align: center;
  }
 

  .div-item {
    background-color: lightgrey;
    height: 470px;
    width: 600px;

    border: 5px solid rgb(248, 255, 248);
    padding: 4px;
    margin: 9px auto;
  }
   

  input {
    border-radius: 10px 10px 10px 10px;
    height: 30px;
    width:250px ;
  }
  button{
    align-content: center;
  }
</style>

<body>
  <header>
    <h2 class="logo">VogueVoyage</h2>
    <nav class="navigation">
      <ul>
       
        <li> <a href="review.php">REVIEW </a></li>
        <li> <a href="skardu.html" >SERVICES</a></li>
        <li> <a href="c.html">HOME </a></li>
      </ul>
    </nav>
  </header>
  <br><br>
  <div class="container">
    <div class="div-item">
      <FORM action="#"  method="POST">
        <br>
        <h2>INDUS HOTEL</h2>
        <label for="fname" > Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </label>
        <input type="text" id="fname" name="fname" required><br>
        <br>
        <label for="femail" required> Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
        <input type="email" id="femail" name="femail" required><br>
        <br>
        <label required>Number:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
  <input type="tel" id="tel" name="tel" maxlength="11" size="11" required><br><br>
   <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Location:</label>
   <label><input type="radio" name="location" id="location" value="INDUS, SKARDU"  required> INDUS, SKARDU</label><br>
       <br> <label >Date For Staying:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
        <select id="date" name="date" required>
        
          <option value="May24,2024">May 24,2024 </option>
          <option value="May27,2024">May 27,2024</option>
          <option value="June1,2024">June 1,2024</option>
          <option value="July23,2024">July 23, 2024</option>
        
        </select><br><br>
        <label >Room Required:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
        <select id="room" name="room"required >
                      
          <option value="1"> 1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
        
        </select><br><br>
<br>
<input type="submit" name="submit" value="submit" class="btn btn-success"style=" align:center" required>
    </FORM>
    
    </div>
  </div>
</body>

</html>
<?php
if(isset($_POST["submit"])){
  $fname = $_POST["fname"];
  $femail = $_POST["femail"];
  $tel=$_POST["tel"];
  $location=$_POST["location"];
  $date=$_POST["date"];
  $room = $_POST["room"];
  $query = "INSERT INTO booking  VALUES ('$fname', '$femail', '$tel', '$location', '$date', '$room')";
  $data= mysqli_query($conn,$query);
if($data){
  //echo 'Submitted';
}
else
echo' failed';
}
  ?>