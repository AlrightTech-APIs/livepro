<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\sanitize;
use App\Models\dncNumber;
use App\Models\leadNumber;
use App\Models\sanitized;
use Illuminate\Http\Request;
use App\Traits\DataExtractor;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class SanitizeController extends Controller
{
    use DataExtractor;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.sanitize.all', ['sanitizes' => sanitize::paginate(10)]);
    }
    public function userIndex()
    {
        // return "working";
        $user=auth()->user();
        $sanitizes=$user->sanitizes()->paginate(20);
        return view('client.sanitize.all', ['sanitizes' => $sanitizes]);
    }

    public function sanitizedIndex()
    {
        return view('admin.sanitized.all', ['sanitized' => sanitized::paginate(10)]);
    }
    public function userSanitizedIndex()
    {
        $user=auth()->user();
        $sanitized=$user->sanitized()->paginate(20);
        return view('client.sanitized.all', ['sanitized' => $sanitized]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sanitize.add');
    }
    public function addSanitize()
    {
        return view('client.sanitize.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd(dncNumber::pluck('number')->toArray());
        $user = auth()->user();

        $file = $request->file('sanitize');

        // $file_name=$file->store('public/sanitize');
        if ($user && $file) {
            // return "eorkinh";
            $original_name = $file->getClientOriginalName();
            $filename = time() . '_' . $file->getClientOriginalName();
            // $file_name = $file->store('/sanitize',$filename);
            $file_name = $file->storeAs('public/sanitize', $filename);

            if(isset($request->colomn))
            {
                $data = $this->dataFromFile($file_name , $request->colomn);
            }else
            {
                $data = $this->dataFromFile($file_name);    
            }
            
            if ($data) {
                $numbers = array_column($data, "number");
                $dncNumbers = dncNumber::pluck('number')->toArray();
                $leadNumbers = leadNumber::pluck('number')->toArray();
                $filteredNumbers = array_values(array_diff($numbers, array_merge($dncNumbers, $leadNumbers)));

                if ($filteredNumbers > 0) {
                    $basename = pathinfo($filename, PATHINFO_FILENAME);

                    $sanitizedFileName = 'public/sanitized/sanitized_' . $basename . '.csv';
                    $file = fopen(storage_path('app/' . $sanitizedFileName), 'w');
                    $header = ['number'];
                    fputcsv($file, $header);
                    foreach ($filteredNumbers as $value) {
                        $row = [$value];
                        fputcsv($file, $row);
                    }
                    fclose($file);

                    $sanitized=new sanitized();
                    $sanitized->file=$sanitizedFileName;
                    $user->sanitized()->save($sanitized);
                }

                $sanitize = new sanitize();
                $sanitize->file_name = $file_name;
                $sanitize->original_name = $original_name;
                $sanitize->colomn = $request->colomn;
                $user->sanitizes()->save($sanitize);

                return back()->with(['file'=>$sanitizedFileName,'success'=>'file has been successfully sanitized']);
            }
            return back()->with('error', 'error accourd try again with valid cloumn number');
        }

        return back()->with('error', 'empty list of users');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(sanitize $sanitize)
    {
        if (Storage::exists($sanitize->file_name)) {
            Storage::delete($sanitize->file_name);
        }
        $sanitize->delete();
        return back()->with('success', 'file sussessfully deleted');
    }
    public function deleteSanitized($id)
    {
        // dd("not working");
       $sanitize=sanitized::find($id);
        if (Storage::exists($sanitize->file)) {
            Storage::delete($sanitize->file);
        }
        $sanitize->delete();
        return back()->with('success', 'file sussessfully deleted');
    }
}
