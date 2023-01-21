<?php

namespace App\Controllers;

use App\Models\CommunityModel;
use App\Models\UsersModel;

class Users extends BaseController
{

    public function index()
    {

        $user       = new UsersModel();
        $community  = new CommunityModel();

        $data = [
            'community'  => $community->findAll(),
            'users' => $user->join('community', 'community.id_community = users.id_community'),
            'users' => $user->paginate(4, 'users'),
            'pager' => $user->pager
        ];
        return view('admin/users', $data);
    }

    public function add()
    {
        $user = new UsersModel();
        $user->save([
            'id_community' => $this->request->getVar('id_community'),
            'username' => $this->request->getVar('username'),
            'roles' => $this->request->getVar('roles'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
        ]);

        session()->setFlashdata('pesan', 'User berhasil ditambahkan');
        return redirect()->to('admin/users');
    }

    public function delete()
    {
        $user = new UsersModel();
        $user->delete($this->request->getVar('id_users'));
        session()->setFlashdata('pesan', 'User berhasil dihapus');
        return redirect()->to('admin/users');
    }

    public function update()
    {
        $user = new UsersModel();
        $data = $user->find($this->request->getVar('id_users'));
        $user->replace([
            'id_users' => $this->request->getVar('id_users'),
            'id_community' => $this->request->getVar('id_community'),
            'roles' => $this->request->getVar('roles'),
            'username' => $this->request->getVar('username'),
            'password' => empty($this->request->getVar('password')) ? $data['password'] : password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
        ]);

        session()->setFlashdata('pesan', 'User berhasil diedit');
        return redirect()->to('admin/users');
    }
}
