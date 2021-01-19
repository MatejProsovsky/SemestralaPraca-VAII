<?php

namespace App\Http\Controllers;

use Aginev\Datagrid\Datagrid;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class MenuController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        return[];
    }

    public function grid(string $section, Request $request) {
        foreach (Post::all() as $post) {
            if ($post->section == $section) {
                $posts[] = $post;
            } elseif($section == 'WELCOME') {
                $posts[] = $post;
            }
        }
        return $posts;
    }

    public function cpu(Request $request){
        return view('/menu/cpu', [
            'grid' => $this->grid('CPU alebo MB', $request)
        ]);
    }

    public function welcome(Request $request){
        return view('/menu/welcome', [
            'grid' => $this->grid('WELCOME', $request)
        ]);
    }

    public function gpu(Request $request){
        return view('/menu/gpu', [
            'grid' => $this->grid('GPU', $request)
        ]);
    }

    public function memory(Request $request){
        return view('/menu/memory', [
            'grid' => $this->grid('PAMATE', $request)
        ]);
    }

    public function others(Request $request){
        return view('/menu/others', [
            'grid' => $this->grid('OSTATNÉ', $request)
        ]);
    }

    public function smart(Request $request){
        return view('/menu/smart', [
            'grid' => $this->grid('SMARTPHÓNY', $request)
        ]);
    }

    public function ntb(Request $request){
        return view('/menu/ntb', [
            'grid' => $this->grid('NOTEBOOKY', $request)
        ]);
    }
}
