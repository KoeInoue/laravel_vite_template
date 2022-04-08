<?php

namespace App\Repositories\Article;

use App\Models\Article;
use Illuminate\Pagination\LengthAwarePaginator;

interface ArticleRepositoryInterface
{
    public function getMany(): LengthAwarePaginator;

    public function getOne(int $id): Article;

    public function update(array $data, int $id): Article;

    public function create(array $data): Article;

    public function delete(Article $article): void;
}
