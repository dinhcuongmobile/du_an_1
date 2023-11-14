<?php
function load_all_sp($kyw){
    $query="SELECT sanpham.*, danhmuc.tendm FROM sanpham INNER JOIN danhmuc ON sanpham.iddm=danhmuc.id WHERE 1";
    if($kyw!=""){
        $query .=" AND tensp like '%".$kyw."%'";
    }
    $query .=" ORDER BY id asc";
    return pdo_query($query);
}
?>