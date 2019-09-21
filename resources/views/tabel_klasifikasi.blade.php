@extends('layouts.app')

@section('content')
<div class="panel panel-flat">
    <div class="panel-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <ul class="list-inline text-center">
                        <li>
                            <a href="#" class="btn border-teal text-teal btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-plus3"></i></a>
                        </li>
                        <li class="text-left">
                            <div class="text-semibold">pH</div>
                            <div class="text-muted">{{ $monitor->avg('pH') ? $monitor->avg('pH') : 0  }} avg</div>
                        </li>
                    </ul>

                    <div class="col-lg-10 col-lg-offset-1">
                        <div class="content-group" id="new-visitors"></div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <ul class="list-inline text-center">
                        <li>
                            <a href="#" class="btn border-warning-400 text-warning-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-watch2"></i></a>
                        </li>
                        <li class="text-left">
                            <div class="text-semibold">Turbidity</div>
                            <div class="text-muted">{{ $monitor->avg('turbidity') ? $monitor->avg('turbidity') : 0  }} avg</div>
                        </li>
                    </ul>

                    <div class="col-lg-10 col-lg-offset-1">
                        <div class="content-group" id="new-sessions"></div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <ul class="list-inline text-center">
                        <li>
                            <a href="#" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-people"></i></a>
                        </li>
                        <li class="text-left">
                            <div class="text-semibold">Temperature</div>
                            <div class="text-muted">{{ $monitor->avg('temperature') ? $monitor->avg('temperature') : 0  }} avg</div>
                        </li>
                    </ul>

                    <div class="col-lg-10 col-lg-offset-1">
                        <div class="content-group" id="total-online"></div>
                    </div>
                </div>
            </div>
        </div>

        <table class="table datatable-basic">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Waktu</th>
                    <th>pH</th>
                    <th>Kekeruhan</th>
                    <th>Suhu</th>
                </tr>
            </thead>
            <tbody>
                {{! $counter = 1 }}
                @foreach($monitor as $key => $value)
                <tr>
                    <td>{{ $counter++ }}</td>
                    <td>{{ $value->created_at->format('d-m-Y') }}</td>
                    <td>{{ $value->created_at->format('H:i') }}</td>
                    <td>{{ $value->pH }}</td>
                    <td>{{ $value->turbidity }}</td>
                    <td>{{ $value->temperature }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <button class="btn btn-primary" style="margin: 0% 42%" data-toggle="modal" data-target="#modal_form_inline">Simpan data dan analisis</button>
        <!-- Inline form modal -->
        <div id="modal_form_inline" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content text-center">
                    <div class="modal-header">
                        <h5 class="modal-title">Masukkan nama sungai</h5>
                    </div>

                    <form action="{{ route('simpanSungai') }}" method="post" class="form-inline">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group has-feedback">
                                <label>Nama Sungai: </label>
                                <input type="text" placeholder="nama sungai" name="name" class="form-control">
                                <div class="form-control-feedback">
                                    <i class="text-muted"></i>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer text-center">
                            <button type="submit" class="btn btn-primary">Simpan <i class="icon-plus22"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /inline form modal -->
    </div>
</div>
@endsection