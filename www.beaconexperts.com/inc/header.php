<?php
	//we do not have a global include, so this will have to do.
		include_once(dirname(__FILE__).'/class.ngfrss.php');
		$rssPosts = new ngfRSS;
		$rssPosts->feed = 'http://beaconassociatesblog.com/?feed=rss2';
		$rssPosts->fetch();
?>

<a href="/quote.php"><img id="fixed-getquote" class="btn" src="/img/getquote-fixed.png" border="0" /></a>
<div id="header">
	<div id="logo"><a href="/index.php" title="Toledo Ohio Insurance Company Beacon Associates"><img src="/img/logo.png" id="logo" alt="Toledo Health Insurance Company Beacon Associates can help you find the Health Insurance Coverage that fits your needs" /></a></div>
	<div id="header-rt">
		<div id="topnav">
			<div id="topnav-lf"></div>
			<div id="topnav-main"><a href="/index.php" title="Beacon Associates Home Page">Home</a> | <a href="http://beaconassociatesblog.com/" target="_blank" title="Toledo Insurance News and Updates">News &amp; Updates</a> | <a href="/about-us.php" title="About Beacon Associates Toledo Insurance Company">About Us</a> | <a href="/contact-us.php" title="Contact Toledo Insurance Agency Beacon Associates">Contact Us</a></div>
			<div id="topnav-rt"></div>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
				<div id="bbb-logo"><a id="bbblink" class="rbhzbus" href="http://www.bbb.org/toledo/business-reviews/insurance-health/beacon-associates-insurance-in-maumee-oh-6002491#bbblogo" title="Beacon Associates Insurance, LLC, Insurance-Health, Maumee, OH" style="display: block;position: relative;overflow: hidden; width: 100px; height: 38px; margin: 0px; padding: 0px;"><img style="padding: 0px; border: none;" id="bbblinkimg" src="http://seal-toledo.bbb.org/logo/rbhzbus/beacon-associates-insurance-6002491.png" width="200" height="38" alt="Beacon Associates Insurance, LLC, Insurance-Health, Maumee, OH" /></a><script type="text/javascript">var bbbprotocol = ( ("https:" == document.location.protocol) ? "https://" : "http://" ); document.write(unescape("%3Cscript src='" + bbbprotocol + 'seal-toledo.bbb.org' + unescape('%2Flogo%2Fbeacon-associates-insurance-6002491.js') + "' type='text/javascript'%3E%3C/script%3E"));</script></div>
				<div id="ethics-logo"><img src="/img/national-ethics-logo.png" alt="#" /></div>
                <div id="header-social">
                	<a href="https://www.facebook.com/pages/Beacon-Associates-Insurance-Agency/185980098176092?ref=br_tf" target="_blank"><img src="/img/fb.png" class="btn" border="0" /></a>
                	<a href="https://plus.google.com/116207326327697616380/posts" target="_blank"><img src="/img/gplus.png" class="btn" border="0" /></a>
                	<a href="https://twitter.com/#!/HealthBeacon" target="_blank"><img src="/img/twitter.png" class="btn" border="0" /></a>
                	<a href="http://www.youtube.com/user/BeaconAssociates" target="_blank"><img src="/img/youtube.png" class="btn" border="0" /></a>
                </div>
				<div class="clear"></div>
		<div id="header-tagline">We'll light the way and see you through!</div> 
		<div id="header-address">1655 Holland Rd., Suite C, Maumee, Ohio 43537 | 419-482-0280</div>
	</div>
	<div class="clear"></div>
</div>