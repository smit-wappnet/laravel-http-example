<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css" />
</head>

<body>
    <div class="container">
        <form action="" method="get">
            <div class="row">
                <div class="col-6 offset-2 py-5">
                    <input type="text" name="search" id="search" placeholder="Search Something"
                        class="form-control" value="{{ Request::get('search', '') }}">
                </div>
                <div class="col-2 py-5">
                    <button class="btn btn-primary w-100">Search</button>
                </div>
            </div>
        </form>
        @isset($articles)
            <div class="row">
                @foreach ($articles as $article)
                    <div class="col-6 my-3">
                        <div class="card">
                            <div class="card-header fw-bold" style="height: 37px; overflow: hidden;">
                                {{ $article['title'] }}
                            </div>
                            <div class="card-body" style="height: 115px; overflow:hidden;">
                                {{ $article['description'] }}
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-4 mt-1">
                                        <div class="row">
                                            <div class="col-5 fw-bold">Date:</div>
                                            <div class="col-7"> {{ date('d-m-Y', strtotime($article['publishedAt'])) }}</div>
                                        </div>
                                    </div>
                                    <div class="col-6 mt-1" style="height: 30px; overflow:hidden;">
                                        @isset($article['author'])
                                            <div class="row">
                                                <div class="col-4 fw-bold">Author:</div>
                                                <div class="col-8">{{ $article['author'] }}</div>
                                            </div>
                                        @endisset
                                    </div>
                                    <div class="col-2">
                                        <a href="{{ $article['url'] }}" target="_blank" class="btn btn-success w-100">View</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endisset
    </div>
</body>

</html>
