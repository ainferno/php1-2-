<?php
    include __DIR__ .'/classes.php';
    
    $nw = new News('news');
    $vw = new View();
    
    if(isset($_GET['id']))
    {
        $vw->assign(0,$nw->getArt($_GET['id'])->getArticle());
    }
    $vw->display(__DIR__ .'/template2.php');
?>