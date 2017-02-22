<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kid; 
use App\Models\Mum; 

class KidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kids = Kid::orderBy('kid_id', 'DESC')->paginate();;

        return view('kids.index', [
            'kids' => $kids
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
        $kids = Kid::all();
        return view('kids.create', [
            'mums' => $mums,
            'kids' => $kids
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
            'name_kid' => 'required',
            'date_d' => 'required',
            'card_kid' => 'required|integer|min:13|unique:kids',
            'blood_group' => 'required',

            'blood_group' => 'required',
            'weight' => 'required',
            'length' => 'required',

            'head' => 'required',
            'anomaly' => 'required',
            'health' => 'required',
            'mum_id' => 'required',
        ]);

        $kids = Kid::create($request->all());

        return redirect()->route('kids.index')->with('status','เพิ่มประวัติ เรียบร้อยแล้ว.');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($kid_id)
    {
        $kid = Kid::find($kid_id);
        
        return view('kids.view', [
            'kid' => $kid
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($kid_id)
    {
        $kid = Kid::find($kid_id);
        
        return view('kids.edit', [
            'kid' => $kid
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $kid_id)
    {
        $this->validate($request, [
            'name_kid' => 'required',
            'date_d' => 'required|date_format:"d/m/Y"',
            'card_kid' => 'required',
            'blood_group' => 'required',
            'weight' => 'required',
            'length' => 'required',
            'head' => 'required',
            'anomaly' => 'required',
            'health' => 'required',
            'mum_id' => 'required',
        ]);

        $kid = Kid::find($kid_id);
        $kid->name_kid = $request->name_kid;
        $kid->date_d = $request->date_d;
        $kid->card_kid = $request->card_kid;
        $kid->blood_group = $request->blood_group;
        $kid->weight = $request->weight;
        $kid->length = $request->length;
        $kid->head = $request->head;
        $kid->anomaly = $request->anomaly;
        $kid->health = $request->health;
        $kid->mum_id = $request->mum_id;

        $kid->save();
        return redirect()->route('kids.index')->with('status','แก้ไขข้อมูลเด็ก เรียบร้อยแล้ว.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kid_id)
    {
        $kid = Kid::find($kid_id);
        $kid->delete();
        return redirect()->route('kids.index')->with('status','ลบข้อมูล เรียบร้อยแล้ว.');
    }

    public function autocomplete(Request $request)
    {
        $query = $request->get('term','');
        $mums = Mum::where('name_mum', 'LIKE', '%'.$query.'%')->get();
        $mums = $mums->unique('name_mum')->values()->all();
        $data = array();

        foreach ($mums as $mum) {
            $data[] = array('value' => $mum->name_mum, 'id' => $mum->id_mum);
        }

        if(count($data)) {
            return $data;
        }
        else {
            return ['value' => 'ไม่มีชื่อนี้ ในระบบ','id'=>''];
        }
    }
}
