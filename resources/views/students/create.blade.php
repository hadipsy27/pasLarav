@extends('layout.main')
@section('tittle', 'Form Tambah Data Mahasiswa')
    
@section('container')
    
<div class="container">
    <div class="row">
        <div class="col-8">
            <h1 class="mt-3">Form Tambah Data</h1>
            <form method="POST" action="/students">
                @csrf
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukkan nama" name="nama" value="{{ old('nama') }}">
                    @error('nama')<div class="invalid-feedback">{{$message}}</div>@enderror
                </div>
                <div class="form-group">
                    <label for="nrp">NIM</label>
                    <input type="text" class="form-control @error('nrp') is-invalid @enderror" id="nrp" placeholder="NIM" name="nrp" value="{{ old('nrp') }}">
                    @error('nrp')<div class="invalid-feedback">{{$message}}</div>@enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="example@email.com" name="email" value="{{ old('email') }}">
                    @error('email')<div class="invalid-feedback">{{$message}}</div>@enderror
                </div>
                
                <div class="form-group">
                    <label for="jurusan">Jurusan</label>
                    <input type="text" class="form-control @error('jurusan') is-invalid @enderror" id="jurusan" placeholder="jurusan" name="jurusan" value="{{ old('jursuan') }}">
                    @error('jurusan')<div class="invalid-feedback">{{$message}}</div>@enderror
                </div>
                
                <button type="submit" class="btn btn-primary">Tambah Data</button>
                
            </form>
           
        </div>
    </div>
</div>

@endsection