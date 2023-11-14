@extends('layouts/main')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>Продукт</h1>
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
                                <h3 class="card-title">Добавление продукта</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('addProduct') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Название продукта.</label>
                                        <input type="text" class="form-control" name="name" placeholder="Введите название продукта">
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Цена.</label>
                                        <input type="text" class="form-control" name="price" placeholder="Введите цену продукта">
                                    </div>
                                    <div class="form-group">
                                        <label for="desc">Описание.</label>
                                        <textarea class="form-control" id="desc" name="desc" placeholder="Введите описание продукта"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="seo_name">Название CEO.</label>
                                        <input type="text" class="form-control" name="seo_name" placeholder="Введите название продукта для CEO">
                                    </div>
                                    <div class="form-group">
                                        <label for="seo_content">Описание CEO.</label>
                                        <textarea class="form-control" id="seo_content" name="seo_content" placeholder="Введите описание продукта CEO"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleSelectRounded0">Категория продукта.</label>
                                        <select class="custom-select rounded-0" id="category_id" name="category_id">
                                            <option value="" selected disabled hidden>Не выбрано</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->title }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="images">Фото.</label>
                                        <div class="input-group input-image">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="img" name="img">
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
                                    <button type="submit" class="btn btn-success" name="action" value="get">Добавить</button>
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
