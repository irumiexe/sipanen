<?php

namespace App\Http\Controllers;

use Image;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\HasilPanen;
use Illuminate\Http\Request;
use App\Models\FotoHasilPanen;
use App\DataTables\HasilPanenDataTable;
use Illuminate\Support\Facades\File;

class HasilPanenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(HasilPanenDataTable $table)
    {
        return $table->render('templates.datatable', [
            'title' => "Hasil Panen",
            'buttons' => ''
        ]);
    }

    public function hasilPanenGuest(HasilPanenDataTable $table)
    {
        return $table->with('guest', 'guest')->render('hasil-panen', [
            'title' => 'Hasil Panen'
        ]);
    }

    public function showDaerah(HasilPanenDataTable $table, $namaDaerah = null)
    {
        $title = "Hasil Panen";
        switch ($namaDaerah) {
            case 'tengah':
                $namaDaerah = 'Banjarmasin Tengah';
                $title = "Hasil Panen daerah Banjarmasin Tengah";
                break;

            case 'selatan':
                $namaDaerah = 'Banjarmasin Selatan';
                $title = "Hasil Panen daerah Banjarmasin Selatan";
                break;

            case 'utara':
                $namaDaerah = 'Banjarmasin Utara';
                $title = "Hasil Panen daerah Banjarmasin Utara";
                break;

            case 'barat':
                $namaDaerah = 'Banjarmasin Barat';
                $title = "Hasil Panen daerah Banjarmasin Barat";
                break;

            case 'timur':
                $namaDaerah = 'Banjarmasin Timur';
                $title = "Hasil Panen daerah Banjarmasin Timur";
                break;

            default:
                break;
        }

        $kecamatan = Kecamatan::where('nama', $namaDaerah)->first();

        return $table->with('kecamatan_id', $kecamatan->id)->render('templates.datatable', [
            'title' => $title,
            'buttons' => ''
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.hasil-panen.create', [
            'title' => 'Tambah Hasil Panen',
            'kecamatan' => \App\Models\Kecamatan::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hasil = new HasilPanen();
        $daerah = Kecamatan::where('id', $request->kecamatan_id)->first();

        $hasil->luas_lahan = $request->luas_lahan;
        $hasil->kelompok_tani = $request->kelompok_tani;
        $hasil->alamat_ubinan = $request->alamat_ubinan;
        $hasil->gkp = $request->gkp;
        $hasil->gkg = $request->gkg;
        $hasil->hasil_produksi = $request->hasil_produksi;
        $hasil->detail_hasil_produksi = $request->detail_hasil_produksi;
        $hasil->url_lokasi = $request->url_lokasi;
        $hasil->kecamatan_id = $request->kecamatan_id;
        $hasil->kelurahan_id = $request->kelurahan_id;

        $hasil->save();

        if ($request->foto) {
            for ($i = 0; $i < count($request->foto); $i++) {
                $file = $request->file('foto')[$i];
                $photo = Image::make($file->getPathName());
                $path = 'img/hasil-panen/' . time() . "_" . $file->getClientOriginalName();
                $photoUrl = $photo->save(public_path($path), 50);

                FotoHasilPanen::create([
                    'nama' => $path,
                    'hasil_panen_id' => $hasil->id
                ]);
            }
        }

        switch ($daerah->nama) {
            case 'Banjarmasin Tengah':
                return redirect()->route('admin.hasil-panen.showDaerah', 'tengah')->with('success', 'Data Hasil Panen di daerah Banjarmasin Tengah berhasil ditambahkan!');
                break;

            case 'Banjarmasin Selatan':
                return redirect()->route('admin.hasil-panen.showDaerah', 'selatan')->with('success', 'Data Hasil Panen di daerah Banjarmasin Selatan berhasil ditambahkan!');
                break;

            case 'Banjarmasin Utara':
                return redirect()->route('admin.hasil-panen.showDaerah', 'utara')->with('success', 'Data Hasil Panen di daerah Banjarmasin Utara berhasil ditambahkan!');
                break;

            case 'Banjarmasin Barat':
                return redirect()->route('admin.hasil-panen.showDaerah', 'barat')->with('success', 'Data Hasil Panen di daerah Banjarmasin Barat berhasil ditambahkan!');
                break;
            case 'Banjarmasin Timur':
                return redirect()->route('admin.hasil-panen.showDaerah', 'timur')->with('success', 'Data Hasil Panen di daerah Banjarmasin Timur berhasil ditambahkan!');
                break;
            default:
                break;
        }

        return redirect()->route('admin.hasil-panen.index')->with('success', 'Berhasil menambahkan hasil panen');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HasilPanen  $hasilPanen
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hasilPanen = HasilPanen::findOrFail($id);
        $kelurahan = Kelurahan::where('id', $hasilPanen->kelurahan_id)->first();
        $kecamatan = Kecamatan::where('id', $hasilPanen->kecamatan_id)->first();
        $urlback = '';
        switch ($kecamatan->nama) {
            case 'Banjarmasin Tengah':
                $urlback = route('admin.hasil-panen.showDaerah', 'tengah');
                break;

            case 'Banjarmasin Selatan':
                $urlback = route('admin.hasil-panen.showDaerah', 'selatan');
                break;

            case 'Banjarmasin Utara':
                $urlback = route('admin.hasil-panen.showDaerah', 'utara');
                break;

            case 'Banjarmasin Barat':
                $urlback = route('admin.hasil-panen.showDaerah', 'barat');
                break;

            case 'Banjarmasin Timur':
                $urlback = route('admin.hasil-panen.showDaerah', 'timur');
                break;

            default:
                break;
        }
        return view('auth.hasil-panen.show', [
            'title' => 'Detail Hasil Panen',
            'data' => $hasilPanen,
            'kecamatan' => $kecamatan,
            'kelurahan' => $kelurahan,
            'urlback' => $urlback,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HasilPanen  $hasilPanen
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hasilPanen = HasilPanen::findOrFail($id);
        $kecamatan = Kecamatan::all();
        $namaDaerah = Kecamatan::where('id', $hasilPanen->kecamatan_id)->first()->nama;
        $kelurahan = Kelurahan::where('kecamatan_id', $hasilPanen->kecamatan_id)->get();

        $urlback = '';
        switch ($namaDaerah) {
            case 'Banjarmasin Tengah':
                $urlback = route('admin.hasil-panen.showDaerah', 'tengah');
                break;

            case 'Banjarmasin Selatan':
                $urlback = route('admin.hasil-panen.showDaerah', 'selatan');
                break;

            case 'Banjarmasin Utara':
                $urlback = route('admin.hasil-panen.showDaerah', 'utara');
                break;

            case 'Banjarmasin Barat':
                $urlback = route('admin.hasil-panen.showDaerah', 'barat');
                break;

            default:
                break;
        }
        return view('auth.hasil-panen.edit', [
            'title' => 'Edit Hasil Panen',
            'data' => $hasilPanen,
            'kecamatan' => $kecamatan,
            'kelurahan' => $kelurahan,
            'urlback' => $urlback,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HasilPanen  $hasilPanen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $hasil = HasilPanen::findOrFail($id);

        $hasil->luas_lahan = $request->luas_lahan;
        $hasil->kelompok_tani = $request->kelompok_tani;
        $hasil->alamat_ubinan = $request->alamat_ubinan;
        $hasil->gkp = $request->gkp;
        $hasil->gkg = $request->gkg;
        $hasil->hasil_produksi = $request->hasil_produksi;
        $hasil->detail_hasil_produksi = $request->detail_hasil_produksi;
        $hasil->url_lokasi = $request->url_lokasi;
        $hasil->kecamatan_id = $request->kecamatan_id;
        $hasil->kelurahan_id = $request->kelurahan_id;

        if ($request->file_checked) {
            foreach ($request->file_checked as $key => $value) {
                $foto = FotoHasilPanen::findOrFail($key);
                if (File::exists(public_path($foto->nama))) {
                    File::delete(public_path($foto->nama));
                }
                $foto->delete();
            }
        }

        if ($request->foto) {
            foreach ($request->foto as $key => $value) {
                if ($value != null) {
                    $file = $request->file('foto')[$key];
                    $photo = Image::make($file->getPathName());
                    $path = 'img/hasil-panen/' . time() . "_" . $file->getClientOriginalName();
                    $photoUrl = $photo->save(public_path($path), 50);

                    FotoHasilPanen::create([
                        'nama' => $path,
                        'hasil_panen_id' => $hasil->id
                    ]);
                }
            }
        }

        $hasil->save();

        return redirect()->back()->with('success', 'Berhasil mengubah hasil panen');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HasilPanen  $hasilPanen
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hasil = HasilPanen::findOrFail($id);
        $hasil->delete();

        return redirect()->back()->with('success', 'Berhasil menghapus hasil panen');
    }

    public function getHasilPanen($id)
    {
        $hasil = HasilPanen::where('id', $id)->with(['kelurahan', 'kecamatan', 'foto_hasil'])->first();
        return response()->json($hasil);
    }
}
