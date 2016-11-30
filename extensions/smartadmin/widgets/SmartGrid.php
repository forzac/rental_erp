<?php

namespace app\extensions\smartadmin\widgets;

use yii\helpers\Html;

/**
 * Class Menu
 * @package app\modules\admin\widgets
 */
class SmartGrid extends \yii\grid\GridView
{

    public $layout = "{items}\n{pager}";

    // List table_id: dt_basic, datatable_fixed_column, datatable_col_reorder, datatable_tabletools
    public $table_id ="dt_basic";
    public $table_footer = 'true';
    public $table_header = 'true';
    public $table_search = 'true';
    public $table_show_in_page = 'false';
    public $table_custom_header = '';

    public function init()
    {
        parent::init();
        ob_start();
    }


    public function renderItems()
    {
        $caption = $this->renderHeader();
        $widgetDiv = $this->renderWidgetDiv();

        $content = array_filter([
            $caption,
            $widgetDiv
        ]);

        return implode("\n", $content);
    }

    public function renderWidgetContent(){
        $this->table_custom_header = trim(ob_get_clean());
        $columnGroup = $this->renderColumnGroup();
        $tableHeader = $this->showHeader ? $this->renderTableHeader() : false;
        $tableBody = $this->renderTableBody();
        $tableFooter = $this->showFooter ? $this->renderTableFooter() : false;
        $content = array_filter([
            $columnGroup,
            $tableHeader,
            $tableBody,
            $tableFooter
            ]);

        $script = <<< JS

        var responsiveHelper_dt_basic = undefined;
        var responsiveHelper_datatable_fixed_column = undefined;
        var responsiveHelper_datatable_col_reorder = undefined;
        var responsiveHelper_datatable_tabletools = undefined;

        var breakpointDefinition = {
            tablet : 1024,
            phone : 480
        };
        var table_footer_$this->table_id = $this->table_footer;
        var table_header_$this->table_id = $this->table_header;
        var table_search_$this->table_id = $this->table_search;
        var table_show_in_page_$this->table_id = $this->table_show_in_page;
        var table_custom_header_$this->table_id = '$this->table_custom_header';


        $('#$this->table_id').dataTable({
            "sDom": (table_header_$this->table_id == true ? "<'dt-toolbar'<'col-xs-12 col-sm-6'"+(table_search_$this->table_id == true ? 'f' : '')+"><'col-sm-6 col-xs-12 hidden-xs'<'toolbar'>"+(table_show_in_page_$this->table_id == true ? 'l' : '')+">r>" : "") +
            "t"+
            (table_footer_$this->table_id == true ? "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>" : "")  ,
            "autoWidth" : true,
            "oLanguage": {
                "sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'
            },
            "preDrawCallback" : function() {
                // Initialize the responsive datatables helper once.
                if (!responsiveHelper_dt_basic) {
                    responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#$this->table_id'), breakpointDefinition);
                }
            },
            "rowCallback" : function(nRow) {
                responsiveHelper_dt_basic.createExpandIcon(nRow);
            },
            "drawCallback" : function(oSettings) {
                responsiveHelper_dt_basic.respond();
            }
        });

        $("div.toolbar").html('<div class="text-right">'+table_custom_header_$this->table_id+'</div>');


JS;

        $this->getView()->registerJs($script, \yii\web\View::POS_READY);

        return Html::tag('div', Html::tag('table', implode("\n", $content),['id'=> $this->table_id,'width' => '100%','class'=>'table table-striped table-bordered table-hover'] ),['class'=>'widget-body no-padding']);
    }

    public function renderWidgetDiv(){
        $editBox = $this->renderEditBox();
        $widgetContent = $this->renderWidgetContent();
        $render = array_filter([
            $editBox,
            $widgetContent]);
        return Html::tag('div', implode("\n", $render));
    }

    public function renderHeader()
    {
        return "<header>
                    <span class='widget-icon'> <i class='fa fa-table'></i> </span>
                    <h2>{$this->caption}</h2>				
				</header>
				";

    }

    public function renderEditBox(){
        return '<!-- widget edit box -->
									<div class="jarviswidget-editbox">
										<!-- This area used as dropdown edit box -->
				
									</div>
									<!-- end widget edit box -->';
    }



}