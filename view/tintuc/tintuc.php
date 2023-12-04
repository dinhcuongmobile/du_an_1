<div class="blog-area pt-100 pb-100">
            <div class="container">
                <div class="row">
                    <?php
                        $delay=200;
                        foreach ($listtintuc as $tintuc) {
                            extract($tintuc);
                            if(strlen($tieude)>50) $tieude=substr($tieude,0,50);
                            if(strlen($noidung)>150) $noidung=substr($noidung,0,150)."...";
                            echo '<div class="col-lg-4 col-md-6">
                                    <div class="blog-wrap mb-50" data-aos="fade-up" data-aos-delay="'.$delay.'">
                                        <div class="blog-img-date-wrap mb-25">
                                            <div class="blog-img">
                                                <a href="blog-details.html"><img src="../uploads/tintuc/'.$image.'" alt=""></a>
                                            </div>
                                            <div class="blog-date">
                                                <h5>'.$ngaydang.'</h5>
                                            </div>
                                        </div>
                                        <div class="blog-content">
                                            <div class="blog-meta">
                                                <ul>
                                                    <li><a href="#">Furniture</a>,</li>
                                                    <li>By:<a href="#"> '.$hovaten.'</a></li>
                                                </ul>
                                            </div>
                                            <h3><a href="blog-details.html">'.$tieude.'</a></h3>
                                            <p>'.$noidung.'</p>
                                            <div class="blog-btn-2 btn-hover">
                                                <a class="btn hover-border-radius theme-color" href="blog-details.html">Xem thêm</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                                $delay+=200;
                        }
                    ?>
                </div>
                <div class="pagination-style-1" data-aos="fade-up" data-aos-delay="200">
                    <ul>
                        <li><a class="active" href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a class="next" href="#"><i class=" ti-angle-double-right "></i></a></li>
                    </ul>
                </div>
            </div>
        </div>