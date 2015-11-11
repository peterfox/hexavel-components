<?php
/**
 * @author      Peter Fox <peter.fox@peterfox.me>
 * @copyright   Peter Fox 2015
 *
 * @package     hexavel-components
 */

namespace Hexavel\Repository;

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
     * @param $id
     * @return Model
     */
    public function findById($id)
    {
        return $this->model->find($id);
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

    private function performAction($model, callable $modelFunction)
    {
        if (is_a($model, $this->getModel())) {
            call_user_func($modelFunction, $model);
            return true;
        }
    }
}