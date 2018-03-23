<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('base64urlEncode')) {
  //Encodage en base64 pour URL
	function base64urlEncode($value) {
	    return str_replace(array('+', '/'), array('-', '_'), base64_encode($value));
	}
}

if (!function_exists('base64urlDecode')) {
  //Décodage du base64 pour URL
	function base64urlDecode($value) {
	    return base64_decode(str_replace(array('-', '_'), array('+', '/'), $value));
	}
}

if (!function_exists('cssLink')) {
  //Génère un lien vers un fichier CSS tout en y ajoutant les attributs integrity et crossorigin si précisés
  function cssLink($nom, $cdn = NULL, $cors = NULL) {
		if(strstr(strtolower($nom), 'http://') || strstr(strtolower($nom), 'https://')){
			$link = '<link href="' . $nom . '" rel="stylesheet" type="text/css"';
		} else {
			$link = '<link href="' . css_url($nom) . '" rel="stylesheet" type="text/css"';
		}
		if($cdn) {
			$link .= ' integrity="' . $cdn . '"';
		}
		if($cors) {
			$link .= ' crossorigin="' . $cors . '"';
		}
		$link .= " />";
    return $link;
  }
}


if (!function_exists('jsScript')) {
  //Génère un lien vers un fichier JS tout en y ajoutant les attributs integrity et crossorigin si précisés
  function jsScript($nom, $cdn = NULL, $cors = NULL) {
		if(strstr(strtolower($nom), 'http://') || strstr(strtolower($nom), 'https://')){
			$script = '<script src="' . $nom;
		} else {
			$script = '<script src="' . js_url($nom);
		}
		if($cdn) {
			$script .= ' integrity="' . $cdn . '"';
		}
		if($cors) {
			$script .= ' crossorigin="' . $cors . '"';
		}
		$script .= '"></script>';
    return $script;
  }
}
