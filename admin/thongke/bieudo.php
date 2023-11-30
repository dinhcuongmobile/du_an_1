<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800 mb-5">Thống kê doanh thu theo: 365 ngày trước</h1>
    <div id="chart" style="height: 250px;"></div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script>
    new Morris.Area({

    element: 'chart',

    data: [
        <?php
            foreach ($listthongke as $thongke) {
                extract($thongke);
                echo '{ date: "'.$ngaydat.'", donhang: '.$donhang.', doanhthu: '.$doanhthu.', soluongban: '.$soluongban.' },';
            }    
        ?>
    ],

    xkey: 'date',

    ykeys: ['donhang','doanhthu','soluongban'],

    labels: ['Đơn hàng','Doanh thu','Số lượng bán']
    });
</script>
