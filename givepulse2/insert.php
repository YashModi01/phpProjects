<?php

//insert.php

$connect = new PDO('mysql:host=localhost;dbname= givepulse_test', 'root', '');

if(isset($_POST["title"]))
{
 $query = "
 INSERT INTO events 
 (title, start_date_time, end_date_time) 
 VALUES (:title, :start_date_time, :end_date_time)
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':title'  => $_POST['title'],
   ':start_date_time' => $_POST['start'],
   ':end_date_time' => $_POST['end']
  )
 );
}


?>
