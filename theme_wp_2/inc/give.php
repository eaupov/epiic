<section class="section givetry<?php if(get_the_ID()==413){echo ' portfolio_form';}?>">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="card-white givetry__card">
						<div class="content-insideSmall"><?php the_field('first_left_description') ?></div>
						<div class="content-insideBlock"><strong><?php the_field('second_left_description') ?></strong></div>
						<div>
							<a class="button blue nav-link typeform-share" data-mode="popup" data-size="50" href="https://form.typeform.com/to/anUETWTV?typeform-medium=embed-snippet"><?php the_field('button') ?></a>
						</div>
					</div>
				</div>
				<div class="col-md-4 full100">
					<div class="card-white">
						<div class="content-insideBlock">
							<div class="note-text"><img src="/wp-content/themes/LastingTrend/images/givetry-note.svg" alt="note-text" loading="lazy"><?php the_field('right_title') ?></div>
						</div>
						<div class="givetry__founder content-insideBlock20">
							<div class="givetry__founder-img"><img src="/wp-content/themes/LastingTrend/images/founder.png" alt="" loading="lazy"></div>
							<div class="givetry__founder-container">
								<div><strong><?php the_field('name') ?></strong></div>
								<div class=" fz14"><?php the_field('position') ?></div>
							</div>
						</div>
						<div class="givetry-right"><?php the_field('blockquote') ?></div>
					</div>
				</div>
			</div>
		</div>
</section>