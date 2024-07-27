<?php

namespace App\Http\Controllers;

use App\Http\Resources\agentResource;
use App\Http\Resources\userResource;
use App\Models\Agent;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function lastUser()
    {
        $User = User::latest()->first();
        return $User;
    }

    public function sortByName()
    {
        $users = User::all()->sortBy('name');
        return userResource::collection($users);
    }

    public function totalSum()
    {
        return User::sum('wallet');
    }

    public function userPeriod($start='2023-08-25',$end='2024-07-13')
    {
        $users = User::whereBetween('created_at', [$start, $end])->get();
        return userResource::collection($users);
    }

    public function userLike($input='Kaitl')
    {
        $users = User::where('name', 'like', '%' . $input . '%')->get();
        return userResource::collection($users);
    }

    public function userByCity($input='4')
    {
        $agent = Agent::where('city', $input)->where('status','active')->get();
        return userResource::collection($agent->load('user'));
    }

    public function userByWallet()
    {
        $users = User::where('wallet','>',1000000)->orwhereMonth('created_at', '=', Carbon::now()->subMonth()->month)
            ->whereYear('created_at', '=', Carbon::now()->subMonth()->year)
            ->get();
        return userResource::collection($users);
    }

}
