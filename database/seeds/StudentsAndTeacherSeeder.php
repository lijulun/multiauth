<?php

use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\Teacher;

class StudentsAndTeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::query()->truncate();
        Student::create([
			'school_id'  => '10001',
			'student_no' => '17000003001',
			'name'       => 'Abbey',
			'password'   => bcrypt('st001')
        ]);
        Student::create([
			'school_id'  => '10002',
			'student_no' => '17000003002',
			'name'       => 'Nana',
			'password'   => bcrypt('st002')
        ]);

        Teacher::query()->truncate();
        Teacher::create([
			'school_id'  => '10001',
			'name'       => 'Kathy',
			'password'   => bcrypt('tt111')
        ]);
        Teacher::create([
			'school_id'  => '10001',
			'name'       => 'Jack',
			'password'   => bcrypt('tt222')
        ]);

    }
}
