<section class="section section-gray best-bet">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="text-lg-center">
						<h2 class="text-white"><?php the_field('title') ?></h2>
					</div>
				</div>
			</div>
			<div class="row">
            <?php
                // Check rows exists.
                if( have_rows('blocks') ):
                    // Loop through rows.
                    while( have_rows('blocks') ) : the_row();
                    $cc++;
                        // Load sub field value.
                        $title = get_sub_field('title');
                        $description = get_sub_field('description');
                        // Do something...
                        if($cc < 3) {
                            echo '<div class="card-white-container col-lg-4 col-sm-6">
                                <div class="card-white">
                                    <div class="card__head text-lg-center"><div class="h3">'.$title.'</div></div>
                                    <div>'.$description.'</div>
                                </div>
                            </div>';
                        } else {
                            echo '<div class="card-white-container col-lg-4 col-sm-12">
                                <div class="card-white">
                                    <div class="card__head text-lg-center"><div class="h3">'.$title.'</div></div>
                                    <div>'.$description.'</div>
                                </div>
                            </div>';
                        }
                    // End loop.
                    endwhile;
                endif;
                ?>
			</div>
		</div>
</section>