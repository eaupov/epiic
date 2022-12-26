<section class="section about-middle">
			<div class="container">
				<div class="row">
					<div class="w930 lasting">
							<div class="h2"><?php the_field('title') ?></div>
						<p><?php the_field('subtitle') ?></p>
					</div>

					<div class="col-md-12">
						<div class="text-780">
							<?php the_field('description') ?>
						</div>

						<div class="counter-index">
								<div class="counter-index__card card-white">
									<div class="row">

                                    <?php
                                            // Check rows exists.
                                            if( have_rows('counter') ):
                                                // Loop through rows.
                                                while( have_rows('counter') ) : the_row();
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


					</div>
				</div>
			</div>
</section>