@extends('Dashboard.index')
@section('content')
    <div class="row text-center mb-4">
        <a href="{{ route('kelolapengguna.create') }}" class="btn btn-primary col-12 rounded-pill">
            Tambah Pengguna
        </a>
    </div>

    <div class="row">
        {{-- alert --}}
        @if (session()->has('info'))
            <div class="alert alert-success alert-dismissible fade show text-start" role="alert" id="myAlert">
                {{ session()->get('info') }}
            </div>
        @endif
        <table class="table table-dark table-hover">
            <thead>
                <tr class="tex">
                    <th>No</th>
                    <th>Nama Pengguna</th>
                    <th>Email Pengguna</th>
                    <th>Status</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->role }}</td>
                        <td>
                            <a href="{{ route('kelolapengguna.edit', $item->id) }}" class="btn btn-warning">Ubah</a>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger" data-coreui-toggle="modal"
                                data-coreui-target="#exampleModal{{ $item->id }}">
                                Hapus
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel{{ $item->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-black" id="exampleModalLabel">Konfirmasi hapus</h5>
                                            <button type="button" class="btn-close" data-coreui-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-black">
                                            apakah kamu yakin ingin menghapus pengguna ini ?
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{ route('kelolapengguna.destroy', $item->id) }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button type="button" class="btn btn-secondary"
                                                    data-coreui-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    <script>
        $(document).ready(function() {
            // Tunggu 3 detik, lalu sembunyikan alert dengan efek fade
            $("#myAlert").delay(3000).fadeOut("slow");
        });
    </script>
@endsection
