<?php

namespace App\Controllers;
use App\Models\CommunityModel;

class Community extends BaseController
{
    public function index()
    {
        $community = new CommunityModel();
        $data = [
            // 'community' => $community->findAll(),
            'community' => $community->paginate(4, 'community'),
            'pager' => $community->pager
        ];
        echo view('admin/community', $data);
    }

    public function add()
    {
        $community = new CommunityModel();
        $data = [
            'community' => $community->findAll(),
        ];
        return view('admin/community-add', $data);
    }

    public function save()
    {
        $thumbnail = $this->request->getFile('thumbnail');
        if ($thumbnail->getError() == 4) {
            $thumbnailName = 'dafault.jpg';
        } else {
            $thumbnailName = $thumbnail->getRandomName();
            $thumbnail->move('img', $thumbnailName);
        }

        $slug = url_title($this->request->getPost('name'), '-', true);
        $community  = new CommunityModel();
        $community->save([
            'slug' => $slug,
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'thumbnail' => $thumbnailName,
        ]);

        session()->setFlashdata('pesan', 'Organisasi berhasil ditambahkan');
        return redirect()->to('admin/community');
    }

    public function delete()
    {
        $community = new CommunityModel();
        $id = $this->request->getVar('id_community');
        $data = $community->find($id);
        if ($data['thumbnail'] != 'default.jpg') {
            unlink('img/'. $data['thumbnail']);
        }

        $community->delete($id);
        session()->setFlashdata('pesan', 'Organisasi berhasil dihapus');
        return redirect()->to('admin/community');
    }

    public function edit($id)
    {
        $community = new CommunityModel();
        $data = [
            'community' => $community->find($id),
            
        ];
        
        return view('admin/community-edit', $data);
    }

    public function update()
    {
        $community = new CommunityModel();
        $data = $community->find($this->request->getVar('id_community'));
        
        $thumbnail = $this->request->getFile('thumbnail');
        if ($thumbnail == '') {
            $thumbnailName = $data['thumbnail'];
        } else {
            $thumbnailName = $thumbnail->getRandomName();
            $thumbnail->move('img', $thumbnailName);
            unlink('img/'. $data['thumbnail']);
        }

        $slug = url_title($this->request->getPost('name'), '-', true);
        $community->replace([
            'slug' => $slug,
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'thumbnail' => $thumbnailName,
        ]);

        session()->setFlashdata('pesan', 'Organisasi berhasil diedit');
        return redirect()->to('admin/community');
    }
}
