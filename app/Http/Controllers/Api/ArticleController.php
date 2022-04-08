<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Http\Resources\ArticleCollection;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use App\Services\Article\ArticleService;

class ArticleController extends Controller
{
    /**
     * Constructar
     *
     * @param ArticleService $articleService
     **/
    public function __construct(
        protected ArticleService $articleService,
    ) {
    }

    public function index()
    {
        return new ArticleCollection($this->articleService->getMany());
    }

    public function store(ArticleRequest $request)
    {
        return new ArticleResource($this->articleService->create($request));
    }

    public function show(Article $article)
    {
        return new ArticleResource($article);
    }

    public function update(ArticleRequest $request, $id)
    {
        return new ArticleResource($this->articleService->update($request, $id));
    }

    public function destroy(Article $article)
    {
        $this->articleService->delete($article);

        return response()->json([], 204);
    }
}
