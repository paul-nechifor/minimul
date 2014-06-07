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
    private function citesteVariabile()
    {
        if (isset($_GET['o']))
            $this->ordine = $_GET['o'];
        else
            $this->ordine = "desc";

        if ($this->ordine != "cresc" && $this->ordine != "desc")
            $this->ordine = "desc";
    }
    private function scrieCugetare($articol, $separator)
    {
        $legPerm = str_replace(" ", "_", $articol[0]);
        echo "<div class='cugetare'><a name='", $legPerm, "'></a>";
        $len = count($articol);
        for ($i = 1; $i < $len; $i++)
            echo $articol[$i];
        echo "<p class='extracuge'>Publicat ", $this->dataBuna($articol[0]), ", <a href='#", $legPerm, "'>¶</a>.</p>";
        if ($separator)
            echo "<p class='sep'>* * *</p>";
        echo "</div>";
    }
    public function scrieDreapta()
    {
        echo
            '<div id="ordine">',
            '<h3>Ordine</h3>',
            '<ul>',
                '<li><a href="index.php?o=cresc">vechi</a></li>',
                '<li><a href="index.php?o=desc">noi</a></li>',
            '</ul>',
            '</div>';

    }
    public function scrieContinut()
    {
        $this->citesteVariabile();

        global $articole;
        $nrArt = count($articole);

        if ($this->ordine == "desc")
        {
            for ($i = $nrArt - 1; $i >= 0; $i--)
                $this->scrieCugetare($articole[$i], $i != 0);
        }
        else
        {
            for ($i = 0; $i < $nrArt; $i++)
                $this->scrieCugetare($articole[$i], $i != $nrArt - 1);
        }
    }
}

$index = new Index();
$index->scrie();


?>
