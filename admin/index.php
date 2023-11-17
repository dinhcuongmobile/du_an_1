<?php
include "../model/pdo.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "../model/taikhoan.php";
include "../model/binhluan.php";
include "../model/donhang.php";
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
            $tendmErr="";
            if(isset($_POST['submit'])){
                $tendm=$_POST['tendm'];
                if(empty(trim($tendm))){
                    $tendmErr="Vui lòng nhập tên danh mục !";
                }else{
                        insert_dm($tendm);
                        echo '<script>
                            alert("Bạn đã thêm danh mục thành công !");
                            window.location.href="?act=listdm";
                        </script>';
                    
                }
            }
            include "danhmuc/add.php";
            break;
        case 'updatedm':
            $tendmErr="";
            if(isset($_GET['id'])&&($_GET['id']!="")){
                $id=$_GET['id'];
                $dm=load_one_dm($id);
                if($dm){
                    $id=$dm['id'];
                    $tendm=$dm['tendm'];
                }
            }
            if(isset($_POST['submit'])){
                $id=$_POST['id'];
                $tendm=$_POST['tendm'];
                if(empty(trim($tendm))){
                    $tendmErr="Vui lòng nhập tên danh mục !";
                }else{
                        update_dm($id,$tendm);
                        echo '<script>
                            alert("Bạn đã sửa danh mục thành công !");
                            window.location.href="?act=listdm";
                        </script>';
                    
                }
            }
            include "danhmuc/update.php";
            break;
        case 'xoadm':
            if(isset($_GET['id'])&&($_GET['id']!="")){
                $id=$_GET['id'];
                delete_dm($id);
                echo '<script>
                        alert("Bạn đã xóa danh mục thành công !");
                        window.location.href="?act=listdm";
                    </script>';
            }
            include "danhmuc/list.php";
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
            $tenspErr="";
            $imageErr="";
            if(isset($_POST['submit'])){
                $tensp=$_POST['tensp'];
                $giasp=$_POST['giasp'];
                $image=basename($_FILES['image']['name']);
                $soluong=$_POST['soluong'];
                $mota=$_POST['mota'];
                $danhmuc=$_POST['danhmuc'];
                $check=true;
                if(empty(trim($tensp))){
                    $tenspErr="Vui lòng nhập tên sản phẩm !";
                    $check=false;
                }
                if(empty($giasp)) $giasp=0;
                if(empty($soluong)) $soluong=1;
                if(empty($image)){
                    $check=false;
                    $imageErr="Vui lòng uploads file ảnh !";
                }else{
                    $file_tmp=$_FILES['image']['tmp_name'];
                    $target_file="../uploads/".$image;
                    $extension=pathinfo($target_file,PATHINFO_EXTENSION);
                    if(!in_array($extension,["png","jpeg","jpg","webp"])){
                        $check=false;
                        $imageErr="File không đúng định dạng !";
                    }else{
                        if($check){
                            move_uploaded_file($file_tmp,$target_file);
                        }
                    }
                }
                if($check){
                    insert_sp($danhmuc,$tensp,$giasp,$image,$soluong,$mota);
                    
                }
            }
            $listdm=load_all_dm("");
            include "sanpham/add.php";
            break;
        case 'updatesp':
            if(isset($_GET['id'])&&($_GET['id']!="")){
                $id=$_GET['id'];
                $sp=load_one_sp($id);
                if($sp){
                    $id=$sp['id'];
                    $oldImage=$sp['image'];
                    $tensp=$sp['tensp'];
                    $giasp=$sp['giasp'];
                    $soluong=$sp['soluong'];
                    $mota=$sp['mota'];
                    $danhmuc=$sp['iddm'];
                }
            }
            $tenspErr="";
            $imageErr="";
            $trangthai=0;
            if(isset($_POST['submit'])){
                $id=$_POST['id'];
                $oldImage=$_POST['oldImage'];
                $tensp=$_POST['tensp'];
                $giasp=$_POST['giasp'];
                $image=basename($_FILES['image']['name']);
                $soluong=$_POST['soluong'];
                $mota=$_POST['mota'];
                $danhmuc=$_POST['danhmuc'];
                $check=true;
                if(empty(trim($tensp))){
                    $tenspErr="Vui lòng nhập tên sản phẩm !";
                    $check=false;
                }
                if(empty($giasp)||($giasp<0)) $giasp=0;
                if(empty($soluong)||($soluong<0)){
                    $soluong=0;
                    $trangthai=1;
                }
                if(empty($image)){
                    $image=$oldImage;
                }else{
                    $file_tmp=$_FILES['image']['tmp_name'];
                    $target_file="../uploads/".$image;
                    $extension=pathinfo($target_file,PATHINFO_EXTENSION);
                    if(!in_array($extension,["png","jpeg","jpg","webp"])){
                        $check=false;
                        $imageErr="File không đúng định dạng !";
                    }else{
                        if($check){
                            move_uploaded_file($file_tmp,$target_file);
                        }
                    }
                }
                if($check){
                    update_sp($id,$danhmuc,$tensp,$giasp,$image,$oldImage,$soluong,$mota,$trangthai);
                    echo '<script>
                        alert("Bạn đã sửa sản phẩm thành công !");
                        window.location.href="?act=listsp";
                    </script>';
                }
            }
            $listdm=load_all_dm("");
            include "sanpham/update.php";
            break;
        case 'xoasp':
            if(isset($_GET['id'])&&($_GET['id']!="")){
                $id=$_GET['id'];
                delete_sp($id);
                echo '<script>
                        alert("Bạn đã xóa danh mục thành công !");
                        window.location.href="?act=listsp";
                    </script>';
            }
            $listsp=load_all_sp("");
            include "sanpham/list.php";
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
            if(isset($_POST['search'])){
                $kyw=$_POST['kyw'];
            }else{
                $kyw="";
            }
            $listdh=load_all_dh($kyw);
            include "donhang/list.php";
            break;
        case 'listbl':
            if(isset($_POST['search'])){
                $kyw=$_POST['kyw'];
            }else{
                $kyw="";
            }
            $listbl=load_all_bl($kyw);
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