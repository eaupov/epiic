<section class="section section-gray about-index">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<h2><?php the_field('title_block') ?></h2>
					<div class="about-index__left"><img class="img-fluid" src="/wp-content/themes/LastingTrend/images/about-index.webp" alt="" loading="lazy"></div>
				</div>
				<div class="col-md-8">
                    <?php the_field('description') ?>
					<div class="content-wrapper">
						<div class="card-white">
							<div class="content-insideSmall"><?php the_field('blockquote') ?></div>
							<div><strong><?php the_field('name') ?></strong></div>
							<div class="fz14"><?php the_field('position') ?></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>