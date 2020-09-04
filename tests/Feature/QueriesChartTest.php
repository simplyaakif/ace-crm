<?php

    namespace Tests\Feature;

    use App\Queries;
    use DateTime;
    use DB;
    use Illuminate\Foundation\Testing\DatabaseMigrations;
    use Tests\TestCase;

    class QueriesChartTest extends TestCase {

        use DatabaseMigrations;

        /** @test */
        public function queries_visit_data()
        {
            $this->withoutExceptionHandling();
            factory(Queries::class, 110)->create();

            $query = $this->queryStatsMethod('d','DATE(created_at) as date',now()->startOfMonth(),now()->endOfMonth()
                ,'On Campus Visit');
            dump($query);
            $this->assertEquals('On Campus Visit', Queries::first()->q_interaction_type);
        }

        /** @test */
        public function query_count_for_whole_year()
        {
            $this->withoutExceptionHandling();
            factory(Queries::class, 50)->create();

            $queryVisitDays=$this->queryStatsMethod('m','MONTH(created_at) as date',now()->startOfYear(),now()
                ->endOfYear(),'On Campus Visit');

            dd($queryVisitDays);

            $this->assertEquals('On Campus Visit', Queries::first()->q_interaction_type);
        }

        public function queryStatsMethod($type,$rangeType,$startDate,$endDate,$interactionType): array
        {
            $queryVisitDays = DB::table('queries')->whereBetween('created_at', [
                    $startDate,
                    $endDate
                ])->where('q_interaction_type', $interactionType)->select(DB::raw($rangeType), DB::raw('count(*) as queries'))->groupBy('date')->get();

            $dateArr  = [];
            $queryArr = [];
            foreach($queryVisitDays as $single) {
                if($type=="d"){
                $date       = new \DateTime($single->date);
                $dateArr[]  = $date->format('d') . ' (' . $date->format('D') . ') ';
                }else {
                    $dt = DateTime::createFromFormat('!m', $single->date);
                    $dateArr[] = $dt->format('F');
                }
                $queryArr[] = $single->queries;
            }
            $queryVisitData = [
                $dateArr,
                $queryArr
            ];
            return $queryVisitData;
        }


    }
