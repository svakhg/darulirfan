<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once('./application/libraries/base_ctrl.php');

class Report extends base_ctrl {

    function __construct() {
        parent::__construct();
    }

    public function transaction() {
        $permission = 0;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            header('Content-Type: application/json');

            $request = json_decode(file_get_contents('php://input'));

            $result = new DataSourceResult('');

            $type = $_GET['type'];

            $columns = array('id', 'std_id', 'fees_id', 'fee_category_id', 'month', 'year', 'amount');

            switch ($type) {
                case 'create':

                    if ($permission == 0) {
                        $result = $result->create('std_fee_report', $columns, $request->models, 'id');
                        break;
                    } else {
                        echo 'No Permission to access this feature';
                        break;
                    }
                case 'read':
                    $result = $result->read('std_fee_report', $columns, $request);
                    break;
                case 'update':
                    $result = $result->update('std_fee_report', $columns, $request->models, 'id');
                    break;
                case 'destroy':
                    $result = $result->destroy('std_fee_report', $request->models, 'id');
                    break;
            }

            echo json_encode($result, JSON_NUMERIC_CHECK);

            exit;
        }

        $transport = new \Kendo\Data\DataSourceTransport();

        $create = new \Kendo\Data\DataSourceTransportCreate();

        $create->url('index.php/kendo_ctrl/ins?type=create')
                ->contentType('application/json')
                ->type('POST');

        $read = new \Kendo\Data\DataSourceTransportRead();

        $read->url('index.php/kendo_ctrl/ins?type=read')
                ->contentType('application/json')
                ->type('POST');

        $update = new \Kendo\Data\DataSourceTransportUpdate();

        $update->url('index.php/kendo_ctrl/ins?type=update')
                ->contentType('application/json')
                ->type('POST');

        $destroy = new \Kendo\Data\DataSourceTransportDestroy();

        $destroy->url('index.php/kendo_ctrl/ins?type=destroy')
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

        $IDField = new \Kendo\Data\DataSourceSchemaModelField('id');
        $IDField->type('number')
                ->editable(false)
                ->nullable(true);

        $SecondField = new \Kendo\Data\DataSourceSchemaModelField('std_id');
        $SecondField->type('string');
        //->validation(array('required' => true));

        $ThirdField = new \Kendo\Data\DataSourceSchemaModelField('fees_id');
        $ThirdField->type('string')
                ->validation(array('required' => true));


        $FourthField = new \Kendo\Data\DataSourceSchemaModelField('fee_category_id');
        $FourthField->type('string')
                ->validation(array('required' => true));

        $FifthField = new \Kendo\Data\DataSourceSchemaModelField('month');
        $FifthField->type('string')
                ->validation(array('required' => true));

        $SixthField = new \Kendo\Data\DataSourceSchemaModelField('year');
        $SixthField->type('string')
                ->validation(array('required' => true));


        $model->id('id')
                ->addField($IDField)
                ->addField($SecondField)
                ->addField($ThirdField)
                ->addField($FourthField)
                ->addField($FifthField)
                ->addField($SixthField);


        $schema = new \Kendo\Data\DataSourceSchema();
        $schema->data('data')
                ->errors('errors')
                //->groups('groups')
                ->model($model)
                ->total('total');

        $dataSource = new \Kendo\Data\DataSource();

        $dataSource->transport($transport)
                //->addFilterItem($filterItem)
                ->batch(true)
                ->pageSize(5)
                ->serverFiltering(true)
                ->serverPaging(true)
                ->serverSorting(true)
                ->serverGrouping(true)
                ->schema($schema);

        $grid = new \Kendo\UI\Grid('std_report');

        $InstitutionName = new \Kendo\UI\GridColumn();
        $InstitutionName->field('std_id')
                ->title('Student Name');

        $InstitutionAddress = new \Kendo\UI\GridColumn();
        $InstitutionAddress->field('fees_id')
                ->title('Fees');

        $InstitutionEmail = new \Kendo\UI\GridColumn();
        $InstitutionEmail->field('fee_category_id')
                ->title('Particular');


        $InstitutionMobile = new \Kendo\UI\GridColumn();
        $InstitutionMobile->field('month')
                ->title('Month.');

        $InstitutionPhoneNo = new \Kendo\UI\GridColumn();
        $InstitutionPhoneNo->field('year')
                ->title('Year');


        $command = new \Kendo\UI\GridColumn();
        $command->title('&nbsp;')
                ->width(200);

        if ($permission == 0) {
            $command->addCommandItem('edit');
        }
        if ($permission == 0) {
            $command->addCommandItem('delete');
        }

        $pageable = new Kendo\UI\GridPageable();
        $pageable->refresh(true)
                ->pageSizes(true)
                ->buttonCount(5);



        $grid->addColumn($InstitutionName, $InstitutionAddress, $InstitutionEmail, $InstitutionMobile, $InstitutionPhoneNo, $command)
                ->dataSource($dataSource)
                ->addToolbarItem(new \Kendo\UI\GridToolbarItem('create'))
                //->height(auto)
                ->reorderable(true)
                ->selectable('full')
                ->resizable(true)
                ->sortable(true)
                //->columnMenu(true)
                //->groupable(true)
                ->navigatable(true)
                ->filterable(true)
                ->editable('popup')
                ->pageable($pageable);

        echo $grid->render();
    }

}
