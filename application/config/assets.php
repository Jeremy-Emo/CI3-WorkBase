<?php
if ( ! defined('BASEPATH'))
    exit('No direct script access allowed');

/* Fichier de config contenant les différents assets à charger automatiquement.

On peut passer un array en sous-paramètre, auquel cas il doit avoir la syntaxe suivante :

array('file' => 'nom du fichier à charger',
      'cdn' => 'contrôle d'intégrité du cdn',
      'cors' => 'contrôle cross-origin')

Cela permet de remplir en automatique les attributs integrity et crossorigin
Il faut mettre à NULL une valeur vide pour ne pas l'afficher */


$config['css'] = array(
  'reset.css',
  'style.css'
);

$config['js'] = array(
  'jquery-3.3.1.min.js'
);


//Configuration pour environnement de production
$config['cssProd'] = array(

);

$config['jsProd'] = array(
  'jquery-3.3.1.min.js'
);
