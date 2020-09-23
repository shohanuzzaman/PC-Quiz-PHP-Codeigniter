<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
    border: 1px solid black;
	width:40%;
	background-color: #f1f1c1;
	height: 50px;
	margin-left: 500px;
}

th, td {
  padding: 5px;
}
th, td {
  padding: 15px;
  text-align: left;
}
th, td {
  border-bottom: 1px solid #ddd;
}
tr:hover {background-color: #f5f5f5;}
th {
  background-color: #000000;
  color: white;
}
</style>
</head>
<body>
<?php include "./includes/header.php"; ?>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12 header">
      <h2 class="headtext">Oyscatech GNS Examination Processing System</h2>
    </div>
</div>
<section id="callaction" class="home-section paddingtop-20">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="callaction bg-gray">
              <div class="row">
                <div class="col-md-8">
                    <div class="cta-text">
                      <h2>Welcome! Admin </h2>
                      <p>What do you want to do today?</p>
                      <p style="font-weight: bold; font-style: initial; color: #880000; font-family: cursive;">Last Log date:</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="cta-btn">
                      <a href="admin_logout.php" class="btn btn-info">Log Out</a>
                      <a href="admin_dashboard.php" class="btn btn-info">Go back </a>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
<center><h2>Result Review </h2></center>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cbt2";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT id, fullname, matricNo, result, course_title, date_taken, percentage_score, date_taken FROM result";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>Name</th><th>Matric</th><th>Score</th><th>Percentage</th><th>Date Taken</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["fullname"]."</td><td>".$row["matricNo"]."</td><td>".$row["result"]."</td><td>".$row["percentage_score"]."</td><td>".$row["date_taken"];
    }
    echo "</table>";
}

 else {
    echo "0 results";
}
$conn->close();
?>

<center><a href ="print.php"><button> Print </button></a></center>
<div class="row">
<div class="col-md-12 footer">
<div class="col-md-3">

</div>
<div class="col-md-6">
  <div class="footertext">
   <p style="font-size: 13px; font-family: arial;"><a rel="license" href="http://creativecommons.org/licenses/by-nc/4.0/" style="color: #000000;"><img alt="Creative Commons License" style="border-width:0" src="images/nc.png" /></a><br />This work is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-nc/4.0/">Creative Commons Attribution-NonCommercial 4.0 International License</a></p>
 Powered by Heskay &copy; 2018. All Right Reserved
  </div>
 </div>
 <div class="col-md-3">
 </div>
</div>
</div>
</div>
<script>
tinymce.init({ selector:'textarea',
height: 150,
menubar: false,
plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code'
  ],
toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent',
content_css: 'http://localhost/myCBT/style/content_css.css' });
</script>
</body>
</html>