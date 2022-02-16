<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\employees;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
<<<<<<< HEAD
        $employees = employees::latest();
        if (Request('search')) {
            $employees = employees::where('first_name','like','%'. Request('search'). '%')
            ->orWhere('last_name','like','%'. Request('search'). '%')
            ->orWhere('company_id','like','%'. Request('search'). '%')
            ->orWhere('email','like','%'. Request('search'). '%')
            ->orWhere('phone','like','%'. Request('search'). '%')
            ->paginate(10);
            return view('employee.index', compact('employees'));
        }

=======
>>>>>>> f9fbe03a5918e558779e2d7943fbf46d4f44b510
        $employees = employees::latest()->paginate(10);
        return view('employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         
      //melakukan validasi data
      $request->validate([
        'first_name' => 'required',
        'last_name' => 'required',
        'company_id' => 'required',
        'email'=>'required',
        'phone'=>'required',
    ]);
    
    // dd($request->all());
    //fungsi eloquent untuk menambah data
    // employees::create($request->all());

    // //jika data berhasil ditambahkan, akan kembali ke halaman utama
    // return redirect()->route('employee.index')
    //     ->with('success', 'User Berhasil Ditambahkan');
    //     }
        
            $employees = employees::create([
                'first_name'          => $request->first_name,
                'last_name'         => $request->last_name,
                'company_id'         => $request->company_id,
                'email'         => $request->email,
                'phone'       => $request->phone
            ]);
        
            if($employees){
                //redirect dengan pesan sukses
                return redirect(route('employees.index'))->with(['success' => 'Data Berhasil Disimpan!']);
            }else{
                //redirect dengan pesan error
                return redirect(route('employees.index'))->with(['error' => 'Data Gagal Disimpan!']);
    }}

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
        $employee = employees::findOrFail($id);
        return view('employee.edit', compact('employee'));
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
         
        $this->validate($request, [
            'first_name'    => 'required',
            'last_name'    => 'required',
            'company_id'   => 'required',
            'email'        => 'required',
            'phone'        => 'required'
            
        ]);
        //get data by ID
        $employee = employees::where('id', $id)->update([
        'first_name'        => $request->first_name,
        'last_name'         => $request->last_name,
        'company_id'        => $request->company_id,         
        'email'             => $request->email,     
        'phone'             => $request->phone
         ] );
    
    //       //fungsi eloquent untuk menambah data
    // employees::create($request->all());

    // //jika data berhasil ditambahkan, akan kembali ke halaman utama
    // return redirect()->route('employee.index')
    //     ->with('success', 'User Berhasil Ditambahkan');
    // $employees = employees::update([
    //     'first_name'          => $request->first_name,
    //     'last_name'         => $request->last_name,
    //     'company_id'         => $request->company_id,
    //     'email'         => $request->email,
    //     'phone'       => $request->phone
    // ]);

    if($employee){
        //redirect dengan pesan sukses
        return redirect(route('employees.index'))->with(['success' => 'Data Berhasil Disimpan!']);
    }else{
        //redirect dengan pesan error
        return redirect(route('employees.index'))->with(['error' => 'Data Gagal Disimpan!']);
}
   
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $employee = employees::findOrFail($id);
  $employee->delete();

  if($employee){
     //redirect dengan pesan sukses
     return redirect(route('employees.index'))->with(['success' => 'Data Berhasil Dihapus!']);
  }else{
    //redirect dengan pesan error
    return redirect(route('employees.index'))->with(['error' => 'Data Gagal Dihapus!']);
  }
    }
    
}
