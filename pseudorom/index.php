<?php

$timp_inceput = microtime(true);

$silabe = array(array(1667468, 'a'), array(1487637, 'de'), array(948458, 'te'), array(907274, 'în'), array(793207, 'e'),
array(673170, 'și'), array(638112, 'ca'), array(594429, 're'), array(498252, 'la'), array(494631, 'o'), array(472142,
'din'), array(411278, 'cu'), array(384897, 'li'), array(366839, 'le'), array(361924, 'ri'), array(347368, 'al'),
array(332418, 'ma'), array(315944, 'ne'), array(306503, 'ta'), array(280921, 'ce'), array(273884, 'es'), array(273639,
'se'), array(272239, 'nu'), array(268280, 'ni'), array(261911, 'pe'), array(254736, 'u'), array(252475, 'ti'),
array(250875, 'ro'), array(238742, 'co'), array(234381, 'un'), array(210414, 'me'), array(206091, 'că'), array(203979,
'ra'), array(203432, 'lui'), array(202635, 'tă'), array(195844, 'tru'), array(192029, 'i'), array(190803, 'ți'),
array(186068, 'mai'), array(183028, 'fi'), array(181050, 'na'), array(180456, 'să'), array(171339, 'lo'), array(166156,
'pen'), array(160360, 'gi'), array(156894, 'mi'), array(155731, 'tu'), array(152909, 'si'), array(146171, 'mâ'),
array(144972, 'va'), array(141652, 'da'), array(140449, 'po'), array(133253, 'mu'), array(123779, 'di'), array(121446,
'pu'), array(119920, 'nă'), array(119227, 'tor'), array(118948, 'tre'), array(117702, 'au'), array(117565, 'ju'),
array(116174, 'sa'), array(111181, 'ul'), array(109191, 'ci'), array(108507, 'do'), array(104933, 'pre'), array(102937,
'go'), array(101312, 'ar'), array(100247, 'to'), array(99426, 'in'), array(99305, 'zi'), array(99261, 'pa'),
array(94120, 'pri'), array(93210, 'tul'), array(93005, 'lor'), array(92838, 'za'), array(90783, 'du'), array(89685,
'par'), array(84068, 'no'), array(84045, 'for'), array(83904, 'ră'), array(82345, 'ba'), array(81435, 'bri'),
array(81258, 'bi'), array(79104, 'tea'), array(77605, 'bu'), array(77368, 'prin'), array(76938, 'nul'), array(76195,
've'), array(75775, 'fa'), array(74374, 'pă'), array(73798, 'des'), array(73101, 'su'), array(72614, 'lu'), array(71618,
'uti'), array(71441, 'sau'), array(71379, 'an'), array(70197, 'ei'), array(67264, 'râ'), array(64948, 'har'),
array(63984, 'ța'), array(63789, 'mul'), array(63684, 'cen'), array(62438, 'sunt'), array(61468, 'ces'), array(59640,
'țul'), array(56406, 'mă'), array(54524, 'cea'), array(54455, 'sub'), array(53142, 'ge'), array(51861, 'vi'),
array(51759, 'pro'), array(51714, 'fe'), array(51162, 'sta'), array(50783, 'tăți'), array(50518, 'oa'), array(50370,
'con'), array(50362, 'ger'), array(49812, 'lis'), array(47415, 'ter'), array(47330, 'pra'), array(45645, 'ță'),
array(45289, 'lim'), array(45255, 'rești'), array(44214, 's-a'), array(43043, 'cri'), array(42498, 'mar'), array(42256,
'raș'), array(41492, 'gă'), array(41431, 'cel'), array(41047, 'ții'), array(40403, 'or'), array(39740, 'cul'),
array(39566, 'cum'), array(38972, 'iu'), array(38831, 'dar'), array(38781, 'lul'), array(37843, 'iar'), array(37383,
'is'), array(37326, 'ver'), array(36583, 'lă'), array(36248, 'ia'), array(36152, 'el'), array(35549, 'lea'),
array(35528, 'șe'), array(35214, 'ur'), array(35182, 'fran'), array(34864, 'dis'), array(34591, 'ga'), array(34545,
'rea'), array(34496, 'bli'), array(33931, 'be'), array(33562, 'ind'), array(32791, 'ani'), array(32607, 'cut'),
array(31842, 'pâ'), array(30733, 'nal'), array(30707, 'uă'), array(30699, 'cest'), array(30287, 'mânt'), array(28909,
'poa'), array(28394, 'toa'), array(27901, 'ceas'), array(27898, 'fel'), array(27319, 'ori'), array(27109, 'răz'),
array(26948, 'nis'), array(26712, 'mat'), array(26501, 'so'), array(26318, 'por'), array(26253, 'ea'), array(26014,
'fă'), array(25990, 'dul'), array(25521, 'mem'), array(25479, 'nea'), array(25392, 'ză'), array(25379, 'ex'),
array(25308, 'bra'), array(25225, 'ste'), array(25170, 'pul'), array(25059, 'nui'), array(24831, 'men'), array(24801,
'tra'), array(24757, 'mol'), array(24349, 'lan'), array(24339, 'im'), array(24326, 'as'), array(24120, 'nii'),
array(23579, 'cii'), array(23290, 'am'), array(22996, 'unei'), array(22441, 'când'), array(22263, 'tem'), array(22146,
'man'), array(22000, 'zo'), array(21909, 'bo'), array(21693, 'ac'), array(21645, 'timp'), array(21565, 'nit'),
array(21039, 'fo'), array(21027, 'turi'), array(20820, 'doi'), array(20686, 'îm'), array(20402, 'top'), array(20195,
'sur'), array(20026, 'loc'), array(19978, 'com'), array(19834, 'șu'), array(19771, 'ua'), array(19732, 'cem'),
array(19391, 'ai'), array(19334, 'țe'), array(19292, 'cei'), array(19207, 'rii'), array(19130, 'nua'), array(19122,
'pi'), array(19121, 'sat'), array(18947, 'său'), array(18946, 'mun'), array(18919, 'den'), array(18423, 'ast'),
array(18420, 'tri'), array(18394, 'stan'), array(18237, 'tim'), array(18236, 'rul'), array(18183, 'col'), array(17954,
'tit'), array(17840, 'reș'), array(17700, 'tip'), array(17633, 'tal'), array(17540, 'deț'), array(17536, 'mân'),
array(17529, 'foar'), array(17367, 'tom'), array(17367, 'oc'), array(17191, 'gust'), array(17054, 'trul'), array(16947,
'er'), array(16851, 'eu'), array(16826, 'iem'), array(16822, 'chi'), array(16816, 'spe'), array(16750, 'les'),
array(16724, 'pes'), array(16697, 'ral'), array(16571, 'ie'), array(16556, 'boi'), array(16423, 'gra'), array(16417,
'sep'), array(16123, 'vă'), array(16050, 'lat'), array(15982, 'tr-o'), array(15803, 'ad'), array(15710, 'xis'),
array(15596, 'mit'), array(15475, 'brua'), array(15253, 'dru'), array(15233, 'pot'), array(15105, 'mon'), array(15101,
'tat'), array(15003, 'on'), array(14978, 'dex'), array(14923, 'nor'), array(14905, 'ru'), array(14728, 'cât'),
array(14634, 'mo'), array(14622, 'năs'), array(14609, 'vea'), array(14608, 'vut'), array(14571, 'trei'), array(14444,
'at'), array(14406, 'lun'), array(14349, 'vo'), array(14270, 'can'), array(14266, 'put'), array(14256, 'pub'),
array(14226, 'poi'), array(14218, 'mea'), array(14033, 'șul'), array(13990, 'flu'), array(13864, 'per'), array(13728,
'mâni'), array(13681, 'dus'), array(13634, 'jos'), array(13459, 'sti'), array(13445, 'bru'), array(13312, 'rau'),
array(13195, 'ace'), array(13182, 'via'), array(13144, 'ob'), array(13139, 'naș'), array(13022, 'tran'), array(13022,
'sil'), array(12918, 'sud'), array(12765, 'tin'), array(12731, 'uni'), array(12610, 'oan'), array(12531, 'tot'),
array(12528, 'nord'), array(12474, 'ici'), array(12336, 'plu'), array(12250, 'jo'), array(12209, 'ris'), array(12142,
'noi'), array(12102, 'nici'), array(12076, 'nos'), array(12031, 'îl'), array(11968, 'apă'), array(11921, 'drul'),
array(11905, 'își'), array(11844, 'îi'), array(11781, 'sit'), array(11677, 'sfâr'), array(11669, 'tiv'), array(11665,
'tunci'), array(11618, 'xan'), array(11531, 'gini'), array(11462, 'neas'), array(11354, 'rin'), array(11327, 'vin'),
array(11282, 'ii'), array(11280, 'î'), array(11250, 'tr-un'), array(11137, 'una'), array(11043, 'sis'), array(11009,
'func'), array(11001, 'us'), array(10990, 'nou'), array(10961, 'ști'), array(10960, 'scri'), array(10909, 'bum'),
array(10890, 'flă'), array(10877, 'sec'), array(10828, 'tei'), array(10763, 'lemn'), array(10729, 'gli'), array(10717,
'spa'), array(10683, 'dez'), array(10530, 'rat'), array(10490, 'bă'), array(10478, 'sim'), array(10468, 'car'),
array(10455, 'gheor'), array(10455, 'ghe'), array(10340, 'dea'), array(10281, 'bar'), array(10263, 'mod'), array(10260,
'vic'), array(10150, 'bel'), array(10034, 'ser'), array(10016, 'mic'), array(9971, 'lași'), array(9939, 'zul'),
array(9867, 'nic'), array(9853, 'zin'), array(9813, 'vas'), array(9616, 'sus'), array(9544, 'geor'), array(9486, 'xem'),
array(9484, 'ja'), array(9479, 'hu'), array(9479, 'doa'), array(9439, 'fot'), array(9439, 'bal'), array(9371, 'hai'),
array(9355, 'tât'), array(9277, 'net'), array(9269, 'dra'), array(9267, 'est'), array(9233, 'tan'), array(9206, 'șa'),
array(9136, 'drei'), array(9074, 'rol'), array(9071, 'geș'), array(9064, 'biu'), array(9039, 'șov'), array(8987, 'io'),
array(8900, 'gle'), array(8900, 'en'), array(8868, 'șit'), array(8787, 'gu'), array(8780, 'râu'), array(8736, 'și-a'),
array(8724, 'ope'), array(8708, 'nță'), array(8703, 'l-a'), array(8688, 'pean'), array(8666, 'ric'), array(8599, 'nți'),
array(8575, 'zent'), array(8549, 'ita'), array(8495, 'vând'), array(8466, 'cod'), array(8378, 'ment'), array(8345,
'țin'), array(8342, 'hor'), array(8320, 'alt'), array(8300, 'vor'), array(8183, 'lid'), array(8175, 'biec'), array(8111,
'ței'), array(8091, 'dat'), array(8090, 'măr'), array(8054, 'drep'), array(8006, 'ele'), array(8004, 'ho'), array(7979,
'vâl'), array(7967, 'om'), array(7909, 'câ'), array(7898, 'i-a'), array(7886, 'nut'), array(7750, 'cău'), array(7661,
'ziu'), array(7661, 'târ'), array(7659, 'vest'), array(7641, 'cra'), array(7592, 'vechi'), array(7569, 'miș'),
array(7497, 'meni'), array(7485, 'tid'), array(7456, 'pal'), array(7451, 'zău'), array(7425, 'crat'), array(7422,
'rad'), array(7403, 'scris'), array(7356, 'proa'), array(7325, 'ent'), array(7318, 'olt'), array(7313, 'dan'),
array(7279, 'dă'), array(7236, 'form'), array(7222, 'curi'), array(7157, 'mii'), array(7011, 'ște'), array(7011, 'fan'),
array(6930, 'ze'), array(6899, 'bun'), array(6833, 'gru'), array(6763, 'duri'), array(6756, 'curs'), array(6725,
'nești'), array(6717, 'cru'), array(6683, 'vol'), array(6665, 'enți'), array(6658, 'lân'), array(6620, 'fap'),
array(6584, 'țu'), array(6566, 'ble'), array(6541, 'ber'), array(6523, 'nei'), array(6514, 'lori'), array(6495, 'xi'),
array(6484, 'fil'), array(6440, 'gre'), array(6415, 'fapt'), array(6397, 'tăzi'), array(6388, 'je'), array(6363, 'mir'),
array(6355, 'ec'), array(6298, 'șoa'), array(6265, 'punc'), array(6220, 'tic'), array(6182, 'riul'), array(6160,
'stil'), array(6148, 'stu'), array(6148, 'dii'), array(6138, 'nău'), array(6121, 'iul'), array(6090, 'gen'), array(6086,
'tuși'), array(6070, 'der'), array(6070, 'ciot'), array(6027, 'cal'), array(5989, 'soa'), array(5985, 'teri'),
array(5938, 'mulți'), array(5928, 'dâm'), array(5879, 'cla'), array(5865, 'tes'), array(5841, 'pel'), array(5782,
'țări'), array(5747, 'tut'), array(5691, 'rar'), array(5650, 'cin'), array(5622, 'rut'), array(5575, 'laj'), array(5571,
'cio'), array(5457, 'cez'), array(5444, 'sor'), array(5428, 'șani'), array(5421, 'ria'), array(5329, 'tant'),
array(5297, 'vid'), array(5294, 'vis'), array(5281, 'lia'), array(5230, 'fri'), array(5222, 'roa'), array(5219, 'niul'),
array(5174, 'res'), array(5174, 'pec'), array(5144, 'pop'), array(5128, 'il'), array(5128, 'ha'), array(4994, 'moar'),
array(4926, 'pând'), array(4918, 'juns'), array(4908, 'școa'), array(4868, 'azi'), array(4853, 'bert'), array(4836,
'mia'), array(4836, 'aca'), array(4810, 'spu'), array(4800, 'che'), array(4785, 'r'), array(4760, 'suc'), array(4755,
'prea'), array(4733, 'tus'), array(4672, 'vind'), array(4667, 'iec'), array(4645, 'tral'), array(4644, 'cord'),
array(4616, 'blic'), array(4571, 'crări'), array(4555, 'max'), array(4539, 'gul'), array(4516, 'ghi'), array(4514,
'sfân'), array(4512, 'vânt'), array(4494, 'vran'), array(4477, 'vre'), array(4477, 'fac'), array(4444, 'vei'),
array(4435, 'lați'), array(4429, 'et'), array(4393, 'grea'), array(4388, 'săi'), array(4350, 'zeu'), array(4350, 'dum'),
array(4341, 'tric'), array(4311, 'ame'), array(4307, 'cat'), array(4280, 'bil'), array(4268, 'toți'), array(4231, 'he'),
array(4202, 'hi'), array(4202, 'dro'), array(4166, 'rec'), array(4147, 'das'), array(4146, 'diu'), array(4144, 'mis'),
array(4142, 'zat'), array(4133, 's'), array(4131, 'nist'), array(4097, 'luni'), array(4085, 'să-și'), array(4076,
'vel'), array(4073, 'saj'), array(4051, 'nia'), array(4042, 'nesc'), array(4003, 'tăl'), array(3995, 'cinci'),
array(3976, 'iect'), array(3970, 'eași'), array(3955, 'rus'), array(3955, 'lup'), array(3909, 'ror'), array(3890,
'pei'), array(3872, 'stru'), array(3872, 'it'), array(3868, 'tar'), array(3820, 'ple'), array(3816, 'cred'), array(3814,
'vie'), array(3808, 'bol'), array(3774, 'lex'), array(3774, 'cre'), array(3760, 'nar'), array(3760, 'dic'), array(3750,
'vlad'), array(3667, 'xă'), array(3657, 'seș'), array(3647, 'riu'), array(3640, 'bii'), array(3628, 'pea'), array(3611,
'poș'), array(3533, 'aces'), array(3513, 'pol'), array(3499, 'veau'), array(3485, 'pus'), array(3476, 'cam'),
array(3473, 'fața'), array(3471, 'flat'), array(3428, 'lon'), array(3420, 'lin'), array(3418, 'gat'), array(3418,
'câș'), array(3395, 'siv'), array(3395, 'joc'), array(3395, 'clu'), array(3380, 'bui'), array(3370, 'rit'), array(3359,
'caz'), array(3349, 'trea'), array(3339, 'mos'), array(3332, 'rect'), array(3331, 'gri'), array(3326, 'vot'),
array(3318, 'dri'), array(3307, 'să-l'), array(3307, 'sin'), array(3307, 'gur'), array(3286, 'cir'), array(3282,
'brii'), array(3257, 'mani'), array(3254, 'jun'), array(3234, 'pia'), array(3234, 'bul'), array(3233, 'giur'),
array(3233, 'giu'), array(3218, 'dard'), array(3202, 'plan'), array(3193, 'tia'), array(3193, 'ceș'), array(3187,
'seam'), array(3173, 'dor'), array(3171, 'fix'), array(3154, 'fla'), array(3153, 'țiu'), array(3139, 'rași'),
array(3137, 'șef'), array(3124, 'sco'), array(3112, 'tist'), array(3111, 'xic'), array(3081, 'lal'), array(3034, 'mie'),
array(3008, 'cur'), array(3001, 'trat'), array(2996, 'pie'), array(2995, 'cap'), array(2993, 'struc'), array(2974,
'niu'), array(2956, 'poar'), array(2954, 'fin'), array(2949, 'stra'), array(2936, 'alb'), array(2916, 'gea'),
array(2906, 'nat'), array(2906, 'cas'), array(2893, 'plet'), array(2893, 'noas'), array(2886, 'pid'), array(2884,
'pat'), array(2861, 'vârs'), array(2858, 'up'), array(2844, 'toc'), array(2827, 'rom'), array(2825, 'apa'), array(2816,
'vrei'), array(2816, 'n'), array(2815, 'bră'), array(2795, 'ă'), array(2795, 'sport'), array(2785, 'scur'), array(2783,
'părți'), array(2781, 'miu'), array(2764, 'spus'), array(2759, 'teți'), array(2759, 'nen'), array(2746, 'ner'),
array(2745, 'lar'), array(2745, 'fus'), array(2742, 'dom'), array(2735, 'vil'), array(2732, 'nes'), array(2732, 'ghia'),
array(2731, 'să-i'), array(2727, 'ect'), array(2709, 'sul'), array(2704, 'jor'), array(2702, 'bog'), array(2699,
'tori'), array(2685, 'bib'), array(2673, 'vir'), array(2664, 'gră'), array(2650, 'suri'), array(1555, 'fost'));
$nrSilabe = array(8105092, 4069796, 1894495, 1513189, 439768, 68566, 7717);
$parti = array( 
array(1000, 'cuvinte'),
array(70, 'nume'),
array(20, 'suspensie'),
array(500, 'virgula'),
array(90, 'punctsivirgula'),
array(30, 'ghilimele'),
array(70, 'paranteza'),
array(40, 'liniepauza'),
array(30, 'numar')
);
$lenSilabe = count($silabe);
$lenParti = count($parti);
$lenNrSilabe = count($nrSilabe);

$sumaSilabe = 0;
$sumaNrSilabe = 0;
$sumaParti = 0;

foreach ($silabe as $sil)
    $sumaSilabe += $sil[0];

foreach ($nrSilabe as $n)
    $sumaNrSilabe += $n;

foreach ($parti as $p)
    $sumaParti += $p[0];

function silaba()
{
    global $silabe, $sumaSilabe, $lenSilabe;
    $nr = mt_rand(1, $sumaSilabe);
    $a = 0;

    for ($i = 0; $i < $lenSilabe; $i++)
    {
        $a += $silabe[$i][0];
        if ($nr <= $a)
            return $silabe[$i][1];
    }

}
function parte()
{
    global $parti, $sumaParti, $lenParti;
    $nr = mt_rand(1, $sumaParti);
    $a = 0;

    for ($i = 0; $i < $lenParti; $i++)
    {
        $a += $parti[$i][0];
        if ($nr <= $a)
            return $parti[$i][1];
    }
}
function cuvant()
{
    global $nrSilabe, $sumaNrSilabe, $lenNrSilabe;
    $nr = mt_rand(1, $sumaNrSilabe);
    $a = 0;

    for ($i = 0; $i < $lenNrSilabe; $i++)
    {
        $a += $nrSilabe[$i];
        if ($nr <= $a)
        {
            $cuv = "";
            $total = $i + 1;

            while ($total > 0)
            {
                $sil = silaba();

                if ($cuv == "" || ($cuv != "" && $cuv[strlen($cuv) - 1] != $sil[0] && substr($sil, 0, 2) != "î"))
                {
                    $cuv .= $sil;
                    $total--;
                }
            }

            // Niciun cuvânt nu se termină în „â“.
            if (substr($cuv, -2) == "â")
                $cuv = substr($cuv, 0, strlen($cuv) - 2) . "î";

            return $cuv;
        }
    }
}
function nume()
{
    $cuv = "";
    while (strlen($cuv) < 4)
        $cuv = cuvant();

    $pr = substr($cuv, 0, 2);
    if ($pr == "ă")
        return "Ă" . substr($cuv, 2);
    elseif ($pr == "â")
        return "Â" . substr($cuv, 2); // Ăăă, sau nu.
    elseif ($pr == "î")
        return "Î" . substr($cuv, 2);
    elseif ($pr == "ș")
        return "Ș" . substr($cuv, 2);
    elseif ($pr == "ț")
        return "Ț" . substr($cuv, 2);
    else
        return ucfirst($cuv);
}
function cuvinte()
{
    $n = mt_rand(1, 4);
    $ret = "";
    for ($i = 0; $i < $n; $i++)
        $ret .= " " . cuvant();

    return $ret;
}

function numar()
{
    $sansa = mt_rand(1, 100);

    if ($sansa < 30)
        return mt_rand(0, 9);
    elseif ($sansa < 60)
        return mt_rand(10, 99);
    elseif ($sansa < 80)
        return mt_rand(100, 999);
    elseif ($sansa < 90)
        return mt_rand(0, 100) . "," . mt_rand(0, 999);
    else
    {
        $n = mt_rand(1, 3);
        $ret = mt_rand(1,999);
        for ($i = 0; $i < $n; $i++)
            $ret .= "." . mt_rand(100, 999);
        return $ret;
    }
}

function propozitie()
{
    $ret = nume();

    $cat = mt_rand(1, 6);
    for ($i = 0; $i < $cat; $i++)
    {
        $p = parte();
        if ($p == "cuvinte")
            $ret .= cuvinte();
        elseif ($p == "nume")
            $ret .= " " . nume();
        elseif ($p == "virgula")
            $ret .= "," . cuvinte();
        elseif ($p == "suspensie")
            $ret .= "…" . cuvinte();
        elseif ($p == "punctsivirgula")
            $ret .= ";" . cuvinte();
        elseif ($p == "ghilimele")
            $ret .= " „" . substr(cuvinte(), 1) . "“";
        elseif ($p == "paranteza")
            $ret .= " (" . substr(cuvinte(), 1) . cuvinte() . ")";
        elseif ($p == "liniepauza")
            $ret .= " — " . cuvinte();
        elseif ($p == "numar")
            $ret .= " " . numar();
    }

    $sfarsit = mt_rand(1, 100);
    if ($sfarsit < 75)
        $ret .= ".";
    elseif ($sfarsit < 89)
        $ret .= "!";
    elseif ($sfarsit < 97)
        $ret .= "?";
    else
        $ret .= "…";

    $ret = str_replace("“ „", " ", $ret);
    $ret = str_replace(") (", " ", $ret);

    return $ret;
}

function alineat()
{
    $ret = "<p>";
    $n = mt_rand(1, 8);
    for ($i = 0; $i < $n; $i++)
        $ret .= propozitie() . " ";

    return substr($ret, 0, -1) . "</p>";
}

// Trebuie să pun și ?!. și „ghilimele“ și linie de pauză și numere și intervale de numere și paranteze și titluri nu
// doar cuvinte.

echo '<?xml version="1.0" encoding="utf-8"?>',
'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">',
'<html xmlns="http://www.w3.org/1999/xhtml" lang="ro">',
    '<head>',
        '<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>',
        '<meta http-equiv="Content-Language" content="ro"/>',
        '<title>Pseudoromână</title>',
        '<meta name="description" content="Un generator de pseudoromână."/>',
        '<meta name="keywords" content="pseudoromână, lorem ipsum, generator"/>',
        '<meta name="author" content="Paul Nechifor"/>',
        '<link rel="shortcut icon" href="favicon.png" type="image/png"/>',
        '<style type="text/css">',
            '*{margin:0;padding:0;outline:none}',
            "html{cursor:default;font-family:sans-serif,serif;font-size:13px;background-image:url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAMAAAADCAYAAABWKLW/AAAAGklEQVQY02NgYGDgamhoYABhCAEVYICLAgUAtkMJH4c8RtYAAAAASUVORK5CYII=')}",
            'body{width:400px;padding:20px;margin:0 auto;background-color:#FFF;border:1px solid #dedede;}',
            'h1 a{margin:0 auto;display:block;width:308px;height:46px;text-indent:-9999px;background:url(titlu.png)}',
            'h1 a:hover{background:url(titlu.png) 0px 46px}',
            'p{line-height:1.5;text-align:justify;text-indent:30px;}',
            'a{text-decoration:none;color:#888;}',
            'a:hover{text-decoration:underline}',
            '#intro{margin:20px 0;padding:10px;background-color:#f7f7f7;border:1px solid #efefef}',
            '#ultimul{text-indent:0;font-size:10px;text-align:center;color:#444; margin-top:15px;}',
        '</style>',
        "<script type=\"text/javascript\">var _gaq=_gaq||[];_gaq.push(['_setAccount','UA-21890175-1']);_gaq.push(['_trackPageview']);(function(){var ga=document.createElement('script');ga.type='text/javascript';ga.async=true;ga.src=('https:'==document.location.protocol?'https://ssl':'http://www')+'.google-analytics.com/ga.js';var s=document.getElementsByTagName('script')[0];s.parentNode.insertBefore(ga, s);})();</script>",
    '</head>',
    '<body>';

echo
    '<h1><a href="/pseudorom">Pseudoromână</a></h1>',
    '<div id="intro">',
    '<p>Acesta este un generator de pseudoromână. Este echivalentul a <a href="http://ro.lipsum.com/">Lorem ipsum</a>',
    ' pentru limba română, adică folosește literele specifice limbii române. Dar spre diferență de Lorem ipsum, acest',
    ' generator adaugă și numere, paranteze, ghilimele, linii de pauză și puncte de suspensie.</p>',
    '<p>Acest tip de generator se poate folosi, spre exemplu, pentru a testa un <em>font</em> nou pentru a vedea dacă afișează cum trebuie literele românești corecte pe un sit web.</p>',
    '<p>Urmează textul generat aleatoriu. Apasă pe titlu ca să generezi altul.</p>',
    '</div>',
    "<p>Lure ișu dulor set amăt, consectăr adipșici înlit, săd du iușmod tempur încidut cât laborare și dulori magnici alica. ", substr(alineat(), 3);

for ($i = 0; $i < 10; $i++)
    echo alineat();

echo
    '<p id="ultimul">Vezi și alte pagini de pe situl ăsta la <a href="/">minimul.ro</a>.</p>',
    '</body></html><!--', (microtime(true) - $timp_inceput), '-->';
?>
