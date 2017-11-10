<?php

function validateY($number){

  if(is_numeric($number) && strlen($number) <= 4) {
    return true;
  }else{
    return false;
  }
}

function validateM($month){
  if(is_numeric($month) && ($month >= 0 && $month < 13)) {
    return true;
  }else{
    return false;
  }
}

function validateD($day){
  if(is_numeric($day) && ($day >= 0 && $day < 32)) {
    return true;
  }else{
    return false;
  }
}

function show_calendar($year,$month,$day){
  if($month == 0 && $day == 0){
    full_year($year);
  }elseif($month !== 0 && $day == 0){
    single_month($year,$month,$day);
  }

  if($month == 0 && $day > 0){
    echo 'You must specify the month';
  }elseif($month !== 0 && $day > 0){
    single_month($year,$month,$day);
  }
}

function full_year($year){

  echo '<h2>Calendar for year  <span class="year">' . $year . '</span></h2>';
  $calendar = array();

  for($i = 1; $i <= 3; $i++){
    $calendar[$i] = array();
    for($j = 1; $j <= 4; $j++){
      array_push($calendar[$i],$j);
    }
  }
  month_calendar($calendar,$year);

}

function single_month($year,$month,$day){
  echo '<h3>Month for the year: <span class="year">' . $year . '</span></h3>';
  echo '<table>';
  $mes = month_structure($month,$year);
  print_month($mes,$month,$day);
  echo '</table>';
}

function month_calendar($calendar,$year){

  $c = 1;
  foreach($calendar as $index => $valor){
    echo '<table><tr>';
    foreach($valor as $key => $value){
      $month = month_structure($c,$year);
      print_month($month,$c,0);
      $c++;
    }
  }
  echo '</tr></table></br>';
}

function month_structure($month,$year){

  $mes = array();
  $letras = array('Mo','Tu','We','Th','Fr','Sa','Su');
  $c=1;

  for($i = 1; $i <= 7; $i++){
    $mes[$i] = array();
    if($i == 1){
      for($k = 0; $k <= 6; $k++){
        array_push($mes[$i],$letras[$k]);
      }
    }else{
      if($i == 2){
        $valorj = date("w", mktime(0, 0, 0, $month, 1, $year));
        if($valorj == 0){
          $valorj = 7;
        }

        for($j = 1; $j <= 7; $j++){
          if($j < $valorj){
            array_push($mes[$i],'');
          }else{
            array_push($mes[$i],$c);
            $c++;
          }
        }
      }else{
        for($j = 1; $j <= 7; $j++){
          if(checkdate($month,$c,$year) == 1){
            array_push($mes[$i],$c);
            $c++;
          }else{
            array_push($mes[$i],'');
            $c++;
          }
        }
      }
    }
  }
  return $mes;
}

function print_month($mes,$num,$day){

  $c = 1;
  $mesnom = ['January','February','March','April','May','June','July','August','September','October','November','December'];
  echo '<td><span class="title">' . $mesnom[$num-1] . '</span><hr>';
  foreach($mes as $index => $val){
    echo '<table class="blocmon"><tr>';
    foreach($val as $key => $value){
      if(empty($value) || gettype($value) == 'string'){
        echo '<td class="empty">' . $value . '</td>';
        $c++;
      }else{
        if($key == 5 || $key == 6){
          if($value == $day){
            echo '<td class="month day">' . $value . '</td>';
            $c++;
          }else{
            echo '<td class="month weknd">' . $value . '</td>';
            $c++;
          }
        }else{
          if($value == $day){
            echo '<td class="month day">' . $value . '</td>';
            $c++;
          }else{
            echo '<td class="month">' . $value . '</td>';
            $c++;
          }
        }
      }
    }
  }
  echo '</tr></table></td>';
}
?>
