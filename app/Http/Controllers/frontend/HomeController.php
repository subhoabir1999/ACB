<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Headline;
use App\Models\PressRelease;
use App\Models\Fir;
use App\Models\Legal;
use App\Models\Statistic;
use App\Models\Slider;
use App\Models\Range;
use App\Models\Unit;
use App\Models\Dgmessage;

class HomeController extends Controller
{
    public function index(){
        $headline=Headline::orderBy('priority','ASC')->get();
        $pressRelease=PressRelease::orderBy('id','DESC')->get();
        $fir=Fir::orderBy('id','DESC')->get();
        $legal=Legal::orderBy('id','DESC')->get();
        $statistic=Statistic::orderBy('id','DESC')->get();
        $slider=Slider::orderBy('priority','ASC')->get();
        $Dgmessage=Dgmessage::first();
        return view('frontend.index',compact('headline','pressRelease','fir','legal','statistic','slider','Dgmessage'));
    }
    public function press_release(Request $request){
        $ranges=Range::all();
        $perPage = $request->input('perPage', 10); // Change this value to the desired number of items per page
        $selectedRange = $request->input('range');
        $selectedUnit = $request->input('unit');
        $pressRelease=PressRelease::orderBy('id','DESC');
        if($selectedRange){
            $pressRelease=$pressRelease->where('range',$selectedRange);
        }
        if($selectedUnit){
            $pressRelease=$pressRelease->where('unit',$selectedUnit);
        }
        $pressRelease=$pressRelease->paginate($perPage);
        return view('frontend.press',compact('pressRelease','ranges','selectedRange','selectedUnit'));
    }
    public function fir(Request $request){
        $ranges=Range::all();
        $perPage = $request->input('perPage', 10); // Change this value to the desired number of items per page
        $selectedRange = $request->input('range');
        $selectedUnit = $request->input('unit');
        $selectedDate = $request->input('datefilter');
        $firres=Fir::orderBy('id','DESC');
        if($selectedRange){
            $firres=$firres->where('range',$selectedRange);
        }
        if($selectedUnit){
            $firres=$firres->where('unit',$selectedUnit);
        }
        if($selectedDate){
            $firres=$firres->where('date',date("Y-m-d", strtotime($selectedDate)));
        }
        $firres=$firres->paginate($perPage);
        return view('frontend.fir',compact('firres','ranges','selectedRange','selectedUnit','selectedDate'));
    }
    public function legal(Request $request){
        $ranges=Range::all();
        $perPage = $request->input('perPage', 10); // Change this value to the desired number of items per page
        $selectedRange = $request->input('range');
        $selectedUnit = $request->input('unit');
        $selectedDate = $request->input('datefilter');
        $legalres=Legal::orderBy('id','DESC');
        if($selectedRange){
            $legalres=$legalres->where('range',$selectedRange);
        }
        if($selectedUnit){
            $legalres=$legalres->where('unit',$selectedUnit);
        }
        if($selectedDate){
            $legalres=$legalres->where('date',date("Y-m-d", strtotime($selectedDate)));
        }
        $legalres=$legalres->paginate($perPage);
        return view('frontend.legal',compact('legalres','ranges','selectedRange','selectedUnit','selectedDate'));
    }
    public function statistics(Request $request){
        $perPage = $request->input('perPage', 10); // Change this value to the desired number of items per page
        $selectedDate = $request->input('datefilter');
        $statres=Statistic::orderBy('id','DESC');
       
        if($selectedDate){
            $statres=$statres->where('year',$selectedDate);
        }
        $dates=Statistic::select('year')->groupBy('year')->get();
        $statres=$statres->paginate($perPage);
        return view('frontend.statistics',compact('statres','dates','selectedDate'));
    }
}
