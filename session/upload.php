<?php
//Pobranie zmiennych
session_start();
$dirSession = $_SESSION['dirSession'];
$title = $_POST["title"];
$fname = basename($_FILES["fileToUpload"]["name"]);
$subtitles = $_POST["subtitles"];
$director = $_POST["director"];
$userid = $_SESSION["userid"];
$user_idmt = $_POST["user_idmt"];
$target_file = "films/". basename($_FILES["fileToUpload"]["name"]); 
  $connection = mysqli_connect('localhost', 'kosierap_z6', 'Laboratorium123', 'kosierap_z6');
if (!$connection)
{
echo " MySQL Connection error." . PHP_EOL;
echo "Error: " . mysqli_connect_errno() . PHP_EOL; echo "Error: " . mysqli_connect_error() . PHP_EOL; exit;
}
else {
	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)){ 
  $result = mysqli_query($connection, "INSERT INTO film (title, director, idu, filename, subtitles, idft) VALUES ('$title','$director','$userid','$fname','$subtitles','$user_idmt');") or die ("DB error 2:  $connection->error);");
   echo "Uploading...\n";

  header('Refresh: 2; URL=mynetflix.php');
} 
else echo "Error uploading file.";
}
?>
