@extends('Dashboard.index')
@section('content')
    <div class="row">
        <form action="{{ route('kelolapengguna.update', [$user->id]) }}" method="POST">
            @method('PATCH')
            @csrf
            <div class="row">
                <div class="col-12 my-2">
                    <p for="" class="h5">Nama</p>
                    <input type="text" class="form-control" name="Nama" autofocus placeholder="Masukan nama..."
                        value="{{ $user->name }}">
                </div>
                <div class="col-12 my-2">
                    <p for="" class="h5">Email</p>
                    <input type="email" class="form-control" name="Email" placeholder="Masukan email..."
                        value="{{ $user->email }}">
                </div>
                <div class="col-12 my-2">
                    <p for="" class="h5">Password Baru</p>
                    <input type="password" class="form-control" name="Password" placeholder="Masukan password baru...">
                </div>
                <div class="col-12 my-2">
                    <p class="h5">Status</p>
                    <select name="Status" class="form-select">
                        <option value="">Pilih...</option>
                        <option value="admin" @if ($user->role === 'admin') selected @endif>Admin</option>
                        <option value="owner" @if ($user->role === 'owner') selected @endif>Owner</option>
                    </select>
                </div>
                <button class="btn btn-primary rounded-pill col-12 mt-4" type="submit">Simpan</button>
            </div>
        </form>
    </div>
@endsection
