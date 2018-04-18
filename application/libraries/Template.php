<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template {

        public function render($view, $data = NULL, $dataHead = NULL)
        {

            $CI =& get_instance();

            if(ENVIRONMENT == 'development'){
              //Dans le cas où l'environnement défini est 'development' on active le profiler
              $CI->output->enable_profiler(TRUE);
            }

            if($dataHead == NULL){
              $data->title = $CI->config->item('defaultTitle');
            }

            //On charge les 3 vues du template en y passant l'objet $data
            $CI->load->view('layout/head.php', $dataHead);
            $CI->load->view($view, $data);
            $CI->load->view('layout/foot.php');

        }

        public function generateAssets()
        {

            $CI =& get_instance();
            $CI->config->load('assets');
            if(ENVIRONMENT == 'production'){
                $cssFile = $CI->config->item('cssProd');
                $jsFile = $CI->config->item('jsProd');
            }else {
              $cssFile = $CI->config->item('css');
              $jsFile = $CI->config->item('js');
            }

            //Pour chaque entrée dans le fichier de config "assets.php" on génère le lien dans le header
            $assets = '';
            foreach($cssFile as $css){
              if(is_array($css)){
                //Dans le cas d'un array on passe tout les paramètres
                $assets .= cssLink($css['file'], $css['cdn'], $css['cors']) . "\n";
              } else {
                $assets .= cssLink($css) . "\n";
              }
            }
            foreach($jsFile as $js){
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
