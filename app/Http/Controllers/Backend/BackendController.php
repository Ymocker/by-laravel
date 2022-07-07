<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Candy;
use App\Models\Box;
use App\Models\Tech;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use App\Models\Statistic;


    define('TMP_DIR', $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . 'tmp' . DIRECTORY_SEPARATOR);
    define('IMG_DIR', $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR);

class BackendController extends Controller
{

public function index() {

    /*
    $allCandies = Candy::All()->count();
    $under30 = Candy::where('mass', '<', 30)->count();
    $from30 = Candy::where('mass', '>=', 30)->count();
    $forHol = Candy::where('holiday', '=', true)->count();

    dd($allCandies);
*/
    
    $st = Statistic::all()->keyBy('name_id');
    //$st = DB::table('statistic')->get();
//            ->select('name', 'email as user_email')
//            ->get();

    $counter = $st->get('counter')['value'];
    $ru = $st->get('ru')['value'];
    $by = $st->get('by')['value'];
    $other = $st->get('other_state')['value'];
    $desk = $st->get('desktop')['value'];
    $mob = $st->get('mobile')['value'];

    $pages = [$st->get('pg_index')['value'],
                $st->get('pg_about')['value'],
                $st->get('pg_products')['value'],
                $st->get('pg_catalog')['value'],
                $st->get('pg_candy')['value'],
                $st->get('pg_contact')['value']
        ];



    return view('backend.stat', ['counter' => $counter, 'ru' => $ru, 'by' => $by, 'other' => $other,
                                        'desk' => $desk, 'mob' => $mob, 'pages' => $pages, 'menu' => 3]);
}

/**
 *
 */
public function logout(Request $request) {
    $request->session()->forget('adm');
    return redirect('/');
}

/**
 *
 */
public function settings() {
     return view('backend.settings', ['menu' => 4]);
}

/**
 *
 */
public function security() {
    $email = Tech::find('adminemail');

    return view('backend.sec', ['email' => $email->value, 'menu' => 5]);
}

public function securityChange(Request $request) {
    eval(\Psy\sh());
    $email = Tech::find('adminemail');
    if ($email->value != $request->inputEmail) {
        $email->value = $request->inputEmail;
        $email->save();
    }

    if ($request->inputPassword != "") {
        $pass = Tech::find('adminpass');
        $options = [
            'cost' => 12,
        ];
        $pass->value = password_hash($request->inputPassword, PASSWORD_DEFAULT, $options);
        $pass->save();
        $request->session()->forget('adm');
        return redirect('/login');
    }

    return view('backend.sec', ['email' => $email->value, 'menu' => 5]);
}

/**
 *
 */
public function editCatalog() {
    $candies = DB::table('candy')->orderBy('name')->simplePaginate(15);

    //return view('backend.pages.catalog', ['candies' => $candies, 'menu' => 1]);
    $contents = View::make('backend.pages.catalog', ['candies' => $candies, 'menu' => 1]);
    return response($contents)->header("Expires: Mon, 26 Jul 1997 05:00:00 GMT", false);
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
    //return view('backend.pages.candy', ['candy' => $candy, 'box' => $box, 'pack1' => $pack1, 'pack2' => $pack2, 'menu' => 0]);

    $contents = View::make('backend.pages.candy', ['candy' => $candy, 'box' => $box, 'pack1' => $pack1, 'pack2' => $pack2, 'menu' => 0]);
    return response($contents)->header("Expires: Mon, 26 Jul 1997 05:00:00 GMT", true);
}

public function candyDelete($id) {
    $candy = Candy::find($id);
    unlink(IMG_DIR . $candy->picture . '.jpg');
    unlink(IMG_DIR . $candy->picture . 'u.jpg');
    $candy->delete();

    return redirect('admin/catalog' . '?' . rand());
}


/**
 *
 */
public function candyEdit($id) {

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

    $boxes = Box::all();
    $sel = array_search($candy->box_id, $boxes->pluck('id')->toArray());

    $box = $candy->box->length . 'x' . $candy->box->width . 'x' . $candy->box->height;
    return view('backend.pages.candyedit', ['candy' => $candy, 'box' => $box, 'pack1' => $pack1, 'pack2' => $pack2, 'boxes' => $boxes, 'sel' => $sel, 'menu' => 0]);
}

/**
 *
 */
public function candyUpdate($id, Request $request) {
    $candy = Candy::find($id);
    $boxes = Box::all();

    $candy->name = $request->name;
    $candy->mass = $request->mass;
    $candy->taste = $request->taste;
    $candy->shbqty = $request->shbqty;
    $candy->boxqty = $request->boxqty;
    $candy->box_id = $boxes[$request->box_id]->id;;
    $candy->barcode = $request->barcode;
    $candy->holiday = ($request->holiday == 1) ? 1 : 0;
    $candy->comment = $request->comment;
    $candy->save();

    if (($request->picChange & 1) == 1) {
        rename(TMP_DIR . 'thumb1' . '.jpg', IMG_DIR . $candy->picture . '.jpg');
    }
    if (($request->picChange & 2) == 2) {
        rename(TMP_DIR . 'thumb2' . '.jpg', IMG_DIR . $candy->picture . 'u.jpg');
    }

    return redirect('admin/candy/' . $id . '/' . rand());
}

/**
 *
 */
public function newCandy() {
    $boxes = Box::all();

    return view('backend.pages.add', ['boxes' => $boxes, 'menu' => 2]);
}

/**
 *
 */
public function candyAdd(Request $request) {
    $candy = new Candy();
    $boxes = Box::all();

    $candy->name = $request->name;
    $candy->mass = $request->mass;
    $candy->picture = Str::ascii($request->name) . '_' . substr(md5($request->name . $request->mass), 0, 5) . '_' . $request->mass;
    $candy->taste = $request->taste;
    $candy->shbqty = $request->shbqty;
    $candy->boxqty = $request->boxqty;
    $candy->box_id = $boxes[$request->box_id]->id;
    $candy->barcode = $request->barcode;
    $candy->holiday = ($request->holiday == 1) ? 1 : 0;
    $candy->comment = $request->comment;
    $candy->save();

    if ($request->picChange > 0) {
        rename(TMP_DIR . 'thumb1' . '.jpg', IMG_DIR . $candy->picture . '.jpg');
    }
    if ($request->picChange == 3) {
        rename(TMP_DIR . 'thumb2' . '.jpg', IMG_DIR . $candy->picture . 'u.jpg');
    } else {
        copy(IMG_DIR . $candy->picture . '.jpg', IMG_DIR . $candy->picture . 'u.jpg');
    }

    return redirect('/admin/catalog');
}

public function picUpload() {
    $source = $_FILES[0]['tmp_name'];

    if ($source == '') {exit();}
    $fileInfo = array('name'=>$_FILES[0]['name'],
                      'size'=>$_FILES[0]['size'],
                      'type'=>$_FILES[0]['type']
                    );

    $tmpFilePath = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . 'tmp' . DIRECTORY_SEPARATOR;
    move_uploaded_file($source, $tmpFilePath . 'thumb' . filter_input(INPUT_POST, 'th', FILTER_VALIDATE_INT) . '.jpg');

    //$size = getimagesize($tmpFilePath . $_POST['th'] . '.jpg');
    //$fileInfo['ext'] = $info['extension'];
    //$fileInfo['dimensions'] = $size[3];
    //$fileInfo['thum'] = $_POST['th'];
    die('2');
}

public function box() {
    $boxes = Box::all();
    $boxid = array_combine($boxes->modelKeys(), $boxes->modelKeys());

    $contents = View::make('backend.pages.box', ['boxes' => $boxes, 'boxid' => $boxid, 'menu' => 6]);
    return response($contents)->header("Expires: Mon, 26 Jul 1997 05:00:00 GMT", false);
}

public function newBox() {
    $boxes = Box::all();

    return view('backend.pages.newbox', ['boxes' => $boxes, 'menu' => 0]);
}

public function addBox() {
    $boxes = Box::all();

    die('dddddddddddddddddd');

    return view('backend.pages.newbox', ['boxes' => $boxes, 'menu' => 2]);
}

public function boxEdit($id) {
    $box = Box::find($id);

    return view('backend.pages.boxedit', ['box' => $box, 'menu' => 0]);
}

/**
 *
 */
public function boxUpdate($id, Request $request) {
    $box = Box::find($id);

    $box->length = $request->length;
    $box->width = $request->width;
    $box->height = $request->height;
    $box->comment = $request->comment;
    $box->save();

    return redirect('admin/box');
}

public function delbox($id) {
    $box = Box::find($id);
    $box->delete();

    return redirect('admin/box');

}


} // ===================== END of BackendController ============================
