<?php
require_once("baza.php");

class Index extends Afisare
{
    public $acasa = "/";
    public $cod = "minimul";
    public $titlu = "Minimul";
    public $descriere = "Un sit minimalist.";
    public $cuvinteCheie = "minimul, minimalism, bancuri, șah";

    public function scrieContinut()
    {
        echo
            "<p>Aceasta este o colecție de situri mai mici, minimaliste, inspirată de <a href='http://en.wikipedia.org/wiki/Unix_philosophy'>filozifia Unix</a> de a face o singură treabă și bine.</p>",
            "<p>Lista de situri:</p>",
            "<ul>",
            '<li><a href="/identitate">Identitate falsă</a> este o pagină generează date personale false.</li>',
            '<li><a href="/probleme">Probleme de șah</a> este o pagină care arată probleme ce se pot rezolva într-o singură mutare.</li>',
            '<li><a href="/pseudorom">Pseudoromână</a> este o pagină care generează text aleatoriu care imită fonetica limbii române, cum Lorem ipsum imită latina.</li>',
            '<li><a href="/girltalk">Girltalk</a> este o pagină în engleză care alungă liniștea.</li>',
            "</ul>";

    }
    public function scrieSubsol()
    {
        // Nimic, pentru că e pagina principală.
    }
}

$index = new Index();
$index->scrie();

?>
