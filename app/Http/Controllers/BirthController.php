<?php

namespace App\Http\Controllers;

use App\Person;
use Faker\Factory;
use Illuminate\Http\Request;
use App\Birth;
use Illuminate\Support\Facades\DB;

class BirthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $births = Birth::get();
        return view("birth.index",compact("births"));
    }
    public function createFather(){
        $faker = Factory::create();
        return  Person::create([
            'id_number'=>$faker->randomNumber(),
            'name'=>$faker->name("male"),
            'sex'=>'MALE',
            'date_of_birth'=>$faker->date(),
            'passport_number'=>$faker->randomNumber(),
            'nationality'=>$faker->country,
            'photo'=>$faker->imageUrl($width = 250, $height = 250,null,false,"Passport Photo"),
            'id_card_scan'=>$faker->imageUrl($width = 250, $height = 250,null,false,"ID Card Scan Photo"),
            'address'=>$faker->address]);
    }

    public function createInformant(){
        $faker = Factory::create();
        return  Person::create([
            'id_number'=>$faker->randomNumber(),
            'name'=>$faker->name("male"),
            'sex'=>'MALE',
            'date_of_birth'=>$faker->date(),
            'passport_number'=>$faker->randomNumber(),
            'nationality'=>$faker->country,
            'photo'=>$faker->imageUrl($width = 250, $height = 250,null,false,"Passport Photo"),
            'id_card_scan'=>$faker->imageUrl($width = 250, $height = 250,null,false,"ID Card Scan Photo"),
            'address'=>$faker->address]);
    }

    public function createRegistar(){
        $faker = Factory::create();
        return  Person::create([
            'id_number'=>$faker->randomNumber(),
            'name'=>$faker->name("male"),
            'sex'=>'MALE',
            'date_of_birth'=>$faker->date(),
            'passport_number'=>$faker->randomNumber(),
            'nationality'=>$faker->country,
            'photo'=>$faker->imageUrl($width = 250, $height = 250,null,false,"Passport Photo"),
            'id_card_scan'=>$faker->imageUrl($width = 250, $height = 250,null,false,"ID Card Scan Photo"),
            'address'=>$faker->address]);
    }


    public function createMother(){
        $faker = Factory::create();
        return  Person::create([
            'id_number'=>$faker->randomNumber(),
            'name'=>$faker->name("female"),
            'sex'=>'FEMALE',
            'date_of_birth'=>$faker->date(),
            'passport_number'=>$faker->randomNumber(),
            'nationality'=>$faker->country,
            'photo'=>$faker->imageUrl($width = 250, $height = 250,null,false,"Passport Photo"),
            'id_card_scan'=>$faker->imageUrl($width = 250, $height = 250,null,false,"ID Card Scan Photo"),
            'address'=>$faker->address]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        DB::beginTransaction();
        try {
            $faker = Factory::create();
            $father= $this->createFather();
            $mother= $this->createMother();
            $informer = $this->createInformant();
            $registar = $this->createRegistar();
            $person = Person::create([
                'id_number'=>$faker->randomNumber(),
                'name'=>$faker->name("female"),
                'sex'=>'FEMALE',
                'date_of_birth'=>$faker->date(),
                'passport_number'=>$faker->randomNumber(),
                'nationality'=>$faker->country,
                'photo'=>$faker->imageUrl($width = 250, $height = 250,null,false,"Passport Photo"),
                'id_card_scan'=>$faker->imageUrl($width = 250, $height = 250,null,false,"ID Card Scan Photo"),
                'address'=>$faker->address]);
            Birth::create([
                'pid_number'=>$person->id_number,
                'certificate_number'=>$faker->randomNumber(),
                'place_of_birth'=>$faker->country,
                'hospital_of_birth'=>$faker->company,
                'father_id_number'=>$father->id_number,
                'mother_id_number'=>$mother->id_number,
                'informant_id_number'=>$informer->id_number,
                'registrar_id_number'=>$registar->id_number,
                'date_of_birth'=>$faker->date(),
                'date_of_issue'=>$faker->date()]);
            DB::commit();
            return redirect()->route('birth.index');
        }catch (\Throwable $e){
            DB::rollBack();
            return redirect()->route('birth.index');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
