var all_data = $.ajax({url: baseurl + 'global_data/all', dataType: 'json', async: false})
        .success(function (result) {
            return result;
        })
        .error(function () {
            console.log('error');
        });

function FeesCategoryDropDownEditor(container, options){
      $('<input data-bind="value:' + options.field +'"/>')
      .appendTo(container)
      .kendoDropDownList({
        autoBind: false,
        dataTextField: "name",
        dataValueField: "subjectGroup",
        dataSource: subjectgroup
      });
    }
