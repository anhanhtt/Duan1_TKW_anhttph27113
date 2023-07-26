<?php
function insert_danhmuc($type_name){
    $sql="insert into types(type_name) values('$type_name')";
    pdo_execute($sql);
}

function delete_danhmuc($type_id){
    $sql="delete from types where type_id=".$type_id;
    pdo_execute($sql);
}
function loadall_danhmuc(){
    $sql="select * from types order by type_id desc";
    $listdanhmuc=pdo_query($sql);
    return $listdanhmuc;
}
function loadone_danhmuc($type_id){
    $sql="select * from types where type_id=".$type_id;
    $dm=pdo_query_one($sql);
    return $dm;

}

function update_danhmuc($type_id,$type_name){
    $sql="update types set type_name='".$type_name."' where type_id=".$type_id;
    pdo_execute($sql);
}


?>