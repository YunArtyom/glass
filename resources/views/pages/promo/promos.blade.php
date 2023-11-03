@extends('layouts/main')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>Промо-акции</h1>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Список промо-акций на сайте</h3>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                        <tr>
                            <th style="width: 1%">
                                Название
                            </th>
                            <th style="width: 20%">
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($promos as $value)
                            <tr>
                                <td>
                                    {{ $value['name'] }}
                                </td>
                                <td class="project-actions text-right">
                                    <div class="btn">
                                        <form action="{{ route('editPromoPage') }}" method="GET">
                                            @csrf
                                            <input type="text" style="display: none" value="{{$value['id']}}" name="id">
                                            <button type="submit" class="btn btn-info btn-sm">
                                                <i class="fas fa-pencil-alt"></i>
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
