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
                                <h3 class="card-title">Добавление промо-акции</h3>
                            </div>
                            <form action="{{ route('addPromo') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body form-blocks">
                                    <div class="form-group">
                                        <label for="name">Название промо.</label>
                                        <input type="text" class="form-control" name="name" placeholder="Введите название промо">
                                    </div>
                                    <div class="form-group">
                                        <label for="content">Описание.</label>
                                        <textarea class="form-control" id="content" name="content" placeholder="Введите описание промо"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="end_date">Дата окончания действия.</label>
                                        <input type="date" class="form-control" name="end_date" placeholder="Укажите дату">
                                    </div>
                                    <div class="form-group image">
                                        <label for="img">Фото.</label>
                                        <div class="input-group input-image">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="img" name="img">
                                                <label class="custom-file-label" for="img">Выберите</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

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
