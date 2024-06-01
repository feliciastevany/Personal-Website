<?php
if(isset($_GET('action'))
{
  $servername = "localhost";
  $username = "root";
  $password = "Apakau123";
  $database = "personal_webdev";

  $conn = new mysqli($servername, $username, $password, $database);
  if ($conn->connect_error) 
  {
    die("Connection Failed: " . $conn->connect_error);
  }

  $nama = $_POST['name'];
  $email = $_POST['email'];
  $sub = $_POST['sub'];
  $message = $_POST['message'];

  // **Use prepared statements to prevent SQL injection**
  $sql = "INSERT INTO table1 (nama, email, sub, msg) VALUES (?, ?, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sss", $nama, $email, $sub, $message);

  if ($stmt->execute()) 
  {
    echo "<script type='text/javascript'>";
    echo "alert('Thank you for contacting!');"; // Typo fixed, semicolon removed
    echo "window.location.href='contact.html';";
    echo "</script>";
  } 
  else 
  {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $stmt->close();
  $conn->close();
}
?>