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

function comb_sort($tab)
{
    $gap = sizeof($tab) - 3; //Gap between the two values we check
    $iteration = 0;
    for($i = 0; $i < count($tab) - 1 && $gap != 0 ;$i++)
    {
      for($j = 0; $j + $gap < count($tab); $j++)
      {
        if($tab[$j] > $tab[$gap + $j])
        {
          //Switch the values
          $tmp = $tab[$j];
          $tab[$j] = $tab[$gap + $j];
          $tab[$gap + $j] = $tmp;
        }
        $iteration = $iteration +1;
      }
      $gap = $gap - 1; //Reduce the gap since we hit the end
    }
    print_tab("Résultat", $tab);
    print("Nb de comparaison : $iteration\n");
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
comb_sort($array);
$end_time = microtime(true);
$final_time = ($end_time - $start_time);
print("Temps (sec) : ".number_format($final_time, 2)."\n");
?>