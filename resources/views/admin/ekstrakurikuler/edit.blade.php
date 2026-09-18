@extends('layouts.admin')

@section('title', 'Edit Ekstrakurikuler')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title mb-0">Edit Ekstrakurikuler</h4>
        </div>
        <div class="card-body">

            <form action="{{ route('admin.ekstrakurikuler.update', $ekstrakurikuler->id) }}" method="POST">
                @csrf
                @method('PUT')

                @include('admin.ekstrakurikuler.form', ['ekstrakurikuler' => $ekstrakurikuler])

                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save"></i> Simpan Perubahan
                </button>
                <a href="{{ route('admin.ekstrakurikuler.index') }}" class="btn btn-secondary">
                    Batal
                </a>
            </form>

        </div>
    </div>
</div>
@endsection