<html>
<head>
    <title>Cities</title>
</head>
<body>
    <p>Ввелите название города:</p>
    <form action="index.php" method="post"> 
    <input type="text" name="user">
    <input type="submit">
    </form>
<?php
    
    include __DIR__    . '/cities.php';
    function first_l($strng)
    {
        return mb_substr($strng,0,1);
    }
    function last_l($strng)
    {
        return mb_substr($strng,mb_strlen($strng)-1,1);
    }
    if(isset($_POST['user']) && $_POST['user'] != '')
    {
        $usr = $_POST['user'];
        $usr_l = last_l($usr);
        
        echo $usr.' => ';
        
        foreach($cities as $city)
        {
            //echo 'City: '.$city.', First: '.mb_substr($city,2,1).', Last: '.last_l($city).', User '.$usr_l;
            
            //echo '<br>';
            
            if(strcasecmp(mb_strtolower(first_l($city)),mb_strtolower($usr_l)) == 0 )
            {
                echo $city.'<br>';
                //echo $city.' '.first_l($city).'<br>';
                //echo (int)strcasecmp(first_l($city),$usr_l).'<br>';
                //unset($cities[$key]);
                break;
            }
            //echo $city.' '.first_l($city).' '.$usr_l.'<br>';
            //echo (int)strcasecmp(first_l($city),$usr_l).'<br>';
        }
    }
?>
</body>
</html>