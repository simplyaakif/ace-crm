<?php

namespace App\Http\Controllers;

use App\Recovery;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FinanceController extends Controller
{
    public function recoveries(){

        Carbon::setWeekStartsAt(Carbon::SUNDAY);

        $weekRecoveries = DB::table('recoveries')
            ->join('batch_admission', 'recoveries.registered_batch_id', '=', 'batch_admission.id')
            ->join('admissions','batch_admission.admission_id','=','admissions.id')
            ->join('batches','batch_admission.batch_id','=','batches.id')
            ->select('recoveries.*', 'batches.b_name', 'admissions.a_name')
            ->where('recoveries.paid_status','=','0')
            ->whereBetween('recoveries.dueDate', [Carbon::now(),Carbon::now()->endOfWeek()])
            ->count();

        $overDueRecoveries = DB::table('recoveries')
            ->join('batch_admission', 'recoveries.registered_batch_id', '=', 'batch_admission.id')
            ->join('admissions','batch_admission.admission_id','=','admissions.id')
            ->join('batches','batch_admission.batch_id','=','batches.id')
            ->select('recoveries.*', 'batches.b_name', 'admissions.a_name','admissions.a_mobile')
            ->where('recoveries.paid_status','=','0')
            ->where('recoveries.dueDate', '<', Carbon::now()->sub(1,'day'))
            ->get();

        $monthRecoveries = DB::table('recoveries')
            ->join('batch_admission', 'recoveries.registered_batch_id', '=', 'batch_admission.id')
            ->join('admissions','batch_admission.admission_id','=','admissions.id')
            ->join('batches','batch_admission.batch_id','=','batches.id')
            ->select('recoveries.*', 'batches.b_name', 'admissions.a_name')
            ->where('recoveries.paid_status','=','0')
            ->whereBetween('recoveries.dueDate',  [Carbon::now()->endOfWeek(),Carbon::now()->endOfMonth()])
            ->count();

        $nextRecoveries = DB::table('recoveries')
            ->join('batch_admission', 'recoveries.registered_batch_id', '=', 'batch_admission.id')
            ->join('admissions','batch_admission.admission_id','=','admissions.id')
            ->join('batches','batch_admission.batch_id','=','batches.id')
            ->select('recoveries.*', 'batches.b_name', 'admissions.a_name')
            ->where('recoveries.paid_status','=','0')
            ->where('recoveries.dueDate','>',  Carbon::now()->endOfMonth())
            ->count();


        $allRecoveries = DB::table('recoveries')
            ->join('batch_admission', 'recoveries.registered_batch_id', '=', 'batch_admission.id')
            ->join('admissions','batch_admission.admission_id','=','admissions.id')
            ->join('batches','batch_admission.batch_id','=','batches.id')
            ->select('recoveries.*', 'batches.b_name', 'admissions.a_name')
            ->where('recoveries.paid_status','=','0')
//            ->where('recoveries.dueDate','>',  Carbon::now()->endOfMonth())
            ->orderBy('recoveries.dueDate','asc')
            ->get();



        return view('pages.finance.recoveries')
            ->with('weekRecoveries',$weekRecoveries)
            ->with('overDueRecoveries',$overDueRecoveries)
            ->with('monthRecoveries',$monthRecoveries)
            ->with('allRecoveries',$allRecoveries)
            ->with('nextRecoveries',$nextRecoveries);
    }

    public function pay(){
        $data = request(['slip','id']);
        $recovery = Recovery::find($data['id']);
        $recovery->paid_status = 1;
        $recovery->slip_number = $data['slip'];
        $recovery->paidOn = Carbon::now();
        $recovery->save();
        return 'Successfully paid the Recovery. Kindly refresh to see the changes.';
    }


    public function admissions(){
        return view('pages.finance.finance_admissions');
    }

    public function expenses()
    {
    return view('pages.finance.finance_expenses');
    }

    public function recoveriesEdit(Request $request){
        $reg_batch_id = $request->input('registered_batch_id');
        $installments = $request->input('installments');
        DB::table('recoveries')->where('registered_batch_id', '=', $reg_batch_id)->where('paid_status','=',0)->delete();
        foreach($installments as $row){
            $install = new Recovery();
            $install->registered_batch_id = $reg_batch_id;
            $install->instAmount = $row['instAmount'];
            $install->dueDate = Carbon::parse($row['dueDate'])->format('Y-m-d');
            $install->paid_status= 0;
            $install->save();
        }
        return json_encode('Updated Successfully');
    }
}
