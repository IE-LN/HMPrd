<?php $before_widget ?>
<div class="bmsbw-container bmsbw-global-search-form bmsbw-thin span-gutter">
	<div class="bmsbw-inside blackmaroon widget-inside">
		<div class="bmsbw-inside-inner widget-inside-inner">
		<script type="text/javascript">
		function filterq() {
			// get our field
			var s = document.getElementById('s');
			// our field's value
			var sv = s.value;

			sv = sv.replace(/[^\w-\'"\x20 _]+/, '').trim();
			s.value = sv;
			return encodeURIComponent(sv); // handle space and other stuff
		}
		</script>

		<?php 
			$default_val = 'Search ' . get_bloginfo() . ' Photos';
			global $search_term;
			$s = (isset($search_term)) ? $search_term : get_query_var('s');
			//$pattern = '#^[a-z0-9\x20]+$#i';
			//$pattern = '#[\w\x20]+$#i';
			//$pat = '/\W/i';
			$pat = '/[^\w \'"_-]/i';
			$s = preg_replace($pat, '', $s);
			if(empty($s)) $s = $default_val;
		?>

			<form id="search-form-cb" method="POST" action="<?php home_url() ?>/search/gallery/" 
			onsubmit="this.action += filterq()" >
				<div class="search-wrapper">
					<div class="search-wrapper-border">
						<div class="search-wrapper-inner">
							<input type="image" class="floatR right search-submit" id="searchSubmit" name="searchSubmit" value="Search" src="wp-content/themes/holly/images/search-widget-btn.png" />
							<input type="text" id="s" class="inputText" name="s" value="<?php $s?>"
							onchange="filterq()" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;" />
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="bmsbw-gutter-curve gutter-curve"><div class="curve-top-left curve"></div></div>
</div>
<?php $after_widget ?>
