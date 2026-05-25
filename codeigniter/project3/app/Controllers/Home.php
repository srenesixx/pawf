<?php

namespace App\Controllers;

use App\Models\PostModel;

class Home extends BaseController
{
    public function index(): string
    {
        $postModel = new PostModel();
        
        $data = [
            'latest_posts' => $postModel->where('status', 'published')
                                        ->orderBy('created_at', 'DESC')
                                        ->limit(3)
                                        ->findAll()
        ];

        return view('home', $data);
    }
}