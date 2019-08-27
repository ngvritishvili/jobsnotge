<?php

namespace App\Http\Controllers;

use App\Company;
use App\JobOffer;
use App\Mail\ContactUs;
use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use \Algolia\AlgoliaSearch\SearchClient;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('inbox');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $vipCompanies = JobOffer::where('vip',true)->get();

        return view('index', compact('vipCompanies'));
    }

    public function saveChanges(Request $request)
    {


        request()->validate([

            'profile_picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'company_profile_picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'user_cv' => 'mimes:doc,pdf,docx,zip|max:5048',

        ]);


        if ($request->hasFile('user_cv')) {
            $imageName = str_slug(auth()->user()->name) . time() . '.' . request()->user_cv->getClientOriginalExtension();
            request()->user_cv->move(public_path('user-cv/'), $imageName);


            $auth = auth()->user();
            $auth->cv = $imageName;
            $auth->save();
        }

        if ($request->hasFile('company_profile_picture')) {
            $imageName = auth()->user()->name . time() . '.' . request()->company_profile_picture->getClientOriginalExtension();
            request()->company_profile_picture->move(public_path('img/company_img'), $imageName);


            $id = request('company_id');
            $company = Company::find($id);
            $company->company_photo = $imageName;
            $company->save();

        }

        if ($request->hasFile('profile_picture')) {
            $imageName = auth()->user()->name . time() . '.' . request()->profile_picture->getClientOriginalExtension();
            request()->profile_picture->move(public_path('img/profile_img'), $imageName);

            $authUser = auth()->user();
            $authUser->profile_image = $imageName;
            $authUser->save();

        }


        if (request('authName')) {

            $authUser = auth()->user();
            $authUser->name = request('authName');
            $authUser->save();

        }
        if (request('authEmail')) {
            try {
                $authUser = auth()->user();
                $authUser->email = request('authEmail');
                $authUser->save();
            } catch (QueryException  $exception) {
                return back()->withError($exception->getMessage());
            }

        }
        if (request('authPhone')) {
            $authUser = auth()->user();
            $authUser->phone = request('authPhone');
            $authUser->save();
        }


        return view('profile');

    }

    public function contact()
    {

        request()->validate([

            'name' => 'required|regex:/^[\pL\s\-]+$/u|max:155',
            'email' => 'required|email:rfc,dns',
            'company-name' => 'required|regex:/^[\pL\s\-]+$/u|max:155',
            'message' => 'required',
        ]);


        $contactUs = [
            'name' => (request('name')),
            'email' => (request('email')),
            'companyName' => (request('company-name')),
            'message' => (request('message')),
        ];


        Mail::to('zukas@mail.ruu')->queue(
            new ContactUs($contactUs)
        );

        return view('contact')->with('success', 'You Mail Sent !');
    }


    public function search()
    {
//        ['jobResult' => JobOffer::orderBy('created_at', 'desc')->paginate(10)],
        $jobSearch = request('jobSearch');

        $jobResult = JobOffer::search($jobSearch)->paginate(3);

        return view('search',
            compact('jobResult'));
    }

    public function testPage(Request $request)
    {


//        $jobs = JobOffer::with('job_owner')->get();

//        $client = SearchClient::create('CQNMK4B1Q9', 'e273d026aeb1b8f4f056c224f1b377e0');
//        $index = $client->initIndex('jobsnotge');
//        $batch = json_decode(file_get_contents('contacts.json'), true);
//        $index->saveObjects($batch, ['autoGenerateObjectIDIfNotExist' => true]);
//        $index->setSettings(['customRanking' => ['desc(followers)']]);
//        $index->setSettings(
//            [
//                'searchableAttributes' => [
//                    'name',
//                    'email',
//                    'company_email',
//                    'company_phone'
//                ]
//            ]
//        );
        if ($request->has('search')) {

            $index = request('search');
            $users = Company::search($index)->get();

//            dd(Company::search($request->get('search'))->get());
        } else {
            $users = Company::get();
        }

//        $users = Company::get();
//       dd();


//        $index = new JobOffer();
//         $index->create(
//            [
//
//                    'company_id' => '4',
//                    'company_name'  => 'SpaceX',
//                    'job_title' => 'Sale',
//                    'job_date' => '2019-07-28',
//                    'type' => 'half',
//                    'experience' => '5',
//                    'salary' => '1145',
//                    'keyword' => 'ggg',
//                    'description' => 'Very First Description',
//
//            ],
//            [
//                'autoGenerateObjectIDIfNotExist' => true
//            ]
//        );

        return view('testPage', compact('users'));


    }
}
