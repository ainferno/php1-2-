<?php
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