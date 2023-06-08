<?php

namespace App\Http\Controllers;

use App\Models\dnc;
use App\Models\dncNumber;
use Illuminate\Http\Request;
use App\Traits\DataExtractor;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class DncController extends Controller
{
    use DataExtractor;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.dnc.all', ['dncs' => dnc::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.dnc.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'number' => 'required_without_all:dnc|unique:dnc_numbers,number|min:10|max:11',
            'dnc' => 'required_without_all:number',
            'column' => 'required_if:dnc,mimes:csv,xls,xlsx',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if (isset($request->number)) {
            $number[] = ['number' => $this->formateNumber($request->input('number'))];
            dncNumber::upsert($number,['number']);
        }
        if ($request->has('dnc')) {
            $file = $request->file('dnc');
            $original_name = $file->getClientOriginalName();
            $filename = time() . '_' . $file->getClientOriginalName();
            $file_name = $file->storeAs('public/dnc', $filename);

            if(isset($request->colomn))
            {
                $data = $this->dataFromFile($file_name , $request->colomn);
            }else
            {
                $data = $this->dataFromFile($file_name);    
            }
            if ($data) {
                $chunkSize = 5000; // number of records to insert at a time

                $chunks = array_chunk($data, $chunkSize); // split data into chunks
                // return $chunks;
                foreach ($chunks as $chunk) {
                    dncNumber::upsert($chunk,['number']);
                    // foreach ($chunk as $val) {
                    //     dncNumber::insert(['number'=>$val]);
                    // }
                }
                dnc::create([
                    'original_name' => $original_name,
                    'file_name' => $file_name,
                    'colomn' => $request->colomn,
                ]);
                return back()->with('success', 'data successfully saved');
            }
            return back()->with('error', 'error accourd try again with valid cloumn of number in file');
        }
        return back()->with('success', 'number successfully saved');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(dnc $dnc)
    {
        if (Storage::exists($dnc->file_name)) {
            Storage::delete($dnc->file_name);
        }
        $dnc->delete();
        return back()->with('status', 'file sussessfully deleted');
    }
}
