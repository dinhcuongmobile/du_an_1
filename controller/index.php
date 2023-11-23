<?php
ob_start();
session_start();
include "../model/pdo.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "../model/taikhoan.php";
include "../model/binhluan.php";
include "../model/donhang.php";
if(isset($_SESSION['user'])) {
    $listgh=load_all_giohang($_SESSION['user']['id']); 
    $countgh=count_giohang($_SESSION['user']['id']);
    $minicart=load_minicart($_SESSION['user']['id']);
}
$list_sp_home=load_sp_home();
$list_sp_nb=load_sp_nb();
$listdm=load_all_dm("");
include "../view/header.php";
if(isset($_GET['act'])&&($_GET['act']!="")){
    $act=$_GET['act'];
    switch ($act) {
        /* Tai khoan */
        case 'dangky':
            $hovatenErr="";
            $tendangnhapErr="";
            $matkhauErr="";
            $emailErr="";
            if(isset($_POST['dangky'])){
                $hovaten=$_POST['hovaten'];
                $dkyemail=$_POST['dkyemail'];
                $dkyuser=$_POST['dkyuser'];
                $dkypass=$_POST['dkypass'];
                $check=true;
                if(empty(trim($hovaten))){$check=false; $hovatenErr="Vui lòng không bỏ trống !";} 
                else{
                    if(!preg_match("/^[a-zA-Z ]{6,}$/",$hovaten)){$check=false;$hovatenErr="Họ và tên tối thiểu 6 ký tự và không bao gồm chữ số!";}
                }
                if(empty(trim($dkyuser))){$check=false; $tendangnhapErr="Vui lòng không bỏ trống !";} 
                else{
                    if(!preg_match("/^\w{6,16}$/",$dkyuser)){$check=false;$tendangnhapErr="Tên đăng nhập tối thiểu 6 ký tự !";}
                }
                if(empty(trim($dkypass))){$check=false; $matkhauErr="Vui lòng không bỏ trống !";}
                else{
                    if(!preg_match("/^(?=.*[0-9])(?=.*[A-Z])\w{8,18}$/",$dkypass)){$check=false;$matkhauErr="Mật khẩu tối thiểu 8 ký tự bao gồm ký tự số và ký tự in hoa !";}
                }
                if(empty(trim($dkyemail))){$check=false; $emailErr="Vui lòng không bỏ trống !";}
                else{
                    if(!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]+$/",$dkyemail)){$check=false;$emailErr="Email không đúng định dạng !";}
                }
                if($check) {
                    insert_tk("",$dkyuser,$dkypass,$dkyemail,"","",0);
                echo '<script>
                        alert("Bạn đã đăng ký tài khoản thành công !");
                        window.location.href="?act=dangnhap";
                    </script>';
                }
            }
            include "../view/taikhoan/dangky.php";
            break;
        case 'dangnhap':
            $tkErr="";
            if(isset($_POST['dangnhap'])){
                $user=$_POST['username'];
                $pass=$_POST['password'];
                $checkuser=checkuser($user,$pass);
                if(is_array($checkuser)){
                    if($checkuser['matkhau']!=$pass||$checkuser['tendangnhap']!=$user){
                        $tkErr="Tài khoản không tồn tại. Vui lòng kiểm tra lại hoặc đăng ký !";
                        session_unset();
                    }else{
                        $_SESSION['user']=$checkuser;
                        header("location: ?act=trangchu");
                    }
                    
                }else{
                    $tkErr="Tài khoản không tồn tại. Vui lòng kiểm tra lại hoặc đăng ký !";
                }
            }
            include "../view/taikhoan/dangnhap.php";
            break;
        case 'thongtintk':
            $tendangnhapErr="";
            $emailErr="";
            $sodienthoaiErr="";
            if(isset($_POST['luu'])){
                $id=$_POST['id'];
                $tendangnhap=$_POST['tendangnhap'];
                $matkhau=$_POST['matkhau'];
                $hovaten=$_POST['hovaten'];
                $sodienthoai=$_POST['sodienthoai'];
                $email=$_POST['email'];
                $diachi=$_POST['diachi'];
                $role=$_POST['role'];
                $check=true;

                if(empty(trim($tendangnhap))){$check=false; $tendangnhapErr="Vui lòng không bỏ trống !";} 
                else{
                    if(!preg_match("/^\w{6,16}$/",$tendangnhap)){$check=false;$tendangnhapErr="Tên đăng nhập tối thiểu 6 ký tự !";}
                }
                if(empty($sodienthoai)) $sodienthoai="";
                else {if(!preg_match("/^0[1-9]\d{8}$/",$sodienthoai)){$check=false;$sodienthoaiErr="Số điện thoại không đúng định dạng !";}}
                if($check){
                    update_tk($id,$hovaten,$tendangnhap,$matkhau,$email,$sodienthoai,$diachi,$role);
                    $_SESSION['user']=checkuser($tendangnhap,$matkhau);
                    echo '<script>
                        alert("Bạn đã sửa tài khoản thành công !");
                        window.location.href="?act=thongtintk";
                    </script>';
                }
                

            }
            include "../view/taikhoan/thongtintk.php";
            break;
        case 'dangxuat':
            session_unset();
            header('location: ?act=trangchu');
            break;
        case 'quenmatkhau':
            $thongbao="";
            if(isset($_POST['quenmatkhau'])){
                $email=$_POST['email'];
                $checkemail=checkemail($email);
                if(is_array($checkemail)){
                    $thongbao="Mật khẩu của bạn là: ".$checkemail['matkhau'];
                }else{
                    $thongbao="Email này không tồn tại !";
                }
            }
            include "../view/taikhoan/quenmatkhau.php";
            break;
        /* End tai khoan */
        case 'giohang':
            include "../view/cart/giohang.php";
            break;
        case 'themgiohang':
            if(isset($_SESSION['user'])){
                if (isset($_POST['themgiohang'])) {
                    $idsanpham = $_POST['id'];
                    $giasp = $_POST['giasp'];
                    $soluong = 1;
                    $thanhtien = $giasp * $soluong;
                    $check = true;
                    foreach ($listgh as $giohang) {
                        if ($idsanpham == $giohang['idsanpham']) {
                            $giohang['soluong'] += $soluong;
                            $giohang['thanhtien'] = $giasp * $giohang['soluong'];
                            update_giohang($giohang['soluong'],$giohang['thanhtien'],$giohang['idsanpham']);
                            $check = false;
                            break;
                        }
                    }
                
                    if ($check) {
                        insert_cart($_SESSION['user']['id'], $idsanpham, $soluong, $thanhtien);
                    }
                    header('location: ?act=giohang');
                }
            }else{header('location: ?act=dangnhap');}
            include "../view/cart/giohang.php";
            break;
        case 'xoagiohang':
            if(isset($_GET['id'])){
                delete_giohang($_GET['id']);
            }else{
                delete_giohang(0);
            }
            header ('location: ?act=giohang');
            break;
        case 'tieptucdathang':
            include "../view/cart/thongtindathang.php";
            break;
        /* END GIO HANG */
        case 'sanpham':
            if(isset($_GET['id'])&&($_GET['id']!="")){
                $list_sp_home=load_all_spdm($_GET['id']);
            }else{
                $list_sp_home=load_all_sp("");
            }
            include "../view/sanpham/sanpham.php";
            break;
        case 'sanphamdm':
            include "../view/sanpham/sanphamdanhmuc.php";
            break;
        case 'chitietsp':
            if (isset($_GET['id'])&& ($_GET['id']!="")){
                $id = $_GET['id'];
                $sanpham = load_one_sp($id);
                if($sanpham){
                    $splq = load_sp_lq($sanpham['iddm']);
                }
                $danhmuc = load_one_dm($sanpham['iddm']);
            }
            include "../view/sanpham/chitietsp.php";
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