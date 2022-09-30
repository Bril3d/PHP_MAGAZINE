<?php

namespace MVC\models;

use MVC\core\model;

class category extends model{

    public function GetAllCategories(){
        $data =  model::db()->rows("SELECT * FROM category"); 
        return $data;
    }
    function deletecategory($id) {
     $data =   model::db()->delete("category",['id'=>$id]);
        return $data;
    }
    function updatecategory($data,$id){
        $data = model::db()->update('category',$data,$id);
        return $data;
     }
     function addCategory($data){
        $data =   model::db()->insert("category",$data);
        return $data;
     }
     public function GetCategory($id){
        $data =  model::db()->row("SELECT * FROM category WHERE `id` = $id"); 
        return $data;
    }

}