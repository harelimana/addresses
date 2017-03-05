<?php

require __DIR__ . '/controller/Adresse.php';
require __DIR__ . '/controller/AdresseManager.php';

$connex = new PDO('mysql:host=localhost;dbname=adresses', 'root', 'root');
$connex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
$adresseManager = new AdresseManager($connex);
echo 'instantiation occured !';

if (isset($_POST['submit']) && isset($_POST['rue'])) {

    $adresse = new Adresse ();
    
    $adresse->setRue($_POST['rue']);
    $adresse->setNumero($_POST['numero']);
    $adresse->setLocalite($_POST['localite']);
    $adresse->setCodePostal($_POST['codepostal']);
    $adresse->setPays($_POST['pays']);
    
/* tests of invalid adresse  will be here */
    
    $adresseManager->createAddress($adresse);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Class Adresse</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="CSS/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
        <link href="CSS/bootstrap.css" rel="stylesheet" type="text/css"/>
    </head>
    <body
<center >
    <h1 class="h1 small">Ajout d'adresse</h1></br>
    <form action=" " method="POST" class="form-control">
        <label for="rue">RUE</label><input type="text" name="rue" id="name"/></br>
        <label for="numeroRue">numero rue</label><input type="text" name="numero" id="numero"/></br>
        <label for="localite">localite</label><input type="text" name="localite" id="localite"/></br>
        <label for="codepostal">code postal</label><input type="text" name="codepostal" id="codepostal"/></br>
        <label for="pays">pays</label><input type="pays" name="pays" id="pays"/></br>
        <input type="submit" name="submit" value="Send"/><input type="reset" name="reset" value="Annuler" />
    </form>
</center>
</body>
</html>