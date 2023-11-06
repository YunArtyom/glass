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
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Редактирование поста</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('editPost') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body form-blocks">
                                    <input type="text" value="{{$post->id}}" name="id" style="display: none">
                                    <div class="form-group">
                                        <label for="name">Название продукта.</label>
                                        <input type="text" class="form-control" value="{{$post->name}}" name="name" placeholder="Введите название поста">
                                    </div>
                                    <div class="form-group">
                                        <label for="content">Описание.</label>
                                        <textarea class="form-control" id="content" name="content" placeholder="Введите описание поста">{{$post->content}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="seo_name">Название CEO.</label>
                                        <input type="text" class="form-control" value="{{$post->seo_name}}" name="seo_name" placeholder="Введите название поста для CEO">
                                    </div>
                                    <div class="form-group">
                                        <label for="seo_content">Описание CEO.</label>
                                        <textarea class="form-control" id="seo_content" name="seo_content" placeholder="Введите описание поста CEO">{{$post->seo_content}}</textarea>
                                    </div>
                                    <div class="form-group image">
                                        <label for="images">Фото.</label>
                                        <div class="input-group input-image">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="images" name="images[]">
                                                <label class="custom-file-label" for="images[]">Выберите фотографию</label>
                                            </div>
                                            <div class="input-group-append">
                                                <button class="input-group-text" type="button" onclick="newInput()">Добавить еще одно фото</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success" name="action" value="get">Применить</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

<script type="text/javascript">
    function newInput() {
        let count = 1;
        let elem = document.querySelector('.image');
        let clone = elem.cloneNode(true);
        document.querySelector('.form-blocks').appendChild(clone);
    }
</script>
