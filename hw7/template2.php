<html>
<head>
    <title><?php echo $data[0]['Head'].'.'; ?></title>
</head>
<body>
<?php if(isset($data)) { ?>
<h1><?php echo $data[0]['Title']; ?></h1>
<p><?php echo $data[0]['Body']; ?></p>
<?php } ?>

<a href="/hw7/index.php"><button>Return</button></a>
</body>
</html>