<?php

namespace App\Http\Controllers;

use App\Thread;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

/**
 * Class ThreadController
 *
 * @package App\Http\Controllers
 * @author  James Wallen-Jones <j.wallen.jones@googlemail.com>
 */
class ThreadController extends Controller
{
    /**
     * @param Thread $thread
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view(Thread $thread): View
    {
        $threads = Auth::user()->threads()->orderBy('updated_at', 'DESC')->get();

        return view('home', [
            'threads'      => $threads,
            'activeThread' => $thread,
        ]);
    }
}
