<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Http\Controllers\Controller;
use App\Models\Slot;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PhpParser\Builder\Class_;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $add_class = Classes::create([
            'name' => $request->name,
            'class_timing' => $request->class_timing,
            'class_date' => $request->class_date,
            'number_of_students' => $request->number_of_students,
            'status' => $request->status,
        ]);
        if (!$add_class) {
            return response()->json("Error in creating class", 403);
        } else {
            return response()->json($add_class, 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function show(Classes $classes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function edit(Classes $classes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Classes $classes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classes $classes)
    {
        //
    }

    public function booking()
    {
        $slots = Slot::where('id', 1)->get();
        $start_time = $slots[0]->start_time;
        $end_time = $slots[0]->end_time;
        $toHour = date('H', strtotime($start_time));
        $fromHour = date('H', strtotime($end_time));
        $toHour . '-' . $fromHour;
    }

    public function bookclass(Request $request)
    {

        $start_time = $request->start_time;
        $slotes = Slot::where('start_time', '=', $start_time)->first();
        if (!$slotes) {
            return "No class slot on this time";
        }
        $time = Carbon::createFromFormat('H:i:s', $slotes->start_time)->format('H:i');

        if ($start_time == $time) {

            $class_data = Classes::all();
            $time = Carbon::parse($class_data[0]->class_timing)->format('H:i');
            $check_class_availbity = Classes::where('class_timing', '=', $time)->first();
            if($check_class_availbity->number_of_students >= 10)
            {
                $check_class_availbity->status = Classes::BookingFull;
                $check_class_availbity->save();
                return "Class Slots are Full";
            }
            $check_class_availbity->number_of_students += 1;
            $check_class_availbity->status = Classes::BookingAvailable;

            $check_class_availbity->save();
            return "your slot has been booked";
        }
    }
}
