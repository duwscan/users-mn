<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $searchKey = $request->q ?? '';
        $usersPagination = User::where('name', 'like', "%{$searchKey}%")
            ->paginate(1);

        return view('home', [
            'usersPagination' => $usersPagination,
            'searchKey' => $searchKey
        ]);
    }
}
