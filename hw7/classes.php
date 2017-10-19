<?php //INSERT INTO users (name, title, body) VALUES ('Ivan', 'ivan@mail.ru', 42);
    class DataBase
    {
        public $dbh;
        public function __construct($host,$table)
        {
            $this->dbh = new PDO( 'mysql:host='.$host.';user=root;dbname='.$table ); 
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

    class DBPrepare
    {
        private $db;
        public function __construct(string $name,string $table)
        {
            $this->db = new DataBase($name,$table);
        }
        public function getDat()
        {
            $dbdata = $this->db->query('SELECT * FROM news',[]);
            //var_dump($dbdata);
            $finaldata = [];
            //if($dbdata != 0)
            //{
                foreach($dbdata as $line)
                {
                    $finaldata[$line[0]] = new Article($line[0],$line[1],$line[2],$line[3]);
                }
            //}
            //var_dump($finaldata);
            return $finaldata;
        }
        public function append(Article $art)
        {
            $article_data = $art->getArticle();
            $data = [ 'Name'  => $article_data[ 'Head' ], 
                      'Title' => $article_data['Title' ], 
                      'Body'  => $article_data[ 'Body' ]];
            $sql_request = 'INSERT INTO news (name, title, body) VALUES (:Name,:Title,:Body);';
            $this->db->query($sql_request,$data);
            //echo 'INSERT INTO news (name, title, body) VALUES ("'.$data['Name'].'", "'.$data['Title'].'", "'.$data['Body'].'");';
            //echo $this->db->execute('INSERT INTO news (name, title, body) VALUES ("'.$data['Name'].'", "'.$data['Title'].'", "'.$data['Body'].'");');
        }
    }

    class News extends DBPrepare
    {
        public function __construct($name)
        {
            parent::__construct('localhost',$name);
        }
        public function getArt($num)
        {
            return parent::getDat()[$num];
        }
        public function getData()
        {
            return parent::getDat();
        }
        public function addArticle($Art)
        {
            parent::append($Art);
        }
    }
    
    class View
    {
        private $data;
        public function assign($name,$value)
        {
            $this->data[$name] = $value;
        }
        public function display($template)
        {
            $data = $this->data;
            include $template;
        }
        public function render($template)
        {
            $data = $this->data;
            ob_start();
            include $template;
            $out = ob_get_contents();
            ob_end_clean();
            return $out;
        }
    }
?>