<?php

use PDO;

require __DIR__ . '/Adresse.php';
require __DIR__ . '/AdresseManager.php';
echo 'debut' . '</br>';

try {

    $adresse0 = new Adresse();
    $adresse1 = new Adresse();
    $adresse2 = new Adresse();
    $adresse3 = new Adresse();
    $adresse4 = new Adresse();

    $connex = new PDO('mysql:host=localhost;dbname=adresses', 'root', 'root');

    echo "connexion établie" . '</br>';

    $adresseManager = new AdresseManager($connex);

    $adresse0->setRue('Kaizerlaan');
    $adresse0->setNumero(126);
    $adresse0->setLocalite('Brussel');
    $adresse0->setCodePostal(1000);
    $adresse0->setPays('België');

    $adresse1->setRue('Rue de la Dodane');
    $adresse1->setNumero(53);
    $adresse1->setLocalite('Namur');
    $adresse1->setCodePostal(5000);
    $adresse1->setPays('Belgique');

    $adresse2->setRue('Rue Chaudes Voies');
    $adresse2->setNumero(15);
    $adresse2->setLocalite('Naninne');
    $adresse2->setCodePostal(5100);
    $adresse2->setPays('Belgique');

    $adresse3->setRue('Rue de Bruxelles');
    $adresse3->setNumero(65);
    $adresse3->setLocalite('NAMUR');
    $adresse3->setCodePostal(5000);
    $adresse3->setPays('Belgique');

    $adresse4->setRue('Rue GrandGagnage');
    $adresse4->setNumero(20);
    $adresse4->setLocalite('NAMUR');
    $adresse4->setCodePostal(5000);
    $adresse4->setPays('Belgique');
    echo 'je suis bê..';

    /* ======== insert an address into the table ====== */

    $adresseManager->createAddress($adresse2);

    /* ======== read an address if a given ID ======== */

    $foundAd = $adresseManager->readAddress(25);
    foreach ($foundAd as $ad => $value) {
        echo $ad . ' ' . $value . "</br";
    }

    /* ======== find all the addresses ================ */

    $adresseManager->retrieveAll();

    /* ======== update one addresse of a given ID ===== */

    $adresseManager->updateAddress(13);

    /* ======== delete one addresse of a given ID ===== */

    $adresseManager->deleteAddress($adresse3);

    
} catch (\PDOException $e) {
    // error unettended
    echo 'La cata';
}
