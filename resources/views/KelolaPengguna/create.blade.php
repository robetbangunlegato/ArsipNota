@extends('Dashboard.index')
@section('content')
    <div class="row">
        <form action="{{ route('kelolapengguna.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-12 my-2">
                    <p for="" class="h5">Nama</p>
                    <input type="text" class="form-control" name="Nama" autofocus placeholder="Masukan nama...">
                </div>
                <div class="col-12 my-2">
                    <p for="" class="h5">Email</p>
                    <input type="email" class="form-control" name="Email" placeholder="Masukan email...">
                </div>
                <div class="col-12 my-2">
                    <p for="" class="h5">Password</p>
                    <input type="password" class="form-control" name="Password" placeholder="Masukan password...">
                </div>
                <div class="col-12 my-2">
                    <p class="h5">Status</p>
                    <select name="Status" class="form-select">
                        <option value="">Pilih...</option>
                        <option value="admin">Admin</option>
                        <option value="owner">Owner</option>
                    </select>
                </div>
                <button class="btn btn-primary rounded-pill col-12 mt-4" type="submit">Simpan</button>
            </div>
        </form>
    </div>
@endsection
