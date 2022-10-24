<?php

// Définir le namespace
namespace App;


class Autoloader {

    static function spl_autoload() {
        // Enregistre la fonction donnée en tant qu'implémentation de __autoload()
        // Sert à enregistrer une nouvelle facon de charger les class donc de limiter les require

        // Prend en @Param un array qui prend en @Param le nom de la class dynamique avec __CLASS__, et la fonction à appelé
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    // Fonction d'autoloader
    static function autoload($class) {
        // Si le premier caractère de ma chaine === 0 (strpos)
        if (strpos($class, __NAMESPACE__ . '\\') === 0) {

            $class = str_replace(__NAMESPACE__ . '\\', '', $class);
            // Remplacer mes \\ dans le nom de ma class en /
            $class = str_replace('\\', '/', $class);
            // var_dump(__DIR__ . '/' . $class . '.php');
            require __DIR__ . '/' . $class . '.php';
        }
    }
}