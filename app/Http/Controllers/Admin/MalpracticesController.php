<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Range;
use App\Models\Unit;
use App\Models\MalpracticesDept;
use App\Models\Malpractice;
use Illuminate\Support\Facades\Hash;

class MalpracticesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function mp_list(){
        if(\Auth::user()->role_id == 1 ||\Auth::user()->role_id == 2){
            $prs=Malpractice::with(['department'])->orderBy('id','DESC')->get();
        }else{
            $prs=Malpractice::with(['department'])->where('user_id', \Auth::user()->id)->orderBy('id','DESC')->get();
        }
        
        return view('malpractice.malpractice_list',compact('prs'));
    }
    public function add_mp(){
        $pr_type=MalpracticesDept::all();
        return view('malpractice.add_malpractice',compact('pr_type'));
    }

    public function create_mp(Request $request){
        $data = $request->all();
        $validator = Validator::make($data, [
                'title' => ['required', 'string', 'max:255'],
                'tilte_mr' => ['required', 'string', 'max:255'],
                'dept' => ['required', 'string'],
                'from_date' => ['required', 'string'],
                'to_date' => ['required', 'string'],
                'file' => 'required|mimes:pdf,jpg,png|max:2048',
            ]);

        // Store the file in storage\app\public folder
        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $filePath = $file->store('uploads', 'public');

        $pr=Malpractice::create([
            'title' => $request->title,
            'title_mr' => $request->title_mr,
            'title_hi' => $request->title_hi,
            'dept' => $request->dept,
            'from_date'=>$request->from_date,
            'to_date'=>$request->to_date,
            'file'=>$filePath,
            'user_id'=>\Auth::user()->id,
        ]);
        return redirect()->back()->with('message','Malpractice Created Succesfully.');
    }

    public function edit_mp($id){
        $pr=Malpractice::where('id',$id)->first();
        $pr_type=MalpracticesDept::all();
        return view('malpractice.edit_malpractice', compact('pr_type', 'pr'));
    }

    public function update_mp(Request $request){
        $data = $request->all();
        $validator = Validator::make($data, [
            'title' => ['required', 'string', 'max:255'],
            'tilte_mr' => ['required', 'string', 'max:255'],
            'dept' => ['required', 'string'],
            'from_date' => ['required', 'string'],
            'to_date' => ['required', 'string'],
            'file' => 'required|mimes:pdf,jpg,png|max:2048',
        ]);

        // Store the file in storage\app\public folder
        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $filePath = $file->store('uploads', 'public');

        $range=Malpractice::where('id',$request->mp_id)->update([
            'title' => $request->title,
            'title_mr' => $request->title_mr,
            'title_hi' => $request->title_hi,
            'dept' => $request->dept,
            'from_date'=>$request->from_date,
            'to_date'=>$request->to_date,
            'file'=>$filePath,
            ]);
        
        return redirect()->back()->with('message','Malpractice Updated Succesfully.');
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
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy_mp($id){
        $pr=Malpractice::where('id',$id)->first();
        $pr->delete();

        return redirect()->back()->with('message','Malpractice Deleted Succesfully.');
    }
}
