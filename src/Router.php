<?php

require_once("view/View.php");
require_once("control/Controller.php");
/**
* 
*/
class Router
{

	public function main(BimmStorage $axedb){
	    session_start();
        $feedback = isset($_SESSION['feedback'])? $_SESSION['feedback']: '';
        $_SESSION['feedback'] = '';
        $view = new View($this, $feedback);
		$control = new Controller($view,$axedb);

		$axeId = key_exists('axe', $_GET)? $_GET['axe']: null;
		$userDashboard = key_exists('dashboard', $_GET) ? $_GET['dashboard'] : null;
		$action = key_exists('action', $_GET)? $_GET['action']: null;
		$account = key_exists('account', $_GET)? $_GET['account']:null;
		$manage = key_exists('manageUsers', $_GET)? $_GET['manageUsers']: null;

		if ($action === null) {
            if($userDashboard === null)
                $action = "dashboard";
			else{
			    $action = "dashboard";
            }
		}


        try {
            switch ($action) {

                case "accueil":
                    unset($_SESSION['check']);
                    $control->LogIn();
                    break;
                case "signIn":
                    $control->signIn();
                    break;
                case "signedIn":
                    $control->signInDashboard($_POST);
                    break;
                case "successSignIn":
                    $view->makeSuccessSignInPage();
                    break;
                case "userDashboard":
                        $control->dashboard($_POST);

                    break;
                case "dashboard":
                    if(isset($_SESSION['email']) && isset($_SESSION['password'])){
                        $data = array('email' => $_SESSION['email'],'password' => $_SESSION['password']);
                        $control->usualDashboard($data);
                    }
                    else{
                        $control->LogIn();
                    }
                    break;

                case "userAccount":
                    if(isset($_SESSION['email'])){
                        $control->userAccount($_SESSION['email']);
                    }
                    else{
                        $control->logIn();
                    }
                    break;

                case "updateAccount":
                    if(isset($_SESSION['email'])){
                        $control->updateAccount($_POST);
                    }
                    else{
                        $control->logIn();
                    }
                    break;

                case "axe1":
                    if(isset($_SESSION['email'])){
                        $control->userAxe1($_SESSION['email']);
                    }
                    else{
                        $control->logIn();
                    }
                    break;
                case "axe2":
                    if(isset($_SESSION['email'])){
                        $control->userAxe2($_SESSION['email']);
                    }
                    else{
                        $control->logIn();
                    }
                    break;
                case "axe3":
                    if(isset($_SESSION['email'])){
                        $control->userAxe3($_SESSION['email']);
                    }
                    else{
                        $control->logIn();
                    }
                    break;
                case "axe4":
                    if(isset($_SESSION['email'])){
                        $control->userAxe4($_SESSION['email']);
                    }
                    else{
                        $control->logIn();
                    }
                    break;
                case "axe5":
                    if(isset($_SESSION['email'])){
                        $control->userAxe5($_SESSION['email']);
                    }
                    else{
                        $control->logIn();
                    }
                    break;
                case "axe6":
                    if(isset($_SESSION['email'])){
                        $control->userAxe6($_SESSION['email']);
                    }
                    else{
                        $control->logIn();
                    }
                    break;

                case "disconnect":
                    unset($_SESSION['email']);
                    unset($_SESSION['password']);
                    if(!isset($_SESSION['check']))
                        $_SESSION['check'] = "not";
                     $view->displayHomePage();
                    break;
                case "axe":
                    if ($axeId === null) {
                        $view->makeUnknownActionPage();
                    } else {
                        $control->axePage($axeId);
                    }
                    break;

                case "saveAxe":
                    if ($axeId === 1) {
                        $view->makeUnknownActionPage();
                    } else {
                        $control->updateAxe($axeId, $_POST);
                    }
                    break;

                case "about":
                    $view->aboutPage();
                    break;
                default:
                    $view->makeUnknownActionPage();
                    break;
            }
        } catch (Exception $e) {
            $view->makeUnexpectedErrorPage($e);
        }
		
	}



    public function POSTredirect($url) {
        header("Location: ".htmlspecialchars_decode($url), true, 303);
        die;
    }

    public function homePage() {
		return ".";
	}

	public function signInPage(){
	    return "?action=signIn";
    }

    public function successSignIn(){
	    return ".?action=successSignIn";
    }

    public function signInOk(){
	    return "?action=signedIn";
    }

    public function  logInPage(){
        return "?action=logIn";
    }

    public function  dashPage(){
        return ".?action=userDashboard";
    }

    public function  dashUsualPage(){
        return ".?action=dashboard";
    }

    public function logOut(){
        return ".?action=disconnect";
    }


    public function axePage($id){
        return ".?axe=$id";
    }

    /*public function saveNewaxe(){
        return ".?action=saveNewaxe";
    }*/

    public function saveAxe($axe){
        return ".?axe=$axe&amp;action=saveAxe";
    }

    /*public function deleteaxe($axe){
        return ".?axe=$axe&amp;action=deleteaxe";
    }*/

    public function about(){
        return ".?action=about";
    }
    public function profil(){
        return ".?action=userAccount";
    }
    public function updateAccount(){
        return ".?action=updateAccount";
    }
    public function axe1(){
        return ".?action=axe1";
    }
    public function axe2(){
        return ".?action=axe2";
    }
    public function axe3(){
        return ".?action=axe3";
    }
    public function axe4(){
        return ".?action=axe4";
    }
    public function axe5(){
        return ".?action=axe5";
    }
    public function axe6(){
        return ".?action=axe6";
    }

}
?>