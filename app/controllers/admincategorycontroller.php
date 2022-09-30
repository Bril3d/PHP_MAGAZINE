<?php

namespace MVC\controllers;
use MVC\core\controller;
use MVC\core\Session;
use MVC\models\category;
use MVC\core\helpers;
class admincategorycontroller extends controller {
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
        $category = new category();
        $data = $category->GetAllCategories();
        $this->view('back/category',['title'=>'admin','data'=>$data]);
    }
    function delete($id){
        $category = new category();
        $data = $category->deletecategory($id);
        if($data){
            helpers::redirect('admincategory/index');
        }
     
    }
    function update($id){
        $category = new category();
        $data = $category->GetCategory($id);
        $this->view('back/updatecategory',['data'=>$data]);
        }
    function postupdate(){
       
        if(!empty($_FILES['img']['name'])){
            
            $img = $_FILES['img'];
            move_uploaded_file($img['tmp_name'],'img/'.$img['name']);
            $data = ['name'=> $_POST['name'],'icon'=>$_POST['icon'],'user_id'=> $this->user_data->id,'img'=>$img['name']];
        }else{
            $data = ['name'=> $_POST['name'],'icon'=>$_POST['icon'],'user_id'=> $this->user_data->id];
        }
        $category = new category();
       
        $id = ['id'=>$_POST['id']];
        
        $data = $category->updateCategory($data,$id);
     
        
        if($data){
            helpers::redirect('admincategory/index');
        }
     }
     function add(){
        
        $this->view('back/addCategory',['title'=>'admin']);
     }
     function postadd(){
        $img = $_FILES['img'];
        move_uploaded_file($img['tmp_name'],'img/'.$img['name']);
        $category = new category();
        $data = ['name'=> $_POST['name'],'icon'=>$_POST['icon'],'user_id'=> $this->user_data->id,'img'=>$img['name']];
        $data = $category->addCategory($data);
        if($data){
            helpers::redirect('admincategory/index');
        }
     }
     function updatecategory($data){

     }
    }
