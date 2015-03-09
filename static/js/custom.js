var all_data = $.ajax({url: baseurl + 'global_data/all', dataType: 'json', async: false})
        .success(function (result) {
            return result;
        })
        .error(function () {
            console.log('error');
        });

var data = JSON.parse(all_data['responseText']); 

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

function fee_type_editor(container, options){
	 $('<input data-bind="value:' + options.field +'"/>')
      .appendTo(container)
      .kendoDropDownList({
        autoBind: false,
        optionLabel: "---Select---",
        dataTextField: "fee_type_name",
        dataValueField: "fee_type_id",
        dataSource: data.fee_type
      });
}

function get_fee_type(fee_type_id) {
	console.log(fee_type_id);
    data = data.fee_type;
    for (var idx = 0, length = data.length; idx < length; idx++) {
        if (parseInt(data[idx].fee_type_id) === parseInt(fee_type_id)) {
            return data[idx].fee_type_name;
        }
    }
}

function fees_category_editor(container, options){
	 $('<input data-bind="value:' + options.field +'"/>')
      .appendTo(container)
      .kendoDropDownList({
        autoBind: true,
        optionLabel: "---Select---",
        dataTextField: "text",
        dataValueField: "value",
        dataSource: data.fees_category
      });
}

function get_fees_category(id) {
    data = data.fees_category;
    for (var idx = 0, length = data.length; idx < length; idx++) {
        if (parseInt(data[idx].value) === parseInt(id)) {
            return data[idx].text;
        }
    }
}
