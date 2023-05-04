<?php

require('vendor/autoload.php');
$faker = Faker\Factory::create();
$host = 'localhost:3306';
$username = 'root';
$password = '';
$dbname = 'fakeraccount_db';
$conn = mysqli_connect($host, $username, $password, $dbname);

if(!$conn)
{   
    die(mysqli_connect_errno());
}  

for ($i = 1; $i <= 100; $i++) {   
    $email = $faker->email;
    $lastName = $faker->lastName;
    $firstName = $faker->firstName;
    $userName = strtolower($firstName) . "." . strtolower($lastName) . $faker->numberBetween(1, 99); // generate a username with format "firstname.lastname[number between 1-99]"
    $password = password_hash($faker->password, PASSWORD_DEFAULT); // generate a password hash using PHP's built-in password_hash() function
    
    // escape special characters in user input
    $email = mysqli_real_escape_string($conn, $email);
    $lastName = mysqli_real_escape_string($conn, $lastName);
    $firstName = mysqli_real_escape_string($conn, $firstName);
    $userName = mysqli_real_escape_string($conn, $userName);
    $password = mysqli_real_escape_string($conn, $password);

    $sql = "INSERT INTO useraccount(email, lastName, firstName, userName, password) VALUES('$email', '$lastName', '$firstName', '$userName', '$password')";     
    mysqli_query($conn, $sql);
}

echo "Fake data inserted successfully!";

?>
