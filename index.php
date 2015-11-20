<?php 
	$json = file_get_contents("files/data/en_gb.json");
   	$site_data = json_decode($json);

	$id = false;
	if( isset($_GET['id']) ) {
		$id = filter_var(htmlentities($_GET['id']), FILTER_SANITIZE_NUMBER_INT);
		//$url = 'http://frankenfriend-dev.foxfilm.com/s3test/?id='.$id;
		$url = $site_data->metaData->appUrl.'?id='.$id;
		$image_url = $site_data->metaData->s3bucketUrl.''.$id.'.jpg';
	}
	
	$app_url = $site_data->metaData->appUrl;
	
	require_once('files/php/views/header_init.php');
?>

<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns#">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<meta name="description" content="<?php echo $site_data->metaData->description; ?>"/>
<meta name="google-site-verification" content="IIMiLvL7IX3N-vJFY_LmevsBAe9cbXSEAOiCiQy2KHE" />

<meta property="og:title" content="<?php echo $site_data->metaData->title; ?>"/>
<meta property="og:description" content="<?php echo $site_data->metaData->description; ?>"/>
<meta property="og:site_name" content="<?php echo $site_data->metaData->siteName; ?>">
<meta property="og:type" content="website"/>
<?php if( $id !== false ) { ?>
<meta property="og:image" content="<?php echo $image_url; ?>">
<meta property="og:url" content="<?php echo $url; ?>">
<?php } else { ?>
<meta property="og:image" content="<?php echo $app_url; ?>files/images/vf_frankenFriend_fb_share.jpg">
<meta property="og:url" content="<?php echo $app_url; ?>">
<?php } ?>
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">

<meta name="twitter:title" content="<?php echo $site_data->metaData->title; ?>">
<meta name="twitter:description" content="<?php echo $site_data->metaData->description; ?>"/>
<meta name="twitter:creator" content="<?php echo $site_data->metaData->twitterHandle; ?>" />
<meta name="twitter:site" content="<?php echo $site_data->metaData->twitterHandle; ?>" />
<meta name="twitter:card" content="summary_large_image" />
<?php if( $id !== false ) { ?>
<meta name="twitter:image" content="<?php echo $image_url; ?>">
<meta name="twitter:url" content="<?php echo $url; ?>">
<?php } else { ?>
<meta name="twitter:image" content="<?php echo $app_url; ?>files/images/vf_frankenFriend_fb_share.jpg">
<meta name="twitter:url" content="<?php echo $app_url; ?>">
<?php } ?>

<link rel="shortcut icon" href="files/images/favicon.ico">
<link rel="icon" type="image/png" href="files/images/favicon.png">

<title><?php echo $site_data->metaData->title; ?></title>
<link rel="stylesheet" href="files/css/main.css"/>
<?php
	if($device == 'mobile') {
		?>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
 
		<?php
	} else {
		?>
		<meta name="viewport" content="width=1024, user-scalable=0">

		<?php
	}
?>
<script src="https://use.typekit.net/cjp1kvh.js"></script>
<script>try{Typekit.load({ async: true });}catch(e){}</script>

</head>
<body class="<?php echo $phoneOs; ?> <?php echo $webapp; ?> <?php echo $device; ?> <?php  echo $browser; ?>">
<script>

var dataLayer = [];

</script>

<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-TJT4P3" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TJT4P3');</script>
<!-- End Google Tag Manager -->


<div class="wrapper">
	<div id="transitionVid">
		<div class="section">
		<?php if($device != 'mobile') { ?>
			<!-- <div class="franken-grunge ignore-pointer"></div> -->
			<video id="transitionVid-01">
				<source src="files/video/interstitial.mp4" type="video/mp4">
				<source src="files/video/interstitial.webm" type="video/webm">
				<source src="files/video/interstitial.ogv" type="video/og">
			</video>
		<?php } ?>
		</div>
  	</div>

  	<div class="franken-particles ignore-pointer"></div>
	<div id="frankenHeader">
		<div class="frankenHeader_title btn"><img src="files/images/frankenFriend_title.png" /></div>
		<a href="http://www.foxmovies.com/movies/victor-frankenstein" target="_blank"><div class="frankenHeader_title-mobile"></div></a>
		<div id="audio" class="frankenHeader_sound btn">
			<div class="mute"></div><div class="unmute"></div>
		</div>
		<?php if($device != 'mobile') { ?>
		<div class="frankenHeader_hashtag" style="font-size: <?php echo $site_data->metaData->hashtag->size; ?>;"><?php echo $site_data->metaData->hashtag->value; ?></div>
		<?php } ?>
	</div>

	<div id="frankenIntro" class="page">
		<div class="franken-intro-bg">
			<div class="franken-intro-bg-img" id="frankenIntroBG"></div>
		</div>
		<div class="section">
			<div class="franken-grunge ignore-pointer"></div>
			<div class="franken-preview-container" id="frankenPreviewContainer">
				<img class="franken-preview" src="files/images/frank_preview_build1.png" />
				<img class="franken-preview" src="files/images/frank_preview_build2.png" />
				<img class="franken-preview" src="files/images/frank_preview_build3.png" />
				<img class="franken-preview" src="files/images/frank_preview_build4.png" />
			</div>
			<?php if($device == 'mobile') { ?>
			<div class="franken-preview-copy">
				<div class="franken-preview-copy-line" style="font-size: <?php echo $site_data->intro->previewCopy01->mobileSize; ?>;"><?php echo $site_data->intro->previewCopy01->value; ?></div>
				<div class="franken-preview-copy-line" style="font-size: <?php echo $site_data->intro->previewCopy02->mobileSize; ?>;"><?php echo $site_data->intro->previewCopy02->value; ?></div>
			</div>
			<?php } else { ?>
			<div class="franken-preview-copy">
				<div class="franken-preview-copy-line" style="font-size: <?php echo $site_data->intro->previewCopy01->size; ?>;"><?php echo $site_data->intro->previewCopy01->value; ?></div>
				<div class="franken-preview-copy-line" style="font-size: <?php echo $site_data->intro->previewCopy02->size; ?>;"><?php echo $site_data->intro->previewCopy02->value; ?></div>
			</div>
			<?php } ?>
		</div>
	</div>
	<div id="selectFrankenFriends" class="page">
		<?php 
			if($device == 'mobile') {
				include('files/php/views/mobile-select.php'); 
			} else {
				include('files/php/views/desktop-select.php'); 
			}
		?>
	</div><!-- selectFrankenFriends -->

	<!-- <div id="sharePic" class="btn">Share Pic</div> -->


	<div id="shareFrankenFriend" class="page">
		<div id="shareBlackout" class="blackout"></div>
		<div class="section">
			<canvas id="finalCanvas" width="1024" height="768"></canvas>
			<div id="finalFrank">
				<div class="victor-igor"><img src="files/images/victorAndIgor.png" height="100%" /></div>
				<div class="franken-user-title">
					<div class="franken-alive" id="frankenAlive" style="font-size: <?php echo $site_data->shareFrank->itsAlive->size; ?>;"><?php echo $site_data->shareFrank->itsAlive->value; ?></div>
					<div class="franken-text-error" style="font-size: <?php echo $site_data->shareFrank->badName->size; ?>;"><?php echo $site_data->shareFrank->badName->value; ?></div>
					<input type="text" value="" name="franken-title" id="frankenTitle" maxlength="15" placeholder="<?php echo $site_data->shareFrank->placeHolder->value; ?>" style="font-size: <?php echo $site_data->shareFrank->placeHolder->size; ?>;">
					<div id="submitNameBtn"></div>
					<div id="frankenNameFinal"></div>
				</div>
				<div class="img"><img src="" class="monster-img" /><img id="frankenBlackout" class="franken-blackout" src="files/images/frank_body_blackout.png" /></div>
			</div>
			<div class="franken-grunge ignore-pointer"></div>
		<?php 
			if($device == 'mobile') {
				include('files/php/views/mobile-share-btns.php'); 
			} else {
				include('files/php/views/desktop-share-btns.php'); 
			}
		?>

		</div>
	</div>
	
	
	<div id="frankenFooter">
		<a href="<?php echo $site_data->footer->mainsiteURL; ?>" target="_blank"><div class="frankenFooter_title"></div></a>
		
	</div>
	
	<div id="frankenFooterRight">
		<?php if($device != 'mobile') { ?>
		<div class="frankenFooter_watch-trailer" style="font-size: <?php echo $site_data->footer->watchTrailer->size; ?>;"><a href="<?php echo $site_data->footer->watchTrailerURL; ?>" target="_blank"><?php echo $site_data->footer->watchTrailer->value; ?></a></div>
		<?php } ?>
	</div>

	<div id="frankenLoader">
		<div class="loading-bg"></div>
		<div class="loading-container">
			<div class="loading-content"><div class="loading-title"></div></div>
			<div id="loading_lightning">
				<div class="loading-percentage"></div>
				<img alt="loading lightning"/>
			</div>
			
		</div>
	</div>

	<div id="facebookErrorModal">
		<div class="modal-bg"></div>
		<div class="modal-content" style="font-size: <?php echo $site_data->errorMessage->fbLogin->size; ?>;">
			<div class="modal-close btn" style="font-size: <?php echo $site_data->facebookModal->closeBtn->size; ?>;"><?php echo $site_data->facebookModal->closeBtn->value; ?> <div class="close-x">x</div></div>
			<?php echo $site_data->errorMessage->fbLogin->value; ?>
		</div>
	</div>

	<div id="unSupported">
		<div class="modal-bg"></div>
		<?php 
			if($device != 'mobile') { 
				$errorMessageSize = $site_data->errorMessage->unsupported->size;
			} else {
				$errorMessageSize = $site_data->errorMessage->unsupported->mobileSize;
			}
		?>
		<div class="modal-content" style="font-size: <?php echo $errorMessageSize; ?>;">
			<img class="tt" src="files/images/frank_TT_sm@2x.png" /><br />
			<?php echo $site_data->errorMessage->unsupported->value; ?>
		</div>
	</div>

	<div id="mobileWebApp">
		<div class="modal-bg"></div>
		<div class="modal-content">
			<img class="tt" src="files/images/frank_TT_sm@2x.png" /><br />
			<div class="not-supported" style="font-size: <?php echo $site_data->mobileWeb->webAppUnsupported->size; ?>;"><?php echo $site_data->mobileWeb->webAppUnsupported->value; ?></div>
			<img class="break-line" src="files/images/mobile/blue_horiz_line.png" />
			<div class="ios-txt" style="font-size: <?php echo $site_data->mobileWeb->iosTxt->size; ?>;"><?php echo $site_data->mobileWeb->iosTxt->value; ?><br /></div>
			<div class="android-txt" style="font-size: <?php echo $site_data->mobileWeb->androidTxt->size; ?>;"><?php echo $site_data->mobileWeb->androidTxt->value; ?><br /></div>
			<div id="copyMobileUrl"><?php echo $app_url; ?></div>

		</div>
	</div>

	<div id="landscapeMobile">
		<div class="modal-bg"></div>
		<div class="modal-content" style="font-size: <?php echo $site_data->errorMessage->rotate->size; ?>;">
			<img src="files/images/mobile/frank_rotate.png" /><br />
			<?php echo $site_data->errorMessage->rotate->value; ?>
		</div>
	</div>

	<div id="fileSizeError">
		<div class="modal-bg"></div>
		<?php 
			if($device == 'mobile') { 
				$fileSizeSize = $site_data->errorMessage->fileSize->size;
			} else {
				$fileSizeSize = $site_data->errorMessage->fileSize->mobileSize;
			}
		?>

		<div class="modal-content" style="font-size: <?php echo $fileSizeSize; ?>;">

			<?php echo $site_data->errorMessage->fileSize->value; ?>
		</div>
	</div>

	<div id="fileTypeError">
		<div class="modal-bg"></div>
		<?php 
			if($device == 'mobile') { 
				$fileTypeSize = $site_data->errorMessage->fileType->size;
			} else {
				$fileTypeSize = $site_data->errorMessage->fileType->mobileSize;
			}
		?>

		<div class="modal-content" style="font-size: <?php echo $fileTypeSize; ?>;">
			<?php echo $site_data->errorMessage->fileType->value; ?>
		</div>
	</div>

</div> <!-- wrapper -->
<div id="legalFooter">
	<div class="legal">
		<?php if($device == 'mobile') { ?>
		<div class="frankenFooter_hashtag" style="font-size: <?php echo $site_data->errorMessage->fileType->mobileSize; ?>;"><?php echo $site_data->metaData->hashtag->value; ?></div>
		<div class="social-links">
			<a href="https://www.facebook.com/FrankensteinMovie" target="_blank"><div class="footer-fb"></div></a><a href="https://twitter.com/frankenstein" target="_blank"><div class="footer-tw"></div></a>
		</div>

		<?php } ?>
	    <div class="legal_graphics">

	        <img class="legal_logo" src="files/images/fox.png">
	    </div>
	    <div class="mid">
	    	<?php if($device != 'mobile') { ?>
		<div class="social-links">
			<a href="<?php echo $site_data->footer->facebookURL; ?>" target="_blank"><div class="footer-fb"></div></a><a href="<?php echo $site_data->footer->twitterURL; ?>" target="_blank"><div class="footer-tw"></div></a>
		</div>
			<?php } ?>
		
		<div>
			<script type='text/javascript' src="<?php echo $site_data->footer->legalTxt->value; ?>"></script>
		</div>

	    </div>
	    <div class="ratingWrap">
	        <div class="rating"><img src="files/images/rating.png" /></div>
	        <div class="rating_info" style="font-size:<?php echo $site_data->footer->ratings->size; ?>"><?php echo $site_data->footer->ratings->value; ?> </div>
	    </div>
	    
	</div>
</div>

<div class="hidden-canvas">
<canvas id="canvasShare" width="1200" height="630"></canvas>
<canvas id="canvasDownload" width="1200" height="1200"></canvas>
</div>

<script type="text/javascript" src="files/js/compiled_all.js"></script>
<script>
	var appSettings = {
		appUrl: '<?php echo $app_url; ?>'
	};
	
	$(document).ready(function() {
	  utils.setDevice("<?php echo $device; ?>");
	  var iosVersion = "<?php echo $ios_vers; ?>";

	  $.ajaxSetup({ cache: true });
	  $.getScript('//connect.facebook.net/en_US/sdk.js', function(){
	    FB.init({
	      appId: '<?php echo $site_data->metaData->fbAppID; ?>',
	      version: 'v2.4'
	    });     
	    FB.getLoginStatus(statusChangeCallback);
	  });

	 	mainController.init();
	  var origDisplayAttribute;

		//PointerEventsPolyfill.initialize();

		//still need to work on IE10 clicks
		$(document).on('click', '.ignore-pointer', function(e){

		   if($(this).css('pointer-events') == 'none'){
				//console.log("hi pointer");
				// peak at the element below
				origDisplayAttribute = $(this).css('display');
				$(this).css('display','none');

				var underneathElem = document.elementFromPoint(e.clientX, e.clientY);
				var secondElem;
				// if there is another element to ignore go deeper!
				if($(underneathElem).css('pointer-events') == 'none') {
					secondElem = underneathElem;
					$(secondElem).css('display', 'none');
					underneathElem = document.elementFromPoint(e.clientX, e.clientY);
				}

				if(origDisplayAttribute) {
					$(this).css('display', origDisplayAttribute);
					$(secondElem).css('display', origDisplayAttribute);
				} else {
					$(this).css('display','');
					$(secondElem).css('display', origDisplayAttribute);
				}

				//console.log(underneathElem);

				// fire the mouse event on the element below
				e.target = underneathElem;
				$(underneathElem).trigger(e);
		    }
		    return true;
		});
		$(document).on('mouseout', '.ignore-pointer', function(e){

		});
		
		$('#legalinclude-legal').css({fontSize:'<?php echo $site_data->footer->legalTxt->size; ?>'});
	});

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_GB/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

<?php 
if( $site_data->metaData->cookieBanner->visible == 'true' ) {
	echo '<script src="'.$site_data->metaData->cookieBanner->value.'"></script>';
}
?>

</body>
</html>
