<!DOCTYPE html>
<html lang="en">
<body>
<link rel="stylesheet" type="text/css" href="style.css">

<ul>
    <li><a href="home.html">Home</a></li>
    <li><a href="cp.html">Control Panel</a></li>
    <li><a href="data.html">Data</a></li>
    <li><a href="help.html">Help</a></li>
    <li><a href="login.html">Login</a></li>
</ul>
<h1>Welcome to the CATS Administration Panel - Please Login </h1>

<?php

$user = $_GET['admin'];
$pass = $_GET['pass'];
$myuser = stripslashes($user);
$mypass = stripslashes($pass);

    if(isset($myuser, $mypass)) {
        ob_start();

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
//        echo "Connected successfully" . "<br>";


        $sql = "SELECT * FROM ADMIN where Admin= '$myuser' and Password= '$mypass'";

        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            echo "correct username and password";

            $sql = "SELECT * FROM USER";
            $result = $conn->query($sql);

            // output data of each row
            echo "<br>";
            while ($row = $result->fetch_assoc()) {
                echo "<br>" . $row["firstName"] . " " . $row["lastName"] . " " . $row["CUID"];
            }
        } else
            echo "invalid password and username";

        ob_end_flush();

        mysqli_close($conn);
    }

?>

</body>
</html>