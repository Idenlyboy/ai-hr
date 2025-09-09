<?php

namespace App\Services;

use App\Models\Hit;
use App\NoticeTrait;
use Illuminate\Support\Facades\Session;

class HitService
{
    use NoticeTrait;

    private $paginate = 6;

    /**
     * Get paginated hits
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function paginate()
    {
        $page = request('page') ?? 1;
        $userRole = Session::get('role');
        $userID = Session::get('user_id');

        $hits = Hit::where('status', '<>', 'draft');

        if ($userRole === 'hr') {
            $hits = $hits->whereHas('vacation', function ($query) use ($userID) {
                $query->where('user_id', $userID);
            });
        }

        if ($userRole === 'hunter') {
            $hits = $hits->whereHas('resume', function ($query) use ($userID) {
                $query->where('user_id', $userID);
            });
        }

        return $hits->with(['vacation', 'resume'])
            ->paginate($this->paginate, ['*'], 'page', $page);
    }

    /**
     * Update Hit
     * @param mixed $id
     * @param mixed $request
     * @return array{code: mixed}
     */
    public function update($id, $request)
    {
        $data = $request->validated();

        $userRole = Session::get('role');
        $userID = Session::get('user_id');

        if ($userRole !== 'hr' && $userRole !== 'admin') {
            return $this->notice('403', 'Вы не можете редактировать отклик!');
        }

        $hit = Hit::where('id', $id)
            ->where('status', '<>', 'draft');

        if (!$hit) {
            return $this->notice('404', 'Отклик не найден!');
        }

        if ($userID !== $hit->user_id && $userRole !== 'admin') {
            return $this->notice('403', 'Вы не можете редактировать этот отклик!');
        }

        $hit->update($data);

        return $this->notice('200', 'Успешно!', ['hit' => $hit]);
    }

    /**
     * Update Hit status
     * @param mixed $id
     * @param mixed $request
     * @return array{code: mixed}
     */
    public function updateStatus($id, $request)
    {
        $userRole = Session::get('role');
        $userID = Session::get('user_id');
        $data = [];

        $hit = Hit::where('id', $id)
            ->first();

        if (!$hit) {
            return $this->notice('404', 'Отклик не найден!');
        }

        if ($userRole === 'hr' && ($userID == $hit->vacation->user_id ?? 0)) {
            $data = $request->validate(['hr_status' => 'required|string']);
        }

        if ($userRole === 'hunter' && ($userID == $hit->resume->user_id ?? 0)) {
            $data = $request->validate(['hunter_status' => 'required|string']);
        }

        // return $this->notice('403', 'Вы не можете редактировать этот отклик!');

        $hit->update($data);

        return $this->notice('200', 'Успешно!', ['hit' => $hit]);
    }

    /**
     * Destroy Hit
     * @param mixed $id
     * @return array{code: mixed}
     */
    public function destroy($id)
    {
        $hit = Hit::where('id', $id)
            ->where('status', '<>', 'draft');

        if (!$hit) {
            return $this->notice('404', 'Отклик не найден!');
        }

        $hit->update(['status' => 'draft']);

        return $this->notice('200', 'Успешно!');
    }
}