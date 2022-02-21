<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->model = Company::class;
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'cnpj' => 'required',
            'address' => 'required'
        ]);

        return parent::store($request);
    }
}
