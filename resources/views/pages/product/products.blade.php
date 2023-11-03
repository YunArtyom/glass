@extends('layouts/main')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>Продукты</h1>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Список продуктов на сайте</h3>
                    <div class="row justify-content-end">
                        <div class="btn btn-success btn-sm text-right">
                            <a href="{{ route('addProductPage') }}" style="color: #FFFFFF">Добавить</a>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                        <tr>
                            <th style="width: 1%">
                                Название
                            </th>
                            <th style="width: 1%">
                                Категория
                            </th>
                            <th style="width: 1%">
                                Цена
                            </th>
                            <th style="width: 20%">
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $value)
                            <tr>
                                <td>
                                    {{ $value['name'] }}
                                </td>
                                <td>
                                    {{ $value['category']['title'] }}
                                </td>
                                <td>
                                    {{ $value['price'] }}
                                </td>
                                <td class="project-actions text-right">
                                    <div class="btn">
                                        <form action="{{ route('infoProductPage') }}" method="GET">
                                            @csrf
                                            <input type="text" style="display: none" value="{{$value['id']}}" name="id">
                                            <button type="submit" class="btn btn-primary btn-sm">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </form>
                                    </div>
                                    <div class="btn">
                                        <form action="{{ route('editProductPage') }}" method="GET">
                                            @csrf
                                            <input type="text" style="display: none" value="{{$value['id']}}" name="id">
                                            <button type="submit" class="btn btn-info btn-sm">
                                                <i class="fas fa-pencil-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                    <div class="btn">
                                        <form action="{{ route('deleteProduct') }}" method="GET">
                                            @csrf
                                            <input type="text" style="display: none" value="{{$value['id']}}" name="id">
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="card-footer clearfix">
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
