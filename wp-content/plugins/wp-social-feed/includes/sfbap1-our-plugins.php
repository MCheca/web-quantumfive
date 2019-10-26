<style type="text/css">
	@import url(https://fonts.googleapis.com/css?family=Open+Sans);

* { box-sizing: border-box; }

body { 
  font-family: 'Open Sans', sans-serif;
  color: #666;
}

/* STRUCTURE */

.wrapper {
	padding: 5px;
	max-width: 960px;
	width: 95%;
	margin: 20px auto;
}
header {
	padding: 0 15px;
}

.columns {
	display: flex;
	flex-flow: row wrap;
	justify-content: center;
	margin: 5px 0;
}

.column {
	flex: 1;
	border: 1px solid gray;
	margin: 2px;
	padding: 10px;
	text-align: center;
	&:first-child { margin-left: 0; }
	&:last-child { margin-right: 0; }

}

footer {
	padding: 0 15px;
}


@media screen and (max-width: 980px) {
  .columns .column {
		margin-bottom: 5px;
    flex-basis: 40%;
		&:nth-last-child(2) {
			margin-right: 0;
		}
		&:last-child {
			flex-basis: 100%;
			margin: 0;
		}
	}
}

@media screen and (max-width: 680px) {
	.columns .column {
		flex-basis: 100%;
		margin: 0 0 5px 0;
	}
}
a{
	text-decoration: none !important;
}
</style>
<div class="wrapper">

	<header style="text-align:center;">
		<h1>Our Plugin's Showcase</h1>
		<p style="font-size: 16px;">We develop Simple, Responsive & Highly Customizable plugins to add an extra functionality into your site. Arrow's range of plugins are designed to allow you to do what you do best: build and maintain kick-ass, cutting edge WordPress sites.</p>
	</header>
		
<section class="columns">
	
	<div class="column">
		<a href="https://wordpress.org/plugins/arrow-login-page/" target="_blank">
		<img style="width: 70px;border-radius: 10%;" id="sfbap1_vertical_image" src="<?php echo plugins_url('images/lplogo.png',__FILE__); ?>" />
			<h2>Login Page Customizer</h2>
			<p>EFFORTLESS Customization, One of the Best, easy to use and most customizable Login Page Customizer Plugin for WordPress with customization option and backgroud video support</p>
		</a>
	</div>
	
	<div class="column">
		<a href="https://wordpress.org/plugins/social-share-buttons-popup/" target="_blank">
		<img style="width: 70px;border-radius: 10%;" id="sfbap1_vertical_image" src="<?php echo plugins_url('images/sslogo.png',__FILE__); ?>" />
		<h2>Social Share Buttons</h2>
		<p>Social Share is fully loaded with social media options allows you to add Social Sharing buttons on your WordPress site to share your content on the web.</p>
	</a>
	</div>
  
  	<div class="column">
		<a href="https://wordpress.org/plugins/wp-instagram-feed/" target="_blank">
		<img style="width: 70px;border-radius: 10%;" id="sfbap1_vertical_image" src="<?php echo plugins_url('images/ilogo.png',__FILE__); ?>" />
		<h2>Instagram Feed</h2>
		<p>Dispaly instagram photos from your account or from any hashtag using simple shortcode into your posts, pages or in widgets. Beautifull, Responsive & Super simple to set up</p>
	</a>
	</div>
	
</section>	
<section class="columns">
	
	<div class="column">
		<a href="https://wordpress.org/plugins/add-youtube-feed/" target="_blank">
		<img style="width: 70px;border-radius: 10%;" id="sfbap1_vertical_image" src="<?php echo plugins_url('images/ylogo.png',__FILE__); ?>" />
		<h2>YouTube Channel Feed</h2>
		<p>YouTube Plugin is the best YouTube Feed Plugin to Display clean, customizable, and responsive YouTube Channel Videos & YouTube Playlists.</p>
	</a>
	</div>
	
	<div class="column">
		<a href="https://wordpress.org/plugins/wp-subscribe-form/" target="_blank">
		<img style="width: 70px;border-radius: 10%;" id="sfbap1_vertical_image" src="<?php echo plugins_url('images/sflogo.png',__FILE__); ?>" />
		<h2>Subscribe Form</h2>
		<p>Subscribe Form allows you to create and manage powerful promotion Subscribe Forms for WordPress blog or website with Mailchimp ActiveCampaign & GetResponse.</p>
	</a>
	</div>
  
  	<div class="column">
		<a href="https://wordpress.org/plugins/ultimate-popup-creator/" target="_blank">
		<img style="width: 70px;border-radius: 10%;" id="sfbap1_vertical_image" src="<?php echo plugins_url('images/plogo.png',__FILE__); ?>" />
		<h2>Popup Plugin</h2>
		<p>Increase your sales upto 300%. Build Conversion Boosting Popups & Gain More Email Subscribers Leads & Customer Base with Popup Plugin for WordPress.</p>
	</a>
	</div>
	
</section>	
	<footer>
		<h2 style="font-size: 20px;">We have few More plugins!</h2>
		<p style="font-size: 16px;font-weight: bold;">To see the complete range of our Freemium plugins please visit <a href="https://www.arrowplugins.com" target="_blank">www.arrowplugins.com</a>, we are sure you will love our plugins! :)</p>
	</footer>
</div>