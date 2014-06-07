<?php
require_once("../baza.php");


// să scriu pe Gugetări subite că am facut apgina asta.

class Index extends Afisare
{
    public $acasa = "/indrumar";
    public $cod = "indrumar";
    public $titlu = "Scurt îndrumar";
    public $descriere = "O pagină cu o serie de reguli care te va ajuta să formatezi mai bine textele scrise în limba română.";
    public $cuvinteCheie = "îndrumar, tipografie, diacritice, punctuație, scriere corectă";

    public $noteDeSubsol = array();

    public function blocGresit($continut)
    {
        //return '<div class="blocgresit"><div class="indic"><p>Greșit:</p></div><div class="textul">' . $continut . '</div><div class="cf"></div></div>';
        return '<blockquote class="blocgresit">' . str_replace('<p>', '<p class="fa">', $continut) . '</blockquote>';
    }
    public function blocCorect($continut)
    {
        //return '<div class="bloccorect"><div class="indic"><p>Corect:</p></div><div class="textul">' . $continut . '</div><div class="cf"></div></div>';
        return '<blockquote class="bloccorect">' . str_replace('<p>', '<p class="fa">', $continut) . '</blockquote>';
    }
    public function notaDeSubsol($textul)
    {
        $this->noteDeSubsol[] = $textul;
        $n = count($this->noteDeSubsol);
        return "<sup><a class='notasubsol' href='#n$n'>$n</a></sup>";
    }
    public function afisareNoteDeSubsol()
    {
        $ret = '<div id="notedesubsol"><div id="baranote"></div>';
        $n = count($this->noteDeSubsol);
        for ($i = 0; $i < $n; $i++)
            $ret .= '<p><a name="n' . ($i+1) .'"></a><sup>' . ($i+1) . '</sup>' . $this->noteDeSubsol[$i] . '</p>';
        $ret .= '</div>';
        return $ret;
    }

    public function scrieContinut()
    {
        echo
            '<p>Această pagină conține o serie de reguli care te va ajuta să formatezi mai bine textele scrise în limba română.</p>',
            //'<p>O greșeală frecventă este scrierea limbii română cu normele altor limbi.</p>',
            '<h2>Diacriticele</h2>',
            '<p>Limba română se scrie <strong>mereu</strong> cu diacritice. Nu există nicio scuză pentru a nu le folosi. Diacriticele nu sunt doar de frumusețe, ci schimbă semnificația literelor. Un tată nu-i același lucru cu o țâță.',
                $this->notaDeSubsol('Ca să vezi cât de trist stă treaba, Google traduce această frază ca „<em>A father is not the same as one father</em>.“. Nici măcar ei nu-și dau seama de diferența dintre aceste cuvinte?!'),
            '</p>',
            '<p>Dacă nu știi cum se tastează literele cu diacritice pe sistemul tău de operare vezi situl <a href="http://www.diacritice.ro/">Diacritice.ro</a>.</p>',

            '<h2>Punctuația</h2>',
            '<p>Semnele de punctuație fără pereche (punctul, virgula, două puncte, punctul și virgula, semnul exclamării, semnul întrebării și punctele de suspensie) se scriu legate de cuvântul precent și se lasă un spațiu după ele.</p>',
            $this->blocGresit('<p>Erau trei oameni : Andrei , Ion ,și Vasile . Atât !</p>'),
            $this->blocCorect('<p>Erau trei oameni: Andrei, Ion și Vasile. Atât!</p>'),
            '<p>Semnele de punctuație cu pereche (ghilimelele, diferitele paranteze și restul) sunt lipite de cuvintele din interior și sunt tratate ca un singur cuvânt la exterior. (Când o frază întreagă este în paranteză, punctul se pune înainte de paranteză și nu după.)</p>',
            '<p>Dacă înainte de semnul de punctuație este un URL atunci se lasă spațiu și înainte de semnul de punctuație. Motivul este simplu, URL-urile pot conține aceste semne de punctuație, deci se lasă un spațiu pentru a indica că acel semn nu face parte din URL',
                $this->notaDeSubsol('Dacă sunt cacofonii în textul ăsta, ele nu se află acolo din <em>neatenția</em> mea.'),
            '. Dar în mediile avansate (HTML, Latex), unde URL-urile pot fi scrise cu alte culori sau pe alt fundal, nu este necesară respectarea acestei reguli.</p>',
            $this->blocGresit('<p>Vezi http://www.google.com/.</p>'),
            $this->blocCorect('<p>Vezi http://www.google.com/ .</p>'),

            //'<h3>Punctul</h3>',
            //'<p>Punctul se mai folosește pentru abrevieri ca <em>ș.a.</em> sau <em>etc.</em>, dar nu pentru abrevierile care se termină cu ultima literă ca <em>dl</em> sau <em>cca</em>.</p>',
            // Punctul se folosește ca să separi grupurile de câte trei cifre din numere și virgula pentru a separa
            // partea întreagă de partea zecimală: 45.000.000 de oameni. 3,141 este PI cu trei zecimale.

            //'<h3>Virgula</h3>',
            //'<p>Virgula se folosește mereu înainte de conjuncțiile <em>dar</em>, <em>iar</em>, <em>ci</em> și <em>însă</em> când leagă propoziții într-o frază, dar nu când sunt în interiorul unei propoziții?</p>',
            //'<p>Nu se pune virgulă înainte de <em>și</em> într-o enumerație. La fel nu se pune virgulă înainte de <em>etc.</em> pentru că este prescurate pentru <em>et cetera</em> care înseamnă <em>și restul</em>, dar este preferabilă folosirea prescutărilor românești <em>ș.a.</em> sau <em>ș.a.m.d.</em> în loc de ețetera.</p>',

            '<p>Pentru puncte de suspensie se poate folosi caracterul „…“ sau chiar trei puncte „...“, dar nu niciodată mai multe. Deseori pe internet văd că oamenii au uitat de virgulă, punct și virgulă, linie de pauză și punct și le-au înlocuit pe toate cu puncte de suspensie prelungite. Nu-i corect așa.</p>',

            '<h3>Ghilimelele</h3>',
            '<p>Ghilimelele corecte sunt „astea“, adică 99 jos și 66 sus. În interiorul textelor citate se mai folosesc ghilimelele <strong>«</strong> și <strong>»</strong>. Toate celelalte tipuri de ghilimele sunt greșite, mai ales cele "englezești unisex"!</p>',
            '<p>În engleza americană semnele de punctuație care urmează după ghilimele sunt puse înainte de ultima ghilimea. Nu se face așa ceva în limba română.</p>',
            $this->blocGresit('<p>Această frază n-are "sens," dar servește drept un "exemplu \'destul\' de bun."</p>'),
            $this->blocCorect('<p>Această frază n-are „sens“, dar servește drept un „exemplu «destul» de bun“.</p>'),

            '<h3>Apostroful</h3>',
            '<p>Apostroful corect',
                $this->notaDeSubsol("Tehnic, caracterul ăsta se numește <em>right single quotation mark</em> pentru că în engleză apostroful și apostroful invers se folosesc și ca ghilimele."),
            ' este ’. A nu se folosi niciodată \'. Apostroful este identic cu o virgulă, dar pus sus, deci \' este greșit.',
                $this->notaDeSubsol("Simbolul pentru prim seamănă cu apostroful, dar nu este identic. Cel corect este ′. Pentru secund se folosește ″ și pentru terț ‴."),
            '</p>',
            $this->blocGresit('<p>Da\' mie nu\'mi place.</p>'),
            $this->blocCorect('<p>Da’ mie nu-mi place.</p>'),

            '<h3>Liniile</h3>',
            '<p>Sunt patru linii (după lungime) folosite în limba română: cratima (-), linia em (—), linia en (–) și minusul (−). La inventarea calculatoarelor, pe timpul când doar armata și universitățile și firmele mari foloseau calculatoare, toate au fost reduse la cratimă pentru a fi mai simplu de codificat. </p>',
            '<p>Cratima se folosește pentru linia dintre cuvinte (<em>s-a-tâmplat</em>, <em>Cluj-Napoca</em>) sau pentru a despărți cuvinte de pe un rând pe altul.</p>',
            '<p>Nu se despart niciodată cuvintele după o cratimă internă. Spre exemplu, cuvântul <em>n-avea</em> se desparte ca <em>n-a-</em> urmat de <em>vea</em>. Ideea este că trebuie să știi ce silabă să citești înainte să duci ochii pe rândul următoar. Dacă unele programe forțează despărțirea după cratime, caracterul cratimă poate fi înlocuit cu ‑ (U-2011). Acest caracter este identic cu cel pentru cratimă, dar nu se desparte de pe un rând pe altul.</p>',
            '<p>Pentru flexionarea cuvintelor străine se folosește cratima. Se face acest lucru pentru a indica că cuvântul este străin. Când cineva vede cuvântul „siteuri“ crede că se citește si-te-uri în loc de sait-uri. Dar este preferabilă <a href="/anglicisme">traducerea sau adaptarea cuvintelor străine</a>. Scrierea în limba originală trebuie dată doar ca notă informativă și nu folosită mereu.</p>',
            $this->blocGresit('<p>Nu ai hardwareul necesar pentru...</p>'),
            $this->blocCorect('<p>Nu ai <em>hardware</em>-ul necesar pentru...</p>'),
            '<p>Linia de dialog',
                $this->notaDeSubsol('Tehnic, caracterul numit <em>quotation dash</em> (linie de dialog) este ― (U+2015) și e un pic mai lung decât linia em (U+2014). Dar U+2015 este rar întâlnit și e preferabil să fie folosită linia em pentru ambele semne.'),
            ' sau linia de pauză (—) mai sunt cunoscute ca linia em pentru că au lungimea literei <em>m</em>. Niciodată nu se înlocuiește cu două cratime („--“).</p>',
            '<p>Pentru ele spațierea este diferită față de celelalte caractere de punctuație fără pereche. Linia de pauză este înconjurată de spații în ambele părți și linia de dialog doar în dreapta are spațiu pentru că mereu este prima într-un alineat.</p>',
            '<p>Pentru indicarea intervalelor se folosește linia en: –. La fel, ea are numele ăsta pentru că ar trebui să aibă lungimea literei <em>n</em>. Exemplu de folosire: am mers vreo 10–15&nbsp;km.</p>',
            $this->blocGresit('<p>- M-aștepți jumătate de oră?</p><p>-Păi tre\' să plec în 10-15 minute.</p>'),
            $this->blocCorect('<p>—&nbsp;M-aștepți jumătate de oră?</p><p>—&nbsp;Păi tre’ să plec în 10–15 minute.</p>'),
            '<p>Deseori pentru minus este folosită cratima, dar este incorect pentru că semnul minus este semnul plus fără o bară, iar + și - nu se aseamnănă pentru că cratima este prea scurtă. Caracterul corect este −.</p>',

            '<h3>Spațiile</h3>',
            '<p>În Unicode sunt mai multe reprezentări pentru spații: spațiu obișnuit ( ), spațiu care nu desparte sau spațiul fix (&nbsp;), spațiul mic (&thinsp;) și altele',
                $this->notaDeSubsol('O curiozitate mai este spațiul fără spațiu (​).'),
            '.</p>',
            '<p>Între fraze se lasă un singur spațiu, nu două.</p>',
            '<p>Dacă se folosește alinierea textului la stânga și la dreapta spațiile normale o să varieze în lungime de pe o linie pe alta, dar spațiul care nu se desparte nu va varia. Deci dacă se folosește această aliniere, spațiul după linia de dialog trebuie înlocuit cu unul fix (&nbsp;) ca să se mențină alinierea.</p>',
            '<p>Între numere și unitățile de măsură se pune un spațiu fix (nu spațiu normal) ca să fie mereu pe aceeași linie. Exemplu: 4&nbsp;kg, 20&nbsp;mm, 28&nbsp;°C.</p>',

            '<h3>Numere</h3>',
            '<p>În numere, grupurile de câte trei cifre se despart cu puncte pentru a fi mai ușor de citit, dar nu virgule ca la englezi. Cu virgulă se desparte partea întragă de partea zecimală.</p>',
            $this->blocGresit('<p>Am câștigat €2,000,000 la loto. O sută de mililitri înseamnă 0.1L.</p>'),
            $this->blocCorect('<p>Am câștigat 2.000.000&nbsp;€ la loto. O sută de mililitri înseamnă 0,1&nbsp;L.</p>'),

            '<h2>Reguli tipografice</h2>',
            '<p>Pe internet, deseori nu se specifică o lungime fixă pentru rândurile unui text și este lăsat să fie cât lungimea navigatorului. Probabil fac așa ca să nu irosească spațiu, dar rândurile prea lungi reduc lizibilitatea textului. O recomandare bună este ca media numărului de cuvinte pe rând să fie între 10 și 15 (vreo 50&ndash;75 de litere).</p>',

            '<h3>Spațiere</h3>',
            '<p>O spațiere mai mare între rânduri și cuvinte face textul mai lizibil. O recomandare este ca înălțimea rândului să fie 1,5. În <a href="http://upload.wikimedia.org/wikipedia/commons/9/94/Leading.png">exemplul ăsta</a> se vede diferența dintre spațiere.</p>',

            '<h3>Alineate</h3>',
            '<p>Sunt două feluri de a evidenția paragrafele: începerea primului rând mai din dreapta sau lăsarea unui rând gol între paragrafe. Prima variantă este mai întâlnită și este recomandată. Dar niciodată nu se folosesc amândouă.</p>',

            '<h3>Legături</h3>',
            '<p>Este preferabil ca textul pentru o hiperlegătură să descrie conținutul legăturii.</p>',
            $this->blocGresit('<p>Vezi <a href="http://www.youtube.com/watch?v=nBJV56WUDng">aici</a> cum se desface o banană.</p>'),
            $this->blocCorect('<p>Vezi <a href="http://www.youtube.com/watch?v=nBJV56WUDng">cum se desface o banană</a>.</p>'),

            '<h3>Scrierea aldină și cursivă</h3>',
            '<p>Când se vorbește despre cuvinte este preferabil să fie cursive, dacă nu, să fie puse între ghilimele.</p>',
            $this->blocGresit('<p>Cuvântul "pământ" provine de la <strong>pavimentum</strong>.</p>'),
            $this->blocCorect('<p>Cuvântul <em>pământ</em> provine de la <em>pavimentum</em>.</p>'),
            '<p>Frazale și cuvintele în limbi străine se scriu cursiv, sau dacă nu se poate, vor fi puse între ghilimele.</p>',
            '<p>Pentru scrierea aldină, cursivă sau pentru sublinierea cuvintelor nu se includ și semnele de punctuație din jur.</p>',

            '<h3>Titluri și denumiri</h3>',
            '<p>Doar prima literă dintr-un titlu se scrie cu majusculă! Pentru numele de oameni, instituții sau locuri, toate cuvintele încep cu majusculă cu excepția cuvintelor de legătură.</p>',
            '<p>Când un titlu este inclus într-o propoziție, trebuie evidențiat. Se preferă scrierea cu litere cursive sau dacă nu se poate, scrierea între ghilimele. Mai există posibilitatea sublinierii, dar acest lucru nu este preferabil pe internet.</p>',
            $this->blocGresit('<p>Am văzut O Scrisoare Pierdută la Teatrul național Vasile Alecsandri Iași.</p>'),
            $this->blocCorect('<p>Am văzut <em>O scrisoare pierdută</em> la Teatrul Național „Vasile Alecsandri“ Iași.</p>'),


            '<h2>Anexă</h2>',
            '<p>O listă de pagini care te pot interesa (majoritatea sunt în limba engleză):</p>',
            '<ul>',
            '<li><a href="http://publications.europa.eu/code/ro/ro-4100000.htm">Prezentarea formală a textului</a></li>',
            '<li><em><a href="http://www.webtypography.net/toc/">The Elements of Typographic Style Applied to the Web</a></em></li>',
            '<li><em><a href="http://www.informationarchitects.jp/en/the-web-is-all-about-typography-period/">Web Design is 95% Typography</a></em></li>',
            '<li><a href="http://en.wikipedia.org/wiki/Punctuation">Pagina de pe Wikipedia englezească despre punctuație</a></li>',
            '<li><em><a href="http://ilovetypography.com/">I Love Typography</a></em></li>',
            '<li><em><a href="http://www.alistapart.com/">A List Apart</a></em></li>',
            '<li><a href="steagul_scrierii_corecte.png">Steagul scrierii corecte</a>, cunoscut în engleză ca <em>Grammar Nazi Flag</em></li>',
            '</ul>',
            '';

            // să fac o lista cu erorile copiate din engleza ca "asta" și O Noapte Furtunoasă
            // La sfârșit să fie un TL;DR de cu cele mai importante reguli.


        echo $this->afisareNoteDeSubsol();
    }
}

$index = new Index();
$index->scrie();

?>
