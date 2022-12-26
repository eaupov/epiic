<section class="section section-gray faq-index">
		<div class="container">
			<div class="text-center">
				<h2><?php the_field('title') ?></h2>
			</div>
			<div class="content-insideBlock">
				<div class="row">
					<div class="col-12">
                    <?php
                            // Check rows exists.
                            if( have_rows('faq') ):
                                // Loop through rows.
                                while( have_rows('faq') ) : the_row();
                                    // Load sub field value.
                                    $question = get_sub_field('question');
                                    $answer = get_sub_field('answer');
                                    // Do something...
                                    echo '<div class="faq-index__container">
                                            <div class="faq-index__container-head">'.$question.'</div>
                                            <div class="faq-index__container-content">'.$answer.'</div>
                                        </div>';
                                // End loop.
                                endwhile;
                            endif;
                    ?>
					</div>
				</div>
			</div>
			<!--<div class="fz18 text-center">Want to know more? <a href="#" class="link-blue">Ask away</a></div>-->
		</div>
</section>