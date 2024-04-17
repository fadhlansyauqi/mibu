<?php

namespace App\Http\Controllers;

use App\Models\DataNifas;
use Illuminate\Http\Request;

class DataNifasController extends Controller
{
    public function index(Request $request)
    {
        $search      = $request->input('search');
        $perPage     = $request->input('per_page', 5);
        $data_nifas  = DataNifas::where('nama', 'like', "%$search%")->paginate($perPage);
        $currentPage = $data_nifas->currentPage();
        return view('data-nifas', compact('data_nifas', 'currentPage'));
    }

    public function create()
    {
        return view('create-data-nifas');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal'                   => 'required',
            'nama'                      => 'required',
            'kunjungan_nifas'           => 'required',
            'hasil_periksa_payudara'    => 'required',
            'hasil_periksa_pendarahan'  => 'required',
            'hasil_periksa_jalan_lahir' => 'required',
            'vitamin_a'                 => 'required',
            'masalah'                   => 'required',
            'tindakan'                  => 'required',
        ], [
            'tanggal.required'                   => 'Tanggal wajib diisi.',
            'nama.required'                      => 'Nama wajib diisi.',
            'kunjungan_nifas.required'           => 'Kunjungan Nifas wajib diisi.',
            'hasil_periksa_payudara.required'    => 'Hasil Periksa Payudara wajib diisi.',
            'hasil_periksa_pendarahan.required'  => 'Hasil Periksa Pendarahan wajib diisi.',
            'hasil_periksa_jalan_lahir.required' => 'Hasil Periksa Jalan Lahir wajib diisi.',
            'vitamin_a.required'                 => 'Vitamin A wajib diisi.',
            'masalah.required'                   => 'Masalah wajib diisi.',
            'tindakan.required'                  => 'Tindakan wajib diisi.',
        ]);
        

        DataNifas::create($request->all());
        toast('Data Berhasil Ditambahkan','success');
        return redirect()->route('data-nifas.index');
    }

    public function edit($id)
    {
        $data_nifas = DataNifas::find($id);
        return view('edit-data-nifas', compact('data_nifas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal'                   => 'required',
            'nama'                      => 'required',
            'kunjungan_nifas'           => 'required',
            'hasil_periksa_payudara'    => 'required',
            'hasil_periksa_pendarahan'  => 'required',
            'hasil_periksa_jalan_lahir' => 'required',
            'vitamin_a'                 => 'required',
            'masalah'                   => 'required',
            'tindakan'                  => 'required',
        ], [
            'tanggal.required'                   => 'Tanggal wajib diisi.',
            'nama.required'                      => 'Nama wajib diisi.',
            'kunjungan_nifas.required'           => 'Kunjungan Nifas wajib diisi.',
            'hasil_periksa_payudara.required'    => 'Hasil Periksa Payudara wajib diisi.',
            'hasil_periksa_pendarahan.required'  => 'Hasil Periksa Pendarahan wajib diisi.',
            'hasil_periksa_jalan_lahir.required' => 'Hasil Periksa Jalan Lahir wajib diisi.',
            'vitamin_a.required'                 => 'Vitamin A wajib diisi.',
            'masalah.required'                   => 'Masalah wajib diisi.',
            'tindakan.required'                  => 'Tindakan wajib diisi.',
        ]);
        
        $data_nifas                            = DataNifas::find($id);
        $data_nifas->tanggal                   = $request->tanggal;
        $data_nifas->nama                      = $request->nama;
        $data_nifas->kunjungan_nifas           = $request->kunjungan_nifas;
        $data_nifas->hasil_periksa_payudara    = $request->hasil_periksa_payudara;
        $data_nifas->hasil_periksa_pendarahan  = $request->hasil_periksa_pendarahan;
        $data_nifas->hasil_periksa_jalan_lahir = $request->hasil_periksa_jalan_lahir;
        $data_nifas->vitamin_a                 = $request->vitamin_a;
        $data_nifas->masalah                   = $request->masalah;
        $data_nifas->tindakan                  = $request->tindakan;
        $data_nifas->save();

        toast('Data Berhasil Diubah','success');
        return redirect()->route('data-nifas.index');
    }

    public function delete($id)
    {
        $data_nifas = DataNifas::find($id);
        $data_nifas->delete();
        toast('Data Berhasil Dihapus','success');
        return redirect(route('data-nifas.index'));
    }
}