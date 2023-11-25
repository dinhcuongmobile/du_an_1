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
                                    <div class="payment-img">
                                        <a href="#"><img src="../assets/giao_dien_home/assets/images/icon-img/payment.png" alt="logo"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                <div class="footer-widget footer-widget-margin-1 footer-list mb-40">
                                    <h3 class="footer-title">Information</h3>
                                    <ul>
                                        <li><a href="../assets/giao_dien_home/about-us.html">About Us</a></li>
                                        <li><a href="#">Delivery Information</a></li>
                                        <li><a href="#">Privacy Policy</a></li>
                                        <li><a href="#">Terms & Conditions</a></li>
                                        <li><a href="#">Customer Service</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                                <div class="footer-widget footer-list mb-40">
                                    <h3 class="footer-title">My Accound</h3>
                                    <ul>
                                        <li><a href="../assets/giao_dien_home/my-account.html">My Account</a></li>
                                        <li><a href="#">Order History</a></li>
                                        <li><a href="../assets/giao_dien_home/wishlist.html">Wish List</a></li>
                                        <li><a href="#">Newsletter</a></li>
                                        <li><a href="#">Order History</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="footer-widget footer-widget-margin-2 footer-address mb-40">
                                    <h3 class="footer-title">Get in touch</h3>
                                    <ul>
                                        <li><span>Address: </span>Your address goes here </li>
                                        <li><span>Telephone Enquiry:</span> (012) 345 6789</li>
                                        <li><span>Email: </span>demo@example.com</li>
                                    </ul>
                                    <div class="open-time">
                                        <p>Open : <span>8:00 AM</span> - Close : <span>18:00 PM</span></p>
                                        <p>Saturday - Sunday : Close</p>
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
                values: [<?=$spmin['giaspmin']?>, <?=$spmax['giaspmax']/2?>],
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
</body>


<!-- Mirrored from htmldemo.net/urdan/urdan/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Nov 2023 10:10:57 GMT -->
</html>