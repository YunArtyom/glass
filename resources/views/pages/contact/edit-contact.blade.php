@extends('layouts/main')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>Контакты</h1>
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
                                <h3 class="card-title">Редактирование контакта</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('editContact') }}" method="GET">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="domains">Ключ</label>
                                        <input type="text" class="form-control" value="{{ $contact['key'] }}" name="key" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="domains">Значение</label>
                                        <input type="text" class="form-control" value="{{ $contact['value'] }}" name="value">
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
                                    <button type="submit" class="btn btn-success" name="action" value="get">Изменить</button>
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
