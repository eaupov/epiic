<section class="section section-gray counter-index">
		<div class="container">
			<div class="counter-index__card card-white">
				<div class="row">

                    <?php
                    // Check rows exists.
                    if( have_rows('count') ):
                        // Loop through rows.
                        while( have_rows('count') ) : the_row();
                        $cc++;
                            // Load sub field value.
                            $title = get_sub_field('title');
                            $description = get_sub_field('description');
                            // Do something...
                            echo '<div class="col-md-4">
                                    <div class="counter-index__head">'.$title.'</div>
                                    <div class="counter-index__text">'.$description.'</div>
                                </div>';
                        // End loop.
                        endwhile;
                    endif;
                    ?>

				</div>
			</div>
		</div>
	</section>