<?php

namespace App\Libraries;

use Image;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;

/**
 * Class FileStorage
 * Handle storage
 *
 * @package App\Libraries
 */
class FileStorage
{
    /**
     * Constructar
     *
     * @param ?object $image
     * @param string $name
     * @param string $path
     * @param ?Filesystem $disk
     **/
    public function __construct(
        protected ?object $image = null,
        protected string $name = '',
        protected string $path = '',
        protected ?Filesystem $disk = null,
    ) {
        // 開発環境はローカルに保存
        if (config('app.env') === 'production' && !config('app.env')) {
            $this->disk = Storage::disk('s3');
        } else {
            $this->disk = Storage::disk('local');
        }
    }
}
