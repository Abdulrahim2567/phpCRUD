create a "backend/connection.php" file as follows

$servername = "hostname";
$username = "username";
$password = "password";
$conn = new mysqli($servername, $username, $password);
$conn->connect_errno ? die ("Could not establish a connection to the database").$conn->connect_errno : print "";
