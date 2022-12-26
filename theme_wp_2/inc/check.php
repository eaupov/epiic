<div class="row">

<?php
                            // Check rows exists.
                            if( have_rows('check') ):
                                // Loop through rows.
                                while( have_rows('check') ) : the_row();
                                    // Load sub field value.
                                    $description = get_sub_field('description');

                                    echo '
                                    <div class="perform__card col-md-3 col-sm-6">
                                        <div class="card-border text-center">
                                            <div class="card__head checked"><i class="fas fa-check"></i></div>
                                            <div><strong>'.$description.'</strong></div>
                                        </div>
                                    </div>';
                                // End loop.
                                endwhile;
                            endif;
 
 
 ?>

</div>