@extends('layouts.app')

@section('title', 'Santri')
@section('sub-title', 'Edit')

@section('content')
    <div class="container-xl">
        <div class="col-12">
            <div class="row row-cards">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Ubah</h3>
                        </div>
                        <div class="card-body">
                            <x-form :action="route('santri.update', $santri->id)" method="PATCH">
                                @bind($santri)
                                    <x-form-input name="nik" label="NIK" floating class="mb-1" />
                                    <x-form-input name="nama" label="Nama" floating class="mb-1" />
                                    <x-form-input name="alamat" label="Alamat" floating class="mb-1" />
                                    <x-form-input type="date" name="tanggal_lahir" label="Tanggal Lahir" floating class="mb-1" />
                                @endbind
                                <x-form-submit class="mt-3">Simpan</x-form-submit>
                            </x-form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
