<?php

namespace App\Services;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Department;

class DepartmentService
{
    public function __construct() {}

    public function getAll() {
       return Department::all();
    }
}
