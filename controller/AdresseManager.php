<?php

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
                SET id = :id,rue = :rue,
                numero = :numero,
                codepostal = :codepostal,
                localite = :localite,
                pays = :pays WHERE id = :id");
        $stmt->bindValue(':id', $adresse->getId());
        $stmt->bindValue(':rue', $adresse->getRue());
        $stmt->bindValue(':numero', $adresse->getNumero());
        $stmt->bindValue(':codepostal', $adresse->getCodePostal());
        $stmt->bindValue(':localite', $adresse->getLocalite());
        $stmt->bindValue(':pays', $adresse->getPays());
        $stmt->execute();
    }

    public function readAddress($id = null) {
        $data = [];
        $stmt = $this->connexion->prepare("SELECT * FROM adresses WHERE id = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute(array(':id' => $id));
        
        while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $data = new Adresse($result);
        }
        
        return $data;
    }

    public function retrieveAll() {
        $data = [];
        $stmt = $this->connexion->query('SELECT * FROM adresses ORDER BY rue');
        $stmt->execute();
        
        while ($result = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
            $data = new Adresse($result);
        }
        
        return $data;
    }

    public function deleteAddress(Adresse $adresse) {

        $this->connexion->exec("DELETE FROM adresses WHERE id =" . $adresse->getId());

        return;
    }

}
