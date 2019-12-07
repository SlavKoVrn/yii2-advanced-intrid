<?php

namespace slavkovrn\ionslider;

use yii\helpers\StringHelper;
use yii\widgets\InputWidget;

class IonSliderWidget extends InputWidget {

    public $id = '';
    public $name = '';
    public $class = '';
    public $min = 0;
    public $max = 10;
    public $from = 2;
    public $to = 7;
    public $button = '';

    protected $path;

    public function init() {
        if($this->hasModel())
        {
            $modelName = StringHelper::basename(get_class($this->model));
            $this->id = strtolower($modelName.'_'.$this->attribute);
            $this->class = strtolower($modelName.'_'.$this->attribute);
            $this->name = $modelName.'['.$this->attribute.']';
        }
        parent::run();
    }

    public function run() {

        parent::run();

        $this->registryScript();

        return $this->render('ionslider',[
            'id' => $this->id,
            'class' => $this->class,
            'name' => $this->name,
            'path' => $this->path,
        ]);
    }

    protected function registryScript()
    {
        $path = \Yii::$app->getAssetManager()->publish(__DIR__ . '/assets/');
        $this->path = $path[1];

        $this->getView()->registerCssFile($this->path . '/css/ion.rangeSlider.min.css');
        $this->getView()->registerJsFile(
            $this->path . '/js/ion.rangeSlider.min.js',
            [
                'position' => \yii\web\View::POS_END,
                'depends'  => ['\yii\web\JqueryAsset'],
            ]
        );

        $script =<<<JS
            window.{$this->id}_min = {$this->min};
            window.{$this->id}_max = {$this->max};
            window.{$this->id}_from = {$this->from};
            window.{$this->id}_to = {$this->to};
            window.ionslider_{$this->id}_start = function(){
                $("#{$this->id}").ionRangeSlider({
                    'type':'double',
                    'skin':'big',
                    grid:true,
                    'min':window.{$this->id}_min,
                    'max':window.{$this->id}_max,
                    'from':window.{$this->id}_from,
                    'to':window.{$this->id}_to
                });
                window.slider_{$this->id} = $('#{$this->id}').data('ionRangeSlider');
                window.slider_loading = $("#ionslider-loading-{$this->id}");
                $('#{$this->button}').click(function(e){
                    window.slider_loading.show();
                    window.slider_button = $('#{$this->button}');
                    window.slider_button.hide();
                    window.{$this->id}_min = window.slider_{$this->id}.result.min;
                    window.{$this->id}_max = window.slider_{$this->id}.result.max;
                    window.{$this->id}_from = window.slider_{$this->id}.result.from;
                    window.{$this->id}_to = window.slider_{$this->id}.result.to;
                });
            };
            window.ionslider_{$this->id}_start();
            if (typeof window.slider_ids == 'undefined'){
                window.slider_ids = [];
            }
            window.slider_ids.push(window.ionslider_{$this->id}_start);
JS;
        $this->getView()->registerJs($script,\yii\web\View::POS_READY);
    }
}