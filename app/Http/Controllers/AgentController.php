<?php

namespace App\Http\Controllers;

use App\Http\Resources\agentResource;
use App\Models\agent;
use App\Http\Requests\StoreagentRequest;
use App\Http\Requests\UpdateagentRequest;

class AgentController extends Controller
{


    public function activeAgent()
    {
        $agent = Agent::where('status', 'active')->get();
        return agentResource::collection($agent->load('user'));
    }
}
