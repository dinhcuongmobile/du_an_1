<?php
session_start();
include "../../model/pdo.php";
include "../../model/danhmuc.php";
include "../../model/sanpham.php";
include "../../model/taikhoan.php";
include "../../model/binhluan.php";
include "../../model/donhang.php";
$listgh=load_all_giohang($_SESSION['user']['id']); 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id=$_POST['id'];
    $thanhtien=$_POST['thanhtien'];
    $soluong=$_POST['soluong'];
    
    foreach ($listgh as $giohang) {
        if ($id == $giohang['idsanpham']) {
            update_giohang(5,9909,$id);
            break;
        }
    }
}
?>