<?php


namespace App\Controller;
use App\Classes\Alerte;
use App\Classes\GraphGenerator;


class TP1Controller extends AbstractController
{
    private float $distance;

    public function __construct()
    {
        $this->distance = (float) $_POST['distance'];
    }

    public function index()
    {
        if (isset($_POST['tp1'])) {
            if ($this->distance > 0) {

                $distance = $this->distance;
                $a = $distance / pow($distance, 2);
                $ydata = [];

                // Negate all data
                for ($i = 0; $i < $distance + 10; ++$i) {
                    $ydata[$i] = (-$a * pow($i, 2) + $i);
                }

                new GraphGenerator($ydata,$distance +10,max($ydata) +10);
            } else {
                $_SESSION['ALERTE'][] = new Alerte('danger', "Formulaire TP1 invalide - Les valeurs doivent etre positives");
            }

        }

        header('Location: /');
        exit;
    }

}