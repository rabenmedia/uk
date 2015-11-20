<?php
/**
 *	utils
 *	dev:james safechuck (james@avatarlabs.com)
 */

/**
 *	get_site_url
 *	return the path to file
 */

	function get_site_url() {
		$site_base_url = get_protocol().$_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
		
		if( $site_base_url[strlen($site_base_url)-1] != '/' )
			$site_base_url.="/";
		
		return $site_base_url;
	}
/**
 *	get_base_url
 *	return the path to folder
 */
	function get_base_url($dropqs=true){
		
		// $site_base_url = get_protocol().$_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
		
		// if( $site_base_url[strlen($site_base_url)-1] != '/' )
		// 	$site_base_url.="/";
		
		$site_base_url = sprintf('%s%s%s', get_protocol(), $_SERVER['SERVER_NAME'], dirname($_SERVER['REQUEST_URI']).'/');
		
		$parts = parse_url($site_base_url);
		
		$port = $_SERVER['SERVER_PORT'];
		$scheme = $parts['scheme'];
		$host = $parts['host'];
		$path = @$parts['path'];
		$qs = @$parts['query'];
		
		$port or $port = ($scheme == 'https') ? '443' : '80';
		
		if( ($scheme == 'https' && $port != '443') || ($scheme == 'http' && $port != '80') ) {
			$host = "$host:$port";
		}
		
		$url = "$scheme://$host$path";
		
		if( !$dropqs ) {
			return "{$url}?{$qs}";
		} else {
			return $url;
		}
		
	}

	/**
	 *	get_user_language
	 *	first check url vars for setting
	 *	then see if cookie was saved
	 */
	function get_user_language() {
		
		if( isset( $_GET[USER_LANGUAGE_URL_VAR_NAME] ) ) {
			return htmlentities($_GET[USER_LANGUAGE_URL_VAR_NAME]);
		}
		
		if (isset($_COOKIE[USER_LANGUAGE_URL_VAR_NAME]))
			return htmlentities($_COOKIE[USER_LANGUAGE_URL_VAR_NAME]);
		
		return "";
	}

	function get_user_language_cookie() {

		if (isset($_COOKIE[USER_LANGUAGE_URL_VAR_NAME]))
			return htmlentities($_COOKIE[USER_LANGUAGE_URL_VAR_NAME]);
		
		return "";
	}

	function get_user_language_url_var() {
		
		if( isset( $_GET[USER_LANGUAGE_URL_VAR_NAME] ) ) {
			return htmlentities($_GET[USER_LANGUAGE_URL_VAR_NAME]);
		}
		
		return "";
	}
	

?>