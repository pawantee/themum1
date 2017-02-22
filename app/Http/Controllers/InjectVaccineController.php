<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InjectVaccine;
use App\Models\Statused;
use App\Models\Kid;
use App\Models\Vaccine;

class InjectVaccineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $injectvaccines = InjectVaccine::orderBy('vaccine_id', 'DESC')->paginate();

        return view('injectvaccines.index', [
            'injectvaccines' => $injectvaccines
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $statused = Statused::all();
        
        return view('injectvaccines.create', [
            'statused' => $statused
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
            'kid_id' => 'required',
            'vaccine_id' => 'required',
            'date_d' => 'required|date_format:"d/m/Y"',
            'status' => 'required',
        ]);
         // dd($request);
        $injectvaccines = InjectVaccine::create([
            'kid_id' => $request->kid_id,
            'vaccine_id' => $request->vaccine_id,
            'date_d' => $request->date_d,
            'status' => $request->status,
        ]);

        return redirect()->route('injectvaccines.index')->with('status','เพิ่มการฉีดวัคซีน เรียบร้อยแล้ว.');
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
    public function edit($no)
    {
        $statused = Statused::all();
        $injectvaccines = InjectVaccine::find($no);
        return view('injectvaccines.edit', [
            'injectvaccine' => $injectvaccines,
            'statused' => $statused
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $no)
    {
        
        $this->validate($request, [
            'kid_id' => 'required',
            'vaccine_id' => 'required',
            'date_d' => 'required|date_format:"d/m/Y"',
            'status' => 'required',
        ]);

        $injectvaccine = InjectVaccine::find($no);
        $injectvaccine->kid_id = $request->kid_id;
        $injectvaccine->vaccine_id = $request->vaccine_id;
        $injectvaccine->date_d = $request->date_d;
        $injectvaccine->status = $request->status;

        $injectvaccine->save();
        return redirect()->route('injectvaccines.index')->with('status','แก้ไขข้อมูลการฉีดวัคซีน เรียบร้อยแล้ว.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($no)
    {
        $injectvaccines = InjectVaccine::find($no);
        $injectvaccines->delete();
        return redirect()->route('injectvaccines.index')->with('status','ลบข้อมูล การฉีดวัคซีน เรียบร้อยแล้ว.');
    }

    public function kidapi(Request $request)
    {
        $query = $request->get('term','');
        $kids = Kid::where('name_kid', 'LIKE', '%'.$query.'%')->get();
        $kids = $kids->unique('name_kid')->values()->all();
        $data = array();

        foreach ($kids as $kid) {
            $data[] = array('value' => $kid->name_kid, 'id' => $kid->kid_id);
        }

        if(count($data)) {
            return $data;
        }
        else {
            return ['value' => 'ไม่มีชื่อนี้ ในระบบ','id'=>''];
        }
    }

    public function vaccineapi(Request $request)
    {
        $query = $request->get('term','');
        $vaccines = Vaccine::where('name', 'LIKE', '%'.$query.'%')->get();
        $vaccines = $vaccines->unique('name_kid')->values()->all();
        $data = array();

        foreach ($vaccines as $vaccine) {
            $data[] = array('value' => $vaccine->name, 'id' => $vaccine->vaccine_id);
        }

        if(count($data)) {
            return $data;
        }
        else {
            return ['value' => 'ไม่มีชื่อนี้ ในระบบ','id'=>''];
        }
    }


}
