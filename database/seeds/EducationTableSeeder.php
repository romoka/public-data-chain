<?php

use App\Birth;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Seeder;

class EducationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $birth = Birth::first();
        //foreach ($births as $birth){
            $pid_number = $birth->pid_number;
            $level = "UNDERGRADUATE";
            $institution = "STRATHMORE UNIVERSITY";
            $start_date = Carbon::now()->subYears(4);
            $end_date = Carbon::now();
            $grade = "BSc. Computer Science & Engineering";
            DB::table('education')->insert([
                'pid_number'=>$pid_number,
                'level'=>$level,
                'institution'=>$institution,
                'start_date'=>$start_date,
                'end_date'=>$end_date,
                'grade'=>$grade
            ]);
        //}
    }
}
