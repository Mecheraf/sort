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
function selection_sort($tab)
{
    $pos = 0;
    $comparaison = 0;
    for($i = 0; $i < count($tab) ;$i++)
    {
      $min = $tab[$i];
      $pos = $i;
      for($j = $i + 1; $j < count($tab) ; $j++)
      {
        $comparaison = $comparaison + 1;
        if($tab[$j] < $min)
        {
          $min = $tab[$j];
          $pos = $j;
        }
      }
      $tab[$pos] = $tab[$i];
      $tab[$i] = $min;
    }
    print_tab("Résultat", $tab);
    print("Nb de comparaison : $comparaison\n");
    print("Nb d'itération : $comparaison\n");
    return $tab;
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
selection_sort($array);
$end_time = microtime(true);
$final_time = ($end_time - $start_time);
print("Temps (sec) : ".number_format($final_time, 2)."\n");
?>