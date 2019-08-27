<?php

namespace App\Http\Controllers;

use App\Company;
use App\JobOffer;
use App\Mail\SendCvToCompany;
use Faker\Provider\File;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Laracasts\Utilities\JavaScript\JavaScriptServiceProvider;
use JavaScript;
use mysql_xdevapi\Exception;
use phpDocumentor\Reflection\Types\Boolean;

class JobOfferController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'jobShow');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (auth()->check()) {
            $authUser = boolval(Auth::user()->cv);

            if ($authUser == true) {
                JavaScript::put(['CV' => 'yes']);


                return view('job.index');
            }

            if ($authUser == false) {
                JavaScript::put(['CV' => 'no']);


                return view('job.index');
            }

        } else {
            JavaScript::put(['CV' => 'no']);
            return view('job.index');

        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $company_id = request('company_id');

        return view('job.create', compact('company_id'));
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

            'job_title' => 'required|regex:/^[\pL\s\-]+$/u|max:155',
            'job_date' => 'required|date',
            'type' => 'required',
            'experience' => 'required',
            'salary' => 'required|numeric',
            'currency' => 'required',
            'keyword' => 'required',
            'description' => 'required',

        ]);


        $id = request('company_id');
        $company = Company::find($id);
        $companyName = $company->name;


        $newJobAttributes = [
            'company_id' => $id,
            'company_name' => $companyName,
            'job_title' => (request('job_title')),
            'job_date' => (request('job_date')),
            'type' => (request('type')),
            'experience' => (request('experience')),
            'salary' => (request('salary')),
            'currency' => (request('currency')),
            'keyword' => (request('keyword')),
            'description' => (request('description'))
        ];


        JobOffer::create($newJobAttributes);

        return view('profile');

    }

    /**
     * Display the specified resource.
     *
     * @param \App\JobOffer $jobOffer
     * @return \Illuminate\Http\Response
     */
    public function show(JobOffer $jobOffer)
    {


        $id = request('id');
        dd(request()->all());
        $jobOffer = JobOffer::find($id);

        return view('job.show', compact('jobOffer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\JobOffer $jobOffer
     * @return \Illuminate\Http\Response
     */
    public function edit(JobOffer $jobOffer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\JobOffer $jobOffer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobOffer $jobOffer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\JobOffer $jobOffer
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobOffer $jobOffer)
    {
        //
    }

    public function apply(JobOffer $jobOffer)
    {

//        dd(request( )->all());


            $result = request('result');
            $id = $result['company_id'];
            $company = Company::find($id);
            $companyMail = $company['company_email'];
            $job_title = $result['job_title'];
            $file = auth()->user()->cv;
            $user = auth()->user();

            Mail::to($companyMail)->queue(
                new SendCvToCompany($file, $user, $job_title)
            );

            return back()->with('success', 'Your CV Sent');




    }

    public function applyFromInside(JobOffer $jobOffer)
    {

        $id = request('company_id');
        $company = Company::find($id);
        $companyMail = $company->company_email;
        $job_title = request('job_title');
        $file = auth()->user()->cv;
        $user = auth()->user();

        Mail::to($companyMail)->queue(
            new SendCvToCompany($file, $user, $job_title)
        );

        return back()->with('success', 'Your CV Sent');

    }

    public function jobsearch()
    {


        $loginCheck = Auth::check();

        if ($loginCheck) {
            JavaScript::put(['user' => 'guest']);
        }
        if (!$loginCheck) {
            JavaScript::put(['user' => 'auth']);
        }


        $userGotCv = boolval(Auth::user()->cv);

        if ($userGotCv == true) {
            JavaScript::put(['CV' => 'yes']);


            return view('job.jobsearch');
        }

        if ($userGotCv == false) {
            JavaScript::put(['CV' => 'no']);


            return view('job.jobsearch');
        }

    }

    public function jobShow(JobOffer $jobOffer)
    {

        $id = request('id');
        $jobOffer = JobOffer::find($id);

        return view('job.show', compact('jobOffer'));
    }

}
