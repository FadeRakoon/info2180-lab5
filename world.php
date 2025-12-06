<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

//check if searched parmeter was given by get
if(isset($_GET['country'])) {
  //set country variable to the value received by get
  $country = $_GET['country'];
  //creates a prepared statement for a safe db query | 
  //we are selecting countries that have a name same as the passed value | 
  //:country is a name placeholder where teh actual country will go in teh sql 
  $stmt = $conn->prepare("SELECT * FROM countries WHERE name LIKE :country");
  //execute the statement
  $stmt->execute(['country' => "%$country%"]);
  
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
}



?>
<ul>
<?php foreach ($results as $row): ?>
  <li><?= $row['name'] . ' is ruled by ' . $row['head_of_state']; ?></li>
<?php endforeach; ?>
</ul>
