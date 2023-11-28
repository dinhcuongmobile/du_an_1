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

//ajax them gio hang
// function themgiohang(idsanpham,giakm){
//     $.ajax({
//         type: 'POST',
//         url: '?act=themgiohang',
//         data: {
//             id: idsanpham,
//             giasp: giakm
//         },
//         success: function(response){
//             $("#countgh").innerText=response;
//         },
//         error: function(error){
//             console.log(error);
//         }
//     });
// }