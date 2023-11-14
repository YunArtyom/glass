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
            <div class="card card-solid">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="col-12">
                                <img src="../storage/media/{{ $promo->img }}" class="product-image" alt="Product Image">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <h3 class="my-3">{{ $promo->name }}</h3>
                            <ul>
                                <li>
                                    <b>Описание:</b> {{ $promo->content }}
                                </li>
                            </ul>
                            <hr>
                            <br>
                            <ul>
                                <li>
                                    <b>Дата окончания:</b> {{ $promo->end_date }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
