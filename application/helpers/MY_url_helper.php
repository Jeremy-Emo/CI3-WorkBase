<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('site_url')) {
  //Réécriture de la fonction native site_url pour traduire des URL stockées en BDD (cas où on stocke une url d'un autre domaine)
  function site_url($uri='') {
		if(strstr(strtolower($uri), 'http://') || strstr(strtolower($uri), 'https://')){
			return $uri;
		}
		else{
			$CI =& get_instance();
			return $CI->config->site_url($uri);
		}
  }
}


if (!function_exists('css_url')) {
  //Retourne le chemin d'un fichier CSS
  function css_url($nom) {
    return base_url() . 'assets/css/' . $nom;
  }
}


if (!function_exists('js_url')) {
  //Retourne le chemin d'un fichier JS
  function js_url($nom) {
    return base_url() . 'assets/js/' . $nom;
  }
}
