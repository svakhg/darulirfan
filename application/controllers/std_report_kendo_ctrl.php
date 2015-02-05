<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once('./application/libraries/base_ctrl.php');

class Std_report_kendo_ctrl extends base_ctrl {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            header('Content-Type: application/json');

            $request = json_decode(file_get_contents('php://input'));

            $result = new DataSourceResult('');

            $type = $_GET['type'];

            $columns = array('id', 'std_name', 'father_name', 'mother_name', 'class');

            switch ($type) {
                case 'create':
                    $result = $result->create('student', $columns, $request->models, 'id');
                    break;
                case 'read':
                    $result = $result->read('student', $columns, $request);
                    break;
                case 'update':
                    $result = $result->update('student', $columns, $request->models, 'id');
                    break;
                case 'destroy':
                    $result = $result->destroy('student', $request->models, 'id');
                    break;
            }

            echo json_encode($result, JSON_NUMERIC_CHECK);

            exit;
        }

        $transport = new \Kendo\Data\DataSourceTransport();

        $create = new \Kendo\Data\DataSourceTransportCreate();

        $create->url('index.php/std_report_kendo_ctrl/index?type=create')
                ->contentType('application/json')
                ->type('POST');

        $read = new \Kendo\Data\DataSourceTransportRead();

        $read->url('index.php/std_report_kendo_ctrl/index?type=read')
                ->contentType('application/json')
                ->type('POST');

        $update = new \Kendo\Data\DataSourceTransportUpdate();

        $update->url('index.php/std_report_kendo_ctrl/index?type=update')
                ->contentType('application/json')
                ->type('POST');

        $destroy = new \Kendo\Data\DataSourceTransportDestroy();

        $destroy->url('index.php/std_report_kendo_ctrl/index?type=destroy')
                ->contentType('application/json')
                ->type('POST');

        $transport->create($create)
                ->read($read)
                ->update($update)
                ->destroy($destroy)
                ->parameterMap('function(data) {
              return kendo.stringify(data);
          }');

        $model = new \Kendo\Data\DataSourceSchemaModel();

        $productIDField = new \Kendo\Data\DataSourceSchemaModelField('id');
        $productIDField->type('number')
                ->editable(false)
                ->nullable(true);

        $productNameField = new \Kendo\Data\DataSourceSchemaModelField('std_name');
        $productNameField->type('string')
                ->validation(array('required' => true));

        $unitPriceField = new \Kendo\Data\DataSourceSchemaModelField('father_name');
        $unitPriceField->type('string');

        $unitsInStockField = new \Kendo\Data\DataSourceSchemaModelField('mother_name');
        $unitsInStockField->type('string');

        $discontinuedField = new \Kendo\Data\DataSourceSchemaModelField('class');
        $discontinuedField->type('number');

        $model->id('id')
                ->addField($productIDField)
                ->addField($productNameField)
                ->addField($unitPriceField)
                ->addField($unitsInStockField)
                ->addField($discontinuedField);

        $schema = new \Kendo\Data\DataSourceSchema();
        $schema->data('data')
                ->errors('errors')
                ->model($model)
                ->total('total');

        $dataSource = new \Kendo\Data\DataSource();

        $dataSource->transport($transport)
                ->batch(true)
                ->pageSize(20)
                ->schema($schema);

        $grid = new \Kendo\UI\Grid('grid');

        $productName = new \Kendo\UI\GridColumn();
        $productName->field('std_name')
                ->title('Student Name');

        $unitPrice = new \Kendo\UI\GridColumn();
        $unitPrice->field('father_name')
                ->width(100)
                ->title('Father Name');

        $unitsInStock = new \Kendo\UI\GridColumn();
        $unitsInStock->field('mother_name')
                ->width(100)
                ->title('Mother Name');

        $discontinued = new \Kendo\UI\GridColumn();
        $discontinued->field('class')
                ->width(100);

        $command = new \Kendo\UI\GridColumn();
        $command->addCommandItem('edit')
                ->addCommandItem('destroy')
                ->title('&nbsp;')
                ->width(172);

        $grid->addColumn($productName, $unitPrice, $unitsInStock, $discontinued, $command)
                ->dataSource($dataSource)
                ->addToolbarItem(new \Kendo\UI\GridToolbarItem('create'))
                ->height(430)
                ->editable('popup')
                ->pageable(true);

        echo $grid->render();
    }

}
