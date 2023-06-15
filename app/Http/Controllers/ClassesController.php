<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Slot;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getClasses = Classes::all();

        return $getClasses;
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
        if (! $add_class) {
            return response()->json('Error in creating class', 403);
        } else {
            return response()->json($add_class, 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Classes $classes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Classes $classes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Classes $classes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
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
        $toHour.'-'.$fromHour;
    }

    public function bookclass(Request $request, Classes $class)
    {
        $slotes = Slot::where('start_time', '=', $class->class_timing)->first();

        if (! $slotes) {
            return 'No class slot on this time';
        }

        $time = Carbon::createFromFormat('H:i:s', $slotes->start_time)->format('H:i:s');

        $class_data = Classes::where('id', $class->id)->first();

        $time = Carbon::parse($class_data->class_timing)->format('H:i:s');

        if ($class_data->number_of_students >= 10) {
            $class_data->status = Classes::BookingFull;
            $class_data->save();

            return 'Class Slots are Full';
        }
        $class_data->number_of_students += 1;
        $class_data->status = Classes::BookingAvailable;

        $class_data->save();

        return 'your slot has been booked';
    }
}
