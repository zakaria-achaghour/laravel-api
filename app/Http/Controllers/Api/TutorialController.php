<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
/*
use App\Http\Requests\Role\StoreRoleRequest;
use App\Http\Requests\Role\UpdateRoleRequest;
*/
use App\Http\Resources\UserResource;
use App\Models\Tutorial;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TutorialController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(Tutorial::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|between:2,100',
            'description' => 'required|string|between:2,100',

           
        ]);
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
       }

       
       $tutorial = Tutorial::create(
                   $validator->validated()
               );

       return response()->json([
           'message' => 'tutorial successfully Created',
           'tutorial' => $tutorial
       ], 201);

    }

    
}
