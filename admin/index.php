<?php
include "../model/pdo.php";
include "header.php";

if(isset($_GET['act'])&&($_GET['act']!="")){
    $act=$_GET['act'];
    switch ($act) {
        //danh muc
        case 'listdm':
            include "danhmuc/list.php";
            break;
        case 'adddm':
            include "danhmuc/add.php";
            break;
        case 'updatedm':
            include "danhmuc/update.php";
            break;
        
        //san pham
        case 'addsp':
            include "sanpham/add.php";
            break;
        case 'listsp':
            include "sanpham/list.php";
            break;
        case 'updatesp':
            include "sanpham/update.php";
            break;

        //thanh vien
        case 'addtk':
            include "taikhoan/add.php";
            break;
        case 'listtv':
            include "taikhoan/listtv.php";
            break;
        case 'listqtv':
            include "taikhoan/listqtv.php";
            break;
        case 'updatetk':
            include "taikhoan/update.php";
            break;

        //don hang-suatiep
        case 'listdh':
            include "bill/list.php";
            break;
        case 'listbl':
            include "binhluan/list.php";
            break;
        default:
        include "home.php";
            break;
    }
}else{
    include "home.php";
}


include "footer.php";
?>