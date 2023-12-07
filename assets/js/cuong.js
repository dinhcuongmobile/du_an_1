//admin
var checkboxs=document.querySelectorAll('input[type="checkbox"]');
function chontatca(){
    checkboxs.forEach(function(checkbox){
        checkbox.checked=true;
    })
}
function bochontatca(){
    checkboxs.forEach(function(checkbox){
        checkbox.checked=false;
    })
}
//home

//giohang quantity\
    function giohang1(){
        
    }
//end giohang quantity

$(document).ready(function(){
    $(".an").hide();
    $("#tap1").fadeIn();
    $(".nav-tab li").click(function(){
        //active nav tabs
        $(".nav-tab li").removeClass("active");
        $(this).addClass("active");

        //Show tap
        let idtap= $(this).children('a').attr('href');
        $(".an").hide();
        $(idtap).fadeIn();
        return false;
    });
});

//ajax binh luan
function binhluanjs(id,hovaten){
    var noidung=$("#noidung").val();
    var ngaybinhluan=$("#ngaybinhluan").val();
    $.ajax({
        type: 'POST',
        url: 'index.php?act=chitietsp&id='+id+'',
        data: {
            noidung: noidung
        },
        success: function(response) {
            var soluongcu = parseInt($("#countbl").text());
            var soluongmoi = soluongcu + 1;
            $("#countbl").text(soluongmoi);
            $('#loadbinhluan').append('<div id="loadbinhluan" class="single-review"><div class="review-img"><img src="../assets/images/userbl.png" alt=""></div><div class="review-content"><h5><span>' + hovaten + '</span> - '+ ngaybinhluan + '</h5><p>'+ noidung + '</p></div></div>');
            $('#noidung').val('');
          },
          error: function(error) {
            console.error('Lỗi: ', error);
            alert('Có lỗi xảy ra khi gửi bình luận');
          }
    });
}
//end ajax binh luan

//ajax them gio hang
function themgiohang(idsanpham,giakm){
    $.ajax({
        type: 'POST',
        url: '../view/cart/ajaxthemgiohang.php',
        data: {
            id: idsanpham,
            giasp: giakm
        },
        dataType: "JSON",
        success: function(response){
            var check=true;
            response.forEach(element => {
                if(idsanpham==element['idsanpham']){
                    check=false;
                }
            }); 
            if(check){
                var soluongcu = parseInt($("#countgh").text());
                var soluongmoi = soluongcu + 1;
                $("#countgh").text(soluongmoi);
            }
        },
        error: function(error) {
            window.location.href="../../du_an_1/controller/index.php?act=dangnhap";
          }
    });
}
//end ajax them gio hang
//bieudo
//end bieudo
$(".phantrang ul li a").click(function(){
    // alert("okk");
    //active nav tabs
    $(".phantrang ul li a").removeClass("active");
    $(this).addClass("active");
});