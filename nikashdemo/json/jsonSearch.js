//return an array of objects according to key, value, or key and value matching
    function getObjects(obj, key, val) {
        var objects = [];
        for (var i in obj) {
            if (!obj.hasOwnProperty(i))
                continue;
            if (typeof obj[i] == 'object') {
                objects = objects.concat(getObjects(obj[i], key, val));
            } else
            //if key matches and value matches or if key matches and value is not passed (eliminating the case where key matches but passed value does not)
            if (i == key && obj[i] == val || i == key && val == '') { //
                objects.push(obj);
            } else if (obj[i] == val && key == '') {
                //only add if the object is not already in the array
                if (objects.lastIndexOf(obj) == -1) {
                    objects.push(obj);
                }
            }
        }
        return objects;
    }

//return an array of values that match on a certain key
    function getValues(obj, key) {
        var objects = [];
        for (var i in obj) {
            if (!obj.hasOwnProperty(i))
                continue;
            if (typeof obj[i] == 'object') {
                objects = objects.concat(getValues(obj[i], key));
            } else if (i == key) {
                objects.push(obj[i]);
            }
        }
        return objects;
    }

//return an array of keys that match on a certain value
    function getKeys(obj, val) {
        var objects = [];
        for (var i in obj) {
            if (!obj.hasOwnProperty(i))
                continue;
            if (typeof obj[i] == 'object') {
                objects = objects.concat(getKeys(obj[i], val));
            } else if (obj[i] == val) {
                objects.push(i);
            }
        }
        return objects;
    }


    var json = '{\n\
        "u1" : {"property1":"1","Age":3, "weight":"4kg"},\n\
        "u2" : {"property1":"2","Age":900, "weight":"30kg"}}';

    var js = JSON.parse(json);

//example of grabbing objects that match some key and value in JSON
    console.log(getObjects(js, 'property1', '1'));
    var a = getObjects(js, 'property1', '');
    alert(a[0]['weight']);
    alert(a[1]['weight']);
//returns 1 object where a key names ID has the value SGML

//example of grabbing objects that match some key in JSON
//    console.log(getObjects(js, 'ID', ''));
//returns 2 objects since keys with name ID are found in 2 objects

//example of grabbing obejcts that match some value in JSON
//    console.log(getObjects(js, '', 'SGML'));
//returns 2 object since 2 obects have keys with the value SGML

//example of grabbing objects that match some key in JSON
//    console.log(getObjects(js, 'ID', ''));
//returns 2 objects since keys with name ID are found in 2 objects

//example of grabbing values from any key passed in JSON
//    console.log(getValues(js, 'ID'));
//returns array ["SGML", "44"] 

//example of grabbing keys by searching via values in JSON
//    console.log(getKeys(js, 'SGML'));
//returns array ["ID", "SortAs", "Acronym", "str"] 