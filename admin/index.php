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
                $khuyenmai=$_POST['khuyenmai'];
                $mota=$_POST['mota'];
                $danhmuc=$_POST['danhmuc'];
                $check=true;
                if(empty(trim($tensp))){
                    $tenspErr="Vui lòng nhập tên sản phẩm !";
                    $check=false;
                }
                if(empty($giasp)) $giasp=0;
                if(empty($soluong)) $soluong=1;
                if(empty($khuyenmai)) $khuyenmai=0;
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
                    insert_sp($danhmuc,$tensp,$giasp,$image,$soluong,$khuyenmai,$mota);
                    
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
                    $khuyenmai=$sp['khuyenmai'];
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
                $khuyenmai=$_POST['khuyenmai'];
                $mota=$_POST['mota'];
                $danhmuc=$_POST['danhmuc'];
                $check=true;
                if(empty(trim($tensp))){
                    $tenspErr="Vui lòng nhập tên sản phẩm !";
                    $check=false;
                }
                if(empty($giasp)||($giasp<0)) $giasp=0;
                if(empty($khuyenmai)||($khuyenmai<0)) $khuyenmai=0;
                if(empty($soluong)||($soluong<0)){$soluong=0;$trangthai=1;}
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
                    update_sp($id,$danhmuc,$tensp,$giasp,$image,$oldImage,$soluong,$khuyenmai,$mota,$trangthai);
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
                        alert("Bạn đã xóa sản phẩm thành công !");
                        window.location.href="?act=listsp";
                    </script>';
            }
            $listsp=load_all_sp("");
            include "sanpham/list.php";
            break;
        //thanh vien
        case 'addtk':
            $tendangnhapErr="";
            $matkhauErr="";
            $emailErr="";
            $sodienthoaiErr="";
            if(isset($_POST['submit'])){
                $hovaten=$_POST['hovaten'];
                $tendangnhap=$_POST['tendangnhap'];
                $matkhau=$_POST['matkhau'];
                $email=$_POST['email'];
                $sodienthoai=$_POST['sodienthoai'];
                $diachi=$_POST['diachi'];
                $role=$_POST['role'];
                $check=true;
                if(empty(trim($tendangnhap))){$check=false; $tendangnhapErr="Vui lòng không bỏ trống !";} 
                else{
                    if(!preg_match("/^\w{6,16}$/",$tendangnhap)){$check=false;$tendangnhapErr="Tên đăng nhập tối thiểu 6 ký tự !";}
                }
                if(empty(trim($matkhau))){$check=false; $matkhauErr="Vui lòng không bỏ trống !";}
                else{
                    if(!preg_match("/^(?=.*[0-9])(?=.*[A-Z])\w{8,18}$/",$matkhau)){$check=false;$matkhauErr="Mật khẩu tối thiểu 8 ký tự bao gồm ký tự số và ký tự in hoa !";}
                }
                if(empty(trim($email))){$check=false; $emailErr="Vui lòng không bỏ trống !";}
                else{
                    if(!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]+$/",$email)){$check=false;$emailErr="Email không đúng định dạng !";}
                }
                if(empty($sodienthoai)) $sodienthoai="";
                else {if(!preg_match("/^0[1-9]\d{8}$/",$sodienthoai)){$check=false;$sodienthoaiErr="Số điện thoại không đúng định dạng !";}}
                if($check){
                    insert_tk($hovaten,$tendangnhap,$matkhau,$email,$sodienthoai,$diachi,$role);
                    echo '<script>
                        alert("Bạn đã thêm tài khoản thành công !");
                    </script>';
                }
            }
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
            if(isset($_GET['id'])&&($_GET['id']!="")){
                $id=$_GET['id'];
                $tk=load_one_tk($id);
                if($tk){
                    $id=$tk['id'];
                    $hovaten=$tk['hovaten'];
                    $tendangnhap=$tk['tendangnhap'];
                    $matkhau=$tk['matkhau'];
                    $email=$tk['email'];
                    $sodienthoai=$tk['sodienthoai'];
                    $diachi=$tk['diachi'];
                    $role=$tk['role'];
                }
            }
            $tendangnhapErr="";
            $matkhauErr="";
            $emailErr="";
            $sodienthoaiErr="";
            if(isset($_POST['submit'])){
                $id=$_POST['id'];
                $hovaten=$_POST['hovaten'];
                $tendangnhap=$_POST['tendangnhap'];
                $matkhau=$_POST['matkhau'];
                $email=$_POST['email'];
                $sodienthoai=$_POST['sodienthoai'];
                $diachi=$_POST['diachi'];
                $role=$_POST['role'];
                $check=true;
                if(empty(trim($tendangnhap))){$check=false; $tendangnhapErr="Vui lòng không bỏ trống !";} 
                else{
                    if(!preg_match("/^\w{6,16}$/",$tendangnhap)){$check=false;$tendangnhapErr="Tên đăng nhập tối thiểu 6 ký tự !";}
                }
                if(empty(trim($matkhau))){$check=false; $matkhauErr="Vui lòng không bỏ trống !";}
                else{
                    if(!preg_match("/^(?=.*[0-9])(?=.*[A-Z])\w{8,18}$/",$matkhau)){$check=false;$matkhauErr="Mật khẩu tối thiểu 8 ký tự bao gồm ký tự số và ký tự in hoa !";}
                }
                if(empty(trim($email))){$check=false; $emailErr="Vui lòng không bỏ trống !";}
                else{
                    if(!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]+$/",$email)){$check=false;$emailErr="Email không đúng định dạng !";}
                }
                if(empty($sodienthoai)) $sodienthoai="";
                else {if(!preg_match("/^0[1-9]\d{8}$/",$sodienthoai)){$check=false;$sodienthoaiErr="Số điện thoại không đúng định dạng !";}}
                if($check){
                    update_tk($id,$hovaten,$tendangnhap,$matkhau,$email,$sodienthoai,$diachi,$role);
                    echo '<script>
                        alert("Bạn đã sửa tài khoản thành công !");
                    </script>';
                }
            }
            include "taikhoan/update.php";
            break;
        case 'xoatk':
            $vaitro="";
            $duongdan="";
            if(isset($_GET['id'])&&($_GET['id']!="")){
                $id=$_GET['id'];
                $tk=load_one_tk($id);
                if($tk){
                    delete_tk($tk['id']);
                    if($tk['role']==0){
                        $vaitro=0;
                        $duongdan="sanpham/listtv.php";
                        echo '<script>
                            alert("Bạn đã xóa tài khoản thành công !");
                            window.location.href="?act=listtv";
                        </script>';
                    }else if($tk['role']==1){
                        $vaitro=1;
                        $duongdan="sanpham/listqtv.php";
                        echo '<script>
                            alert("Bạn đã xóa tài khoản thành công !");
                            window.location.href="?act=listqtv";
                        </script>';
                    }
                }
            }else{$duongdan="home.php";}
            $list=load_all_tk($vaitro,"");
            include $duongdan;
            break;
        //don hang
        case 'listdh':
            if(isset($_POST['search'])){
                $kyw=$_POST['kyw'];
            }else{
                $kyw="";
            }
            $listdh=load_all_dh($kyw);
            include "donhang/list.php";
            break;
        case 'xoadh':
            if(isset($_GET['id'])&&($_GET['id']!="")){
                $id=$_GET['id'];
                delete_giohang($id);
                delete_dh($id);
                echo '<script>
                        alert("Bạn đã xóa thành công !");
                        window.location.href="?act=listdh";
                    </script>';
            }
            $listdh=load_all_dh("");
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