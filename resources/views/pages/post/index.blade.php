@extends('layouts/main')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>Посты</h1>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Список постов на сайте</h3>
                    <div class="row justify-content-end">
                        <div class="btn btn-success btn-sm text-right">
                            <a href="{{ route('addPostPage') }}" style="color: #FFFFFF">Добавить</a>
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
                                Дата
                            </th>
                            <th style="width: 20%">
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>
                                    {{ $post['name'] }}
                                </td>
                                <td>
                                    {{ $post['created_at'] }}
                                </td>
                                <td class="project-actions text-right">
                                    <div class="btn">
                                        <form action="{{ route('infoPostPage') }}" method="GET">
                                            @csrf
                                            <input type="text" style="display: none" value="{{$post['id']}}" name="id">
                                            <button type="submit" class="btn btn-primary btn-sm">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </form>
                                    </div>
                                    <div class="btn">
                                        <form action="{{ route('editPostPage') }}" method="GET">
                                            @csrf
                                            <input type="text" style="display: none" value="{{$post['id']}}" name="id">
                                            <button type="submit" class="btn btn-info btn-sm">
                                                <i class="fas fa-pencil-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                    <div class="btn">
                                        <form action="{{ route('deletePost') }}" method="GET">
                                            @csrf
                                            <input type="text" style="display: none" value="{{$post['id']}}" name="id">
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
