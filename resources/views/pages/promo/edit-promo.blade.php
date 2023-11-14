@extends('layouts/main')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>Промо-акция</h1>
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
                                <h3 class="card-title">Редактирование промо-акции</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('editPromo') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body form-blocks">
                                    <!-- DISPLAY NONE -->
                                    <input type="text" value="{{$promo->id}}" name="id" style="display: none">
                                    <input type="text" value="{{$promo->img}}" name="oldImg" style="display: none">

                                    <div class="form-group">
                                        <label for="name">Название промо.</label>
                                        <input type="text" class="form-control" value="{{$promo->name}}" name="name" placeholder="Введите название промо">
                                    </div>
                                    <div class="form-group">
                                        <label for="content">Описание.</label>
                                        <textarea class="form-control" id="content" name="content" placeholder="Введите описание промо">{{$promo->content}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="end_date">Дата окончания действия.</label>
                                        <input type="date" class="form-control" name="end_date" placeholder="Укажите дату" value="{{date('Y-m-d', strtotime($promo->end_date))}}">
                                    </div>
                                    <div class="form-group image">
                                        <label for="images">Заменить фото.</label>
                                        <div class="input-group input-image">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="img">
                                                <label class="custom-file-label" for="img">Выберите</label>
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
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Фотография промо</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <div class="photos">
                                <br>
                                <img src="../storage/media/{{ $promo->img }}" style="width: 100%">
                                <br>
                            </div>
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
