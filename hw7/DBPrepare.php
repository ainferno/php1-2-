<?php
    include __DIR__ .'/DataBase.php';
    include __DIR__ .'/ClassArticle.php';
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
?>