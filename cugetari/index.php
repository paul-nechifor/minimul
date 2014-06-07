<?php
require_once("../baza.php");
require_once("texte.php");

class Index extends Afisare
{
    public $acasa = "/cugetari";
    public $cod = "cuge";
    public $titlu = "Cugetări subite";
    public $descriere = "Jurnalul meu pe internet.";
    public $cuvinteCheie = "cugetări subite, jurnal";
    private $luni = array("", "ianuarie", "februarie", "martie", "aprilie", "mai", "iunie", "iulie", "august", "septembrie", "octombrie", "noiembrie", "decembrie");

    private function dataBuna($data)
    {
        $t = substr($data, 11, 5);
        $d = intval(substr($data, 8, 2)) . " " . $this->luni[intval(substr($data, 5, 2))] . " "  . substr($data, 0, 4);
        return "la " . $t . " pe " . $d;
    }
    public function scrieContinut()
    {
        global $articole;
        $nrArt = count($articole);
        for ($i = $nrArt - 1; $i >= 0; $i--)
        {
            $legPerm = str_replace(" ", "_", $articole[$i][0]);
            echo "<div class='cugetare'><a name='", $legPerm, "'></a>";
            #echo "<p class='datacuget'>", $this->dataBuna($articole[$i][0]) ,"</p>";
            $len = count($articole[$i]);
            for ($j = 1; $j < $len; $j++)
                echo "<p>", $articole[$i][$j], "</p>";
            echo "<p class='extracuge'>Publicat ", $this->dataBuna($articole[$i][0]), ", <a href='#", $legPerm, "'>¶</a>.</p>";
            echo "<p class='sep'>* * *</p>";
            echo "</div>";

        }
    }
}

$index = new Index();
$index->scrie();


?>
