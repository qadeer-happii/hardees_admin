<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __construct()
	{
		
	}
	
	public function index()
	{
		return view('booking/booking_form');
	}
}
