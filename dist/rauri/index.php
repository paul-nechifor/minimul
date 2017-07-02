<?php
require_once("../baza.php");

class Index extends Afisare
{
    public $acasa = "/minimul/rauri";
    public $cod = "r";
    public $titlu = "Râuri";
    public $descriere = "";
    public $cuvinteCheie = "";

    public $alteLiniiHead = array
    (
        '<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>',
        '<script src="script.js"></script>',
    );

    private $culori = array('fb4b2d', 'f3c71c', '809921', '7241bc', 'ff3a90');
    private $piese = array('♠', '♣', '♥', '♦');
    private $lungime = 48;
    private $inaltime = 58;

    public function adaugaCss()
    {
        $this->alteLiniiHead[] = '<style type="text/css">';
        $this->alteLiniiHead[] = '#stanga,#dreapta{width:0}';
        $this->alteLiniiHead[] = '#centru{width:898px}';
        $this->alteLiniiHead[] = '.g{width:'.$this->lungime.'px;height:'.$this->inaltime.'px;background:#EEE;margin:1px;float:left;font-size:'.($this->lungime-1).'px;line-height:'.$this->inaltime.'px;text-align:center}';
        $this->alteLiniiHead[] = '#contine{width:800px;height:540px;margin:0 auto;user-select:none}';
        $this->alteLiniiHead[] = '#scriere{width:498px;margin:0 auto;}';

        $l = '';
        for ($i = 0; $i < 10; $i++)
        {
            $this->alteLiniiHead[] = '.c'. ($i) . "{background:#{$this->culori[$i]}}";
            $l .= ".c$i,";
        }
        $this->alteLiniiHead[] = substr($l, 0, -1) . "{width:{$this->lungime}px;height:{$this->inaltime}px;color:#FFF}";
        $this->alteLiniiHead[] = '</style>';
    }

    public function scrieContinut()
    {
        echo '<div id="contine">';
        for ($i = 0; $i < 8; $i++)
        {
            for ($j = 0; $j < 16; $j++)
            {
                echo
                '<div class="g">',
                    '<div class="c', mt_rand(0, 4), '">', $this->piese[mt_rand(0, 3)], '</div>',
                '</div>';
            }
        }
        echo '</div>';
        echo
        '<div id="scriere">',
        '<h2>Cum se joacă</h2>',
        '<p>Jocul ăsta nu a fost terminat.</p>',
        '<p>Scopul jocului este de a elimina toate piesele de pe tablă. Pentru a se elimina o piesă, se apasă pe ea și apoi pe una identică. Dacă există un drum între ele care nu are mai mult de două unghiuri drepte, atunci piesele vor fi eliminate.</p>',
        '</div>';

    }
}

$index = new Index();
$index->adaugaCss();
$index->scrie();

?>
