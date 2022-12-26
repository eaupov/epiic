<section class="hero">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="hero__left">
					<h1><?php the_field('h1') ?></h1>
					<div class="hero__left-text fz14"><?php the_field('se') ?></div>
					<div class="mobile-color"><strong><?php the_field('third_title') ?></strong>
						<a class="typeform-share button mobile-visible" data-mode="popup" href="https://form.typeform.com/to/anUETWTV"><?php if(get_the_ID()==1034){ ?>Tell Us about Your Project<?php }else{?>Request a Free Consultation<?php };?></a>
					</div>
					<div class="hero__left-button">
						<a class="typeform-share button" href="https://form.typeform.com/to/anUETWTV?typeform-medium=embed-snippet" data-mode="popup" data-size="50" target="_blank"><?php if(get_the_ID()==1034){ ?>Tell Us about Your Project<?php }else{?>Request a Free Consultation<?php };?> </a> <script> setTimeout(function(){(function() { var qs,js,q,s,d=document, gi=d.getElementById, ce=d.createElement, gt=d.getElementsByTagName, id="typef_orm_share", b="https://embed.typeform.com/"; if(!gi.call(d,id)){ js=ce.call(d,"script"); js.id=id; js.src=b+"embed.js"; q=gt.call(d,"script")[0]; q.parentNode.insertBefore(js,q) } })() },4000); </script>
						
					</div>
				</div>
			</div>
			<div class="col-md-6 mt70">
				<div class="hero__right">
					<?php if(get_the_ID()==413){ ?>
					<picture>
						<source type="image/webp" srcset="/wp-content/themes/LastingTrend/images/macbook1.webp">
						<source type="image/jpeg" srcset="/wp-content/themes/LastingTrend/images/macbook1.png">
						<img class="img-fluid" src="/wp-content/themes/LastingTrend/images/macbook1.png" alt="macbook" loading="lazy">
					</picture>
					<?php }else{?>
					<picture>
						<source type="image/webp" srcset="/wp-content/themes/LastingTrend/images/person.webp">
						<source type="image/jpeg" srcset="/wp-content/themes/LastingTrend/images/person.png">
						<img class="img-fluid" src="/wp-content/themes/LastingTrend/images/person.png" alt="person" loading="lazy">
					</picture>
					<div class="hero__right-card">
						<div class="hero__right-position"><?php the_field('position') ?></div>
						<div class="hero__right-name"><?php the_field('name') ?></div>
						<div><?php the_field('blockqoute') ?></div>
					</div>
					<?php };?>
				</div>
			</div>
		</div>
	</div>
</section>