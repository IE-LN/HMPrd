<?php
global $use_sidebar;
// preserve post and query for after sidbar is run
if (is_object($GLOBALS['wp_query']))
	$old_query = clone $GLOBALS['wp_query'];
if (is_object($GLOBALS['post']))
	$old_post = clone $GLOBALS['post'];

if (empty($use_sidebar)) {
	switch (true) {
		case is_singular(array('post', 'video-post')):
			$use_sidebar = 'single-post-page-sidebar';
		break;

		case is_tag():
		case is_search():
			$use_sidebar = 'tag-search-pages-sidebar';
		break;


		case is_home():
		case is_archive():
		case is_category():
		case isset($cat):
			$use_sidebar = 'home-archive-category-sidebar';
		break;

		default:
			$use_sidebar = apply_filters('its-determine-page-sidebar', 'generic-sidebar');
		break;
	}
}
?>
<?php if($use_sidebar!='none') { ?>
<div id="sidebar-column" role="complementary">
	<div id="sidebar" class="widget-area">
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
						<input type="image" class="floatR right search-submit" id="searchSubmit" name="searchSubmit" value="Search" src="<?php echo home_url();?>/wp-content/themes/holly/images/search-widget-btn.png" />
						<input type="text" id="s" class="inputText" name="s" value="<?php echo $s?>" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;" />
					</div>
				</div>
			</div>
		</form>
        <div class="bmsbw-container bmsbw-followCb bmsbw-followICE">
 <div class="bmsbw-inside blackmaroon">
  <table>
   <tbody>
    <tr>
     <td class="follow-label">
      <div class="follow-me-before"><a target="_blank" href="http://www.facebook.com/hollymadison/">FOLLOW HOLLY</a></div>
     </td>
     <td class="follow-spacer">&nbsp;</td>
     <td class="follow-buttons ">
      <ul>
       <li class="bmsbw-follow-fb"><a target="_blank" href="http://www.facebook.com/hollymadison/"></a></li>
       <li class="bmsbw-follow-tw"><a target="_blank" href="https://twitter.com/hollymadison"></a></li>
       <li class="bmsbw-follow-rss"><a target="_blank" href="http://www.hollymadison.com/feed/"></a></li>
             </ul>
     </td>
    </tr>
   </tbody>
  </table>
 </div>
</div>

        	<div class="cleaner"></div>         
        <div class="widget widget_text">       
            <h3 class="widget-title">RECENT VIDEOS</h3>
            <ul>
            <?php
                $args = array( 'numberposts' => '9', 'category' => 282 );
                $recent_posts = wp_get_recent_posts( $args );
                foreach( $recent_posts as $recent ){
                    if ( has_post_thumbnail($recent["ID"])) {
                        echo '<li><a href="'.get_permalink($recent["ID"]).'">' . get_the_post_thumbnail($recent["ID"], array(94,94)) . '</a><a href="'.get_permalink($recent["ID"]).'">'.$recent["post_title"].'</a></li>';
                    }
                }
            ?>
            </ul>
        </div>
        
        <div id="text-3" class="widget widget_text">			
        	<div class="textwidget">
                <div class="cleaner"></div>
                <a class="twitter-timeline" href="https://twitter.com/hollymadison" data-widget-id="402433993414430720">Твиты пользователя @hollymadison</a>
                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");		       		    </script>
            </div>
        </div>
        
        <div id="text-6" class="widget widget_text">
          <h3 class="widget-title">FACEBOOK</h3>			
          <div class="textwidget">
            <div id="fb-root"></div>
            <script>(function(d, s, id) {
              var js, fjs = d.getElementsByTagName(s)[0];
              if (d.getElementById(id)) return;
              js = d.createElement(s); js.id = id;
              js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
              fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
          
            <div class="fb-like-box" data-href="https://www.facebook.com/hollymadison" data-width="300" data-height="300" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="true"></div>
          </div>
      	</div>
        
        
        <?php if (!dynamic_sidebar($use_sidebar)): ?>
			<?php if (!dynamic_sidebar('generic-sidebar')): ?>
				<aside id="archives" class="widget">
					<h3 class="widget-title">Archives</h3>
					<ul>
						<?php wp_get_archives(array('type' => 'monthly')); ?>
					</ul>
				</aside>

				<aside id="meta" class="widget">
					<h3 class="widget-title">Meta</h3>
					<ul>
						<?php wp_register(); ?>
						<li><?php wp_loginout(); ?></li>
						<?php wp_meta(); ?>
					</ul>
				</aside>
			<?php endif; ?>
		<?php endif; ?>
        
	</div>
</div>
<?php } ?>
<?php
// restore post and query from before sidebar
if (is_object($old_query))
	$GLOBALS['wp_query'] = $old_query;
if (is_object($old_post))
	$GLOBALS['post'] = $old_post;
?>
