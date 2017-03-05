<?php
require __DIR__ . '/controller/Adresse.php';
require __DIR__ . '/controller/AdresseManager.php';

$connex = new PDO('mysql:host=localhost;dbname=adresses', 'root', 'root');
$connex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
$adresseManager = new AdresseManager($connex);
echo 'instantiation occured !';

if (isset($_POST['submit'])) {

    $adresse = new Adresse ();

    $id = $adresse->setId($_POST['id']);
    $rue = $adresse->setRue($_POST['rue']);
    $num = $adresse->setNumero($_POST['numero']);
    $localite = $adresse->setLocalite($_POST['localite']);
    $codePostal = $adresse->setCodePostal($_POST['codepostal']);
    $pays = $adresse->setPays($_POST['pays']);

    /* tests of invalid adresse  will be here */

    $result = $adresseManager->retrieveAll($adresse);
    
    $adresseManager->hydrate($result);
    echo "<pre>";
    $adresse->__toString($adresse->getId(), $adresse->getRue(), 
            $adresse->getNumero(), $adresse->getLocalite(), $adresse->getCodePostal(), $adresse->getPays());
    echo "</pre>";
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Class Adresse - Update</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="CSS/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
        <link href="CSS/bootstrap.css" rel="stylesheet" type="text/css"/>
    </head>
    <body
<center >
    <h1 class="h1 small">Update an address</h1></br>
    <form action=" " method="POST" class="form-control">
        <label for="Identifiant">Identifiant</label><input type="number" name="id" id="id"/></br>
        <label for="rue">RUE</label><input type="text" name="rue" id="rue"/></br>
        <label for="numeroRue">numero rue</label><input type="text" name="numero" id="numero"/></br>
        <label for="localite">localite</label><input type="text" name="localite" id="localite"/></br>
        <label for="codepostal">code postal</label><input type="text" name="codepostal" id="codepostal"/></br>
        <label for="pays">pays</label><input type="pays" name="pays" id="pays"/></br>
        <input type="submit" name="submit" value="Send"/><input type="reset" name="reset" value="Annuler" />
    </form>
</center>
</body>
</html>
