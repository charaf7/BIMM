<?php
/**
 * User: charaf-eddine
 */
class  Axe {
    protected $questionId;
    protected $question;
    protected $value;
    protected $id;

    public function __construct($questionId,$question,$value)
    {
        /*if (!self::isTitleValid($title))
            throw new Exception("Invalid title entry");*/

        $this->question = $question;
        $this->questionId = $questionId;
        $this->value = $value;
    }

    public function getId(){
        return $this->id;
    }
    public function getUserId(){
        return $this->id;
    }
    public function getQuestion(){
        return $this->question;
    }
    public function getQuestionId(){
        return $this->questionId;
    }
    public function getValue(){
        return $this->value;
    }


    public function setValue($value) {

        $this->value = $value;
    }


    /*public static function isTitleValid($title) {
        return mb_strlen($title, 'UTF-8') < 30 && $title !== "";
    }
    public static function isAuthorValid($author) {
        return mb_strlen($author, 'UTF-8') < 30 && $author !== "";
    }
    public static function isLinkValid($link) {
        return  $link !== "";
    }*/
}
?>