<?php

namespace App\Http\Controllers;

use App\Education;
use App\Traits\PDCUtilityTrait;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    use PDCUtilityTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $education = Education::get();
        $levels = ["TERTIARY","UNDER-GRADUATE","POST-GRADUATE"];
        $institutions = ["STRATHMORE UNIVERSITY","STRATHMORE SCHOOL","STRATHMORE COLLEGE"];
        return view("education.index",compact("education","levels","institutions"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!$request->has("ACTION")){
            //No Action found
            return redirect()->route('education.index');
        }
        $action = $request->get("ACTION");
        if($action === "addEduRecord"){
            $idNumber = trim($request->get("idNumber"));
            $level = trim($request->get("level"));
            $institution = trim($request->get("institution"));
            $start_date = trim($request->get("start_date"));
            $end_date = trim($request->get("end_date"));
            $grade = trim($request->get("grade"));
            $educationRecord = Education::create([
                'pid_number'=>$idNumber,
                'level'=>$level,
                'institution'=>$institution,
                'start_date'=>$start_date,
                'end_date'=>$end_date,
                'grade'=>$grade
            ]);
            $res = $this->queryBlockchain($idNumber);
            if(count($res) === 1){
                $this->commitToBlockchain($educationRecord);
                return redirect()->route('education.index');
            }else{
                //Student record not found
                return redirect()->route('education.index');
            }
        }


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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
