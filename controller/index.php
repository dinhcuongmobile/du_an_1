<?php
ob_start();
session_start();
include "../model/pdo.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "../model/taikhoan.php";
include "../model/binhluan.php";
include "../model/donhang.php";
include "../model/khac.php";
if(isset($_SESSION['user'])) {
    $listgh=load_all_giohang($_SESSION['user']['id']); 
    $countgh=count_giohang($_SESSION['user']['id']);
    $minicart=load_minicart($_SESSION['user']['id']);
}
$list_sp_home=load_sp_home();
$list_sp_nb=load_sp_nb();
$listdm=load_all_dm("");
$listtintuchome=load_tintuc_home2();
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
                $listtk=load_all_tk(0,"");
                $check=true;
                if(empty(trim($hovaten))){$hovatenErr="";} 
                else{
                    if(!preg_match("/^[a-zA-Z \p{L}\p{Mn}]{6,}$/u",$hovaten)){$check=false;$hovatenErr="Họ và tên tối thiểu 6 ký tự và không bao gồm chữ số!";}
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
                    else{
                        foreach ($listtk as $tk) {
                            if($dkyemail==$tk['email']){$check=false; $emailErr="Email đã tồn tại !";}
                        }
                    }
                }
                if($check) {
                    insert_tk($hovaten,$dkyuser,$dkypass,$dkyemail,"","",0);
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
            $tendangnhapErr="";
            if(isset($_POST['dangnhap'])){
                $user=$_POST['username'];
                $pass=$_POST['password'];
                $check=true;
                if(empty(trim($user))){$check=false; $tendangnhapErr="Vui lòng không để trống !";}
                else{
                    if(!preg_match("/^\w{6,16}$/",$user)){$check=false;$tendangnhapErr="Tên đăng nhập tối thiểu 6 ký tự !";}
                }
                if(empty(trim($pass))){$check=false; $tkErr="Vui lòng không để trống !";}
                else{
                    if(!preg_match("/^(?=.*[0-9])(?=.*[A-Z])\w{8,18}$/",$pass)){$check=false;$tkErr="Mật khẩu tối thiểu 8 ký tự bao gồm ký tự số và ký tự in hoa !";}
                }
                if($check){
                    $checkuser=checkuser($user,$pass);
                    if(is_array($checkuser)){
                        if($checkuser['matkhau']!=$pass||$checkuser['tendangnhap']!=$user){
                            $tkErr="Sai mật khẩu hoặc tên đăng nhập. Vui lòng kiểm tra lại !";
                        }else{
                            $_SESSION['user']=$checkuser;
                            header("location: ?act=trangchu");
                        }
                        
                    }else{
                        $tkErr="Tài khoản không tồn tại. Vui lòng kiểm tra lại hoặc đăng ký !";
                    }
                }
            }
            include "../view/taikhoan/dangnhap.php";
            break;
        case 'thongtintk':
            if(isset($_SESSION['user'])){
                $tendangnhapErr="";
                $emailErr="";
                $sodienthoaiErr="";
                $hovatenErr="";
                $diachiErr="";
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
                    if(empty(trim($hovaten))){$hovatenErr="";} 
                    else{
                        if(!preg_match("/^[a-zA-Z \p{L}\p{Mn}]{6,}$/u",$hovaten)){$check=false;$hovatenErr="Họ và tên tối thiểu 6 ký tự và không bao gồm chữ số!";}
                    }
                    if(empty(trim($tendangnhap))){$check=false; $tendangnhapErr="Vui lòng không bỏ trống !";} 
                    else{
                        if(!preg_match("/^\w{6,16}$/",$tendangnhap)){$check=false;$tendangnhapErr="Tên đăng nhập tối thiểu 6 ký tự !";}
                    }
                    if(empty($sodienthoai)) $sodienthoai="";
                    else {if(!preg_match("/^0[1-9]\d{8}$/",$sodienthoai)){$check=false;$sodienthoaiErr="Số điện thoại không đúng định dạng !";}}
                    if(empty(trim($diachi))){$diachiErr="";} 
                    else{
                        if(!preg_match("/^[a-zA-Z0-9  ,\p{L}\p{Mn}]{25,}$/u",$diachi)){$check=false;$diachiErr="Kiểm tra lại địa chỉ !";}
                    }
                    if($check){
                        update_tk($id,$hovaten,$tendangnhap,$matkhau,$email,$sodienthoai,$diachi,$role);
                        $_SESSION['user']=checkuser($tendangnhap,$matkhau);
                        echo '<script>
                            alert("Bạn đã sửa tài khoản thành công !");
                            window.location.href="?act=thongtintk";
                        </script>';
                    }
                    
    
                }
            }else{header("location: ?act=trangchu");}
            include "../view/taikhoan/thongtintk.php";
            break;
        case 'dangxuat':
            session_unset();
            header('location: ?act=trangchu');
            break;
        case 'quenmatkhau':
            $thongbao="";
            if(isset($_SESSION['user'])){
                if(isset($_POST['quenmatkhau'])){
                    $email=$_POST['email'];
                    $tendangnhap=$_POST['tendangnhap'];
                    $tk=load_one_tk($_SESSION['user']['id']);
                    if($email===$tk['email']&&($tendangnhap===$tk['tendangnhap'])){
                        $thongbao="Mật khẩu của bạn là: ".$tk['matkhau'];
                    }else{
                        $thongbao="thông tin không chính xác !";
                    }
                }
            }else{
                if(isset($_POST['quenmatkhau'])){
                    $emailcheck=$_POST['email'];
                    $tendangnhapcheck=$_POST['tendangnhap'];
                    $tk=quenmatkhau($emailcheck,$tendangnhapcheck);
                    if($tk){
                        $thongbao="Mật khẩu của bạn là: ".$tk['matkhau'];
                    }else{
                        $thongbao="thông tin không chính xác !";
                    }
                    
                }
            }
            include "../view/taikhoan/quenmatkhau.php";
            break;
        case 'doimatkhau':
            if(isset($_SESSION['user'])){
                $matkhaucuErr="";
                $matkhaumoiErr="";
                $nhaplaimatkhaumoiErr="";
                if(isset($_POST['doimatkhau'])){
                    $matkhaucu=$_POST['matkhaucu'];
                    $matkhaumoi=$_POST['matkhaumoi'];
                    $nhaplaimatkhaumoi=$_POST['nhaplaimatkhaumoi'];
                    $check=true;
                    if(empty(trim($matkhaucu))){$check=false; $matkhaucuErr="Vui lòng không bỏ trống !";}
                    $tk=load_one_tk($_SESSION['user']['id']);
                    if($tk){
                        if($matkhaucu!==$tk['matkhau']){$check=false; $matkhaucuErr="Mật khẩu không chính xác !";}
                    }
                    if(empty(trim($matkhaumoi))){$check=false; $matkhaumoiErr="Vui lòng không bỏ trống !";}
                    else{
                        if(!preg_match("/^(?=.*[0-9])(?=.*[A-Z])\w{8,18}$/",$matkhaumoi)){$check=false;$matkhaumoiErr="Mật khẩu tối thiểu 8 ký tự bao gồm ký tự số và ký tự in hoa !";}
                    }
                    if($nhaplaimatkhaumoi!==$matkhaumoi){$check=false;  $nhaplaimatkhaumoiErr="Mật khẩu không trùng khớp !";}
                    if($check){
                        if($tk){update_mk($matkhaumoi,$tk['id']); $nhaplaimatkhaumoiErr="Chúc mừng bạn đã đổi mật khẩu thành công !";}
                    }
                }
            }else{header("location: ?act=trangchu");}
            include "../view/taikhoan/doimatkhau.php";
            break;
        /* End tai khoan */
        case 'giohang':
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $id=$_POST['id'];
                $thanhtien=$_POST['thanhtien'];
                $soluong=$_POST['soluong'];
                update_giohang($soluong,$thanhtien,$id);
            }
            include "../view/cart/giohang.php";
            break;
        case 'xoagiohang':
            if(isset($_GET['id'])){
                delete_giohang($_GET['id'],0);
            }else{
                delete_giohang(0,0);
            }
            header ('location: ?act=giohang');
            break;
        case 'tieptucdathang':
            if(isset($_SESSION['user'])){
                if(isset($_POST['dathang'])){
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $ngaydathang = date('Y-m-d H:i:s');
                    $phuongthuctt=$_POST['phuongthuctt'];
                    if($_POST['phuongthuctt']==0){
                        $thanhtoan=0;
                        if(isset($_POST['diachikhac'])){
                            $hovatennhan=$_POST['hovatennhan'];
                            $diachinhan=$_POST['diachinhan'];
                            $sodienthoainhan=$_POST['sodienthoainhan'];
                            $checkdck=true;
                            if(empty(trim($hovatennhan))){$checkdck=false; $hovatennhanErr="Vui lòng không bỏ trống !";} 
                            else{
                                if(!preg_match("/^[a-zA-Z \p{L}\p{Mn}]{6,}$/u",$hovatennhan)){$checkdck=false;$hovatennhanErr="Họ và tên tối thiểu 6 ký tự và không bao gồm chữ số!";}
                            }
                            if(empty(trim($sodienthoainhan))) {$checkdck=false; $sodienthoainhanErr="Vui lòng không bỏ trống !";} 
                            else {
                                if(!preg_match("/^0[1-9]\d{8}$/",$sodienthoainhan)){$checkdck=false;$sodienthoainhanErr="Số điện thoại không đúng định dạng !";}
                            }
                            if(empty(trim($diachinhan))){$checkdck=false; $diachinhanErr="Vui lòng không bỏ trống !";} 
                            else{
                                if(!preg_match("/^[a-zA-Z0-9  ,\p{L}\p{Mn}]{25,}$/u",$diachinhan)){$checkdck=false;$diachinhanErr="Kiểm tra lại địa chỉ !";}
                            }
                            if($checkdck){
                                $iddonhang=mua_hang($_SESSION['user']['id'],$hovatennhan,$ngaydathang,$diachinhan,$sodienthoainhan,$phuongthuctt,$thanhtoan);
                                foreach ($listgh as $gh) {
                                    extract($gh);
                                    insert_chitietdonhang($iddonhang,$idsp,$soluong,$giakm,$thanhtien);
                                    $soluongsp=$soluongsp-$soluong;
                                    update_sl_sp($idsp,$soluongsp);
                                }
                                delete_giohang(0,$_SESSION['user']['id']);
                                echo '<script>
                                            alert("Bạn đã mua hàng thành công !");
                                            window.location.href="?act=lichsumuahang";
                                        </script>';
                            }else  {
                                echo '<script>
                                    alert("Vui lòng nhập đầy đủ và chính xác thông tin nhận hàng !");
                                </script>';
                            }
                        }else{
                            $hovaten=$_POST['hovaten'];
                            $sodienthoai=$_POST['sodienthoai'];
                            $diachi=$_POST['diachi'];
                            $check=true;
                            if(empty(trim($hovaten))){$check=false; $hovatenErr="Vui lòng không bỏ trống !";} 
                            else{
                                if(!preg_match("/^[a-zA-Z \p{L}\p{Mn}]{6,}$/u",$hovaten)){$check=false;$hovatenErr="Họ và tên tối thiểu 6 ký tự và không bao gồm chữ số!";}
                            }
                            if(empty(trim($sodienthoai))) {$check=false; $sodienthoaiErr="Vui lòng không bỏ trống !";} 
                            else {
                                if(!preg_match("/^0[1-9]\d{8}$/",$sodienthoai)){$check=false;$sodienthoaiErr="Số điện thoại không đúng định dạng !";}
                            }
                            if(empty(trim($diachi))){$check=false; $diachiErr="Vui lòng không bỏ trống !";} 
                            else{
                                if(!preg_match("/^[a-zA-Z0-9  ,\p{L}\p{Mn}]{25,}$/u",$diachi)){$check=false;$diachiErr="Kiểm tra lại địa chỉ !";}
                            }
                            if($check){
                                $iddonhang=mua_hang($_SESSION['user']['id'],$hovaten,$ngaydathang,$diachi,$sodienthoai,$phuongthuctt,$thanhtoan);
                                foreach ($listgh as $gh) {
                                    extract($gh);
                                    insert_chitietdonhang($iddonhang,$idsp,$soluong,$giakm,$thanhtien);
                                    $soluongsp=$soluongsp-$soluong;
                                    update_sl_sp($idsp,$soluongsp);
                                }
                                delete_giohang(0,$_SESSION['user']['id']);
                                echo '<script>
                                            alert("Bạn đã mua hàng thành công !");
                                            window.location.href="?act=lichsumuahang";
                                        </script>';
                            }
                        }
                    }
                    else{
                        $thanhtoan=1;
                        if(isset($_POST['diachikhac'])){
                            $hovatennhan=$_POST['hovatennhan'];
                            $diachinhan=$_POST['diachinhan'];
                            $sodienthoainhan=$_POST['sodienthoainhan'];
                            $checkdck=true;
                            if(empty(trim($hovatennhan))){$checkdck=false; $hovatennhanErr="Vui lòng không bỏ trống !";} 
                            else{
                                if(!preg_match("/^[a-zA-Z \p{L}\p{Mn}]{6,}$/u",$hovatennhan)){$checkdck=false;$hovatennhanErr="Họ và tên tối thiểu 6 ký tự và không bao gồm chữ số!";}
                            }
                            if(empty(trim($sodienthoainhan))) {$checkdck=false; $sodienthoainhanErr="Vui lòng không bỏ trống !";} 
                            else {
                                if(!preg_match("/^0[1-9]\d{8}$/",$sodienthoainhan)){$checkdck=false;$sodienthoainhanErr="Số điện thoại không đúng định dạng !";}
                            }
                            if(empty(trim($diachinhan))){$checkdck=false; $diachinhanErr="Vui lòng không bỏ trống !";} 
                            else{
                                if(!preg_match("/^[a-zA-Z0-9  ,\p{L}\p{Mn}]{25,}$/u",$diachinhan)){$checkdck=false;$diachinhanErr="Kiểm tra lại địa chỉ !";}
                            }
                            if($checkdck){
                                $_SESSION['thongtin_dathang'] = array(
                                    'hovatennhan' => $_POST['hovatennhan'],
                                    'sodienthoainhan' => $_POST['sodienthoainhan'],
                                    'diachinhan' => $_POST['diachinhan']
                                );
                                header("location: ?act=chuyenkhoanvnp");
                            }else  {
                                echo '<script>
                                    alert("Vui lòng nhập đầy đủ và chính xác thông tin nhận hàng !");
                                </script>';
                            }
                        }else{
                            $hovaten=$_POST['hovaten'];
                            $sodienthoai=$_POST['sodienthoai'];
                            $diachi=$_POST['diachi'];
                            $check=true;
                            if(empty(trim($hovaten))){$check=false; $hovatenErr="Vui lòng không bỏ trống !";} 
                            else{
                                if(!preg_match("/^[a-zA-Z \p{L}\p{Mn}]{6,}$/u",$hovaten)){$check=false;$hovatenErr="Họ và tên tối thiểu 6 ký tự và không bao gồm chữ số!";}
                            }
                            if(empty(trim($sodienthoai))) {$check=false; $sodienthoaiErr="Vui lòng không bỏ trống !";} 
                            else {
                                if(!preg_match("/^0[1-9]\d{8}$/",$sodienthoai)){$check=false;$sodienthoaiErr="Số điện thoại không đúng định dạng !";}
                            }
                            if(empty(trim($diachi))){$check=false; $diachiErr="Vui lòng không bỏ trống !";} 
                            else{
                                if(!preg_match("/^[a-zA-Z0-9  ,\p{L}\p{Mn}]{25,}$/u",$diachi)){$check=false;$diachiErr="Kiểm tra lại địa chỉ !";}
                            }
                            if($check){
                                $_SESSION['thongtin_dathang'] = array(
                                    'hovatennhan' => $_POST['hovaten'],
                                    'sodienthoainhan' => $_POST['sodienthoai'],
                                    'diachinhan' => $_POST['diachi']
                                );
                                header("location: ?act=chuyenkhoanvnp");
                            }else  {
                                echo '<script>
                                    alert("Vui lòng nhập đầy đủ và chính xác thông tin nhận hàng !");
                                </script>';
                            }
                        }
                    }
                    
                    
                }
            }else{header("location: ?act=trangchu");}
            include "../view/cart/dongydathang.php";
            break;
        case "lichsumuahang":
            if(isset($_SESSION['user'])){
                $idtaikhoan=$_SESSION['user']['id'];
                $tatca=load_all_dh_lsmh($idtaikhoan,1);
                $choxacnhan=load_all_dh_lsmh($idtaikhoan,0);
                $chogiaohang=load_all_dh_lsmh($idtaikhoan,2);
                $danggiao=load_all_dh_lsmh($idtaikhoan,3);
                $hoanthanh=load_all_dh_lsmh($idtaikhoan,4);
                $dahuy=load_all_dh_lsmh($idtaikhoan,5);
                if(isset($_POST['mualai'])){
                    if(isset($_POST['id'])&&(is_array($_POST['id']))){
                        foreach ($_POST['id'] as $item) {
                            $sanpham=load_one_sp($item);
                            if($sanpham){
                                $idsanpham = $sanpham['id'];
                                $giasp = $sanpham['giakm'];
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
                            }
                        }
                        header("location: ?act=giohang");
                    }
                }
            }else{header("location: ?act=trangchu");}
            include "../view/cart/lichsumuahang.php";
            break;
        case "huydonhang":
            if(isset($_SESSION['user'])){
                if(isset($_GET['id'])&&($_GET['id']!="")){
                    $id=$_GET['id'];
                    $listdh=load_one_dh($id);
                    if($listdh){
                        update_donhang(5,$listdh['id']);
                        $listctdh=load_all_ctdh_lsmh($listdh['id']);
                        foreach ($listctdh as $ct) {
                            $sp=load_one_sp($ct['idsp']);
                            if($sp['id']==$ct['idsp']){
                                print_r($sp);
                                $sp['soluong']+=$ct['soluong'];
                                update_sl_sp($sp['id'],$sp['soluong']);
                            }
                        }
                        header("location: ?act=lichsumuahang");
                    }     
                }
            }else{header("location: ?act=trangchu");}
            
            break;
        /* END GIO HANG */
        case 'sanpham':
            if(isset($_POST['submittimkiem'])) $kyw=$_POST['timkiem'];
            else $kyw="";
            if(isset($_POST['submitlocgia'])){
                $giadau=$_POST['giaspdau'];
                $giacuoi=$_POST['giaspcuoi'];
            }else{
                $giadau=0;
                $giacuoi=0;
            }
            $list_sp_home=load_all_spdm(0,$kyw,$giadau,$giacuoi);
            include "../view/sanpham/sanpham.php";
            break;
        case 'spdanhmuc':
            if(isset($_GET['id'])&&($_GET['id']!="")){
                if(isset($_POST['submittimkiem'])) $kyw=$_POST['timkiem'];
                else $kyw="";
                if(isset($_POST['submitlocgia'])){
                    $giadau=$_POST['giaspdau'];
                    $giacuoi=$_POST['giaspcuoi'];
                }else{
                    $giadau=0;
                    $giacuoi=0;
                }
                $list_sp_dm=load_all_spdm($_GET['id'],$kyw,$giadau,$giacuoi);
                $sp=load_one_spdm($_GET['id']);
            }
            include "../view/sanpham/spdanhmuc.php";
            break;
        case 'chitietsp':
            if (isset($_GET['id'])&& ($_GET['id']!="")){
                $id = $_GET['id'];
                $sanpham = load_one_sp($id);
                if($sanpham){
                    $luotxem=$sanpham['luotxem']+1;
                    update_luotxem_sp($sanpham['id'],$luotxem);
                    $noidungErr="";
                    if($_SERVER["REQUEST_METHOD"] == "POST"){
                        $noidung=$_POST['noidung'];
                        $ngaybinhluan=date('Y-m-d');
                        if(empty(trim($noidung))){
                            $noidungErr="Vui lòng nhập nội dung bình luận trước khi gửi !";
                        }else{
                            insert_bl($_SESSION['user']['id'],$sanpham['id'],$noidung,$ngaybinhluan);
                        }
                    }
                    $splq = load_sp_lq($sanpham['iddm']);
                    $listbl=load_bl_sp($sanpham['id']);
                    $danhmuc = load_one_dm($sanpham['iddm']);
                    $dembl=dem_bl_sp($sanpham['id']);
                    if(isset($_POST['datngayct'])){
                        if(isset($_SESSION['user'])){
                            $soluong = 1;
                            $thanhtien = $sanpham['giakm'] * $soluong;
                            $check = true;
                            foreach ($listgh as $giohang) {
                                if ($sanpham['id'] == $giohang['idsanpham']) {
                                    $giohang['soluong'] += $soluong;
                                    $giohang['thanhtien'] = $sanpham['giakm'] * $giohang['soluong'];
                                    update_giohang($giohang['soluong'],$giohang['thanhtien'],$giohang['idsanpham']);
                                    $check = false;
                                    header("location: ?act=giohang");
                                    break;
                                    }
                                }
                                if ($check) {
                                    insert_cart($_SESSION['user']['id'], $sanpham['id'], $soluong, $thanhtien);
                                    header("location: ?act=giohang");
                                }
                        }else{
                            header("location: ?act=dangnhap");
                        }
                    }
                }

            }
            include "../view/sanpham/chitietsp.php";
            break;
        case "tintuc":
            $listtintuc=load_tintuc_home();
            include "../view/tintuc/tintuc.php";
            break;
        case "chuyenkhoanvnp":
            header("location: ../assets/vnpay_php/vnpay_pay.php");
            break;
        case "thanhtoanonline":
            if(isset($_POST['tieptuc'])){
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $ngaydathang = date('Y-m-d H:i:s');
                $thongtindathang=$_SESSION['thongtin_dathang'];
                $iddonhang=mua_hang($_SESSION['user']['id'],$thongtindathang['hovatennhan'],$ngaydathang,$thongtindathang['diachinhan'],$thongtindathang['sodienthoainhan'],1,1);
                foreach ($listgh as $gh) {
                    extract($gh);
                    insert_chitietdonhang($iddonhang,$idsp,$soluong,$giakm,$thanhtien);
                    $soluongsp=$soluongsp-$soluong;
                    update_sl_sp($idsp,$soluongsp);
                }
                delete_giohang(0,$_SESSION['user']['id']);
                unset($_SESSION['thongtin_dathang']);
                header("location: ?act=lichsumuahang");
            }
            break;
        default:
        include "../view/home.php";
            break;
    }
}else{
    include "../view/home.php";
}

$spmin=giasp_min();
$spmax=giasp_max();
include "../view/footer.php";
?>