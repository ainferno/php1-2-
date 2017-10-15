<html>
<head>
    <title>Records</title>
</head>
<body>
<?php
    if(isset($_POST['Name']))
    {
        $f = fopen(__DIR__ .'/records','a');
        fwrite($f,$_POST['Name'].'?*||'.$_POST['Text']."\n");
        fclose($f);
    }
    $lines = file(__DIR__ .'/records');
    foreach($lines as $rec)
    {
        $words = explode('?*||',$rec);
        echo 'Name: '.$words[0].'<br>';
        echo 'Recorde: '.$words[1].'<br><br>';
    }
?>
<form action="index.php" method="post"> 
    <p>Имя: <input type="text" name="Name"><p>
    <p>Комментарий: <input type="text" name="Text"><p>
    <input type="submit">
</form>

</body>
</html>