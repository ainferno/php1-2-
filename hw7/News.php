<?php
    include __DIR__ .'/DBPrepare.php'; 
    class News
    {
        private $dbp;
        public function __construct($host,$table)
        {
            $this->dbp = new DBPrepare($host,$table);
        }
        public function getArt($num)
        {
            return $this->dbp->getDat()[$num];
        }
        public function getData()
        {
            return $this->dbp->getDat();
        }
        public function addArticle($Art)
        {
            $this->dbp->append($Art);
        }
    }
?>