<?php

    namespace App\Console\Commands;

    use App\Admissions;
    use App\Queries;
    use Illuminate\Console\Command;
    use Illuminate\Support\Facades\Mail;
    use App\Mail\NewQuery;
    use App\Features\SMS;
    use App\Mail\ReportsMail;

    class cronEmail extends Command {

        /**
         * The name and signature of the console command.
         *
         * @var string
         */
        protected $signature = 'notify:email';

        /**
         * The console command description.
         *
         * @var string
         */
        protected $description = 'Command description';

        /**
         * Create a new command instance.
         *
         * @return void
         */
        public function __construct()
        {
            parent::__construct();
        }

        /**
         * Execute the console command.
         *
         * @return mixed
         */
        public function handle()
        {
//            $sms = new SMS();
//            $sms->singleSMS('03320913427','Schedule SMS');
            $queries =  $queries = Queries::whereDate('created_at',\Carbon\Carbon::today())->get();
            $admissions =  $admissions = Admissions::whereDate('created_at',\Carbon\Carbon::today())->get();
            Mail::to('americancenterofenglish@gmail.com')->send(new ReportsMail($queries,$admissions));
            logger($admissions .'<br/>');
        }
    }
