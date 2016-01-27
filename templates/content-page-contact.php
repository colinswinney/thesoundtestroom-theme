<div class="entry-content">
	<?php the_content(); ?>
</div>

<div class="container-fluid">
	<div class="row contact-support-image-row">

		<?php
			$blogusers = get_users( array('exclude' => '5', 'order' => 'DESC', 'orderby' => 'post_count' ) );

			$counter = 0;
			foreach ( $blogusers as $user ) {

				$userId = $user->ID;
				$nicename = $user->user_nicename;
				$display_name = $user->display_name;
				$email = $user->user_email;
				$birthplace = get_field_object('birthplace', 'user_'.$userId);
				$current_residence = get_field_object('current_residence', 'user_'.$userId);
				$influences = get_field_object('influences', 'user_'.$userId);
				$favorite_apps = get_field_object('favorite_apps', 'user_'.$userId);
				$most_embarrassing_childhood_memory = get_field_object('most_embarrassing_childhood_memory', 'user_'.$userId);
				$zodiac_sign = get_field_object('zodiac_sign', 'user_'.$userId);
				$favorite_tv_movie = get_field_object('favorite_tv_movie', 'user_'.$userId);
				$height = get_field_object('height', 'user_'.$userId);
				$weight = get_field_object('weight', 'user_'.$userId);
				$one_wish = get_field_object('one_wish', 'user_'.$userId);
				$beatles_vs_stones = get_field_object('beatles_vs_stones', 'user_'.$userId);
				$car = get_field_object('car', 'user_'.$userId);
				$links = get_field_object('links', 'user_'.$userId);
				$favorite_food = get_field_object('favorite_food', 'user_'.$userId);
				$least_favorite_food = get_field_object('least_favorite_food', 'user_'.$userId);
				$image = get_field('image', 'user_'.$userId);

				// change into future ul lines
				$line_birthplace = '<li><span>'.$birthplace['label'] . ':</span> ' . $birthplace['value'].'</li>';
				$line_current_residence = '<li><span>'.$current_residence['label'] . ':</span> ' . $current_residence['value'].'</li>';
				$line_influences = '<li><span>'.$influences['label'] . ':</span> ' . $influences['value'].'</li>';
				$line_favorite_apps = '<li><span>'.$favorite_apps['label'] . ':</span> ' . $favorite_apps['value'].'</li>';
				$line_most_embarrassing_childhood_memory = '<li><span>'.$most_embarrassing_childhood_memory['label'] . ':</span> ' . $most_embarrassing_childhood_memory['value'].'</li>';
				$line_zodiac_sign = '<li><span>'.$zodiac_sign['label'] . ':</span> ' . $zodiac_sign['value'].'</li>';
				$line_favorite_tv_movie = '<li><span>'.$favorite_tv_movie['label'] . ':</span> ' . $favorite_tv_movie['value'].'</li>';
				$line_height = '<li><span>'.$height['label'] . ':</span> ' . $height['value'].'</li>';
				$line_weight = '<li><span>'.$weight['label'] . ':</span> ' . $weight['value'].'</li>';
				$line_one_wish = '<li><span>'.$one_wish['label'] . ':</span> ' . $one_wish['value'].'</li>';
				$line_beatles_vs_stones = '<li><span>'.$beatles_vs_stones['label'] . ':</span> ' . $beatles_vs_stones['value'].'</li>';
				$line_car = '<li><span>'.$car['label'] . ':</span> ' . $car['value'].'</li>';
				$line_links = '<li><span>'.$links['label'] . ':</span> ' . $links['value'].'</li>';
				$line_favorite_food = '<li><span>'.$favorite_food['label'] . ':</span> ' . $favorite_food['value'].'</li>';
				$line_least_favorite_food = '<li><span>'.$least_favorite_food['label'] . ':</span> ' . $least_favorite_food['value'].'</li>';

				$lineArray = [];

				//$lineArray[] = $line_birthplace;
				//$lineArray[] = $line_current_residence;
				$lineArray[] = $line_influences;
				$lineArray[] = $line_favorite_apps;
				$lineArray[] = $line_most_embarrassing_childhood_memory;
				$lineArray[] = $line_zodiac_sign;
				$lineArray[] = $line_favorite_tv_movie;
				$lineArray[] = $line_height;
				$lineArray[] = $line_weight;
				$lineArray[] = $line_one_wish;
				$lineArray[] = $line_beatles_vs_stones;
				$lineArray[] = $line_car;
				//$lineArray[] = $line_links;
				$lineArray[] = $line_favorite_food;
				$lineArray[] = $line_least_favorite_food;

				// image object values
				$image_url = $image['url'];
				$image_title = $image['title'];
				$image_alt = $image['alt'];
				$image_caption = $image['caption'];

				// e.g. thumbnail
				$image_size = 'thumbnail';
				$image_thumb = $image['sizes'][ $image_size ];
				$image_width = $image['sizes'][ $image_size . '-width' ];
				$image_height = $image['sizes'][ $image_size . '-height' ];

				?>
				<div class="col-md-6 contact-support-half">
					<img src="<?php echo $image_url; ?>" alt="Doug Archive">
					<div class="contact-content">
						<a href="mailto:<?php echo $email; ?>"><strong><?php echo $display_name; ?></strong></a>
						<ul>
						<?php
							
							$rand_keys = array_rand($lineArray, 5);
							echo $line_birthplace;
							echo $line_current_residence;
							echo $lineArray[$rand_keys[0]] . "\n";
							echo $lineArray[$rand_keys[1]] . "\n";
							echo $lineArray[$rand_keys[2]] . "\n";
							echo $lineArray[$rand_keys[3]] . "\n";
							echo $lineArray[$rand_keys[4]] . "\n";
							echo $line_links;
							?>
							
						</ul>
					</div>
				</div>
				<?php
				

				$counter++;

				if ($counter % 2 === 0  ) { 
					?>
					<div class="clear"></div>
					<?php 
				}
			}
		?>


		<!--<div class="col-md-6 contact-support-half">
			<img src="http://thesoundtestroom.com/wp-content/uploads/2015/12/doug-250.png" alt="Doug Archive">
			<div class="contact-content">
				<a href="/author/doug/"><strong>Doug Woods</strong></a>
			</div>
		</div>
		<div class="col-md-6 contact-support-half">
			<img src="http://thesoundtestroom.com/wp-content/uploads/2015/12/jakob-250.png" alt="Jakob Archive">
			<div class="contact-content">
				<a href="/author/jakob/"><strong>Jakob Haq</strong></a>
				Jakob's Bio
			</div>
		</div>
		<div class="clear"></div>
		<div class="col-md-6 contact-support-half">
			<img src="http://thesoundtestroom.com/wp-content/uploads/2015/12/colin-250.png" alt="Colin Archive">
			<div class="contact-content">
				<a href="/author/admin/"><strong>Colin Swinney</strong></a>
				Colin's Bio
			</div>
			
		</div>
		<div class="col-md-6 contact-support-half">
			<img src="http://thesoundtestroom.com/wp-content/uploads/2015/12/jon-250.png" alt="Jon Archive">
			<div class="contact-content">
				<a href="/author/pantsofdeath/"><strong>Jon Rawlinson</strong></a>
			</div>
		</div>-->
	</div>
	<h6>*Images courtesy of Bitmoji</h6>
</div>


<?php comments_template('/templates/comments.php'); ?>