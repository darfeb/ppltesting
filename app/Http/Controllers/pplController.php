<?php

namespace App\Http\Controllers;

use App\Models\ppl;
use Illuminate\Http\Request;

class pplController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ppl::orderBy('id', 'desc')->paginate();
        return view('ppl.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ppl.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'produk' => 'required',
            'kategori' => 'required',
        
        ],[
            'id.required' => 'ID WAJIB DIISI!',
            'produk.required' => 'PRODUK WAJIB DIISI!',
            'kategori.required' => 'KATEGORI WAJIB DIISI!',
        ]);
        $data = [
            'id' => $request->id,
            'produk' => $request->produk,
            'kategori' => $request->kategori,
        ];
        ppl::create($data);
        return redirect()->to('ppl')->with('success', 'berhasil menambahkan data');
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = ppl::where('id', $id)->first();
        return view('ppl.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'produk' => 'required',
            'kategori' => 'required',
        
        ],[
            'produk.required' => 'PRODUK WAJIB DIISI!',
            'kategori.required' => 'KATEGORI WAJIB DIISI!',
        ]);
        $data = [
            'produk' => $request->produk,
            'kategori' => $request->kategori,
        ];
        ppl::where('id', $id)->update($data);
        return redirect()->to('ppl')->with('success', 'berhasil melakukan update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ppl::where('id', $id)->delete();
        return redirect()->to('ppl')->with('success', 'Berhasil melakukan delete data');
    }
}
