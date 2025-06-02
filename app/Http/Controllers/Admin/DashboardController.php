<?php
namespace App\Http\Controllers\Admin;

use App\Generator\DummyGenerator;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $generator = new DummyGenerator();
        $dataOne   = $generator->generateChartData(100, now()->subDays(50), 20, 50);
        $dataTwo   = $generator->generateChartData(100, now()->subDays(50), 50, 75);
        return view('pages.admin.dashboard', compact('dataOne', 'dataTwo'));
    }

    public function home()
    {
        return view('pages.admin.home');
    }
}
