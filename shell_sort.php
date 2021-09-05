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

function shell_sort($tab) {
    $gap = count($tab)/2;
    $iteration = 0;
    $comparaison = 0;

    for ( $gap ; $gap > 0 ; $gap /= 2, $iteration++) {
        $gap = floor($gap);
        for ($i = 0 ; $i + $gap < count($tab) ; $i++, $iteration++) {
            $comparaison++;
            if ($tab[$i] > $tab[$i + $gap]) {
                $tmp = $tab[$i];
                $tab[$i] = $tab[$i + $gap];
                $tab[$i + $gap] = $tmp;
                $ti = $i;
                while($ti - $gap >= 0 && $tab[$ti - $gap] > $tab[$ti]) {
                    $comparaison++;
                    $tmp = $tab[$ti];
                    $tab[$ti] = $tab[$ti - $gap];
                    $tab[$ti - $gap] = $tmp;
                    $ti = $ti - $gap;
                }
            }
        }
    }
    print_tab("Résultat", $tab);
    print("Nb de comparaison : $comparaison\n");
    print("Nb d'itération : $iteration\n");
    return $tab;
}

$array = makearray($argv[1]);
print_tab("Série", $array);
$start_time = microtime(true);
shell_sort($array);
$end_time = microtime(true);
$final_time = ($end_time - $start_time);
print("Temps (sec) : ".number_format($final_time, 2)."\n");
?>