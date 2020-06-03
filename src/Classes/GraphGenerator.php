<?php


namespace App\Classes;
use Amenadiel\JpGraph\Graph;
use Amenadiel\JpGraph\Plot;

class GraphGenerator
{
    private array $yData;
    private float  $xMax, $yMax;

    /**
     * GraphGenerator constructor.
     * @param array $yData
     * @param float $xMax
     * @param float $yMax
     */
    public function __construct(array $yData, float $xMax, float $yMax)
    {
        $this->yData = $yData;
        $this->xMax = $xMax;
        $this->yMax = $yMax;
        $this->createGraph($this->yData ,$this->xMax,$this->yMax );
    }

    public function createGraph($ydata, $xmax = 500, $ymax = 500)
    {
        // The code to setup a very basic graph
        $__width = 1600;
        $__height = 1200;
        $graph = new Graph\Graph($__width, $__height);
        $graph->SetScale('linlin', 0, $ymax , 0, $xmax );
        $graph->SetMargin(30, 15, 40, 30);
        $graph->SetMarginColor('white');
        $graph->SetFrame(true, 'blue', 3);

        $graph->title->Set('Label background');
        $graph->title->SetFont(FF_ARIAL, FS_BOLD, 12);

        $graph->subtitle->SetFont(FF_ARIAL, FS_NORMAL, 10);
        $graph->subtitle->SetColor('darkred');
        $graph->subtitle->Set('"LABELBKG_NONE"');

        $graph->SetAxisLabelBackground(LABELBKG_NONE, 'orange', 'red', 'lightblue', 'red');

        // Use Ariel font
        $graph->xaxis->SetFont(FF_ARIAL, FS_NORMAL, 9);
        $graph->yaxis->SetFont(FF_ARIAL, FS_NORMAL, 9);
        $graph->xgrid->Show();

        // Create the plot line
        $p1 = new Plot\LinePlot($ydata);
        $graph->Add($p1);

        // Output graph
        $graph->Stroke();
    }



}