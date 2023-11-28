<footer class="footer-area">
            <div class="bg-gray-2">
                <div class="container">
                    <div class="footer-top pt-80 pb-35">
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                <div class="footer-widget footer-about mb-40">
                                    <div class="footer-logo">
                                        <a href="../assets/giao_dien_home/index.html"><img src="../assets/images/logo.png" alt="logo"></a>
                                    </div>
                                    <p>Đã bán là không lom dom</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                <div class="footer-widget footer-widget-margin-1 footer-list mb-40">
                                    <h3 class="footer-title">Thông tin</h3>
                                    <ul>
                                        <li><a href="#">Tin tức</a></li>
                                        <li><a href="#">Giới thiệu</a></li>
                                        <li><a href="#">Bảo hành</a></li>
                                        <li><a href="#">Đánh giá chất lượng</a></li>
                                        <li><a href="#">Phương thức thanh toán</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                                <div class="footer-widget footer-list mb-40">
                                    <h3 class="footer-title">Chính sách</h3>
                                    <ul>
                                        <li><a href="#">Thu cũ đổi mới</a></li>
                                        <li><a href="#">Giao hàng</a></li>
                                        <li><a href="#">Đổi trả</a></li>
                                        <li><a href="#">Bảo hành</a></li>
                                        <li><a href="#">Bảo mật thông tin</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="footer-widget footer-widget-margin-2 footer-address mb-40">
                                    <h3 class="footer-title">Địa chỉ liên hệ</h3>
                                    <ul>
                                        <li><span>Địa chỉ: </span>FPT Polytechnic</li>
                                        <li><span>Liên hệ:</span> (012) 345 6789</li>
                                        <li><span>Email: </span>dinhcuongmobile@.com</li>
                                    </ul>
                                    <div class="open-time">
                                        <p>Giờ mở cửa : <span>8:00 AM</span> <br> Giờ đóng cửa : <span>20:00 PM</span></p>
                                        <p>Thứ bảy - Chủ nhật : Đóng cửa</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Product Modal end -->
    </div>
    <!-- All JS is here -->
    <script src="../assets/giao_dien_home/assets/js/vendor/modernizr-3.11.7.min.js"></script>
    <script src="../assets/giao_dien_home/assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="../assets/giao_dien_home/assets/js/vendor/jquery-migrate-3.3.2.min.js"></script>
    <script src="../assets/giao_dien_home/assets/js/vendor/popper.min.js"></script>
    <script src="../assets/giao_dien_home/assets/js/vendor/bootstrap.min.js"></script>
    <script src="../assets/giao_dien_home/assets/js/plugins/wow.js"></script>
    <script src="../assets/giao_dien_home/assets/js/plugins/scrollup.js"></script>
    <script src="../assets/giao_dien_home/assets/js/plugins/aos.js"></script>
    <script src="../assets/giao_dien_home/assets/js/plugins/magnific-popup.js"></script>
    <script src="../assets/giao_dien_home/assets/js/plugins/jquery.syotimer.min.js"></script>
    <script src="../assets/giao_dien_home/assets/js/plugins/swiper.min.js"></script>
    <script src="../assets/giao_dien_home/assets/js/plugins/imagesloaded.pkgd.min.js"></script>
    <script src="../assets/giao_dien_home/assets/js/plugins/isotope.pkgd.min.js"></script>
    <script src="../assets/giao_dien_home/assets/js/plugins/jquery-ui.js"></script>
    <script src="../assets/giao_dien_home/assets/js/plugins/jquery-ui-touch-punch.js"></script>
    <script src="../assets/giao_dien_home/assets/js/plugins/jquery.nice-select.min.js"></script>
    <script src="../assets/giao_dien_home/assets/js/plugins/waypoints.min.js"></script>
    <script src="../assets/giao_dien_home/assets/js/plugins/jquery.counterup.js"></script>
    <script src="../assets/giao_dien_home/assets/js/plugins/select2.min.js"></script>
    <script src="../assets/giao_dien_home/assets/js/plugins/easyzoom.js"></script>
    <script src="../assets/giao_dien_home/assets/js/plugins/slinky.min.js"></script>
    <script src="../assets/giao_dien_home/assets/js/plugins/ajax-mail.js"></script>
    <!--SLIDER RANGER-->
    <script>
        $(".giaspdau").val(1000);
        $(".giaspcuoi").val(100000000);
        $(function() {
            $('#slider-range').slider({
                min: <?=$spmin['giaspmin']?>,
                max: <?=$spmax['giaspmax']?>,
                values: [<?= isset($giadau) ? ($giadau) : $spmin['giaspmin'] ?>, <?= isset($_POST['giaspcuoi']) ? ($_POST['giaspcuoi']) : ($spmax['giaspmax']/2) ?>],
                slide: function(event, ui) {
                    $('#amount').val("đ" + addPlus(ui.values[0]) + " - đ" + addPlus(ui.values[1]));
                    $(".giaspdau").val(ui.values[0]);
                    $(".giaspcuoi").val(ui.values[1]);
                }
            });
            $('#amount').val("đ" + addPlus($('#slider-range').slider("values", 0)) +
                " - đ" + addPlus($('#slider-range').slider("values", 1)));
        }); 
        function addPlus(nStr){
            nStr+='';
            x=nStr.split('.');
            x1=x[0];
            x2= x.length > 1 ? '.' + x[1] : '';
            var rgx=/(\d+)(\d{3})/;
            while(rgx.test(x1)){
                x1 = x1.replace(rgx, '$1' + '.' + '$2');

            }
            return x1 + x2;
        }
    </script>
    <!-- Main JS -->
    <script src="../assets/giao_dien_home/assets/js/main.js"></script>
    <script src="../assets/js/cuong.js"></script>
</body>


<!-- Mirrored from htmldemo.net/urdan/urdan/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Nov 2023 10:10:57 GMT -->
</html>