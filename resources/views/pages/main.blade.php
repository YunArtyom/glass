@extends('layouts/main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="m-0">Главная страница</h1>
                        <p class="m-0">Быстродействия:</p>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <!-- small box -->
                        <div class="small-box" style="background:#c2c4b6">
                            <div class="inner">
                                <h3 style="color:#343a40">Пост</h3>
                                <p style="color:#343a40">Добавление поста</p>
                            </div>
                            <div class="icon">
                                <i class="nav-icon fas fa-newspaper"></i>
                            </div>
                            <a href="{{ route('addPostPage') }}" class="small-box-footer">Перейти <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <!-- small box -->
                        <div class="small-box" style="background:#f7f0c6">
                            <div class="inner">
                                <h3 style="color:#343a40">Продукт</h3>
                                <p style="color:#343a40">Добавление продукта</p>
                            </div>
                            <div class="icon">
                                <i class="nav-icon fas fa-list"></i>
                            </div>
                            <a href="{{ route('addProductPage') }}" class="small-box-footer">Перейти <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
