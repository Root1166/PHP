<?php   

    require_once __DIR__ . '/autoload/autoload.php'; 
    
    $sqlHome = "SELECT name , id FROM category WHERE home = 1 ORDER BY updated_at ";
    // print_r($sqlHome);
    $CategoryHome = $db -> fetchsql($sqlHome);
    // print_r($CategoryHome);

    
    $data = [];

    foreach( $CategoryHome as $item){
        $cateId = intval($item['id']);
       
        $sql = " SELECT * FROM product WHERE category_id = $cateId ";
      
        $Homeproduct = $db -> fetchsql($sql);
       // print_r($Homeproduct);
        $data[$item['name']] = $Homeproduct;
    }
?>
<?php   require_once __DIR__ . '/layouts/header.php'; ?>
<div class="col-md-9 bor pull-left ">
    <section id="slide" class="text-center">
        <img src="<?php echo base_url() ?>public/frontend/images/bannerPC.jpg" class="img-thumbnail">
    </section>
    <div class="blog-item">
        <article>
            <h1>Giới thiệu công ty</h1>
            <ul class="blog-meta">
                <li>
                    <i class="fa fa-clock-o"></i>08:52 CH 28/05/2016</li>

                <li>
                    <i class="fa fa-eye"></i> 4968 lượt xem</li>
                <li>
                    <i class="fa fa-comments-o"></i>0 bình luận</li>
            </ul>
            <div class="blog-content">
                <p>Công ty TNHH công nghệ giải pháp
                    <a href="http://.com.vn/tags/phan-mem">Phần mềm</a> Việt
                    <strong>&nbsp;</strong>được thành lập theo giấy phép đăng ký kinh doanh số 0105808732 do Sở kế hoạch và đầu tư
                    thành phố Hà Nội cấp, công ty chủ yếu hoạt động trong lĩnh vực:</p>

                <ul>
                </ul>

                <p>&nbsp;-&nbsp;
                    <a href="/tu-van-thiet-ke-website.html">Tư vấn và thiết kế website</a>
                </p>

                <p>&nbsp;-&nbsp;
                    <a href="/giai-phap-cong-thong-tin-thuong-mai-dien-tu.html">Thiết kế giải pháp cổng thông tin thương mại điện tử</a>
                </p>

                <p>&nbsp;-&nbsp;
                    <a href="/giai-phap-cong-thong-tin-du-lich.html">Thiết kế giải pháp cổng thông tin Du lịch</a>
                </p>

                <p>&nbsp;-&nbsp;
                    <a href="/giai-phap-chinh-phu-dien-tu-sharepoint.html">Thiết kế, tư vấn cổng thông tin chính phủ điện tử SharePoint</a>
                </p>

                <p>&nbsp;-&nbsp;
                    <a href="/thiet-ke-phan-mem.html">Xây dựng phần mềm doanh nghiệp, và cung cấp nhiều giải pháp công nghệ thông tin tại Việt Nam.</a>
                </p>

                <p>&nbsp;-&nbsp;
                    <a href="/tu-van-trien-khai-cac-dich-vu-seo-marketing-online.html">Tư vấn &amp; triển khai các dịch vụ Seo, Marketing Online.</a>
                </p>

                <ul>
                </ul>

                <p>Với những bước đi chiến lược đúng đắn, dịch vụ và sản phẩm đa dạng, hiện là nhà tư vấn và thiết kế web, xây
                    dựng phần mềm có thị phần lớn tại Việt Nam.</p>

                <p> là một doanh nghiệp hàng đầu về công nghệ thông tin tại Việt Nam, với đội ngũ chuyên gia giỏi công nghệ thông
                    tin triển khai nhiều dự án cấp nhà nước theo mô hình chính phủ điện tử, và có nhiều chuyên gia&nbsp;từng
                    làm việc tại các công ty nước ngoài, tập đoàn FPT FSOFT, IBM, Microsoft Việt Nam...Chúng tôi tự tin cung
                    cấp nhiều giải pháp có thể đáp ứng mọi nhu cầu của&nbsp;các doanh nghiệp lớn và vừa&nbsp;tại Việt Nam.</p>

                <p>Chúng tôi có định hướng phát triển lâu dài trong lĩnh vực Công nghệ thông tin. Mục tiêu của là tạo ra những
                    công cụ quản lý - điều hành hiệu quả, hỗ trợ đắc lực cho doanh nghiệp, tổ chức của bạn.</p>

                <p>Đội ngũ chuyên gia giàu kinh nghiệm luôn cập nhật các xu hướng công nghệ mới nhất của thế giới để áp dụng
                    cho các sản phẩm của thị trường trong nước.</p>

                <p>Tiêu chuẩn mà chúng tôi áp dụng cho việc xây dựng&nbsp;phần mềm là ISO 9001 và CMMI. Ngoài ra chúng tôi áp
                    dụng các&nbsp;quy trình chuẩn quốc tế (industry standard) như Agile, Scrum cho việc xây dựng phần mềm
                    cho khách hàng ngước ngoài.
                </p>

                <p>Chúng tôi cũng như tất cả các bạn đều thấy rằng, nền kinh tế đang phát triển nhanh chóng, thị trường ngày
                    càng cạnh tranh khốc liệt và mọi doanh nghiệp đang đứng trước một thời kỳ mới với nhiều thử thách cam
                    go. Chắc hẳn doanh nghiệp của bạn không thể khoanh tay nhìn các đối thủ của mình đang đổi mới công nghệ,
                    đổi mới phương pháp quản lý, thậm chí đổi mới cả trong tư duy từng ngày, từng giờ. Và không có cách nào
                    khác, bạn phải vượt qua những đối thủ đó bằng mọi giá. Một trong những cách chắc chắn có thể giúp doanh
                    nghiệp của bạn trên con đường đến sự thành công, đó là phải thiết lập được một công cụ quản lý - điều
                    hành hữu hiệu, phải triệt để tận dụng những tiến bộ KHKT trong điều kiện có thể.</p>

                <p>Chúng tôi tin chắc rằng sức mạnh của công nghệ có thể thay đổi cuộc sống của con người và biến những giấc
                    mơ thành hiện thực. Hy vọng qua những sản phẩm của Chúng tôi , một phong cách làm việc mới, một phong
                    cách quản lý mới sẽ được thể hiện.</p>

                <p>Với phương châm "Giải pháp hoàn hảo cho doanh nghiệp" chúng tôi muốn đem đến sự thành công và hiệu quả thật
                    sự cho các cá nhân, doanh nghiệp, và các tổ chức kinh doanh trên mọi lĩnh vực của cả nước.</p>

                <p>Rất mong các bạn sẽ ủng hộ cho sự phát triển của CNTT Việt nam nói chung và nói riêng. Xin cảm ơn sự quan
                    tâm của bạn.</p>

                <h1>
                    <a href="#">CÔNG TY TNHH CÔNG NGHỆ GIẢI PHÁP PHẦN MỀM VIỆT</a>
                </h1>

                <ul>
                    <li>
                        <p>Trụ sở:&nbsp;Số 77 ngõ 68 triều khúc thanh xuân hà nội</p>
                    </li>
                    <li>
                        <p>Website:&nbsp;
                            <a href="#">www.congthanh.com</a>
                        </p>
                    </li>
                    <li>
                        <p>Email:
                            <a href="#">&nbsp;info@congthanh.com.vn</a>
                        </p>
                    </li>
                    <li>
                        <p>Điện thoại:&nbsp;(+84)345371166</p>
                    </li>
                </ul>

            </div>
            <div class="group-share pull-right">

                <div class="social-share">
                    <div class="shareGoo" style="float: right;">
                        <div id="fb-root">
                        </div>
                        <script>                            (function (d, s, id) {
                                var js, fjs = d.getElementsByTagName(s)[0];
                                if (d.getElementById(id)) return;
                                js = d.createElement(s); js.id = id;
                                js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.5&appId=307407472748250";
                                fjs.parentNode.insertBefore(js, fjs);
                            }(document, 'script', 'facebook-jssdk'));</script>
                        <!-- Your share button code -->
                        <div class="fb-like" data-href='http://.com.vn/gioi-thieu.html' data-layout="button_count" data-action="like" data-show-faces="true"
                            data-share="false">
                        </div>
                        <div class="fb-share-button" data-href='http://.com.vn/gioi-thieu.html' data-layout="button_count">
                        </div>
                    </div>
                    <div class="shareGoo shareGooG" style="float: right; margin-top: 3px;">
                        <g:plus action="share" size="medium" annotation="bubble"></g:plus>
                        <g:plusone size="medium" annotation="bubble"></g:plusone>
                        <script>
                            window.___gcfg = {
                                lang: 'vi-VN',
                                parsetags: 'onload'
                            };
                        </script>
                        <script src="https://apis.google.com/js/platform.js" async defer></script>
                    </div>
                </div>
            </div>

        </article>
    </div>
</div>
<?php   require_once __DIR__ . '/layouts/footer.php'; ?>