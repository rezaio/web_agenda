<?php

namespace App\Controllers;

use App\Models\ArticlesModel;
use App\Models\CategoriesModel;
use App\Models\CommunityModel;
use App\Models\VisitorsModel;

class Home extends BaseController
{

    public function index()
    {
        $visitor = new VisitorsModel();
        $visitor->save([
            'type' => 2,
            'id_articles' => 1
        ]);

        $article = new ArticlesModel();
        $data = [
            'articles' => $article->join('categories', 'categories.id_categories = articles.id_categories')->limit(3)->where('status', 1)->orderBy('date', 'desc')->find(),
        ];

        function truncateString($str, $chars, $to_space, $replacement = "...")
        {
            if ($chars > strlen($str)) return $str;

            $str = substr($str, 0, $chars);
            $space_pos = strrpos($str, " ");
            if ($to_space && $space_pos >= 0)
                $str = substr($str, 0, strrpos($str, " "));

            return ($str . $replacement);
        }

        return view('home', $data);
    }

    public function article()
    {
        $article = new ArticlesModel();
        $category = new CategoriesModel();
        $data = [
            'categories' => $category->findAll(),
            'articles' => $article->join('categories', 'categories.id_categories = articles.id_categories')->where('status', 1)->orderBy('date', 'desc')->findAll(),
            'articles' => $article->paginate(2, 'articles'),
            'pager' => $article->pager
        ];

        function truncateString($str, $chars, $to_space, $replacement = "...")
        {
            if ($chars > strlen($str)) return $str;

            $str = substr($str, 0, $chars);
            $space_pos = strrpos($str, " ");
            if ($to_space && $space_pos >= 0)
                $str = substr($str, 0, strrpos($str, " "));

            return ($str . $replacement);
        }

        return view('article', $data);
    }

    public function detail($slug)
    {
        $article = new ArticlesModel();
        $category = new CategoriesModel();
        $data = [
            'categories' => $category->findAll(),
            'article' =>  $article->join('users', 'users.id_users = articles.id_users')->join('categories', 'categories.id_categories = articles.id_categories')->where('slug', $slug)->first(),
            'articles' => $article->limit(3)->find(),
        ];

        $visitor = new VisitorsModel();
        $visitor->save([
            'type' => 2,
            'id_articles' => $article->select('id_articles')->where('slug', $slug)->first()
        ]);
        return view('article-detail', $data);
    }

    public function hosting()
    {
        return view('hosting');
    }

    public function proses()
    {
        $keyword = $this->request->getVar('q');
        return redirect()->to("search/$keyword");
    }

    public function search($keyword)
    {
        function truncateString($str, $chars, $to_space, $replacement = "...")
        {
            if ($chars > strlen($str)) return $str;

            $str = substr($str, 0, $chars);
            $space_pos = strrpos($str, " ");
            if ($to_space && $space_pos >= 0)
                $str = substr($str, 0, strrpos($str, " "));

            return ($str . $replacement);
        }

        $article = new ArticlesModel();
        if ($keyword == '') {
            $data = [
                'articles' => $article->join('categories', 'categories.id_categories = articles.id_categories')->where('status', 1)->orderBy('date', 'desc')->findAll(),
            ];
            return view('article', $data);
        } else {
            $data = [
                'articles' => $article->join('categories', 'categories.id_categories = articles.id_categories')->where('status', 1)->orderBy('date', 'desc')->like('title', $keyword)->findAll(),
                'keyword' => $keyword,
            ];
            return view('search', $data);
        }
    }

    public function calendar()
    {
        return view('calendar');
    }

    public function community()
    {

        $community = new CommunityModel();
        $data = [
            // 'community' => $community->findAll(),
            'community' => $community->paginate(2, 'community'),
            'pager' => $community->pager
        ];

        function truncateString($str, $chars, $to_space, $replacement = "...")
        {
            if ($chars > strlen($str)) return $str;

            $str = substr($str, 0, $chars);
            $space_pos = strrpos($str, " ");
            if ($to_space && $space_pos >= 0)
                $str = substr($str, 0, strrpos($str, " "));

            return ($str . $replacement);
        }

        return view('community', $data);
    }
    }

