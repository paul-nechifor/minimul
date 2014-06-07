window.onload = function()
{
    main();
}

probleme =
{
    tabla: null,
    legaturaSolutie: null,
    laApasare: null,
    incercate: [],
    solutie: ""
};

function main()
{
    probleme.tabla = document.getElementById("tabla")
    probleme.legaturaSolutie = document.getElementById("sol");
    probleme.solutie = probleme.legaturaSolutie.getAttribute("class");

    probleme.laApasare = function(e)
    {
        var marimePatrat = 64;
        var x = e.pageX - probleme.tabla.offsetLeft;
        var y = e.pageY - probleme.tabla.offsetTop;

        var col = String.fromCharCode(Math.floor(x / marimePatrat) + 97);
        var lin = 8 - Math.floor(y / marimePatrat);
        var nume = col + lin;
        var elem = document.getElementById(nume).firstChild;

        var poz = pozitie(probleme.incercate, nume);
        
        if (poz < 0)
        {
            elem.setAttribute("class", elem.getAttribute("class") + " incercat");
            probleme.incercate.push(nume);
        }
        else
        {
            probleme.incercate.splice(poz, 1);
            elem.setAttribute("class", elem.getAttribute("class").split(" ")[0]);
        }

        if (probleme.incercate.length == 2)
        {
            var p1 = document.getElementById(probleme.incercate[0]).firstChild;
            var p2 = document.getElementById(probleme.incercate[1]).firstChild;

            if (probleme.solutie == probleme.incercate.join("") || probleme.solutie == probleme.incercate.reverse().join(""))
                setTimeout("arataSolutia(true);", 500);
            else
            {
                p1.setAttribute("class", p1.getAttribute("class").split(" ")[0] + " gresit");
                p2.setAttribute("class", p2.getAttribute("class").split(" ")[0] + " gresit");
                probleme.tabla.onclick = null;
                probleme.legaturaSolutie.onclick = null;
                setTimeout("reseteaza();", 750);
            }
        }
    }
    probleme.tabla.onclick = probleme.laApasare;
    probleme.legaturaSolutie.onclick = function(){arataSolutia(false);};
}
function reseteaza()
{
    var p1 = document.getElementById(probleme.incercate[0]).firstChild;
    var p2 = document.getElementById(probleme.incercate[1]).firstChild;
    p1.setAttribute("class", p1.getAttribute("class").split(" ")[0]);
    p2.setAttribute("class", p2.getAttribute("class").split(" ")[0]);
    probleme.tabla.onclick = probleme.laApasare;
    probleme.legaturaSolutie.onclick = function(){arataSolutia(false);};
    probleme.incercate = [];
}
function arataSolutia(reincarcare)
{
    var p1 = document.getElementById(probleme.solutie.substring(0, 2)).firstChild;
    var p2 = document.getElementById(probleme.solutie.substring(2, 4)).firstChild;
    p1.setAttribute("class", p1.getAttribute("class").split(" ")[0] + " corect");
    p2.setAttribute("class", p2.getAttribute("class").split(" ")[0] + " corect");
    probleme.tabla.onclick = null;
    probleme.legaturaSolutie.onclick = null;
    if (reincarcare)
        setTimeout("window.location.reload();", 1000);
}
function pozitie(a, obj)
{
    for(var i = 0; i < a.length; i++)
        if(a[i] === obj)
            return i;

    return -1;
}

