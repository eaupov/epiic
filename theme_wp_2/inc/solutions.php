<section class="section section-gray solution">
		<div class="container">
			<div class="text-center">
				<h2><?php the_field('block_title') ?></h2>
			</div>
		</div>

			<div class="owl-carousel solution-carousel">


            <?php
                            // Check rows exists.
                            if( have_rows('solutions') ):
                                // Loop through rows.
                                while( have_rows('solutions') ) : the_row();
                                    // Load sub field value.
                                    $icon = get_sub_field('icon');
                                    $subtitle = get_sub_field('subtitle');
                                    $title = get_sub_field('title');
                                    $content = get_sub_field('content');
                                    $result = get_sub_field('result');
                                    // Do something...
                                    echo '<div class="card-white">
                                            <div class="card__head with-icon">
                                                <div class="card__head-icon"><img src="'.$icon.'" alt="" loading="lazy"></div>
                                                <div>
                                                    <div class="gray-text">'.$subtitle.'</div>
                                                    <div class="h3">'.$title.'</div>
                                                </div>
                                            </div>
                                            <div class="content-insideBlock">'.$content.'</div>
                                            <div class="h4">The Results</div>
                                            <div>'.$result.'</div>
                                        </div>';
                                // End loop.
                                endwhile;
                            endif;
                    ?>

			</div>
			<p class="slider_button solution_nums">01 / 08</p>
    </section>
    

    <section class="section givetry givetry__second">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="content-insideBlock text-white">Expand Your Small Business with a Customized and<br> Profitable Digital Marketing Strategy</div>
					<div><a class="button nav-link typeform-share" data-mode="popup" data-size="50" href="https://form.typeform.com/to/anUETWTV?typeform-medium=embed-snippet" style="font-weight:400;">Give Lasting Trend a Try</a></div>
				</div>
			</div>
		</div>
	</section>