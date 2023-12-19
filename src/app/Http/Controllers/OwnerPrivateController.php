<?php

namespace App\Http\Controllers;

use App\Http\Requests\ManagerRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class OwnerPrivateController extends Controller
{
  public function index()
  {
    return view('owner');
  }

    public function create()
  {
    return view('ownerCreate');
  }

    public function confirm(ManagerRequest $request)
  {
    $data = $request->all();

    return view('ownerConfirm', compact('data'));
  }

    public function store(ManagerRequest $request)
  {
    User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);

    return view('ownerThanks');
  }

}