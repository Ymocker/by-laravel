<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Cache;
//use Illuminate\Support\Facades\DB;

use Closure;
use DateTime;
use DateTimeZone;
use App\Models\Statistic;

class Stat
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
     //   require_once 'SxGeo.php';



//$geo = new SxGeo(base_path('storage/app/public/SxGeo.dat'));

        $response = $next($request);

        $visitor_ip = $_SERVER['REMOTE_ADDR'];
        if (isset($_SERVER['HTTP_REFERRER'])) {
            $from = $_SERVER['HTTP_REFERRER'];
        } else {
            $from = 'Empty';
        }
        $uri = $_SERVER['REQUEST_URI'];
        $agent = $_SERVER['HTTP_USER_AGENT'];
        $dt = new DateTime('now', new DateTimeZone('Europe/Minsk'));
        $time = $dt->format('d-m-Y, H:i:s');

        if (!Cache::has($visitor_ip)) {
            Cache::put($visitor_ip, [$visitor_ip, $uri, $agent, $time], 43200);

            //counetr
            Statistic::where('name_id', 'counter')->increment('value');

            //desktop or mobile
            if (stristr($agent, 'mobile')) {
                Statistic::where('name_id', 'mobile')->increment('value');
            } else {
                Statistic::where('name_id', 'desktop')->increment('value');
            }

            //country
            require_once("SxGeo.php");
            $geo = new SxGeo(base_path('storage/app/public/SxGeo.dat'));
            //var_export($geo->getCityFull('37.212.20.249')); // Вся информация о городе
            $state = $geo->get($visitor_ip);
            //$state = $geo->get('37.212.20.121');
            switch ($state) {
                case 'BY':
                    Statistic::where('name_id', 'by')->increment('value');
                    break;
                case 'RU':
                    Statistic::where('name_id', 'ru')->increment('value');
                    break;
                default:
                    Statistic::where('name_id', 'other_state')->increment('value');
            }

            $file = fopen(base_path('storage/app/public/somestat.txt'), 'a');
            fputs($file, $state . ' _#_ ' . $from . PHP_EOL);
            fclose($file);
            //var_export($geo->about());          // Информация о базе данных
        }

        //page
        if ((stristr($uri, 'index')) or ($uri=='/')) {Statistic::where('name_id', 'pg_index')->increment('value');}
        if (stristr($uri, 'about')) {Statistic::where('name_id', 'pg_about')->increment('value');}
        if (stristr($uri, 'products')) {Statistic::where('name_id', 'pg_products')->increment('value');}
        if (stristr($uri, 'catalog')) {Statistic::where('name_id', 'pg_catalog')->increment('value');}
        if (stristr($uri, 'contact')) {Statistic::where('name_id', 'pg_contact')->increment('value');}
        if (stristr($uri, 'candy')) {Statistic::where('name_id', 'pg_candy')->increment('value');}

        return $response;
    }
}
