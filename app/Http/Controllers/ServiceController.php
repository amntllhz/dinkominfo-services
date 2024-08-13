<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function showForm($slug)
    {
        $service = Service::where('slug', $slug)->firstOrFail();

        // Logika untuk menentukan view yang sesuai berdasarkan slug
        $viewName = 'forms.' . $slug;

        // Periksa apakah view exists
        if (view()->exists($viewName)) {
            return view($viewName, compact('service'));
        }

        // Jika view tidak ditemukan, gunakan view default atau tampilkan error
        return view('forms.default', compact('service'));
    }
}
