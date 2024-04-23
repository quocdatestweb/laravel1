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

                <!-- Button trigger modal -->
                <div class="d-flex justify-content-end align-items-center pt-5">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                            Add Product
                    </button>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Add Product</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                                     @csrf
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" class="form-control" id="name" name="name" required>
                                              </div>

                                              <div class="form-group">
                                                <label for="thumbImage">Thumbnail Image</label>
                                                <input type="text" class="form-control" id="thumbImage" name="thumbImage" required>
                                              </div>

                                              <div class="form-group">
                                                <label for="price">Price</label>
                                                <input type="number" class="form-control" id="price" name="price" step="0.01" required>
                                              </div>

                                        </div>
                                        <div class="col-6">
                                              <div class="form-group">
                                                <label for="categoryid">Category</label>
                                                <select class="form-control" id="categoryid" name="categoryid" required>
                                                  @foreach ($categorys as $category)

                                                  <option value="{{ $category->id }}">   {{ $category->name }}</option>

                                                  @endforeach
                                                  <!-- Include options for categories here -->
                                                </select>
                                              </div>

                                              <div class="form-group">
                                                <label for="author_id">Author ID</label>
                                                <select class="form-control" id="author_id" name="author_id" required>
                                                  @foreach ($users as $user)

                                                  <option value="{{ $user->id }}">   {{ $user->name }}</option>

                                                  @endforeach
                                                  <!-- Include options for categories here -->
                                                </select>                                    </div>

                                              <div class="form-group">
                                                <label for="author_type">Author Type</label>
                                                <select class="form-control" id="author_type" name="author_type" required>
                                                  @foreach ($users as $user)

                                                  <option value="{{ $user->name }}">   {{ $user->name }}</option>

                                                  @endforeach
                                                  <!-- Include options for categories here -->
                                                </select>
                                                  </div>

                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label for="content">Content</label>
                                        <textarea class="form-control" id="content" name="content" rows="4" required></textarea>
                                      </div>


                                    <button type="submit" class="btn btn-primary">Add Product</button>
                                  </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($products as $product)
                        <div class="col-md-3">
                            <div class="card mb-4 box-shadow">
                                <div class="d-flex justify-content-end align-items-center">
                                    <div class="btn-group">
                                        <form action="{{ route('destroy', ['id' => $product->id]) }}" method="post">
                                            @csrf

                                            <button type="submit" class="btn btn-sm"><i
                                                    class="fa fa-trash text-danger"></i></button>
                                        </form>
                                        <form action="{{ route('edit', ['id' => $product->id]) }}" method="get">
                                            @csrf

                                            <button type="submit" class="btn btn-sm"><i
                                                    class="fa fa-pencil text-warning"></i></button>
                                        </form>
                                    </div>
                                </div>
                                <img class="card-img-top"
                                    data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail"
                                    alt="Thumbnail [100%x225]" src="{{ $product->ThumbImage }}"
                                    data-holder-rendered="true" style="height: 225px; width: 100%; display: block;">
                                <div class="card-body">
                                    <p class="card-text">{{ $product->Name }}</p>
                                    <div class="d-flex justify-content-center align-items-center">
                                        <div class="btn-group">
                                            <form action="{{ route('show', ['id' => $product->id]) }}" method="get">
                                                @csrf

                                                <button style="width: 200px" type="submit"
                                                    class="btn btn-sm btn-info">View Product</button>
                                            </form>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="text-muted"> {{ $product->category->name }}</small>
                                        <h6 class="text-primary"><b>${{ $product->Price }}</b></h6>

                                    </div>
                                </div>
                            </div>
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
