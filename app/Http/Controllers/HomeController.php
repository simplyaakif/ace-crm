<?php

namespace App\Http\Controllers;

use App\Admissions;
use App\Batches;
use App\Queries;
use App\Recovery;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return //Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $queries = Queries::whereDate('created_at',Carbon::today())->get();
        $yQueries = Queries::whereDate('created_at',Carbon::yesterday())->get();

        $todayQueries = $queries->count();
        $yesterQueries = $yQueries->count();


        Carbon::setWeekStartsAt(Carbon::SUNDAY);
        $weekQueries = DB::table('queries')
            ->whereBetween('created_at', [Carbon::now()->startOfWeek(),Carbon::now()->endOfWeek()])
            ->count();

        $recentQueries = Queries::latest()->limit(5)->get();

        $admissions = Admissions::limit(5)
            ->orderBy('id','desc')
            ->with('batches')->get();

//        $recoveries = Recovery::latest()->limit(5)->get();

        $recoveries = DB::table('recoveries')
            ->join('batch_admission', 'recoveries.registered_batch_id', '=', 'batch_admission.id')
            ->join('admissions','batch_admission.admission_id','=','admissions.id')
            ->join('batches','batch_admission.batch_id','=','batches.id')
            ->select('recoveries.*', 'batches.b_name', 'admissions.a_name','admissions.a_dp','batches.b_timings','admissions.id as aid')
            ->where('recoveries.paid_status','=','0')
            ->where('batch_admission.completion_status','=',0)
            ->orderBy('recoveries.dueDate','asc')
            ->take(5)
            ->get();


        $todaySale = DB::table('recoveries')
            ->where('paid_status','=','1')
            ->where('paidOn','=',Carbon::today())
            ->sum('instAmount');

        $yesSale = DB::table('recoveries')
            ->where('paid_status','=','1')
            ->where('paidOn','=',Carbon::today()->sub(1,'day'))
            ->sum('instAmount');

        $monthSale = DB::table('recoveries')
            ->where('paid_status','=','1')
            ->whereBetween('paidOn',[Carbon::now()->startOfMonth(),Carbon::now()->endOfMonth()])
            ->sum('instAmount');

        $fromDate = Carbon::now()->subMonth()->startOfMonth()->toDateString();
        $tillDate = Carbon::now()->subMonth()->endOfMonth()->toDateString();
        $currentMonth = date('m');

        $batchAdmissions = Batches::withCount(['admissions' => function($query) use ($fromDate,$tillDate,
            $currentMonth) {
            $query->whereRaw('MONTH(batch_admission.created_at) = ?', [$currentMonth]);
        }])
            ->orderBy('admissions_count','desc')->get();


        // Month Charts Data
        $monthDayWiseSaleDates = $this->monthDayWiseSaleDay();
        $monthDayWiseSaleAmount = $this->monthDayWiseSaleAmount($monthDayWiseSaleDates);
        $dtDy = $this->dateDay($monthDayWiseSaleDates);

        if(!empty($monthDayWiseSaleAmount))$saleMax = round((max($monthDayWiseSaleAmount) +20000/2)/10)*10;
        else $saleMax=-1;

        //Year Chart Data

        $yearMonthSale = $this->yearMonthWiseSaleDates();
        $yearMonthName = $this->yearMonthName($yearMonthSale);
        $yearMonthSaleAmount = $this->yearMonthWiseSaleAmount($yearMonthName);
        if(!empty($yearMonthSaleAmount))$yearMax = round((max($yearMonthSaleAmount)+100000/2)/10)*10;
        else $yearMax = -1;
        $yearMonth =[];
        foreach($yearMonthName as $key=> $month){
            $yearMonth[]=$month;
        }


        return view('pages.dashboard.dash',compact('monthDayWiseSaleDates','monthDayWiseSaleAmount','dtDy','saleMax','yearMonth','yearMonthSaleAmount','yearMax'
        ))->with('todayQueries',$todayQueries)
            ->with('yesterQueries',$yesterQueries)->with('weekQueries',$weekQueries)
            ->with('admissions',$admissions)->with('recoveries',$recoveries)
            ->with('recentQueries',$recentQueries)
            ->with('todaySale',$todaySale)->with('yesSale',$yesSale)
            ->with('monthSale',$monthSale)->with('batchAdmissions',$batchAdmissions);
    }

    /**
     * @return mixed
     */
    public function monthDayWiseSaleDay()
    {

        $monthDayWiseSaleDates = Recovery::
        where('paid_status', '=', '1')->whereBetween('paidOn', [
                Carbon::now()->startOfMonth(),
                Carbon::now()->endOfMonth()
            ])->orderBy('paidOn', 'asc')->distinct()->pluck('paidOn');

        return $monthDayWiseSaleDates;
    }


    public function monthDayWiseSaleAmount($monthDayWiseSaleDates): array
    {
        $monthDayWiseSaleAmount = [];
        foreach($monthDayWiseSaleDates as $day) {
            $amount = Recovery::where('paid_status', '=', '1')->where('paidOn', '=', $day)->sum('instAmount');
            array_push($monthDayWiseSaleAmount, $amount);
        }

        return $monthDayWiseSaleAmount;
    }

    public function dateDay($monthDayWiseSaleDates): array
    {
        $dateDay = [];
        foreach($monthDayWiseSaleDates as $unformatdate) {
            $date      = new \DateTime($unformatdate);
            $dt        = $date->format('d');
            $day       = $date->format('D');
            $dateDay[] = $dt . ' (' . $day . ') ';
        }
        return $dateDay;
    }

    public function yearMonthWiseSaleDates()
    {

        $yearMonthWiseSaleDates = Recovery::
        where('paid_status', '=', '1')->whereBetween('paidOn', [
            Carbon::now()->startOfYear(),
            Carbon::now()->endOfYear()
        ])->orderBy('paidOn', 'asc')->distinct()->pluck('paidOn');

        return $yearMonthWiseSaleDates;
    }

    public function yearMonthWiseSaleAmount($yearMonthWiseSaleDates): array
    {
        $yearMonthWiseSaleAmount = [];
        foreach($yearMonthWiseSaleDates as $key => $month ) {
            $amount = Recovery::where('paid_status', '=', '1')->whereMonth('paidOn', '=', $key)->sum('instAmount');
            array_push($yearMonthWiseSaleAmount, $amount);
        }

        return $yearMonthWiseSaleAmount;
    }

    public function yearMonthName($yearMonthSale): array
    {
        $months = [];
        foreach($yearMonthSale as $unformatdate) {
            $date      = new \DateTime($unformatdate);
            $monthNumber        = $date->format('m');
            $monthName       = $date->format('M');
            $months[$monthNumber] = $monthName;
        }
        return $months;
    }

}
