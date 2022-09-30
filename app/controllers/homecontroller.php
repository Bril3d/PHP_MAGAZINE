<?php


namespace MVC\controllers;

use MVC\core\controller;

use MVC\models\category;
class homecontroller extends controller {
    function index() {
       $category = new category();
       $data = $category->GetAllCategories();
       
       
        $this->view('home/index',['title'=>'home','data'=>$data]);
        
    
    }


    function details() {
        $this->view('home/details',['title'=>'details']);
    }
}