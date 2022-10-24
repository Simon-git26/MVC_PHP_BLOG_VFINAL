<?php

// Définir le namespace
namespace App;


class Autoloader {

    static function spl_autoload() {
        // Enregistre la fonction donnée en tant qu'implémentation de __autoload()
        // 
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    
}