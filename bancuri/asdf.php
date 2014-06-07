<?php
require_once("../i/comun.php");

////////////////////////////////////////////////
//logoul să fie o imagine
//fișierul ăsta să conțină totul
//adică și faviconul șî csss-ul

# Clasele necesare =====================================================================================================
class BancuriBD extends BazaDeDate
{
    public static function renumaraCategoriile()
    {
        self::execute("delete from categorii; insert into categorii (nume, bancuri) select categorie as nume, count(categorie) as bancuri from bancuri group by categorie;");
    }
    public static function scoateCRurle()
    {
        self::execute("update bancuri set textul = replace(textul, '\r', '');");
    }
    public static function intoarceCategorii()
    {
        $rezultat = self::executa("select * from categorii;");
        $categorii = array();
        while ($rand = $rezultat->fetch_assoc())
            $categorii[] = $rand;
        return $categorii;     
    }
    public static function intoarceBancuri($categorie, $ordinea, $dupa, $bancuriPePagina)
    {
        $q = "select * from bancuri";

        if ($categorie != "")
            $q .= " where categorie = '$categorie'";

        $q .= " order by ";
        if ($ordinea == "dd" || $ordinea == "") $q .= "data desc";
        else if ($ordinea == "da")              $q .= "data asc";
        else if ($ordinea == "sd")              $q .= "scor desc, data desc";
        else if ($ordinea == "sa")              $q .= "scor asc, data desc";

        $q .= " limit $dupa, $bancuriPePagina;";

        $rezultat = self::executa($q);
        return $rezultat;
    }
}

class Afisare
{
}

# Datele globale =======================================================================================================
$bancuriPePagina = 10;
$motouri = array
(
    "râzi cu diacritice",
    "un sit de bancuri simplu și elegant",
    "cel dintâi sit de bancuri",
    "bancuri atent selectate",
    "bancuri selecte",
    "textul e cel mai important",
    "ăsta e un moto aleatoriu",
    "situl cel mai imitat",
    "un moto foarte pompos",
    "fără bancuri tâmpite",
    "include bancuri clasice",
    "un compendiu de bancuri"
);
$antet =
'<?xml version="1.0" encoding="utf-8"?>'.
'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">'.
'<html xmlns="http://www.w3.org/1999/xhtml" lang="ro">'.
    '<head>'.
        '<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>'.
        '<meta http-equiv="Content-Language" content="ro"/>'.
        '<title>Compendiu de bancuri</title>'.
        '<meta name="description" content="Un sit de bancuri atent selectate."/>'.
        '<meta name="keywords" content="bancuri, glume, amuzament"/>'.
        '<meta name="author" content="Paul Nechifor"/>'.
        '<link rel="stylesheet" href="stil.css" type="text/css"/>'.
        //'<link rel="shortcut icon" href="/imagini/favicon.png" type="image/png"/>'.
        //'<script src="/cod/mootools-1.2.4-core-yc.js" type="text/javascript"></script>'.
    '</head>'.
    '<body>'.
        '<div id="totul">';
$subsol =
        '</div>'.
    '</body>'.
'</html>';

# Funcțiile globale ====================================================================================================
function arataOrdonare($ordinea, $categorie)
{
    $cerereCat = "";
    if ($categorie != "")
        $cerereCat = "&c=$categorie";
    $feluri = array
    (
        array("dd", "recente", ""),
        array("da", "vechi", "&o=da"),
        array("sd", "tari", "&o=sd"),
        array("sa", "slabe", "&o=sa"),
    );

    echo '<h4>Ordonarea:</h4>';
    echo '<ul>';
    foreach ($feluri as $fel)
    {
        $adauga = "";
        if ($ordinea == $fel[0] || $fel[0] == "dd" && $ordinea == "")
            $adauga = " class='curent'";
        echo "<li><a href='/bancuri/index.php?p=l$cerereCat{$fel[2]}'$adauga>{$fel[1]}</a></li>";
    }
    echo '</ul>';
}
function arataCategorii($categorie, $categorii, $bancuriTotale)
{
    echo '<h4>Categorii:</h4>';
    echo '<ul>';
    $adauga = "";
    if ($categorie == "")
        $adauga = " class='curent'";
    echo "<li><a href='/bancuri/index.php?p=l'$adauga>toate ($bancuriTotale)</a></li>";
    foreach($categorii as $cat) 
    {
        $c = $cat["nume"];
        $n = $cat["bancuri"];
        $adauga = "";
        if ($categorie == $c)
            $adauga = " class='curent'";
        echo "<li><a href='/bancuri/index.php?p=l&c=$c'$adauga>$c ($n)</a></li>";
    }
    echo '</ul>';
}
function getNumarBancuri($categorie, $categorii, &$bancuriTotale, &$bancuriTotaleCerute)
{
    $bancuriTotale = 0;
    $bancuriTotaleCerute = 0;
    foreach ($categorii as $cat)
        $bancuriTotale += $cat["bancuri"];
    if ($categorie == "")
        $bancuriTotaleCerute = $bancuriTotale;
    else
        foreach ($categorii as $cat)
            if ($cat["nume"] == $categorie)
            {
                $bancuriTotaleCerute = $cat["bancuri"];
                break;
            }
}
function arataTextul($textul)
{
    $linii = explode("\n", $textul);
    foreach ($linii as $linie)
    {
        // Înlocuiesc spațiul ăla cu NBSP ca să fie mereu de aceeași lungime. Lungimea poate varia pentru că
        // am pus alinierea să fie „justify“.
        if (substr($linie, 0, 4) == "— ")
            $linie = str_replace("— ", "—&nbsp;", $linie);

        if ($linie == "")
            echo '<p>&nbsp;</p>';
        else
            echo "<p>$linie</p>";
    }
}
function arataPagini($bancuriTotaleCerute, $bancuriPePagina, $categorie, $ordinea, $dupa)
{
    echo '<div class="pagini"><p>Pagini: ';
    $p = ceil($bancuriTotaleCerute / $bancuriPePagina);
    for ($i = 1; $i <= $p; $i++)
    {
        $aCategorie = "";
        if ($categorie != "")
            $aCategorie = "&c=$categorie";
        $aOrdinea = "";
        if ($ordinea != "" && $ordinea != "dd")
            $aOrdinea = "&o=$ordinea";
        $aDupa = "";
        if ($i > 1)
            $aDupa = "&d=" . ($i - 1) * $bancuriPePagina;
        $aCurent = "";
        if ($dupa == $aDupa)
            $aCurent = " class='curent'";
        echo "<a href='/bancuri/index.php?p=l$aCategorie$aOrdinea$aDupa'$aCurent>$i</a> ";
    }
    echo '</p></div>';
}

# Primesc datele de intrare ============================================================================================
$pagina = isset($_GET["p"]) ? $_GET["p"] : "i";
$categorie = isset($_GET["c"]) ? str_replace("'", "", $_GET["c"]) : "";
$bancul = isset($_GET["b"]) ? intval($_GET["b"]) : -1;
$ordinea = isset($_GET["o"]) ? $_GET["o"] : "";
$dupa = isset($_GET["d"]) ? intval($_GET["d"]) : 0;

# Verific corectitudinea cererii =======================================================================================
//Veci ca categorie sa fie ceva valid și scurt să nu am XSS XXX
// $dupa trebuie sa fie divizibil cu ceva.

# Încep afișarea paginii ===============================================================================================
date_default_timezone_set("Europe/Bucharest");
BancuriBD::deschide();
echo $antet;

if ($pagina == "l" || $pagina == "i")
{
    $bancuri = BancuriBD::intoarceBancuri($categorie, $ordinea, $dupa, $bancuriPePagina);
    $categorii = BancuriBD::intoarceCategorii();
    getNumarBancuri($categorie, $categorii, $bancuriTotale, $bancuriTotaleCerute);

    echo '<div id="stanga">';
    arataOrdonare($ordinea, $categorie);
    arataCategorii($categorie, $categorii, $bancuriTotale);
    echo '</div>';
    echo '<div id="continut">';

    echo '<div id="antet">';
    echo '<h1><a href="/bancuri/">Compendiu de bancuri</a></h1>';
    echo '<p class="moto">— ' . $motouri[intval(time()/120) % count($motouri)] . ' —</p>'; // Se schimbă la 120 de secunde.
    echo '</div>';

    if ($pagina == "i")
    {
        echo "<div id='intro'><p>Acest sit este un compendiu de bancuri. Zic asta pentru că încerc să adaug doar cele mai bune bancuri într-o formă mai scurtă, fără a le repeta și le scriu într-un mod menit a fi citit, adică cu diacritice și fără semne de punctuație în exces. Dacă vrei să-mi spui ce-ți place și ce nu-ți place la sit poți să mă contactezi aici. Aici adaug bancuri chiar dacă sunt vechi.</p></div>";
    }
    while ($banc = $bancuri->fetch_assoc())
    {
        // Pentru legături la hover va apărea linia dedesupt. La săgeți fără linie, se colorează în verde și roșu.
        echo '<div class="banc">';
        //echo "<h2><a href='/bancuri/index.php?p=b&b={$banc['cod']}'>Bancul nr. {$banc["cod"]}</a></h2>";
        echo '<div class="textul">';
        arataTextul($banc["textul"]);
        echo '</div>';
        echo '<div class="info">';
        echo "<a href='#' class='sus'>↑</a>";
        echo " <a href='#' class='jos'>↓</a> –";
        echo " <span class='scor'>{$banc['scor']} puncte –";
        if ($categorie == "")
            echo " <a href='/bancuri/index.php?p=l&c={$banc['categorie']}' class='categorie'>{$banc['categorie']}</a> –";
        $data = strftime("%d.%m.%Y", $banc["data"]);
        echo " $data –";
        echo " <a href='#' class='perma'>¶{$banc["cod"]}</a>";
        echo '</div>';
        echo '</div>';
    }
    arataPagini($bancuriTotaleCerute, $bancuriPePagina, $categorie, $ordinea, $dupa);

    echo '</div>';
    echo '<div id="dreapta">';
    echo '</div>';
    echo '<div style="clear:both;"></div>';
}
else if ($pagina == "p")
{
    echo "<p>Propune un banc care să fie adăugat.</p>";
}
else if ($pagina == "b") // Arată un singur banc
{
    echo "";
}
else if ($pagina == "d") // Despre sit
{
    echo "<p>Bancurile sunt necenzurate. Mi se pare tâmpit să cenzurezi cuvinte vulgare. Mai bine e să nu le scrii deloc, </p>";
    echo "<p>Sunt toate felurile de bancuri. Unele poate să-ți pară de prost-gust (?) (cum ar fi cele cu bebeluși) sau fără sens (deși au).</p>";
    echo "<p>Nu dau voie să fie adăugat bancuri direct pentru că nu am încredere în oameni să scrie corect. Și eu fac multe greșeli, dar măcar încerc să scriu corect și nu accept lenea ca o scuză. Dacă vrei să fie adăugat un banc pe sit poți să-l trimiți aici. Dacă am greșit ceva la un banc sau crezi că ai o versiune mai bună, tot acolo poți să trimiți.</p>";
}

echo $subsol;
BancuriBD::inchide();
?>
