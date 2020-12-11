<?php
include('../models/News.php');

$news_model=new News();

if(isset($_POST)&& !empty($_POST)){
    $news_model->news_title = $_POST['title'];
    $news_model->news_content = $_POST['details'];
    $news_model->news_image = $_POST['image_Path'];
    $news_model->category_id = $_POST['categoryId'];
    if($news_model->addnews()){
        $feedback['code']=2021;
        $feedback['message']="the news was saved successfully";
    }else{
        $feedback['code']=2020;
        $feedback['message']="failed  to save news tray again";
    }
    echo json_encode($feedback);
}elseif ($_SERVER['REQUEST_METHOD']=="PUT") {
    $_Put=array();
    parse_str(file_get_contents('php://input'),$_Put);
    $news_model->news_id = $_Put['id'];
    $news_model->news_title = $_Put['title'];
    $news_model->news_content = $_Put['details'];
    $news_model->news_date = $_Put['date'];
    $news_model->news_image = $_Put['image_Path'];
    $news_model->category_id = $_Put['categoryId'];
    if($news_model->updateNews()){
        $feedback['code']=2021;
        $feedback['message']="the news was updated successfully";
    }else{
        $feedback['code']=2020;
        $feedback['message']="failed  to update news tray again";
    } 
    echo json_encode($feedback); 
}elseif ($_SERVER['REQUEST_METHOD']=="DELETE") {
    $news_model->news_id=$_GET['id'];
    if($news_model->deleteNews()){
        $feedback['code']=2021;
        $feedback['message']="the news was delete successfully";
    }else{
        $feedback['code']=2020;
        $feedback['message']="failed  to delet news tray again";
    }  
    echo json_encode($feedback);
}elseif (isset($_GET)) {
    if(isset($_GET['newsId'])){
        echo json_encode($news_model->getSinglenews($_GET['newsId']));
    }
    // elseif ($_GET['categoryId'] ) {
    //     echo json_encode($news_model->getAllnewsInCategory_($_GET['categoryId']));
    // }
   
       
  
   
}
?>