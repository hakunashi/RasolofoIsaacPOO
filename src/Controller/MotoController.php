<?php

namespace Src\Controller;

use Src\Entity\Moto;
use Src\Manager\MotoManager;

class MotoController
{
    private MotoManager $motoManager;

    public function __construct() {
        $this->motoManager = new MotoManager();
    }

    // Route: /moto
    public function getAll()
    {
        //Appel de template
        $motos = $this->motoManager->findAll();

        include(__DIR__ . "/../../Templates/moto/index.php");
    }

    // Route: /moto/$id
    public function getById(int $id)
    {
        $moto = $this->motoManager->findById($id);

        if ($moto) {
            include(__DIR__ . "/../../Templates/moto/motodetail.php");
        } else {
            echo json_encode("Moto not found!");
        }
    }

    // Route: /moto/$type
    public function getByType(string $type)
    {
        $motos = $this->motoManager->findByType($type);

        include(__DIR__ . "/../../Templates/moto/type.php");
    }

    // Route: /moto/add/
    public function add()
    {
        //Verif SI form valider ( methode POST )

        if($_SERVER['REQUEST_METHOD'] === "POST" ) {
            if((isset($_POST["brand"]) && trim($_POST["brand"]) !== "") && (isset($_POST["model"]) && trim($_POST["model"]) !== "") && (isset($_POST["type"]) && trim($_POST["type"]) !== "") && (isset($_POST["price"]) && trim($_POST["price"]) !== "")) {
                $moto = new Moto(0, $_POST["brand"], $_POST["model"], $_POST["type"], $_POST["price"], "https://images.netdirector.co.uk/gforces-auto/image/upload/w_620,h_465,q_auto,c_fill,f_auto,fl_lossy/auto-client/2c7fd497b0029eecbe7de3b927d764d7/2022_yam_yzf1000r1spl_eu_bwm2_stu_001_03_1.jpg");

                $this->motoManager->add($moto);

                header("Location: ./");
            } else {
                echo "form invalide";
            }
        }

        include(__DIR__ . "/../../Templates/moto/addMoto.php");

    }

    // Route: /moto/edit/$id
    public function edit(int $id)
    {
        $moto = $this->motoManager->findById($id);

        if (!$moto) {
            echo json_encode("Moto not found!");
        }

        if($_SERVER['REQUEST_METHOD'] === "POST" ) {
            if((isset($_POST["brand"]) && trim($_POST["brand"]) !== "") && (isset($_POST["model"]) && trim($_POST["model"]) !== "") && (isset($_POST["type"]) && trim($_POST["type"]) !== "") && (isset($_POST["price"]) && trim($_POST["price"]) !== "")) {
                $editMoto = new Moto($moto->getId(), $_POST["brand"], $_POST["model"], $_POST["type"], $_POST["price"], "https://images.netdirector.co.uk/gforces-auto/image/upload/w_620,h_465,q_auto,c_fill,f_auto,fl_lossy/auto-client/2c7fd497b0029eecbe7de3b927d764d7/2022_yam_yzf1000r1spl_eu_bwm2_stu_001_03_1.jpg");

                $this->motoManager->edit($editMoto);

                header("Location: ../");
            } else {
                echo "form invalide";
            }
        }

        include(__DIR__ . "/../../Templates/moto/editMoto.php");
    }

    // Route: /pizza/delete/$id
    public function delete($id)
    {
        $moto = $this->motoManager->findById($id);

        if($_SERVER['REQUEST_METHOD'] === "POST" ) {

            if($_POST['choix'] === "Confirmer") {
                $this->motoManager->delete($id);
                header("Location: ../");
            } else {
                header("Location: ../");
            }
        }

        include(__DIR__ . "/../../Templates/moto/deleteMoto.php");
    }
}
