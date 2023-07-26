<?php
function insert_sanpham($product_name,$price,$hinh,$description,$id_type){
    $sql="insert into products(product_name,price,image,description,id_type) values('$product_name','$price','$hinh','$description','$id_type')";
    pdo_execute($sql);
}

function delete_sanpham($product_ID){
    $sql="delete from products where product_ID=".$product_ID;
    pdo_execute($sql);
}
function loadall_sanpham_home(){
    $sql="select * from products where 1 order by product_ID desc limit 0,30"; 
    $listsanpham=pdo_query($sql);
    return $listsanpham;
}
function loadall_sanpham_top10(){
    $sql="select * from products where 1 order by views desc limit 0,10"; 
    $listsanpham=pdo_query($sql);
    return $listsanpham;
}
function loadall_sanpham($kyw="",$id_type=0){
    $sql="select * from products where 1"; 
    if($kyw!=""){
        $sql.=" and product_name like '%".$kyw."%'";
    }
    if($id_type>0){
        $sql.=" and id_type ='".$id_type."'";
    }
    $sql.=" order by product_id desc ";
    $listsanpham=pdo_query($sql);
    return $listsanpham;
}
function load_ten_dm($id_type){
    if($id_type>0){
         $sql="select * from types where type_id=".$id_type;
        $dm=pdo_query_one($sql);
        extract($dm);
        return $type_name;
    }else{
        return "";
    }
   

}
function loadone_sanpham($product_ID){
    $sql="select * from products where product_ID=".$product_ID;
    $sp=pdo_query_one($sql);
    return $sp;

}
function load_sanpham_cungloai($product_ID,$id_type){
    $sql="select * from products where id_type=".$id_type." AND product_ID<>".$product_ID;
    $listsanpham=pdo_query($sql);
    return $listsanpham;

}

function update_sanpham($product_ID,$id_type,$product_name,$hinh,$price,$description){
    if($hinh!="")
        $sql="update products set id_type='".$id_type."', product_name='".$product_name."',price='".$price."',description='".$description."',image='".$hinh."' where product_ID=".$product_ID;
    else
        $sql="update products set id_type='".$id_type."', product_name='".$product_name."',price='".$price."',description='".$description."' where product_ID=".$product_ID;
    pdo_execute($sql);
}



?>