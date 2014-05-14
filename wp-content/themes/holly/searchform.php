		<script type="text/javascript">
		function filterq() {
			// get our field
			var s = document.getElementById('s');
			// our field's value
			var sv = s.value;

			sv = sv.replace(/[^\w-',"\x20 _]+/, '').trim();
			s.value = sv;
			return encodeURIComponent(sv); // handle space and other stuff
		}
		</script>
	<form id="search-form-cb" method="POST" action="<?php echo home_url() ?>/search/" onsubmit="this.action += filterq()" >
		<div class="search-wrapper">
			<div class="search-wrapper-border">
				<div class="search-wrapper-inner">
					<?php $default_val = 'Search ' . get_bloginfo(); 

					$s = get_query_var('s');
					if(empty($s)) $s = $default_val;
					?>
					<input type="image" class="floatR right search-submit" id="searchSubmit" name="searchSubmit" value="Search" src="wp-content/themes/holly/images/search-widget-btn.png" />
					<input type="text" id="s" class="inputText" name="s" value="<?php echo $s?>" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;" />
				</div>
			</div>
		</div>
	</form>