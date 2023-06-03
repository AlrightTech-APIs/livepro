<?php

namespace App\Http\Controllers;

use App\Models\csv;
use Illuminate\Http\Request;
use App\Traits\DataExtractor;
use Illuminate\Support\Facades\Storage;

class CsvController extends Controller
{
    use DataExtractor;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.csv.all',['csvs'=>csv::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.csv.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $file=$request->file('csv');
        $original_name=$file->getClientOriginalName();
        $file_name=$file->store('public/csv');
        csv::create([
            'original_name'=>$original_name,
            'file_name'=>$file_name,
            'colomn'=>$request->colomn,
        ]);
        return back()->with('success','data successfully saved');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(csv $csv)
    {
        if (Storage::exists($csv->file_name)) {
            Storage::delete($csv->file_name);
        }
        $csv->delete();
        return back()->with('status','file sussessfully deleted');
    }
}
