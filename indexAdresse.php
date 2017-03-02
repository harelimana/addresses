<?php

function loadClasse($classname) {
    require $classname . '.php';
}

spl_autoload_register('loadClasse');
$connex = new PDO('mysql:host=localhost;dbname=addresses', 'root', 'root');
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

    if (!$adresse->invalidAddress()) {
        unset($adresse);
        echo 'Adresse invalide !';
    }elseif ($adresseManager->exists($adresse->getRue())) {
        echo 'la rue' . $adresse->getRue() . 'existe déjà';
        unset($adresse);
    }else{
        $adresseManager->createAddress($adresse);
    }
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
        <label for="numeroRue">numero rue</label><input type="text" name="numerorue" id="numerorue"/></br>
        <label for="localite">localite</label><input type="text" name="localite" id="localite"/></br>
        <label for="codepostal">code postal</label><input type="text" name="codepostal" id="codepostal"/></br>
        <label for="pays">pays</label><input type="pays" name="pays" id="pays"/></br>
        <input type="submit" name="submit" value="Send"/><input type="reset" name="reset" value="Annuler" />
    </form>
</center>
</body>
</html>