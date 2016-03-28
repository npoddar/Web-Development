<?php

 if (isset($_POST['restaurant_add'])) {
  
  	$theLinks = array();
  	foreach ($_POST['link'] as $l) {
  		$theLinks[] = array(
			'url' => $l['url'],
			'title' => $l['title'],
			'date' => $l['date'],
			'order' => $l['order'],
		);
  	}
	function sortLinks($a, $b) {return $a['order'] - $b['order'];}
	usort($theLinks,'sortLinks');
	foreach($theLinks as &$l) {unset($l['order']);}
  
	$ls = mysql_real_escape_string($_POST['restaurant_restaurant']);
	$lc = mysql_real_escape_string($_POST['restaurant_category']);
	$la = $_POST['restaurant_active'] ? 1 : 0;
	$ll = mysql_real_escape_string(json_encode($theLinks));
	$llc = mysql_real_escape_string($_POST['restaurant_columns']);
	
	if (isset($_FILES['restaurant_image']) && $_FILES['restaurant_image']['error'] == 0) {
		if (is_uploaded_file($_FILES['restaurant_image']['tmp_name']) && @getimagesize($_FILES['restaurant_image']['tmp_name'])) {
			$filename = sprintf('%s_%s_%s', hash_file("crc32b",$_FILES['restaurant_image']['tmp_name']), time(), preg_replace('#[^a-z0-9.]#','-',strtolower($_FILES['restaurant_image']['name'])));
			if (move_uploaded_file($_FILES['restaurant_image']['tmp_name'], dirname(dirname(__FILE__)).'/uploads/'.$filename)) {
				$theImage = $filename;
			}
		}
	}
	if ($theImage) {$li = $theImage;} else {$li = NULL;}
	
	$cfn = mysql_real_escape_string($_POST['restaurant_firstname']);
	$cln = mysql_real_escape_string($_POST['restaurant_lastname']);
	$ct = mysql_real_escape_string($_POST['restaurant_title']);
	$cpeop = mysql_real_escape_string($_POST['restaurant_people']);
	
	$ca = mysql_real_escape_string($_POST['restaurant_address']);
	$cc = mysql_real_escape_string($_POST['restaurant_city']);
	$cs = mysql_real_escape_string($_POST['restaurant_state']);
	$cz = mysql_real_escape_string($_POST['restaurant_zip']);
	
	$cp = mysql_real_escape_string($_POST['restaurant_phone']);
	$ce = mysql_real_escape_string($_POST['restaurant_email']);
	$cw = mysql_real_escape_string($_POST['restaurant_website']);
	
	mysql_query("
		INSERT INTO `restaurant` (
			`restaurant`,
			`firstname`,
			`lastname`,
			`title`,
			`people`,
			`address`,
			`city`,
			`state`,
			`zip`,
			`phone`,
			`email`,
			`website`,
			`description`,
			`links`,
			`columns`,
			`image`,
			`category`,
			`active`
		)
		VALUES (
			'{$ls}',
			'{$cfn}',
			'{$cln}',
			'{$ct}',
			'{$cpeop}',
			'{$ca}',
			'{$cc}',
			'{$cs}',
			'{$cz}',
			'{$cp}',
			'{$ce}',
			'{$cw}',
			'{$ld}',
			'{$ll}',
			'{$llc}',
			'{$li}',
			'{$lc}',
			'{$la}'
		)
	");
	Print "<script>window.location = 'admin.php?page=restaurants-list';</script>";
	
  
  }

?>
  
	<div class="wrap">
		<h1>Add Restaurant</h1>
		<style>
			form {
				background-color: #F1F1F1;
				-moz-border-radius: 5px;
				-webkit-border-radius: 5px;
				border-radius: 5px;
				width: 600px;
				padding: 10px;
				margin: 10px;
			}
			.wrap form h2 {padding-top: 0;}
			form input, form textarea, form select {
				width: 400px;
				padding: 5px;
				margin: 0px;
				resize: none;
				-moz-border-radius: 3px;
				-webkit-border-radius: 3px;
				border-radius: 3px;
			}
			label {
				display: inline-block;
				width: 150px;
				padding: 5px;
				text-align: right;
				vertical-align: top;
			}
			form input[type=submit] {
				padding: 5px 0px;
			}
			#restaurant_image_preview {
				max-height: 165px;
				max-width: 165px;
				padding: 2px;
				border: 1px solid #B9B7B8;
				background-color: #FFFFFF;
			}
			
			#restaurant_links {
				float: right;
				width: 425px;
				vertical-align: top;
				padding: 5px;
				margin: 0px;
			}
			#restaurant_links_template {
				display: none;
			}
			#restaurant_links_new {
				font-size: 12px;
				text-decoration: underline;
				cursor: pointer;
			}
			#restaurant_links .link {
				position: relative;
				padding: 0 50px 0 0;
				margin: 0 0 10px 0;
			}
			#restaurant_links .link .controls {
				position: absolute;
				right: 0px;
				top: 0px;
				width: 50px;
			}
			#restaurant_links .link .controls .remove {
				font-size: 10px;
				text-decoration: underline;
				cursor: pointer;
			}
			#restaurant_links .link .controls .order {
				width: 40px;
				margin: 8px 0 0 0;
			}
			#restaurant_links .link .url {
				width: 365px;
			}
			#restaurant_links .link .title {
				width: 240px;
			}
			#restaurant_links .link .date {
				width: 115px;
			}
			
			.clear {clear: both;}
		</style>
		
		<?php if (isset($_POST['restaurant_add'])) {
				if (mysql_error()) { Print '<strong>Error: </strong> '.mysql_error();} else {
		?>
			<strong>Sucess!</strong> Restaurant added.
		<?php }} ?>
		
		<form method="post" enctype="multipart/form-data">
			<h2>General Information</h2>
				<label for="restaurant_restaurant">Restaurant Name: </label>
					<input type="text" name="restaurant_restaurant" id="restaurant_restaurant" />
					<br />
				<label for="restaurant_category">Category: </label>
					<select name="restaurant_category" id="restaurant_category" />
						<option selected disabled value=""></option>
						<option value="Ann Arbor">Ann Arbor</option>
						<option value="Toledo">Toledo</option>
					</select>
					<br />
				<label for="restaurant_active">Active: </label>
					<select name="restaurant_active" id="restaurant_active" />
						<option value="1">Yes. Restaurant is visible to site visitors.</option>
						<option value="0">No. Restaurant is not visible to site visitors.</option>
					</select>
					<br />
					<br />
			
			<h2>Contact Information</h2>
				<label for="restaurant_firstname">First Name: </label>
					<input type="text" name="restaurant_firstname" id="restaurant_firstname" />
					<br />
				<label for="restaurant_lastname">Last Name: </label>
					<input type="text" name="restaurant_lastname" id="restaurant_lastname" />
					<br />
				<label for="restaurant_title">Job Title: </label>
					<input type="text" name="restaurant_title" id="restaurant_title" />
					<br />
					<br />
				<label for="restaurant_people">Additional People: </label>
					<textarea name="restaurant_people" id="restaurant_people" title="Separate name and title with a semi-colon(;). Only one person per line." placeholder="(Separate name and title with a semi-colon(;). Only one person per line.)"></textarea>
					<br />
					<br />
				<label for="restaurant_address">Street Address: </label>
					<textarea name="restaurant_address" id="restaurant_address"></textarea>
					<br />
				<label for="restaurant_city">City: </label>
					<input type="text" name="restaurant_city" id="restaurant_city" />
					<br />
				<label for="restaurant_state">State: </label>
					<input type="text" name="restaurant_state" id="restaurant_state" />
					<br />
				<label for="restaurant_zip">Zip: </label>
					<input type="text" name="restaurant_zip" id="restaurant_zip" />
					<br />
					<br />
				<label for="restaurant_phone">Phone: </label>
					<input type="text" name="restaurant_phone" id="restaurant_phone" />
					<br />
				<label for="restaurant_website">Website: </label>
					<input type="text" name="restaurant_website" id="restaurant_website" />
					<br />
				<label for="restaurant_email">Email: </label>
					<input type="text" name="restaurant_email" id="restaurant_email" />
					<br />
					<br />
			
			<h2>Image</h2>
				<label for="restaurant_image">Image: </label>
					<input type="file" name="restaurant_image" id="restaurant_image" />
					<br />
			
			<script>
				
				var linkCount = 0;
				
				jQuery(function($) {
					$('#restaurant_links_new').click(linksAdd);
					$('#restaurant_links').on('click', '.remove', linksRemove);
				});
				
				function linksAdd() {
					linkCount++;
					var $newLink = jQuery('#restaurant_links_template .link').clone();
					$newLink.find('.order').attr('name','link['+linkCount+'][order]').val(linkCount);
					$newLink.find('.url').attr('name','link['+linkCount+'][url]');
					$newLink.find('.title').attr('name','link['+linkCount+'][title]');
					$newLink.find('.date').attr('name','link['+linkCount+'][date]');
					jQuery('#restaurant_links_new').before($newLink);
				}
				
				function linksRemove() {
					if (confirm('Remove this link?')) {
						jQuery(this).closest('.link').remove();
					}
				}
			</script>
			
			<h2>Links</h2>
				<label for="restaurant_columns">Columns URL: </label>
					<input type="text" name="restaurant_columns" id="restaurant_columns" />
					<br />
				<label>Articles: </label>
					<div id="restaurant_links">
						<div id="restaurant_links_template">
							<div class="link">
								<div class="controls">
									<div class="remove">Remove</div>
									<input type="text" class="order" title="Order" placeholder="0" />
								</div>
								<div class="fields">
									<input type="text" class="url" placeholder="(URL)" title="URL" />
									<input type="text" class="title" placeholder="(Title)" title="Title" /> - <input type="text" class="date" placeholder="(Date)" title="Date" />
								</div>
							</div>
						</div>
						<div id="restaurant_links_new">Add New Article</div>
					</div>
					<div class="clear"></div>
					<br />
					<br />
					
			
			<input type="submit" class="button" value="Add Restaurant" name="restaurant_add">
		</form>
	</div>