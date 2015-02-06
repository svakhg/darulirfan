 <script src="static/appScript/VoucherCtrl.js"></script>
 <div class="k-block" ng-controller="VoucherCtrl">
        <h1 class="header">Sign Up Form</h1>
        <div class="k-block k-info-colored">
          <strong>Note: </strong>Please fill out all of the fields in this form.
        </div>
                                <form kendo-validator="validator">
                                            <header>Basic Information</header>
                                            <div class="col-md-8">								
                                        <input id="products" style="width: 400px" />
                                              <h4>Remote data</h4>
                                              <select id="gender" data-role="dropdownlist">
                                                <option value="1">Female</option>
                                                <option value="2">Male</option>
                                              </select>
                                                    <section class="col-md-10">
                                                        <input type="text" id="fullname" ng-model="student.fullname" name="fullname" class="k-textbox" placeholder="Full name" required validationMessage="Enter {0}" style="width: 250px;"/>
                                                    </section>
                                                    <section class="col-md-10">
                                                        <input type="email" id="email" name="Email" ng-model="student.email" class="k-textbox" placeholder="e.g. myname@example.net"  required data-email-msg="Email format is not valid" style="width: 250px;" />
                                                    </section>
                                                    <section class="col-md-10">
                                                        <input type="tel" id="phone" name="phone" ng-model="student.phone" class="k-textbox" placeholder="Enter a Eleven digit number"
                                                               validationMessage="Enter Phone No" style="width: 250px;"/>
                                                    </section>
                                                    <section class="col-md-10">
                                                        <input type="text" id="zipcode" name="zipcode" ng-model="student.zipcode" class="k-textbox" placeholder="Zip Code" required validationMessage="Enter {0}" style="width: 250px;"/>
                                                    </section>
                                                    <section class="col-md-10">
                                                        <textarea id="address" name="address" ng-model="student.address" class="k-textbox" style="height: 40px; width: 250px; " placeholder="Address" required validationMessage="Enter {0}"/> </textarea>
                                                    </section>

                                        </div>
                                            <input type="submit" class="btn btn-primary" value="Save & Proceed" />
                                </form>
</div>
                          
<!-- SCRIPTS ON PAGE EVENT -->
<script type="text/javascript">
                $("#fullname").keypress(function (event) {
                    var ew = event.which;
                    if (ew == 32)
                        //means spaces
                        return true;
                    if (48 <= ew && ew <= 57)
                        //means numeric
                        return false;
                    if (65 <= ew && ew <= 90)
                        //means you must write in block Character 
                        return true;
                    if (97 <= ew && ew <= 122)
                        //means character only (small latter)
                        return true;
                    //default all regular expression blocked
                    return false;
                });

                $("#phone").kendoMaskedTextBox({
                    mask: "000-00-000000"
                });

                $("#mobile").kendoMaskedTextBox({
                    mask: "000-00-000000"
                });
                
                $("#products").kendoDropDownList({
                        dataTextField: "ProductName",
                        dataValueField: "ProductID",
                        dataSource: {
                            transport: {
                                read: {
                                    dataType: "json",
                                    url: "http://demos.telerik.com/kendo-ui/service/Products",
                                }
                            }
                        }
                    });

                    // create DropDownList from input HTML element
                    $("#color").kendoDropDownList({
                        dataTextField: "text",
                        dataValueField: "value",
                        dataSource: all_data.voucher_type,
                        index: 0
                        // change: onChange
                    });
</script>
