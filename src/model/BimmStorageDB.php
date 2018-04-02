<?php
/**
 * Created by PhpStorm.
 * User: charaf-eddine
 */

require_once("Axe.php");
require_once("User.php");
require_once("BimmStorage.php");
require_once("Question.php");

class BimmStorageDB implements BimmStorage {
    protected $pdo;
    private $readStatement=null;
    private $connectStatement=null;
    private $createUserStatement=null;
    private $createUserAxesStatement=null;
    private $createAxeStatement=null;
    private $updateAxeStatement=null;
    private $deleteStatement=null;
    private $deleteUserStatement=null;
    private $axe1Statement=null;
    private $updateAccountStatement=null;

    function __construct($pdo)
    {
        $this->pdo=$pdo;
    }

    public function users(){
        $req = 'select * from users';
        $res = $this->pdo->query($req);
        $users = array();

        while ($arr=$res->fetch()){
            $users[$arr['id']]= new User($arr['nom'],$arr['prenom'],$arr['password'],$arr['email'],$arr['siret'],$arr['entreprise'],$arr['fonction']);
        }
        return $users;
    }

    public function createUser(User $user){

        if ($this->createUserStatement === null) {
            $req =  'INSERT INTO `users` (`nom`, `prenom`, `password`, `entreprise`, `siret`, `email`, `fonction`) VALUES (:nom, :prenom, :password, :entreprise, :siret, :email, :function);';
            $this->createUserStatement = $this->pdo->prepare($req);
        }
        $this->createUserStatement->execute(array(
            ':nom' => $user->getNom(),
            ':prenom' => $user->getPrenom(),
            ':password' => $user->getPassword(),
            ':entreprise' => $user->getEntreprise(),
            ':siret' => $user->getSiret(),
            ':email' => $user->getEmail(),
            ':function' => $user->getFunction(),
        ));
        return $this->pdo->lastInsertId();
    }

    public function createUserAxes($id, $questionId){
        if ($this->createUserAxesStatement === null) {
            $req =  'INSERT INTO `useraxes` (`userId`, `questionId`, `value`) VALUES (:userId, :questionId, 99);';
            $this->createUserAxesStatement = $this->pdo->prepare($req);
        }
        $this->createUserAxesStatement->execute(array(
            ':userId' => $id,
            ':questionId' => $questionId,
        ));
        return $this->pdo->lastInsertId();
    }

    public function userAxe1($email){
        $req = 'select * from users,userAxes,questions WHERE email= :email AND axe=1 AND users.id = userAxes.userId AND questions.id=useraxes.questionId';
        $this->axe1Statement = $this->pdo->prepare($req);
        $this->axe1Statement->execute(array(":email" => $email ));
        $axe = array();

        while ($arr=$this->axe1Statement->fetch()){
            $axe[]= new Axe($arr['questionId'],$arr['text'],$arr['value'],$arr['coeff']);
        }
        return $axe;

    }
    public function userAxe2($email){
        $req = 'select * from users,userAxes,questions WHERE email= :email AND axe=2 AND users.id = userAxes.userId AND questions.id=useraxes.questionId';
        $this->connectStatement = $this->pdo->prepare($req);
        $this->connectStatement->execute(array(":email" => $email ));
        $axe = array();

        while ($arr=$this->connectStatement->fetch()){
            $axe[]= new Axe($arr['questionId'],$arr['text'],$arr['value'],$arr['coeff']);
        }
        return $axe;

    }
    public function userAxe3($email){
        $req = 'select * from users,userAxes,questions WHERE email= :email AND axe=3 AND users.id = userAxes.userId AND questions.id=useraxes.questionId';
        $this->connectStatement = $this->pdo->prepare($req);
        $this->connectStatement->execute(array(":email" => $email ));
        $axe = array();

        while ($arr=$this->connectStatement->fetch()){
            $axe[]= new Axe($arr['questionId'],$arr['text'],$arr['value'],$arr['coeff']);
        }
        return $axe;

    }
    public function userAxe4($email){
        $req = 'select * from users,userAxes,questions WHERE email= :email AND axe=4 AND users.id = userAxes.userId AND questions.id=useraxes.questionId';
        $this->connectStatement = $this->pdo->prepare($req);
        $this->connectStatement->execute(array(":email" => $email ));
        $axe = array();

        while ($arr=$this->connectStatement->fetch()){
            $axe[]= new Axe($arr['questionId'],$arr['text'],$arr['value'],$arr['coeff']);
        }
        return $axe;

    }
    public function userAxe5($email){
        $req = 'select * from users,userAxes,questions WHERE email= :email AND axe=5 AND users.id = userAxes.userId AND questions.id=useraxes.questionId';
        $this->connectStatement = $this->pdo->prepare($req);
        $this->connectStatement->execute(array(":email" => $email ));
        $axe = array();

        while ($arr=$this->connectStatement->fetch()){
            $axe[]= new Axe($arr['questionId'],$arr['text'],$arr['value'],$arr['coeff']);
        }
        return $axe;

    }
    public function userAxe6($email){
        $req = 'select * from users,userAxes,questions WHERE email= :email AND axe=6 AND users.id = userAxes.userId AND questions.id=useraxes.questionId';
        $this->connectStatement = $this->pdo->prepare($req);
        $this->connectStatement->execute(array(":email" => $email ));
        $axe = array();

        while ($arr=$this->connectStatement->fetch()){
            $axe[]= new Axe($arr['questionId'],$arr['text'],$arr['value'],$arr['coeff']);
        }
        return $axe;

    }
    //get Ids + coff of questions
    public function getQuestionIds($axe){
        $req = 'select * from questions WHERE  axe= :axe';
        $this->connectStatement = $this->pdo->prepare($req);
        $this->connectStatement->execute(array(":axe" => $axe ));
        $ids = array();

        while ($arr=$this->connectStatement->fetch()){
            $ids[]= new Question($arr['id'],$arr['coeff'],$arr['text']);
        }
        return $ids;
    }

    /*public function userAxes($user){
        $req = 'select * from axes WHERE userId= :userId';
        $this->connectStatement = $this->pdo->prepare($req);
        $this->connectStatement->execute(array(":userId" => $user ));
        $axes = array();

        while ($arr=$this->connectStatement->fetch()){
            $axes[$arr['id']]= new Axe($arr['title'],$arr['author'],$arr['link'],$arr['username']);
        }
        return $axes;

    }*/

    public function readAccount($email) {
        if($this->readStatement === null){
            $req = ' select * from users WHERE email=:email';
            $this->readStatement = $this->pdo->prepare($req);
        }
        $this->readStatement->execute(array(":email" => $email));
        $arr = $this->readStatement->fetch();

        if(!$arr)
            return null;
        return new User($arr['nom'],$arr['prenom'],$arr['password'],$arr['email'],$arr['siret'],$arr['entreprise'],$arr['fonction']);
    }

    public function updateAccount(User $user) {
        if($this->updateAccountStatement === null){

            $req = 'UPDATE users SET nom= :nom, prenom= :prenom, siret= :siret, entreprise= :entreprise, fonction= :fonction WHERE email= :email;';
            $this->updateAccountStatement = $this->pdo->prepare($req);
        }
        $this->updateAccountStatement->execute(array(
            ':email' => $user->getEmail(),
            ':nom' => $user->getNom(),
            ':prenom' => $user->getPrenom(),
            ':entreprise' => $user->getEntreprise(),
            ':fonction' => $user->getFunction(),
            ':siret' => $user->getSiret(),

        ));

        return $this->pdo->lastInsertId();
    }


    /*public function readAll() {
        $req = 'select * from axes';
        $res = $this->pdo->query($req);
        $axes = array();

        while ($arr=$res->fetch()){
            $axes[$arr['id']]= new Axe($arr['title'],$arr['author'],$arr['link'],$arr['username']);
        }
        return $axes;
    }*/

    public function questionsNumber() {
        $req = 'select COUNT(*) from questions';
        $res = $this->pdo->query($req);

        $n=$res->fetch();

        return $n[0];
    }


    public function update($email,array $values) {
        foreach ($values as $value){
            if($this->updateAxeStatement === null){
                $req = 'UPDATE useraxes,users SET value=:value WHERE users.id = userAxes.userId AND questionId=:questionId AND users.email=:email;';
                $this->updateAxeStatement = $this->pdo->prepare($req);
            }
            $this->updateAxeStatement->execute(array(
                ':value' => $value->getValue(),
                ':questionId' => $value->getQuestionId(),
                ':email' => $email,
            ));
            //$this->updateAxeStatement = null;
        }

        return $this->pdo->lastInsertId();
    }


}

?>