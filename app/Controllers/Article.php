<?php

namespace App\Controllers;
use App\Models\ArticlesModel;
use App\Models\CategoriesModel;
use App\Models\CommunityModel;
use App\Models\UsersModel;
use App\Models\VisitorsModel;
use Pusher\Pusher;

class Article extends BaseController
{
    public function index()
    {
        $article = new ArticlesModel();
        $user = new UsersModel();
        $category = new CategoriesModel();
        $community = new CommunityModel();

        $roles = session()->get('roles');
        if ($roles == 'admin' ) {
            $data = [
                'user'  => $user->find(session()->get('id_users')),
                'categories' => $category->findAll(),
                'community' => $community->findAll(),
                'articles' => $article->join('categories', 'categories.id_categories = articles.id_categories')->where('status', 1)->orderBy('date', 'desc'),
                'articles' => $article->paginate(4, 'articles'),
                'pager' => $article->pager
            ];
            echo view('admin/article', $data);
        } else {
            $data = [
                'user'  => $user->find(session()->get('id_users')),
                'categories' => $category->findAll(),
                'articles' => $article->join('categories', 'categories.id_categories = articles.id_categories')->where(['status' => 1, 'id_users' => session()->get('id_users')])->orderBy('date', 'desc'),
                'articles' => $article->paginate(4, 'articles'),
                'pager' => $article->pager
            ];
            echo view('admin/article', $data);
        }

    }

    public function add()
    {
        $category = new CategoriesModel();
        $data = [
            'categories' => $category->findAll(),
        ];
        return view('admin/article-add', $data);
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

        $roles = session()->get('roles');

        $slug = url_title($this->request->getPost('title'), '-', true);
        $article  = new ArticlesModel();
        $article->save([
            'slug' => $slug,
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'thumbnail' => $thumbnailName,
            'date' => date("Y-m-d"),
            'id_users' => session()->get('id_users'),
            'id_categories' => $this->request->getPost('id_categories'),
            'status' => $roles == 'admin' ? 1 : 2,
            'notification' => 1,
        ]);

        $options = array(
            'cluster' => 'ap1',
            'useTLS' => true
          );
          $pusher = new Pusher(
            '81fed0e008d5c25a0657',
            '3c5508fdf08f441125a4',
            '1541690',
            $options
          );
        
          $pesan['message'] = 'Ada Artikel Yang Harus di Verifikasi';
          $pusher->trigger('my-channel', 'my-event', $pesan);
        session()->setFlashdata('pesan', 'Artikel berhasil ditambahkan');
        return redirect()->to('admin/article');
    }

    public function delete()
    {
        $article = new ArticlesModel();
        $id = $this->request->getVar('id_articles');
        $data = $article->find($id);
        if ($data['thumbnail'] != 'default.jpg') {
            unlink('img/'. $data['thumbnail']);
        }

        $article->delete($id);
        session()->setFlashdata('pesan', 'Artikel berhasil dihapus');
        return redirect()->to('admin/article');
    }

    public function edit($id)
    {
        $category = new CategoriesModel();
        $article = new ArticlesModel();
        $data = [
            'article' => $article->join('categories', 'categories.id_categories = articles.id_categories')->find($id),
            'categories' => $category->findAll(),
        ];
        
        return view('admin/article-edit', $data);
    }

    public function update()
    {
        $article = new ArticlesModel();
        $data = $article->find($this->request->getVar('id_articles'));
        
        $thumbnail = $this->request->getFile('thumbnail');
        if ($thumbnail == '') {
            $thumbnailName = $data['thumbnail'];
        } else {
            $thumbnailName = $thumbnail->getRandomName();
            $thumbnail->move('img', $thumbnailName);
            unlink('img/'. $data['thumbnail']);
        }

        $roles = session()->get('roles');
        $slug = url_title($this->request->getPost('title'), '-', true);
        $article->replace([
            'slug' => $slug,
            'id_articles' => $this->request->getVar('id_articles'),
            'title' => $this->request->getVar('title'),
            'description' => $this->request->getVar('description'),
            'status' => $this->request->getVar('status'),
            'thumbnail' => $thumbnailName,
            'date' => $data['date'],
            'id_users' => $data['id_users'],
            'id_categories' => $this->request->getPost('id_categories'),
        ]);
        session()->setFlashdata('pesan', 'Artikel berhasil diedit');
        return redirect()->to('admin/article');
    }

    public function verificationView()
    {
        $article = new ArticlesModel();
        $category = new CategoriesModel();
        $data = [
            'categories' => $category->findAll(),
            'articles' => $article->join('categories', 'categories.id_categories = articles.id_categories')->where('status', 2),
            'articles' => $article->paginate(4, 'articles'),
            'pager' => $article->pager
        ];
        echo view('admin/article-verification', $data);
    }

    public function verification()
    {
        $article = new ArticlesModel();

        $data = [
            'status' => 1,
        ];

        $article->update( $this->request->getPost('id_articles') , $data);
        return redirect()->to('admin/article/verification');
    }

    public function review($slug)
    {
        $article = new ArticlesModel();
        $category = new CategoriesModel();
        $data = [
            'categories' => $category->findAll(),
            'article' =>  $article->join('users', 'users.id_users = articles.id_users')->join('categories', 'categories.id_categories = articles.id_categories')->where('slug', $slug)->first(),
            'articles' => $article->limit(3)->find(),
        ];
        return view('admin/article-review', $data);
    }

    public function filter($slug)
    {
        $article = new ArticlesModel();
        $user = new UsersModel();
        $category = new CategoriesModel();
        $community = new CommunityModel();
        
        $data = [
            'user'  => $user->find(session()->get('id_users')),
            'categories' => $category->findAll(),
            'community' => $community->findAll(),
            'articles' => $article->join('categories', 'categories.id_categories = articles.id_categories')->where(['status' => 1, 'id_users' => $slug]),
            'articles' => $article->paginate(4, 'articles'),
            'pager' => $article->pager
        ];
        echo view('admin/article', $data);
    }
}
