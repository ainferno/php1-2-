<html>
<head>
    <title>Records</title>
</head>
<body>
<?php
    if ( isset($_FILES['myimg']) ) 
    {
        if (0 == $_FILES['myimg']['error']) 
        {
            $r = mb_substr($_FILES['myimg']['name'],-4,4);
            if($r == '.png' || $r == '.jpg')
            {
                $res = move_uploaded_file( $_FILES['myimg']['tmp_name'], __DIR__ .'/files/'.$_FILES['myimg']['name'] );
            }
            else
            {
                echo 'No none jpg or png files allowed<br>';
            }
        }
    }
?>
<form action="homework/hw4/task2/index.php" method="post" enctype="multipart/form-data" >
    <input type="file" name="myimg">
    <input type="submit">
</form>

</body>
</html>