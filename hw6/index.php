<?php
    include __DIR__ .'/classes.php';
    
    $gb = new GuestBook(__DIR__ .'/records');
    $vw = new View();
    
    if(isset($_POST['Name']))
    {
        $gb->append($_POST['Name'].'?*||'.$_POST['Text'])->save();
    }
    $d = $gb->getData();
    //var_dump($d);
    $i = 0;
    foreach($d as $rec)
    {
        $vw->assign($i,explode('?*||',$rec));
        $i++;
    }
    $vw->display(__DIR__ .'/template.php');
?>