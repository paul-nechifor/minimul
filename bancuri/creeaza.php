<?php
require_once("../i/comun.php");

class BancuriBD extends BazaDeDate
{
    public static function refaBazaDeDate()
    {
        self::deschide();

        $comenzi = array
        (
            "drop table if exists bancuri;",
            "create table bancuri
            (
                cod        int not null auto_increment,
                scor       int not null,
                sus        int not null,
                jos        int not null,
                data       int not null,
                categorie  char(30) not null,
                textul     varchar(6000) not null,

                primary key(cod)
            );",
            "drop table if exists categorii;",
            "create table categorii
            (
                nume       char(30) not null,
                bancuri    int not null
            );"
        );

        $fisier = file_get_contents("lista.sql");
        $linii = explode("\n", $fisier);
        foreach ($linii as $linie)
            $comenzi[] = $linie;

        echo "<h3>Am făcut asta</h3><pre>";

        // Re-creez toate tabelele.
        foreach ($comenzi as $comanda)
        {
            if ($comanda == "") continue;
            echo $comanda . "\n";
            self::executa($comanda);
        }
        echo "</pre>";

        self::inchide();
    }
}

BancuriBD::refaBazaDeDate();

?>
