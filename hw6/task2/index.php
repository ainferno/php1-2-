<?php
    include __DIR__ .'/classes.php';
    
    $nw = new News(__DIR__ .'/records');
    $vw = new View();
    
    if(isset($_POST['Name']) && isset($_POST['Body']))
    {
        $nw->addArticle(new Article(0,$_POST['Name'],$_POST['Title'],$_POST['Body']))->saveNews();
    }
    $d = $nw->getData();
    //var_dump($d);
    $i = 0;
    foreach($d as $rec)
    {
        $vw->assign($i,$rec->getArticle());
        $i++;
    }
    $vw->display(__DIR__ .'/template.php');
?>