<?php
ob_start();
session_start();
include "../model/pdo.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "../model/taikhoan.php";
include "../model/binhluan.php";
include "../model/donhang.php";
include "../view/header.php";

$list_sp_home=load_sp_home();
$list_sp_nb=load_sp_nb();
$listdm=load_all_dm("");
if(isset($_GET['act'])&&($_GET['act']!="")){
    $act=$_GET['act'];
    switch ($act) {
        case 'giohang':
            include "../view/cart/giohang.php";
            break;
        case 'tieptucdathang':
            include "../view/cart/thongtindathang.php";
            break;
        case 'dangnhap':
            include "../view/taikhoan/dangnhap.php";
            break;
        default:
        include "../view/home.php";
            break;
    }
}else{
    include "../view/home.php";
}


include "../view/footer.php";
?>