
<div class="well">
<strong>Welcome to DIHM Information System</strong> <span class="pull-right">by Mehedi Hasan 	</span>
</div>
<script>
        function HomeView_ctrl($scope, $http, $routeParams){
              $scope.chartObject = {};

    $scope.onions = [
        {v: "Onions"},
        {v: 3},
    ];

    $scope.chartObject.data = {"cols": [
        {id: "t", label: "Topping", type: "string"},
        // {id: "w", label: "Fucking", type: "string"},

        {id: "s", label: "Slices", type: "number"}
    ], "rows": [
        {c: [
            {v: "Mushrooms"},
            {v: 3},
        ]},
        {c: $scope.onions},
        {c: [
            {v: "Olives"},
            {v:18}
        ]},
        {c: [
            {v: "Zucchini"},
            {v: 1},
        ]},
        {c: [
            {v: "Pepperoni"},
            {v: 2},
        ]}
    ]};


    // $routeParams.chartType == BarChart or PieChart or ColumnChart...
    $scope.chartObject.type = "ColumnChart";
    $scope.chartObject.options = {
        'title': 'How Much Pizza I Ate Last Night'
    }
      }
</script>
<div class="row">
      <div class="container" ng-controller="HomeView_ctrl">
      <h1>WElcome to hell</h1>
<div google-chart chart="chartObject" style="height:600px; width:100%;"></div>

      </div>
