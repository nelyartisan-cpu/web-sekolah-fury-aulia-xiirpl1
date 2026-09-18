@extends('layouts.admin')

@section('title', 'Tambah Ekstrakurikuler')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title mb-0">Tambah Ekstrakurikuler</h4>
        </div>
        <div class="card-body">

            <form action="{{ route('admin.ekstrakurikuler.store') }}" method="POST">
                @csrf

                @include('admin.ekstrakurikuler.form')

                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save"></i> Simpan
                </button>
                <a href="{{ route('admin.ekstrakurikuler.index') }}" class="btn btn-secondary">
                    Batal
                </a>
            </form>

        </div>
    </div>
</div>
@endsection