<?php

$timp_inceput = microtime(true);

class BazaDeDate
{
    const HOSTNAME = "";
    const USER = "";
    const PASSWORD = "";
    const DATABASE = "";

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
}

class Afisare
{
    // Trebuiesc completate:
    public $acasa = "";
    public $cod = "";
    public $titlu = "";
    public $descriere = "";

    // Opțional de completat:
    public $alteLiniiHead = array();

    // Pot fi modificate:
    public $limba = "ro";
    public $veziSi = true;

    public static $googleAnalyticsCode = "<script type=\"text/javascript\">var _gaq=_gaq||[];_gaq.push(['_setAccount','UA-21890175-1']);_gaq.push(['_trackPageview']);(function(){var ga=document.createElement('script');ga.type='text/javascript';ga.async=true;ga.src=('https:'==document.location.protocol?'https://ssl':'http://www')+'.google-analytics.com/ga.js';var s=document.getElementsByTagName('script')[0];s.parentNode.insertBefore(ga, s);})();</script>";

    public function scrieStanga()
    {
        echo "&nbsp;";
    }
    public function scrieDreapta()
    {
        echo "&nbsp;";
    }
    public function scrieAntet()
    {
        echo '<h1><a href="', $this->acasa, '" class="', $this->cod, '">', $this->titlu, '</a></h1>';
    }
    public function scrieContinut()
    {
    }
    public function scrieSubsol()
    {
        echo '<p>';
        if ($this->veziSi)
        {
            if ($this->limba == "ro")
                echo 'Vezi și alte pagini de pe <a href="/minimul">situl ăsta</a>.<br/>';
            elseif ($this->limba == "en")
                echo 'See other pages on <a href="/minimul">this website</a>.<br/>';
        }

        echo '(<a href="http://creativecommons.org/licenses/by-nc/3.0/ro/">cc</a>) 2010&ndash;2017 Paul Nechifor</p>';
    }
    public function scrie()
    {
        global $timp_inceput;

        echo
        '<!DOCTYPE html>',
        '<html lang="', $this->limba, '">',
            '<head>',
                '<meta charset="utf-8">',
                '<meta http-equiv="x-ua-compatible" content="ie=edge">',
                '<title>', $this->titlu, '</title>',
                '<meta name="viewport" content="width=device-width,initial-scale=1">',
                '<meta name="description" content="', $this->descriere, '">',
                '<link href="https://fonts.googleapis.com/css?family=Anton&amp;subset=latin-ext" rel="stylesheet">',
                '<link rel="stylesheet" href="/minimul/stil.css">',
                '<link rel="shortcut icon" href="/minimul/_iconite/', $this->cod, '.png" type="image/png">',
                implode($this->alteLiniiHead),
                //Afisare::$googleAnalyticsCode,
            '</head>',
            '<body>',
                '<div id="stanga">';
        $this->scrieStanga();
        echo
                '</div>',
                '<div id="centru">',
                    '<div id="antet">';
        $this->scrieAntet();
        echo
                    '</div>',
                    '<div id="continut">';
        $this->scrieContinut();
        echo
                    '</div>',
                    '<div id="subsol">';
        $this->scrieSubsol();
        echo
                    '</div>',
                '</div>',
                '<div id="dreapta">';
        $this->scrieDreapta();
        echo
                '</div>',
            '</body>',
        '</html><!--', sprintf("%.8f", microtime(true) - $timp_inceput), '-->';
    }
}

?>
