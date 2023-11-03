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
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="m-0">Продукты</h5>
                            </div>
                            <div class="card-body">
                                <p class="card-text">Просмотр всех продуктов и их редактирование.</p>
                                <br>
                                <a href="{{ route('allProductsPage') }}" class="btn btn-primary">Перейти</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="m-0">Категории продуктов</h5>
                            </div>
                            <div class="card-body">
                                <p class="card-text">Просмотр всех категорий продуктов и их редактирование.</p>
                                <a href="{{ route('allCategoriesPage') }}" class="btn btn-primary">Перейти</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
