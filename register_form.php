<?php

@include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $phone = $_POST['pnum'];
   $address = $_POST['address'];
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM customer WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{

      if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO customer(name, email, pnum, address, password, user_type) VALUES('$name','$email','$phone','$address','$pass','$user_type')";
         mysqli_query($conn, $insert);
         header('location:login_form.php');
      }
   }

};


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register form</title>

   <link rel="stylesheet" href="css/project.css">

</head>
<body>
   
<div class="form-container">

   <form class = "signup" action="" method="post">
      <h3>Sign Up now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="name" required placeholder="Enter Your Name">
      <input type="email" name="email" required placeholder="Enter Your Email">
      <input type = "tel" id = "number" name = "pnum" pattern="[0-9]{3}-[0-9]{7}" required placeholder="Enter Your Mobile Phone Number"></br><br>
      <textarea rows="4" cols="30" name="address" id="address" placeholder="Enter Your Home Address"></textarea><br><br>
      <input type="password" name="password" required placeholder="Enter Your Password">
      <input type="password" name="cpassword" required placeholder="Confirm Your Password">
      <select name="user_type">
         <option value="user">User</option>
         <option value="admin">Admin</option>
      </select>

      <button type = "submit" name="submit">Sign Up</button>	
      <p id = "para6">By Clicking the Sign Up Button, you agree to our <a href="terms.html">Terms & Conditions</a> and <a href ="privacy.html">Privacy Policy</a> 
				<br><br>Already Have an Account <a href ="login_form.php">Login Here</a></p>
   </form>

</div>

</body>
</html>