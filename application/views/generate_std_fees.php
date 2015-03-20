<script>
        function GenerateStdFeesCtrl($scope, $http){


                $scope.process = function (generate) {
                        std_type = Number (generate.std_type); 
                        cnfr = confirm("Are you sure you want to Genarate " + get_fees_name(generate.fees) + " fees for all " + get_std_type_name(std_type) + " Students");
                        if (cnfr === true) {
                                $http.post(baseurl + "generate_std_fees/process", generate)
                                .success(function (data) {
                                        console.log(data);
                                        if (data.status == 'success') {
                                                toastr.success(data.msg);
                                        } else {
                                                toastr.error(data.msg);
                                        }
                                });
                        }
                };

                $scope.std_fees_option = {
                    dataSource: data.fees_category,
                    optionLabel: "--Select Fees--",
                    dataTextField: "text",
                    dataValueField: "value"
            };    

            $scope.std_type_option = {
                    dataSource: data.std_type,
                    optionLabel: "--Select Student Type--",
                    dataTextField: "text",
                    dataValueField: "value"
            };  
    };
</script>
<div class="row">
  <div class="container" ng-controller="GenerateStdFeesCtrl">
        <div class="well well-lg">
                <form kendo-validator="validator" ng-submit="process(generate)">
                 <legend>Generate Student Fees</legend>
                 <p>
                        <label>Select Student Type: </label>
                        <select id="std_type" name="Student Type" required="required" ng-model="generate.std_type"
                        kendo-drop-down-list style="width: 250px"
                        k-options="std_type_option"></select>


                        <label>Select Fees: </label>
                        <select id="fees" name="Fees Type" required="required" ng-model="generate.fees"
                        kendo-drop-down-list style="width: 250px"
                        k-options="std_fees_option"></select>

                        <input class="btn btn-success hidden-print" type="submit" value="Generate Fees">
                </p>
        </form>
</div>

</div>
</div>