<?php
include "../model/pdo.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "../model/taikhoan.php";
include "../model/binhluan.php";
include "header.php";

if(isset($_GET['act'])&&($_GET['act']!="")){
    $act=$_GET['act'];
    switch ($act) {
        //danh muc
        case 'listdm':
            if(isset($_POST['search'])){
                $kyw=$_POST['kyw'];
            }else{
                $kyw='';
            }
            $listdm=load_all_dm($kyw);
            include "danhmuc/list.php";
            break;
        case 'adddm':
            include "danhmuc/add.php";
            break;
        case 'updatedm':
            include "danhmuc/update.php";
            break;
        
        //san pham
        case 'listsp':
            if(isset($_POST['search'])){
                $kyw=$_POST['kyw'];
            }else{
                $kyw="";
            }
            $listsp=load_all_sp($kyw);
            include "sanpham/list.php";
            break;
        case 'addsp':
            include "sanpham/add.php";
            break;
        case 'updatesp':
            include "sanpham/update.php";
            break;

        //thanh vien
        case 'addtk':
            include "taikhoan/add.php";
            break;
        case 'listtv':
            if(isset($_POST['search'])){
                $kyw=$_POST['kyw'];
            }else{
                $kyw="";
            }
            $listtk=load_all_tk(0,$kyw);
            include "taikhoan/listtv.php";
            break;
        case 'listqtv':
            if(isset($_POST['search'])){
                $kyw=$_POST['kyw'];
            }else{
                $kyw="";
            }
            $listtk=load_all_tk(1,$kyw);
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