var all_data = $.ajax({url: baseurl + 'global_data/all', dataType: 'json', async: false})
        .success(function (result) {
            console.log(result);
            // return result;
        })
        .error(function () {
            alert("error");
        });

// Institution Data
function getInstitution(institution_id) {
    data = all_data['responseJSON'].voucher_type;
    for (var idx = 0, length = data.length; idx < length; idx++) {
        if (parseInt(data[idx].value) === parseInt(institution_id)) {
            return data[idx].text;
        }
    }
}

function InstitutionDropDownEditor(container, options) {
    $('<input data-bind="value:' + options.field + '"/>')
            .appendTo(container)
            .kendoDropDownList({
                autoBind: false,
                optionLabel: "-Select-",
                dataTextField: "id",
                dataValueField: "name",
                dataSource: all_data['responseJSON'].voucher_type
            });
}