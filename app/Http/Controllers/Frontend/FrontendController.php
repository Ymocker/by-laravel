<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Candy;
use App\Models\Tech;

use Illuminate\Http\Request;
use Mail;

class FrontendController extends Controller
{

public function index() {
    return view('frontend.index');
}

public function about() {
    return view('frontend.about');
}

public function catalog($sel = 1) {
    switch ($sel) {
    case 2:
        $candies = DB::table('candy')->where('mass', '<', 30)->orderBy('name')->paginate(6);
        break;
    case 3:
        $candies = DB::table('candy')->where('mass', '>=', 30)->orderBy('name')->paginate(6);
        break;
    case 4:
        $candies = DB::table('candy')->where('holiday', '=', true)->orderBy('name')->paginate(6);
        break;
    default:
        $candies = DB::table('candy')->orderBy('name')->paginate(6);
        $sel = 1;
        //$candies = DB::table('candy')->get()->sortBy('name')->paginate(9);
        //$candies = Candy::paginate(6);
    }

    return view('frontend.catalog', ['candies' => $candies, 'bt' => $sel]);
}

public function candy($id = 1) {
      $candy = Candy::find($id);
      if ($candy==null) {
          $id = 1;
          $candy = Candy::find($id);
      }

      switch ($candy->pack) {
    case 'тубус':
        $pack1 = 'в тубусе';
        $pack2 = 'тубусов';
        break;
    case 'ведро':
        $pack1 = 'в ведре';
        $pack2 = 'ведер';
        break;
    case 'стойка':
        $pack1 = 'на стойке';
        $pack2 = 'стоек';
        break;
    default:
        $pack1 = 'в шоубоксе';
        $pack2 = 'шоубоксов';
    }

    $box = $candy->box->length . 'x' . $candy->box->width . 'x' . $candy->box->height;
    return view('frontend.candy', ['candy' => $candy, 'box' => $box, 'pack1' => $pack1, 'pack2' => $pack2]);
}

/**
* send message from site
*/
public function sendMessage(Request $request) {

    // Build POST request
    $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
    $recaptcha_secret = env('RECAPTCHA_SECRET');
    $recaptcha_response = $request->input('g-recaptcha-response');

    // Make and decode POST request
    $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
    $recaptcha = json_decode($recaptcha);

    if (!$recaptcha->success) {
        echo 'mailerr';
        die();
    }

    $msg = 'Имя: ' . $request->name . '<br />';
    //$msg .= 'Телефон: ' . $request->phone . '<br />';
    $msg .= 'E-mail: ' . $request->email . '<br />';
    $msg .= 'Сообщение: ' . $request->message . '<br />';
    //$msg = 'Content-type: text/plain; charset=utf-8' . PHP_EOL;
    //$msg .= 'From: ' . $request->email . PHP_EOL;

    Mail::send('frontend.fromsite', array('msg' => $msg), function($message) use ($request)
    {
        $message->to(env('MAIL_TO_FROM_SITE'))
                ->subject('Cообщение с сайта')
                ->from($request->email, '');
    });

    echo 'mailok';
}

/**
 * check the password and granted admin access
 */
public function sendPass(Request $request) {
    $pass = Tech::find('adminpass');

    if (password_verify($request->name, $pass->value)) {
        $request->session()->put('adm', 1);
        return redirect('/admin');
    } else {
       return redirect('/');
    }
}

/**
 * send sha1-link to change password to the registered e-mail
 */
public function recovery() {
    $key = sha1(random_int(100001, 10000001) + time());

    $tmp = Tech::find('forgetpass');
    $tmp->value = $key;
    $tmp->save();

    $tmp = Tech::find('timepass');
    $tmp->value = time();
    $tmp->save();

    $tmp = Tech::find('adminemail');

    $msg = 'https://belyantex.ru/rec/' . $key;

    Mail::send('frontend.recover', array('msg' => $msg), function($message) {
        $tmp = Tech::find('adminemail');

        $message->to($tmp->value)
                ->subject('Восстановление доступа к сайту')
                ->from('info@belyantex.ru', '');
    });
    return redirect('/');
}

/**
 * check the link and the time limit(10 min) and grant admin access if OK
 * @param type $key
  */
public function access($key) {
    $tmp = Tech::find('forgetpass');
    if ($tmp->value != $key) {
        return redirect('/');
    }

    $tmp = Tech::find('timepass');
    if (($tmp->value + 600) < time()) {
        return redirect('/');
    }

    $request->session()->put('adm', 1);
    return redirect('/admin/security');
}


} // ====================== END of FrontendController ==========================
