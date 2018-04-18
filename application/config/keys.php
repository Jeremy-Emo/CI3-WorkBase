<?php
if ( ! defined('BASEPATH'))
    exit('No direct script access allowed');

//Mode maintenance
$config['modeOff'] = FALSE;

//Clés google reCaptcha
$config['captchaPrivateKey'] = '';
$config['captchaPublicKey'] = '';

//Titre par défaut
$config['defaultTitle'] = 'Mon site';

//Assets personnalisés pour l'environnement de production
$config['assetsForProd'] = FALSE;
