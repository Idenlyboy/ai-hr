<?php

namespace App\Services;

use App\Models\Hit;
use App\Models\User;
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

    public function getInterviewPage($id)
    {
        $hit = Hit::where('id', $id)
            ->first();

        $url = $this->getEndpointUrl('interview-page');
        $user = User::where('id', $hit->resume->user_id ?? 1)->first();

        return $url . '?uuid=' . $user->id;
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
                    "webhook_url" => route('webhook.vacation.set-tags', ['id' => $vacation->id]),
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