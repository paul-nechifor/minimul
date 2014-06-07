<?php
require_once("baza.php");
require_once("lista.php");


// să scriu pe Gugetări subite că am facut apgina asta.

class Index extends Afisare
{
    public $acasa = "/anglicisme";
    public $cod = "anglicisme";
    public $titlu = "Dicționar de anglicisme";
    public $descriere = "O listă de anglicisme cu traducerea corectă.";
    public $cuvinteCheie = "dicționar, anglicisme, listă, traducere";

    public function scrieDictionarul()
    {
        global $dictionar;

        echo "<table id='dictionar'>";
        
        $mar = count($dictionar);
        for ($i = 0; $i < $mar; $i += 2)
        {
            $cuvtrad = explode("=", $dictionar[$i]);
            $cuv = $cuvtrad[0];
            $trad = $cuvtrad[1];

            $cuvParti = explode(",", $cuv);
            if (count($cuvParti) > 1)
                $cuv = $cuvParti[1] . " " . $cuvParti[0];

            if ($trad[0] == '[')
            {
                $t = substr($trad, 1, -1);
                $trad = "<em>vezi <a href='#$t'>$t</a><em>";
            }
            $trad = implode(', ', explode(',', $trad));

            $ex = "";
            if ($dictionar[$i+1] != null)
            {
                $exParti = explode("=", $dictionar[$i+1]);
                $ex = '<a class="info" href="#">(exemplu)<span>Greșit: ' . $exParti[0] . '<br/>Corect: '. $exParti[1] . '</span></a>';
            }
            echo "<tr><td><a name='{$cuvtrad[0]}'></a>$cuv</td><td>$trad</td><td class='ex'>$ex</td></tr>"; 
        }

        echo "</table>";
    }
    public function scrieContinut()
    {
        echo 
            '<div class="intro">',
                '<p>Această pagină ajută să scapi de anglicismele urâte. Dacă nu vrei să citești introducerea poți să sari direct la <a href="#lista">listă</a>.</p>',
            '</div>',
            '<h2>Motivare</h2>',
            '<blockquote><p>„Apoi noua societate mai obligă pe membrii de ambe sexe să scrie numai românește. [...] Dar presupune că o doamnă voiește să scrie un răvășel trandafiriu, poftim să-l înceapă altfel decât cu: «Mon petit chien bleu»; ce te faci cu statutele? afară numai dacă doamna nu va împinge respectarea lor până a scrie: «Cățelușul meu, albastru»!“</p>',
            '<p class="ladreapta">— <a href="http://ro.wikisource.org/wiki/O_nou%C4%83_societate_rom%C3%A2n%C4%83">Caragiale</a></p></blockquote>',
            '<p>&nbsp;</p>',
            '<p>În engleză există termenul <em>sky scraper</em> (zgârietor de cer) pentru clădirile foarte înalte. În română s-a tradus ca <em>zgârie-nori</em>. Nimeni nu râde de termenul ăsta (și de sutele de cuvinte asemănătoare) pentru că e un cuvânt pe care l-au auzit înainte de cel englezesc. Dar dacă zic șoricel la obiectul care mișcă săgeata pe ecran, toți cocalarii încep a râde și li se pare ridicol ca un cuvânt precum <em>mouse</em> să fie tradus, deși nu există nicio greutate în a-i găsi echivalentul.</p>',
            '<p>Eu sunt de părere că toate cuvintele trebuiesc traduse sau măcar adaptate fonetic. Accept că sunt termeni greu de tradus, dar cel puțin unde există un cuvânt echivalent în română <strong>nu există nicio scuză</strong> pentru a nu-l folosi.</p>',
            '<p>Este păcat să poluăm puritatea fonetică a limbii române cu anglicisme scrise în forma lor originală. Când limba română a început să fie scrisă cu litere latine aceasta avea o scriere complicată menită să evidențieze originea latină ignorând lizibilitatea. S-a remarcat că un român are nevoie să învețe latină înainte să poată să-și scrie limba. Timpul a trecut și scrierea fonetică a câștigat, dar o nouă încercare ne abate. O să trebuiască să învățăm engleză ca să putem scriem limba noastră.</p>',
            '<p>Tu poți preveni asta!</p>',
            '<h2>Motivare în plus</h2>',
            '<p>Un argument des întâlnit este că traducerile sunt de foarte multe ori mai lungi (<em>argumentum ad leneșum</em>) și e mai ușor a zice <em>uebpeige</em> decât <em>pagină de internet</em>. <!--Am să trec peste răspunsul „Du-te-n pizda mă-ti-n SUA, dacă-ți pare româna prea complicată!“, și am să zic:--> Dar se ignoră faptul că nu e nevoie de fiecare dată să fii așa de explicit. La <em>webpage</em> se poate spune direct: <em>pagină</em>, la <em>email</em>: <em>scrisoare</em> (în loc de <em>scrisoare electronică</em>) și în loc să zici că ai dus mașina <em>la service</em> poți să zici că ai dus mașina <em>la reparat</em> (ignorând forma mai lungă: <em>la stația de reparare și întreținere</em>). Ce vreau să zic este că traducerile par lungi pentru că se încearcă imitarea limbii engleze cu folosirea lor, în loc de forma naturală a limbii române. Spre exemplu o propoziție de genul „<em>Please press Next.</em>“ nu se traduce ca „Vă rugăm să apăsați pe Următor.“, ci pur și simplu „Apasă pe Înainte.“.</p>',
            '<p>Limba română, spre diferență de engleză, este una în care cuvintele au foarte multe terminații (pentru gen, număr, persoană, timp ș.a.m.d.). Cuvintele străine folosite cu limba română sunt greu de flexionat. Gândiți-vă la cât de monstruos sună <em>computer-e</em>, <em>a click-a</em>, <em>download-ai</em> și <em>browser-ează</em> față de <em>calculatoare</em>, <em>a apăsa</em>, <em>descărcai</em> și <em>navighează</em> pe lângă faptul că trebuie să schimbi limba cu accentul în mijlocul unui cuvânt.</p>',
            '<h2><a name="lista"></a>Lista</h2>',
            '<p>Dacă mutați șoricelul peste „(exemplu)“ o să apară un chenar cu contraexemplu și exemplu. Exemplele greșite sunt redactate într-o formă haotică cum sunt întâlnite și pe internet, adică ba cu cratimă, ba făra, cu câteva diacritice pe-aici pe-acolo, scriere cu majuscule pe unde nu trebuie și restul.</p>',
            '';

        $this->scrieDictionarul();

        echo '<p>Lista a fost alcătuită folosind <a href="http://i18n.ro/Glosar">glosarul i18n.ro</a>, <a href="http://dexonline.ro/">DEX-ul</a> și căutând cum s-au tradus în franceză anglicismele.</p>',
            '<p>Ca să văd ce cuvinte sunt cel mai des abuzate am indexat mai multe forumuri, am extras cuvintele din mesaje, le-am ordonat după frecvența folosirii și am verificat care se află și în limba engleză.</p>',
            '<p>Lista asta scurtă e doar la început. Poți să ajuți la îmbunătățirea ei trimițându-mi anglicismele des întâlnite care nu-s în ea.</p>',
            '';
    }
}

$index = new Index();
$index->scrie();

?>
