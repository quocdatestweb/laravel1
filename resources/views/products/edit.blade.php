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
    <link rel="shortcut icon" href="https://cdn-icons-png.freepik.com/256/10112/10112502.png?semt=ais_hybrid" type="image/vnd.microsoft.icon" />

    <title>Product</title>
    <style>
        body {
            margin: 0;
            padding-top: 40px;
            color: #2e323c;
            background: #eee;
            position: relative;
            height: 100%;
        }

        .account-settings .user-profile {
            margin: 0 0 1rem 0;
            padding-bottom: 1rem;
            text-align: center;
        }

        .account-settings .user-profile .user-avatar {
            margin: 0 0 1rem 0;
        }

        .account-settings .user-profile .user-avatar img {
            width: 90px;
            height: 90px;
            -webkit-border-radius: 100px;
            -moz-border-radius: 100px;
            border-radius: 100px;
        }

        .account-settings .user-profile h5.user-name {
            margin: 0 0 0.5rem 0;
        }

        .account-settings .user-profile h6.user-email {
            margin: 0;
            font-size: 0.8rem;
            font-weight: 400;
            color: #9fa8b9;
        }

        .account-settings .about {
            margin: 2rem 0 0 0;
            text-align: center;
        }

        .account-settings .about h5 {
            margin: 0 0 15px 0;
            color: #007ae1;
        }

        .account-settings .about p {
            font-size: 0.825rem;
        }

        .form-control {
            border: 1px solid #cfd1d8;
            -webkit-border-radius: 2px;
            -moz-border-radius: 2px;
            border-radius: 2px;
            font-size: .825rem;
            background: #ffffff;
            color: #2e323c;
        }

        .card {
            background: #ffffff;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            border: 0;
            margin-bottom: 1rem;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="{{route('show')}}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('product.user') }}">Show Product</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('product.admin') }}">Manage Product</a>
            </li>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('posts.index') }}">Show Post</a>
            </li>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('posts.admin') }}">Manage Post</a>
            </li>
        </ul>
    </nav>

    <main role="main">

        <div class="container">

            <div class="row gutters">
                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="account-settings">
                                <div class="user-profile">
                                    <div>
                                        <img id="previewImage" style="width: 300px" src="{{ url('image/product/'.$products->ThumbImage) }}" alt="Maxwell Admin">
                                    </div>
                                    <h5 class="user-name">{{ $products->Name }}</h5>
                                    <h3 class="user-email text-danger">${{ $products->Price }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="card h-100">
                        <form id="updateForm" method="POST" action="{{ route('products.update', $products->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row gutters">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <h6 class="mb-2 text-primary">Product Details</h6>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                value="{{ $products->Name }}">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="price">Price</label>
                                            <input type="text" class="form-control" id="price" name="price"
                                                value="{{ $products->Price }}">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="website">Author</label>
                                            <select class="form-control" id="author_id" name="author_id" required>
                                                <option value="{{ $products->Author_ID }}-{{ $products->Author_Type }}">
                                                    {{ $products->Author_Type }}</option>
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->id }}-{{ $user->name }}">
                                                        {{ $user->name }}</option>
                                                @endforeach
                                                <!-- Include options for categories here -->
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="category"> Category</label>
                                            <select class="form-control" id="category" name="category" required>
                                                <option value="{{ $products->CategoryID }}">
                                                    {{ $products->category->name }}</option>
                                                @foreach ($categorys as $category)
                                                    <option value="{{ $category->id }}"> {{ $category->name }}
                                                    </option>
                                                @endforeach
                                                <!-- Include options for categories here -->
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="create_at">Date</label>
                                            <input name="created_at" type="datetime-local" class="form-control"
                                                id="create_at" value="{{ $products->created_at }}">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="image">Image</label>
                                            <div class="custom-file">
                                                <input name="thumbImage" type="file" class="custom-file-input"
                                                id="imageUpload" accept="image/*">
                                                <label class="custom-file-label" for="customFileLang"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea class="form-control" id="description" name="content" required>{{ $products->Content }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row gutters">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="d-flex justify-content-end align-items-center">
                                            <div class="btn-group">
                                                <button onclick="confirmUpdate(event)" type="submit" id="submit"
                                                    name="submit" class="btn btn-primary">Update</button>
                                                <button onclick="clearForm()" class="btn btn-danger ml-2">Clear
                                                    Form</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <footer class="text-muted">
        <div class="container">
            <p class="float-right">
                <a >Back to top</a>
            </p>
            <p>Product example is &copy; Bootstrap, but please download and customize it for yourself!</p>
            <p>New to Bootstrap? <a href="../../">Visit the homepage</a> or read our <a
                    href="../../getting-started/">getting started guide</a>.</p>
        </div>
    </footer>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
        // Function to handle the image upload
        function handleImageUpload() {
            const fileInput = document.getElementById('imageUpload');
            const previewImage = document.getElementById('previewImage');

            // Check if a file is selected
            if (fileInput.files && fileInput.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    previewImage.style.display = 'block';
                };

                reader.readAsDataURL(fileInput.files[0]);
            }
        }

        // Attach event listener to the file input
        document.getElementById('imageUpload').addEventListener('change', handleImageUpload);
    </script>

</body>

</html>
