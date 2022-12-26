<div class="card-white">
    <div class="row">
        <div class="col-md-6">
            <img class="img-fluid" src="<?php the_field('photo') ?>" alt="tim" loading="lazy">
        </div>
        <div class="col-md-6">
            <div class="content-insideBlock">
                <?php the_field('first_title') ?>
            </div>
            <div class="content-insideBlock">
                <ul class="social">
                    <?php $t1=get_field('facebook_link'); if(isset($t1) && $t1!=''){ ?><li><a href="<?php the_field('facebook_link') ?>"><i class="fab fa-facebook-f"></i></a></li><?php };?>
                    <?php $t2=get_field('twitter_link'); if(isset($t2) && $t2!=''){ ?><li><a href="<?php the_field('twitter_link') ?>"><i class="fab fa-twitter"></i></a></li><?php };?>
                    <?php $t3=get_field('linkedin_link'); if(isset($t3) && $t3!=''){ ?><li><a href="<?php the_field('linkedin_link') ?>"><i class="fab fa-linkedin-in"></i></a></li><?php };?>
                    <?php $t4=get_field('instagram_link'); if(isset($t4) && $t4!=''){ ?><li><a href="<?php the_field('instagram_link') ?>"><i class="fab fa-instagram"></i></a></li><?php };?>
                </ul>
            </div>
        </div>
    </div>
</div>