<html>
<head>
    <title>Records</title>
</head>
<body>

<?php if(isset($data)) { foreach($data as $record) { ?>
<a href="/hw6/task2/article.php?id=<?php echo $record['Number']; ?>"><?php echo $record['Head'].':'; ?></a>
<?php echo ' '.$record['Title']; ?><br><br>
<?php }} ?>

<form action="index.php" method="post"> 
    <p>Имя: <input type="text" name="Name"><p>
    <p>Комментарий: <input type="text" name="Text"><p>
    <input type="submit">
</form>

</body>
</html>