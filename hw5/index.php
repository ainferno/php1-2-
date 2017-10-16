<html>
<head>
    <title>Records</title>
</head>
<body>
<?php
    include __DIR__ .'/classes.php';
    $up = new Uploader("myimg");
    $up->upload();
    
    $gb = new GuestBook(__DIR__ .'/records');
    if(isset($_POST['Name']))
    {
        $gb->append($_POST['Name'].'?*||'.$_POST['Text'])->save();
    }
    $d = $gb->getData();
    //var_dump($d);
    foreach($d as $rec)
    {
        $l = explode('?*||',$rec);
        echo 'Name: '.$l[0].'<br>';
        echo 'Text: '.$l[1].'<br><br>';
    }
?>
<form action="index.php" method="post"> 
    <p>Имя: <input type="text" name="Name"><p>
    <p>Комментарий: <input type="text" name="Text"><p>
    <input type="submit">
</form>

<form action="/hw5/index.php" method="post" enctype="multipart/form-data" >
    <input type="file" name="myimg">
    <input type="submit">
</form>

</body>
</html>