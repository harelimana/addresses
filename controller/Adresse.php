<?php

/**
 * Description of Adresse
 *
 * @author axxaroot
 */
class Adresse {

    private $id;
    private $rue;
    private $numero;
    private $codePostal;
    private $localite;
    private $pays;

    /* ===== constructor ====== */

    function __construct(array $data = null) {
        if (!$data == null) {
            $this->hydrate($data);
        }
    }

    /* ==== the function of auto-hydratation of the Class Adresse  ===== */

    public function hydrate(array $data) {
        foreach ($data as $key => $value) {
            $methodName = 'set' . ucfirst($this->$key);
            if (method_exists($this, $methodName)) {
                $this->$methodName($value);
            }
        }
    }

    /* ====== setters ============= */

    function setId($id) {
        $this->id = $id;
    }

    function setRue($rue) {
        $this->rue = $rue;
    }

    function setNumero($numero) {
        $this->numero = $numero;
    }

    function setLocalite($localite) {
        $this->localite = $localite;
    }

    function setCodePostal($codePostal) {
        $this->codePostal = $codePostal;
    }

    function setPays($pays) {
        $this->pays = $pays;
    }

    /* ==== getters ======== */

    function getId() {
        return $this->id;
    }

    function getRue() {
        return $this->rue;
    }

    function getNumero() {
        return $this->numero;
    }

    function getLocalite() {
        return $this->localite;
    }

    function getCodePostal() {
        return $this->codePostal;
    }

    function getPays() {
        return $this->pays;
    }

    public function __toString() {
        return sprintf(/* '%d %$ %d %s %d %s', */$this->id, $this->rue, $this->numero, $this->localite, $this->codePostal, $this->pays);
    }

    public function afficher() {
        $this->getId();
        $this->getRue();
        $this->getLocalite();
        $this->getCodePostal();
        $this->getPays();
    }

    public function invalidAddress() {
        if ($this->getRue() == 0) {
            return empty($this->getRue());
        }
    }

}
