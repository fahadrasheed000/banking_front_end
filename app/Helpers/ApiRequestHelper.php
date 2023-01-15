<?php

use Illuminate\Support\Facades\Http;

function apiRequest($path, $method, $headers, $data)
{
    $url = env('API_URL') . $path;
    switch ($method) {
        case 'post':
            $response = Http::withHeaders($headers)->post($url, $data);
            return $response;
            break;
        case 'get':
            $response = Http::withHeaders($headers)->get($url, $data);
            return $response;
            break;
        case 'delete':
            $response = Http::withHeaders($headers)->delete($url, $data);
            return $response;
            break;
        case 'patch':
            $response = Http::withHeaders($headers)->patch($url, $data);
            return $response;
            break;
    }
}

