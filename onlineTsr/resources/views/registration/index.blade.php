<html>
@include('layout.header')
<body>
@include('Initial.login_nav')
<div class="col-md-3">

</div>
<div class="col-md-6">

    <h3 id="appointmentHeader">Please Fill up to Register</h3>
    <form action="/registration" method="post" enctype="multipart/form-data"> <!-- action="#" Means data of the form is submitted on the same page -->
    {{csrf_field()}} <!-- for laravel form security check-->
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input type="text" class="form-control" name="name" placeholder="Full Name *" value="{{old('name')}}"  required>
        </div>
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
            <input type="text" class="form-control" id="phoneNo" name="phoneNo" placeholder="Phone No. *" value="{{old('phoneNo')}}"  required>
        </div>
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
            <input type="text" class="form-control" name="address" placeholder="Your Home Address" value="{{old('name')}}"  >
        </div>
        <hr>
        <div class="form-group" id="mechView">
            <label>Register as *:</label>
            <select name="registrationType" class="form-control" id="registrationType" onchange="registerType()" value="{{old('registrationType')}}">
                <option disabled selected value>---Select an option---</option>
                <option value="student">Student</option>
                <option value="teacher">Teacher</option>
            </select>
        </div>
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
            <input type="text" class="form-control" name="idNo" placeholder="Your Student/Teacher Id no *"  value="{{old('idNo')}}" required>
        </div>
        <hr>
        <div>
            <label>N.B. Use university email address to register as Teacher</label>
        </div>
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
            <input type="email" class="form-control" name="email" placeholder="Email *" value="{{old('email')}}" >
        </div>

        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-option-horizontal"></i></span>
            <input type="password" class="form-control" name="password" id="password" placeholder="Your Password *" required>
        </div>
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-option-horizontal"></i></span>
            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Repeat Password *" required>
        </div>

        <div class="input-group">
            <button type="submit" class="btn btn-success"   name="regButton">Submit</button> <!-- To submit the info's as a new registration -->

        </div>
        <div class="input-group">
            @include('layout.form_error')
        </div>
        <script>
            //alert("sc");
            function registerType() {
                alert("selected");
            }
        </script>
    </form>


</div>
<div class="col-md-3">


</div>
</body>
</html>