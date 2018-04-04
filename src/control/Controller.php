<?php
/**
* 
*/
require_once("view/View.php");
require_once("model/BimmStorage.php");
require_once("model/AxeBuilder.php");
require_once("model/User.php");
require_once("model/UserBuilder.php");
require_once("model/Axe.php");

class Controller
{
	protected $view;
	protected $axedb;
	
	function __construct(View $view,BimmStorage $axedb)
	{
		$this->view = $view;
		$this->axedb = $axedb;
	
	}

	/*public function axePage($id){
        $axe = $this->axedb->read($id);
        if ($axe === null) {
            $this->view->makeUnknownaxePage();
        } else {
            $this->view->makeaxePage($id, $axe);
        }
    }

    public function collectionPage(){
	    $axes = $this->axedb->readAll();

	    $this->view->makeCollectionPage($axes);
    }*/

    public function logIn(){
        $c=new UserBuilder();
        $this->view->makeLogInPage($c);
    }

    public function signIn(){
        $c=new UserBuilder();
        $this->view->makeSignInPage($c);
    }



    public function dashboard(array $data){
        $c = new UserBuilder($data);

        if ($c->isValidToLogIn()) {
            $users = $this->axedb->users();
            if ($c->canConnect($users) !== null) {
                $user = $c->canConnect($users);
                if (!key_exists('email', $_SESSION))
                    $_SESSION['email'] = $user->getEmail();
                if (!key_exists('password', $_SESSION))
                    $_SESSION['password'] = $data['password'];
                //if ($_SESSION['email'] !== 'admin') {
                $axes[] = null;
                $axe1 = $this->axedb->userAxe1($user->getEmail());
                $axe2 = $this->axedb->userAxe2($user->getEmail());
                $axe3 = $this->axedb->userAxe3($user->getEmail());
                $axe4 = $this->axedb->userAxe4($user->getEmail());
                $axe5 = $this->axedb->userAxe5($user->getEmail());
                $axe6 = $this->axedb->userAxe6($user->getEmail());
                $cf = new AxeBuilder();
                array_push($axes,$axe1, $axe2,$axe3,$axe4,$axe5,$axe6);
                $this->view->makeDashboard($user->getEmail(), $axes, $cf);
                /*} else {
                    $axes = $this->axedb->readAll();
                    $cf = new AxeBuilder();
                    $this->view->makeDashboard($user->getEmail(), $axes, $cf);
                }*/
            } else {
                $this->view->makeLogInPage($c);
            }
        } else {
            $this->view->makeLogInPage($c);
        }

    }
    public function usualDashboard(array $data){
        $c = new UserBuilder($data);
        if ($c->isValidToLogIn()) {
            $users = $this->axedb->users();
            if ($c->canConnect($users) !== null) {
                $user = $c->canConnect($users);
                /*if ($_SESSION['username'] !== 'admin') {
                    $axes = $this->axedb->userAxes($user->getUsername());
                    $cf = new AxeBuilder();
                    $this->view->makeDashboard($user->getUsername(), $axes, $cf);
                } else {*/
                $axes[] = null;
                $axe1 = $this->axedb->userAxe1($user->getEmail());
                $axe2 = $this->axedb->userAxe2($user->getEmail());
                $axe3 = $this->axedb->userAxe3($user->getEmail());
                $axe4 = $this->axedb->userAxe4($user->getEmail());
                $axe5 = $this->axedb->userAxe5($user->getEmail());
                $axe6 = $this->axedb->userAxe6($user->getEmail());
                $cf = new AxeBuilder();
                array_push($axes,$axe1, $axe2,$axe3,$axe4,$axe5,$axe6);
                $this->view->makeDashboard($user->getEmail(), $axes, $cf);
                //}
            } else {
                $this->view->makeLogInPage($c);
            }
        } else {
            $this->view->makeLogInPage($c);
        }

    }

    public function userAxe1($email){
        $axe1 = $this->axedb->userAxe1($email);
        $ids = $this->axedb->getQuestionIds(1);
        $this->view->makeUserAxe1($axe1,$ids);
    }
    public function userAxe2($email){
        $axe2 = $this->axedb->userAxe2($email);
        $ids = $this->axedb->getQuestionIds(2);
        $this->view->makeUserAxe2($axe2,$ids);
    }
    public function userAxe3($email){
        $axe3 = $this->axedb->userAxe3($email);
        $ids = $this->axedb->getQuestionIds(3);
        $this->view->makeUserAxe3($axe3,$ids);
    }
    public function userAxe4($email){
        $axe4 = $this->axedb->userAxe4($email);
        $ids = $this->axedb->getQuestionIds(4);
        $this->view->makeUserAxe4($axe4,$ids);
    }
    public function userAxe5($email){
        $axe5 = $this->axedb->userAxe5($email);
        $ids = $this->axedb->getQuestionIds(5);
        $this->view->makeUserAxe5($axe5,$ids);
    }
    public function userAxe6($email){
        $axe6 = $this->axedb->userAxe6($email);
        $ids = $this->axedb->getQuestionIds(6);
        $this->view->makeUserAxe6($axe6,$ids);
    }

    public function signInDashboard(array $data){
        $c = new UserBuilder($data);
        $users = $this->axedb->users();
        if($c->isValid() && $c->canSignIn($users) === true){
            $user = $c->createUser();
            $userId=$this->axedb->createUser($user);
            $questions = $this->axedb->questionsNumber();
            for($i=1;$i<$questions-1;$i++){
                $this->axedb->createUserAxes($userId,$i);
            }

            $this->view->displaySuccessSignInPage();

        }
        else{
            $this->view->makeSignInPage($c);
        }
    }

    public function updateAxe($id,array $data){
        /*if ($_SESSION['username'] === 'admin')
            $axes = $this->axedb->readAll();
        else*/
        //$axes = $this->axedb->userAxes($_SESSION['email']);
        foreach ( $data as $questionId => $value){
            if($questionId == "Sauvegarder") continue;
            $values[] = new Axe($questionId,"",$value,0);
        }
        if(isset($_SESSION['email']))
            $email = $_SESSION['email'];
        else
            $email = null;

        $axeId = $this->axedb->update($email,$values);

        //showing the axe page again

        $axe1 = $this->axedb->userAxe1($email);
        $axe2 = $this->axedb->userAxe2($email);
        $axe3 = $this->axedb->userAxe3($email);
        $axe4 = $this->axedb->userAxe4($email);
        $axe5 = $this->axedb->userAxe5($email);
        $axe6 = $this->axedb->userAxe6($email);
        if($id == 1){
            $ids = $this->axedb->getQuestionIds(1);
            $this->view->makeUserAxe1($axe1,$ids);
        }
        elseif ($id == 2){
            $ids = $this->axedb->getQuestionIds(2);
            $this->view->makeUserAxe2($axe2,$ids);
        }
        elseif ($id == 3){
            $ids = $this->axedb->getQuestionIds(3);
            $this->view->makeUserAxe3($axe3,$ids);
        }
        elseif ($id == 4){
            $ids = $this->axedb->getQuestionIds(4);
            $this->view->makeUserAxe4($axe4,$ids);
        }
        elseif ($id == 5){
            $ids = $this->axedb->getQuestionIds(5);
            $this->view->makeUserAxe5($axe5,$ids);
        }
        elseif ($id == 6){
            $ids = $this->axedb->getQuestionIds(6);
            $this->view->makeUserAxe6($axe6,$ids);
        }
        else{
            $this->view->makeUnknownaxePage();
        }

    }

    public function userAccount($email){
        $user=$this->axedb->readAccount($email);
        $this->view->makeProfilPage($user);
    }

    public function updateAccount($data){

        $user = new User($data['nom'],$data['prenom'],'defaultPasswordThatIsJustHereToFillTheBlank',$data['email'],$data['siret'],$data['entreprise'],$data['fonction']);

        $c = new UserBuilder($data);

        if($c->isValidToUpdate()){
            $this->axedb->updateAccount($user);
            $this->view->makeProfilPage($user);
        }
        else{
            $this->view->makeProfilPage($user);
        }
    }
    /*public function DeleteAxe($axeId)
    {
        if (isset($_SESSION['username'])) {
            $ok = $this->axedb->delete($axeId);
            if ($_SESSION['username'] === 'admin')
                $axes = $this->axedb->readAll();
            else
                $axes = $this->axedb->useraxes($_SESSION['username']);
            $cf = new AxeBuilder();
            if (!$ok) {
                $this->view->makeDashboard($_SESSION['username'], $axes, $cf);
            } else {
                $this->view->makeDashboard($_SESSION['username'], $axes, $cf);
            }

        }
        else{
            echo "you are not connected, log in again ";
        }
    }*/

    /*public function addAxe(array $data){
        if (isset($_SESSION['username'])) {
            $c = new AxeBuilder($data);
            if ($_SESSION['username'] === 'admin')
                $axes = $this->axedb->readAll();
            else {
                $axes = $this->axedb->userAxes($_SESSION['username']);
            }

            if ($c->isValid()) {
                $v = $c->createAxe();
                $axeId = $this->axedb->create($v);
                $cf = new AxeBuilder();
                //$this->view->makeDashboard($_SESSION['username'],$axes,$cf);
                $_SESSION['feedback'] = 'axe added successfully';
                header('Location: .?action=collection', true, 303);
                die;
            } else {
                $this->view->makeDashboard($_SESSION['username'], $axes, $c);
            }
        }
    }*/

    /*public function manageUsers(){
        $users = $this->axedb->users();
        $this->view->makeManageUsers($users);
    }

    public function deleteUser($id){
        $ok = $this->axedb->deleteUser($id);
        $users = $this->axedb->users();

        if (!$ok) {
            $this->view->makeManageUsers($users);
        } else {
            $this->view->makeManageUsers($users);
        }
    }*/
}
?>