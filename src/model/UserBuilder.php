<?php
/**
 * Created by PhpStorm.
 * User: charaf-eddine
 */
class UserBuilder{
    protected $data;
    protected $errors;

    public function __construct($data=null) {
        if ($data === null) {
            $data = array(
                "nom" => "",
                "prenom" => "",
                "email" => "",
                "siret" => "",
                "entreprise" => "",
                "function" => "",
                "password" => "",
            );
        }
        $this->data = $data;
        $this->errors = array();
    }

    public static function buildFromUser(User $user) {
        return new UserBuilder(array(
            "nom" => $user->getNom(),
            "prenom" => $user->getPrenom(),
            "email" => $user->getEmail(),
            "siret" => $user->getSiret(),
            "entreprise" => $user->getEntreprise(),
            "function" => $user->getFunction(),
            "password" => $user->getPassword(),
        ));
    }

    public function isValidToLogIn() {
        $this->errors = array();

        if (!key_exists("email", $this->data) || $this->data["email"] === "")
            $this->errors["email"] = "Vous devez entrer un email";

        if (!key_exists("password", $this->data) || $this->data["password"] === "")
            $this->errors["password"] = "Vous devez entrer un mot de passe";

        else if (mb_strlen($this->data["password"], 'UTF-8') <= 5)
            $this->errors["password"] = "Votre mot de passe doit contenir au moins 6 caractères";

        return count($this->errors) === 0;
    }
    public function isValid() {
        $this->errors = array();
        if (!key_exists("nom", $this->data) || $this->data["nom"] === "")
            $this->errors["nom"] = "Vous devez entrer un nom";

        if (!key_exists("prenom", $this->data) || $this->data["prenom"] === "")
            $this->errors["prenom"] = "Vous devez entrer un prenom";

        if (!key_exists("entreprise", $this->data) || $this->data["entreprise"] === "")
            $this->errors["entreprise"] = "Vous devez entrer une entreprise";

        if (!key_exists("email", $this->data) || $this->data["email"] === "")
            $this->errors["email"] = "Vous devez entrer un email";

        if (!key_exists("siret", $this->data) || $this->data["siret"] === "")
            $this->errors["siret"] = "Vous devez entrer un numéro SIRET";

        else if (mb_strlen($this->data["siret"], 'UTF-8') != 14)
            $this->errors["siret"] = "Le numéro SIRET est composé de 14 chiffres";

        if (!key_exists("password", $this->data) || $this->data["password"] === "")
            $this->errors["password"] = "Vous devez entrer un mot de passe";

        else if (mb_strlen($this->data["password"], 'UTF-8') <= 5)
            $this->errors["password"] = "Votre mot de passe doit contenir au moins 6 caractères";

        return count($this->errors) === 0;
    }

    public function isValidToUpdate() {
        $this->errors = array();
        if (!key_exists("nom", $this->data) || $this->data["nom"] === "")
            $this->errors["nom"] = "Vous devez entrer un nom";

        if (!key_exists("prenom", $this->data) || $this->data["prenom"] === "")
            $this->errors["prenom"] = "Vous devez entrer un prenom";

        if (!key_exists("entreprise", $this->data) || $this->data["entreprise"] === "")
            $this->errors["entreprise"] = "Vous devez entrer une entreprise";

        if (!key_exists("email", $this->data) || $this->data["email"] === "")
            $this->errors["email"] = "Vous devez entrer un email";

        if (!key_exists("siret", $this->data) || $this->data["siret"] === "")
            $this->errors["siret"] = "Vous devez entrer un numéro SIRET";

        else if (mb_strlen($this->data["siret"], 'UTF-8') != 14)
            $this->errors["siret"] = "Le numéro SIRET est composé de 14 chiffres";

        return count($this->errors) === 0;
    }

    public function canConnect(array $users){
        foreach ($users as $c) {
            if ($c->getEmail() === $this->data["email"] && password_verify($this->data["password"],$c->getPassword())) {
                return $c;
            }
            else{
                $this->errors["email"]="Le email n'est pas enregistrer sur la base de données";
            }
        }
    }

    public function canSignIn(array $users){
        foreach ($users as $c) {
            if ($c->getEmail() === $this->data["email"]){
                $this->errors["email"]="Cet email à déjà été prit, vous devez choisir un autre";
                return false;
            }

        }
        return true;
    }

    public function createUser() {
        if (!key_exists("nom", $this->data) || !key_exists("password", $this->data) || !key_exists("email", $this->data) || !key_exists("prenom", $this->data) || !key_exists("entreprise", $this->data) || !key_exists("siret", $this->data))
            throw new Exception("Des éléments sont abscents pour la création du compte");
        $hash = password_hash($this->data["password"], PASSWORD_BCRYPT);
        return new User($this->data["nom"], $this->data["prenom"], $hash, $this->data["email"], $this->data["siret"], $this->data["entreprise"], $this->data["function"]);
    }

    public function getNomRef() {
        return "nom";
    }
    public function getPrenomRef() {
        return "prenom";
    }

    public function getEmailRef() {
        return "email";
    }

    public function getPasswordRef() {
        return "password";
    }
    public function getSiretRef() {
        return "siret";
    }
    public function getEntrepriseRef() {
        return "entreprise";
    }

    public function getFunctionRef() {
        return "function";
    }

    public function getData($ref) {
        return key_exists($ref, $this->data)? $this->data[$ref]: '';
    }

    public function getErrors($ref) {
        return key_exists($ref, $this->errors)? $this->errors[$ref]: null;
    }



    /*public function updateUser(User $v) {
        if (key_exists("username", $this->data))
            $v->setUsername($this->data["username"]);
        if (key_exists("password", $this->data))
            $v->setPassword($this->data["password"]);
    }*/
}
?>