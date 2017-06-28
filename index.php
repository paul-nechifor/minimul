<?php
require_once("baza.php");

class Index extends Afisare
{
    public $acasa = "/";
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
            '<li><a href="/anglicisme">Dicționar de anglicisme</a></li>',
            '<li><a href="/indrumar">Scurt îndrumar</a></li>',
            '<li><a href="/cugetari">Cugetari subite</a></li>',
            '<li><a href="/rauri">Râuri</a></li>',
        '</ul>';
    }
}

$index = new Index();
$index->scrie();

?>
