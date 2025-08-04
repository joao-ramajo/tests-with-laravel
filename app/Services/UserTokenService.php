<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Str;

class UserTokenService
{
    public function generateToken(User $user): string
    {
        $token = Str::uuid()->toString();
        $user->api_token = $token;
        $user->save();

        return $token;
    }
}
