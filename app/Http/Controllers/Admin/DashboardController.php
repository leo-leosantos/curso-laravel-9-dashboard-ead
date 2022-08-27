<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\StatisticsRepositoryInterface;
use App\Models\{
    User,
    Admin,
    Course,
    Support,
};
class DashboardController extends Controller
{

    // protected StatisticsRepositoryInterface $repository;


    // public function __construct($repository)
    // {


    //     $this->repository = $repository;
    // }


    public function index()
    {
        $totalUsers =  User::count();
        $totalAdmins = Admin::count();
        $totalCourses = Course::count();
        $totalSupports = Support::where('status','P')->count();

        return view('admin.home.index', compact('totalUsers', 'totalAdmins', 'totalCourses', 'totalSupports'));
    }
}
