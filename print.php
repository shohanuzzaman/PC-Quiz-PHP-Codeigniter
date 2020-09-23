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

$sql = "SELECT id, fullname, matricNo, result, course_title, date_taken, percentage_score FROM result";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>Name</th><th>Matric</th><th>Score</th>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["fullname"]."</td><td>".$row["matricNo"]."</td><td>".$row["result"];
    }
    echo "</table>";
}

 else {
    echo "0 results";
}
$conn->close();
?>
<center><a href ="history.php"><button> Close </button></a></center>
<div class="row">
<div class="col-md-12 footer">
<div class="col-md-3">

</div>

</body>
</html>