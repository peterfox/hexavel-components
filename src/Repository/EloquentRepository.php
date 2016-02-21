<?php
/**
 * @author      Peter Fox <peter.fox@peterfox.me>
 * @copyright   Peter Fox 2015
 *
 * @package     hexavel-components
 */

namespace Hexavel\Repository;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class EloquentRepository
{
    /**
     * @var Model
     */
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @return string
     */
    public abstract function getModel();

    /**
     * @return Builder
     */
    public function getQueryBuilder()
    {
        return $this->model->query();
    }

    /**
     * @return string
     */
    public function getPrimaryKeyName()
    {
        return $this->model->getKeyName();
    }

    /**
     * @param int|string|array $id
     * @return Model
     */
    public function findById($id)
    {
        $this->getQueryBuilder()->where($this->getPrimaryKeyName(), null, $id)->first();
    }

    /**
     * @return Model
     */
    public function create()
    {
        return new ${$this->model}();
    }

    /**
     * @param Model $model
     */
    public function save($model)
    {
        $this->performAction($model, function($model) {
            $model->save();
        });
    }

    /**
     * @param Model $model
     */
    public function remove($model)
    {
        $this->performAction($model, function($model) {
           $model->delete();
        });
    }

    /**
     * @param Model $model
     * @param callable $modelFunction
     * @return bool
     */
    protected function performAction($model, callable $modelFunction)
    {
        if (is_a($model, $this->getModel())) {
            call_user_func($modelFunction, $model);
            return true;
        }
        return false;
    }

    /**
     * @param Model|Collection|null $result
     * @return array
     */
    protected function returnArray($result)
    {
        if ($result instanceof Collection) {
            return $result->toArray();
        }
        return $result;
    }
}