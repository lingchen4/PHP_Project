<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form method="POST">
    <input type="number" name="number">
    <input type="submit" value="Submit">
    <button type="submit">submit</button>
  </form>
</body>
</html>

<?php
if($_POST["number"]){
  $number = $_POST["number"];

  $a = $number;
  $sum = 0;
  while($a != 0){
    $rem = $a % 10;
    $sum = $sum + $rem*$rem*$rem;
    $a = intval($a/10);
  }

  if($sum == $number){
    echo "$number is armstrong number";
  }else{
    echo "$number is not armstrong number";
  }
}

?>