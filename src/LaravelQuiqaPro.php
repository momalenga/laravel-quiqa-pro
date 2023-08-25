<?php

namespace Shengamo\LaravelQuiqaPro;

use Illuminate\Support\Facades\Http;

class LaravelQuiqaPro
{

    public function getToQuiqa(string $endpoint)
    {
        $response = Http::withToken(config('laravel-quiqa-pro.QUIQA_API_KEY'))->withHeaders(
            [
                'Content-Type' => 'application/json',
            ]
        )->timeout(config('laravel-quiqa-pro.timeout'))
            ->post(config('laravel-quiqa-pro.url.url').$endpoint);

        dd($response);

        if ($response['status_code'] == 200) {
            return json_decode($response->body());
        }
    }

    public function postToQuiqa(string $endpoint, Array $payload)
    {
        $link = config('laravel-quiqa-pro.url').$endpoint;
//        dd($link);
        $response = Http::withToken(config('laravel-quiqa-pro.QUIQA_API_KEY'))->withHeaders(
            [
                'Content-Type' => 'application/json',
            ]
        )->timeout(config('laravel-quiqa-pro.timeout'))
            ->post($link, $payload);


        if ($response->status() == 200) {
            return json_decode($response->body());
        }
        return $response->status();
    }

}
