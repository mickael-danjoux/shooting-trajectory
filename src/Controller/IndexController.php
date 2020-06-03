<?php

namespace App\Controller;

class IndexController extends AbstractController
{
    public function index()
    {
        $alertes = $_SESSION['ALERTE'];
        unset ($_SESSION['ALERTE']);

        /** VALUES TP2 **/

        $coefFluide = isset( $_SESSION['TP2']['coefFluide'] ) ? $_SESSION['TP2']['coefFluide'] : 0;
        $massePtMat = isset($_SESSION['TP2']['massePtMat']) ?  $_SESSION['TP2']['massePtMat'] : 0;
        $vitesseInitial = isset($_SESSION['TP2']['vitesseInitial']) ? $_SESSION['TP2']['vitesseInitial'] : 0;
        $angle = isset( $_SESSION['TP2']['angle']) ? $_SESSION['TP2']['angle'] / (pi() / 180) : 0;
        $distance = isset( $_SESSION['TP2']['distance']) ? $_SESSION['TP2']['distance'] : 0;

        $this->render('index/index.php',[
            'alertes' => $alertes,
            'coefFluide' => $coefFluide,
            'massePtMat' => $massePtMat,
            'vitesseInitial' => $vitesseInitial,
            'angle' => $angle,
            'distance' => $distance,

        ]);
    }

    public function posts()
    {
        $this->render('index/posts.php');
    }

    public function post(int $id)
    {
        $this->render('index/post.php', [
            'id' => $id
        ]);
    }
}