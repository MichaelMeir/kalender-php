<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Birthday;

class BirthdayController extends Controller
{

	/**
	*
	*   Shows the calendar based on the Birthday Model.
	*
	*	@return [string] Returns the view of index.blade.php
	*
	*/
    public function index() {
    	
    	$lastMonth = -1;
    	$lastDay = 0;

    	$birthdays = Birthday::orderBy('month')->orderBy('day')->get();

    	return view('kalender.index', compact('birthdays', 'lastMonth', 'lastDay'));
    }

    /**
	*
	*	Creates a new row in the Birthday Table
	*
	*	
	*
    */
    public function create_view() {

    	return view('kalender.create');
    }

	/**
	*
	*	Creates a new row in the Birthday Table
	*
	*	
	*
    */
    public function create(Request $request) {
    	
    	$request->validate([
    		'name' => 'required|min:3',
    		'date' => 'required|date'
    	]);

    	$date = date_create($request->date);

    	$name = $request->name;

    	$year = date_format($date, "Y");
    	$month = date_format($date, "m");
    	$day = date_format($date, "d");

    	$birthday = new Birthday;
    	$birthday->person = $name;
    	$birthday->day = $day;
    	$birthday->month = $month;
    	$birthday->year = $year;

    	$birthday->save();

    	return redirect(url('/kalender'));

    }

    public function delete($id) {
    	Birthday::find($id)->delete();
    	return back();
    }

    	/**
	*
	*	Creates a new row in the Birthday Table
	*
	*	
	*
    */
    public function edit_view($id) {

    	$birthday = Birthday::find($id);

    	return view("kalender.edit", compact('birthday'));

    }

    public function edit(Request $request, $id) {
    	$request->validate([
    		'name' => 'required|min:3',
    		'date' => 'required|date'
    	]);

    	$date = date_create($request->date);

    	$name = $request->name;

    	$year = date_format($date, "Y");
    	$month = date_format($date, "m");
    	$day = date_format($date, "d");

    	$birthday = Birthday::find($id);
    	$birthday->person = $name;
    	$birthday->day = $day;
    	$birthday->month = $month;
    	$birthday->year = $year;

    	$birthday->save();

    	return redirect(url('/kalender'));

    }
}
