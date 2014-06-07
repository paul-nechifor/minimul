<?php
require_once("../baza.php");

// Să fac niște butoane bune pentru Souție și Altă problemă.
// Apasă spațiu sau oricare dintre săgeți pentru a reîncărca pagina (cu altă problemă) (dar arată soluția înainte).
// Oare să fac un fel de permalink ca să poată lumea să trimită la o anumită problemă?

$numarDeProbleme = 29584;
$explicatii = array
(
    "Albul mută. Ia piesa neprotejată.",//NU
    "Albul mută. Mută într-ul loc neatacat.",//NU
    "Albul mută. Găsește șahul.",//NU
    "Albul mută. Găsește furca.",
    "Albul mută. Find the pin.",
    "Albul mută. Găsește matul într-o mutare.",
    "Albul mută. Găsește matul în două mutări.",
    "Albul mută. Evită matul."
);
$claseCss = array
(
    "_" => "",
    "p" => "pn",
    "b" => "nn",
    "n" => "cn",
    "r" => "tn",
    "q" => "dn",
    "k" => "rn",
    "P" => "pa",
    "B" => "na",
    "N" => "ca",
    "R" => "ta",
    "Q" => "da",
    "K" => "ra"
);

function problemaAleatoare()
{
    global $numarDeProbleme;

    BazaDeDate::deschide();
    $cod = mt_rand(0, $numarDeProbleme - 1);
    $rez = BazaDeDate::executa("select problema from probleme where cod = $cod;");
    $r = $rez->fetch_array();
    BazaDeDate::inchide();
    return $r[0];
}

function afisareTabla($problema)
{
    global $claseCss;
    $tabla = array();
    for ($i = 0; $i < 8; $i++)
    {
        $tabla[] = array();
        for ($j = 0; $j < 8; $j++)
            $tabla[$i][] = "_";
    }

    $k = 0;
    $nr = 0;

    $len = strlen($problema);
    $ord0 = ord("0");
    $ord9 = ord("9");
    for ($c = 0; $c < $len; $c++)
    {
        $chr = $problema[$c];
        if (ord($chr) >= $ord0 && ord($chr) <= $ord9)
            $nr = $nr * 10 + $chr;
        else
        {
            $k += $nr;
            $nr = 0;
            $tabla[$k / 8][$k % 8] = $chr;
            $k += 1;
        }
    }

    echo '<div id="divtabla">';
    echo '<div id="usus"></div><div id="ust"></div>';
    echo '<table id="tabla">';
    for ($i = 0; $i < 8; $i++)
    {
        echo '<tr>';
        for ($j = 0; $j < 8; $j++)
        {
            $numePatratel = chr(ord("a") + $j) . (8 - $i);
            $culoare = "";
            if ((8 * $i + $j + (($i%2==0)?0:1)) % 2 == 0)
                $culoare = "alb";
            else
                $culoare = "negru";
            $piesa = "";

            if ($tabla[$i][$j] != "_")
                $piesa = "<div class='" . $claseCss[$tabla[$i][$j]] . "'></div>";
            echo "<td id='$numePatratel'><div class='$culoare'>$piesa</div></td>";
        }
        echo '</tr>';
    }
    echo '</table>';
    echo '<div id="udr"></div><div id="ujos"></div>';
    echo '</div>';
}

echo '<?xml version="1.0" encoding="utf-8"?>',
'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">',
'<html xmlns="http://www.w3.org/1999/xhtml" lang="ro">',
    '<head>',
        '<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>',
        '<meta http-equiv="Content-Language" content="ro"/>',
        '<title>Probleme de șah</title>',
        '<meta name="description" content="Zeci de mii de probleme de șah."/>',
        '<meta name="keywords" content="probleme, șah, sah"/>',
        '<meta name="author" content="Paul Nechifor"/>',
        '<link rel="stylesheet" type="text/css" href="stil.css"/>',
        '<link rel="shortcut icon" href="/_iconite/probleme.png" type="iamge/png"/>',
        '<script src="script.js" type="text/javascript"></script>',
        Afisare::$googleAnalyticsCode,
    '</head>',
    '<body>';

$prob = problemaAleatoare();
$solutie = substr($prob, 1, 4);
afisareTabla(substr($prob, 5));

echo '<div id="textul"><p><a id="sol" href="#" class="' . $solutie . '">Soluție</a><a id="alt" href="/probleme">Altă problemă</a><span id="explicatie">' . $explicatii[$prob[0]] . '</span></p></div>';

echo
    '<div id="continut">',
    '<h1><a href="index.php">Probleme de șah</a></h1>',
    '<div id="text">',
    '<p>O pagină simplă cu probleme de șah. Nu e mult de citit pe aici, dar sunt multe ore de pierdut la nevoie. Sunt '.$numarDeProbleme.' probleme de șah aici. Dacă e nevoie pot să mai adaug.</p>',
    '</div>',
    '</div>',
    '<div id="ultima"><p>Vezi și alte pagini de pe situl ăsta la <a href="/">minimul.ro</a>.</p></div>';

echo '</body></html><!--', (microtime(true) - $timp_inceput), '-->';
?>
