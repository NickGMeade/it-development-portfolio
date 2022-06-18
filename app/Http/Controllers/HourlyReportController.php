<?php

namespace App\Http\Controllers;

use App\Models\HourlyReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HourlyReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hourlyReports = HourlyReport::orderBy('created_at', 'asc')->get();

        return view('hourlyReports.index', compact('hourlyReports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hourlyReports.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        HourlyReport::create($this->validateHourlyReport($request));

        return redirect(route('hourlyReports.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HourlyReport  $hourlyReport
     * @return \Illuminate\Http\Response
     */
    public function show(HourlyReport $hourlyReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HourlyReport  $hourlyReport
     * @return \Illuminate\Http\Response
     */
    public function edit(HourlyReport $hourlyReport)
    {
        // TOFIX need to have the Edit blade correctly display saved data
        return view('hourlyReports.edit', compact('hourlyReport'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HourlyReport  $hourlyReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HourlyReport $hourlyReport)
    {
        $hourlyReport->update($this->validateHourlyReport($request));

        return redirect(route('hourlyReports.index', compact('hourlyReport')));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HourlyReport  $hourlyReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(HourlyReport $hourlyReport)
    {
        //
    }

    /**
     * this function validates the attributes of Retro
     * @param Request $request
     * @return array
     */
    public function validateHourlyReport(Request $request): array
    {
        $validatedAtributes = $request->validate([
            'def_id'=>'required',
            'extra_info'=>'required',
            'action' =>'string|nullable',
            'abnormality'=> 'string|nullable',
        ]);

        return $validatedAtributes;
    }
}
