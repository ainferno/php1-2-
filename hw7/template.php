<html>
<head>
    <title>Records</title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <style>

    </style>
</head>
<body>

<div class="container">
<?php if(isset($data)) { foreach($data as $record) { ?>
<a href="/hw7/article.php?id=<?php echo $record['Number']; ?>">
<div class="card">
    <div class="card-header"><?php echo $record['Head'].':'; ?></div>
    <div class="card-body"><?php echo ' '.$record['Title']; ?><br><br></div>
</div>
</a>
<?php }} ?>



<form action="index.php" method="post"> 
    <p>Название: <div class="form-group"><input type="text" name="Name"></div><p>
    <p>Заголовок: <div class="form-group"><input type="text" name="Title"></div<p>
    <p>Текст: <div class="form-group"><input type="text" name="Body"></div<p>
    <div class="form-group"><input type="submit" class="btn btn-default"></div>
</form>
</div>
</div>

</body>
</html>