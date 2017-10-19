<?php
    include __DIR__ .'/classes.php';
    
    $nw = new News('news');
    $vw = new View();
    
    if(isset($_POST['Name']) && isset($_POST['Body']))
    {
        $nw->addArticle(new Article(0,$_POST['Name'],$_POST['Title'],$_POST['Body']));
    }
    $d = $nw->getData();

    $i = 0;
    foreach($d as $rec)
    {
        $vw->assign($i,$rec->getArticle());
        $i++;
    }
    $vw->display(__DIR__ .'/template.php');
?>