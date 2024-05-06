<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Seluruh Daerah</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Luas Lahan</th>
                            <th>Kelompok Tani</th>
                            <th>Alamat Ubinan</th>
                            <th>GKP</th>
                            <th>GKG</th>
                            <th>Hasil Produksi</th>
                            <th>Detail Hasil Produksi</th>
                            <th>URL Lokasi</th>
                            <th>Kecamatan</th>
                            <th>Kelurahan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hasil as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->luas_lahan }}</td>
                                <td>{{ $item->kelompok_tani }}</td>
                                <td>{{ $item->alamat_ubinan }}</td>
                                <td>{{ $item->gkp }}</td>
                                <td>{{ $item->gkg }}</td>
                                <td>{{ $item->hasil_produksi }}</td>
                                <td>{{ $item->detail_hasil_produksi }}</td>
                                <td>{{ $item->url_lokasi }}</td>
                                <td>{{ isset($item->kecamatan->nama) ? $item->kecamatan->nama : '' }}</td>
                                <td>{{ isset($item->kelurahan->nama) ? $item->kelurahan->nama : '' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>