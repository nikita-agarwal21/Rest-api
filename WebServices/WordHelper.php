<?php
class WordHelper{
    private $number;

    public function __construct()
    {
        if(isset($_POST['number']))
            $this->number=$_POST['number'];
    }
    public function getNumber()
    {
        if(!$this->number)
            return '';
        else 
            return $this->number;
    }
}





?>