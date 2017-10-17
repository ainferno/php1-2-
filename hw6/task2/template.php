<html>
<head>
    <title>Records</title>
</head>
<body>

<?php if(isset($data)) { foreach($data as $record) { ?>
<?php echo 'Name: '.$record[0]; ?><br>
<?php echo 'Text: '.$record[1]; ?><br><br>
<?php }} ?>

<form action="index.php" method="post"> 
    <p>Имя: <input type="text" name="Name"><p>
    <p>Комментарий: <input type="text" name="Text"><p>
    <input type="submit">
</form>

</body>
</html>