<?php
require_once("baza.php");

class Index extends Afisare
{
    public $acasa = "/anti";
    public $cod = "anti";
    public $titlu = "Anti";
    public $descriere = "Anti orice.";
    public $cuvinteCheie = "anti";

    public $url = null;

    public function citesteVariabile()
    {
        if (isset($_GET['url']))
            $this->url = $_GET['url'];
    }
    public function scrieContinut()
    {
        $pre = $_SERVER['SERVER_NAME']. "/anti/?url=";
        echo "<p>Când vrei să trimiți o legătură către un sit, dar nu vrei ca legătură să fie văzută ca o acceptare implicită a mesajului și conținutului sitului, poți să trimiți legătură prin pagina asta. Singura diferență va fi afișarea unui cerc tăiat roșu peste sit.</p>";
        echo "<p>Doar trebuie să adaugi în fața URL-ului <span class='cod' style='white-space:nowrap'>$pre</span> ca să obții legătura. Spre exemplu, pentru Google va fi:</p>";
        echo "<p><span class='cod'>{$pre}http://google.com</span></p>";
    }
}

$index = new Index();
$index->citesteVariabile();
if ($index->url != null)
{
    $tot = file_get_contents($index->url);
    $start = strpos($tot, "<title>");
    $end = strpos($tot, "</title>");
    $titlu = "&nbsp;";
    if ($end - $start < 140) 
        $titlu = substr($tot, $start + 7, $end - $start - 7);
    echo 
        '<html>',
        '<head>',
            '<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>',
            #'<!-- să aibă faviconul și titlul de la situl original -->',
            '<title>', $titlu, '</title>',
            '<style type="text/css">',
                '*{padding:0;margin:0;}',
                'img{width:555px;height:555px;margin:-277px 0 0 -277px}',
                '#centru{position:fixed;top:50%;left:50%}',
            '</style>',
        '</head>',
        '<body>',
        '<iframe src="', $index->url, '" style="height:100%; width:100%; border:0px" scrolling="auto"></iframe>',
        '<div id="centru">',
            '<img src="anti.png" alt="anti"/>',
        '</div>',
        '</body>',
        '</html>';
}
else
{
    $index->scrie();
}

?>
