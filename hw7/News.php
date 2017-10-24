<?php
    include __DIR__ .'/DBPrepare.php'; 
    class News
    {
        private $dbp;
        public function __construct()
        {
            $this->dbp = new DBPrepare();
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