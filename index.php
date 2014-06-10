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
        'și acesta este serverul în care îmi țin projectele vechi. În ',
        'ordine inversă sunt:</p>',
        '<ul>',
            '<li><a href="http://timr.minimul.ro">timr.minimul.ro</a></li>',
            '<li><a href="http://collegesite2.minimul.ro">collegesite2.minimul.ro</a></li>',
            '<li><a href="http://meetfirefox.minimul.ro">meetfirefox.minimul.ro</a></li>',
            '<li><a href="http://collegesite.minimul.ro">collegesite.minimul.ro</a></li>',
            '<li><a href="http://paulscripts.minimul.ro">paulscripts.minimul.ro</a></li>',
            '<li><a href="http://italiafascista.minimul.ro">italiafascista.minimul.ro</a></li>',
            '<li><a href="http://rstsd.minimul.ro">rstsd.minimul.ro</a></li>',
        '</ul>',
        '<p>Dar inițial acest domeniu a fost făcut să găzduiască ',
        'următoarea colecție de situri mai mici.</p>',
        '<ul>',
            '<li><a href="/anglicisme">Dicționar de anglicisme</a></li>',
            '<li><a href="/indrumar">Scurt îndrumar</a></li>',
            '<li><a href="/identitate">Identitate falsă</a></li>',
            '<li><a href="/probleme">Probleme de șah</a></li>',
            '<li><a href="/pseudorom">Pseudoromână</a></li>',
            '<li><a href="/girltalk">Girltalk</a></li>',
            '<li><a href="/cugetari">Cugetari subite</a></li>',
            '<li><a href="/rauri">Râuri</a></li>',
        '</ul>',
        '<p>Din păcate acestea nu sunt toate. Am pierdut o parte din ',
        'ele.</p>';

    }
}

$index = new Index();
$index->scrie();

?>
