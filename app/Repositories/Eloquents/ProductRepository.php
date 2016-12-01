<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\RepositoryInterface;
use App\Repositories\Eloquents\BaseRepository;

class ProductRepository extends BaseRepository
{
	public function model()
	{
		return 'App\Product';
	}
}