<?php

namespace App\Http\Controllers;

/**
 * Created by PhpStorm.
 * User: Wang
 * Date: 2017/12/20
 * Time: 17:39
 */
class ChatController extends Controller
{
    public function index()
    {
        return view("chat");
    }
}