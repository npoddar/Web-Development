<?php
	//Designed with ngfSkeleton 1.0
	include 'inc/config.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>The Optical Shop</title>
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<?php include 'inc/css.php'; ?>
		<?php include 'inc/js.php'; ?>
	</head>
	<body>
		<?php include 'inc/header.php'; ?>
		<?php include 'inc/rotator.php'; ?>
		<?php include 'inc/featured.php'; ?>
		<div id="content_container">
			<div id="content">
				<div class="column">
                	<div class="column-title"><h2>Optical Shop News</h2></div>
                    <div class="column-txt">
                    	<?php	include 'inc/class.ngfrss.php';
								$rss = new ngfRSS;
								$rss->feed = 'http://www.theopticalshopoftoledo.com/blog/?feed=rss2';
								$rss->entries = 3;
								$rss->item_element = 'div';
								$rss->item_cssClass = 'post';
								$rss->fetch();
								$rss->render();
								$rss->display(); ?>

                    	<!--<div class="post">
                        	<div class="post-img"><img src="img/blog-img1.jpg"></div>
                            <div class="post-txt">
                            	<span class="date">12-18-2012</span><br>
			                    <p>To mark its 23rd annual observance of Day With(out) Art and World AIDS Day, l.a.Eyeworks invited...</p>
                            </div>
                        	<div class="clear"></div>
                      </div>-->
                        <div class="more"><a href="/blog/">Read More News ></a></div>
                    </div>
                </div>
                <div class="column">
                	<div class="column-title"><h2>About Us</h2></div>
                   	<div class="column-txt">
			             <p>A singular vision - one woman's passion - the area's finest eyewear selection - exclusive international collections - incomparable individual attention and distinctive personal service. These six core lenses are the essential elements that allow customers to see the Optical Shop as such a special eyewear buying experience.</p>

                        <p>Today, after more than 25 years later, it remains focused on those key essentials of Georgeann Kohn's singular vision.</p>
                         <div class="more"><a href="about-us.php">Read More About Us ></a></div>
                    </div>
                </div>
                <div class="column">
                	<div class="column-title"><h2>Our Location</h2></div>
                    <div class="column-txt">
                    	 <img src="img/store-front.jpg" class="img">
                        <p>3205 W. Central Ave. #1<br>
                        Toledo, Ohio 43606<br>
                        Phone: 419-536-6520</p>
                        
                        <p>Hours:<br>
                        T-F: 10am - 6pm<br>
                        Sat: 10am - 2pm<br>
                        Closed: Sunday &amp; Monday<br>
                        Fittings by Appointment</p>
                    </div>
                </div>
                <div class="clear"></div>
			</div>
		</div>
		<?php include 'inc/footer.php'; ?>
	</body>
</html>