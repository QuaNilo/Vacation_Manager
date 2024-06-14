<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class   DashboardController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //flash('Mensagem no canto superior direito')->success();
        //flash('Mensagem de informação no canto superior direito')->info();
        //flash('Mensagem de danger')->danger();
        //flash('Mensagem de warning')->warning();

        return view('dashboard.index');
    }

    public function apply_register_company_index()
    {
        return view('apply_register_company.index');
    }


    /**
     * Show the Cookies page
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function cookiesPolicy(Request $request){
        return view('dashboard.cookies_policy', ['cookies' => Str::markdown(file_get_contents(resource_path('markdown/cookies.md')))]);
    }

    /**
     * Show the Privacy Policy page
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function privacyPolicy(Request $request){
        return view('dashboard.privacy_policy', ['policy' => Str::markdown(file_get_contents(resource_path('markdown/policy.md')))]);
    }

    /**
     * Show the Terms of Service page
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function termsOfService(Request $request){
        return view('dashboard.terms_of_service', ['terms' => Str::markdown(file_get_contents(resource_path('markdown/terms.md')))]);
    }

    /**
     * Show the Success page
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function success(Request $request){
        return view('dashboard.success');
    }

    /**
     * handle the upload of a file
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function apiUpload(Request $request){

        if($request->get('rules', false)){
            $rules = ['file' =>$request->get('rules', false) ];
        }else{
            $rules = [
                //'file' => 'required|file|max:5120'
                'file' => 'required|file|max:10240'
                //'file' => 'required|file|image|max:10240',
            ];
        }
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), $rules);
        if($validator->fails()){
            $error = $validator->errors()->first('file');
            return response()->json([
                'success' => false,
                'error' => $error,
                //'errors' => $validator->errors()
            ], 300);
        }

        $path = $request->file('file')->store('public/uploads');
        $file = $request->file('file');
        $url = Storage::url($path);

        return response()->json([
            'success' => true,
            'name'          => $path,
            'original_name' => $file->getClientOriginalName(),
            'url' => $url
        ]);
    }

    /**
     * TODO improve security of this endpoint
     * handle the delete of a file temporary uploaded file
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function apiUploadDelete(Request $request){
        //verify the filename given and if the filename starts with public/uploads to try to enforece the security of this endpoint
        //that is an open endpoint to delete files on the server.
        if(($filename = $request->get('name', false)) != false && str_starts_with($filename, 'public/uploads')) {
            return response()->json([
                'success' => Storage::delete($filename),
            ]);
        }else{
            return response()->json([
                'success' => false,
                'error' => __('File name not provieded'),
                //'errors' => $validator->errors()
            ], 300);
        }
    }

    /**
     * Try to renew the lock on a model
     * @param Request $request
     * @return array
     */
    public function renewModelLock(Request $request){
        $lockStatus = Lock::setLockOrReject(null, $request->get('modelType'), $request->get('modelId'), $request->get('close', null));
        return ['success' => $lockStatus];
    }

}
