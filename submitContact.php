<?php 

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$mail = $_POST['mail'];
$suggest = $_POST['suggest'];

$conn = new mysqli('localhost','root','','specs');

if($conn -> connect_error)
{
    die('connection Failed:'.$conn->connect_error);
}
 
else{
    $stmt = $conn->prepare("INSERT INTO suggestions (firstName,lastName,email,suggestions) values(?,?,?,?)"); 
    $stmt->bind_param("ssss",$fname,$lname,$mail,$suggest);
    $stmt->execute();
    echo "Thank you for your valuable suggestions...!!";
    $stmt->close();
    $conn->close();

}

?>
