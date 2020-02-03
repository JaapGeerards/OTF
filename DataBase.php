<?php
$host = "localhost"; // De server waar de database staat
$dbname = "dbotf"; // De naam van de database
$user = "root"; // De gebruikersnaam voor de database (root is default bij XAMPP)
$password = ""; // Het wachtwoord voor de gebruiker (leeg is default bij XAMPP)
try{
    // Proberen verbinding te maken met de database en de verbinding opslaan in de variable con
    $con = new PDO("mysql:host=$host;dbname=$dbname",$user,$password);
} catch(PDOException $ex){
    // Als de verbinding maken mislukt
    echo "Verbinding mislukt: $ex";
}
?>