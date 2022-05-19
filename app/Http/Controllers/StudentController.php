<?php

namespace App\Http\Controllers;

use auth;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    // private $db = null;
    //
    public function index() {
        $students = DB::table('students')->get();

        return view('students.index', compact('students'));
    }

    public function create() {
        return view('students.register');
    }

    public function store(Request $request) {
        // DB::table('students')->insert([
        //     'name' => $request->name,
        //     'dob' => $request->dob,
        //     'email' => $request->email,
        //     'nrc' => $request->nrc,
        //     'course' => $request->course,
        //     'password' => $request->password
        // ]);
        $students = DB::insert('insert into students(name, dob, email, nrc, course, password) VALUES (?, ?, ?, ?, ?, ?)', [$request->name, $request->dob, $request->email, $request->nrc, implode(',', $request->course), bcrypt($request-> password)] );
        return redirect('/students')->with('message', 'Student Created and logged in');

            // $query = "
            //     INSERT INTO users(
            //         name, dob, email, nrc,
            //         course, password, created_at
            //     ) VALUES (
            //         :name, :dob, :email, :nrc,
            //         :course, :password, NOW()
            //     )";
            // $statement = $this->db->prepare($query);
            // $statement->execute($data);

            // return $this->db->lastInsertId();
    }
}
