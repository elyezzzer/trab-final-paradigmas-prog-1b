<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Services\UserService;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(private UserService $userService)
    {}

    public function index(Request $request)
    {
        return response()->json(['data' => $this->userService->index($request->all())]);
    }

    public function create()
    {
        
    }

    public function store(CreateUserRequest $request)
    {
        return response()->json(['data' => $this->userService->store($request->validated())]);
    }

    public function show(string $id)
    {
        
    }
    public function edit(string $id)
    {
        
    }

    public function update(Request $request, string $id)
    {
        
    }

    public function destroy(string $id)
    {
        $this->userService->destroy($id);
    }
}
