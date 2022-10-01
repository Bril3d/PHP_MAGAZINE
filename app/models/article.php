<?php

namespace MVC\models;
use MVC\core\model;

class article extends model{

public function GetAllArticles(){
    $data =  model::db()->rows("SELECT * FROM article"); 
    return $data;
}
function deletearticle($id) {
 $data =   model::db()->delete("article",['id'=>$id]);
    return $data;
}
function updatearticle($data,$id){
    $data = model::db()->update('article',$data,$id);
    return $data;
 }
 function addArticle($data){
    $data =   model::db()->insert("article",$data);
    return $data;
 }
 public function Getarticle($id){
    $data =  model::db()->row("SELECT * FROM article WHERE `id` = $id"); 
    return $data;
}

}
