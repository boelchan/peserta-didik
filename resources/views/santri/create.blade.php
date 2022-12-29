@extends('layouts.app')

@section('title', 'Santri')
@section('sub-title', 'Tambah')

@section('content')
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tambah Santri</h3>
            </div>
            <div class="card-body">
                <div class="col-md-6">
                    <x-form :action="route('santri.store')" enctype="multipart/form-data">
                        <x-form-input name="nik" label="NIK" floating class="mb-1" />
                        <x-form-input name="nama" label="Nama" floating class="mb-1" />
                        <x-form-input name="alamat" label="Alamat" floating class="mb-1" />
                        <x-form-input type="date" name="tanggal_lahir" label="Tanggal Lahir" floating class="mb-1" />
                        <x-form-input type="file" name="kk" label="Kartu Keluarga" floating class="mb-1" />
                        <x-form-input type="file" name="akta_kelahiran" label="Akta Kelahiran" floating class="mb-1" />
                        <x-form-submit class="mt-3">Simpan</x-form-submit>
                    </x-form>
                </div>
            </div>
        </div>
    </div>
@endsection
