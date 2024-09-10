<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hrms";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['searchdata'])) {
    $searchdata = $_POST['searchdata'];
    $searchTerm = mysqli_real_escape_string($conn, $searchdata);
    $results = [];
    $sql2 = mysqli_query($conn, "SELECT softwares FROM `softwares` WHERE softwares LIKE '%$searchTerm%'");
   if (mysqli_num_rows($sql2) > 0) {
    while ($row = mysqli_fetch_assoc($sql2)) {
        $results[] = $row; 
    }
}

header('Content-Type: application/json');
echo json_encode($results);
}

$conn->close();
?>