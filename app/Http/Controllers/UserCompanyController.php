<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use App\Models\UserCompany;
use Illuminate\Http\Request;

class UserCompanyController extends Controller
{
    public function __construct()
    {
        $this->model = UserCompany::class;
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required',
            'company_id' => 'required'
        ]);

        return parent::store($request);
    }

    public function companiesByUser(int $id)
    {
        $user = User::select('users.*')->find($id)->first();
        $companies = UserCompany::select('companies.*')
                ->join('companies', 'companies.id', '=', 'users_companies.company_id')
                ->where('user_id', $id)
                ->get();

        $response['user'] = $user;
        $response['companies'] = $companies;
        return response()
            ->json($response, 200);
    }

    public function usersByCompany(int $id)
    {
        $company = Company::select('companies.*')->find($id)->first();
        $users = UserCompany::select('users.*')
                ->join('users', 'users.id', '=', 'users_companies.user_id')
                ->where('company_id', $id)
                ->get();

        $response['company'] = $company;
        $response['users'] = $users;
        return response()
            ->json($response, 200);
    }

    public function deleteUser(int $companyId, int $userId) {
        $model = UserCompany::where(['company_id' => $companyId, 'user_id' => $userId]);
        if (is_null($model->first())) {
            return response()->json([
                'erro' => 'Student not found'
            ], 404);
        }
        
        $model->delete();
        return response()->json('', 204);
    }
}
