<?php
require_once("baza.php");

class BancuriBD extends BazaDeDate
{
    public static $nrBancuri = 0;
    public static $categorii = array();

    public static function intoarceBancuri($categorie, $ordine, $dupa, $numar)
    {
        $q = "select * from bancuri";

        if ($categorie != null)
            $q .= " where categorie = '$categorie'";

        if ($ordine != "asc" && $ordine != "desc")
            $ordine = "desc";

        $q .= " order by cod $ordine limit $dupa, $numar";

        $rezultat = self::executa($q);
        return $rezultat;
    }
    public static function incarcaCategorii()
    {
        $rezultat = self::executa("select categorie, count(categorie) from bancuri group by categorie;");
        while ($rand = $rezultat->fetch_array())
        {
            BancuriBD::$categorii[$rand[0]] = $rand[1];
            BancuriBD::$nrBancuri += $rand[1];
        }
    }
}

class Index extends Afisare
{
    public $acasa = "/";
    public $cod = "bancuri";
    public $titlu = "Compendiu de bancuri";
    public $descriere = "Un sit de bancuri atent selectate.";
    public $cuvinteCheie = "bancuri, glume, amuzant";

    private function scrieBanc($textul)
    {
        $linii = explode("\n", str_replace("\r", "", $textul));
        foreach ($linii as $linie)
        {
            // Înlocuiesc spațiul ăla cu NBSP ca să fie mereu de aceeași lungime. Lungime poate varia pentru că am pus alinierea să fie „justify“.
            if (substr($linie, 0, 4) == "— ")
                $linie = str_replace("— ", "—&nbsp;", $linie);

            if ($linie == "")
                echo '<p>&nbsp;</p>';
            else
                echo "<p>$linie</p>";
        } 
    }
    public function scrieDreapta()
    {
        BancuriBD::incarcaCategorii();
        echo
            '<div id="ordine">',
            '<h3>Ordine</h3>',
            '<ul>',
                '<li><a href="#">vechi</a></li>',
                '<li><a href="#">noi</a></li>',
            '</ul>',
            '</div>',

            '<div id="categorii">',
            '<h3>Categorii</h3>',
            '<ul>';

        $adauga = "";
        echo "<li><a href='#'>toate <span class='paran'>(", BancuriBD::$nrBancuri, ")</span></a></li>";

        foreach(BancuriBD::$categorii as $nume => $nr)
        {
            echo "<li><a href='#'>$nume <span class='paran'>($nr)</span></a></li>";
        }
        echo
            '</ul>',
            '<div>';
    }
    public function scrieContinut()
    {
        echo '<p class="intro">Acest sit este un compendiu de bancuri. Zic asta pentru că încerc să adaug doar cele mai bune bancuri într-o formă mai scurtă, fără a le repeta și le scriu într-un mod menit a fi citit, adică cu diacritice și fără semne de punctuație în exces. Dacă vrei să-mi spui ce-ți place și ce nu-ți place la sit poți să mă contactezi aici. Aici adaug bancuri chiar dacă sunt vechi.</p>';

        $bancuri = BancuriBD::intoarceBancuri(null, "desc", 0, 80);

        while ($banc = $bancuri->fetch_assoc())
        {
            echo '<div class="banc">';
            $this->scrieBanc($banc["textul"]);
            echo '<p class="sep">* * *</p></div>';
        }
    }
}

BancuriBD::deschide();
$index = new Index();
$index->scrie();
BancuriBD::inchide();

?>
