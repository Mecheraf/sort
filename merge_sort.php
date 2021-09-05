<?php
/*Le principe de la fonction merge est de séparer
un tableau trop grand en plusieurs petits tableaux
qu'on trie au fur et mesure pour ensuite les fusionner
en triant les insertions.*/
function print_tab($str, $tab)
{
  print("$str : ");
  for($i = 0; $i < count($tab) - 1; $i++)
  {
    print($tab[$i].";");

  }
  print("$tab[$i]\n");
}

$comparaison = 0;
$iteration = 0;

function merge_sort($tab)
{
  global $comparaison;
  if(sizeof($tab) < 2)
    exit("Size of array invalid. \n");
  $res = array(); //Initialize le resultat
  //On sépare en deux le tableau
  $tab1 = array_slice($tab, 0, intdiv(sizeof($tab), 2));
  $tab2 = array_slice($tab, intdiv(sizeof($tab), 2));
  //Si un des deux tableaux est grand, fonction récursive
  if(sizeof($tab1) >= 2 ){
    $tab1 = merge_sort($tab1);
  }
  if(sizeof($tab2) >= 2 ){
    $tab2 = merge_sort($tab2);
  }

  //On compare les deux tableaux tant que l'on atteint pas l'une des deux ReflectionFunctionAbstract
  for($i = 0, $j = 0; $i < sizeof($tab1) && $j < sizeof($tab2); )
  {
    $comparaison = $comparaison + 1;
    if($tab1[$i] < $tab2[$j])
    {
      //$comparaison = $comparaison + 1;
      $res[$i+$j] = $tab1[$i];
      $i++;
    } else if($tab1[$i] > $tab2[$j])
    {
      //$comparaison = $comparaison + 1;
      $res[$i+$j] = $tab2[$j];
      $j++;
    } else {
      //$comparaison = $comparaison + 1;
      $res[$i+$j] = $tab2[$j];
      $j++;
      $res[$i+$j] = $tab1[$i];
      $i++;
    }
  }
  //On rempli le reste de res avec l'autre tableau pas vidé.
  for(;$i < sizeof($tab1); $i++){
    $res[$i+$j] = $tab1[$i];
  }
  for(;$j < sizeof($tab2); $j++){
    $res[$i+$j] = $tab2[$j];
  }
  return $res;
}

function makearray($text)
{
  $tab = array();
  $cpt = 0;
  for($i = 0; $i < strlen($text); $i++)
  {
    $tmp = '';
    for($j = 0; ($i + $j) < strlen($text) && $text[$i + $j] != ";"; $j++)
    {
      $tmp[$j] = $text[$i + $j];
    }

    $tab[$cpt] = $tmp;

    $cpt = $cpt + 1;
    $i = $i + $j;
  }
  return $tab;
}

//$nb = "845;850;803;376;1023;1424;380;1058;885;1907;952;463;1712;901;511;53;271;265;612;779;1894;1091;931;566;1629;1097;626;614;1631;1151;1949;839;1674;1221;1589;1116;518;1489;1605;1812;1345;1308;748;1044;440;127;1855;1794;925;1025;41;156;692;1275;275;1463;1627;1302;750;1758;1526;536;1016;1467;1656;882;453;665;88;863;1753;1385;586;1298;1035;1943;559;851;266;1842;1433;1095;18;661;1746;1100;783;469;1788;1361;1005;288;1282;85;1521;386;170;1680;275;153;1599;1418;836;1708;969;1017;891;1620;1878;945;1487;1199;1923;1885;917;1600;548;420;1385;1024;983;829;705;1824;1790;1386;322;1589;532;1600;1365;701;9;878;951;1091;500;1694;559;1455;260;1107;1699;1051;308;622;1903;10;1361;1647;311;1796;1253;621;1383;750;1642;752;1486;1413;1868;1301;616;133;1166;1356;1963;205;289;1834;1211;566;1471;1616;1671;459;1270;390;1888;1277;257;748;8;274;1614;1592;1382;490;823;62;1710;1295;1493;627;390;600;692;25;591;590;718;1159;144;1613;1411;1961;101;601;1103;1823;1571;1472;243;174;1646;1527;1771;322;1530;1879;1685;894;805;237;1632;1534;1219;1046;376;1823;268;1721;1300;847;53;1876;73;667;657;93;591;1957;1299;1038;1901;1723;1895;1133;158;958;863;1968;515;576;569;129;1090;426;447;1593;421;1239;244;946;1277;848;264;439;1259;691;1462;1100;1759;194;961;844;1151;1657;1227;1382;323;1157;1556;1178;106;1073;407;930;364;766;1497;940;1176;1261;627;1604;10;1593;309;1888;1285;381;936;1718;998;98;1883;984;198;1136;1255;1746;1860;43;1648;480;1377;1117;925;1596;1543;375;1033;331;1012;886;1706;1936;1595;1895;223;1754;849;341;222;1095;246;1355;810;1998;491;567;1479;563;521;1099;1407;1134;376;1122;1765;689;1407;1118;933;1183;1575;915;1006;925;735;1211;504;975;1346;1529;147;768;1344;1465;1001;508;1028;492;718;1387;1094;793;1784;809;795;739;620;1032;137;763;148;1952;640;1365;1996;432;1282;944;531;842;1728;1625;558;1252;154;1133;702;861;1607;371;311;221;941;758;934;73;537;635;604;580;420;1642;415;1;89;175;1821;11;1416;46;910;1778;1242;325;1930;1298;782;1491;416;1244;1866;800;99;1665;1050;1932;1503;891;54;451;1138;517;1832;794;1201;1122;1442;1331;482;278;829;1242;1741;317;873;669;1733;161;359;1969;7;1639;1170;129;1926;874;1328;659;898;1335;681;451;1786;1401;458;1169;1899;542;1586;995;945;1731;658;1206;395;305;626;200;1497;2;1293;1001;706;195;1094;24;861;1219;998;602;837;248;47;585;974;1859;737;149;1195;1356;790;1614;1853;680;386;1646;1600;473;1721;1586;1557;217;1829;75;456;363;626;268;391;796;203;684;311;1039;1185;1124;570;1398;1556;1109;973;1354;1929;1924;1474;699;503;1392;324;1555;556;462;664;137;770;776;537;533;1482;1090;236;453;982;440;1894;200;1913;1661;695;1799;845;1757;249;1140;382;582;1776;64;1332;387;398;502;761;1868;1550;1223;1488;1636;668;852;1695;1397;1062;654;198;769;914;267;1473;1008;448;310;959;1764;1851;1859;157;554;1232;1603;1610;29;125;1348;1163;919;972;1599;922;1204;1198;1345;485;533;531;472;508;70;1544;668;883;1456;804;1507;264;971;121;1457;1048;346;1437;1800;1083;1795;866;1491;1689;859;364;27;840;128;1830;112;1668;252;1734;798;395;1230;421;1444;780;1617;689;1263;867;1447;1743;1165;1560;280;116;1963;551;849;708;1263;28;1182;139;87;878;373;153;796;606;1500;764;1062;337;1703;1829;1292;555;1668;1812;1837;1901;528;1128;723;1029;706;1464;1586;298;1510;1156;502;1053;399;1694;802;659;509;84;837;122;633;779;1281;1204;727;149;1192;988;908;1213;997;1506;1636;140;189;1654;769;749;688;551;151;234;1404;107;1220;1230;1603;1585;1177;129;66;1508;679;253;203;1656;1422;966;1988;1796;490;1772;1588;542;452;1295;246;1804;385;702;1247;629;940;1800;99;60;441;1312;1683;1502;1717;1681;662;266;367;704;763;133;1573;161;1065;1063;1947;289;778;1395;402;1509;966;429;585;518;926;1334;53;285;78;1143;380;1198;292;278;186;193;830;479;155;628;434;32;12;251;490;414;636;1516;1563;347;1784;1177;1146;930;169;1328;467;184;1915;1822;290;474;195;1577;263;621;1661;158;1586;1543;989;979;71;1463;1615;1831;613;507;1917;1544;1155;886;215;565;684;1177;984;403;1867;1360;1834;323;1355;1689;142;688;1118;761;1829;1962;1782;545;249;325;560;1272;1918;845;269;1684;969;462;474;615;759;1719;884;288;1793;170;877;81;1674;86;1107;184;378;882;1908;510;432;1908;825;395;277;1223;1642;463;86;688;1521;1433;761;1537;505;1431;257;441;1675;644;1867;1476;649;340;1394;412;141;1664;1645;1517;935;43;24;836;1557;574;932;811;1214;827;984;885;1305;308;618;95;1501;330;1463;418;472;1342;122;1542;539;903;1356;1551;1315;411;1911;1071;1636;826;272;1006;1017;39;1180;1410;997;0;303;377;1342;1770;270;273;1135;1501;1525;68;1614;1336;1651;1301;505";
$array = makearray($argv[1]);
print_tab("Série", $array);
$start_time = microtime(true);
print_tab("Résultat", merge_sort($array));
$end_time = microtime(true);
print("Nb de comparaison : $comparaison\n");
//print("Nb de iteration : $iteration\n");
$final_time = ($end_time - $start_time);
print("Temps (sec) : ".number_format($final_time, 2)."\n");
?>