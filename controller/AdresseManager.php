<?php

use PDO;

/**
 * Description of AdresseManager
 *
 * @author axxaroot
 */
class AdresseManager {

    public function __construct($connex) {
        $this->connexion = $connex;
    }

    public function getConnexion() {
        return $this->connexion;
    }

    public function createAddress(Adresse $adresse) {
        $stmt = $this->connexion->prepare("INSERT INTO adresses
                SET rue = :rue,
                numero = :numero,
                codepostal = :codepostal,
                localite = :localite,
                pays = :pays");
        $stmt->bindValue(':rue', $adresse->getRue());
        $stmt->bindValue(':numero', $adresse->getNumero());
        $stmt->bindValue(':codepostal', $adresse->getCodePostal());
        $stmt->bindValue(':localite', $adresse->getLocalite());
        $stmt->bindValue(':pays', $adresse->getPays());
        $stmt->execute();
    }

    public function updateAddress(Adresse $adresse) {
        $stmt = $this->connexion->prepare("UPDATE adresses
                SET rue = :rue,
                numero = :numero,
                codepostal = :codepostal,
                localite = :localite,
                pays = :pays");
        $stmt->bindValue(':rue', $adresse->getRue());
        $stmt->bindValue(':numero', $adresse->getNumero());
        $stmt->bindValue(':codepostal', $adresse->getCodePostal());
        $stmt->bindValue(':localite', $adresse->getLocalite());
        $stmt->bindValue(':pays', $adresse->getPays());
        $stmt->execute();
    }

    public function readAddress($id) {
        $idd = (int) $id;
        $stmt = $this->connexion->prepare('SELECT * FROM adresses WHERE id = ' . $idd);
        $stmt->bindValue(':id', id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        var_dump($result);
        return $result;
    }

    public function retrieveAll() {
        $stmt = $this->connexion->query('SELECT * FROM adresses');
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        var_dump($result);
        return $result;
    }

    public function deleteAddress(Adresse $adresse) {
      
        $this->connexion->exec('DELETE FROM adresses WHERE id = ' . $adresse->getId());
     
      //  $this->execute();
        echo 'the ' . $adresse->getId() . ' record has been deleted !';
        return;
    }

    public function hydrate(array $adresse) {
        foreach ($adresse as $key => $val) { // ceci permet de destructurer
            $nomMethode = 'set' . ucfirst($key);
            if (method_exists($this, $nomMethode)) {
                $this->$nomMethode($val);
                echo $nomMethode . '<br/>';
            }
            // echo $key . ' ' . $val . "<br/>";
        }
        return;
    }

}