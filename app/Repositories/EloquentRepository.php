<?php

namespace App\Repositories;

abstract class EloquentRepository
{
    /**
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $_model;

    /**
     * EloquentRepository constructor.
     */
    public function __construct()
    {
        $this->setModel();
    }

    /**
     * get model
     * @return string
     */
    abstract public function getModel();

    /**
     * Set model
     */
    public function setModel()
    {
        $this->_model = app()->make(
            $this->getModel()
        );
    }

    /**
     * Get All
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll($eagerAttributes = [])
    {
        if (count($eagerAttributes) > 0) {
            return $this->_model->with($eagerAttributes)->get();
        }
        return $this->_model->all();
    }

    /**
     * Get one
     * @param $id
     * @return mixed
     */
    public function find($id, $eagerAttributes = [])
    {
        if (count($eagerAttributes) > 0) {
            return $this->_model->with($eagerAttributes)->find($id);
        }
        $result = $this->_model->find($id);

        return $result;
    }

    /**
     * Create
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        return $this->_model->create($attributes);
    }

    /**
     * Update
     * @param $id
     * @param array $attributes
     * @return bool|mixed
     */
    public function update($id, array $attributes)
    {
        $result = $this->find($id);
        if ($result) {
            $result->update($attributes);
            return $result;
        }

        return false;
    }

    /**
     * Delete
     *
     * @param $id
     * @return bool
     */
    public function delete($id)
    {
        $result = $this->find($id);
        if ($result) {
            $result->delete();

            return true;
        }

        return false;
    }

    public function where($attributes)
    {
        return $this->_model::where($attributes);
    }

    public function pluck($fieldName)
    {
        return $this->_model::pluck($fieldName);
    }

    public function whereIn($conditions)
    {
        return $this->_model::whereIn(...$conditions);
    }

    public function updateOrCreate(array $attributes, array $values = [])
    {
        return $this->_model::updateOrCreate($attributes, $values);
    }

    public function firstOrNew(array $attributes, array $values = [])
    {
        return $this->_model::firstOrNew($attributes, $values);
    }
}
