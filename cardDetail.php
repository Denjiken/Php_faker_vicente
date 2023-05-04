<?php
ini_set('display_errors', 1);
require('vendor/autoload.php');
$faker = Faker\Factory::create();
$host = 'localhost:3306';
$username = 'root';
$password = '';
$dbname = 'carddetail_db';
$conn = mysqli_connect($host, $username, $password, $dbname);

if(!$conn)
{   
    die(mysqli_connect_errno());
}  

for ($i=0; $i < 20; $i++){   
    $creditCardType = $faker->creditCardType();
    $creditCardNumber = $faker->creditCardNumber();
    $creditCardExpirationDate = $faker->creditCardExpirationDate()->format('Y-m-d');
    $userIdNumber = $faker->numberBetween($min = 1, $max = 100);
    $sql = "INSERT INTO cardDetail(ccid, creditCardType, creditCardNumber, creditCardExpirationDate, userIdNumber) 
            VALUES (null, '$creditCardType', '$creditCardNumber', '$creditCardExpirationDate', $userIdNumber)";
    mysqli_query($conn, $sql);
}
mysqli_close($conn);

?>
