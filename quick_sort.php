<?php

function print_tab($str, $tab)
{
  print("$str : ");
  for($i = 0; $i < count($tab) - 1; $i++)
  {
    print($tab[$i].";");

  }
  print("$tab[$i]\n");
}

function fill_array($arr1, $arr2, $piv)
{
  $res = array();
  for($i = 0; $i < sizeof($arr1); $i++)
    array_push($res, $arr1[$i]);
  array_push($res, $piv);
  for($i = 0; $i < sizeof($arr2); $i++)
    array_push($res, $arr2[$i]);
  return $res;
}
$comparaison = 0;
$iteration = 0;

function quick_sort($tab)
{
    global $comparaison, $iteration;
    $tab1 = array();
    $tab2 = array();
    for($i = 0; $i < count($tab) - 1; $i++)
    {
      $pivot = $tab[sizeof($tab)-1];
      $comparaison = $comparaison+1;
      if($tab[$i] <= $pivot)
      {
        array_push($tab1, $tab[$i]);
      }else
      {
        array_push($tab2, $tab[$i]);
      }
    }
    if(sizeof($tab1) >= 2)
      $tab1 = quick_sort($tab1);
    if(sizeof($tab2) >= 2)
      $tab2 = quick_sort($tab2);
    $res = fill_array($tab1, $tab2, $pivot);
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

$array = makearray($argv[1]);
print_tab("Série", $array);
$start_time = microtime(true);
print_tab("Résultat", quick_sort($array));
$end_time = microtime(true);
print("Nb de comparaison : $comparaison\n");
$final_time = ($end_time - $start_time);
print("Temps (sec) : ".number_format($final_time, 2)."\n");
?>