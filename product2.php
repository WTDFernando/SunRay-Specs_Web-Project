<!DOCTYPE html>
<html>
	<body>
		<head>
			<title>Sunray Specs</title>
			<link rel="stylesheet" href="./Css/project.css">
			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
			<script src = "JS/script.js"></script>
		<head>
			
			<div class="header">
  				<div id="logo">
  					<img id="image1" src="./Images/4.png" alt="Sunray Specs">
  				</div>
  				<div id="Navbar">
    				<ul class = "section1">
    					<li><a href="Rad.html">Home</a></li>
  						<li><a class="active" href="products.html">Products</a></li>
  						<li><a href="#services">Services</a></li>
  						<li><a href="deals.html">Deals</a></li>
						<li><a href= "Guide.html">Guide</a></li>
  						<li><a href= "About.html">About Us</a></li>
 						<li><a href="contact.html">Contact</a></li>
						<li style ="float:right" ><a href="cart.html"><i class="fas fa-shopping-cart"></i></a></li>
 						<li style ="float:right" ><a href="account.html">Account</a></li>
    				</ul>

  				</div>
			</div>

			<div class = "itemDetails">
				<div class = "proGroup">

					<div class = "mainPic">
						<img id = "pro1" src= ".\Images\product2main.jpg">
					</div>

					<div class  = "minorpics">
						<div class = "otherpics">
							<img class = "pro2" src = ".\Images\product2main.jpg">
						</div>
						<div class = "otherpics">
							<img class = "pro2" src = ".\Images\product21.jpg">
						</div>
						<div class = "otherpics">
							<img class = "pro2" src = ".\Images\product22.jpg">
						</div>
						<div class = "otherpics">
							<img class = "pro2" src = ".\Images\product23.jpg">
						</div>
					</div>

				</div>

				<div class = "description">
					<h1>VINTAGE VELOCITY COL.124</h1>
					<ul>
						<li>Brand New Products</li>
						<li>100% Risk Free</li>
						<li>Free Eyeglasses Case with Cleaning Cloth</li>
						<li>Island-wide Delivery</li>
						<li>Multiple Payment Options</li>
						<li>Cash On Delivery </li>
						<li>Secured Payments</li>
						<li>14 Days Limited Warranty</li>
						<li>Free Life Time After Sale Service</li>
						<li>Free Eye Testing</li>
					</ul>
					<h3>In stock</h3>
					<h2>Rs.12,000.00</h2>
					<select>
						<option>Select Color</option>
						<option>Soft Ultra Smooth Matte Black</option>
						<option>Gold -Grey Lens</option>
						<option>Black - Ash Lens</option>
					</select>
					<input type = "number" value = "1">
					<button>Add To Cart</button>
					

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
					document.getElementById("demo").innerHTML = "Get started with buying your spectacles online from the comfort of your home and begin browsing through our eclectic assortment of designer spectacle frames for men, women and kids now!.<br><br>Actual product colors may vary slightly from colors shown on your Computer/Mobile Screen.";
				}

				function change2()
				{
					document.getElementById('demo').innerHTML = "<table><tr><td>SKU</td><td>VELOCITY COL.124</td></tr><tr><td>BRAND</td><td>Vintage</td></tr><tr><td>Prescription product</td><td>No</td></tr><tr><td>Color</td><td>Grey</td></tr><tr><tr><td>Frame Material</td><td>Plastic</td></tr><tr><td>Frame Style</td><td>Full Frame</td></tr><tr><td>Gender</td><td>Unisex</td></tr><tr><td>New Collection</td><td>Women New Collection</td></tr></table>";
				}

			</script>


			<p id = "demo"></p>
			
			
			<h1 id = "trendTitle"><br>Related Products</h1>
			<div class = "row2">
				<div class = "trend2">					
					<img id="image7" src = ".\Images\product2related1.jpg" alt="Images">
					<div class="overlay"></div>
					<div class = "desc1">Vintage XSCAPE COL.188
						<br>Rs. 10,000.00 </div>
				</div>
				<div class = "trend3">
					<img id="image7" src = ".\Images\product2related2.jpg" alt="Images">
					<div class="overlay"></div>
					<div class = "desc1">
						Vintage EXHILARATE CY COL.98-2
						<br>Rs. 20,000.00
						</div>
				</div>

				<div class = "trend1">
					<img id="image7" src = ".\Images\product2related3.jpg" alt="Images">
					<div class="overlay"></div>
					<div class = "desc1">
						Vintage SUBTILE COL.151
						<br>Rs. 16,000.00
					</div>
				</div>

				<div class = "trend3">
					<img id="image7" src = ".\Images\product2related4.jpg" alt="Images">
					<div class="overlay"></div>
					<div class = "desc1">Vintage GETAWAY 61/13 COL.123
						<br>Rs. 11,000.00 Rs. 19,800.00 </div>
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