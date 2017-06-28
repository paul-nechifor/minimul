<?php
require_once("baza.php");

class Index extends Afisare
{
    public $acasa = "/minimul";
    public $cod = "minimul";
    public $titlu = "Minimul";
    public $descriere = "Un sit minimalist.";
    public $cuvinteCheie = "minimul, minimalism, bancuri, șah";

    public $veziSi = false;

    public function scrieContinut()
    {
        echo "<p>Salut, sunt <a href='http://nechifor.net'>Paul Nechifor</a> ",
        'și aici țin niște proiecte mai vechi.',
        '<ul>',
            '<li><a href="/minimul/anglicisme">Dicționar de anglicisme</a></li>',
            '<li><a href="/minimul/indrumar">Scurt îndrumar</a></li>',
            '<li><a href="/minimul/cugetari">Cugetari subite</a></li>',
            '<li><a href="/minimul/rauri/">Râuri</a></li>',
        '</ul>';
    }
}

$index = new Index();
$index->scrie();

?>
