<?php
namespace App\Services;
use Illuminate\Support\Facades\Http;
class PublicApiService
{
public function getPosts(): array
    {
        // Tambahkan ->withoutVerifying() di sini
        $response = Http::withoutVerifying()->timeout(15)
            ->get('https://jsonplaceholder.typicode.com/posts');
        
        if ($response->failed()) {
            // Ubah pesan errornya agar kita tahu alasan aslinya jika masih gagal
            throw new \Exception('API Error: ' . $response->body());
        }
        
        return collect($response->json())
            ->map(function ($post) {
                return [
                    'id' => $post['id'],
                    'title' => $post['title'],
                    'body' => $post['body'],
                    'userId' => $post['userId'],
                ];
            })
            ->values()
            ->all();
    }
}
