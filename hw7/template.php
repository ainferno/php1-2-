<html>
<head>
    <title>Records</title>
</head>
<body>

<?php if(isset($data)) { foreach($data as $record) { ?>
<a href="/hw7/article.php?id=<?php echo $record['Number']; ?>"><?php echo $record['Head'].':'; ?></a>
<?php echo ' '.$record['Title']; ?><br><br>
<?php }} ?>

<form action="index.php" method="post"> 
    <p>Название: <input type="text" name="Name"><p>
    <p>Заголовок: <input type="text" name="Title"><p>
    <p>Текст: <input type="text" name="Body"><p>
    <input type="submit">
</form>

</body>
</html>