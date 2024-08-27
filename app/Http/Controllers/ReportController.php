<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestReport;
use App\Models\Instansi;
use App\Models\Report;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function formReport()
    {
        $services = Service::all();
        $instansi = Instansi::all();
        return view('forms.report', compact('services', 'instansi'));
    }

    public function handlFormReport(RequestReport $request)
    {
        $report_id = null;

        DB::transaction(function () use ($request, &$report_id) {
            $validated = $request->validated();

            // Handle multiple file uploads
            if ($request->hasFile('proof')) {
                $proofPaths = [];
                foreach ($request->file('proof') as $proof) {
                    $path = $proof->store('proof/reports', 'public');
                    $proofPaths[] = $path;
                }
                // Store file paths as JSON array
                $validated['proof'] = $proofPaths;
            }

            $newReport = Report::create([
                'name' => $validated['applicant'],
                'instansi_id' => $validated['instansi'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'service_id' => $validated['service'],
                'report' => $validated['report'],
                'proof' => $validated['proof'],
            ]);

            $report_id = $newReport->id;
        });



        return redirect()->route('form.successreport', $report_id);
    }

    public function success($report_id)
    {
        $report = Report::findOrFail($report_id);
        return view('forms.success-report', compact('report'));
    }
}
