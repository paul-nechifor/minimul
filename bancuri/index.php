<?php

// Părțile neimportante vor fi înegrite când treci cu șoricelul deasupra lor.
// Să înnegresc un pic fundalul.


// Să se schimbe titlul în funcție de categorie și pagină

if (isset($_GET["favicon"]))
{
    header("Content-Type: image/png");
    echo base64_decode('iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAGFBMVEX////JycmRkZGoqKjr6+u1tbXZ2dn19fUCFBIBAAAAUUlEQVQozwXBhwEAIAwDIDpS//9YAKAAqO4uAVDBCcAOEIB5QAAGEMAWIIA7QN50cAdIrQtbgBSCAQTumAcE7tgAWeShgpPwBlR3l9rpeQAAfIexASlOmGTXAAAAAElFTkSuQmCC');
    exit();
}
if (isset($_GET["css"]))
{
    header("Content-Type: text/css");
    echo "*{margin:0;padding:0;outline:none}
html{cursor:default;font-family:sans-serif,serif;font-size:13px;background-image:url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAMAAAADCAYAAABWKLW/AAAAGklEQVQY02NgYGDgamhoYABhCAEVYICLAgUAtkMJH4c8RtYAAAAASUVORK5CYII=')}
body{width:800px;margin:0 auto}
p{line-height:1.5;text-align:justify;text-indent:30px;}
a{text-decoration:none}
h1 a{display:block;width:422px;height:52px;margin:5px auto;text-indent:-9999px;background-image:url('data:image/png;base64,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')}
h1 a:hover {background-image:url('data:image/png;base64,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')}
h4{color:#AAA;}
#stanga,#dreapta{width:180px;float:left;padding-top:100px}
#continut{width:438px;float:left;background-color:#FFF;border:1px solid #dedede;}
#stanga ul{list-style:none;color:#888;padding-bottom:10px;}
#stanga a{color:#AAA;padding:0 5px;font-size:12px}
#stanga a.curent {background-color:#EEE}
#stanga a:hover {background-color:#DDD;color:#999}
#stanga a:hover span.paran{color:#999}
#drepturi{color:#AAA;font-size:12px;padding-left:5px;}
#drepturi p{text-align:right}
#intro {margin:10px;padding:10px;background-color:#f7f7f7;border:1px solid #efefef}
.moto{text-align:center;color:#BBB;font-style:italic;font-size:12px;padding-bottom:10px;text-indent:0}
.paran{display:none;}
.banc{padding:10px 20px 0 20px;}
.info{font-size:11px;color:#BBB;text-align:center;border-bottom:1px dotted #CCC;padding:5px 0 10px 0}
.info a{color:#BBB;}
.info a:hover {text-decoration:underline;}
.sus,.jos{font-size:13px}
a.sus{color:#99F;}
a.sus:hover {background:#99F;color:#FFF;text-decoration:none}
a.jos{color:#F99;}
a.jos:hover {background:#F99;color:#FFF;text-decoration:none}


#evident-st{padding:15px 5px;background-color:#fafafa; border:1px solid #f2f2f2; border-right-width:0;}
#evident-st:hover {background-color:#FFF; border:1px solid #efefef; border-right-width:0;}
#evident-st:hover a {color:#777;}
#evident-st:hover .paran{display:inline;color:#999;}

#evident-dr{padding:15px 5px;margin:1px 1px 0 0;}
#evident-dr:hover {margin:0;background-color:#FFF; border:1px solid #efefef; border-left-width:0;}


.pagini p{padding:20px;text-indent:0}
.pagini a{margin:0 1px;padding:0 2px;background-color:#DDD;color:#444}
.pagini a.curent{background-color:#BBB;}
.pagini a:hover {background-color:#999;color:#000;}";
    exit;
}


class BancuriBD
{
    const HOSTNAME = "";
    const USER = "root";
    const PASSWORD = "serenloft";
    const DATABASE = "alfa";

    private static $mysqli = NULL;

    public static function deschide()
    {
        self::$mysqli = new mysqli(self::HOSTNAME, self::USER, self::PASSWORD, self::DATABASE);
    }
    public static function inchide()
    {
        self::$mysqli->close();
    }
    public static function executa($comanda)
    {
        $rezultat = self::$mysqli->query($comanda);
        if (!$rezultat) die("Comanda <b>$comanda</b>. Eroare: <b>" . self::$mysqli->error . "</b>");
        return $rezultat;
    }
    public static function renumaraCategoriile()
    {
        self::execute("delete from categorii; insert into categorii (nume, bancuri) select categorie as nume, count(categorie) as bancuri from bancuri group by categorie;");
    }
    public static function scoateCRurile()
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
        if ($ordinea == "dd" || $ordinea == "")
            $q .= "data desc";
        else if ($ordinea == "da")
            $q .= "data asc";
        else if ($ordinea == "sd")
            $q .= "scor desc, data desc";
        else if ($ordinea == "sa")
            $q .= "scor asc, data desc";

        $q .= " limit $dupa, $bancuriPePagina;";

        $rezultat = self::executa($q);
        return $rezultat;
    }
}

class Afisare
{
    public static $bancuriPePagina = 10;
    public static $motouri = array
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
        "simplu",
        "minimalist",
        "un compendiu de bancuri"
    );
    public static $antet = array
    (
        '<?xml version="1.0" encoding="utf-8"?>',
        '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">',
        '<html xmlns="http://www.w3.org/1999/xhtml" lang="ro">',
            '<head>',
                '<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>',
                '<meta http-equiv="Content-Language" content="ro"/>',
                '<title>Compendiu de bancuri</title>',
                '<meta name="description" content="Un sit de bancuri atent selectate."/>',
                '<meta name="keywords" content="bancuri, glume, amuzament"/>',
                '<meta name="author" content="Paul Nechifor"/>',
                '<link rel="stylesheet" href="index.php?css" type="text/css"/>',
                '<link rel="shortcut icon" href="index.php?favicon" type="image/png"/>',
                "<script type=\"text/javascript\">var _gaq=_gaq||[];_gaq.push(['_setAccount','UA-21890175-1']);_gaq.push(['_trackPageview']);(function(){var ga=document.createElement('script');ga.type='text/javascript';ga.async=true;ga.src=('https:'==document.location.protocol?'https://ssl':'http://www')+'.google-analytics.com/ga.js';var s=document.getElementsByTagName('script')[0];s.parentNode.insertBefore(ga, s);})();</script>",
            '</head>',
            '<body>'
    );
    public static $subsol = array
    (
            '</body>',
        '</html>'
    );
    public static $intro = "Acest sit este un compendiu de bancuri. Zic asta pentru că încerc să adaug doar cele mai bune bancuri într-o formă mai scurtă, fără a le repeta și le scriu într-un mod menit a fi citit, adică cu diacritice și fără semne de punctuație în exces. Dacă vrei să-mi spui ce-ți place și ce nu-ți place la sit poți să mă contactezi aici. Aici adaug bancuri chiar dacă sunt vechi.";
    public static $drepturi = "<p>Drepturile de autor tra la al șa la tra l a u a ha ha numica nu vi lașilava te cumore destel desvac.</p>";

    public static $pagina = "i";
    public static $categorie = "";
    public static $bancul = -1;
    public static $ordinea = "";
    public static $dupa = 0;

    public static $categorii = NULL;
    public static $bancuriTotale = 0;
    public static $bancuriTotaleCerute = 0;

    /** Prima funcție care este apelată. */
    public static function start()
    {
        // Trebuie să desclar așa ca să pot să structurez liniile, dar să nu las spații inutile după.
        self::$antet = implode(self::$antet);
        self::$subsol = implode(self::$subsol);

        $eroare = self::citesteVariabilele();

        if ($eroare != FALSE)
        {
            self::scrieEroarea($eroare);
            exit;
        }

        BancuriBD::deschide();

        self::$categorii = BancuriBD::intoarceCategorii();
        self::calculeazaNumarDeBancuri();

        date_default_timezone_set("Europe/Bucharest");

        self::scrieAntetContinut();

        if (self::$pagina == "l" || self::$pagina == "i")
            self::afiseazaLista();
        elseif (self::$pagina == "b")
            self::afiseazaBancul();
        elseif (self::$pagina == "d")
            self::afiseazaDespre();
        elseif (self::$pagina == "p")
            self::afiseazaPropune();

        self::scrieSubsolContinut();

        BancuriBD::inchide();
    }
    /** Citește variabilele GET și verifică dacă sunt valide. Dacă nu, întoarce un string care explică eroarea. */
    public static function citesteVariabilele()
    {
        if (isset($_GET["p"]))
            self::$pagina = $_GET["p"];
        if (isset($_GET["c"]))
            self::$categorie = $_GET["c"];
        if (isset($_GET["b"]))
            self::$bancul = $_GET["b"];
        if (isset($_GET["o"]))
            self::$ordinea = $_GET["o"];
        if (isset($_GET["d"]))
            self::$dupa = $_GET["d"];

        self::$categorie = str_replace("'", "", self::$categorie);

        return FALSE;
    }
    /** Termină scriptul prematur în caz de eroare la interpretarea datelor GET. */
    public static function scrieEroarea($textulErorii)
    {
        echo self::antet, "<p>$textulErorii</p>", self::subsol;
    }
    public static function calculeazaNumarDeBancuri()
    {
        foreach (self::$categorii as $cat)
            self::$bancuriTotale += $cat["bancuri"];
        if (self::$categorie == "")
            self::$bancuriTotaleCerute = self::$bancuriTotale;
        else
            foreach (self::$categorii as $cat)
                if ($cat["nume"] == self::$categorie)
                {
                    self::$bancuriTotaleCerute = $cat["bancuri"];
                    break;
                }
    }
    public static function scrieAntetContinut()
    {
        echo self::$antet,
             '<div id="stanga">',
             '<div id="evident-st">';
        if (self::$pagina == "l" || self::$pagina == "i")
        {
            self::scrieOrdonare();
            self::scrieCategorii();
        }
        echo '</div>',
             '</div>',
             '<div id="continut">',
             '<div id="antet">',
             '<h1><a href="/bancuri/">Compendiu de bancuri</a></h1>',
             '<p class="moto">— ' . self::$motouri[intval(time()/120) % count(self::$motouri)] . ' —</p>', // Se schimbă la 120 de secunde
             '</div>';

        if (self::$pagina == "i")
            echo '<div id="intro"><p>' . self::$intro . '</p></div>';
    }
    public static function scrieSubsolContinut()
    {
        echo '</div>',
             '<div id="dreapta">',
             '<div id="evident-dr">',
             '<div id="drepturi">',
             self::$drepturi,
             '</div>',
             '</div>',
             '</div>',
             '<div style="clear:both;"></div>',
             self::$subsol;
    }
    public static function scrieOrdonare()
    {
        $cerereCat = "";
        if (self::$categorie != "")
            $cerereCat = '&c=' . self::$categorie;
        $feluriDeOrdine = array
        (
            array("dd", "recente", ""),
            array("da", "vechi", "&o=da"),
            array("sd", "tari", "&o=sd"),
            array("sa", "slabe", "&o=sa"),
        );

        echo '<h4>Ordonarea:</h4>',
             '<ul>';
        foreach ($feluriDeOrdine as $fel)
        {
            $adauga = "";
            if (self::$ordinea == $fel[0] || $fel[0] == "dd" && self::$ordinea == "")
                $adauga = " class='curent'";
            echo "<li><a href='/bancuri/index.php?p=l$cerereCat{$fel[2]}'$adauga>{$fel[1]}</a></li>";
        }
        echo '</ul>';
    }
    public static function scrieCategorii()
    {
        echo '<h4>Categorii:</h4>',
             '<ul>';
        $adauga = "";
        if (self::$categorie == "")
            $adauga = " class='curent'";
        echo "<li><a href='/bancuri/index.php?p=l'$adauga>toate <span class='paran'>(" . self::$bancuriTotale . ")</span></a></li>";

        foreach(self::$categorii as $cat)
        {
            $c = $cat["nume"];
            $n = $cat["bancuri"];
            $adauga = "";
            if (self::$categorie == $c)
                $adauga = " class='curent'";
            echo "<li><a href='/bancuri/index.php?p=l&c=$c'$adauga>$c <span class='paran'>($n)</span></a></li>";
        }
        echo '</ul>';
    }
    public static function afiseazaLista()
    {
        $bancuri = BancuriBD::intoarceBancuri(self::$categorie, self::$ordinea, self::$dupa, self::$bancuriPePagina);

        while ($banc = $bancuri->fetch_assoc())
        {
            // Pentru legături la hover va apărea linia dedesupt. La săgeți fără linie, se colorează în verde și roșu.
            echo '<div class="banc">',
                 '<div class="textul">';
            self::scrieTextul($banc["textul"]);
            echo '</div>',
                 '<div class="info">',
                 "<a href='#' class='sus'>↑</a>",
                 " <a href='#' class='jos'>↓</a> –",
                 " <span class='scor'>{$banc['scor']} puncte –";
            if (self::$categorie == "")
                echo " <a href='/bancuri/index.php?p=l&c={$banc['categorie']}' class='categorie'>{$banc['categorie']}</a> –";
            $data = strftime("%d.%m.%Y", $banc["data"]);
            echo " $data –",
                 " <a href='/bancuri/index.php?p=b&b={$banc['cod']}' class='perma'>¶{$banc["cod"]}</a>",
                 '</div>',
                 '</div>';
        }
        self::scriePagini();
    }
    public static function afiseazaBancul()
    {
    }
    public static function afiseazaDespre()
    {
    }
    public static function afiseazaPropune()
    {
    }
    public static function scrieTextul($textul)
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
    public static function scriePagini()
    {
        echo '<div class="pagini"><p>Pagini: ';
        $p = ceil(self::$bancuriTotaleCerute / self::$bancuriPePagina);
        for ($i = 1; $i <= $p; $i++)
        {
            $aCategorie = "";
            if (self::$categorie != "")
                $aCategorie = '&c=' . self::$categorie;
            $aOrdinea = "";
            if (self::$ordinea != "" && self::$ordinea != "dd")
                $aOrdinea = '&o=' . self::$ordinea;
            $aDupa = "";
            $numarulDupa = ($i - 1) * self::$bancuriPePagina;
            if ($i > 1)
                $aDupa = '&d=' . $numarulDupa;
            $aCurent = "";
            if ($numarulDupa == self::$dupa)
                $aCurent = " class='curent'";
            echo "<a href='/bancuri/index.php?p=l$aCategorie$aOrdinea$aDupa'$aCurent>$i</a> ";
        }
        echo '</p></div>';
    }
}

Afisare::start();
?>
