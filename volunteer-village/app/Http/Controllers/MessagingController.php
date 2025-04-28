<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessagingController extends Controller
{
    public function __invoke()
    {
        return view('livewire.messaging');
    }
}
