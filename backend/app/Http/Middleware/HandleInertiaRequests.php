<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        $token = $request->bearerToken() ?? $request->session()->get('jwt_token');

        if ($token && $user = auth('api')->setToken($token)->user()) {
            return [
                'auth' => [
                    'user' => [
                        'name' => $user->name,
                        'email' => $user->email,
                        'role' => $user->getRoleNames()->first(),
                        'token' => $token,
                    ],
                ]
            ];
        }

        return [
            'auth' => ['user' => null],
        ];
    }
}
