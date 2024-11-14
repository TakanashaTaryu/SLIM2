<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Administrator;
use App\Models\ParentModel;
use App\Models\Course;
use App\Models\SchoolClass;
use App\Models\Announcement;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Create Roles
        $roles = ['siswa', 'guru', 'administrasi', 'management', 'parent'];

        // Loop through each role and create it if it doesn't already exist
        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role]);
        }

        // Create Admin Account
        $admin = User::firstOrCreate([
            'email' => 'admin1@school.com'
        ], [
            'name' => 'Admin One',
            'password' => bcrypt('password'),
        ]);
        $admin->roles()->firstOrCreate(['name' => 'management']);

        // Sample Courses
        $courseMath = Course::firstOrCreate([
            'name' => 'Mathematics', 
            'description' => 'Mathematics course'
        ]);

        $courseScience = Course::firstOrCreate([
            'name' => 'Science', 
            'description' => 'Science course'
        ]);

        // Create Sample Teachers
        $teacher1 = Teacher::firstOrCreate([
            'email' => 'teacher1@school.com'
        ], [
            'name' => 'Teacher One',
            'password' => bcrypt('password'),
        ]);
        $teacher1->roles()->attach(Role::where('name', 'guru')->first());  // Assign role for teacher

        // Sample Classes
        $class9A = SchoolClass::firstOrCreate([
            'name' => '9 A',
            'course_id' => $courseMath->id,
            'teacher_id' => $teacher1->id
        ]);
        $class10A = SchoolClass::firstOrCreate([
            'name' => '10 A', 
            'course_id' => $courseScience->id,
            'teacher_id' => $teacher1->id
        ]);

        // Save teachers for classes
        $class9A->teacher_id = $teacher1->id;
        $class9A->save();

        $class10A->teacher_id = $teacher1->id;
        $class10A->save();

        // Create Sample Parents
        $parent1 = ParentModel::firstOrCreate([
            'email' => 'parent1@school.com'
        ], [
            'name' => 'Parent One',
            'password' => bcrypt('password'),
        ]);
        $role = Role::firstOrCreate(['name' => 'parent']);
        $parent1->roles()->attach($role, ['model_type' => ParentModel::class]);

        // Create Sample Students
        $student1 = Student::firstOrCreate([
            'email' => 'student1@school.com'
        ], [
            'name' => 'Student One',
            'password' => bcrypt('123456'),
            'date_of_birth' => '2000-01-01',
            'school_class_id' => $class9A->id,
            'parent_id' => 1,
            'profile_picture' => 'path_to_profile_picture.jpg',
            'address' => '123 Main St, City',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $role = Role::firstOrCreate(['name' => 'student']);
        $student1->roles()->attach($role, ['model_type' => Student::class]);

        // Correctly associate student with classes using save()
        $class9A->students()->save($student1); // Use save() instead of attach()
        $class10A->students()->save($student1); // Use save() instead of attach()

        // Create Administrators
        $administrator = Administrator::firstOrCreate([
            'email' => 'administrator1@school.com'
        ], [
            'name' => 'Administrator One',
            'password' => bcrypt('password'),
        ]);
        $administrator->roles()->firstOrCreate(['name' => 'administrasi']);
        $administrator->roles()->attach($role->id, ['model_type' => Administrator::class]);

        // Sample Announcements
        Announcement::firstOrCreate([
            'title' => 'Welcome to the New School Year!',
            'content' => 'This is a welcome announcement for all students and teachers.',
            'image' => 'path_to_image.jpg',
        ]);

        // Assign Students and Teachers to Classes (Removed redundant code)
        // $class9A->students()->attach($student1->id); // No need for attach() since save() already does it
        // $class9A->teacher_id = $teacher1->id;
        // $class9A->save();
    }
}
