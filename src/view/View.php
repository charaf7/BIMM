<?php
/**
* 
*/
require_once("model/Axe.php");
class View{

	protected $router;
	protected $title;
	protected $link;
	protected $author;
	protected $feedback;


	function __construct(Router $router,$feedback){
		
		$this->router = $router;
		$this->title = null;
		$this->link = null;
		$this->author = null;
		$this->feedback = $feedback;
	}

	public function makeHomePage(){
		include("homePage.php");
	}


	public function makeSignInPage(UserBuilder $builder){
		include ("signin.php");
	}

	public function makeSuccessSignInPage(){
        include("successSignIn.php");
    }

	public function displayHomePage(){
        $this->router->POSTredirect($this->router->homePage());
    }

    public function  displaySuccessSignInPage(){
	    $this->router->POSTredirect($this->router->successSignIn());
    }

    public function  displayCollection(){
        $this->router->POSTredirect($this->router->collectionPage());
    }

	public function makeLogInPage(UserBuilder $builder){
	    include ("logIn.php");
    }

	public function makeCollectionPage(array $axes){
	    include("collection.php");
	}

	public function makeaxePage($id,$axe){
	    include ("axePage.php");
    }

	public function makeDashboard($email, $axes,axeBuilder $builder){
	    if(!isset($_SESSION['email']) ){
	        echo "Session expirée, veuillez vous reconnecter";
        }
        else
	        include ("dashboard.php");
    }

    public function makeUserAxe1($axe1){
        if(!isset($_SESSION['email']) ){
            echo "Session expirée, veuillez vous reconnecter";
        }
        else
            include ("axe1.php");
    }
    public function makeUserAxe2($axe2){
        if(!isset($_SESSION['email']) ){
            echo "Session expirée, veuillez vous reconnecter";
        }
        else
            include ("axe2.php");
    }
    public function makeUserAxe3($axe3){
        if(!isset($_SESSION['email']) ){
            echo "Session expirée, veuillez vous reconnecter";
        }
        else
            include ("axe3.php");
    }
    public function makeUserAxe4($axe4){
        if(!isset($_SESSION['email']) ){
            echo "Session expirée, veuillez vous reconnecter";
        }
        else
            include ("axe4.php");
    }
    public function makeUserAxe5($axe5){
        if(!isset($_SESSION['email']) ){
            echo "Session expirée, veuillez vous reconnecter";
        }
        else
            include ("axe5.php");
    }
    public function makeUserAxe6($axe6){
        if(!isset($_SESSION['email']) ){
            echo "Session expirée, veuillez vous reconnecter";
        }
        else
            include ("axe6.php");
    }

    public function makeProfilPage(User $user){
        if(!isset($_SESSION['email']) ){
            echo "Session expirée, veuillez vous reconnecter";
        }
        else
            include ("profil.php");
    }

    public function makeManageUsers($users){
	    include ("manageUsers.php");
    }

    public function aboutPage(){
        include ("about.php");
    }

    public function outSession(){
        echo " you are not connected anymore, please log in again";
    }

    public function makeErrorAuthPage(){
	    echo " AUTH FAILED ";
    }
    public function makeUnknownActionPage(){
        echo " unknown action";
    }

    public function makeUnknownaxePage(){
        echo "unknown axe";
    }

    public function makeUnexpectedErrorPage($e){
        throw new Exception($e);
    }

    protected function getFormaxeFields(axeBuilder $builder) {
        $titleRef = $builder->getTitleRef();
        $s = "";
        $err = $builder->getErrors($titleRef);
        if ($err !== null)
            $s .= ' <span style="color: red;">'.$err.'</span>';
        $s .='<br>';
        $s .= '<input type="text" name="'.$titleRef.'" placeholder="enter a title" value="';
        $s .= self::htmlesc($builder->getData($titleRef));
        $s .= "\" />";
        $s .='<br>';



        $authRef = $builder->getAuthorRef();
        $err = $builder->getErrors($authRef);
        if ($err !== null)
            $s .= ' <span style="color: red;">'.$err.'</span>';
        $s .='<br>';
        $s .= '<input type="text" name="'.$authRef.'" placeholder="enter an author name" value="';
        $s .= self::htmlesc($builder->getData($authRef));
        $s .= '" ';
        $s .= '	/>';

        $linkref = $builder->getLinkRef();
        $err = $builder->getErrors($linkref);
        if ($err !== null)
            $s .= ' <span style="color: red;">'.$err.'</span>';
        $s .='<br>';
        $s .= '<input type="url" name="'.$linkref.'" placeholder="enter a valid soundcloud link" value="';
        $s .= self::htmlesc($builder->getData($linkref));
        $s .= '" ';
        $s .= '	/>';


        return $s;
    }


    protected function getFormSignInFields(UserBuilder $builder) {
        $nomRef = $builder->getNomRef();
        $s = "";
        $err = $builder->getErrors($nomRef);
        if ($err !== null)
            $s .= ' <span style="color: red;">'.$err.'</span>';
        $s .='<br>';
        $s .= '<input type="text" name="'.$nomRef.'" placeholder="Entrer un nom" value="';
        $s .= self::htmlesc($builder->getData($nomRef));
        $s .= "\" />";
        $s .='<br>';

        $prenomRef = $builder->getPrenomRef();
        $err = $builder->getErrors($prenomRef);
        if ($err !== null)
            $s .= ' <span style="color: red;">'.$err.'</span>';
        $s .='<br>';
        $s .= '<input type="text" name="'.$prenomRef.'" placeholder="Entrer un prenom" value="';
        $s .= self::htmlesc($builder->getData($prenomRef));
        $s .= "\" />";
        $s .='<br>';

        $emailRef = $builder->getEmailRef();
        $err = $builder->getErrors($emailRef);
        if ($err !== null)
            $s .= ' <span style="color: red;">'.$err.'</span>';
        $s .='<br>';
        $s .= '<input type="email" name="'.$emailRef.'" placeholder="entrer un email" value="';
        $s .= self::htmlesc($builder->getData($emailRef));
        $s .= '" ';
        $s .= '	/>';
        $s .='<br>';

        $passRef = $builder->getPasswordRef();
        $err = $builder->getErrors($passRef);
        if ($err !== null)
            $s .= ' <span style="color: red;">'.$err.'</span>';
        $s .='<br>';
        $s .= '<input type="password" name="'.$passRef.'" placeholder="entrer un mot de passe" value="';
        $s .= self::htmlesc($builder->getData($passRef));
        $s .= '" ';
        $s .= '	/>';
        $s .='<br>';

        $entrepriseRef = $builder->getEntrepriseRef();
        $err = $builder->getErrors($entrepriseRef);
        if ($err !== null)
            $s .= ' <span style="color: red;">'.$err.'</span>';
        $s .='<br>';
        $s .= '<input type="text" name="'.$entrepriseRef.'" placeholder="Entrer un nom d\'entreprise" value="';
        $s .= self::htmlesc($builder->getData($entrepriseRef));
        $s .= "\" />";
        $s .='<br>';

        $siretRef = $builder->getSiretRef();
        $err = $builder->getErrors($siretRef);
        if ($err !== null)
            $s .= ' <span style="color: red;">'.$err.'</span>';
        $s .='<br>';
        $s .= '<input type="text" name="'.$siretRef.'" placeholder="Entrer un numéro SIRET" value="';
        $s .= self::htmlesc($builder->getData($siretRef));
        $s .= "\" />";
        $s .='<br>';

        $functionRef = $builder->getFunctionRef();
        /*$err = $builder->getErrors($functionRef);
        if ($err !== null)
            $s .= ' <span style="color: red;">'.$err.'</span>';*/
        $s .='<br>';
        $s .= '<input type="text" name="'.$functionRef.'" placeholder="entrer une fonction" value="';
        $s .= self::htmlesc($builder->getData($functionRef));
        $s .= '" ';
        $s .= '	/>';

        return $s;
    }

    protected function getFormLogInFields(UserBuilder $builder) {
        $s = "";

        $emailRef = $builder->getEmailRef();
        $err = $builder->getErrors($emailRef);
        $s .= '<div class="input-container">';
        $s .= '<input class="input-field" type="email" name="'.$emailRef.'" placeholder="Entrer votre email" value="';
        $s .= self::htmlesc($builder->getData($emailRef));
        $s .= '" ';
        $s .= '	/>';
        if ($err !== null)
            $s .= ' <span style="color: red; display: block;">'.$err.'</span>';
        $s .= '</div>';

        $passRef = $builder->getPasswordRef();
        $err = $builder->getErrors($passRef);
        $s .= '<div class="input-container">';
        $s .= '<input class="input-field" type="password" name="'.$passRef.'" placeholder="Entrer votre mot de passe" value="';
        $s .= self::htmlesc($builder->getData($passRef));
        $s .= '" ';
        $s .= '	/>';
        if ($err !== null)
            $s .= ' <span style="color: red; display: block;">'.$err.'</span>';
        $s .= '</div>';

        return $s;
    }

    public static function htmlesc($str) {
        return htmlspecialchars($str,
            /* on échappe guillemets _et_ apostrophes : */
            ENT_QUOTES
            /* les séquences UTF-8 invalides sont
            * remplacées par le caractère �
            * au lieu de renvoyer la chaîne vide…) */
            | ENT_SUBSTITUTE
            /* on utilise les entités HTML5 (en particulier &apos;) */
            | ENT_HTML5,
            'UTF-8');
    }

}
?>