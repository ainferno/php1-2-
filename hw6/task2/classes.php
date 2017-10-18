<?php
    class TextFile
    {
        private $fname;
        public function __construct($path)
        {
            $this->fname = $path;
        }
        public function getDat()
        {
            return file($this->fname);
        }
        public function writeDat($dat)
        {
            $fil = fopen($this->fname,'w');
            foreach($dat as $rec)
            {
                $r = $rec->getArticle();
                fwrite($fil,$r['Number'].'?*||'.$r['Head'].'?*||'.$r['Title'].'?*||'.$r['Body']);
            }
            fwrite($fil,"\n");
            fclose($fil);
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
    
    class News extends TextFile
    {
        private $news = [];
        private $i;
        public function __construct($name)
        {
            $this->i = 0;
            parent::__construct($name);
            $dat = parent::getDat();
            foreach($dat as $res)
            {
                $r = explode('?*||',$res);
                //var_dump($r);
                //echo $r[0].' NUMBER2!!<br>';
                $this->news[$this->i] = new Article($this->i,$r[1],$r[2],$r[3]);
                $this->i++;
                //var_dump($this->news[$r[0]]);
                // ->getArticle());
            }
        }
        public function getArt($num)
        {
            return $this->news[$num];
        }
        public function getData()
        {
            return $this->news;
        }
        public function addArticle($Art)
        {
            $Art->setNum($this->i);
            $this->news[$this->i] = $Art;
            $this->i++;
            return $this;
        }
        public function saveNews()
        {
            parent::writeDat($this->news);
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