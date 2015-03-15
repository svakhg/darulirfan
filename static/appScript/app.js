angular.module('project', ['googlechart', 'ui.bootstrap', 'ngGrid', 'kendo.directives', 'ngProgress']).

        config(function ($routeProvider, progressbarProvider) {
            //for ngprogrees
            // Default color is firebrick
            progressbarProvider.setColor('firebrick');
            // Default height is 2px
            progressbarProvider.setHeight('2px');
            //route provider
            $routeProvider.
                    when('/', {templateUrl: BASE_URL + 'home_ctrl'}).
                    
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
                    // when('/student', {templateUrl: BASE_URL + 'student_ctrl'}).
                    when('/transaction', {templateUrl: BASE_URL + 'transaction_ctrl'}).
                    when('/Users', {templateUrl: BASE_URL + 'Users_ctrl'}).
                    when('/student', {templateUrl: BASE_URL + 'std_report_ctrl'}).
                    when('/std_report_kendo', {templateUrl: BASE_URL + 'std_report_kendo_ctrl'}).
                    when('/voucher', {templateUrl: BASE_URL + 'voucher_ctrl'}).
                    when('/voucher/list', {templateUrl: BASE_URL + 'voucher_ctrl/list_view'}).
                    when('/ledger_book', {templateUrl: BASE_URL + 'ledger_book_ctrl'}).
                    when('/ledger_report', {templateUrl: BASE_URL + 'ledger_report_ctrl'}).
                     when('/ledger_report/view/:page', {
                        templateUrl: function ($routeParams) {
                            return BASE_URL + 'ledger_report_ctrl/view/' + $routeParams.page + '';
                        }
                    }).
                     when('/acc_group/list', {templateUrl: BASE_URL + 'acc_group_ctrl/list'}).
                      when('/acc_group/view', {templateUrl: BASE_URL + 'acc_group_ctrl/view'}).
                     when('/acc_group/view/:page', {
                        templateUrl: function ($routeParams) {
                            return BASE_URL + 'acc_group_ctrl/view/' + $routeParams.page + '';
                        }
                    }).
                    when('/student/add', {templateUrl: BASE_URL + 'std_report_ctrl/add'}).
                    when('/voucher/view/:page', {
                        templateUrl: function ($routeParams) {
                            return BASE_URL + 'voucher_ctrl/view/' + $routeParams.page + '';
                        }
                    }).
                    when('/student/details/:page', {
                        templateUrl: function ($routeParams) {
                            return BASE_URL + 'std_report_ctrl/details/' + $routeParams.page + '';
                        }
                    }).
                    when('/student/edit/:page', {
                        templateUrl: function ($routeParams) {
                            return BASE_URL + 'std_report_ctrl/edit/' + $routeParams.page + '';
                        }
                    }).
                     when('/student/pay_fees/:page', {
                        templateUrl: function ($routeParams) {
                            return BASE_URL + 'std_report_ctrl/pay_fees/' + $routeParams.page + '';
                        }
                    }).

                    when('/employee/add', {templateUrl: BASE_URL + 'employee_ctrl/add'}).
                    
                    when('/employee/details/:page', {
                        templateUrl: function ($routeParams) {
                            return BASE_URL + 'employee_ctrl/details/' + $routeParams.page + '';
                        }
                    }).
                    when('/employee/edit/:page', {
                        templateUrl: function ($routeParams) {
                            return BASE_URL + 'employee_ctrl/edit/' + $routeParams.page + '';
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
                      when('/employee/:page', {
                        templateUrl: function ($routeParams) {
                            return BASE_URL + 'employee_ctrl/' + $routeParams.page + '';
                        }
                    }).
                    when('/Cash_Payment', {templateUrl: BASE_URL + 'cash_payment_ctrl/payment'}).
                    when('/:page/:child*', {
                        templateUrl: function ($routeParams) {
                            return '' + $routeParams.page + '/' + $routeParams.child + '';
                        }
                    }).
                    otherwise({redirectTo: '/'});
        })
        .filter('sumOfValue', function () {
            return function (data, key) {
                if (typeof (data) === 'undefined' && typeof (key) === 'undefined') {
                    return 0;
                }
                var sum = 0;
                for (var i = 0; i < data.length; i++) {
                    sum = sum + data[i][key];
                }
                return sum;
            }
        })
        .filter('total', function () {
                    return function (input, property) {
                        var i = input instanceof Array ? input.length : 0;
                        if (typeof property === 'undefined' || i === 0) {
                            return i;
                        } else if (isNaN(input[0][property])) {
                            throw 'filter total can count only numeric values';
                        } else {
                            var total = 0;
                            while (i--)
                                total += input[i][property];
                            return total;
                        }
                    };
                })
        // .controller('StudentDetailsCtrl', function ($scope, $route, $http, $filter, $location) {
               
        //     })
        ;
                