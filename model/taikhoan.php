<?php
function load_all_tk($vaitro,$kyw){
    $query="SELECT * FROM taikhoan WHERE 1";
    if ($kyw != "") {
        $query .= " AND (hovaten LIKE '%" . $kyw . "%' OR email LIKE '%" . $kyw . "%' OR sodienthoai LIKE '%" . $kyw . "%')";
    }
    if($vaitro==1){
        $query .=" AND role=".$vaitro;
    }else if($vaitro==0){
        $query .=" AND role=".$vaitro;
    }
    $query .=" ORDER BY id asc";
    return pdo_query($query);
}
function load_one_tk($id){
    $query="SELECT * FROM taikhoan WHERE id=".$id;
    return pdo_query_one($query);
}
function insert_tk($hovaten,$tendangnhap,$matkhau,$email,$sodienthoai,$diachi,$role){
    $query="INSERT INTO `taikhoan`(`hovaten`, `tendangnhap`, `matkhau`, `email`, `sodienthoai`, `diachi`, `role`) 
    VALUES ('$hovaten','$tendangnhap','$matkhau','$email','$sodienthoai','$diachi','$role')";
    pdo_execute($query);
}
function update_tk($id,$hovaten,$tendangnhap,$matkhau,$email,$sodienthoai,$diachi,$role){
    $query="UPDATE `taikhoan` SET `id`='$id',`hovaten`='$hovaten',`tendangnhap`='$tendangnhap',`matkhau`='$matkhau',`email`='$email',`sodienthoai`='$sodienthoai',`diachi`='$diachi',`role`='$role' WHERE id=".$id;
    pdo_execute($query);
}
function delete_tk($id){
    $query="DELETE FROM taikhoan WHERE id=".$id;
    pdo_execute($query);
}
function checkuser($tendangnhap,$matkhau){
    $query="SELECT * FROM taikhoan WHERE tendangnhap='".$tendangnhap."' AND  matkhau='".$matkhau."'";
    return pdo_query_one($query);
}
function checkemail($email){
    $query="SELECT * FROM taikhoan WHERE email='".$email."'";
    return pdo_query_one($query);
}
?>