@extends('layouts/main')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>Reel</h1>
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
                                <h3 class="card-title">Редактирование reel</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('editReel') }}" method="POST" >
                                @csrf
                                <div class="card-body">
                                    <input type="text" value="{{$reel->id}}" name="id" style="display: none">
                                    <div class="form-group">
                                        <label for="name">Название reel.</label>
                                        <input type="text" class="form-control" value="{{$reel->name}}" name="name" placeholder="Введите название reel">
                                    </div>
                                    <div class="form-group">
                                        <label for="content">Описание.</label>
                                        <textarea class="form-control" id="content" name="content" placeholder="Введите описание reel">{{$reel->content}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="video">Видео.</label>
                                        <textarea class="form-control" id="video" name="video" placeholder="Введите видео reel"></textarea>
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
