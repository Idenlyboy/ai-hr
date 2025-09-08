<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WebhookRouteAccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $signatureHeader = $request->header('X-AI-Interviewer-Signature');
        if (!$signatureHeader) {
            return response()->json(['error' => 'Missing signature'], 401);
        }

        $payload = $request->getContent();
        if ($payload === false) {
            return response()->json(['error' => 'Empty payload'], 400);
        }

        $token = env('WEBHOOK_SECRET_TOKEN');
        if (!$token) {
            \Log::error('WEBHOOK_SECRET_TOKEN is not set');
            return response()->json(['error' => 'Server configuration error'], 500);
        }

        $expectedSignature = hash_hmac('sha256', $payload, $token);

        if (!hash_equals($expectedSignature, $signatureHeader)) {
            return response()->json(['error' => 'Invalid signature'], 401);
        }

        return $next($request);
    }
}
