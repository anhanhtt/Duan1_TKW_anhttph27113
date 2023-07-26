<?php
    function loadall_taikhoan(){
        $sql="select * from user order by id desc";
        $listtaikhoan=pdo_query($sql);
        return $listtaikhoan;
    }
    function insert_taikhoan($email,$username,$pass){
        $sql="insert into user(email,username,pass) values('$email','$username','$pass')";
        pdo_execute($sql);
    }
    function checkuser($username,$pass){
        $sql="select * from user where username='".$username."' AND pass='".$pass."'";
        $sp=pdo_query_one($sql);
        return $sp;
    
    }
    function delete_taikhoan($id){
        $sql="delete from user where id=".$id;
        pdo_execute($sql);
    }
    
    function loadone_taikhoan($id){
        $sql="select * from user where id=".$id;
        $tk=pdo_query_one($sql);
        return $tk;
    
    }
    function checkemail($email){
        $sql="select * from user where email='".$email."'";
        $sp=pdo_query_one($sql);
        return $sp;
    
    }
    function update_taikhoan($id,$username,$pass,$email,$address,$tel){
        $sql="update user set username='".$username."', pass='".$pass."',email='".$email."',address='".$address."',tel='".$tel."' where id=".$id;
        pdo_execute($sql);
    }
    
?>