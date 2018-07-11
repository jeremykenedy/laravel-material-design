<?php

namespace App\Services;

use App\Models\FrontEndPage;
use App\Models\Tag;
use Carbon\Carbon;

class FrontEndProcesses
{
    protected $tag;
    private $pageData;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($tag)
    {
        $this->tag = $tag;
        $this->handle();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if ($this->tag) {
            $this->pageData = $this->tagIndexData($this->tag);

            return $this->tagIndexData($this->tag);
        }

        $this->pageData = $this->normalIndexData();

        return $this->normalIndexData();
    }

    /**
     * Gets the response.
     *
     * @return private pageData[]
     */
    public function getResponse()
    {
        return $this->pageData;
    }

    /**
    * Return data for normal index page
    *
    * @return array
    */
    protected function normalIndexData()
    {
        $pages = FrontEndPage::with('tags')
            ->where('published_at', '<=', Carbon::now())
            ->where('is_draft', 0)
            ->orderBy('published_at', 'desc')
            ->simplePaginate(config('pages.pages_per_page'));

        return [
            'title'             => config('pages.title'),
            'subtitle'          => config('pages.subtitle'),
            'pages'             => $pages,
            'page_image'        => config('pages.page_image'),
            'meta_description'  => config('pages.description'),
            'reverse_direction' => false,
            'tag'               => null,
        ];
    }

    /**
    * Return data for a tag index page
    *
    * @param string $tag
    * @return array
    */
    protected function tagIndexData($tag)
    {
        $tag = Tag::where('tag', $tag)->firstOrFail();
        $reverse_direction = (bool)$tag->reverse_direction;

        $pages = FrontEndPage::where('published_at', '<=', Carbon::now())
            ->whereHas('tags', function ($q) use ($tag) {
                $q->where('tag', '=', $tag->tag);
            })
            ->where('is_draft', 0)
            ->orderBy('published_at', $reverse_direction ? 'asc' : 'desc')
            ->simplePaginate(config('pages.pages_per_page'));

        $pages->addQuery('tag', $tag->tag);

        $page_image = $tag->page_image ?: config('pages.page_image');

        return [
            'title'             => $tag->title,
            'subtitle'          => $tag->subtitle,
            'pages'             => $pages,
            'page_image'        => $page_image,
            'tag'               => $tag,
            'reverse_direction' => $reverse_direction,
            'meta_description'  => $tag->meta_description ?: \ config('pages.description'),
        ];
    }

}
