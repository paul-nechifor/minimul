<?php
require_once("../baza.php");

class Index extends Afisare
{
    public $acasa = "/girltalk";
    public $cod = "girltalk";
    public $titlu = "Girltalk";
    public $descriere = "Beautiful 13 minute loop of two girls talking simultaneously.";
    public $cuvinteCheie = "";
    public $limba = "en";

    public function scrieContinut()
    {
        echo
        '<p style="text-indent:0;text-align:center">Are you alone now?<br/>This will make you happy that you are.</p>',
        '<embed src="loop.mp3" autostart="true" hidden="true"/>';
    }
}

$index = new Index();
$index->scrie();

?>
