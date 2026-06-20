<?php

namespace App\Helpers;

class JwtHelper
{
    /**
     * Génère un JWT signé HMAC-SHA256 — aucune lib externe.
     */
    public static function generate(array $payload): string
    {
        $header  = self::b64(json_encode(['alg' => 'HS256', 'typ' => 'JWT']));
        $payload = self::b64(json_encode($payload));
        $sig     = self::b64(hash_hmac('sha256', "$header.$payload", env('JWT_SECRET'), true));

        return "$header.$payload.$sig";
    }

    /**
     * Vérifie et décode un JWT.
     * Retourne le payload (array) ou null si invalide / expiré.
     */
    public static function verify(string $token): ?array
    {
        $parts = explode('.', $token);
        if (count($parts) !== 3) return null;

        [$header, $payload, $sig] = $parts;

        // Vérifie la signature
        $expected = self::b64(hash_hmac('sha256', "$header.$payload", env('JWT_SECRET'), true));
        if (!hash_equals($expected, $sig)) return null;

        // Décode le payload
        $data = json_decode(base64_decode(strtr($payload, '-_', '+/')), true);
        if (!$data) return null;

        // Vérifie l'expiration
        if (isset($data['exp']) && $data['exp'] < time()) return null;

        return $data;
    }

    // Encodage base64 URL-safe sans padding
    private static function b64(string $data): string
    {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }
}
