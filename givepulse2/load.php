<?php

//load.php

$connect = new PDO('mysql:host=localhost;dbname= givepulse_test', 'root', '');

$data = array();

$query = "SELECT * FROM events ORDER BY id";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $data[] = array(
  'id'   => $row["id"],
  'title'   => $row["title"],
  'start'   => $row["start_date_time"],
  'end'   => $row["end_date_time"]
 );
}

echo json_encode($data);

?>