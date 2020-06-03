<?php

namespace App\Controller;

use App\Classes\Alerte;
use App\Classes\GraphGenerator;

class TP3Controller
{
    private const G = 9.81; // m / s-2 // ? kg

    private float $vitesseInitial;
    private float $angle;

    public function __construct()
    {
        $this->vitesseInitial = isset($_POST['vitesseInitial3']) ? $_POST['vitesseInitial3'] : 0;
        $this->angle = isset($_POST['angle3']) ? $_POST['angle3'] * (pi() / 180) : 0;
    }

    public function index(){
        if (isset($_POST['tp3'])) {

            if(  !( $this->angle > 0 ) || !( $this->vitesseInitial > 0 )){
                $_SESSION['ALERTE'][] = new Alerte('danger', "Formulaire TP3 invalide - Les valeurs doivent etre positives");
                header('Location: /');
                exit;
            }

            $ydata = [];

            $delta = pow(tan($this->angle),2);
            $s1 = (- tan($this->angle)) + sqrt($delta) / ( - self::G / (2* pow($this->vitesseInitial,2) * pow(cos($this->angle),2)));
            $s2 = (- tan($this->angle)) - sqrt($delta) / ( -  self::G / (2* pow($this->vitesseInitial,2) * pow(cos($this->angle),2)));

            $xMax = 1000;
            // Negate all data
            for ($i = 0; $i < 10000 ; ++$i) {

                $tmp  = ($i * tan($this->angle)) - ( (self::G * pow($i,2)) / (2 * pow($this->vitesseInitial,2) * pow(cos($this->angle),2)));
                if( $i > 0 && $tmp <= 0){
                    $xMax = $i;
                }
                $ydata[$i] = ($i * tan($this->angle)) - ( (self::G * pow($i,2)) / (2* pow($this->vitesseInitial,2) * pow(cos($this->angle),2)));
            }

            new GraphGenerator($ydata, max($s1,$s2),max($ydata));
        }else {

            header('Location: /');
            exit;
        }
    }
}