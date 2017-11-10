<?php
require 'functions.php';

$year = '';
$month = '';
$day = '';
$bool = false;

if(isset($_POST['year']) && !empty($_POST['year']) && isset($_POST['month']) && isset($_POST['day']) && validateY($_POST['year']) && validateM($_POST['month']) && validateD($_POST['month'])) {
    $year = $_POST['year'];
    $month = $_POST['month'];
    $day = $_POST['day'];
    $bool = true;
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Calendar</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <h3>Create calendar: </h3>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
    <input type="text" name="year" value="<?php if(!empty($_POST['year'])) echo $year;?>" placeholder="<?php if(empty($_POST['year'])) echo 'write a year..';?>" required>
    <select name="month">
      <option value="0">all</option>
      <option value="1">January</option>
      <option value="2">February</option>
      <option value="3">March</option>
      <option value="4">April</option>
      <option value="5">May</option>
      <option value="6">June</option>
      <option value="7">July</option>
      <option value="8">August</option>
      <option value="9">September</option>
      <option value="10">October</option>
      <option value="11">November</option>
      <option value="12">December</option>
    </select>
    <select name="day">
      <option value="0">day</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
      <option value="7">7</option>
      <option value="8">8</option>
      <option value="9">9</option>
      <option value="10">10</option>
      <option value="11">11</option>
      <option value="12">12</option>
      <option value="13">13</option>
      <option value="14">14</option>
      <option value="15">15</option>
      <option value="16">16</option>
      <option value="17">17</option>
      <option value="18">18</option>
      <option value="19">19</option>
      <option value="20">20</option>
      <option value="21">21</option>
      <option value="22">22</option>
      <option value="23">23</option>
      <option value="24">24</option>
      <option value="25">25</option>
      <option value="26">26</option>
      <option value="27">27</option>
      <option value="28">28</option>
      <option value="29">29</option>
      <option value="30">30</option>
      <option value="31">31</option>
    </select>
    <input type="submit" class="submit" value="Show Calendar">
  </form>

  <?php if($bool) show_calendar($year,$month,$day);?>

</body>
</html>
