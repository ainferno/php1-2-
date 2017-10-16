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
    class Uploader
    {
        private $name;
        public function __construct($n)
        {
            $this->name = $n;
        }
        public function isUploaded()
        {
            return isset($_FILES[$this->name]);
        }
        public function upload()
        {
            if($this->isUploaded())
            {
                if (0 == $_FILES[$this->name]['error']) 
                {
                $res = move_uploaded_file( $_FILES[$this->name]['tmp_name'], __DIR__ .'/files' );
                }

            }
        }
    }
?>