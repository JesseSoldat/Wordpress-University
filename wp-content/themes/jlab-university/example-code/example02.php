#3----------------------

<?php
$allSubjects = array('Math', 'English', 'Health', 'History', 'Science', 'Geography');


function allSubjects($allSubjects) {
  $count = 0; 
  while($count < count($allSubjects)) {
    echo "<li>$allSubjects[$count]</li>";
    $count++;
  }
}
?>

<h1>All Subjects</h1>
<hr>
<ul>
<?php allSubjects($allSubjects); ?>
</ul>


<?php 
$passedSubjects = array('Math', 'English', 'Health', 'History');
$failedSubjects = array('Science', 'Geography');
?>

<h1>Passed Subjects</h1>
<hr>
<ul>
<?php 
foreach ($passedSubjects as $value) {
    echo "<li>$value </li>";
}
?>
</ul>

<h1>Failed Subjects</h1>
<hr>
<ul>
<?php
foreach ($failedSubjects as  $value) {
  echo "<li>$value </li>";
}
?>
</ul>



#2----------------------
<?php
while(have_posts()) {
  the_post(); ?>
  <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
  <p><?php the_content(); ?></p>
  <hr>
<?php 
}
?>




