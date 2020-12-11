<?php

include('../models/NewsCategory.php');

$news_category_model=new NewsCategory();

if(isset($_POST)&& !empty($_POST)){
    $news_category_model->$category_name = $_POST['categoryName'];
    $news_category_model->type_id = $_POST['typeId'];
   
    if($news_category_model->addCategory()){
        $feedback['code']=2021;
        $feedback['message']="the category was saved successfully";
    }else{
        $feedback['code']=2020;
        $feedback['message']="failed  to save category try again";
    }
    echo json_encode($feedback);
}elseif ($_SERVER['REQUEST_METHOD']=="PUT") {
    $_Put=array();
    parse_str(file_get_contents('php://input'),$_Put);
    $news_category_model->category_id = $_Put['id'];
    $news_category_model->type_id = $_Put['typeId'];
    $news_category_model->$category_name = $_Put['categoryName'];
    
    if($news_category_model->updateCategory()){
        $feedback['code']=2021;
        $feedback['message']="the Category was updated successfully";
    }else{
        $feedback['code']=2020;
        $feedback['message']="failed  to update Category try again";
    } 
    echo json_encode($feedback); 
}elseif ($_SERVER['REQUEST_METHOD']=="DELETE") {
    $news_category_model->category_id=$_GET['id'];
    if($news_category_model->deleteCategory()){
        $feedback['code']=2021;
        $feedback['message']="the Category was delete successfully";
    }else{
        $feedback['code']=2020;
        $feedback['message']="failed  to delete Category try again";
    }  
    echo json_encode($feedback);
}elseif (isset($_GET["typeId"])){
        echo json_encode($news_category_model->getAllCategory($_GET["typeId"]));
    }
?>
