<?php

namespace App\Services;

use App\NoticeTrait;
use App\Models\Vacation;

class WebhookService
{
    use NoticeTrait;

    public function setVacationTags($id, $request)
    {
        $data = $request->validate([
            'tags' => 'required|array',
        ]);

        $tags = $data['tags'];

        $vacation = Vacation::where('id', $id)
            ->first();

        if (!$vacation) {
            $this->notice('404', 'Вакансия не найдена!');
        }

        $vacation->update(['tags' => $tags]);

        return $this->notice(200, 'Успешно!');
    }
}