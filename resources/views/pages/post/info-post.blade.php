@extends('layouts/main')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>Пост</h1>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="card card-solid">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="col-12">
                                <img src="../storage/media/{{ json_decode($post->images, true)[0] }}" class="product-image" alt="Product Image">
                            </div>
                            <div class="col-12 product-image-thumbs">
                                @foreach(json_decode($post->images, true) as $key => $image)
                                    <div class="product-image-thumb thumb-{{$key}}" onclick="changeImage({{$key}})">
                                        <img src="../storage/media/{{ $image }}" alt="Product Image">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <h3 class="my-3">{{ $post->name }}</h3>
                            <ul>
                                <li>
                                    <b>Описание:</b> {{ $post->content }}
                                </li>
                            </ul>
                            <hr>
                            <br>
                            <ul>
                                <li>
                                    <b>CEO название:</b> {{ $post->seo_name }}
                                </li>
                                <br>
                                <li>
                                    <b>CEO описание:</b> {{ $post->seo_content }}
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- <div class="row mt-4">
                        <nav class="w-100">
                            <div class="nav nav-tabs" id="product-tab" role="tablist">
                                <a class="nav-item nav-link active" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Комментарии</a>
                            </div>
                        </nav>
                        <div class="tab-content p-3" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab">
                                @foreach($post->comments as $comment)
                                    <div class="post">
                                        <div class="user-block">
                                            <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                                            <span class="username">
                                                <p>{{ $comment->user->name }}</p>
                                                </span>
                                            <span class="description">{{ $comment->created_at }}</span>
                                        </div>

                                        <p>
                                            {{ $comment->content }}
                                        </p>
                                        <form action="{{ route('deleteComment') }}" method="GET">
                                            @csrf
                                            <input type="text" style="display: none" value="{{$comment->id}}" name="id">
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                        <br>
                                    </div>
                                @endforeach
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>

            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection

<script type="text/javascript">
    function changeImage(key) {
        document.querySelector('.product-image').src = document.querySelector('.thumb-' + key).querySelector('img').src;
    }
</script>
