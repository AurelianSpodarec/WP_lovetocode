		
	<!-- UP -->
	<button class="arrow-up">
		<i class="fa fa-chevron-up"></i>
	</button>

	<footer class="footer">
	<div class="footer__outer">

	<!-- <div class="footer__top">
		<div class="footer__top-col">
			<h3>Links</h3>
			<li><a href="">Home</a></li>
			<li><a href="">About</a></li>
			<li><a href="">Resources</a></li>
			<li><a href="">Contact</a></li>
		</div>

		<div class="footer__top-col">
			<h3>Legals</h3>
		</div>

		<div class="footer__top-col">
			<h3>Connect</h3>
			<ul>
				<li><a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
				<li><a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
				<li><a href=""><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
				<li><a href=""><i class="fa fa-youtube-square" aria-hidden="true"></i></a></li>
			</ul>
			<input placeholder="Subscribe!">
			<input type="Submit" value="Subscribe">
			<p>Proudly Hosted by <a href="">Hostgator</a></p>
		</div>
	</div> --><!-- /footer-top -->

	<div class="footer__bottom">

		<div class="footer__copyright-wrap">
		<a href="/" class="footer__logo-wrap">
			<img class="footer__logo" src="https://process.fs.teachablecdn.com/ADNupMnWyR7kCWRvm76Laz/resize=height:60/https://www.filepicker.io/api/file/q8yh1SmySmy5BNapeDem">
			<span class="footer__logo-text">Lovetocode</span>
		</a>
		<span class="footer__copyright-text">Copyright &copy; 2017 Lovetocode, Inc.</span>
		</div>

		<!-- START Footer Terms -->
			<?php 
				$args = [
					'theme_location' => 'footer-menu',
					'container' 	 => 'ul',
					'container_id'   => 'footer-bottom-menu',
					'menu_class'	 => 'footer__terms',
					'depth' 		 => 1,
					'fallback_cb' 	 => false,
				];
				wp_nav_menu( $args );
			?>
		<!-- END Footer Terms -->

	</div><!-- /footer-bottom -->

	</div>
	</footer>

	<?php wp_footer(); ?>
</body>
</html>