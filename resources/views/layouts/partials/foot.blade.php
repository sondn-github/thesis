<?php
use App\Category;

$categories = Category::all();
?>
        <div class="footer" id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <p class="mb-4"><img src="{{asset('images/logo.png')}}" alt="Image" class="img-fluid"></p>
                        <p>Địa chỉ: Đại học Bách khoa Hà Nội, 1 Đại Cồ Việt, Bách Khoa, Hai Bà Trưng, Hà Nội, Việt Nam.</p>
                    </div>
                    <div class="col-lg-3">
                        <h3 class="footer-heading"><span>Liên kết</span></h3>
                        <ul class="list-unstyled">
                            <li><a href="#">Giới thiệu</a></li>
                            <li><a href="#">Tin tức</a></li>
                            <li><a href="#">Chính sách bảo mật</a></li>
                            <li><a href="#">Hướng dẫn sử dụng</a></li>
                            <li><a href="#">Câu hỏi thường gặp</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3">
                        <h3 class="footer-heading"><span>{{__('layouts/header.categories')}}</span></h3>
                        <ul class="list-unstyled">
                            @foreach($categories->take(6) as $category)
                                <li><a href="{{route('categories.show', $category->id)}}">{{$category->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-lg-3">
                        <h3 class="footer-heading"><span>Liên hệ</span></h3>
                        <ul class="list-unstyled">
                            <li><a href="#">Số điện thoại: 10 20 123 456</a></li>
                            <li><a href="#">Địa chỉ email: info@mydomain.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="copyright">
                            <p>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .site-wrap -->

    <!-- loader -->
    <div id="loader" class="show fullscreen">
        <svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#51be78"/>
        </svg>
    </div>

    @include('layouts.partials.javascript')
</body>
</html>
