<?php

namespace App\Http\Controllers;

use App\Exports\AbsensiExport;
use App\Models\AbsensiKerja;
use Exception;
use PDOException;
use Illuminate\Database\QueryException;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AbsensiKerjaExport;
use App\Imports\AbsensiImport;
use App\Http\Requests\AbsensiKerjaRequest;

class AbsensiKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            // Menampilkan data jenis dengan eager loading untuk kategori   
            $data['absensi_kerja'] = AbsensiKerja::orderBy('created_at', 'DESC')->get();

            return view('absensi.index', ['title' => 'Absensi'])->with($data);
        } catch (QueryException | Exception | PDOException $error) {
            // $this->failResponse($error->getMessage(), $error->getCode());
            return 'ERRORNYOO' . $error->getMessage() . $error->getCode();
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AbsensiKerjaRequest $request)
    {

        try {

            AbsensiKerja::create($request->all()); //query input ke table
            return redirect('absensi_kerja')->with('success', 'Data Absensi berhasil!');
        } catch (QueryException | Exception | PDOException $error) {

            // $this->failResponse($error->getMessage(), $error->getCode());
            return 'ERRORNYOOOO' . $error->getMessage() . $error->getCode();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(AbsensiKerja $absensiKerja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AbsensiKerja $absensiKerja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AbsensiKerjaRequest $request, $id)
    {

        try {
            // Validasi data yang dikirimkan
            $validatedData = $request->validated();

            // Update data absensi dengan menggunakan $id
            AbsensiKerja::find($id)->update($validatedData);

            return redirect('absensi_kerja')->with('success', 'Update data berhasil!');
        } catch (Exception $error) {
            // Tangani kesalahan jika terjadi
            return 'haha error' . $error->getMessage() . $error->getCode();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AbsensiKerja $absensiKerja)
    {
        try {
            $absensiKerja->delete();
            return redirect('absensi_kerja')->with(
                'success',
                'Data berhasil dihapus!'
            );
        } catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getMessage() . $error->getCode());
        }
    }

    public function exportData()
    {
        $date = date('Y-m-d');
        return Excel::download(new AbsensiExport, $date . 'absensi.xlsx');
    }

    public function importData()
    {
        Excel::import(new AbsensiImport, request()->file('import'));
        return redirect(request()->file('import'));
    }
}
