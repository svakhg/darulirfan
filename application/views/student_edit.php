
 <div class="row">
   <!-- <div class="container" ng-controller="StudentEditCtrl"> -->
    <form kendo-validator="validator" ng-submit="UpdateStudent(student, response)" class="k-content smart-form">
        <div class="row" >
            <div class="col col-md-7">
                <header>Basic Information</header>
                <div class="col-md-8">
                    <fieldset>
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
                            <textarea id="address" name="address" ng-model="student.address" class="k-textbox" style="height: 80px; width: 250px; " placeholder="Address" required validationMessage="Enter {0}"/>
                        </textarea>
                    </section>
                </fieldset>
            </div>
        </div>
    </div>
</form>
</div>