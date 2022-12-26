<section class="trends section section-gray">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="text-lg-center">
						<div class="h2"><?php the_field('title_block') ?></div>
						<div class="section__head w780"><?php the_field('description') ?></div>
					</div>
					<div class="section sertif-index">
							<div class="row m80">
								<div class="col-md-6 d-flex justify-content-center" style="margin-bottom: 40px; align-items: center;">
									<div class="text-center" style="height: 160px;">
										<img class="img-fluid" src="https://res.cloudinary.com/expertise-com/image/upload/f_auto,fl_lossy,q_auto/w_auto/remote_media/awards/ny_nyc_law-firm-marketing_2022_transparent.svg" alt="expertise badge" loading="lazy" style="width: 200px; height: 160px; margin-right: 0 !important;">
									</div>
								</div>
								<div class="col-md-6 d-flex justify-content-center" style="margin-bottom: 40px;">
									<div class="text-center">
										<img class="img-fluid" src="/wp-content/uploads/2022/05/lt-badge.png" alt="clutch badge" loading="lazy" style="width: 200px; margin-right: 0 !important;">
									</div>
								</div>
                            <?php
                                            // Check rows exists.
                                            if( have_rows('certificate') ):
                                                // Loop through rows.
                                                while( have_rows('certificate') ) : the_row();
                                                    // Load sub field value.
                                                    $title = get_sub_field('title');
                                                    $description = get_sub_field('description');
                                                    // Do something...
                                                    echo '<div class="col-md-12 d-flex justify-content-center">
                                                            <div class="sertif-index__container text-center">
                                                                <div class="h3">'.$title.'</div>
                                                                <div>'.$description.'</div>
                                                            </div>
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
</section>