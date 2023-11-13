<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResouce;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Arr;

class UserAPIController extends Controller
{
    public function index()
    {

        return  UserResource::collection(User::paginate(10));
    }


    

}
