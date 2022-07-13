<?php

@include 'config.php';

if(isset($_POST['add_product'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_Desc = $_POST['product_Desc'];
   $product_image = $_FILES['product_image']['name'];
   $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
   $product_image_folder = 'uploaded_img/'.$product_image;

   if(empty($product_name) || empty($product_price) || empty($product_image)){
      $message[] = 'please fill out all';
   }else{
      $insert = "INSERT INTO products(pName, pPrice, pDesc, pImage) VALUES('$product_name', '$product_price', '$product_Desc', '$product_image')";
      $upload = mysqli_query($conn,$insert);
      if($upload){
         move_uploaded_file($product_image_tmp_name, $product_image_folder);
         $message[] = 'new product added successfully';
      }else{
         $message[] = 'could not add the product';
      }
   }

};

if(isset($_GET['delete'])){
   $id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM products WHERE product_Id = $id");
   header('location:admin_products.php');
};

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin page</title>

   
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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

   <?php

   $select = mysqli_query($conn, "SELECT * FROM products");
   
   ?>
   <h3>Product Details</h3>
   <div class="product-display">
      <table class="product-display-table">
         <thead>
         <tr>
            <th>Item image</th>
            <th>Item name</th>
            <th>Item price</th>
            <th>Item Description</th>
            <th>action</th>
         </tr>
         </thead>
         <?php while($row = mysqli_fetch_assoc($select)){ ?>
         <tr>
            <td><img src="uploaded_img/<?php echo $row['pImage']; ?>" height="100" alt=""></td>
            <td><?php echo $row['pName']; ?></td>
            <td>$<?php echo $row['pPrice']; ?>/-</td>
            <td><?php echo $row['pDesc']; ?></td>
            <td>
               <a href="admin_update.php?edit=<?php echo $row['product_Id']; ?>" class="btn"> <i class="fas fa-edit"></i> Update </a>
               <a href="admin_products.php?delete=<?php echo $row['product_Id']; ?>" class="btn"> <i class="fas fa-trash"></i> Delete </a>
            </td>
         </tr>
      <?php } ?>
      </table>
      <a href="admin_panel.php" class="btn">Add a New Product !</a>
      <a href="Rad.php" class="btn">Visit The Home Page</a>

   </div>

</div>


</body>
</html>