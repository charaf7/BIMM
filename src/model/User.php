<?php

/**
 * Created by PhpStorm.
 * User: charaf-eddine
 * Date: 23/02/17
 * Time: 17:52
 */
class User{
    protected $nom;
    protected $prenom;
    protected $password;
    protected $email;
    protected $siret;
    protected $entreprise;
    protected $function;


    public function __construct($nom, $prenom, $password, $email, $siret, $entreprise, $function)
    {
        if (!self::isNomValid($nom))
            throw new Exception("Vous avez entrer un nom invalide");
        $this->nom = $nom;

        if (!self::isPrenomValid($prenom))
            throw new Exception("Vous avez entrer un prenom invalide");
        $this->prenom = $prenom;

        if (!self::isPassValid($password))
            throw new Exception("Vous avez entrer un mot de passe invalide");
        $this->password = $password;

        if (!self::isSiretValid($siret))
            throw new Exception("Le numéro SIRET est invalide");
        $this->siret = $siret;

        if (!self::isEmailValid($email))
            throw new Exception("Votre email est invalide");
        $this->email = $email;

        if (!self::isEntrepriseValid($entreprise))
            throw new Exception("Le nom de l'entreprise est invalide");
        $this->entreprise = $entreprise;

        $this->function = $function;

    }

    public function getNom(){
        return $this->nom;
    }

    public function getPrenom(){
        return $this->prenom;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getSiret(){
        return $this->siret;
    }

    public function getEntreprise(){
        return $this->entreprise;
    }

    public function getFunction(){
        return $this->function;
    }

    public function getPassword()
    {
        return $this->password;
    }


    public function setNom($nom) {
        if (!self::isNomValid($nom))
            throw new Exception("Veuillez entrer un Nom valide");
        $this->nom = $nom;
    }

    public function setPrenom($prenom) {
        if (!self::isPrenomValid($prenom))
            throw new Exception("Veuillez entrer un Prenom valide");
        $this->prenom = $prenom;
    }

    public function setEmail($email) {
        if (!self::isEmailValid($email))
            throw new Exception("Veuillez entrer un Email valide");
        $this->email = $email;
    }

    public function setSiret($siret) {
        if (!self::isSiretValid($siret))
            throw new Exception("Veuillez entrer un numéro SIRET valide");
        $this->siret = $siret;
    }

    public function setEntreprise($entreprise) {
        if (!self::isEntrepriseValid($entreprise))
            throw new Exception("Veuillez entrer un nom d'entreprise valide");
        $this->entreprise = $entreprise;
    }

    public function setFunction($function) {
        $this->function = $function;
    }

    public function setPassword($password) {
        if (!self::isPassValid($password))
            throw new Exception("Votre mot de passe doit contenir au moins 6 caractères");
        $this->password = $password;
    }


    public static function isNomValid($nom) {
        return mb_strlen($nom, 'UTF-8') < 30 && $nom !== "";
    }
    public static function isPrenomValid($prenom) {
        return mb_strlen($prenom, 'UTF-8') < 30 && $prenom !== "";
    }
    public static function isPassValid($password) {
        return  mb_strlen($password, 'UTF-8') > 6 && $password !== "";
    }
    public static function isEmailValid($mail) {
        return mb_strlen($mail, 'UTF-8') < 60 && $mail !== "";
    }
    public static function isSiretValid($siret) {
        return mb_strlen($siret, 'UTF-8') === 14 && $siret !== "";
    }
    public static function isEntrepriseValid($entreprise) {
        return mb_strlen($entreprise, 'UTF-8') < 60 && $entreprise !== "";
    }

}