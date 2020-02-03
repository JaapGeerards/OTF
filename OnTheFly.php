<?php
include "DataBase.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>On The Fly</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<style>
    body {
        background-image: url("Airplane.png");
        background-color: #cccccc;
    }
</style>
<body>
<h1>On The Fly</h1>
<h2>Gegevens</h2>
<hr>

<form method="POST">
    <div class="form-group col-md-12">
    <table>
        <tr>
            <th><label for="txtNumber">Nummer</label></th>
            <td><input type="text" id="txtNumber" name="txtNumber" required></td>
        </tr>
        <tr>
            <th><label for="txtType">Type</label></th>
            <td><input type="text" id="txtType" name="txtType" required></td>
        </tr>
        <tr>
            <th><label for="txtAirline">Airline</label></th>
            <td><input type="text" id="txtAirline" name="txtAirline" required></td>
        </tr>
        <tr>
            <th><label for="txtStatus">Status</label></th>
            <td><input type="text" id="txtStatus" name="txtStatus" required></td>
        </tr>
    </table>
    <table>
    <tr>
        <th><label for="txtFlightnumber">Vluchtnummer</label></th>
        <td><input type="text" id="txtFlightnumber" name="txtFlightnumber" required></td>
    </tr>
    <hr>
    <tr>
        <th><label for="txtPlane">Vliegtuig</label></th>
        <td><input type="text" id="txtPlane" name="txtPlane" required></td>
    </tr>
    <tr>
        <th><label for="dtDepart">Datum vertrek</label></th>
        <td><input type="date" id="dtDepart" name="dtDepart" required></td>
    </tr>
    <tr>
        <th><label for="dtRetour">Retour</label></th>
        <td><input type="date" id="dtRetour" name="dtRetour" required></td>
    </tr>
    <tr>
        <th><label for="txtDestination">Destination</label></th>
        <td><input type="text" id="txtDestination" name="txtDestination" required></td>
    </tr>
    <tr>
        <th><label for="txtPlanningStatus">Status</label></th>
        <td><input type="text" id="txtPlanningStatus" name="txtPlanningStatus" required></td>
    </tr>
    </table>
    <tr>
        <th></th>
        <td><input type="submit" name="btnSave" value="Opslaan"></td>
    </tr>
    </div>
</form>
<?php
// Controleren of er op de knop geklikt is
if(isset($_POST["btnSave"])){
    // Formulier data ophalen en opslaan in variable
    $number = $_POST["txtNumber"];
    $type = $_POST["txtType"];
    $airline = $_POST["txtAirline"];
    $status = $_POST["txtStatus"];
    // Opbouwen van query
    $query = "INSERT INTO airplanes (number , type , airline, status) ".
        "VALUES ('$number', '$type', '$airline', '$status')";

    $stm = $con->prepare($query);
    // Query uitvoeren en als dat lukt -> if, als dat niet lukt (fout) -> else
    if($stm->execute()){
        echo "De inschrijving is succesvol opgeslagen!";
    } else {
        echo "Er is helaas iets misgegaan!";
    }
}
// Controleren of er op de knop geklikt is
if(isset($_POST["btnSave"])){
    // Formulier data ophalen en opslaan in variable
    $flightnumber = $_POST["txtFlightnumber"];
    $plane = $_POST["txtPlane"];
    $depart = $_POST["dtDepart"];
    $retour = $_POST["dtRetour"];
    $destination = $_POST["txtDestination"];
    $status = $_POST["txtPlanningStatus"];
    // Opbouwen van query
    $query = "INSERT INTO schedules (flightnumber , plane , depart, retour, destination, status) ".
        "VALUES ('$flightnumber', '$plane', '$depart', '$retour', '$destination','$status')";

    $stm = $con->prepare($query);
    // Query uitvoeren en als dat lukt -> if, als dat niet lukt (fout) -> else
    if($stm->execute()){
        echo "De planning is succesvol opgeslagen!";
    } else {
        echo "Er is helaas iets misgegaan met de planning!";
    }
}
?>
<table>
    <thead>
    <tr>
        <th>airplanenumber</th>
        <th>planetype</th>
        <th>airline</th>
        <th>status</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $querry = "SELECT * FROM airplanes";
    $stm = $con->prepare($querry);
    if($stm->execute()){
        $airplanes = $stm->fetchAll(PDO::FETCH_OBJ);
        foreach($airplanes as $airplanes){
            echo"<tr>";
            echo "<td>$airplanes->number</td>";
            echo "<td>$airplanes->type</td>";
            echo "<td>$airplanes->airline</td>";
            echo "<td>$airplanes->status</td>";
            echo "</tr>";
        }
    }
    ?>
    </tbody>
</table>
</body>
</html>