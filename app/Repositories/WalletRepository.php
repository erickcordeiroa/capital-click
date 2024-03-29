<?php

namespace App\Repositories;

use App\Models\Wallet;
use Illuminate\Pagination\LengthAwarePaginator;

class WalletRepository
{
    protected $entity;

    public function __construct()
    {
        $this->entity = (new Wallet());
    }

    public function getPaginate(int $totalPerPage = 15, int $page = 1, $filter = ''): LengthAwarePaginator
    {
        return $this->entity->where(function ($query) use ($filter) {
            if ($filter !== '') {
                $query->where('name', "LIKE", "%{$filter}%");
            }
        })->paginate($totalPerPage, ['*'], 'page' . $page);
    }
}
