<?php

// Să preiau titlul de la situl legat.
// Faviconul să fie un cerc tăiat.

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    echo 
        '<html>',
        '<head>',
            '<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>',
            #'<!-- să aibă faviconul și titlul de la situl original -->',
            '<title>&nbsp;</title>',
            '<style type="text/css">',
                '*{padding:0;margin:0;}',
                'img{width:555px;height:555px;margin:-277px 0 0 -277px}',
                '#centru{position:fixed;top:50%;left:50%}',
            '</style>',
        '</head>',
        '<body>',
        '<iframe src="', $_POST["url"], '" style="height:100%; width:100%; border:0px" scrolling="auto"></iframe>',
        '<div id="centru">',
            '<img src="anti.png" alt="anti"/>',
        '</div>',
        '</body>',
        '</html>';
}
elseif (isset($_GET["url"]))
{
    echo
        '<html>',
        '<head>',
            '<title>Așteaptă...</title>',
            '<script type="text/javascript">',
                'window.onload = function(){document.getElementById("trimite").submit();}',
            '</script>',
        '</head>',
        '<body>',
        '<form id="trimite" action="/anti/" method="post">',
            '<input type="hidden" name="url" value="' , $_GET["url"], '"/>',
        '</form>',
        '</body>',
        '</html>';
}
else
{
    echo "Când vrei să trimiți o legătură către un sit, dar nu vrei ca legătură să fie văzută ca o acceptare implicită a mesajului și conținutului sitului, poți să trimiți legătură prin pagina asta. Singura diferență va fi afișarea unui cerc tăiat roșu peste sit.";
    echo "WTF";
}

?>
