<?php
/**
 * Created by PhpStorm.
 * User: charaf-eddine
 */

require_once("model/Axe.php");

class AxeBuilder {

    protected $data;
    protected $errors;

    public function __construct($data=null) {
        if ($data === null) {
            $data = array(
                "questionId" => "",
                "question" => "",
                "value" => ""
            );
        }
        $this->data = $data;
        $this->errors = array();
    }

    public static function buildFromaxe(Axe $axe) {
        return new AxeBuilder(array(
            "questionId" => $axe->getQuestionId(),
            "question" => $axe->getQuestion(),
            "value" => $axe->getValue(),
        ));
    }

    public function isValid() {
        $this->errors = array();

        if (!key_exists("value", $this->data) || $this->data["value"] === "" || $this->data["value"]!=0 || $this->data["value"]!=1 || $this->data["value"]!=2 || $this->data["value"]!=3 || $this->data["value"]!=4 || $this->data["value"]!=5)
            $this->errors["link"] = "Vous avez entrer une valeur incorrecte";

        return count($this->errors) === 0;
    }

    public function getQuestionIdRef() {
        return "questionId";
    }

    public function getQuestionRef() {
        return "question";
    }

    public function getValueRef() {
        return "value";
    }

    public function getData($ref) {
        return key_exists($ref, $this->data)? $this->data[$ref]: '';
    }

    public function getErrors($ref) {
        return key_exists($ref, $this->errors)? $this->errors[$ref]: null;
    }


    public function updateaxe(Axe $v) {
        if (key_exists("value", $this->data))
            $v->setValue($this->data["value"]);

    }

}

?>
