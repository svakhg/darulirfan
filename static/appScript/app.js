angular.module('project', ['ui.bootstrap', 'ngGrid', 'jQuery-ui', 'kendo.directives']).
        config(function ($routeProvider) {
            $routeProvider.
                    when('/', {templateUrl: BASE_URL + 'home_ctrl'}).
                    when('/acc-group', {templateUrl: BASE_URL + 'acc-group_ctrl'}).
                    when('/acc-group-type', {templateUrl: BASE_URL + 'acc-group-type_ctrl'}).
                    when('/acc-ledger', {templateUrl: BASE_URL + 'acc-ledger_ctrl'}).
                    when('/acc_group', {templateUrl: BASE_URL + 'acc_group_ctrl'}).
                    when('/acc_group_type', {templateUrl: BASE_URL + 'acc_group_type_ctrl'}).
                    when('/acc_ledger', {templateUrl: BASE_URL + 'acc_ledger_ctrl'}).
                    when('/class', {templateUrl: BASE_URL + 'class_ctrl'}).
                    when('/department', {templateUrl: BASE_URL + 'department_ctrl'}).
                    when('/designation', {templateUrl: BASE_URL + 'designation_ctrl'}).
                    when('/employee', {templateUrl: BASE_URL + 'employee_ctrl'}).
                    when('/Fees', {templateUrl: BASE_URL + 'Fees_ctrl'}).
                    when('/fee_category', {templateUrl: BASE_URL + 'fee_category_ctrl'}).
                    when('/Navigations', {templateUrl: BASE_URL + 'Navigations_ctrl'}).
                    when('/NavigViewRight', {templateUrl: BASE_URL + 'NavigViewRight_ctrl'}).
                    when('/payment_type', {templateUrl: BASE_URL + 'payment_type_ctrl'}).
                    when('/Roles', {templateUrl: BASE_URL + 'Roles_ctrl'}).
                    when('/status', {templateUrl: BASE_URL + 'status_ctrl'}).
                    when('/std_fees', {templateUrl: BASE_URL + 'std_fees_ctrl'}).
                    when('/student', {templateUrl: BASE_URL + 'student_ctrl'}).
                    when('/transaction', {templateUrl: BASE_URL + 'transaction_ctrl'}).
                    when('/Users', {templateUrl: BASE_URL + 'Users_ctrl'}).
                    when('/std_report', {templateUrl: BASE_URL + 'std_report_ctrl'}).
                    when('/std_report_kendo', {templateUrl: BASE_URL + 'std_report_kendo_ctrl'}).
                    when('/voucher', {templateUrl: BASE_URL + 'voucher_ctrl'}).
                    when('/std_report/single/:page', {
                        templateUrl: function ($routeParams) {
                            return BASE_URL + 'std_report_ctrl/single/' + $routeParams.page + '';
                        }
                    }).
                    when('/std_report/pay_fees/:page', {
                        templateUrl: function ($routeParams) {
                            return BASE_URL + 'std_report_ctrl/pay_fees/' + $routeParams.page + '';
                        }
                    }).
                    when('/kendo', {templateUrl: BASE_URL + 'kendo_ctrl/ins'}).
                    when('/Cash_Payment/:page', {
                        templateUrl: function ($routeParams) {
                            return BASE_URL + 'cash_payment_ctrl/' + $routeParams.page + '';
                        }
                    }).
                     when('/Report/:page', {
                        templateUrl: function ($routeParams) {
                            return BASE_URL + 'report/' + $routeParams.page + '';
                        }
                    }).
                    when('/Cash_Payment', {templateUrl: BASE_URL + 'cash_payment_ctrl/payment'}).
                    when('/:page/:child*', {
                        templateUrl: function ($routeParams) {
                            return '' + $routeParams.page + '/' + $routeParams.child + '';
                        }
                    }).
                    otherwise({redirectTo: '/'});
        });
        