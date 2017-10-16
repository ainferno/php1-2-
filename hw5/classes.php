<?php
    class GuestBook
    {
        private $f;
        private $d;
        public function __construct($path)
        {
            $this->f = $path;
            $this->d = file($this->f);
        }
        public function getData()
        {
            return $this->d;
        }
        public function append($text)
        {
            array_push($this->d,$text);
        }
        public function save()
        {
            $fil = fopen($this->f,'w');
            foreach($this->d as $rec)
            {
                fwrite($fil,$rec);
            }
            fwrite($fil,"\n");
            fclose($fil);
        }
    }
?>