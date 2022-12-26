<section class="section perform">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="text-center">
						<h2><?php the_field('titile') ?></h2>
					</div>
				</div>
			</div>
			<div class="row">

            <?php
                            // Check rows exists.
                            if( have_rows('performance') ):
                                // Loop through rows.
                                while( have_rows('performance') ) : the_row();
                                    // Load sub field value.
                                    $title = get_sub_field('title');
                                 // Do something...
                                    echo '<div class="perform__card col-md-4 col-sm-6">
                                            <div class="card-border text-center">
                                                <div class="card__head checked"><i class="fas fa-check"></i></div>
                                                <div><strong>'.$title.'</strong></div>
                                            </div>
                                        </div>';
                                // End loop.
                                endwhile;
                            endif;
                    ?>

			</div>
			<div class="card-border withborder">
				<div class="row">
					<div class="col-md-6">
						<div class="content-insideBlock">
							<div class="note-text"><img src="/wp-content/themes/LastingTrend/images/givetry-note.svg" alt="givetry-note" loading="lazy"><?php the_field('bottom_left_title') ?></div>
						</div>
						<div><?php the_field('bottom_description') ?></div>
					</div>
					<div class="col-md-6 text-md-right">
						<div class="content-insideBlock">
							<strong><?php the_field('bottom_right_title') ?></strong>
						</div>
						<div>
							<img class="img-fluid" src="/wp-content/themes/LastingTrend/images/logo-right.png" alt="logo" loading="lazy">
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>