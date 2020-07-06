<?php

namespace Core;

class Database
{
    public static function connection()
    {
        $charset = "utf8";
        $server = "127.0.0.1";
        $username = "root";
        $password = "Victor@Epitech1";
        $dbname = "cinema";
        try {
            $bdd = "mysql:host=" . $server . ";dbname=" . $dbname . ";charset=" . $charset;
            $pdo = new \PDO($bdd, $username, $password);
            return $pdo;
        } catch (\Exception $e) {
            echo "Connexion échouée" . $e->getMessage();
        }
    }
}