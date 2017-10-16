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
                fwrite($fil,$rec);
            }
            fwrite($fil,"\n");
            fclose($fil);
        }
    }

    class GuestBook  extends TextFile
    {
        private $d;
        public function __construct($path)
        {
            parent::__construct($path);
            $this->d = parent::getDat();
            
        }
        public function getData()
        {
            return $this->d;
        }
        public function append($text)
        {
            array_push($this->d,$text);
            return $this;
        }
        public function save()
        {
            parent::writeDat($this->d);
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
                    $res = move_uploaded_file( $_FILES[$this->name]['tmp_name'], __DIR__ .'/files/'.$_FILES['myimg']['name'] );
                }

            }
        }
    }
?>