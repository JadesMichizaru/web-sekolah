<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "DB_latihan";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$sql = "SELECT id, name, address, created_date FROM user";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
//   while($row = $result->fetch_assoc()) {
//     echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["address"]. " ". $row["created_date"]. "<br>";
//   }
  echo '<table border=1>
                <tr>
                    <td>ID</td>
                    <td>NAME</td>
                    <td>ADDRESS</td>
                    <td>DATE</td>
                    <td>Action</td>
                </tr>';
  while($row = $result->fetch_assoc()) {
    echo '<tr>
                    <td>'.$row["id"].'</td>
                    <td>'.$row["name"].'</td>
                    <td>'.$row["address"].'</td>
                    <td>'.$row["created_date"].'</td>
                    <td><a href="#">update</a>   <a href="delete.php">delete</a></td>
                </tr>';
  }
    echo "</table>";
} else {
  echo "0 results";
}

echo '<a href="user_insert.php">insert</a>';
$conn->close();

?>