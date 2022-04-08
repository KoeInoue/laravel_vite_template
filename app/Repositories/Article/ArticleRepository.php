<?php

namespace App\Repositories\Article;

use App\Models\Article;
use Illuminate\Pagination\LengthAwarePaginator;

class ArticleRepository implements ArticleRepositoryInterface
{
    public function getMany(): LengthAwarePaginator
    {
        return Article::with('user')->orderBy('article_id', 'desc')->paginate(20);
    }

    public function getOne(int $id): Article
    {
        return Article::whereArticleId($id)->firstOrFail();
    }

    public function update(array $data, int $id): Article
    {
        $article = $this->getOne($id);
        $article->fill($data)->save();
        return $article;
    }

    public function create(array $data): Article
    {
        return Article::create($data);
    }

    public function delete(Article $article): void
    {
        $article->delete();
    }
}
