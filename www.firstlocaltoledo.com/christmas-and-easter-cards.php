<?php
/**
 * Template Name: Christmas and Easter Cards
 */
get_header(); 
$setmonth = $_GET['M'];
$setyear = $_GET['Y'];
if (isset($setmonth)) { // do Toledo Archive page---------------------------------------------- ?>
<div id="primary">
			
			<div id="featuredstories">
			<h1>Archived Issue <?php
				if ($setmonth == 1) { $monthalph = 'January'; }
				if ($setmonth == 2) { $monthalph = 'February'; }
				if ($setmonth == 3) { $monthalph = 'March'; }
				if ($setmonth == 4) { $monthalph = 'April'; }
				if ($setmonth == 5) { $monthalph = 'May'; }
				if ($setmonth == 6) { $monthalph = 'June'; }
				if ($setmonth == 7) { $monthalph = 'July'; }
				if ($setmonth == 8) { $monthalph = 'August'; }
				if ($setmonth == 9) { $monthalph = 'September'; }
				if ($setmonth == 10) { $monthalph = 'October'; }
				if ($setmonth == 11) { $monthalph = 'November'; }
				if ($setmonth == 12) { $monthalph = 'December'; }
				echo $monthalph.", ".$setyear; ?><br />Featured Stories</h1>
			<?php if ( have_posts() ) : ?>
				<?php 
				$themonth = get_field('toledo_current_month', '5');
				$theyear = get_field('toledo_current_year', '5');
				if ($themonth == 'January') { $themonthnum = 1; }
				if ($themonth == 'February') { $themonthnum = 2; }
				if ($themonth == 'March') { $themonthnum = 3; }
				if ($themonth == 'April') { $themonthnum = 4; }
				if ($themonth == 'May') { $themonthnum = 5; }
				if ($themonth == 'June') { $themonthnum = 6; }
				if ($themonth == 'July') { $themonthnum = 7; }
				if ($themonth == 'August') { $themonthnum = 8; }
				if ($themonth == 'September') { $themonthnum = 9; }
				if ($themonth == 'October') { $themonthnum = 10; }
				if ($themonth == 'November') { $themonthnum = 11; }
				if ($themonth == 'December') { $themonthnum = 12; }
				query_posts('cat=-20&post_status=future,publish&posts_per_page=99&category_name=christmas-and-easter-cards&meta_key=theorder&orderby=meta_value_num&order=ASC&year='.$setyear.'&monthnum='.$setmonth); ?>
				<?php while ( have_posts() ) : the_post(); ?>
				<?php if (get_field('location') == 'Toledo') { //only grab Toledo stuff! ?>
					<div class="featuredentry">
						<div class="featuredimg">
							<img rel="image_src" src="<?php the_field('image_for_homepage'); ?>" alt="<?php the_field('name_and_company'); ?>" width="140" height="140" />
						</div>
						<div class="featuredarticle">
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<h3><?php the_field('name_and_company'); ?></h3>
							<h4><?php the_field('author'); ?></h4>
							<?php the_excerpt(); ?>
							<div class="clear"></div>
							<span class="leavecomment"><a href="<?php the_permalink(); ?>">Read More</a> | <a href="<?php the_permalink(); ?>#respond">Leave a Comment</a></span>
						</div>
						<div class="clearL"> </div>
					</div>
				<?php } ?>
				<?php endwhile; ?>

			<?php else : ?>
				<article id="post-0" class="post no-results not-found">
					<div class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'twentyeleven' ); ?></h1>
					</div><!-- .entry-header -->
					<div class="entry-content">
						<p><?php _e( 'No results. Try a search at the top of the page.', 'twentyeleven' ); ?></p>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->
			<?php endif;
			wp_reset_query(); 
			
			//$checkitout = //query_posts('cat=20&post_status=future,publish&posts_per_page=99&category_name=christmas-and-easter-cards&meta_key=theorder&orderby=meta_value_num&order=ASC&year='.$setyear.'&monthnum='.$setmonth);
	//		if(isset($checkitout[0])) { //---------Community Partners ?>
if(true){
			
			
			<?php //query_posts('cat=20&post_status=future,publish&posts_per_page=99&category_name=christmas-and-easter-cards&meta_key=theorder&orderby=meta_value_num&order=ASC&year='.$setyear.'&monthnum='.$setmonth);
				$firsty = 1;
				while ( have_posts() ) : the_post(); ?>
					<?php if (get_field('location') == 'Toledo') { //only grab Toledo stuff!
						if ($firsty == 1) { echo '<h1 class="communpush">Community Partners</h1>'; $firsty++; }	?>
					<div class="featuredentry">
						<div class="featuredimg">
							<img rel="image_src" src="<?php the_field('image_for_homepage'); ?>" alt="<?php the_field('name_and_company'); ?>" width="140" height="140" />
						</div>
						<div class="featuredarticle">
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<h3><?php the_field('name_and_company'); ?></h3>
							<h4><?php the_field('author'); ?></h4>
							<?php the_excerpt(); ?>
							<div class="clear"></div>
							<span class="leavecomment"><a href="<?php the_permalink(); ?>">Read More</a> | <a href="<?php the_permalink(); ?>#respond">Leave a Comment</a></span>
						</div>
						<div class="clearL"> </div>
					</div>
				<?php } ?>
					<?php endwhile; ?>
					<?php wp_reset_query();	
				}?>

			</div><?php /* ------------- end featured stories -------------- */ ?>
			

			<div id="colright">
				
				<a href="/speakers-bureau"><img src="<?php Print get_template_directory_uri() ?>/images/speakers-bureau.jpg" /></a>
				<?php
				/*
				<div id="advertisements_rotator_container">
					<div id="advertisements_rotator">
						<div class="placeholder">ADVERTISEMENT</div>
						<div class="slides">
							<?php
								if ($A = mysql_query(" SELECT * FROM `advertisement` WHERE `active` AND (`category` LIKE 'ALL' OR `category` LIKE 'TOLEDO') ORDER BY RAND() ")) {
									while ($a = mysql_fetch_assoc($A)) {
										Print sprintf('<a class="slide" href="%s" target="_blank"><img src="'.get_template_directory_uri().'/abecads/uploads/%s" /></a>', (trim($a['url']) ? ((strpos(trim($a['url']),'://') === false ? 'http://' : '').trim($a['url'])) : '#'), $a['image']);
									}
								}
							?>
						</div>
						<span class="control previous">&lt;</span>
						<span class="control next">&gt;</span>
						<div class="clear"></div>
					</div>
				</div>
				
				<script type="text/javascript" src="<?php Print get_template_directory_uri(); ?>/abecads/rotator.js"></script>
				*/
				?>
				<?php include 'inc/sidebar-video-toledo.php'; ?>
				
				<div id="thesecolumns">
					<div class="redhead">Columns<a href="<?php echo get_permalink(680); ?>">View Archives</a></div>
					
					<?php 
					$themonth = get_field('toledo_current_month', '5');
					$theyear = get_field('toledo_current_year', '5');
					if ($themonth == 'January') { $themonthnum = 1; }
					if ($themonth == 'February') { $themonthnum = 2; }
					if ($themonth == 'March') { $themonthnum = 3; }
					if ($themonth == 'April') { $themonthnum = 4; }
					if ($themonth == 'May') { $themonthnum = 5; }
					if ($themonth == 'June') { $themonthnum = 6; }
					if ($themonth == 'July') { $themonthnum = 7; }
					if ($themonth == 'August') { $themonthnum = 8; }
					if ($themonth == 'September') { $themonthnum = 9; }
					if ($themonth == 'October') { $themonthnum = 10; }
					if ($themonth == 'November') { $themonthnum = 11; }
					if ($themonth == 'December') { $themonthnum = 12; }
					query_posts('post_status=future,publish&posts_per_page=99&category_name=christmas-and-easter-cards&meta_key=theorder&orderby=meta_value_num&order=ASC&year='.$setyear.'&monthnum='.$setmonth); ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php if (get_field('location') == 'Toledo') { //only grab Toledo stuff! ?>
						<div class="acolumn">
							<div class="acolumnimage">
								<?php
									$thename = get_field('columnist_name');
									global $wpdb;
									$page = get_page_by_title( $thename );
									$page_name_id = $page->ID;
								?>
								
								<img src="<?php the_field('columnist_imageS', $page_name_id); ?>" alt="<?php the_field('columnist_name', $page_name_id); ?>" width="80" height="70" />
							</div>
							<div class="acolumndetail">
								<?php
									$parent_category_id = 5;
									/*$post_categories = wp_get_post_categories( $post->ID );
									$cats = '';
									foreach($post_categories as $c){
										$cat = get_category($c);
										if ($cat->category_parent = $parent_category_id){
											$cats = $cat->slug;
										}
									}*/
								?>
								<h3><a href="http://www.abecssbr.com/columnists/<?php //echo $cats;
								$theirname = get_field('columnist_name');
								$theirname = str_replace(" ", "-", $theirname);
								$theirname = str_replace(".", "", $theirname);
								$theirname = strtolower($theirname);
								echo $theirname; ?>"><?php the_field('columnist_name'); ?></a></h3>
								<h4><?php the_field('columnist_occupation', $page_name_id); ?></h4>
								<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							</div>
							<div class="clearLmin"> </div>
						</div>
						<?php } ?>
					<?php endwhile; ?>
					<?php wp_reset_query(); ?>
						
						
				</div><?php /*  ---------end thesecolumns ---------- */ ?>
				
				<div id="tisements">
					<?php
						$annad = 140;
						$getads = get_post($annad);						
						$getads = $getads->post_content;
						$getads = apply_filters('the_content', $getads);
						$getads = str_replace(']]>', ']]>', $getads);
						echo $getads;
					?>
				</div>
			</div><?php /*  ---------end colright ---------- */ ?>
			
			<div class="clear"> </div>
		</div><!-- #primary -->
		
		
<?php } else { //normal Toledo page --------------------------------------------------------------- ?>


		<div id="primary">
			
			<div id="featuredstories">
			<h1>Christmas and Easter Cards</h1>
			<?php if ( have_posts() ) : ?>
				<?php //twentyeleven_content_nav( 'nav-above' ); ?>
				<?php 
				$themonth = get_field('toledo_current_month', '5');
				$theyear = get_field('toledo_current_year', '5');
				if ($themonth == 'January') { $themonthnum = 1; }
				if ($themonth == 'February') { $themonthnum = 2; }
				if ($themonth == 'March') { $themonthnum = 3; }
				if ($themonth == 'April') { $themonthnum = 4; }
				if ($themonth == 'May') { $themonthnum = 5; }
				if ($themonth == 'June') { $themonthnum = 6; }
				if ($themonth == 'July') { $themonthnum = 7; }
				if ($themonth == 'August') { $themonthnum = 8; }
				if ($themonth == 'September') { $themonthnum = 9; }
				if ($themonth == 'October') { $themonthnum = 10; }
				if ($themonth == 'November') { $themonthnum = 11; }
				if ($themonth == 'December') { $themonthnum = 12; }
				query_posts('cat=-20,2018&post_status=future,publish&posts_per_page=99'); ?>
				<?php while ( have_posts() ) : the_post(); ?>
				<?php if (get_field('location') == 'Toledo') { //only grab Toledo stuff! ?>
					<div class="featuredentry">
						<div class="featuredimg">
							<img rel="image_src" src="<?php the_field('image_for_homepage'); ?>" alt="<?php the_field('name_and_company'); ?>" width="140" height="140" />
						</div>
                        
                        <div class="featuredarticle">
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<h3><?php the_field('name_and_company'); ?></h3>
							<h4><?php the_field('author'); ?></h4>
                            <div class="addthisbox1"><!-- AddThis Button BEGIN -->
                                <div class="addthis_toolbox addthis_default_style">
                                <a class="addthis_button_preferred_1"></a>
                                <a class="addthis_button_preferred_2"></a>
                                <a class="addthis_button_preferred_3"></a>
                                <a class="addthis_button_preferred_4"></a>
                                <a class="addthis_button_compact"></a>
                                <a class="addthis_counter addthis_bubble_style"></a>
                            </div>
                    <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=neongoldfish"></script>
                    <!-- AddThis Button END -->
                    </div>
							<?php the_excerpt(); ?>
							<div class="clear"></div>
							<span class="leavecomment"><a href="<?php the_permalink(); ?>">Read More</a> | <a href="<?php the_permalink(); ?>#respond">Leave a Comment</a>
                            </span>
						</div>
                        
						<div class="clearL"> </div>
					</div>
				<?php } ?>
				<?php endwhile; ?>

				<?php // twentyeleven_content_nav( 'nav-below' ); ?>

			<?php else : ?>
				<article id="post-0" class="post no-results not-found">
					<div class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'twentyeleven' ); ?></h1>
					</div><!-- .entry-header -->
					<div class="entry-content">
						<p><?php _e( 'No results. Try a search at the top of the page.', 'twentyeleven' ); ?></p>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->
			<?php endif;
			wp_reset_query(); 
			?>
				
			</div><?php /* ------------- end featured stories -------------- */ ?>
			
			<div id="colright">
				
				<a href="/speakers-bureau"><img src="<?php Print get_template_directory_uri() ?>/images/speakers-bureau.jpg" /></a>
				<?php
				/*
				<div id="advertisements_rotator_container">
					<div id="advertisements_rotator">
						<div class="placeholder">ADVERTISEMENT</div>
						<div class="slides">
							<?php
								if ($A = mysql_query(" SELECT * FROM `advertisement` WHERE `active` AND (`category` LIKE 'ALL' OR `category` LIKE 'TOLEDO') ORDER BY RAND() ")) {
									while ($a = mysql_fetch_assoc($A)) {
										Print sprintf('<a class="slide" href="%s" target="_blank"><img src="'.get_template_directory_uri().'/abecads/uploads/%s" /></a>', (trim($a['url']) ? ((strpos(trim($a['url']),'://') === false ? 'http://' : '').trim($a['url'])) : '#'), $a['image']);
									}
								}
							?>
						</div>
						<span class="control previous">&lt;</span>
						<span class="control next">&gt;</span>
						<div class="clear"></div>
					</div>
				</div>
				
				<script type="text/javascript" src="<?php Print get_template_directory_uri(); ?>/abecads/rotator.js"></script>
				*/
				?>
				<?php include 'inc/sidebar-video-toledo.php'; ?>
				
				<div id="thesecolumns">
					<div class="redhead">Columns<a href="<?php echo get_permalink(680); ?>">View Archives</a></div>
					
					<?php 
					$themonth = get_field('toledo_current_month', '5');
					$theyear = get_field('toledo_current_year', '5');
					if ($themonth == 'January') { $themonthnum = 1; }
					if ($themonth == 'February') { $themonthnum = 2; }
					if ($themonth == 'March') { $themonthnum = 3; }
					if ($themonth == 'April') { $themonthnum = 4; }
					if ($themonth == 'May') { $themonthnum = 5; }
					if ($themonth == 'June') { $themonthnum = 6; }
					if ($themonth == 'July') { $themonthnum = 7; }
					if ($themonth == 'August') { $themonthnum = 8; }
					if ($themonth == 'September') { $themonthnum = 9; }
					if ($themonth == 'October') { $themonthnum = 10; }
					if ($themonth == 'November') { $themonthnum = 11; }
					if ($themonth == 'December') { $themonthnum = 12; }
					query_posts('post_status=future,publish&posts_per_page=99&category_name=christmas-and-easter-cards&meta_key=theorder&orderby=meta_value_num&order=ASC&year='.$theyear.'&monthnum='.$themonthnum); ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php if (get_field('location') == 'Toledo') { //only grab Toledo stuff! ?>
						<div class="acolumn">
							<div class="acolumnimage">
								<?php
									$thename = get_field('columnist_name');
									global $wpdb;
									$page = get_page_by_title( $thename );
									$page_name_id = $page->ID;
								?>
								
								<img src="<?php the_field('columnist_imageS', $page_name_id); ?>" alt="<?php the_field('columnist_name', $page_name_id); ?>" width="80" height="70" />
							</div>
							<div class="acolumndetail">
								<?php
									$parent_category_id = 5;
									/*$post_categories = wp_get_post_categories( $post->ID );
									$cats = '';
									foreach($post_categories as $c){
										$cat = get_category($c);
										if ($cat->category_parent = $parent_category_id){
											$cats = $cat->slug;
										}
									}*/
								?>
								<h3><a href="http://www.abecssbr.com/columnists/<?php //echo $cats;
								$theirname = get_field('columnist_name');
								$theirname = str_replace(" ", "-", $theirname);
								$theirname = str_replace(".", "", $theirname);
								$theirname = strtolower($theirname);
								echo $theirname; ?>"><?php the_field('columnist_name'); ?></a></h3>
								<h4><?php the_field('columnist_occupation', $page_name_id); ?></h4>
								<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							</div>
							<div class="clearLmin"> </div>
						</div>
						<?php } ?>
					<?php endwhile; ?>
					<?php wp_reset_query(); ?>
						
						
				</div><?php /*  ---------end thesecolumns ---------- */ ?>
				
				<div id="tisements">
					<?php
						$annad = 140;
						$getads = get_post($annad);						
						$getads = $getads->post_content;
						$getads = apply_filters('the_content', $getads);
						$getads = str_replace(']]>', ']]>', $getads);
						echo $getads;
					?>
				</div>
			</div><?php /*  ---------end colright ---------- */ ?>
			
			<div class="clear"> </div>
		</div><!-- #primary -->
<?php } ?>
<?php get_footer(); ?>