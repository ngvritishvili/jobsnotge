<?php

namespace App\Http\Controllers;

use App\Company;
use App\User;
use ErrorException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('company.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function register()
    {

    }

    public function create()
    {


        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        request()->validate([

            'photo' => 'mimes:jpeg,png,jpg,svg,bmp|max:2048',
            'NewCompanyName' => 'required',
            'newCompanyAuthor' => 'required',
            'newCompanyAuthorPos' => 'required',
            'newCompanyEmail' => 'required|unique:companies,company_email',
            'newCompanyPhone' => 'required|numeric',

        ]);

        $companyName = request('NewCompanyName');

        if ($request->hasFile('photo')) {
            $imageName = $companyName . time() . '.' . request()->photo->getClientOriginalExtension();
            request()->photo->move(public_path('img/company_img'), $imageName);

        }
        $attributes = [
            'name' => (request('NewCompanyName')),
            'author_name' => (request('newCompanyAuthor')),
            'position_in_company' => (request('newCompanyAuthorPos')),
            'company_email' => (request('newCompanyEmail')),
            'company_phone' => (request('newCompanyPhone')),
        ];



        if (!$request->hasFile('photo')) {
            $attributes['company_photo'] = null;
        } else {
            $attributes['company_photo'] = $imageName;
        }


        $attributes['user_id'] = Auth::user()->id;


        Company::create($attributes);


        return view('profile');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Company $company
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Company $company)
    {


        return view('company.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Company $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Company $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {

        request()->validate([

            'company_profile_picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        if ($request->hasFile('company_profile_picture')) {
            $imageName = auth()->user()->name . time() . '.' . request()->company_profile_picture->getClientOriginalExtension();
            request()->company_profile_picture->move(public_path('img/company_img'), $imageName);


            $id = request('company_id');
            $company = Company::find($id);
            $company->company_photo = $imageName;
            $company->save();

        }

        if (request('companyName')) {

            $id = request('company_id');
            $company = Company::find($id);
            $company->name = request('companyName');
            $company->save();

        }
        if (request('companyEmail')) {
            try {
                $id = request('company_id');
                $company = Company::find($id);
                $company->company_email = request('companyEmail');
                $company->save();
            } catch (QueryException  $exception) {
                return back()->withError($exception->getMessage());
            }

        }
        if (request('companyPhone')) {
            $id = request('company_id');
            $company = Company::find($id);
            $company->company_phone = request('companyPhone');
            $company->save();
        }

        $id = request('company_id');
        $showCompany = Company::find($id);


        return view('company.show', compact('showCompany','company'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Company $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Company::find($id)->delete();

        return view('profile');
    }
}
