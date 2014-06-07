<?php
require_once("../baza.php");

class Index extends Afisare
{
    public $acasa = "/rauri";
    public $cod = "r";
    public $titlu = "Râuri";
    public $descriere = "";
    public $cuvinteCheie = "";

    public $alteLiniiHead = array
    (
        '<script src="/_scripturi/jquery.min.js" type="text/javascript"></script>',
        '<script src="script.js" type="text/javascript"></script>',
    );

    private $culori = array('fb4b2d', 'db6e2c', 'fb9928', 'f3c71c', 'a7c71c', '809921', '86c1a1', '7241bc', 'c53aa9', 'ff3a90');
    private $piese = array('♠', '♣', '♥', '♦');
    private $lungime = 48;
    private $inaltime = 58;

    public function adaugaCss()
    {
        $this->alteLiniiHead[] = '<style type="text/css">';
        $this->alteLiniiHead[] = '#stanga,#dreapta{width:0}';
        $this->alteLiniiHead[] = '#centru{width:898px}';
        $this->alteLiniiHead[] = '.g{width:'.$this->lungime.'px;height:'.$this->inaltime.'px;background:#EEE;margin:1px;float:left;font-size:'.($this->lungime-1).'px;line-height:'.$this->inaltime.'px;text-align:center}';
        $this->alteLiniiHead[] = '#contine{width:800px;height:540px;margin:0 auto}';
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
                    '<div class="c', mt_rand(0, 9), '">', $this->piese[mt_rand(0, 3)], '</div>',
                '</div>';
            }
        }
        echo '</div>';
        echo
        '<div id="scriere">',
        '<h2>Cum se joacă</h2>',
        '<p>Scopul jocului este de a elimina toate piesele de pe tablă. Pentru a se elimina o piesă, se apasă pe ea și apoi pe una identică. Dacă există un drum între ele care nu are mai mult de două unghiuri drepte, atunci piesele vor fi eliminate.</p>',
        '</div>';

    }
}

$index = new Index();
$index->adaugaCss();
$index->scrie();

?>
