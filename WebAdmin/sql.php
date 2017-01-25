<!DOCTYPE html>
<html lang="en">
<body>
<link rel="stylesheet" type="text/css" href="style.css">

<ul>
    <li><a href="home.html">Home</a></li>
    <li><a href="cp.html">Control Panel</a></li>
    <li><a href="data.html">Data</a></li>
    <li><a class="active" href="sql.php"></a></li>
    <li><a href="help.html">Help</a></li>
    <li><a href="login.html">Login</a></li>
</ul>
<h1>Welcome to the CATS Administration Panel - Please Login </h1>

<?php

$servername = "localhost";
$username = "user";
$password = "pass";
$dbname = "CATS";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully" . "<br>";

$sql = "SELECT * FROM USER";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row
    echo "<br>" . "First Name" . "\t" . "Last Name" . "\t" . "CUID" . "<br>";
    while ($row = $result->fetch_assoc()) {
        echo "<br>" . $row["firstName"] . "\t" . $row["lastName"] . "\t" .$row["CUID"];
    }
}

mysqli_close($conn);

?>

</body>
</html>