<?php
$servername = "localhost";
$username ="root";
$password="";
$dbname="guvii";
$connect=mysqli_connect($servername,$username,$password,$dbname);
if(mysqli_connect_errno())
{
    echo "falied to connect";
}
// echo $_POST['name'];
if(isset($_POST['name']) && $_POST['name']!='' && isset($_POST['password']) && $_POST['password']!='')
{
    $sql = "INSERT INTO register(name,password) VALUES('".addslashes($_POST['name'])."','".addslashes($_POST['password'])."')";
    $connect->query($sql);
}

$uri = 'mongodb://localhost:27017/';
$manager = new MongoDB\Driver\Manager($uri);

$database = "test";
$collection = "col";

$bulk = new MongoDB\Driver\BulkWrite;

$document = [
    // 'email' => 'e',
    'name'=> $_POST['name'],
    'password' => $_POST['password']
    // 'confirmPassword' => $confirmPassword,
];

$bulk = new MongoDB\Driver\BulkWrite;

// Add insert operation to bulk write object
$bulk->insert($document);

// Create MongoDB write concern object
$writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 1000);

// Execute bulk write operation
$result = $manager->executeBulkWrite("$database.$collection", $bulk, $writeConcern);

// Print result
printf("Inserted %d document(s)\n", $result->getInsertedCount());
?>