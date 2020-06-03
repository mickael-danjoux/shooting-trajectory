<?php


namespace App\Controller;


use App\Classes\Alerte;
use App\Classes\GraphGenerator;

class TP4Controller
{
    public const CALIBER_TO_MM = 25.4;
    public const AIR_DENSITY = 1.225;
    public const G  = 9.81;

    public float $bulletDiameter; //0.01 m
    public float $bulletWeight; //0.010 kg
    public float $initialSpeed; // 850 m/s
    public float $angle; // 4 °

    public function __construct()
    {
        $this->bulletDiameter = isset($_POST['bulletDiameter4']) ? $_POST['bulletDiameter4'] : 0;
        $this->bulletWeight = isset($_POST['bulletWeight4']) ? $_POST['bulletWeight4'] * (pi() / 180) : 0;
        $this->initialSpeed = isset($_POST['initialSpeed4']) ? $_POST['initialSpeed4'] * (pi() / 180) : 0;
        $this->angle = isset($_POST['angle4']) ? $_POST['angle4'] * (pi() / 180) : 0;
    }


    public function index(){
        if (isset($_POST['tp4'])) {
            $data = $this->createPlots();
            new GraphGenerator($data,100,5);

        }else {

            header('Location: /');
            exit;
        }
    }



    private function calculateBalisticCoefficient(float $speed): float
    {
        // Cx = m*(v2² - v1²) /  (d * (S*v²*ρ ))
        $deltaSquareSpeed = (pow($speed * 0.99, 2) - pow($speed, 2));
        // $powerResistance = $this->calculatePowerResistance($speed);
        $surface = (pi() * pow($this->bulletDiameter / 2, 2));
        $squareSpeed = pow(0.99* $speed, 2);
        return ($this->bulletWeight * $deltaSquareSpeed) / ($this->bulletDiameter * $surface * $squareSpeed * self::AIR_DENSITY);
        // return (2 * $powerResistance) / ($surface * $squareSpeed * self::AIR_DENSITY);
    }

    private function calculatePowerResistance(float $speed): float
    {
        $deltaSquareSpeed = (pow($speed * 0.99, 2) - pow($speed, 2));
        ///  $Fd = (0.5 * $this->bulletWeight * $squareSpeed) / $this->bulletDiameter;
        $surface = (pi() * pow($this->bulletDiameter / 2, 2));
        //  return $Fd;
        return $fd = 0.3 * self::AIR_DENSITY * $surface * 0.3 * (pow($speed * 0.99, 2) - pow($speed, 2));
    }

    private function createPlots(): array
    {
        $datas = [];
        $speed = $this->initialSpeed;
        // calcul des données d'ordonnées
        for ($i = 0; $i <= 10000; $i++) {
            $datas[$i] = ($i * tan($this->angle)) - ((self::G * pow($i, 2)) / (2 * pow($speed, 2) * pow(cos($this->angle), 2)));
            $fd = $this->calculatePowerResistance($speed);
            // echo("speedBefore: ". $speed. "<br>");
            $speed = ($fd * $speed)  + $speed;
            //   echo("cx: ". $fd). "<br>";
            //   echo("speedAfter: ". $speed. "<br>");
            //   echo("------------------------END--------------------------------------- ". "<br>". "<br>");
            if ($speed <= pow(9.9881371448434, -30)) {
                break;
            }
        }
        return $datas;
    }

}