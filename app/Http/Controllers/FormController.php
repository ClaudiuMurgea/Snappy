<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function up (Request $request) {
        $data = $this->validate($request, [
            'title' => '',
            'body' => ''
        ]);
    }
}
