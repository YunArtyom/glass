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
                                <h3 class="card-title">Редактирование продукта</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('editProduct') }}" method="POST" >
                                @csrf
                                <div class="card-body">
                                    <input type="text" value="{{$product->id}}" name="id" style="display: none">
                                    <div class="form-group">
                                        <label for="name">Название продукта.</label>
                                        <input type="text" class="form-control" value="{{$product->name}}" name="name" placeholder="Введите название продукта">
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Цена.</label>
                                        <input type="text" class="form-control" value="{{$product->price}}" name="price" placeholder="Введите цену продукта">
                                    </div>
                                    <div class="form-group">
                                        <label for="desc">Описание.</label>
                                        <textarea class="form-control" id="desc" name="desc" placeholder="Введите описание продукта">{{$product->desc}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="seo_name">Название CEO.</label>
                                        <input type="text" class="form-control" value="{{$product->seo_name}}" name="seo_name" placeholder="Введите название продукта для CEO">
                                    </div>
                                    <div class="form-group">
                                        <label for="seo_content">Описание CEO.</label>
                                        <textarea class="form-control" id="seo_content" name="seo_content" placeholder="Введите описание продукта CEO">{{$product->seo_content}}</textarea>
                                    </div>
                                    <input type="text" value="{{$oldCategory->id}}" name="category_id" style="display: none">
                                    <div class="form-group">
                                        <label for="exampleSelectRounded0">Категория продукта.</label>
                                        <select class="custom-select rounded-0" id="category_id" name="category_id">
                                            <option value="{{ $oldCategory->id }}" selected disabled> {{ $oldCategory->title }}</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->title }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="img">Фото.</label>
                                        <textarea class="form-control" id="img" name="img" placeholder="Введите фото продукта"></textarea>
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
