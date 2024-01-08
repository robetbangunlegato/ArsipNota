@extends('Dashboard.index')
@section('content')
    <div class="container">
        <form action="{{ route('arsipnota.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="row">
                <div class="col-6">
                    <p for="" class="h5 mb-2">Tanggal Arsip</p>
                    <input type="date" class="form-control" name="TanggalArsip">
                </div>
                <div class="col-6">
                    <p for="" class="h5 mb-2">Tanggal Nota</p>
                    <input type="date" class="form-control" name="TanggalNota">
                </div>
                <div class="col-6">
                    <p class="h5 mt-2">Foto Nota</p>
                    <input type="file" class="form-control" name="foto" id="foto" onchange="PratinjauGambar()">
                </div>
                <div class="col-6">
                    <p class="h5 mt-2">Keterangan</p>
                    <input type="text" class="form-control" name="Keterangan">
                </div>
                <img src="" class="pratinjau-gambar m-3 img-fluid" alt="" style="max-width: 50em">
                <button class="btn btn-primary rounded-pill col-12" type="submit">Simpan</button>
            </div>
        </form>
    </div>
    <script>
        // pratinjau gambar
        function PratinjauGambar() {
            // 1.mencari input file dengan ID 'foto'
            const input_foto = document.querySelector('#foto');

            // 2.mencari sebuah tag <img> yang memiliki class 'pratinjau-gambar'
            const buka_foto = document.querySelector('.pratinjau-gambar');

            if (input_foto.files && input_foto.files[0]) {
                // 3.melakukan un-hide tag <img> yang sebelumnya di hide agar tidak terlihat ketika user belum memilih file menjadi terlihat ketika file sudah dipilih.
                buka_foto.style.display = 'block';

                // 4.membuat variabel untuk memanggil fungsi constructor 'FileReader()' pada constructor agar fungsi 'readAsDataURL()' dapat digunakan.
                const Reader = new FileReader();

                // 5.pada saat user memilih banyak foto maka indeks ke 0 atau foto pertama yang akan dibaca pada pratinjau ini
                Reader.readAsDataURL(input_foto.files[0]);

                // 6.setelah file di baca, file ditampilkan ke dalam halaman web agar bisa di lihat oleh user.
                Reader.onload = function(oFREvent) {
                    buka_foto.src = oFREvent.target.result;
                }
            } else {
                buka_foto.style.display = 'none';
                buka_foto.src = '';
            }
        }
    </script>
@endsection
