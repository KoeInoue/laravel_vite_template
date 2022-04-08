<?php

namespace App\Services\Article;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Repositories\Article\ArticleRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class ArticleService
{
    /**
     * Constructar
     *
     * @param  ArticleRepositoryInterface  $articleRepo
     */
    public function __construct(
        protected ArticleRepositoryInterface $articleRepo,
    ) {
    }

    public function getMany(): LengthAwarePaginator
    {
        return $this->articleRepo->getMany();
    }

    public function getOne(int $id): Article
    {
        return $this->articleRepo->getOne($id);
    }

    public function update(ArticleRequest $request, int $id): Article
    {
        return $this->articleRepo->update($request->validated(), $id);
    }

    public function delete(Article $article): void
    {
        $this->articleRepo->delete($article);
    }

    public function create(ArticleRequest $request): Article
    {
        return $this->articleRepo->create($request->validated());
    }
}
