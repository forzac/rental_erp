<?php

namespace app\components\behaviors;

use yii\base\Behavior;
use yii\db\ActiveRecord;
use yii\helpers\FileHelper;
use yii\imagine\Image;
use yii\web\UploadedFile;

class ImageHelperBehavior extends Behavior
{
    public $imageAttributes;
    public $imageTmpAttributes;
    public $folderName = 'temp';
    public $uploadsPath;
    public $uploadsUrl;
    public $thumbPath;
    public $thumbUrl;

    public function init()
    {
        if (empty($this->uploadsPath)) $this->uploadsPath = \Yii::getAlias('@app/web/uploads');
        if (empty($this->uploadsUrl)) $this->uploadsUrl = \Yii::getAlias('@web/uploads');
        if (empty($this->thumbPath)) $this->thumbPath = \Yii::getAlias('@app/web/uploads/thumbs');
        if (empty($this->thumbUrl)) $this->thumbUrl = \Yii::getAlias('@web/uploads/thumbs');
    }

    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_INSERT => 'beforeSave',
            ActiveRecord::EVENT_BEFORE_UPDATE => 'beforeSave',
            ActiveRecord::EVENT_BEFORE_VALIDATE => 'beforeValidate',
            ActiveRecord::EVENT_BEFORE_DELETE => 'beforeDelete',
        ];
    }

    public function beforeValidate($event)
    {
        if (is_scalar($this->imageTmpAttributes)) {
            $this->owner->{$this->imageTmpAttributes} = UploadedFile::getInstance($event->sender, $this->imageTmpAttributes);
        } else {
            foreach ($this->imageTmpAttributes as $attr) {
                $this->owner->$attr = UploadedFile::getInstance($event->sender, $attr);
            }
        }
    }

    public function beforeSave($event)
    {
        if (is_scalar($this->imageAttributes)) {
            if (!is_null($this->owner->{$this->imageTmpAttributes})) {
                $imgName = $this->owner->{$this->imageTmpAttributes}->baseName . '_' . time() . '.' . $this->owner->{$this->imageTmpAttributes}->extension;
                $path = $this->getUploadsPath() . DIRECTORY_SEPARATOR . $imgName;
                $this->owner->{$this->imageTmpAttributes}->saveAs($path);
                $this->owner->{$this->imageAttributes} = $imgName;
            }
        } else {
            foreach ($this->imageTmpAttributes as $key => $attr) {
                if (!is_null($this->owner->$attr)) {
                    $imgName = $this->owner->$attr->baseName . '_' . time() . '.' . $this->owner->$attr->extension;
                    $path = $this->getUploadsPath() . DIRECTORY_SEPARATOR . $imgName;
                    $this->owner->$attr->saveAs($path);
                    $this->owner->{$this->imageAttributes[$key]} = $imgName;
                }
            }
        }
    }

    public function beforeDelete($event)
    {
        $helper = [];
        if (is_scalar($this->imageAttributes)) {
            $helper[] = $this->owner->{$this->imageAttributes};
        } else {
            foreach ($this->imageAttributes as $attr)
                $helper[] = $this->owner->$attr;
        }

        $files = FileHelper::findFiles($this->uploadsPath, ['only' => $helper]);

        foreach($files as $file) {
            unlink($file);
        }
    }

    protected function getUploadsPath()
    {
        $path = $this->uploadsPath . DIRECTORY_SEPARATOR . $this->folderName;
        if (!is_dir($path)) {
            FileHelper::createDirectory($path, 0777);
        }

        return $path;
    }

    protected function createThumbnail($attribute, $width, $height)
    {
        $imgName = $this->owner->$attribute;
        $path = $this->getUploadsPath(). DIRECTORY_SEPARATOR . $imgName;

        Image::thumbnail($path, $width, $height)->save($this->getThumbPath($width, $height) . DIRECTORY_SEPARATOR . $imgName, ['quality' => 90]);
    }

    protected function getThumbPath($width, $height)
    {
        $path = $this->thumbPath . DIRECTORY_SEPARATOR . $this->folderName . DIRECTORY_SEPARATOR . $width . 'x' . $height;

        if (!is_dir($path)) {
            FileHelper::createDirectory($path, 0777);
        }

        return $path;
    }

    public function getThumbImage($width, $height, $attribute = 'image')
    {
        $ds = DIRECTORY_SEPARATOR;
        $path = $this->getThumbPath($width, $height) . $ds . $this->owner->$attribute;

        if (!file_exists($path)) {
            $this->createThumbnail($attribute, $width, $height);
        }

        return $this->thumbUrl . $ds . $this->folderName . $ds . $width . 'x' . $height . $ds . $this->owner->$attribute;
    }

    public function getUploadedImage($attribute = 'image')
    {
        return $this->uploadsUrl . DIRECTORY_SEPARATOR . $this->folderName . DIRECTORY_SEPARATOR . $this->owner->$attribute;
    }
}