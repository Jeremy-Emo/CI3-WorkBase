<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template {

        public function render($view, $data = NULL)
        {

            $CI =& get_instance();

            if(ENVIRONMENT == 'development'){
              //Dans le cas où l'environnement défini est 'development' on active le profiler
              $CI->output->enable_profiler(TRUE);
            }

            //On charge les 3 vues du template en y passant l'objet $data
            $CI->load->view('layout/head.php', $data);
            $CI->load->view($view, $data);
            $CI->load->view('layout/foot.php');

        }

        public function generateAssets()
        {

            $CI =& get_instance();
            $CI->config->load('assets');

            //Pour chaque entrée dans le fichier de config "assets.php" on génère le lien dans le header
            $assets = '';
            foreach($CI->config->item('css') as $css){
              if(is_array($css)){
                //Dans le cas d'un array on passe tout les paramètres
                $assets .= cssLink($css['file'], $css['cdn'], $css['cors']) . "\n";
              } else {
                $assets .= cssLink($css) . "\n";
              }
            }
            foreach($CI->config->item('js') as $js){
              if(is_array($js)){
                //Dans le cas d'un array on passe tout les paramètres
                $assets .= jsScript($js['file'], $js['cdn'], $js['cors']) . "\n";
              } else {
                $assets .= jsScript($js) . "\n";
              }
            }
            return $assets;

        }

}
