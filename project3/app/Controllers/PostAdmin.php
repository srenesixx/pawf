<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PostModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class PostAdmin extends BaseController
{
    public function index()
    {
        $post = new PostModel();
        
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $post->like('title', $keyword);
        }

        $data['posts'] = $post->findAll();
        $data['keyword'] = $keyword;
        
        echo view('admin/admin_post_list', $data);
    }
    //--------------------------------------------------------------
    public function preview($slug)
    {
        $post = new PostModel();
        $data['post'] = $post->where('slug', $slug)->first();
        $data['is_admin'] = true;
        
        if (!$data['post']) {
            throw
            PageNotFoundException::forPageNotFound();
        }
        echo view('post_detail', $data);
    }
    //----------------------------------------------------------
    public function create()
    {
        // lakukan validasi
        $validation = \Config\Services::validation();
        $validation->setRules(['title' => 'required']);
        $isDataValid =
            $validation->withRequest($this->request)->run();
        // jika data valid, simpan ke database
        if ($isDataValid) {
            $post = new PostModel();
            $post->insert([
                "title" => $this->request->getPost('title'),
                "content" => $this->request->getPost('content'),
                "status" => $this->request->getPost('status'),
                "slug" =>
                url_title($this->request->getPost('title'), '-', TRUE)
            ]);
            return redirect('admin/post');
        }
        // tampilkan form create
        echo view('admin/admin_post_create');
    }
    //---------------------------------------------------------
    public function edit($slug)
    {
        // ambil artikel yang akan diedit
        $post = new PostModel();
        $data['post'] = $post->where('slug', $slug)->first();
        
        if (!$data['post']) {
            throw PageNotFoundException::forPageNotFound();
        }

        // lakukan validasi data artikel
        $validation = \Config\Services::validation();
        $validation->setRules([
            'title' => 'required'
        ]);
        
        $isDataValid = $validation->withRequest($this->request)->run();
        
        // jika data valid, maka simpan ke database
        if ($isDataValid) {
            $post->update($data['post']['id'], [
                "title" => $this->request->getPost('title'),
                "content" => $this->request->getPost('content'),
                "status" => $this->request->getPost('status')
            ]);
            return redirect('admin/post');
        }
        // tampilkan form edit
        echo view('admin/admin_post_update', $data);
    }
    //-------------------------------------------------------------
    public function delete($slug)
    {
        $post = new PostModel();
        $record = $post->where('slug', $slug)->first();
        if ($record) {
            $post->delete($record['id']);
        }
        return redirect('admin/post');
    }
}
