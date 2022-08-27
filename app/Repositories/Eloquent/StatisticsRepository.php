<?php

namespace App\Repositories\Eloquent;

use App\Models\{
    User,
    Admin,
    Course,
    Support,
};

use App\Repositories\StatisticsRepositoryInterface;

class StatisticsRepository implements StatisticsRepositoryInterface
{


    public function getTotalUsers(): int
    {
        return User::count();
    }
    public function getTotalAdmins(): int
    {
        return Admin::count();

    }
    public function getTotalCourses(): int
    {
        return Course::count();

    }
    public function getTotalSupports(): int
    {
        return Support::where('status','P')->count();

    }
}
