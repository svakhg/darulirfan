var all_data = $.ajax({url: baseurl + 'global_data/all', dataType: 'json', async: false})
        .success(function (result) {
            return result;
        })
        .error(function () {
            console.log('error');
        });
