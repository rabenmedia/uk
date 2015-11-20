<?php
	// Detects device type so we can adjust the game accordingly (e.g. removing or reducing some animations for tablets)
	require_once('files/php/lib/Mobile_Detect.php');
	
	$detect = new Mobile_Detect;
	$is_desktop = true;
	$device = 'pc';
	$browser = '';
	$is_ios = false;
	$ios_vers = '7';

	//checking for IE9
	preg_match('/MSIE (.*?);/', $_SERVER['HTTP_USER_AGENT'], $matches);
	if(count($matches)<2){
	  preg_match('/Trident\/\d{1,2}.\d{1,2}; rv:([0-9]*)/', $_SERVER['HTTP_USER_AGENT'], $matches);
	}

	if (count($matches)>1){
	  //Then we're using IE
	  $version = $matches[1];
	  $browser = 'ie';

	  switch(true){
	    case ($version==9):
	      $browser = "ie9";
	      break;
	    case ($version<=8):
	      $browser = "ie8";
	      break;
	    case ($version==10):
	      $browser = "ie10";
	      break;
	    default:
	      //do nothing
	  }
	}
	
	if( $detect->isMobile() ) {
		$is_desktop = false;
		$device = 'mobile';
	}
	
	if( $detect->isTablet() ) {
		$is_desktop = false;
		$device = 'tablet';
	}
	
	$is_ios = $detect->isIphone();
	if(!$is_ios) {
		$is_ios = $detect->isIpad();
	}

	//if we're on ipad or iphone check safari version
	if($is_ios) {
		$ios_vers = substr($detect->version('iOS'), 0, 1);
		$phoneOs = 'ios';
		// $ios_vers = $detect->version('iOS');
		// $safari_vers = $detect->version('Safari');
		if($ios_vers < 7) {
			$ios_vers = "uns-device";
			$browser = 'ie8';
		}
	}

	if($detect->isAndroidOS()) {
		$phoneOs = 'android';
	}
	



	//checking for mobile web apps
	$user_agent = $detect->getUserAgent();
	// $user_agent = 'Mozilla/5.0 (Linux; Android 5.0.2; D5803 Build/23.1.A.1.28; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/43.0.2357.121 Mobile Safari/537.36 [FB_IAB/FB4A;FBAV/36.0.0.39.166;]';
	// $user_agent = 'Mozilla/5.0 (iPhone; CPU iPhone OS 8_2 like Mac OS X) AppleWebKit/600.1.4 (KHTML, like Gecko) Version/8.0 Mobile/12D508';
	// $user_agent = '600.1.4 (KHTML, like Gecko) Version/8';
	
	//echo $user_agent.'<br>';
	
	$reg_exp = '/.*KHTML.*\) Version./';
	// $reg_exp = '/.*KHTML.*/';
	
	//echo 'regexp '.$reg_exp.'<br>';
	
	$touch_webview_browser = false;
	$if_cond = 0;
	
	if( $detect->isMobile() || $detect->isTablet() ) {
	// if( true ) {
		
		if( preg_match('/.wv./', $user_agent) ) { // Android devices with lollipop and above os has 'wv' in the webview browser
			$touch_webview_browser = true;
			$if_cond = 'wv';
		} else if( preg_match('/.\[FB.*\]/', $user_agent) ) { // FB app in browser has FB in the user agent
			$touch_webview_browser = true;
			$if_cond = 'FB';
		} else if( preg_match('/.*twitter.*/i', $user_agent) ) { // New twitter app in browser has Twitter in the user agent
			$touch_webview_browser = true;
			$if_cond = 'Twitter';
		} else {
			// Try to detect older in app browsers that don't have the obvious ones.
			if( $detect->isIOS() ) {
				if( preg_match('/.*KHTML.*\) Mobile./', $user_agent) ) {
					$touch_webview_browser = true;
					$if_cond = 'other iOS in app browser';
				}
			} else if( $detect->isAndroid() ) {
				if( preg_match('/.*KHTML.*\) Version./', $user_agent) ) {
					$touch_webview_browser = true;
					$if_cond = 'other Android in app browser';
				}
			}
		}
		
		// if( preg_match($reg_exp, $user_agent)) {
		// 	echo 'touch device webview browser 1';
		// } else  else {
			
		// 	echo 'touch device regular browser';
		// }
		
		if( $touch_webview_browser ) {
			//echo 'touch device webview browser '.$if_cond;
			$webapp = 'webApp';
		} else {
			//echo 'touch device regular browser';
		}
	} else {
		//echo 'non touch device browser';
	}
	
	
	
	//echo '<br>';	
	
?>