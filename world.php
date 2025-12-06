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
<table>
  <tr>
    <th>Country Name</th>
    <th>Continent</th>
    <th>Independence Year</th>
    <th>Head of State</th>
  </tr>
<?php if (isset($results)): ?>
  <?php foreach ($results as $row): ?>
  <tr>
    <td><?= $row['continent']; ?></td>
    <td><?= $row['name']; ?></td>
    <td><?= $row['independence_year']; ?></td>
    <td><?= $row['head_of_state']; ?></td>
  </tr>
  <?php endforeach; ?>
<?php endif; ?>
</table>
