<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Customer;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JobController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        $staffs = Staff::all();
        $jobs = Job::with('customer', 'staff')->latest()->paginate(27);
        return view('job.list', compact('jobs', 'customers', 'staffs'));
    }



    public function store(Request $request)
    {

        try {
            // $validater = $request->validate([
            //     'customer_id' => 'required',
            //     'staff_id' => 'required',
            //     'job_title' => 'required',
            //     'rate_type' => 'required',
            //     'start_time' => 'required',
            //     'end_time' => 'required',
            // ]);
            $validator = Validator::make($request->all(), [
                'customer_id' => 'required',
                'staff_id' => 'required',
                'job_title' => 'required',
                'rate_type' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $job = new Job();
            $job->customer_id = $request->customer_id;
            $job->staff_id = $request->staff_id;
            $job->job_title = $request->job_title;
            $job->description = $request->description ?? '';
            $job->rate_type = $request->rate_type;
            if ($request->rate_option == 'day_wise') {
                $job->days = json_encode($request->days);
                $job->duration = $request->duration;
                $job->person = $request->person;
                $job->time = $request->time;
                $job->source = $request->source;
            } else if ($request->rate_option == 'one_time') {
                $job->date = $request->date;
            }
            $job->start_time = $request->start_time_date . ' ' . $request->start_time_time;
            $job->end_time = $request->end_time_date . ' ' . $request->end_time_time;
            $job->custom_rate = $request->rate_type == 'custom_rate' ? $request->custom_rate : null;
            $job->save();


            // $result = Job::create(
            //     [
            //         'customer_id' => $request->customer_id,
            //         'staff_id' => $request->staff_id,
            //         'job_title' => $request->job_title,
            //         'description' => $request->description,
            //         'rate_type' => $request->rate_type,
            //         'start_time' => $request->start_time,
            //         'end_time' => $request->end_time,
            //     ]
            // );
            return redirect()->route('jobs.index')->with('success', 'Job created successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage())->withInput();
        }
    }

    public function edit($id)
    {
        $job = Job::findOrFail($id);
        $customers = Customer::all();
        $staffs = Staff::all();
        return view('jobs.edit', compact('job', 'customers', 'staffs'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'customer_id' => 'required',
            'staff_id' => 'nullable',
            'job_title' => 'required',
            'description' => 'nullable',
            'rate_type' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'custom_rate' => 'required',
        ]);

        try {
            $job = Job::findOrFail($id);
            $job->update($request->all());
            if ($request->rate_type == 'custom_rate') {
                $job->custom_rate = $request->custom_rate;
            } else {
                $job->custom_rate = null;
            }
            if ($request->rate_option == 'day_wise') {
                $job->days = json_encode($request->days);
                $job->duration = $request->duration;
                $job->person = $request->person;
                $job->time = $request->time;
                $job->source = $request->source;
            } else if ($request->rate_option == 'one_time') {
                $job->date = $request->date;
            } else {
                $job->days = null;
                $job->duration = null;
                $job->person = null;
                $job->time = null;
                $job->source = null;
                $job->date = null;
            }
            $job->save();

            return redirect()->route('jobs.index')->with('success', 'Job updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage())->withInput();
        }
    }

    public function destroy($id)
    {
        $job = Job::findOrFail($id);
        $job->delete();
        return redirect()->route('jobs')->with('success', 'Job deleted successfully');
    }
}
