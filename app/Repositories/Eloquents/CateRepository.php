<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\RepositoryInterface;
use App\Repositories\Eloquents\BaseRepository;

class CateRepository extends BaseRepository
{
	public function model()
	{
		return 'App\Cate';
	}
}