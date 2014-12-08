<?php
require_once '../lib/DataSourceResult.php';
require_once '../lib/Kendo/Autoload.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    header('Content-Type: application/json');

    $request = json_decode(file_get_contents('php://input'));

    $result = new DataSourceResult('mysql:host=localhost;dbname=ci_angularjs;charset=utf8', 'root', '');

    echo json_encode($result->read('persons', array('first_name', 'last_name', 'email', 'birthday'), $request));

    exit;
}

require_once '../include/header.php';

$transport = new \Kendo\Data\DataSourceTransport();

$read = new \Kendo\Data\DataSourceTransportRead();

$read->url('index.php')
     ->contentType('application/json')
     ->type('POST');

$transport ->read($read)
          ->parameterMap('function(data) {
              return kendo.stringify(data);
          }');

$model = new \Kendo\Data\DataSourceSchemaModel();

$contactNameField = new \Kendo\Data\DataSourceSchemaModelField('first_name');
$contactNameField->type('string');

$contactTitleField = new \Kendo\Data\DataSourceSchemaModelField('last_name');
$contactTitleField->type('string');

$companyNameField = new \Kendo\Data\DataSourceSchemaModelField('email');
$companyNameField->type('string');

$countryField = new \Kendo\Data\DataSourceSchemaModelField('birthday');
$countryField->type('string');

$model->addField($contactNameField)
      ->addField($contactTitleField)
      ->addField($companyNameField)
      ->addField($countryField);

$schema = new \Kendo\Data\DataSourceSchema();
$schema->data('data')
       ->errors('errors')
       ->groups('groups')
       ->model($model)
       ->total('total');

$dataSource = new \Kendo\Data\DataSource();

$dataSource->transport($transport)
           ->pageSize(10)
           ->serverPaging(true)
           ->serverSorting(true)
           ->serverGrouping(true)
           ->schema($schema);

$grid = new \Kendo\UI\Grid('grid');

$contactName = new \Kendo\UI\GridColumn();
$contactName->field('first_name')
            ->title('First Name')
            ->width(140);
            
$contactTitle = new \Kendo\UI\GridColumn();
$contactTitle->field('last_name')
            ->title('Last Name')
            ->width(190);            

$companyName = new \Kendo\UI\GridColumn();
$companyName->field('email')
            ->title('email');
            
$Country = new \Kendo\UI\GridColumn();
$Country->field('birthday')
        ->width(110);            

$pageable = new Kendo\UI\GridPageable();
$pageable->refresh(true)
      ->pageSizes(true)
      ->buttonCount(5);
        
$grid->addColumn($contactName, $contactTitle, $companyName, $Country)
     ->dataSource($dataSource)     
     ->sortable(true)
     ->groupable(true)
     ->pageable($pageable)
     ->attr('style', 'height:380px');
      
?>

<div id="clientsDb">
<?php
echo $grid->render();
?>
</div>  

<style scoped>
    #clientsDb {
        width: 952px;
        height: 396px;
        margin: 20px auto 0;
        padding: 51px 4px 0 4px;
        background: url('../content/web/grid/clientsDb.png') no-repeat 0 0;
    }
</style>
