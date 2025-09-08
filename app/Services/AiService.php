<?php

namespace App\Services;

use App\NoticeTrait;
use App\Models\Vacation;
use Illuminate\Support\Facades\Http;

class AiService
{
    use NoticeTrait;

    protected $aiConfig;

    public function __construct()
    {
        $this->aiConfig = config('ai');
    }

    public function vacationProcess($id)
    {
        $url = $this->getEndpointUrl('vacancy-text-generate-tags');

        $vacation = Vacation::where('id', $id)
            ->where('status', '<>', 'draft')
            ->first();

        if (!$vacation) {
            $this->notice('404', 'Вакансия не найдена!');
        }

        $response = Http::withHeaders([
            'X-Webhook-Token' => env('WEBHOOK_SECRET_TOKEN'),
            'Content-Type' => 'application/json',
        ])->post($url, [
                    "webhook_url" => route('webhook.vacation.set-tags'),
                    "vacancy_text" => $vacation->description,
                ]);

        if ($response->successful()) {
            \Log::info('Webhook delivered', $response->json());
        } else {
            \Log::error('Webhook failed', [
                'status' => $response->status(),
                'body' => $response->body(),
            ]);
        }
    }

    private function getEndpointUrl($endpoint)
    {
        return $this->aiConfig['service_url'] . $this->aiConfig['endpoints'][$endpoint];
    }
}