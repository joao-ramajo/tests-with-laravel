<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class CepService
{
    public function buscarEndereco(string $cep): array
    {
        $response = Http::get("https://viacep.com.br/ws/{$cep}/json/");
        return $response->json();
    }
}
