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
                'role' => 'Admin',
                'avatar' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8cHJvZmlsZXxlbnwwfHwwfHx8MA%3D%3D',
                'department' => 'IT',
                'status' => 'active',
                'last_login' => '2024-03-15 09:30:00'
            ],
            [
                'id' => 2,
                'name' => 'Jane Smith',
                'email' => 'jane@example.com',
                'role' => 'User',
                'avatar' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8cHJvZmlsZXxlbnwwfHwwfHx8MA%3D%3D',
                'department' => 'Marketing',
                'status' => 'active',
                'last_login' => '2024-03-15 10:15:00'
            ],
            [
                'id' => 3,
                'name' => 'Bob Johnson',
                'email' => 'bob@example.com',
                'role' => 'Editor',
                'avatar' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTJ8fHByb2ZpbGV8ZW58MHx8MHx8fDA%3D',
                'department' => 'Content',
                'status' => 'inactive',
                'last_login' => '2024-03-14 16:45:00'
            ],
            [
                'id' => 4,
                'name' => 'Alice Brown',
                'email' => 'alice@example.com',
                'role' => 'User',
                'avatar' => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTB8fHByb2ZpbGV8ZW58MHx8MHx8fDA%3D',
                'department' => 'Sales',
                'status' => 'active',
                'last_login' => '2024-03-15 08:20:00'
            ],
            [
                'id' => 5,
                'name' => 'Charlie Wilson',
                'email' => 'charlie@example.com',
                'role' => 'User',
                'avatar' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTl8fHByb2ZpbGV8ZW58MHx8MHx8fDA%3D',
                'department' => 'HR',
                'status' => 'active',
                'last_login' => '2024-03-15 11:05:00'
            ]
        ];

        return view('users.index', compact('users'));
    }
}
