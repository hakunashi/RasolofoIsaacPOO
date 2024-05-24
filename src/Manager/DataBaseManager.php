<?php

namespace Src\Manager;

use PDO;
use PDOException;


/**
 * DatabaseManager représente la connexion a ma BDD
 */
class DataBaseManager{
    
    private PDO $connection;
    
    public function __construct(){
    
        try {
            $host = "localhost";
            $databaseName = "apiMoto";
            $user = "root";
            $password = "";
            
            // utilisation du parametre pour avoir la connexion
            $this->connection = new PDO("mysql:host=" . $host . ";port=3306;dbname=" . $databaseName . ";charset=utf8", $user, $password);
            
            //configuration de ma connexion en utilisation la méthode privée de ma classe
            $this->configPdo();
    
        //Lorqu'une erreur surviens elle est "lancée" par PHP ( throw ), catch permet de "l'attraper", utile pour retester la connexion differement etc
        } catch (PDOException $e) {
            //Ici nous affichons simplement le message d'erreur et coupons le code
            echo ("Erreur à la connexion : " .  $e->getMessage());
            exit();
        }
    }   

    private function configPdo(): void
    {
        // Recevoir les erreurs PDO ( coté SQL )
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Choisir les indices dans les fetchs
        $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    /**
     * Get the value of connection
     */ 
    public function getConnection()
    {
        return $this->connection;
    }

    
    
}
