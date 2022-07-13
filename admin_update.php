<?php

@include 'config.php';

$id = $_GET['edit'];

if(isset($_POST['update_product'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_Desc = $_POST['product_Desc'];
   $product_image = $_FILES['product_image']['name'];
   $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
   $product_image_folder = 'uploaded_img/'.$product_image;

   if(empty($product_name) || empty($product_price) || empty($product_image)){
      $message[] = 'please fill out all!';    
   }else{

      $update_data = "UPDATE products SET pName='$product_name', pDesc='$product_Desc', pPrice='$product_price', pImage='$product_image'  WHERE product_Id = '$id'";
      $upload = mysqli_query($conn, $update_data);

      if($upload){
         move_uploaded_file($product_image_tmp_name, $product_image_folder);
         header('location:admin_panel.php');
      }else{
         $$message[] = 'please fill out all!'; 
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
   <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php
   if(isset($message)){
      foreach($message as $message){
         echo '<span class="message">'.$message.'</span>';
      }
   }
?>

<div class="container3">


<div class="admin-product-form-container3 centered">

   <?php
      
      $select = mysqli_query($conn, "SELECT * FROM products WHERE product_Id = '$id'");
      while($row = mysqli_fetch_assoc($select)){

   ?>
   
   <form action="" method="post" enctype="multipart/form-data">
      <h3 class="title">Update the Item</h3>
      <input type="text" class="box" name="product_name" value="<?php echo $row['pName']; ?>" placeholder="Enter the Item Name">
      <input type="text" placeholder="Enter Item Description" name="product_Desc" value="<?php echo $row['pDesc']; ?>"  class="box">
      <input type="number" min="0" class="box" name="product_price" value="<?php echo $row['pPrice']; ?>" placeholder="Enter the Item Price">
      <input type="file" class="box" name="product_image"  accept="image/png, image/jpeg, image/jpg">
      <input type="submit" value="update product" name="update_product" class="btn">
      <a href="admin_panel.php" class="btn">Back to the add a Product !</a>
      <a href="admin_products.php" class="btn">View your Products !</a>
   </form>
   


   <?php }; ?>

</div>

</div>

</body>
</html>