<!-- Start Social Slider Script	-->
<?php
$options = get_option('cct_social_slider_options'); 
?>
<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js'></script>
<script type="text/javascript" src="http://apis.google.com/js/plusone.js"></script>
<!--commented out top
<script type="text/javascript">jQuery(document).ready(function(){ jQuery("#facebook_top").hover(function(){ jQuery(this).stop(true,false).animate({top:  0}, 500); },function(){ jQuery("#facebook_top").stop(true,false).animate({top: -200}, 500); });    jQuery("#twitter_top").hover(function(){ jQuery(this).stop(true,false).animate({top:  0}, 500); },function(){ jQuery("#twitter_top").stop(true,false).animate({top: -250}, 500); });     jQuery("#google_plus_top").hover(function(){ jQuery(this).stop(true,false).animate({top:  0}, 500); },function(){ jQuery("#google_plus_top").stop(true,false).animate({top: -154}, 500); });    jQuery("#feedburner_top").hover(function(){ jQuery(this).stop(true,false).animate({top:  0}, 500); },function(){ jQuery("#feedburner_top").stop(true,false).animate({top: -303}, 500); });    });</script>
-->
<script type="text/javascript">jQuery(document).ready(function(){ 
  jQuery("#facebook_left").hover(function(){ 
	jQuery(this).stop(true,false).animate({left:  0}, 500); },function(){ 
	jQuery("#facebook_left").stop(true,false).animate({left: -200}, 500); });  
  
  jQuery("#linkedin_left").hover(function(){ 
	jQuery(this).stop(true,false).animate({left:  0}, 500); },function(){ 
	jQuery("#linkedin_left").stop(true,false).animate({left: -200}, 500); }); 
  
  jQuery("#pinterest_left").hover(function(){ 
	jQuery(this).stop(true,false).animate({left:  0}, 500); },function(){ 
	jQuery("#pinterest_left").stop(true,false).animate({left: -200}, 500); }); 
  
  jQuery("#twitter_left").hover(function(){ 
	jQuery(this).stop(true,false).animate({left:  0}, 500); },function(){ 
	jQuery("#twitter_left").stop(true,false).animate({left: -250}, 500); });   
  
  jQuery("#google_plus_left").hover(function(){ 
	jQuery(this).stop(true,false).animate({left:  0}, 500); },function(){ 
	jQuery("#google_plus_left").stop(true,false).animate({left: -154}, 500); });   
  
  jQuery("#feedburner_left").hover(function(){ 
	jQuery(this).stop(true,false).animate({left:  0}, 500); },function(){ 
	jQuery("#feedburner_left").stop(true,false).animate({left: -303}, 500); });  
});
</script>
<script type="text/javascript">jQuery(document).ready(function(){ 
  jQuery("#facebook_right").hover(function(){ 
    jQuery(this).stop(true,false).animate({right:  0}, 500); },function(){ 
	jQuery("#facebook_right").stop(true,false).animate({right: -200}, 500); });
  
  jQuery("#linkedin_right").hover(function(){ 
	jQuery(this).stop(true,false).animate({right:  0}, 500); },function(){ 
	jQuery("#linkedin_right").stop(true,false).animate({right: -350}, 500); });  
  
  jQuery("#pinterest_right").hover(function(){ 
	jQuery(this).stop(true,false).animate({right:  0}, 500); },function(){ 
	jQuery("#pinterest_right").stop(true,false).animate({right: -250}, 500); });
  
  jQuery("#twitter_right").hover(function(){ 
	jQuery(this).stop(true,false).animate({right:  0}, 500); },function(){ 
	jQuery("#twitter_right").stop(true,false).animate({right: -250}, 500); });   
  
  jQuery("#google_plus_right").hover(function(){ 
	jQuery(this).stop(true,false).animate({right:  0}, 500); },function(){ 
	jQuery("#google_plus_right").stop(true,false).animate({right: -154}, 500); });   
  
  jQuery("#feedburner_right").hover(function(){ 
	jQuery(this).stop(true,false).animate({right:  0}, 500); },function(){ 
	jQuery("#feedburner_right").stop(true,false).animate({right: -303}, 500); }); 
});
</script>
<!-- commented out bottom
<script type="text/javascript">jQuery(document).ready(function(){ jQuery("#facebook_bottom").hover(function(){ jQuery(this).stop(true,false).animate({bottom:  0}, 500); },function(){ jQuery("#facebook_bottom").stop(true,false).animate({bottom: -200}, 500); });    jQuery("#twitter_bottom").hover(function(){ jQuery(this).stop(true,false).animate({bottom:  0}, 500); },function(){ jQuery("#twitter_bottom").stop(true,false).animate({bottom: -250}, 500); });     jQuery("#google_plus_bottom").hover(function(){ jQuery(this).stop(true,false).animate({bottom:  0}, 500); },function(){ jQuery("#google_plus_bottom").stop(true,false).animate({bottom: -154}, 500); });    jQuery("#feedburner_bottom").hover(function(){ jQuery(this).stop(true,false).animate({bottom:  0}, 500); },function(){ jQuery("#feedburner_bottom").stop(true,false).animate({bottom: -303}, 500); });    });</script>
-->

<!-- Start Facebook Slider Code -->  
<div id="on">
 <div id="facebook_<?php echo $options['drp_select_box']; ?>" style="top: 18%;">
  <div id="facebook_div">
   <img src="<?php echo plugins_url(); ?>/calicotek-floating-social-slider/images/facebook-<?php echo $options['drp_select_box']; ?>.png" alt=""/>
    <!-- Start Set FaceBook Page Here -->  
	<iframe src="//www.facebook.com/plugins/likebox.php?href=<?php echo $options['facebook']; // // calls this items options ?>&amp;width=200&amp;height=346&amp;colorscheme=light&amp;show_faces=true&amp;border_color&amp;stream=false&amp;header=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:300px; height:346px;" allowtransparency="true">
    <!-- End Set FaceBook Page Here -->     
	</iframe>
  </div>
 </div>
</div>
<!-- end Facebook Slider Code -->  

<!-- Start Linkdin Slider Code --> 
<div id="on">
 <div id="linkedin_<?php echo $options['drp_select_box']; ?>" style="top: 35%;">
  <div id="linkedin_div">
	<img id="linkedin_<?php echo $options['drp_select_box']; ?>_img" src="<?php echo plugins_url(); ?>/calicotek-floating-social-slider/images/linkedin-<?php echo $options['drp_select_box']; ?>.png"/>
    <script src="//platform.linkedin.com/in.js" type="text/javascript"></script>
	<script type="IN/CompanyProfile" data-id="<?php echo $options['linkedin']; // calls this items options ?>" data-format="inline"></script>
  </div>
 </div>
</div>
<!-- End Linkdin Slider Code --> 


<!-- Start Twitter Slider Code -->  	
<div id="off">
 <div id="twitter_<?php echo $options['drp_select_box']; ?>" style="top: 35%;">
  <div id="twitter_div">
	<img id="twitter_<?php echo $options['drp_select_box']; ?>_img" src="<?php echo plugins_url(); ?>/calicotek-floating-social-slider/images/twitter-<?php echo $options['drp_select_box']; ?>.png"/>
   <script src="http://widgets.twimg.com/j/2/widget.js"></script>
   <script>new TWTR.Widget({version: 2,type: 'profile',rpp: 4,interval: 1000,width: 246,height: 265,theme: {shell: {background: '#63BEFD',color: '#FFFFFF'},tweets: {background: '#FFFFFF',color: '#000000',links: '#47a61e'}},features: { loop: false,live: true,scrollbar: false,hashtags: false,timestamp: true,avatars: true,behavior: 'all' }}).render().setUser('<?php echo $options['twitter']; // calls this items options ?>').start();</script><!-- change calicotek to your twitter name -->
  </div>
 </div>
</div>
<!-- end Twitter Slider Code -->  


<div id="on">
 <div id="google_plus_<?php echo $options['drp_select_box']; ?>" style="top: 52%;">
  <div id="google_plus_div">
   <img id="google_plus_<?php echo $options['drp_select_box']; ?>_img" src="<?php echo plugins_url(); ?>/calicotek-floating-social-slider/images/google-<?php echo $options['drp_select_box']; ?>.png"/>
   <div style="float:left;margin:10px 10px 10px 0;">
    <g:plusone size="tall" expr:href="data:post.url"></g:plusone>
   </div>
  </div>
</div>
  
 <div id="on">
  <div id="feedburner_<?php echo $options['drp_select_box']; ?>" style=" top: 69%;">
   <div id="knfeedburner_div">
    <center>
    <h4 style="color:#F66303;">You can also receive Free Email Updates:</h4>
    <form action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=hblogger', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
     <input gtbfieldid="10" class="<?php echo $options['email']; // this calls the facecbook option from settings ?>" name="email" value="Enter your email here..." onblur="if (this.value == &#39;&#39;) {this.value = &#39;Enter your email here...&#39;;}" onfocus="if (this.value == &#39;Enter your email here...&#39;) {this.value = &#39;&#39;;}" type="text"/><input value="hblogger" name="uri" type="hidden"/><input value="Submit" class="submitbutton" type="submit"/>
    </form>
    </center><img id="feedburner_<?php echo $options['drp_select_box']; ?>_img" src="<?php echo plugins_url(); ?>/calicotek-floating-social-slider/images/subscribe-<?php echo $options['drp_select_box']; ?>.png"/>
   </div>
  </div>
 </div>
  
</div>
<!-- End Social Slider Script -->
