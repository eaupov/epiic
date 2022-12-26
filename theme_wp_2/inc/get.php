<section class="section section-protip">
	<div class="h4"><?php the_field('block_title') ?></div>
	<div class="protip">
	   <div class="row">
            <?php
            // Check rows exists.
                    if( have_rows('results') ):
                        // Loop through rows.
                        while( have_rows('results') ) : the_row();
                            // Load sub field value.
                            $question = get_sub_field('title');
                            $answer = get_sub_field('description');
                            // Do something...
                                echo '<div class="protip-container col-lg-3 col-md-6">
                                       <div class="quote">
                                           <div class="h3">'.$question.'</div>
                                           <div>'.$answer.'</div>
                                       </div> 
                                    </div>';
                        // End loop.
                        endwhile;
                    endif;
            ?>
	   </div>
	</div>
</section>