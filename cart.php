<?php

@include 'config.php';

if(isset($_POST['update_update_btn'])){
   $update_value = $_POST['update_quantity'];
   $update_id = $_POST['update_quantity_id'];
   $update_quantity_query = mysqli_query($conn, "UPDATE `cart` SET quantity = '$update_value' WHERE id = '$update_id'");
   if($update_quantity_query){
      header('location:cart.php');
   };
};

if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
   mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$remove_id'");
   header('location:cart.php');
};

if(isset($_GET['delete_all'])){
   mysqli_query($conn, "DELETE FROM `cart`");
   header('location:cart.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>shopping cart</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="./Css/project.css">
   <link rel="stylesheet" href="css/style1.css">
   

</head>
    <title>Sunray Specs</title>
			
			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
<body>

			<div   class="header">
  				<div id="logo">
  					<img id="image1" src="./Images/4.png" alt="Sunray Specs">
  				</div>
  				<div class="topnav" id="Navbar">
                <ul class = "section1">
                    <li><a  href="Rad.php">Home</a></li>
                      
                    <div class="dropdown">
                    <button class="dropbtn"><li><a href="products.php">Products</a></li><i class="fa fa-caret-down"></i>
                    </button>
                        <div class="dropdown-content">
                            <a href="#">Eye Glasses</a>
                            <a href="#">Sun Glasses</a>
                            <a href="#">Men</a>
                            <a href="#">Women</a>
                            <a href="#">Kids</a>
                            <a href="#">Contact Lenses</a>
                            <a href="#">Computer Glasses</a>
                        </div>
                    </div> 
                    
                    <div class="dropdown">
                    <button class="dropbtn"><li><a href="services.html">Services</a></li><i class="fa fa-caret-down"></i>
                    </button>
                        <div class="dropdown-content">
                            <a href="#">Eyeglass in order to Prescription</a>
                            <a href="#">Shipping</a>
                            <a href="#">Order Status</a>
                        </div>
                    </div> 

                    <li><a href="deals.html">Deals</a></li>
                    <li><a href= "Guide.html">Guide</a></li>
                    <li><a href= "About.html">About Us</a></li>
                    <li><a href="contact.html">Contact</a></li>
                    <li style ="float:right" ><a class = "active" href="cart.php"><i class="fas fa-shopping-cart"></i></i></a></li>

                    <div class="dropdown">
                        <button class="dropbtn" ><li style ="float:right" ><a href="account.html">Account</a></li><i class="fa fa-caret-down"></i>
                        </button>
                            <div class="dropdown-content">
                                <a href="#">My Orders</a>
                                <a href="#">My Coupons</a>
                                <a href="#">My Favourite Stores</a>
                                <a href="logout.php">Log Out</a>
                                
                            </div>
                        </div> 

                    <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
                </ul>
              </div>
      </div>
			</div>

    <div>
        <img id="imgGuide1" src = "./Images/17.jpg" alt="Images">
    </div>

        
        <div class="container">

        <section class="shopping-cart">

        <h1 class="heading">shopping cart</h1>

            <table>

                <thead>
                    <th>image</th>
                    <th>name</th>
                    <th>price</th>
                    <th>quantity</th>
                    <th>total price</th>
                    <th>action</th>
                </thead>

                <tbody>

                    <?php 
                    
                    $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
                    $grand_total = 0;
                    if(mysqli_num_rows($select_cart) > 0){
                        while($fetch_cart = mysqli_fetch_assoc($select_cart)){
                    ?>

                    <tr>
                        <td><img src="./Images/deal1.jpg" height="100" alt=""></td>
                        <td><?php echo $fetch_cart['name']; ?></td>
                        <td>$<?php echo number_format($fetch_cart['price']); ?>/-</td>
                        <td>
                        <form action="" method="post">
                            <input type="hidden" name="update_quantity_id"  value="<?php echo $fetch_cart['id']; ?>" >
                            <input type="number" name="update_quantity" min="1"  value="<?php echo $fetch_cart['quantity']; ?>" >
                            <input type="submit" value="update" name="update_update_btn">
                        </form>   
                        </td>
                        <td>$<?php echo $sub_total = number_format($fetch_cart['price'] * $fetch_cart['quantity']); ?>/-</td>
                        <td><a href="cart.php?remove=<?php echo $fetch_cart['id']; ?>" onclick="return confirm('remove item from cart?')" class="delete-btn"> <i class="fas fa-trash"></i> remove</a></td>
                    </tr>
                    <?php
                    $grand_total += (int)$sub_total;  
                        };
                    };
                    ?>
                    <tr class="table-bottom">
                        <td><a href="products.php" class="option-btn" style="margin-top: 0;">continue shopping</a></td>
                        <td colspan="3">grand total</td>
                        <td>$<?php echo $grand_total; ?>/-</td>
                        <td><a href="cart.php?delete_all" onclick="return confirm('are you sure you want to delete all?');" class="delete-btn"> <i class="fas fa-trash"></i> delete all </a></td>
                    </tr>

                </tbody>

            </table>

            <div class="checkout-btn">
                <a href="checkout.php" class="btn <?= ($grand_total > 1)?'':'disabled'; ?>">procced to checkout</a>
            </div>

        </section>

        </div>


            <div class = "rowfoot">	
                <div id="logofoot">
                    <img id = "logofoot1"src="./Images/4.png" alt="Sunray Specs">
                </div>
                <div id="footer_right">
                    <h3>CUSTOMER CARE</h3>
                    <a href = "contact.html"><h4>Contact Us</h4></a>
                    <a href = "FAQ.html"><h4>FAQ's</h4></a>
                    <a href = "returns.html"><h4>Returns & Exchanges</h4></a>
                    <h4>Suggestions:<br>
                    <a href="mailto:wtdfernandz@gmail.com">wtdfernandz@gmail.com</a><br>Tep: 0714042858<br><br></h4>
                </div>

                <div id= "footer_left">
                    <h3>SIGN UP AND SAVE</h3>
                    <p>Subscribe to get special offers, free giveaways, and once-in-a-lifetime deals</p>
                    <a href="https://www.facebook.com"><img src="./Images/Fb.png" alt="Facebook" style="width:42px;height:42px;"></a>
                    <a href="https://www.instagram.com/"><img src="./Images/insta.png" alt="Instagram" style="width:42px;height:42px;"></a>
                    <a href="https://www.linkedin.com/"><img src="./Images/linkedin.jpg" alt="Linkedin" style="width:42px;height:42px;"></a>
                </div>

                <div id="footer_center">
                    <h3>INFORMATION</h3>
                    <a href = "privacy.html"><h4>Privacy Policy</h4></a>
                    <a href = "terms.html"><h4>Terms & Conditions</h4></a>
                    <h4>Copyright @2022. All Rights Reserved.<br>
                    Sunray Specs is Powered by<br> HTML,CSS,JS,PHP</h4>
                </div>
            
            </div>

	<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>