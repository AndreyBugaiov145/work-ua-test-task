<?php

namespace App\Http\Controllers;

use App\Http\Requests\UrlGenerationRequest;
use App\Models\Url;
use App\Services\UrlService;
use Illuminate\Http\Request;

class UrlGeneratorController extends Controller
{
    public function __construct(protected UrlService $urlService) {}

    public function index()
    {
        $urls = Url::latest()->get();

        return view('url-list', compact('urls'));
    }

    public function store(UrlGenerationRequest $request)
    {
        $this->urlService->createShortUrl($request->validated());

        return redirect()->back()->with('success', __('urls.success_created'));
    }

    public function redirect(Request $request, string $shortCode)
    {
        $url = $this->urlService->resolveActiveUrl($shortCode);

        $this->urlService->logVisit($url, $request->ip(), $request->userAgent());

        return redirect()->to($url->origen_url);
    }

    public function stats(Url $url)
    {
        $histories = $url->histories()->latest('visited_at')->get();

        return view('url-stats', compact('url', 'histories'));
    }

    public function destroy(Url $url)
    {
        $url->delete();

        return redirect()->back()->with('success', __('urls.success_deleted'));
    }
}
