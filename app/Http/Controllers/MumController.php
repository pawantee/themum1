<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mum;

class MumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        if ($keyword) {
            $mums = Mum::where(function ($query) use ($keyword) {
                $query->where('name_mum', "LIKE", '%'.$keyword.'%')
                      ->orWhere("crad", "LIKE", '%'.$keyword.'%')
                      ->orWhere("name_fathter", "LIKE", '%'.$keyword.'%')
                      ->orWhere("crad_father", "LIKE", '%'.$keyword.'%');
            })->orderBy('id_mum', 'DESC')->paginate();
        } 
        else {
            $mums = Mum::orderBy('id_mum', 'DESC')->paginate();
        }

        return view('mums.index', [
            'mums' => $mums
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mums = Mum::all();

        return view('mums.create', [
            'mums' => $mums
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
        $this->validate($request, [
            'name_mum' => 'required',
            'crad' => 'required|integer|min:13|unique:mums',
            'profession_mum' => 'required',
            'religion_mum' => 'required',
            'study_mum' => 'required',
            'tel_mum' => 'required|min:10',

            'name_fathter' => 'required',
            'crad_father' => 'required|integer|min:13|unique:mums',
            'profession_fathter' => 'required',
            'religion_fathter' => 'required',
            'study_fathter' => 'required',
            'tel_fathter' => 'required|min:10',
            'address' => 'required',
            'zipcod' => 'required|integer|min:4',
            // integer
        ]);

        $mums = Mum::create($request->all());

        return redirect()->route('mums.index')->with('status','เพิ่มประวัติ เรียบร้อยแล้ว.');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_mum)
    {
        $mums = Mum::find($id_mum);
        
        return view('mums.view', [
            'mums' => $mums
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_mum)
    {
        $mums = Mum::find($id_mum);
        
        return view('mums.edit', [
            'mums' => $mums
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_mum)
    {
        $this->validate($request, [
            'name_mum' => 'required',
            'crad' => 'required',
            'profession_mum' => 'required',
            'religion_mum' => 'required',
            'study_mum' => 'required',
            'tel_mum' => 'required',
            'name_fathter' => 'required',
            'crad_father' => 'required',
            'profession_fathter' => 'required',
            'religion_fathter' => 'required',
            'study_fathter' => 'required',
            'tel_fathter' => 'required',
            'address' => 'required',
            'zipcod' => 'required',
        ]);

        $mum = Mum::find($id_mum);
        $mum->name_mum = $request->name_mum;
        $mum->crad = $request->crad;
        $mum->profession_mum = $request->profession_mum;
        $mum->religion_mum = $request->religion_mum;
        $mum->study_mum = $request->study_mum;
        $mum->tel_mum = $request->tel_mum;
        $mum->name_fathter = $request->name_fathter;
        $mum->crad_father = $request->crad_father;
        $mum->profession_fathter = $request->profession_fathter;
        $mum->religion_fathter = $request->religion_fathter;
        $mum->study_fathter = $request->study_fathter;
        $mum->tel_fathter = $request->tel_fathter;
        $mum->address = $request->address;
        $mum->zipcod = $request->zipcod;

        $mum->save();
        return redirect()->route('mums.index')->with('status','แก้ไขประวัติ เรียบร้อยแล้ว.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_mum)
    {
        $mum = Mum::find($id_mum);
        $mum->delete();
        return redirect()->route('mums.index')->with('status','ลบประวัติ เรียบร้อยแล้ว.');
    }
}