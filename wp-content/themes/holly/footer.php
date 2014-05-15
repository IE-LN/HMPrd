					<?php global $is_special_page; ?>
					<?php if ($is_special_page): ?>
							</div>
							<?php get_sidebar(); ?>
						</div>
					<?php endif; ?>
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
				<footer class="page-footer" id="bottom-branding" role="contentinfo">
					<a href="/terms/">Terms and Conditions</a> /
				</footer>
                <script>
				  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
				  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
				  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
				  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
				
				  ga('create', 'UA-47843901-6', 'hollymadison.com');
				  ga('send', 'pageview');
				
				</script>
				<?php /*
				<div id="footer">
					<div id="comscore_container">
						<div id="comscore_header_text">
							<span class="bold"> Holly Madison</span>, part of Celebuzz, is a member of Spin Entertainment, a division of SpinMedia<br><span id="comscore_header_links">
								<a onclick="javascript:window.open('http://www.spinmedia.com/#audience'); return false;" href="http://www.spinmedia.com/#audience" rel="nofollow">About <span class="bold">SpinMedia</span></a> | 
								<a onclick="javascript:window.open('http://www.spinmedia.com/#audience'); return false;" href="http://www.spinmedia.com/#audience" rel="nofollow">Advertise</a> | 
								<a onclick="javascript:window.open('http://www.spinmedia.com/#locations'); return false;" href="http://www.spinmedia.com/#locations" rel="nofollow">Contact</a> | 
								<a onclick="javascript:window.open('http://www.spinmedia.com/privacy-policy/'); return false;" href="http://www.spinmedia.com/privacy-policy/" rel="nofollow">Privacy Policy</a> | 
								<a onclick="javascript:window.open('http://www.spinmedia.com/advertise/about-our-ads/'); return false;" href="http://www.spinmedia.com/advertise/about-our-ads/" rel="nofollow" class="cs_aboutBug"><img src="http://cdn.buzznet.com/assets/pages/p3/footer/collisionadmarkerwht.png" alt="adChoices" style="margin-bottom: -3px; width: 77px; height: 15px;" height="15" width="77"></a> | 
								<a onclick="javascript:window.open('http://spinmedia.com/copyright/'); return false;" href="http://spinmedia.com/copyright/" rel="nofollow">Copyright</a>
							</span>
						</div>
						<div id="comscore_body_text">
							<div>
								<span class="bold">
									SpinMedia <span class="bold">Publishers</span>: 

									<?php
									$comscore_menu = array(
										'menu'			=> 'ITS_Links',
										'container'		=> false,
										'menu_id'		=> 'comscore_site_list',
										'echo'			=> true,
										'fallback_cb'	=> 'wp_page_menu',
										'after'			=> ' | ',
										'items_wrap'	=> '%3$s',
										'depth'			=> 0
									);
									wp_nav_menu($comscore_menu);
									?>

									<a onclick="javascript:window.open('http://www.spinmedia.com/properties/'); return false;" href="http://www.spinmedia.com/properties/" rel="nofollow">More...</a>

								</span>
							</div>
						</div>
					</div>
				</div>
				*/?>
			</div>
		</div>
		<?php wp_footer(); ?>
	</body>
</html>
