<?php

//update.php

$connect = new PDO('mysql:host=localhost;dbname= givepulse_test', 'root', '');

if(isset($_POST["id"]))
{
 $query = "UPDATE events SET title=:title, start_date_time=:start_date_time, end_date_time=:end_date_time WHERE id=:id";
 
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':title'  => $_POST['title'],
   ':start_date_time' => $_POST['start'],
   ':end_date_time' => $_POST['end'],
   ':id'   => $_POST['id']
  )
 );
}

?>

