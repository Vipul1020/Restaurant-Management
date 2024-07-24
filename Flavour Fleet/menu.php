<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "food_website";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch menu items
$sql = "SELECT * FROM menu";
$result = $conn->query($sql);

$menu_items = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $menu_items[] = $row;
    }
} else {
    echo "0 results";
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Flavour fleet</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="css/animate.css">
	
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<link rel="stylesheet" href="css/magnific-popup.css">

	<link rel="stylesheet" href="css/bootstrap-datepicker.css">
	<link rel="stylesheet" href="css/jquery.timepicker.css">

	
	<link rel="stylesheet" href="css/flaticon.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>

	<div class="wrap">
		<div class="container">
			<div class="row justify-content-between">
				<div class="col-12 col-md d-flex align-items-center">
				<div style="display: flex; align-items: center; position: absolute; top: 3px; right: 700px;">
						<img src="./signup/user-svgrepo-com.svg" alt="SVG Icon" style="width: 20px; height: 20px; margin-right: 5px;">
						<span id="username" style="color: white; font-family: 'Arial', sans-serif; font-size: 13px;"></span>
					</div>
					<p class="mb-0 phone"><span class="mailus">Phone no:</span> <a href="#">+91 7633866449</a> or <span class="mailus">email us:</span> <a href="https://mail.google.com/mail/u/0/#inbox?compose=new">abhishek8thy@gmail.com</a></p>
				</div>
				<div class="col-12 col-md d-flex justify-content-md-end">
					<p class="mb-0">Mon - Fri / 9:00-21:00, Sat - Sun / 10:00-20:00</p>
					<div class="social-media">
						<p class="mb-0 d-flex">
							<a href="https://www.facebook.com/profile.php?id=100013221162105" class="d-flex align-items-center justify-content-center"><span class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
							<a href="https://x.com/Vipulku19224785?t=OahOBtGO8BikO4Nwac9GRg&s=09" class="d-flex align-items-center justify-content-center"><span class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
							<a href="https://www.instagram.com/am_mayonnaise?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" class="d-flex align-items-center justify-content-center"><span class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="index.html">Flavour<span> Fleet</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item" id="home"><a href="index.html" class="nav-link">Home</a></li>
                    <li class="nav-item" id="about"><a href="about.html" class="nav-link">About</a></li>
                    <li class="nav-item" id="chef"><a href="chef.html" class="nav-link">Chef</a></li>
                    <li class="nav-item" id="menu"><a href="menu.php" class="nav-link">Menu</a></li>
                    <li class="nav-item" id="reservation"><a href="reservation.html" class="nav-link">Reservation</a></li>
                    <li class="nav-item" id="blog"><a href="blog.html" class="nav-link">Blog</a></li>
                    <li class="nav-item" id="contact"><a href="contact.html" class="nav-link">Contact</a></li>
                    <li class="nav-item" id="cart"><a href="./Cart/cart.php" class="nav-link">Cart</a></li>
                </ul>
            </div>
        </div>
    </nav>
	<!-- END nav -->
	
	<section class="hero-wrap hero-wrap-2" style="background-image: url('images/coverimage.jpg');" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters slider-text align-items-end justify-content-center">
				<div class="col-md-9 ftco-animate text-center mb-5">
					<h1 class="mb-2 bread">Menu</h1>
					<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="fa fa-chevron-right"></i></a></span> <span>Menu <i class="fa fa-chevron-right"></i></span></p>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-2">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <span class="subheading">Specialties</span>
                    <h2 class="mb-4">Our Menu</h2>
                </div>
            </div>
			<div class="row">
    <?php
    $categories = ['Breakfast', 'Lunch', 'Dinner', 'Desserts', 'Wine Card', 'Drinks & Tea'];
    foreach ($categories as $category) {
        echo '<div class="col-md-6 col-lg-4">';
        echo '<div class="menu-wrap">';
        echo '<div class="heading-menu text-center ftco-animate">';
        echo "<h3>$category</h3>";
        echo '</div>';

        foreach ($menu_items as $item) {
            if ($item['category'] === $category) {
                echo '<div class="menus d-flex ftco-animate">';
                echo '<div class="menu-img img" style="background-image: url(' . $item['image'] . ');"></div>';
                echo '<div class="text">';
                echo '<div class="d-flex">';
                echo '<div class="one-half">';
                echo '<a href="' . $item['page_link'] . '"><h3>' . $item['name'] . '</h3></a>';
                echo '</div>';
                echo '<div class="one-forth">';
                echo '<span class="price">' . $item['price'] . '</span>';
                echo '</div>';
                echo '</div>';
                echo '<p>' . $item['description'] . '</p>';
                echo '</div>';
                echo '</div>';
            }
        }

        echo '</div>';
        echo '</div>';
    }
    ?>
</div>

        </div>
    </section>


	<section class="ftco-section ftco-wrap-about bg-primary ftco-no-pb ftco-no-pt">
		<div class="container">
			<div class="row no-gutters">
				<div class="col-sm-12 p-4 p-md-5 d-flex align-items-center justify-content-center bg-primary">
				<form action="./reservations/book_table.php" method="post" class="appointment-form">
						<h3 class="mb-3">Book your Table</h3>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" name="name" class="form-control" placeholder="Name" required>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="email" name="email" class="form-control" placeholder="Email" required>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="tel" name="phone" class="form-control" placeholder="Phone" required>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<div class="input-wrap">
										<div class="icon"><span class="fa fa-calendar"></span></div>
										<input type="date" name="check_in" class="form-control book_date" placeholder="Check-In" required>
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<div class="input-wrap">
										<div class="icon"><span class="fa fa-clock-o"></span></div>
										<input type="time" name="time" class="form-control book_time" placeholder="Time" required>
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<div class="form-field">
										<div class="select-wrap">
											<div class="icon"><span class="fa fa-chevron-down"></span></div>
											<select name="guest" class="form-control" required>
												<option value="">Guest</option>
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
											</select>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="submit" value="Book Your Table Now" class="btn btn-white py-3 px-4">
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>

	<footer class="ftco-footer ftco-no-pb ftco-section">
		<div class="container">
			<div class="row mb-5">
				<div class="col-md-6 col-lg-3">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2">Flavour fleet</h2>
						<p>Discover the essence of fine dining with our thoughtfully curated menu, where every bite tells a story of passion and creativity. Join us and savor the moment where every detail is designed to delight.</p>
						<ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
							<li class="ftco-animate"><a href="#"><span class="fa fa-twitter"></span></a></li>
							<li class="ftco-animate"><a href="#"><span class="fa fa-facebook"></span></a></li>
							<li class="ftco-animate"><a href="#"><span class="fa fa-instagram"></span></a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-6 col-lg-3">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2">Open Hours</h2>
						<ul class="list-unstyled open-hours">
							<li class="d-flex"><span>Monday</span><span>9:00 - 24:00</span></li>
							<li class="d-flex"><span>Tuesday</span><span>9:00 - 24:00</span></li>
							<li class="d-flex"><span>Wednesday</span><span>9:00 - 24:00</span></li>
							<li class="d-flex"><span>Thursday</span><span>9:00 - 24:00</span></li>
							<li class="d-flex"><span>Friday</span><span>9:00 - 02:00</span></li>
							<li class="d-flex"><span>Saturday</span><span>9:00 - 02:00</span></li>
							<li class="d-flex"><span>Sunday</span><span> Closed</span></li>
						</ul>
					</div>
				</div>
				<div class="col-md-6 col-lg-3">
					<div class="ftco-footer-widget mb-4">
					 <h2 class="ftco-heading-2">Instagram</h2>
					 <div class="thumb d-sm-flex ml-2 mr-2 mb-2">
					   <a href="https://www.instagram.com/p/C5KnHNfrdYj/" class="thumb-menu img" style="background-image: url(images/insta1.jpg);">
					   </a>
					   <a href="https://www.instagram.com/p/C5KmWl9L4aN/" class="thumb-menu img" style="background-image: url(images/insta2.jpg);">
					   </a>
					   <a href="https://www.instagram.com/p/C5Klt9ELrD-/" class="thumb-menu img" style="background-image: url(images/insta3.jpg);">
					   </a>
					 </div>
					 <div class="thumb d-flex ml-2 mr-2">
					   <a href="https://www.instagram.com/p/C5Kl-harOjN/" class="thumb-menu img" style="background-image: url(images/insta4.jpg);">
					   </a>
					   <a href="https://www.instagram.com/p/C5KmtqprUg3/" class="thumb-menu img" style="background-image: url(images/insta5.jpg);">
					   </a>
					   <a href="https://www.instagram.com/p/C5Km7T4L0xW/" class="thumb-menu img" style="background-image: url(images/insta6.jpg);">
					   </a>
					 </div>
				   </div>
				</div>
				<div class="col-md-6 col-lg-3">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2">Newsletter</h2>
						<p>Feast on Flavor, Your Culinary Newsletter Delight.</p>
						<form action="#" class="subscribe-form">
							<div class="form-group">
								<input type="text" class="form-control mb-2 text-center" placeholder="Enter email address">
								<input type="submit" value="Subscribe" onclick="this.value='Subscribed';" class="form-control submit px-3">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="container-fluid px-0 bg-primary py-3">
			<div class="row no-gutters">
				<div class="col-md-12 text-center">

					<p class="mb-0">
						Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved<i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://vipul1020.github.io/MainPortfolio/" target="_blank">M.A.A</a>
						</p>
					</div>
				</div>
			</div>
		</footer>
		

		<!-- loader -->
		<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


		<script src="js/jquery.min.js"></script>
		<script src="js/jquery-migrate-3.0.1.min.js"></script>
		<script src="js/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.easing.1.3.js"></script>
		<script src="js/jquery.waypoints.min.js"></script>
		<script src="js/jquery.stellar.min.js"></script>
		<script src="js/owl.carousel.min.js"></script>
		<script src="js/jquery.magnific-popup.min.js"></script>
		<script src="js/jquery.animateNumber.min.js"></script>
		<script src="js/scrollax.min.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
		<script src="js/google-map.js"></script>
		<script src="js/main.js"></script>
		<script src="js/navbar.js"></script>

		
	</body>
	</html>