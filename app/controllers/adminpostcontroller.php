<?php

namespace MVC\controllers;

use MVC\core\controller;
use MVC\core\Session;
use MVC\models\article;
use MVC\core\helpers;

class adminpostcontroller extends controller {
    public $user_data;
    public function __construct()
    {
        Session::Start();
        $this->user_data = Session::Get('user');

        if(empty($this->user_data)){
            echo 'class not access';
            die;
        }
    }
    function index() {
        $article = new article();
        $data = $article->GetAllArticles();
        $this->view('back/article',['title'=>'admin','data'=>$data]);
    }
    function add(){
        
        $this->view('back/addArticle',['title'=>'admin']);
     }
     function postadd(){
        $img = $_FILES['img'];
        move_uploaded_file($img['tmp_name'],'img/'.$img['name']);
        $article = new article();
        $data = ['title'=> $_POST['title'],'description'=>$_POST['description'],'user_id'=> $this->user_data->id,'img'=>$img['name']];

        $data = $article->addArticle($data);
        if($data){
            helpers::redirect('adminpost/index');
        }
     }
     function delete($id){
        $article = new article();
        $data = $article->deletearticle($id);
        if($data){
            helpers::redirect('adminpost/index');
        }
     
    }
    function update($id){
        $article = new article();
        $data = $article->GetArticle($id);
        $this->view('back/updatearticle',['data'=>$data]);
        }
    function postupdate(){
       
        if(!empty($_FILES['img']['name'])){
            
            $img = $_FILES['img'];
            move_uploaded_file($img['tmp_name'],'img/'.$img['name']);
            $data = ['title'=> $_POST['title'],'description'=>$_POST['description'],'user_id'=> $this->user_data->id,'img'=>$img['name']];
        }else{
            $data = ['title'=> $_POST['title'],'description'=>$_POST['description'],'user_id'=> $this->user_data->id];
        }
        $article = new article();
       
        $id = ['id'=>$_POST['id']];
        
        $data = $article->updatearticle($data,$id);
        var_dump($data);die;
        
        if($data){
            helpers::redirect('adminpost/index');
        }
     }
}