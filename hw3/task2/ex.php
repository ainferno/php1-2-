<?php
    $names = [ 1 => 'Panda', 2 => 'Penguin', 3 => 'Coala', 4 => 'Crocodile'];
    $size = [1 => [899,643], 2 => [800,734], 3 => [283,215], 4 => [900,1200]];
?>
<html>
<head>
    <title><?php echo $names[$_GET['id']]; ?></title>
</head>
<body>
    <a href="index.php"><button>Return</button></a>
    <p><img src="images/<?php echo $_GET['id'] ?>.jpg" 
    width="<?php echo $size[$_GET['id']][0] ?>" height="<?php echo $size[$_GET['id']][1] ?>" alt="$names[$_GET['id']]"></a></p>
</body>
</html>