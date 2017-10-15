<?php
    function discr($a,$b,$c)
    {
        $dis = $a ** 2 - 4 * ($b * $c);
        if ($dis < 0)
            return -1;
        return sqrt($dis);
    }
    function gen($name)
    {
        switch($name[-2].$name[-1])
        {
            case 'а': case 'я':case 'А': case 'Я':
            echo '<br>'.$name.' - женское имя';
            return 1;
            default:
            echo '<br>'.$name.' - мужское имя';
            return 0;
        }
    }
?>