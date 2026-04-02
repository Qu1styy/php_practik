<?php

namespace Middlewares;

use Src\Auth\Auth;
use Src\Request;
use Src\View;

class BearerAuthMiddleware
{
    public function handle(Request $request): void
    {
        $token = $this->getToken($request);
        if (empty($token)) {
            (new View())->toJSON(['message' => 'Token not found']);
        }

        if (!Auth::checkApiToken($token)) {
            (new View())->toJSON(['message' => 'Token invalid']);
        }
    }

    private function getToken(Request $request): string
    {
        $authorizationHeader = '';
        foreach ($request->headers as $header => $value) {
            if (strtolower($header) === 'authorization') {
                $authorizationHeader = $value;
                break;
            }
        }

        if (strpos($authorizationHeader, 'Bearer ') !== 0) {
            return '';
        }

        return trim(substr($authorizationHeader, 7));
    }
}
