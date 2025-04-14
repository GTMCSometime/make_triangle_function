<?php
$number = $argv[1];
    function MakeTriangle($number) {

    if(sqrt($number) > intval(sqrt($number))) { // Если квадратный корень числа не целое число, 
        return 'Невозможно построить треугольник!';                 // из него невозможно построить треугольник
    }

    $result = [];
    $num = $number; // число, которое будем уменьшать
    $increasingWidth = 1;   // число, которое будет с каждым рядом смещать пробелы вправо
    $originWidth = sqrt($number) +  sqrt($number) - 1;  // узнаем ширину основания
    $decreasingWidth = $originWidth;    // число, которое будет с каждым рядом смещать пробелы влево

  for($i = 0; $i < sqrt($number); $i++) {   // проходим по каждому уровню
    if($i == 0) {                                // заполняем первый уровень полностью

        for($j = $number; $j > $number - $originWidth; $j--) {
            $result[$i][] = $j;
    }

    $num -= $originWidth;   //отнимаем от вводного уже использованные числа

  } else {
 
    for($j = $originWidth; $j > 0; $j--) {
  if($j >= $decreasingWidth || $j <= $increasingWidth) {  //смещаем к центру
            $result[$i][] = '';
        
  } else {
    $result[$i][] = $num;
            $num--;
        }
}

$increasingWidth++;
$decreasingWidth--;

}
  }

   $result = array_reverse($result);
   $arr = [];
   foreach($result as $key => $value) {
    $arr[] = array_reverse($value);
   }
   return $arr;
    }

print_r(MakeTriangle($number));