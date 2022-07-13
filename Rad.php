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
<html>
	<body>
		<head>
			<title>Sunray Specs</title>
			<link rel="stylesheet" href="./Css/project.css">
			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
		</head>

            <?php

            if(isset($message)){
            foreach($message as $message){
                echo '<span class="message">'.$message.'</span>';
            }
            }
            ?>
			
			<div class="header">
  				<div id="logo">
  					<img id="image1" src="./Images/4.png" alt="Sunray Specs">
  				</div>
  				<div class="topnav" id="Navbar">
    				<ul class = "section1">
    					<li><a class="active" href="Rad.php">Home</a></li>
  						
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
						<li style ="float:right" ><a href="cart.php"><i class="fas fa-shopping-cart"></i></i></a></li>

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

			<script src = "JS/script.js"></script>

			<div >
				<a href="products.php"><img id="image2" src = "./Images/front.png" alt="Images"></a>
			</div>

			<div class = "row1">
			<div id = "img_left">
				<a href="products.php"><img id="image3" src = "./Images/front3.jpg" alt="Images"></a>
			</div>
			<div id = "img_right">
				<a href="products.php"><img id="image4" src = "./Images/front2.jpg" alt="Images"></a>
			</div>
			</div>

			<h1 id = "trendTitle"><br>Daily Deals For You</h1>
			<div class = "row2">
                <?php

                    $select = mysqli_query($conn, "SELECT * FROM products");

                ?>

                <?php while($row = mysqli_fetch_assoc($select)){ ?>
                
                <div class = "trend1">
                    <a href = "product1.php"><img id="image7" src = "uploaded_img/<?php echo $row['pImage']; ?>" alt="Images">
                    <div class="overlay"></div>
                    <div class = "desc1"><?php echo $row['pName']; ?>
                        <br><?php echo $row['pPrice']; ?>
                    </div></a>
                    
                </div>
				
                <?php } ?>
			</div>
           

			<h1 id = "trendTitle"><br>Frame Shapes</h1>
			<div class = "row2">
			<div class = "trend1">
				<img id="image7" src = "./Images/Article-One-Bristol-glasses-olive-crystal.jpg" alt="Images">
				<div class="overlay"></div>
				<div class = "desc">Aviator</div>
			</div>
			<div class = "trend2">
				<img id="image7" src = "./Images/GLCO-Eco-glasses-Woodlawn-tiger-eye.jpg" alt="Images">
				<div class="overlay"></div>
				<div class = "desc">Marshal</div>
			</div>
			<div class = "trend3">
				<img id="image7" src = "./Images/The-Optical-Co-Glasses-Armstrong-Tortoise.jpg" alt="Images">
				<div class="overlay"></div>
				<div class = "desc">Clubmaster Optics</div>
			</div>
			<div class = "trend4">
				<img id="image7" src = "./Images/Kirk-and-Kirk-Jane-glasses-purple.jpg" alt="Images">
				<div class="overlay"></div>
				<div class = "desc">Jane</div>
			</div>
			</div>
			
			
			<h1 id = "trendTitle"><br>Popular Sunglasses</h1>
			<div class = "row2">
				<div class = "trend2">					
					<img id="image7" src = "./Images/deal6.jpg" alt="Images">
					<div class="overlay"></div>
					<div class = "desc1">Polarone PL4120P Transparent Brown Gradual
						<br>Rs. 10,000.00 Rs. 7,800.00 </div>
				</div>
				<div class = "trend3">
					<img id="image7" src = "./Images/deal8.jpg" alt="Images">
					<div class="overlay"></div>
					<div class = "desc1">
						DOLCE GABBANA SUNGLASS DG 4243 2889/6G
						<br>Rs. 33,000.00
						</div>
				</div>

				<div class = "trend1">
					<img id="image7" src = "./Images/deal5.jpg" alt="Images">
					<div class="overlay"></div>
					<div class = "desc1">
						LASER SUNGLASS LS016 C2
						<br>Rs. 6,000.00
					</div>
				</div>

				<div class = "trend3">
					<img id="image7" src = "./Images/deal7.jpg" alt="Images">
					<div class="overlay"></div>
					<div class = "desc1">BOSS SUNGLASS BO 0256/S Q76LN
						<br>Rs. 19,000.00 Rs. 14,800.00 </div>
				</div>

			</div>

			<div>
				<img id="image6" src = "./Images/6.png" alt="Images">
			</div>

			<div class = "row">	
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
					<h3>INFORMATION</h4>
					<a href = "privacy.html"><h4>Privacy Policy</h4></a>
					<a href = "terms.html"><h4>Terms & Conditions</h4></a>
					<h4>Copyright @2022. All Rights Reserved.<br>
					Sunray Specs is Powered by<br> HTML,CSS,JS,PHP</h4>
				</div>
			</div>
	</body>
</html>