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
function insertion_sort($tab)
{
    $iteration = 0;
    $comparaison = 0;
    $insertion_array[0] = $tab[0];
    for($i = 1; $i < count($tab);$i++)
    {
      $check = 0;
      $tmp = sizeof($insertion_array);
      $j = 0;

      for(; $j < $tmp && $check == 0; $j++)
      {
        $comparaison = $comparaison + 1;
        if($insertion_array[$j] >= $tab[$i])
        {
          array_splice($insertion_array, $j, 0, $tab[$i]);
          $check = 1;
        }
      }
      if($check == 0)
      {
        array_push($insertion_array, $tab[$i]);
      }
    }
    print_tab("Résultat", $insertion_array);
    print("Nb de comparaison : $comparaison\n");
    print("Nb d'itération : $comparaison\n");
    return $insertion_array;
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
insertion_sort($array);
$end_time = microtime(true);
$final_time = ($end_time - $start_time);
print("Temps (sec) : ".number_format($final_time, 2)."\n")
?>