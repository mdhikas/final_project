@extends('layouts.main')
@section('content')
{{-- Modal Tambah --}}
<div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Kriteria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" action="/dashboard/test/kriteria" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="kode">Kode Kriteria</label>
                        <input type="text" class="form-control @error('kode')is-invalid @enderror" name="kode">
                        @error('kode')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama_kriteria">Nama Kriteria</label>
                        <input type="text" class="form-control" name="nama_kriteria">
                    </div>
                    <div class="form-group">
                        <label for="bobot">Bobot</label>
                        <input type="text" class="form-control" name="bobot">
                    </div>
                    <div class="form-group">
                        <label for="minmax">Min Max</label>
                        <select class="form-control" name="minmax">
                            <option selected disabled value=""></option>
                            <option>Minimum</option>
                            <option>Maximum</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tipe_preferensi">Tipe Preferensi</label>
                        <select class="form-control" name="tipe_preferensi">
                            <option selected disabled value=""></option>
                            <option>Tipe Biasa (Usual Criterion)</option>
                            <option>Tipe Quasi (Quasi Criterion atau U-Shape)</option>
                            <option>Tipe Linier (Linear Criterion atau V-Shape)</option>
                            <option>Tipe Tingkatan (Level Criterion)</option>
                            <option>Tipe Linear Quasi (Linear Criterion with Indifference)</option>
                            <option>Tipe Gaussian</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="q">Nilai q</label>
                        <input type="text" class="form-control" name="q">
                    </div>
                    <div class="form-group">
                        <label for="p">Nilai p</label>
                        <input type="text" class="form-control" name="p">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-window-close mr-2"></i>Tutup</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-2"></i>Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- End Modal Tambah --}}

{{-- Modal Edit --}}
<div class="modal fade" id="editModal" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Ubah Kriteria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form role="form" action="/dashboard/test/kriteria" method="POST" id="editForm">
                    {{ csrf_field() }}
                    {{method_field('PUT')}}
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="kode">Kode Kriteria</label>
                        <input type="text" class="form-control" id="kode" name="kode">
                    </div>
                    <div class="form-group">
                        <label for="nama_kriteria">Nama Kriteria</label>
                        <input type="text" class="form-control" id="nama_kriteria" name="nama_kriteria">
                    </div>
                    <div class="form-group">
                        <label for="bobot">Bobot</label>
                        <input type="text" class="form-control" id="bobot" name="bobot">
                    </div>
                    <div class="form-group">
                        <label for="minmax">Min Max</label>
                        <select class="form-control" id="minmax" name="minmax">
                            <option selected disabled value=""></option>
                            <option>Minimum</option>
                            <option>Maximum</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tipe_preferensi">Tipe Preferensi</label>
                        <select class="form-control" id="tipe_preferensi" name="tipe_preferensi">
                            <option selected disabled value=""></option>
                            <option>Tipe Biasa (Usual Criterion)</option>
                            <option>Tipe Quasi (Quasi Criterion atau U-Shape)</option>
                            <option>Tipe Linier (Linear Criterion atau V-Shape)</option>
                            <option>Tipe Tingkatan (Level Criterion)</option>
                            <option>Tipe Linear Quasi (Linear Criterion with Indifference)</option>
                            <option>Tipe Gaussian</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="q">Nilai q</label>
                        <input type="text" class="form-control" id="q" name="q">
                    </div>
                    <div class="form-group">
                        <label for="p">Nilai p</label>
                        <input type="text" class="form-control" id="p" name="p">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-window-close mr-2"></i>Tutup</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-edit mr-2"></i>Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- End Modal Edit --}}

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Certification OHS Test</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active">Certification Test</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div id="flash-message" data-title="{{ Session::get('title') }}" data-type="{{ Session::get('type') }}" data-message="{{ Session::get('message') }}"></div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <nav class="navbar navbar-expand-lg navbar-dark bg-green">
                        <a class="navbar-brand" href="/dashboard/test/index">PROMETHEE</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                            <div class="navbar-nav">
                                <a class="nav-item nav-link active" href="/dashboard/test/kriteria">Kriteria</a>
                                <a class="nav-item nav-link" href="/dashboard/test/alternatif">Alternatif</a>
                                <a class="nav-item nav-link" href="/dashboard/test/nilai_alternatif">Nilai Alternatif</a>
                                <a class="nav-item nav-link" href="/dashboard/test/perhitungan">Perhitungan</a>
                            </div>
                        </div>
                    </nav>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <h2 class="mt-0 mb-2 table-title">KRITERIA</h2>
                            </div>
                            <div class="col-6">
                                <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                                    data-target="#staticBackdrop">
                                    <i class="fas fa-plus mr-2"></i>Tambah Data
                                </button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Kode</th>
                                        <th scope="col">Nama Kriteria</th>
                                        <th scope="col">Bobot</th>
                                        <th scope="col">Min Max</th>
                                        <th scope="col">Tipe Preferensi</th>
                                        <th scope="col">q</th>
                                        <th scope="col">p</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kriteria as $krit)
                                    <tr>
                                        <td style="text-align: center">{{$krit->kode}}</td>
                                        <td>{{$krit->nama_kriteria}}</td>
                                        <td style="text-align: center">{{$krit->bobot}}</td>
                                        <td style="text-align: center">{{$krit->minmax}}</td>
                                        <td>{{$krit->tipe_preferensi}}</td>
                                        <td class="text-center">{{$krit->q}}</td>
                                        <td class="text-center">{{$krit->p}}</td>
                                        <td class="d-flex justify-content-center">
                                        <form action="/dashboard/test/kriteria/{{$krit->id}}" id="form-delete-kriteria-{{ $krit->id }}" method="POST" class="deleteForm mx-1">
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                            <button type="submit" data-id="{{ $krit->id }}" data-kode="{{ $krit->kode }}" class="btn btn-danger confirmDeleteKriteria">
                                                    <i class="fas fa-trash-alt mr-2"></i>
                                                Hapus</button>
                                        </form>
                                        <button type="button" class="btn btn-warning btn-edit mx-1" data-id="{{$krit->id}}" data-kode="{{$krit->kode}}" data-nama="{{$krit->nama_kriteria}}" data-bobot="{{$krit->bobot}}" data-minmax="{{$krit->minmax}}" data-tipe_preferensi="{{$krit->tipe_preferensi}}" data-q="{{$krit->q}}" data-p="{{$krit->p}}">
                                                <i class="fas fa-edit mr-1"></i>
                                                Edit</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection