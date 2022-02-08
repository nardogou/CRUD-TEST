<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\companies;
use Illuminate\Support\Facades\Storage;


class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = companies::latest()->paginate(10);
        return view('companie.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
        {
            return view('companie.create');
        }
        
        
        /**
        * store
        *
        * @param  mixed $request
        * @return void
        */
        public function store(Request $request)
        {
           // dd($request->all());
            $this->validate($request, [
                'name'        => 'required',
                'email'       => 'required',
                'logo'        => 'required|image|mimes:png,jpg,jpeg',
                'website'     => 'required'
            ]);
        
            //upload image
            $image = $request->file('logo');
            $image->storeAs('public/', $image->hashName());
        
            $companie = companies::create([
                'name'          => $request->name,
                'email'         => $request->email,
                'logo'          => $image->hashName(),
                'website'       => $request->website
            ]);
        
            if($companie){
                //redirect dengan pesan sukses
                return redirect(route('companies.index'))->with(['success' => 'Data Berhasil Disimpan!']);
            }else{
                //redirect dengan pesan error
                return redirect(route('companies.index'))->with(['error' => 'Data Gagal Disimpan!']);
            }
        }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response

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
        $companie = companies::findOrFail($id);
        return view('companie.edit', compact('companie'));
    }
    
    
    /**
    * update
    *
    * @param  mixed $request
    * @param  mixed $blog
    * @return void
    */
    public function update(Request $request , $id)
    {
        
        $this->validate($request, [
            'name'      => 'required',
            
            'email'     => 'required',
            
            'website'   => 'required'
            
        ]);
        //get data Blog by ID
        $companie = companies::findOrFail($id);
    
        if($request->file('image') == "") {
    
            $companie->update([
                'name'     => $request->name,
                'email'     => $request->email,
                'website'   => $request->website
            ]);
    
        } else {
    
            //hapus old image
            Storage::disk('local')->delete('public/'.$companie->image);
    
            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/blogs', $image->hashName());
    
            $companie->update([
                'logo'        => $image->hashName(),
                'name'        => $request->name,
                'email'       => $request->email,
                'website'     => $request->website
            ]);
    
        }
    
        if($companie){
            //redirect dengan pesan sukses
            return redirect(route('companies.index'))->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect(route('companies.index'))->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $companie = companies::findOrFail($id);
  Storage::disk('local')->delete('public/'.$companie->image);
  $companie->delete();

  if($companie){
     //redirect dengan pesan sukses
     return redirect(route('companies.index'))->with(['success' => 'Data Berhasil Dihapus!']);
  }else{
    //redirect dengan pesan error
    return redirect(route('companies.index'))->with(['error' => 'Data Gagal Dihapus!']);
  }
    }
}
