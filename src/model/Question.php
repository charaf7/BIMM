<?php
/**
 * NO ITS NOT LIKE AXE, THIS CLASS TAKES CARE ONLY OF THE QUESTIONS AND THERE COEFF, WITHOUT GIVING A FUCK ABOUT THE USER DATA
 * User: Charaf
 * Date: 12/03/2018
 * Time: 21:08
 */

class Question
{
    protected $questionId;
    protected $coeff;
    protected $text;

    public function __construct($questionId,$coeff,$text)
    {
        /*if (!self::isTitleValid($title))
            throw new Exception("Invalid title entry");*/

        $this->coeff = $coeff;
        $this->questionId = $questionId;
        $this->text = $text;
    }

    public function getQuestionId(){
        return $this->questionId;
    }
    public function getCoeff(){
        return $this->coeff;
    }
    public function getText(){
        return $this->text;
    }

}