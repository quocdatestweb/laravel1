<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Product</title>
    <link rel="shortcut icon" href="/themes/thex/favicon.ico" type="image/vnd.microsoft.icon" />

</head>

<body>
    <header>
        <div class="collapse bg-dark" id="navbarHeader">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-md-7 py-4">
                        <h4 class="text-white">About</h4>
                        <p class="text-muted">Add some information about the Product below, the author, or any other
                            background context. Make it a few sentences long so folks can pick up some informative
                            tidbits. Then, link them off to some social networking sites or contact information.</p>
                    </div>
                    <div class="col-sm-4 offset-md-1 py-4">
                        <h4 class="text-white">Contact</h4>
                        <ul class="list-unstyled">
                            <li><a href="#" class="text-white">Follow on Twitter</a></li>
                            <li><a href="#" class="text-white">Like on Facebook</a></li>
                            <li><a href="#" class="text-white">Email me</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar navbar-dark bg-dark box-shadow">
            <div class="container d-flex justify-content-between">
                <a href="#" class="navbar-brand d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="mr-2">
                        <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z">
                        </path>
                        <circle cx="12" cy="13" r="4"></circle>
                    </svg>
                    <strong>Product</strong>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader"
                    aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
    </header>


    <main role="main">

        <div class="Product py-5 bg-light">

            <div class="container">

        <img src="https://images.fpt.shop/unsafe/fit-in/800x300/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2024/4/22/638493962838593257_F-H1_800x300.png"
        alt="" srcset="" style="width: 100%">

                <div class="row pt-5">
                    @foreach ($products as $product)
                        <div class="col-md-3">
                            <a href="{{ route('show', ['id' => $product->id]) }}" style="text-decoration:none">
                            <div class="card mb-4 box-shadow">
                                <img class="card-img-top"
                                alt="Thumbnail [100%x225]" src="{{ url('image/product/'.$product->ThumbImage) }}"
                                data-holder-rendered="true" style="height: 50%; width: 100%; display: block;">
                                <div class="card-body">
                                    <p class="card-text">{{ $product->Name }}</p>
                                    <div class="star">
                                        @php
                                            $k = rand(1, 5);
                                            // Alternatively, you can use: $k = Str::random();
                                        @endphp
                                        @for ($i = 1; $i <= $k; $i++)
                                            <i class="fa fa-star text-warning"></i>
                                        @endfor
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="text-muted"> {{ $product->category->name }}</small>

                                        <h6 class="text-primary"><b>${{ $product->Price }}</b></h6>

                                    </div>
                                </div>
                            </div>
                        </a>
                        </div>
                    @endforeach

                </div>
                <div class="d-flex justify-content-end align-items-center">
                    {{ $products->links('custom-pagination') }}
                    {{-- <p>Trang hiện tại: {{ $products->currentPage() }}</p> --}}
                </div>
            </div>

        </div>

    </main>

    <footer class="text-muted">
        <div class="container">
            <p class="float-right">
                <a href="#">Back to top</a>
            </p>
            <p>Product example is &copy; Bootstrap, but please download and customize it for yourself!</p>
            <p>New to Bootstrap? <a href="../../">Visit the homepage</a> or read our <a
                    href="../../getting-started/">getting started guide</a>.</p>
        </div>
    </footer>

    <!-- Bootstrap core JavaScript
      ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>

<script>
    function confirmDelete(event) {
      // Hiển thị hộp thoại xác nhận
      var result = confirm("Bạn có chắc chắn muốn xóa?");

      // Nếu người dùng chọn "OK" (đồng ý xóa), tiếp tục gửi form
      if (result) {
        document.getElementById('deleteForm').submit();
      } else {
        event.preventDefault(); // Ngăn chặn hành vi mặc định của sự kiện click
      }
    }
    </script>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>
