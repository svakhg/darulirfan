
<script>
    function VoucherCtrl($scope, $http) {
        var url = document.URL;
        $scope.voucher_id = url.substring(url.lastIndexOf('/') + 1);
        $http.get(baseurl + "voucher_ctrl/get_voucher/?id=" + $scope.voucher_id)
        .success(function (response)
        {
            if (response.status == 'success') {
                $scope.datas = response.data;
            } else {
                toastr.error(response.msg);
            }

        });

        $scope.get_voucher_name = function (voucher_id) {
            arr = data.voucher_type;
            for (var idx = 0, length = arr.length; idx < length; idx++) {
                if (voucher_id === arr[idx].id) {
                    return arr[idx].name;
                }
            }
        }
    }
</script>
<div class="row">
    <div class="container" ng-controller="VoucherCtrl">
        <div class="well">
            <div class="row">
                <h5 class="col-md-4">
                 <strong>Voucher ID: </strong> {{voucher_id}}
             </h5>
             <h5 class="col-md-4">
                 <strong>Voucher Type: </strong> {{get_voucher_name(datas[0].voucher_type)}}
             </h5>
             <h5 class="col-md-4">
                 <strong>Entry Date: </strong> {{datas[0].date}}
             </h5>
         </div>
     </div>
     <table class="table table-hover table-bordered">
        <thead>
            <tr>
                   <!--  <th>Date</th>
                   <th>Voucher Type</th> -->
                   <th>Ledger Name</th>
                   <th>Description</th>
                   <th>Debit</th>
                   <th>Credit</th>
               </tr>
           </thead>
           <tbody>

            <tr ng-repeat="data in datas">
                   <!--  <td>{{data.date}}</td>
                   <td>{{data.voucher_type}}</td> -->
                   <td><a href="#/ledger_report/view/{{data.ledger_id}}">{{data.ledger_name}}</a></td>
                   <td>{{data.description}}</td>
                   <td>{{data.debit}}</td>
                   <td>{{data.credit}}</td>
               </tr>
               <tr>
                   <td colspan="2"><strong>Total</strong></td>
                   <td></td>
                   <td></td>
               </tr>

           </tbody>
       </table>
   </div>
</div>
