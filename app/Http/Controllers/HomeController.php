<?php
namespace AStateForum\Http\Controllers;

/**
* 
*/
class HomeController extends Controller
{
	public function index()
	{
		return view('home');
	}
}