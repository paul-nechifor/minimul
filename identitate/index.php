<?php
require_once("baza.php");
require_once("nume.php");
require_once("localitate.php");
require_once("strada.php");

class Index extends Afisare
{
    public $acasa = "/identitate";
    public $cod = "identitate";
    public $titlu = "Identitate falsă";
    public $descriere = "Un sit pe care poți să-ți generezi o identitate falsă plauzibilă cu nume, data nașterii, adresă, număr de telefon și avatar.";
    public $cuvinteCheie = "identitate, identitate falsă, identitate plauzibilă, alege nume, avatar";

    private $gen;
    private $nume;
    private $mobil;
    private $dataNasterii;
    private $varsta;
    private $localitate;
    private $judet;
    private $adresa;
    private $avatar;

    private $prefixeCodPostal = array
    (
        'Sector 1' => '01',
        'Sector 2' => '02',
        'Sector 3' => '03',
        'Sector 4' => '04',
        'Sector 5' => '05',
        'Sector 6' => '06',
        'Ilfov' => '07',
        'Giurgiu' => '08',
        'Prahova' => '10',
        'Argeș' => '11',
        'Buzău' => '12',
        'Dâmbovița' => '13',
        'Teleorman' => '14',
        'Dolj' => '20',
        'Gorj' => '21',
        'Mehedinți' => '22',
        'Olt' => '23',
        'Vâlcea' => '24',
        'Timiș' => '30',
        'Arad' => '31',
        'Caraș-Severin' => '32',
        'Hunedoara' => '33',
        'Cluj' => '40',
        'Bihor' => '41',
        'Bistrița-Năsăud' => '42',
        'Maramureș' => '43',
        'Satu Mare' => '44',
        'Sălaj' => '45',
        'Brașov' => '50',
        'Alba' => '51',
        'Covasna' => '52',
        'Harghita' => '53',
        'Mureș' => '54',
        'Sibiu' => '55',
        'Bacău' => '60',
        'Neamț' => '61',
        'Vrancea' => '62',
        'Iași' => '70',
        'Botoșani' => '71',
        'Suceava' => '72',
        'Vaslui' => '73',
        'Galați' => '80',
        'Brăila' => '81',
        'Tulcea' => '82',
        'Constanța' => '90',
        'Călărași' => '91',
        'Ialomița' => '92'
    );

    public function citesteVariabile()
    {
        if (isset($_GET['gen']))
            $this->gen = $_GET['gen'];
        else
            $this->gen = 'alta valoare';

        if ($this->gen != "masculin" && $this->gen != "feminin")
            if (mt_rand(0, 1) == 1)
                $this->gen = "masculin";
            else
                $this->gen = "feminin";
    }
    public function genereaza()
    {
        // Genul
        if ($this->gen == "masculin")
            $this->nume = alegeNumeMasculin();
        else
            $this->nume = alegeNumeFeminin();

        if (mt_rand(1, 100) <= 50)
        {
            do
            {
                if ($this->gen == "masculin")
                    $mijlociu = alegeNumeMasculin();
                else
                    $mijlociu = alegeNumeFeminin();
            } while ($mijlociu == $this->nume);
            $this->nume .= " " . $mijlociu;
        }

        $this->nume .= " " . alegeNumeFamilie();

        // Numar de telefon
        $this->mobil = "07" . mt_rand(2, 6) . mt_rand(1111111, 9999999);

        // Data nașterii și vârsta
        date_default_timezone_set("Europe/Bucharest");
        $date = new DateTime();
        $date->sub(new DateInterval('P' . mt_rand(365 * 18, 365 * 40) . 'D'));
        $interval = $date->diff(new DateTime(), true);
        $this->dataNasterii = $date->format('d.m.Y');
        $this->varsta = $interval->y;

        // Localitate și județ
        $l = explode("|", alegeLocalitate());
        $this->localitate = $l[0];
        $this->judet = $l[1];
        if ($this->judet == "")
            $this->judet = "Sector " . mt_rand(1, 6);

        // Cod poștal
        $codPostal = $this->prefixeCodPostal[$this->judet] . sprintf("%04d", mt_rand(0, 9999));

        // Adresa
        $s = alegeStrada();
        $n = mt_rand(1, 19);
        $bl = mt_rand(4, 15) . chr(65 + mt_rand(0, 20));
        $sc = chr(65 + mt_rand(0, 1));
        $et = mt_rand(1, 6);
        $ap = $et * 3 + mt_rand(1, 3);
        $this->adresa = "Str. $s nr. $n, bl. $bl, sc. $sc, et. $et,  ap. $ap, cod poștal $codPostal, " . $this->localitate . ', ' . $this->judet;

        // Avatarul
        $this->avatar = 'avatare/' . mt_rand(0, 1360) . '.jpg';

    }
    public function scrieContinut()
    {
        echo "<p>Multe situri cer informații personale pentru înregistrare. Dacă-ți pasă de confidențialitatea ta, nu o să vrei să dai date reale. Situl ăsta te ajută să generezi date false plauzibile.</p>";

        echo "<p>Datele sunt generate inteligent. Alegerea numelor și străzilor ține cont de frecvența întâlnirii lor (datele au fost extrase dintr-o bază de date de numere de telefon) și alegerea localităților ține cont de populația lor.</p>";

        echo "<p>Cel mai probabil o să ai nevoie de o adresă de poștă electronică ca să confirmi înregistrarea. Sunt situri care-ți dau o adresă temporară, ca să nu primești scrisori nedorite (<em>spam</em>) pe adresa ta reală. Exemple de astfel de situri sunt: <a href='http://www.fakeinbox.com/'>Fake Inbox</a>, <a href='http://www.guerrillamail.com/'>Guerrilla Mail</a>, <a href='http://10minutemail.com/10MinuteMail/index.html'>10 Minute Mail</a> sau altele pe care le poți găsi singur.</p>";

        $nr = array("întâi", "a doua", "a treia", "a patra", "a cincia", "a șasea", "a șaptea", "a opta", "a noua", "a zecea");

        for ($i = 0; $i < 10; $i++)
        {
            $this->citesteVariabile();
            $this->genereaza();
            echo 
            '<form class="formular">',
                '<fieldset>',
                    '<legend>Identitatea ', $nr[$i], '</legend>',
                    '<ul>',
                        '<li>',
                            '<label for="nume">Nume:</label>',
                            '<input id="nume" type="text" value="', $this->nume,'"/>',
                        '</li>',
                        '<li>',
                            '<label for="gen">Gen:</label>',
                            '<input id="gen" type="text" value="', $this->gen,'"/>',
                        '</li>',
                        '<li>',
                            '<label for="datanasterii">Data nașterii:</label>',
                            '<input id="datanasterii" type="text" value="', $this->dataNasterii,'"/>',
                        '</li>',
                        '<li>',
                            '<label for="varsta">Vârsta:</label>',
                            '<input id="varsta" type="text" value="', $this->varsta,'"/>',
                        '</li>',
                        '<li>',
                            '<label for="telmobil">Telefon mobil:</label>',
                            '<input id="telmobil" type="text" value="', $this->mobil,'"/>',
                        '</li>',
                        '<li>',
                            '<label for="localitate">Localitate:</label>',
                            '<input id="localitate" type="text" value="', $this->localitate,'"/>',
                        '</li>',
                        '<li>',
                            '<label for="judet">Județ/Sector:</label>',
                            '<input id="judet" type="text" value="', $this->judet,'"/>',
                        '</li>',
                        '<li>',
                            '<label for="adresa">Adresa:</label>',
                            '<textarea id="adresa">', $this->adresa,'</textarea>',
                        '</li>',
                        '<li>',
                            '<label>Avatar:</label>',
                            '<img alt="avatar" width="128" height="128" src="', $this->avatar, '"/>',
                        '</li>',
                    '</ul>',
                '</fieldset>',
            '</form>';
        }

        echo "<p>Generează alte identităti: numai <a href='index.php?gen=masculin'>masculine</a>, numai <a href='index.php?gen=feminin'>feminine</a> sau <a href='index.php'>ambele</a>.</p>";
    }
}

$index = new Index();
#$index->citesteVariabile();
#$index->genereaza();
$index->scrie();

?>
