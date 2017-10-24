<?php
    class DataBase
    {
        public $dbh;
        public function __construct()
        {
            $data = include __DIR__ .'/config.php';
            $this->dbh = new PDO( 'mysql:host='.$data['host'].';dbname='.$data['tablename'],$data['user'],$data['password']); 
            if (mysqli_connect_errno()) {
                printf("Не удалось подключиться: %s\n", mysqli_connect_error());
                exit();
            }
        }
        public function execute(string $sql)
        {
            echo $sql;
            
            return $this->dbh->exec($sql);
        }
        public function query(string $sql,array $data = [])
        {
            $sth = $this->dbh->prepare($sql);
            //$sth->execute($data);
            if($sth->execute($data))
            {
                return $sth->fetchAll();
            }
            else
            {
                return false;
            }           
        }
    }
?>