<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
    <style>
        body {
            padding-top: 0;
            font-size: 12px;
            color: #777;
            background: #f9f9f9;
            font-family: 'Open Sans', sans-serif;
            margin-top: 20px;
        }

        .panel {
            position: relative;
            background: #fff;
        }

        .image-wrapper {
            position: relative;
            display: block;
            overflow: hidden;
        }

        .blog-container a:not(.btn) {
            color: #999;
            transition: all .2s linear;
            -webkit-transition: all .2s linear;
            -moz-transition: all .2s linear;
            -ms-transition: all .2s linear;
            -o-transition: all .2s linear;
        }

        .image-wrapper img {
            transition: all .4s ease;
            -webkit-transition: all .4s ease;
            -moz-transition: all .4s ease;
            -ms-transition: all .4s ease;
            -o-transition: all .4s ease;
        }

        .image-wrapper:hover .image-overlay {
            opacity: .9;
            transition: all .4s ease;
            -webkit-transition: all .4s ease;
            -moz-transition: all .4s ease;
            -ms-transition: all .4s ease;
            -o-transition: all .4s ease;
            transform: translateX(0%);
            -webkit-transform: translateX(0%);
            -moz-transform: translateX(0%);
            -ms-transform: translateX(0%);
            -o-transform: translateX(0%);
        }

        .image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            background-color: #3c8dbc;
            background-image: -moz-linear-gradient(top, #5fa4cc, #3c8dbc);
            background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#5fa4cc), to(#3c8dbc));
            background-image: -webkit-linear-gradient(top, #5fa4cc, #3c8dbc);
            background-image: -o-linear-gradient(top, #5fa4cc, #3c8dbc);
            background-image: linear-gradient(to bottom, #5fa4cc, #3c8dbc);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#5fa4cc, endColorstr=#3c8dbc, GradientType=0);
            filter: progid:DXImageTransform.Microsoft.gradient(enabled=false);
            border: 6px solid #296282;
            transition: all .4s ease;
            -webkit-transition: all .4s ease;
            -moz-transition: all .4s ease;
            -ms-transition: all .4s ease;
            -o-transition: all .4s ease;
        }

        .post-like {
            float: right;
            cursor: pointer;
        }

        .headline {
            margin: 20px 0;
            padding: 5px 0 10px;
            border-bottom: 1px solid #eee;
            font-weight: 500;
        }

        h4,
        .h4 {
            font-size: 18px;
        }

        .media,
        .media-body {
            overflow: hidden;
            zoom: 1;
        }
    </style>
</head>

<body>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <div class="container bootstrap snippets bootdey">
        <div class="row">
            <h2 class="text-muted">Welcome to our blog</h2>
            <hr>
        </div>
        <div class="row">
            <!-- posts -->
            <div class="col-md-8">
                @foreach ($posts as $post)
                <div class="panel blog-container">
                    <div class="panel-body">
                        <div class="image-wrapper">
                            <a class="image-wrapper image-zoom cboxElement" href="#">
                                <img src="{{ $post->thumb_image }}" alt="Photo of Blog" width="700">
                                <div class="image-overlay"></div>
                            </a>
                        </div>

                        <h4>{{ $post->name }}</h4>
                        <small class="text-muted">By <a href="#"><strong> {{ $post->author_type }}</strong></a> | {{ $post->created_at }} </small>

                        <p class="m-top-sm m-bottom-sm">
                            {{ $post->description }}
                        </p>
                        <a class="text-primary" href="#"><i class="fa fa-angle-double-right"></i> Continue reading</a>
                        <span class="post-like text-muted tooltip-test" data-toggle="tooltip"
                            data-original-title="I like this post!">
                            <i class="fa fa-heart"></i> <span class="like-count">{{ $post->author_id }}</span>
                        </span>
                    </div>
                </div>
                @endforeach

            </div>

            <div class="col-md-4">
                <h4 class="headline text-muted">
                    POPULAR POST
                    <span class="line"></span>
                </h4>
                @foreach ($posts as $post)
                <div class="media popular-post">
                    <a class="pull-left" href="#">
                        <img src="{{ $post->thumb_image }}" alt="Popular Post" width="60" height="60">
                    </a>
                    <div class="media-body">
                        {{ $post->name }}
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>



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
