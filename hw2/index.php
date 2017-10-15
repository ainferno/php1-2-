<html>
<head lang='ru'>
    <meta charset='UTF-8'>
    <title>Homework 1</title>
</head>
<body>

<?php
include __DIR__ . '/functions.php'; 
//Task 1
    echo 'Table for &&:<br>';
    echo '_ 0 1<br>';
    echo '0 '.(int)(0&&0).' '.(int)(0&&1).'<br>';
    echo '1 '.(int)(1&&0).' '.(int)(1&&1).'<br>';
    echo '<br><br>Table for ||:<br>';
    echo '_ 0 1<br>';
    echo '0 '.(int)(0||0).' '.(int)(0||1).'<br>';
    echo '1 '.(int)(1||0).' '.(int)(1||1).'<br>';
    echo '<br><br>Table for xor:<br>';
    echo '_ 0 1<br>';
    echo '0 '.(int)(0 xor 0).' '.(int)(0 xor 1).'<br>';
    echo '1 '.(int)(1 xor 0).' '.(int)(1 xor 1).'<br>';
//Task2
    $a = 4;
    $b = 4;
    $c = 1;
    echo '<br><br>Task: '.$a.'x^2 + '.$b.'x + '.$c;
    $d = discr($a,$b,$c);
    echo '<br>Discriminant = ';
    if ($d != -1)
    {
        echo $d;
        if($d == 0)
        {
            echo '<br>X = '.(-$b/2/$a);
        }
        else
        {
            echo '<br>X1 = '.((-$b+$d)/2/$a);
            echo '<br>X2 = '.((-$b-$d)/2/$a);
        }
    }
    else
    {
        echo 'null';
    }
//Task3
    //var_dump(include __DIR__ . '/functions.php');
    //var_dump(include __DIR__ . '/functions2.php');
    //var_dump(include __DIR__ . '/functions3.php');
//Task4
    echo '<br>';
    gen('Мария');
    gen('Аркадий');
    gen('Елена');
    gen('ы');
        
?>

</body>
</html>