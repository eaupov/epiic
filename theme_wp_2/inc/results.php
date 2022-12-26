<section class="section section-gray numbers">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2><?php the_field("title") ?></h2>
			</div>
		</div>

		<div class="row">

                            <?php
                                            // Check rows exists.
                                            if( have_rows('results') ):
                                                // Loop through rows.
                                                while( have_rows('results') ) : the_row();
                                                    // Load sub field value.
                                                    $icon = get_sub_field('icon');
                                                    $title = get_sub_field('title');
                                                    $description = get_sub_field('description');
                                                    // Do something...
                                                    echo '<div class="card-white-container col-lg-4 col-sm-6 col-md-4 ">
                                                            <div class="card-white">
                                                                <div class="card__head with-icon"><img src="'.$icon.'" alt="" loading="lazy">
                                                                <div class="h3">'.$title.'</div></div>
                                                                <div>'.$description.'</div>
                                                            </div>
                                                        </div>';
                                                // End loop.
                                                endwhile;
                                            endif;
                                ?>

		</div>
	</div>
</section>