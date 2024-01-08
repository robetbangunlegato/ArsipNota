@extends('Dashboard.index')
@section('content')
    @if (auth()->user()->role == 'admin')
        <div class="row text-center">
            <a href="{{ route('arsipnota.create') }}" class="btn btn-primary col-12 rounded-pill">
                Arsipkan Nota
            </a>
        </div>
    @endif
    @if (auth()->user()->role == 'owner')
        <form action="{{ route('cari') }}" method="get">
            <div class="row mt-3">
                <div class="col-10">
                    <input type="text" class="form-control rounded-pill" name="tanggal">
                </div>
                <button class="btn btn-outline-info col-2 rounded-pill">Cari</button>
            </div>
        </form>
    @endif

    {{-- alert --}}
    @if (session()->has('info'))
        <div class="alert alert-success alert-dismissible fade show mt-3 text-start" role="alert" id="myAlert">
            {{ session()->get('info') }}
        </div>
    @endif
    <div class="row mt-4">
        <table class="table table-dark table-hover">
            <thead>
                <tr class="tex">
                    <th>No</th>
                    <th>Tanggal Arsip</th>
                    <th>Tanggal Nota</th>
                    <th>File Nota</th>
                    <th>Keterangan</th>
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
                        <td>{{ $item->tanggalarsip }}</td>
                        <td>{{ $item->tanggalnota }}</td>
                        <td class="row">
                            <a href="storage/storage/{{ $item->foto }}" class="btn btn-info col-4"
                                type="button">Lihat</a>
                            {{-- tombol unduh --}}
                            <a href="{{ route('download', ['filename' => $item->foto]) }}" class="btn btn-success col-3"
                                type="button" target="_blank"><i class="bi bi-file-earmark-arrow-down"></i></a>
                        </td>
                        <td>{{ $item->keterangan }}</td>
                        <td>
                            <a href="{{ route('arsipnota.edit', $item->id) }}" class="btn btn-warning">Ubah</a>
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
                                            apakah kamu yakin ingin menghapus arsip ini ?
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{ route('arsipnota.destroy', $item->id) }}" method="post">
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
