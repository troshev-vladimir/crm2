<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Http\Resources\DepartmentResource;
use App\Http\Resources\DepartmentCollection;
use App\Services\DepartmentService;

class DepartmentController extends Controller {
    private $departmentService;

    public function __construct()
    {
        $this->middleware('auth:api');
        $this->departmentService = new DepartmentService();
    }

    public function index(Request $request)
    {
       return new DepartmentCollection($this->departmentService->getAll());
    }

    public function show($id)
    {
    }

    public function store(Request $request)
    {   
      
    }

    public function update(Request $request, $id)
    {
        
    }

    public function delete($id)
    {
    }
}
