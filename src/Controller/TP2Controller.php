<?php


namespace App\Controller;

use App\Classes\Alerte;
use App\Classes\GraphGenerator;


class TP2Controller
{
    private const G = 9.81; // m / s-2 // ? kg

    private float $coefFluide;
    private float $massePtMat;
    private float $vitesseInitial;
    private float $angle;
    private float $distance;

    /**
     * TP2Controller constructor.
     * @param float $coefFluide
     * @param float $massePtMat
     * @param float $vitesseInitial
     * @param float $angle
     * @param float $distance
     */
    public function __construct()
    {
        $this->coefFluide = isset($_POST['coefFluide']) ? $_POST['coefFluide'] : 0;
        $this->massePtMat = isset($_POST['massePtMat']) ? $_POST['massePtMat'] : 0;
        $this->vitesseInitial = isset($_POST['vitesseInitial']) ? $_POST['vitesseInitial'] : 0;
        $this->angle = isset($_POST['angle']) ? $_POST['angle'] * (pi() / 180) : 0;
        $this->distance = isset($_POST['distance']) ? $_POST['distance'] : 0;
    }

    public function index(){

        if (isset($_POST['tp2'])) {

            $_SESSION['TP2']['coefFluide'] = $this->coefFluide;
            $_SESSION['TP2']['massePtMat'] = $this->massePtMat;
            $_SESSION['TP2']['vitesseInitial'] = $this->vitesseInitial;
            $_SESSION['TP2']['angle'] = $this->angle;
            $_SESSION['TP2']['distance'] = $this->distance;

            if( !( $this->massePtMat > 0 ) || !( $this->angle > 0 ) || !( $this->vitesseInitial > 0 )  || !( $this->distance > 0 )){
                $_SESSION['ALERTE'][] = new Alerte('danger', "Formulaire TP2 invalide - Les valeurs doivent etre positives");
                header('Location: /');
                exit;
            }


            $k = $this->coefFluide / $this->massePtMat;

            $a = $this->vitesseInitial / $k * cos($this->angle);

            $c = self::G / pow($k, 2);

            $b = $this->vitesseInitial / $k * sin($this->angle) + $c;

            $ydata = [];


            // Negate all data
            for ($i = 0; $i < $this->distance ; ++$i) {
                $ydata[$i] = (($b / $a) * $i) + ($c * log(1 - ($i / $a)));
            }

            $xmax = (pow($this->vitesseInitial, 2) * cos($this->angle) * sin($this->angle)) / ($k * $this->vitesseInitial * sin($this->angle) * self::G);
            $ymax = (($b / $a) * $xmax) + ($c * log(1 - ($xmax / $a)));

            new GraphGenerator($ydata,$xmax * 3,$ymax + 1);

        } else {
            header('Location: /');
            exit;

        }
    }

}