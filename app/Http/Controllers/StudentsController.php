<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Student::all(); // tampil dalam bentuk json
        $students = Student::all();
        // menapilkan data dengan fungsi compact
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // mengecek apakah data sudah bisa ditambahkan, json view
        // return $request;
// -----------------------------------------------------------------------
        //cara pertama
        // $student = new Student;
        // $student->nama = $request->nama;
        // $student->nrp = $request->nrp;
        // $student->email = $request->email;
        // $student->jurusan = $request->jurusan;

        // $student->save();
// -----------------------------------------------------------------------

        // cara kedua lebih aman dari vulnerable
        // dengan menambahkan model $fillable(artinya fild yang boleh disi)
        //protected $fillable = ['nama','nrp','email','jurusan'];
        // Student::create([
        //     'nama' =>$request->nama,
        //     'nrp' =>$request->nrp,
        //     'email' =>$request->email,
        //     'jurusan' =>$request->jurusan
        // ]);
// -----------------------------------------------------------------------
         // validasi form jika kosong
         $request->validate([
            'nama' => 'required',
            'nrp' => 'required|size:10',
            'email' => 'required',
            'jurusan' => 'required'
         ],
         [
            'nama.required' => 'Nama harus di isi',
            'nrp.required' => 'NIM harus di isi',
            'nrp.size' => 'NIM harus 10 Character',
            'email.required' => 'Email Harus di isi',
            'jurusan.required' => 'Jurusan harus di isi'
         ]);
                
        // cara ketiga dengan menggabil semua data
        // cara ini sama dengan cara yg kedua
        //cara ini juga menambahkan model $fillable dengan fungsi protected
        Student::create($request->all());
        //cara ketiga cuma satu baris
        
        // return di tulisakan pada setiap cara di atas untuk mengembalikan nilai
        return redirect('/students')->with('status', 'Data Mahasiswa Berhasil ditambahkan');
        // with = untuk memunculkan pesan notifikasi
        // lalu di kirimkan ke file students.index
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        // return $student;
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        // validasi form sebelum di ubah
        $request->validate([
            'nama' => 'required',
            'nrp' => 'required|size:10',
            'email' => 'required',
            'jurusan' => 'required'
         ],
         [
            'nama.required' => 'Nama harus di isi',
            'nrp.required' => 'NIM harus di isi',
            'nrp.size' => 'NIM harus 10 Character',
            'email.required' => 'Email Harus di isi',
            'jurusan.required' => 'Jurusan harus di isi'
         ]);

        // student itu data lama
        // request itu data baru
        Student::where('id', $student->id)
            ->update([
                'nama' => $request->nama,
                'nrp' => $request->nrp,
                'email' => $request->email,
                'jurusan' => $request->jurusan
            ]);
        return redirect('/students')->with('status', 'Data Mahasiswa Berhasil diubah!');
        // return $student; json view
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        Student::destroy($student->id);
        return redirect('/students')->with('status', 'Data Mahasiswa Berhasil dihapus!');
    }
}
