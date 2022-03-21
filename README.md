open project and run 'npm install' to include all dependencies

next, create a "backend/connection.php" file as follows

$servername = "hostname";
$username = "username";
$password = "password";
$conn = new mysqli($servername, $username, $password);
$conn->connect_errno ? die ("Could not establish a connection to the database").$conn->connect_errno : print "";

Finnally, create a database called "school" and import the table "db/users.sql" to initialize your school database and you are set

navigate to "index.php" and login to continue
