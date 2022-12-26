<div class="website-audit">
     <div class="row wpreims">

    <?php
                                // Check rows exists.
                                if( have_rows('preims') ):
                                    // Loop through rows.
                                    while( have_rows('preims') ) : the_row();
                                        // Load sub field value.
                                        $question = get_sub_field('image');
                                        $answer = get_sub_field('title');
                                        // Do something...
                                        echo '<div class="col-md-4 col-sm-12 wpreim">
                                                <img src="'.$question.'" alt="" loading="lazy">
                                                <div><strong>'.$answer.'</strong></div>
                                            </div>';
                                    // End loop.
                                    endwhile;
                                endif;
    ?>

    </div>   
</div>
