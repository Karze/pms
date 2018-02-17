<?php
/**
 * Created by PhpStorm.
 * User: crrki
 * Date: 2018/2/15
 * Time: 14:26
 */

namespace App\Http\Controllers;


use App\Models\Paper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use Illuminate\Support\Facades\Config;

class PaperController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', [
            'except' => ['show', 'create', 'store', 'index']
        ]);
    }


    public function index()
    {
        $papers = Paper::paginate(10);
        return view('papers.index', compact('papers'));
    }

    public function create()
    {
        return View('papers.create');
    }

    public function store(Request $request)
    {
        $title = $request->post('title');
        $lang = $request->post('lang');
        $type = $request->post('type');

        $file = $request->file('file')->storeAs(Config::get('constants.PAPER_PATH'), $title.'_'.date('Y_m_d_H_i_s', time()).'.PDF');
        if($file) {

            $paper = new Paper();
            $paper->title = $title;
            $paper->lang = $lang;
            $paper->type = $type;
            $paper->file = $file;

            $paper->keywords_zh = implode(",", ['关键字一', '关键字二', '关键字三']);
            $paper->keywords_en = implode(",", ['key1', 'key2', 'key3']);

            $paper->department_id = rand(1,10);
            $paper->subject_id = rand(1,100);

            if($paper->save()) {
                session()->flash('success', '保存成功！');
                return redirect()->route('papers.index');
            }
        }
        session()->flash('failed', '保存失败！');
    }

    public function show()
    {

    }

}