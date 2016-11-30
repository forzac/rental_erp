<?php

namespace app\components\behaviors;

use romi45\seoContent\components\SeoBehavior as Behavior;

class SeoBehavior extends Behavior
{

    /**
     * Saving seo content
     */
    public function saveSeoContent()
    {
        $model = $this->getSeoContentModel();
        $model->title = $this->owner->{$this->titleAttribute};
        $model->keywords = $this->owner->{$this->keywordsAttribute};
        $model->description = $this->owner->{$this->descriptionAttribute};
        $model->model_id = $this->owner->getPrimaryKey();
        $model->model_name = $this->owner->className();
        $model->save();
    }

    /**
     * Deleting seo content
     *
     * @throws \Exception
     */
    public function deleteSeoContent()
    {
        $model = \romi45\seoContent\models\SeoContent::findOne([
            'model_id' => $this->owner->getPrimaryKey(),
            'model_name' => $this->owner->className()
        ]);

        //var_dump($model); exit;

        if($model)
            $model->delete();
    }
}