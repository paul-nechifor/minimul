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
    public $cuvinteCheie = "";

    // Opțional de completat:
    public $alteLiniiHead = array();

    // Pot fi modificate:
    public $limba = "ro";

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
        if ($this->limba == "ro")
            echo '<p>Vezi și alte pagini de pe situl ăsta la <a href="/">minimul.ro</a>.</p>';
        elseif ($this->limba == "en")
            echo '<p>See other pages on this website at <a href="/">minimul.ro</a>.</p>';
    }
    public function scrie()
    {
        global $timp_inceput;

        echo
        '<?xml version="1.0" encoding="utf-8"?>',
        '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">',
        '<html xmlns="http://www.w3.org/1999/xhtml" lang="', $this->limba, '">',
            '<head>',
                '<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>',
                '<meta http-equiv="Content-Language" content="', $this->limba, '"/>',
                '<title>', $this->titlu, '</title>',
                '<meta name="description" content="', $this->descriere, '"/>',
                '<meta name="keywords" content="', $this->cuvinteCheie, '"/>',
                '<meta name="author" content="Paul Nechifor"/>',
                '<link rel="stylesheet" href="/stil.css" type="text/css"/>',
                '<link rel="shortcut icon" href="/_iconite/', $this->cod, '.png" type="image/png"/>',
                implode($this->alteLiniiHead),
                //"<script type=\"text/javascript\">var _gaq=_gaq||[];_gaq.push(['_setAccount','UA-21890175-1']);_gaq.push(['_trackPageview']);(function(){var ga=document.createElement('script');ga.type='text/javascript';ga.async=true;ga.src=('https:'==document.location.protocol?'https://ssl':'http://www')+'.google-analytics.com/ga.js';var s=document.getElementsByTagName('script')[0];s.parentNode.insertBefore(ga, s);})();</script>",
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
