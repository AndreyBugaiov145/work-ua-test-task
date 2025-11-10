<?php

namespace App\Services;

use App\Models\Url;
use App\Models\UrlHistory;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class UrlService
{
    public function createShortUrl(array $data): Url
    {
        $expiration = $this->buildExpiration($data['hours'], $data['minutes']);
        $shortCode = $this->generateUniqueShortCode();

        return Url::create([
            'origen_url' => $data['origen_url'],
            'created_url' => $shortCode,
            'expired_at' => $expiration->toDateTimeString(),
        ]);
    }

    public function resolveActiveUrl(string $shortCode): Url
    {
        $url = Url::where('created_url', $shortCode)->first();

        if (! $url || Carbon::parse($url->expired_at)->isPast()) {
            throw new ModelNotFoundException(__('urls.link_expired'));
        }

        return $url;
    }

    public function logVisit(Url $url, string $ip, ?string $userAgent): void
    {
        UrlHistory::create([
            'url_id' => $url->id,
            'ip' => $ip,
            'user_agent' => $userAgent,
            'visited_at' => now(),
        ]);
    }

    protected function buildExpiration(int $hours, int $minutes): Carbon
    {
        return Carbon::now()
            ->addHours($hours)
            ->addMinutes($minutes);
    }

    protected function generateUniqueShortCode(int $length = 6): string
    {
        do {
            $code = Str::random($length);
        } while (Url::where('created_url', $code)->exists());

        return $code;
    }
}
