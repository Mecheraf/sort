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

function bubble_sort($tab)
{
    $iteration = 0;
    $comparaison = 0;
    for($i = 0; $i < count($tab) - 1 ;$i++)
    {
      for($j = 0; $j < count($tab) - $i - 1; $j++)
      {
        if($tab[$j] > $tab[$j+1])
        {
          $tmp = $tab[$j];
          $tab[$j] = $tab[$j + 1];
          $tab[$j + 1] = $tmp;
        }
        $comparaison = $comparaison + 1;
      }
      $iteration = $iteration + $j;
    }
    print_tab("Résultat", $tab);
    print("Nb de comparaison : $comparaison\n");
    print("Nb d'itération : $iteration\n");
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
bubble_sort($array);
$end_time = microtime(true);
$final_time = ($end_time - $start_time);
print("Temps (sec) : ".number_format($final_time, 2)."\n");
?>