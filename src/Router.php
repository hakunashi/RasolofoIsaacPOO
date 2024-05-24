<?php

namespace Src;

use Src\Manager\MotoManager;
use Src\Controller\MotoController;

class Router {
    private string $uri;
    private string $BASE_PATH = "/index.php/";

    public function __construct()
    {
        $this->uri = $_SERVER['REQUEST_URI'];
        $this->getRoute(explode('/', substr($this->uri, strpos($this->uri, $this->BASE_PATH) + strlen($this->BASE_PATH))));
    }

    private function getRoute(array $segments)
    {
        $mainRoute = !empty($segments[0]) ? $segments[0] : null;
        $subRoute =  !empty($segments[1]) ? $segments[1] : null;
        switch ($mainRoute) {

            case 'moto':

                $motoController = new MotoController();

                $hasNumericID = !empty($segments[2]) && is_numeric($segments[2]);

                switch ($subRoute) {

                    case 'add':

                        $motoController->add();

                        break;

                    case 'edit':

                        if ($hasNumericID) {

                            $motoController->edit($segments[2]);
                        } else {
                            echo "ROUTE: /pizza/edit/ Bad Request: Missing ID";
                        }

                        break;

                    case 'delete':

                        // Vérifier si un ID est fourni
                        if ($hasNumericID) {

                            $motoController->delete($segments[2]);
                        } else {
                            echo "ROUTE: /moto/delete/  Request: Missing ID";
                        }

                        break;

                    case null:
                        // pizza/
                        // Route pour récupérer tous les services
                        $motoController->getAll();

                        break;
                    default:
                        // Vérifier si le segment correspond à un ID numérique
                        if (is_numeric($subRoute)) {
                            // Route pour récupérer le service correspondant l'ID 
                            $motoController->getById($subRoute);
                        } else {
                            // Route pour récupérer le smotos selon leur type
                            $motoController->getByType($subRoute);
                        }
                        break;
                }
                break;
            default:
                // Si $mainRoute ne correspond à aucune route connue
                //Dans notre exemple il n'y a que /service, 
                echo "Page not found <a href='./moto/''>Toutes les motos</a>";
                break;
        }
    }
}

?>