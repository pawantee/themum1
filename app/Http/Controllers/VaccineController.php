<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vaccine;

class VaccineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vaccines = Vaccine::orderBy('vaccine_id', 'DESC')->paginate();
        return view('vaccines.index', [
            'vaccines' => $vaccines
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vaccines.create');
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

            'name' => 'required|unique:vaccines'
        ]);

        $vaccines = Vaccine::create($request->all());
        return redirect()->route('vaccines.index')->with('status','เพิ่มวัคซีน เรียบร้อยแล้ว.');
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
    public function edit($vaccine_id)
    {

        $vaccines = Vaccine::find($vaccine_id);
        
        return view('vaccines.edit', [
            'vaccines' => $vaccines
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $vaccine_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $vaccine_id)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);
        $vaccine = Vaccine::find($vaccine_id);
        $vaccine->name = $request->name;
        $vaccine->save();

        return redirect()->route('vaccines.index')->with('status','แก้ไขวัคซีนเรียบร้อยแล้ว.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($vaccine_id)
    {
        $vaccine = Vaccine::find($vaccine_id);
        $vaccine->delete();
        return redirect()->route('vaccines.index')->with('status','ลบวัคซีน เรียบร้อยแล้ว.');
    }
}
