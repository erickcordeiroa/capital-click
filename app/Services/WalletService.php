<?php

namespace App\Services;

use App\Repositories\WalletRepository;

class WalletService
{
    public function __construct(
        protected WalletRepository $repository
    ) {
    }

    public function getPaginate(int $totalPerPage = 15, int $page = 1, string $filter = '')
    {
        return $this->repository->getPaginate(
            totalPerPage: $totalPerPage,
            page: $page,
            filter: $filter
        );
    }
}
