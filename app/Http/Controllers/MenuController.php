<?php

namespace App\Http\Controllers;

use Exception;
use PDOException;
use App\Models\Menu;
use App\Models\Jenis;
use App\Exports\MenuExport;
use App\Imports\MenuImport;
use App\Http\Requests\MenuRequest;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $data['menu'] = Menu::orderBy('created_at', 'ASC')->get();

            return view('menu.index', ['title' => 'Menu'])->with($data);
        } catch (QueryException | Exception | PDOException $error) {
            // $this->failResponse($error->getMessage(), $error->getCode());
            return 'haha error' . $error->getMessage() . $error->getCode();
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
    public function store(MenuRequest $request)
    {
        // dd($request);
        // mengambil file gambar dari form modal
        $image = $request->file('image');
        // buat nama file
        $filename = time() . '.' . $image->getClientOriginalName();
        // buat alamat folder untuk penyimpanan file
        $path = 'menu-image/' . $filename;
        // menyimpan file 'gambar' ke dalam storage
        Storage::disk('public')->put($path, file_get_contents($image));

        // memasukan semua file dari request form modal kedalam variable data
        $data['jenis_id'] = $request->jenis_id;
        $data['nama_menu'] = $request->nama_menu;
        $data['harga'] = $request->harga;
        $data['image'] = $filename;
        $data['deskripsi'] = $request->deskripsi;

        try {

            Menu::create($data); //query input ke table
            return redirect('menu')->with('success', 'Data menu berhasil!');
        } catch (QueryException | Exception | PDOException $error) {

            // $this->failResponse($error->getMessage(), $error->getCode());
            return 'haha error' . $error->getMessage() . $error->getCode();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MenuRequest $request, $id)
    {
        try {
            // Validasi data yang dikirimkan
            $validatedData = $request->validated();

            // Cek apakah ada file gambar yang diunggah
            if ($request->hasFile('image')) {
                // Dapatkan file gambar yang diunggah
                $image = $request->file('image');

                // Buat nama file baru berdasarkan timestamp
                $filename = time() . '.' . $image->getClientOriginalName();

                // Simpan file gambar baru ke dalam penyimpanan
                $path = 'menu-image/' . $filename;
                Storage::disk('public')->put($path, file_get_contents($image));

                // Hapus gambar lama dari penyimpanan jika ada
                $menu = Menu::find($id);
                Storage::disk('public')->delete($menu->image);

                // Update nilai gambar dalam data yang akan disimpan
                $validatedData['image'] = $filename;
            }

            // Update data menu dengan menggunakan $id
            Menu::find($id)->update($validatedData);

            // Redirect kembali ke halaman menu dengan pesan sukses
            return redirect('menu')->with('success', 'Update data berhasil!');
        } catch (Exception $error) {
            // Tangani kesalahan jika terjadi
            return 'haha error' . $error->getMessage() . $error->getCode();
        }
    }





    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        try {
            $menu->delete();
            return redirect('menu')->with(
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
        return Excel::download(new MenuExport, $date . 'menu.xlsx');
    }
    public function importData()
    {
        try {
            Excel::import(new MenuImport, request()->file('import'));

            return redirect('menu')->with('success', 'Import Data berhasil!');
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            return redirect('menu')->with('error', 'Terjadi kesalahan saat mengimpor data: ' . $e->getMessage());
        }
    }
}
