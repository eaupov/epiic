<div class="strategy">
     <div class="row">

    <?php
                                // Check rows exists.
                                if( have_rows('counter') ):
                                    // Loop through rows.
                                    while( have_rows('counter') ) : the_row(); $cc++;
                                        // Load sub field value.
                                        $question = get_sub_field('description');
                                        // Do something...

                                        echo '<div class="col-md-1 col-lg-1 col-sm-1">0'.$cc.'</div>
                                                <div class="col-md-11 col-lg-11 col-sm-11">
                                                <p>'.$question.'</p>
                                                </div>';
                                    // End loop.
                                    endwhile;
                                endif;
    ?>

    </div>   
</div>
