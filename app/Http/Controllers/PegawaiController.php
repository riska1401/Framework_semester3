<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use DateInterval;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Data Pegawai (seperti database)
        $employee_data = [
            'employee_name' => 'Riska Anjani',
            'date_of_birth' => '1995-03-25',
            'position' => 'Web Developer',
            'skills' => [
                'HTML',
                'CSS',
                'JavaScript',
                'PHP',
                'SQL'
            ],
            'join_date' => '2003-08-15',
            'salary' => 7500000,
            'career_goal' => 'Become a full-stack engineer'
        ];

        $today = new DateTime();

        // Menghitung usia
        $dob = new DateTime($employee_data['date_of_birth']);
        $age_interval = date_diff($dob, $today);
        $age = $age_interval->y;

        // Menghitung lama bekerja
        $join_date = new DateTime($employee_data['join_date']);
        $working_interval = date_diff($join_date, $today);
        $working_duration_days = $working_interval->days;

        // Menentukan informasi status
        $status_info = '';
        if ($working_duration_days < 730) {
            $status_info = 'Masih pegawai baru, tingkatkan pengalaman kerja!';
        } else {
            $status_info = 'Sudah senior, jadilah teladan bagi rekan kerja!';
        }

        // Menyusun data untuk dikembalikan
        $data = [
            'employee_name' => $employee_data['employee_name'],
            'age' => $age,
            'position' => $employee_data['position'],
            'skills' => $employee_data['skills'],
            'join_date' => $employee_data['join_date'],
            'working_duration' => $working_duration_days,
            'salary' => $employee_data['salary'],
            'status_info' => $status_info,
            'career_goal' => $employee_data['career_goal']
        ];

        // Mengembalikan data sebagai JSON atau ke view
        // return response()->json($data);
        return view('pegawai', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
