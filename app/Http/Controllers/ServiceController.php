<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of services.
     */
    public function index()
    {
        $services = Service::where('is_active', true)
            ->orderBy('order')
            ->get();
            
        return view('services.index', compact('services'));
    }

    /**
     * Display the specified service.
     */
    public function show(Service $service)
    {
        // Ensure the service is active
        if (!$service->is_active) {
            abort(404);
        }
        
        // Get other services for the sidebar
        $otherServices = Service::where('is_active', true)
            ->where('id', '!=', $service->id)
            ->orderBy('order')
            ->get();
            
        return view('services.show', compact('service', 'otherServices'));
    }
}