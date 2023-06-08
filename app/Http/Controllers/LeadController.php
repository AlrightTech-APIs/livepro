<?php

namespace App\Http\Controllers;

use toastr;
use App\Models\lead;
use App\Models\leadNumber;
use Illuminate\Http\Request;
use App\Traits\DataExtractor;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{
    use DataExtractor;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.lead.all', ['leads' => lead::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.lead.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'number' => 'required_without_all:lead|unique:dnc_numbers,number|min:10|max:11',
            'lead' => 'required_without_all:number',
            'column' => 'required_if:dnc,mimes:csv,xls,xlsx',
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error','Validation Error');
        }
        
        $file = $request->file('lead');
        if (isset($request->number)) {
            $number[] = ['number' => $this->formateNumber($request->input('number'))];
            leadNumber::upsert($number,['number']);
        }
        if ($file) {

            $original_name = $file->getClientOriginalName();
            $filename = time() . '_' . $file->getClientOriginalName();
            $file_name = $file->storeAs('public/lead', $filename);

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
                    leadNumber::upsert($chunk,['number']);
                    // foreach ($chunk as $val) {
                    //     dncNumber::insert(['number'=>$val]);
                    // }
                }
                lead::create([
                    'original_name' => $original_name,
                    'file_name' => $file_name,
                    'colomn' => $request->colomn,
                ]);
                return back()->with('success', 'data successfully saved');
            }
            return back()->with('error', 'error accourd try again with valid cloumn of number in file');
        }
        return back()->with('success', 'Number Successfully Added');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(lead $lead)
    {
        if (Storage::exists($lead->file_name)) {
            Storage::delete($lead->file_name);
        }
        $lead->delete();
        return back()->with('status', 'file sussessfully deleted');
    }
}
