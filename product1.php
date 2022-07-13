<?php

@include 'config.php';

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = 1;

   $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name'");

   if(mysqli_num_rows($select_cart) > 0){
      $message[] = 'product already added to cart';
   }else{
      $insert_product = mysqli_query($conn, "INSERT INTO `cart`(name, price, image, quantity) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity')");
      $message[] = 'product added to cart succesfully';
   }

}

?>



<!DOCTYPE html>
<html>
	<body>
		<head>
			<title>Sunray Specs</title>
			<link rel="stylesheet" href="./Css/project.css">
			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
			<script src = "JS/script.js"></script>
		<head>

        <?php

            if(isset($message)){
            foreach($message as $message){
                echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
            };
            };

        ?>
			
			<div class="header">
  				<div id="logo">
  					<img id="image1" src="./Images/4.png" alt="Sunray Specs">
  				</div>
  				<div class="topnav" id="Navbar">
    				<ul class = "section1">
    					<li><a href="Rad.php">Home</a></li>
  						
						<div class="dropdown">
						<button class="dropbtn"><li><a class = "active" href="products.php">Products</a></li><i class="fa fa-caret-down"></i>
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

			<div class = "itemDetails">
				<div class = "proGroup">

					<div class = "mainPic">
						<img id = "pro1" src= "./Images/deal1.jpg">
					</div>

					<div class  = "minorpics">
						<div class = "otherpics">
							<img class = "pro2" src = "./Images/deal1.jpg">
						</div>
						<div class = "otherpics">
							<img class = "pro2" src = "./Images/deal14.jpg">
						</div>
						<div class = "otherpics">
							<img class = "pro2" src = "./Images/deal13.jpg">
						</div>
						<div class = "otherpics">
							<img class = "pro2" src = "./Images/deal12.jpg">
						</div>
					</div>

				</div>

				<div class = "description">
					<h1>Polarsun PL-5592P C6S/G15 60-15-131</h1>
					<ul>
						<li>Brand New Products</li>
						<li>100% Risk Free</li>
						<li>Island-wide Delivery</li>
						<li>Multiple Payment Options</li>
						<li>Cash On Delivery </li>
						<li>Secured Payments</li>
						<li>14 Days Limited Warranty</li>
						<li>Free Life Time After Sale Service</li>
						<li>Free Eye Testing</li>
					</ul>
					<h3>In stock</h3>
					<h2>Rs.7,000.00</h2>
					<select>
						<option>Select Color</option>
						<option>Soft Ultra Smooth Matte Black</option>
						<option>Ultra Gloss Black</option>
						<option>Black - Ash Lens</option>
					</select>
					
                    <div>
            <?php
      
                $select_products = mysqli_query($conn, "SELECT * FROM `products`");
                if(mysqli_num_rows($select_products) > 0){
                   
                ?>

                <form action="" method="post">
                    <div class="box">
                    <img src="uploaded_img/<?php echo $fetch_product['image']; ?>" alt="">
                        <input type="hidden" name="product_name" value="Specs">
                        <input type="hidden" name="product_price" value="7000">
                        <input type="hidden" name="product_image" value="./Images/deal1.jpg">
                        <button type="submit" class="btn" value="Add To Cart" name="add_to_cart">Add To Cart</button>
                    </div>
                </form>

                <?php
                    
                };
                ?>


            </div>
					
			</div>
			</div>

            

			<script>
				var main = document.getElementById("pro1");
				var small = document.getElementsByClassName("pro2");

				small[0].onclick = function()
				{
					main.src = small[0].src;
				}

				small[1].onclick = function()
				{
					main.src = small[1].src;
				}

				small[2].onclick = function()
				{
					main.src = small[2].src;
				}

				small[3].onclick = function()
				{
					main.src = small[3].src;
				}
								
			</script>

			<div class = "Details">
				<button id = "detail1" onclick = "change1()">Description</button>
				<button id = "detail2" onclick = "change2()">Additional Information</button>
			</div>

			<script>
				function change1()
				{
					document.getElementById("demo").innerHTML = "Get started with buying your sunglasses online from the comfort of your home and begin browsing through our eclectic assortment of designer sunglasses for men, women and kids now!<br><br>Actual product colors may vary slightly from colors shown on your Computer/Mobile Screen.<br><br>Polarsun Pl - 6593P C6M/G15 is a thermoplastic material based on Swiss technology. It is a lightweight, durable and impact resistant material which can effortlessly bend under pressure making it less likely to break.";
				}

				function change2()
				{
					document.getElementById('demo').innerHTML = "<table><tr><td>SKU</td><td>PL-5592P C6S/G15</td></tr><tr><td>BRAND</td><td>Polarsun</td></tr><tr><td>Model</td><td>Rectangle</td></tr><tr><td>Size</td><td>Medium</td></tr><tr><td>Prescription product</td><td>No</td></tr><tr><td>Color</td><td>Soft Ultra Smooth Matte Black</td></tr><tr><tr><td>Frame Material</td><td>Plastic</td></tr><tr><td>Frame Style</td><td>Full Frame</td></tr><tr><td>Gender</td><td>Women</td></tr><tr><td>New Collection</td><td>Women New Collection</td></tr></table>";
				}

			</script>


			<p id = "demo"></p>
			
			
			<h1 id = "trendTitle"><br>Related Products</h1>
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

				<div class = "pageNumbers">
					<a href = "#">1</a>
					<a href = "#">2</a>
					<a href = "#"><i class="fas fa-arrow-right"></i></a>
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