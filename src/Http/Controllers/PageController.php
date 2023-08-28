<?php

namespace Hasnayeen\BladeSsg\Http\Controllers;

use Hasnayeen\BladeSsg\Models\Page;
use Hasnayeen\BladeSsg\Models\Post;
use Hasnayeen\Mdb\Facades\Mdb;
use Illuminate\Http\Request;

class PageController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, ?string $slug = '/')
    {
        $pages = Page::all();
        $page = $pages->where('slug', $slug)->first();
        if (! $page) {
            $post = Post::where('slug', $slug)->first();
            abort_if(! $post, 404);
            $content = Mdb::render($post->body);
        }

        return view('blade-ssg::page', [
            'data' => $page ? [
                'pages' => $pages,
            ] : [],
            'content' => $content ?? Mdb::render($page->body),
        ]);
    }
}
