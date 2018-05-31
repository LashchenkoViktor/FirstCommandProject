<?php
function action_index(){
    return core_render("consult",["title"=>"Админ панель","students"=>consult_getStudents()],"admin");
}

function action_list(){
    return core_render("listConsult",["title"=>"Список консультаций"], "admin");
}

function action_getTableStudentsView(){
    $data = ["activeStudents"=>consult_getStudents()];
    return core_render_view("tableConsultation",$data);
}
function action_addStudentInConsultAndJson(){
    if(is_empty(@$_POST['info'],@$_POST['group']) || !consult_addStudent($_POST['group'],$_POST['info']))
        return json_encode(["status"=>'0',"error"=>"Ошибка добавления!"]);
    else
        return json_encode(["status"=>'1']);
}

function action_startConsult(){
    if($_POST ||  _consultStart()==false){
        $arr = [
          "start"=>"0",
          "error"=>"Ошибка старта консультации!"
        ];
    }
    else {
        $arr = [
            "start"=>"1",
        ];
    }
    return json_encode($arr);
}