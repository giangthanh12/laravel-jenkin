<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Tạo dữ liệu test
        $users = [
            [
                'id' => 1,
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'role' => 'Admin'
            ],
            [
                'id' => 2,
                'name' => 'Jane Smith',
                'email' => 'jane@example.com',
                'role' => 'User'
            ],
            [
                'id' => 3,
                'name' => 'Bob Johnson',
                'email' => 'bob@example.com',
                'role' => 'Editor'
            ],
            [
                'id' => 4,
                'name' => 'Alice Brown',
                'email' => 'alice@example.com',
                'role' => 'User'
            ],
            [
                'id' => 5,
                'name' => 'Charlie Wilson',
                'email' => 'charlie@example.com',
                'role' => 'User'
            ]
        ];

        return view('users.index', compact('users'));
    }
}
