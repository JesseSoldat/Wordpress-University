#1200 h 900 w
#1-----------------------------
<?php  echo 3 + 3;
  $firstname = 'Jesse';
?>
<h1>This is the JLab Theme</h1>
<h2>This is just HTML</h2>
<h2>Created by <?php echo $firstname?></h2>

#2-----------------------------
<?php 
function jLabFunction() {
  echo 5 * 5;
}

function multiplicationFunction($num1, $num2) {
  $total = $num1 * $num2;
  echo "<h1> $num1 X $num2 = $total </h1>";
}

function greetingFunction($name, $food) {
  echo "<hr/><h1>Hi my name is $name and my favorite food is $food</h1>";
}
?>

<h1>5 X 5 = <?php jLabFunction() ?></h1>
<br/>
<?php multiplicationFunction(9, 9) ?>
<?php 
greetingFunction('Jesse', "sushi"); 
greetingFunction('Joe', "pizza"); 
greetingFunction('Kim', "pasta"); 
?>

#3-----------------------------
<h1><?php bloginfo('name'); ?></h1>
<h3><?php bloginfo('description'); ?></h3>

#4-----------------------------
<h1>Please Count to 10</h1>
<ul>
<?php
$count = 1; 
while($count < 11) {
  echo "<li><strong>$count</strong></li>";
  $count++;
}
?>
</ul>



