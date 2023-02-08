<?php

declare(strict_types = 1);

// Your Code

function parceCsv() :array{
  $rows = array_map('str_getcsv', file(FILES_PATH . 'sample_1.csv'));
  array_shift($rows);
  return $rows;
}
// create new array with sorted data



function getRightDateFormat(string $string) {
  $timeString = strtotime($string);
  $currentTime = date('d M, Y', $timeString);
  return $currentTime;
}


function getDataToTable(array $data) {
  foreach ($data as $subArray){
    $formatedTime = getRightDateFormat($subArray[0]);
    echo "<tr>
    <td> {$formatedTime} </td>
    <td> {$subArray[1]} </td>
    <td> {$subArray[2]} </td>
    <td> {$subArray[3]} </td>
    </tr>";}
}

function getTotalIncome(array $data): float|int {
  $income = [];
  foreach($data as $subArray){
    $num = str_replace("$", "", $subArray[3]);
    if ((int) $num > 0 ){
      array_push($income, $num);
    }
  }
  return array_sum($income);
}

function getTotalExpense(array $data): float|int{
  $expense = [];
  foreach($data as $subArray){
    $num = str_replace("$", "", $subArray[3]);
    if ((int) $num < 0 ){
      array_push($expense, $num);
    }
  }
  return array_sum($expense);
}

function getTotalNet(float|int $income, float|int $expense): float|int{
  $totalNet = $income + $expense;
  return $totalNet;
}

$totalIncome = getTotalIncome(parceCsv());
$totalExpese = getTotalExpense(parceCsv());
$totalNet = getTotalNet($totalIncome, $totalExpese);
