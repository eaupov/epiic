<section class="section section-gray services">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="section-sub text-center">
						<h2><?php the_field('subtitle_block') ?></h2>
						<div class="text-center"><?php the_field('title_block') ?></div>
					</div>
				</div>
			</div>
			<div class="row">

                <?php
                            // Check rows exists.
                            if( have_rows('services') ):
                                // Loop through rows.
                                while( have_rows('services') ) : the_row();
                                    // Load sub field value.
                                    $svg_code = get_sub_field('svg_code');
                                    $title = get_sub_field('title');
                                    $subtitle = get_sub_field('subtitle');
                                    $description = get_sub_field('description');
                                    $photo = get_sub_field('photo');
                                    $name = get_sub_field('name');
                                    $position = get_sub_field('position');
                                    $blockquote = get_sub_field('blockquote');
                                    // Do something...
                                    echo '<div class="col-lg-4 col-sm-6">
                                            <div class="services__card card-white">
                                                <div class="card__head with-icon">'.$svg_code.'<div class="h3">'.$title.'</div></div>
                                                <div class="card__head-sub">'.$subtitle.'</div>
                                                <div>'.$description.'</div>
                                            </div>
                                            <div class="services__review">
                                                <div class="givetry__founder content-insideBlock20">
                                                    <div class="givetry__founder-img"><img src="'.$photo.'" alt="emil" loading="lazy"></div>
                                                    <div class="givetry__founder-container">
                                                        <div><strong>'.$name.'</strong></div>
                                                        <div class=" fz14">'.$position.'</div>
                                                    </div>
                                                </div>
                                                <div>'.$blockquote.'</div>
                                            </div>
                                        </div>';
                                // End loop.
                                endwhile;
                            endif;
                    ?>


			</div>
		</div>
	</section>