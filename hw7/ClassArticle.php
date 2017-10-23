<?php
    class Article
    {
        private $Head,$Title,$Body,$Number;
        public function __construct($Number,$Head,$Title,$Body)
        {
            $this->Number=$Number;
            $this->Head=$Head;
            $this->Title=$Title;
            $this->Body=$Body;
        }
        public function getNum()
        {
            return $this->Number;
        }
        public function setNum($a)
        {
            $this->Number = $a;
        }
        public function getArticle()
        {
            //echo $this->Number.' NUMBER!!<br>';
            return ['Number' => $this->Number,'Head' => $this->Head,'Title' => $this->Title,'Body' => $this->Body];
        }
    }
?>