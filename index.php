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
        echo
            "<p>Aceasta este o colecție de situri mai mici, minimaliste, inspirată de <a href='http://en.wikipedia.org/wiki/Unix_philosophy'>filozifia Unix</a> de a face o singură treabă și bine.</p>",
            "<p>Lista de situri:</p>",
            "<ul>",
            '<li><a href="/anglicisme">Dicționarul de anglicisme</a> te ajută să folosești cuvintele românești corecte pentru termenii din engleză care nu se potrivesc în limba română, cum este <em><a href="http://localhost/anglicisme/#download">download</a></em>.</li>',
            '<li><a href="/indrumar">Scurt îndrumar</a> este o pagină care-ți spune cum se formatează corect limba română. Calitatea scrierii a scăzut drastic de la răspândirea internetului și prin această pagină vreau să redresez un pic situația.</li>',
            '<li><a href="/identitate">Identitate falsă</a> este o pagină generează date personale false. Așa ceva e folositor când trebuie să te înscrii pe un sit și nu vrei să dai datele tale personale.</li>',
            '<li><a href="/anti">Anti</a> e-o pagină care pune un cerc tăiat roșu peste alte pagini cum ar fi <a href="/anti/?url=http://en.wikipedia.org/wiki/Main_Page">Wikipedia</a>.</li>',
            '<li><a href="/probleme">Probleme de șah</a> este o pagină care arată probleme ce se pot rezolva într-o singură mutare.</li>',
            '<li><a href="/pseudorom">Pseudoromână</a> este o pagină care generează text aleatoriu care imită fonetica limbii române, cum Lorem ipsum imită latina. Cu generatorul ăsta mi-am publicat prima carte <em><a href="/pseudorom/gipa_ver_lesimar.pdf">Gipă ver leșimar</a>.</em></li>',
            '<li><a href="/girltalk">Girltalk</a> este o pagină în engleză care alungă liniștea.</li>',
            '<li><a href="/cugetari">Cugetari (mai mult sau mai puțin) subite</a> este jurnalul meu public.</li>',
            "</ul>";

    }
}

$index = new Index();
$index->scrie();

?>
