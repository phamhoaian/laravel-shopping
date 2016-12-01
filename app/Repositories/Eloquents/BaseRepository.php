<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\RepositoryInterface;
use Illuminate\Container\Container as App;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements RepositoryInterface
{
    private $app;

 	protected $model;

 	public function __construct(App $app)
    {
        $this->app = $app;
        $this->makeModel();
    }

    abstract public function model();

    public function makeModel() {
        $model = $this->app->make($this->model());
 
        if (!$model instanceof Model)
            throw new RepositoryException("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
 
        return $this->model = $model;
    }

    /**
     * Retrieve all data of repository
     */
    public function all($columns = ['*'])
    {
        return $this->model->get($columns);
    }

    /**
     * Retrieve all data of repository, paginated
     */
    public function paginate($limit = null, $columns = ['*'])
    {
        $limit = is_null($limit) ? config('repository.pagination.limit', 10) : $limit;

        return $this->model->paginate($limit, $columns);
    }

    /**   
     * Find data by id
     */
    public function find($id, $columns = ['*'])
    {
        return $this->model->findOrFail($id, $columns);
    }

    /**   
     * Find data by field
     */
    public function findByField($field, $value, $columns = ['*'])
    {
        return $this->model->where($field, $value);
    }

    /**   
     * Find data by field
     */
    public function findWhere(array $where , $columns = ['*'])
    {
        
    }

    /**   
     * Find data by field
     */
    public function findWhereIn($field, array $values, $columns = ['*'])
    {
        
    }

    /**   
     * Find data by field
     */
    public function findWhereNotIn($field, array $values, $columns = ['*'])
    {
        
    }

    /**
     * Save a new entity in repository
     */
    public function create(array $attributes)
    {   
        return $this->model->create($attributes);
    }

    /**
     * Update a entity in repository by id
     */
    public function update(array $attributes, $id)
    {
        $model = $this->model->findOrFail($id);
        $model->fill($attributes);
        $model->save();

        return $this;
    }

    /**
     * Delete a entity in repository by id
     */
    public function delete($id)
    {
        return $this->model->destroy($id);
    }
}