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
    
    function __construct($data) {
        $this->hydrate($data);
        
        /* the following assignation has been replaced by the hydatation 
        $this->id = $id;
        $this->rue = $rue;
        $this->numero = $numero;
        $this->localite = $localite;
        $this->codePostal = $codePostal;
        $this->pays = $pays; */
    }
    
/* ==== the function of auto-hydratation of the Class Adresse  ===== */
    
    public function hydrate($data) {
        foreach ($data as $key =>$value){
            $methodName = 'set' . ucfirst($this->$key);
            if(method_exists($this, $methodName)){
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
        return sprintf('%$ %$ %$', $this->id, $this->rue, $this->numero, $this->codePostal, $this->localite, $this->pays);
    }

    public function invalidAddress(){
       if (getRue().length < 0){
          return empty(getRue()); 
       }
    }
}
