<?php

namespace App\Http\Controllers;

use GarchiCMS\GarchiCMS;
use Illuminate\Http\Request;

class GarchiController extends Controller
{
    private $client;
    private $previewToken = "";
    public function __construct()
    {
        $this->client = new GarchiCMS(env("GARCHI_API_KEY"));
        $this->previewToken = env("GARCHI_PREVIEW_TOKEN", "");
    }

    public function index(string $slug, Request $request)
    {
        // Handle the request based on the slug
        $mode = env("APP_ENV") == "production" ? 'live' : 'draft';

        if($request->has('preview_token') && $request->preview_token == $this->previewToken) {
            $mode = 'draft';
        }

        $page = $this->client->headless->getPage([
            'slug' => $slug,
            'mode' => $mode,
            'space_uid' => env("GARCHI_SPACE_UID")
        ]);

        abort_if(!$page, 404);

        return view('garchi.index', [
            'page' => $page
        ]);
    }
}
