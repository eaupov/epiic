<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="google-site-verification" content="yN6FQXm_iLpE7__-u9UwkOkbA4-7i35cIAqTkzpgQZU" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?php wp_title(); ?></title>
	<link rel="icon" href="/wp-content/themes/LastingTrend/images/mobile_logo.png">
	<meta name="google-site-verification" content="fxePWid1xQHn78ld1xRzTh0JdKEyxAxTzOSRvndmZYA" />
	<!-- Facebook Pixel Meta Tag-->
	<meta name="facebook-domain-verification" content="uotuzdtmem9kvspdyf4brtvu7icja7" />
<?php wp_head(); ?>
<script src="https://lastingtrend.activehosted.com/f/embed.php?id=1" type="text/javascript" charset="utf-8"></script>
<!-- Facebook Pixel Code --> 
<script> 
!function(f,b,e,v,n,t,s) 
{if(f.fbq)return;n=f.fbq=function(){n.callMethod? 
n.callMethod.apply(n,arguments):n.queue.push(arguments)}; 
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0'; 
n.queue=[];t=b.createElement(e);t.async=!0; 
t.src=v;s=b.getElementsByTagName(e)[0]; 
s.parentNode.insertBefore(t,s)}(window, document,'script', 
'https://connect.facebook.net/en_US/fbevents.js'); 
fbq('init', '1886094694953860'); 
fbq('track', 'PageView'); 
</script> 
<noscript><img height="1" width="1" style="display:none" 
src="https://www.facebook.com/tr?id=1886094694953860&ev=PageView&noscript=1" 
/></noscript> 
<!-- End Facebook Pixel Code -->

</head>
<body>
	<header class="header<?php if(is_front_page() || get_the_ID()==413){echo ' header-index black-header';}else{echo ' black-header';}?>">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="header__container">
						<a href="/" class="logo"><img src="/wp-content/themes/LastingTrend/images/logo.png" alt="Lasting Trend" loading="lazy" width="191" height="47"></a>
						<a href="/" class="mobile-visible vis-logo"><img src="/wp-content/themes/LastingTrend/images/mobile_logo.png" alt="Lasting Trend" loading="lazy" width="35" height="35"></a>
						<a href="tel:212-506-0776" class="mobile-visible mobile_phone"><svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M11.8772 9.58803L10.0009 7.7115C9.62719 7.33928 9.00829 7.35059 8.62154 7.73747L7.67625 8.68256C7.61652 8.64964 7.55471 8.61526 7.48972 8.57879C6.89277 8.24803 6.07575 7.79468 5.216 6.93431C4.35371 6.07212 3.89995 5.25384 3.56817 4.65651C3.53316 4.59323 3.49962 4.53222 3.4665 4.47428L4.10093 3.84078L4.41284 3.52849C4.80018 3.14104 4.81086 2.52232 4.43801 2.14901L2.56169 0.272273C2.18883 -0.100512 1.56965 -0.0892029 1.18231 0.298243L0.653503 0.83009L0.667954 0.844436C0.490637 1.07069 0.342465 1.33164 0.2322 1.61304C0.130557 1.8809 0.067274 2.13651 0.0383378 2.39265C-0.209418 4.4466 0.729177 6.32375 3.2764 8.87101C6.79744 12.3918 9.63494 12.1258 9.75735 12.1128C10.024 12.081 10.2795 12.0173 10.5391 11.9164C10.8181 11.8075 11.0789 11.6595 11.305 11.4826L11.3165 11.4928L11.8522 10.9682C12.2388 10.5809 12.2499 9.96193 11.8772 9.58803Z" fill="black"/></svg>212-506-0776</a>
						<div class="humb"></div>
						<?php if(!wp_is_mobile()): ?>
							<nav class="menu">
								<?php wp_nav_menu(array('menu' => 'main-menu', 'theme_location' => 'main-menu', 'container' => false, 'items_wrap' => '<ul id="%1$s">%3$s</ul>')); ?>
							</nav>
						<?php endif; ?>

						<div class="header__phone">
							<a class="header__phone-num" href="tel:212-506-0776">212-506-0776</a>
							<a class="free-seo" href="tel:212-506-0776">FREE SEO AUDIT</a>
						</div>

						<?php if(wp_is_mobile()): ?>
							<div class="header__container-mobile">
								<nav class="menu">
									<?php wp_nav_menu(array('menu' => 'main-menu', 'theme_location' => 'main-menu', 'container' => false, 'items_wrap' => '<ul id="%1$s">%3$s</ul>')); ?>
								</nav>
								<div class="header__contacts">
									<div>
										<a class="typeform-share button" href="https://form.typeform.com/to/anUETWTV" data-mode="popup">Request a Consultation</a> <script> setTimeout(function(){(function() { var qs,js,q,s,d=document, gi=d.getElementById, ce=d.createElement, gt=d.getElementsByTagName, id="typef_orm_share", b="https://embed.typeform.com/"; if(!gi.call(d,id)){ js=ce.call(d,"script"); js.id=id; js.src=b+"embed.js"; q=gt.call(d,"script")[0]; q.parentNode.insertBefore(js,q) } })()},4000); </script>
									</div>
									<?php echo do_shortcode('[show_contact id="head_mob"]'); ?>
								</div>
							</div>
						<?php endif; ?>



					</div>
				</div>
			</div>
		</div>
	</header>
