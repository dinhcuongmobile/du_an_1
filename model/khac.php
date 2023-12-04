<?php
function insert_tintuc($image,$ngaydang,$tieude,$noidung,$idtaikhoan){
    $query="INSERT INTO `tintuc`(`image`,`ngaydang`, `tieude`, `noidung`, `idtaikhoan`) VALUES ('$image','$ngaydang','$tieude','$noidung','$idtaikhoan')";
    pdo_execute($query);
}
function load_tintuc_home(){
    $query="SELECT tintuc.id as idtt, tintuc.image, tintuc.ngaydang, tintuc.tieude, tintuc.noidung, tintuc.idtaikhoan ,
    taikhoan.* FROM tintuc INNER JOIN taikhoan ON tintuc.idtaikhoan=taikhoan.id ORDER BY tintuc.id desc limit 0,6";
    return pdo_query($query);
}
function load_tintuc_home2(){
    $query="SELECT tintuc.id as idtt, tintuc.image, tintuc.ngaydang, tintuc.tieude, tintuc.noidung, tintuc.idtaikhoan ,
    taikhoan.* FROM tintuc INNER JOIN taikhoan ON tintuc.idtaikhoan=taikhoan.id ORDER BY tintuc.id desc limit 0,3";
    return pdo_query($query);
}
function load_tintuc($kyw){
    $query="SELECT tintuc.id as idtt, tintuc.image, tintuc.ngaydang, tintuc.tieude, tintuc.noidung, tintuc.idtaikhoan ,
    taikhoan.* FROM tintuc INNER JOIN taikhoan ON tintuc.idtaikhoan=taikhoan.id WHERE 1";
    if($kyw != ''){
        $query .=" AND (taikhoan.tendangnhap LIKE '%" . $kyw . "%' OR tintuc.ngaydang LIKE '%" . $kyw . "%' OR tintuc.tieude LIKE '%" . $kyw . "%')";
    }
    $query .=" ORDER BY tintuc.id desc";
    return pdo_query($query);
}
function load_one_tintuc($id){
    $query="SELECT tintuc.id as idtt, tintuc.image, tintuc.ngaydang, tintuc.tieude, tintuc.noidung, tintuc.idtaikhoan ,
    taikhoan.* FROM tintuc INNER JOIN taikhoan ON tintuc.idtaikhoan=taikhoan.id WHERE tintuc.id='$id'";
    return pdo_query_one($query);
}
function update_tintuc($id,$image,$oldImage,$tieude,$noidung){
    $conn=pdo_get_connection();
    $query="UPDATE `tintuc` SET id=:id, `image`=:image,`tieude`=:tieude,`noidung`=:noidung WHERE `id`=:id";
    $state=$conn->prepare($query);
    $state->execute([
        ':id'=>$id,
        ':image'=>($image?$image:$oldImage),
        ':tieude'=>$tieude,
        ':noidung'=>$noidung
    ]);
}
function delete_tintuc($id){
    $query="DELETE FROM tintuc WHERE id='$id'";
    pdo_execute($query);
}
?>