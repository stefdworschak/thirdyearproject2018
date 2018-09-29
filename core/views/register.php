<div class="container">
  <div class="row">
    <div class="col-md-4 col-lg-4">
      &nbsp;
    </div>
    <div class="col-md-4 col-lg-4">
      <br />
        <h1>Register</h1>
        <!-- Source: https://getbootstrap.com/docs/4.0/components/forms/ -->
        <form method="POST" action="core/functions/register_script.php" enctype="multipart/form-data">
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" name="emailaddress" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
          </div>
          <div class="form-group">
            <label for="FirstName">First Name</label>
            <input type="text" class="form-control" name="first_name" id="FirstName" aria-describedby="emailHelp" placeholder="First Name">
          </div>
          <div class="form-group">
            <label for="LastName">Last Name</label>
            <input type="text" class="form-control" name="last_name" id="LastName" aria-describedby="emailHelp" placeholder="Last Name">
          </div>
          <div class="form-group">
            <label for="UserType">User Type</label>
            <br />
            <select id="UserType" name="user_type">
                <option>Please Select</option>
                <option>---</option>
                <option value="voter">Voter</option>
                <option value="candidate">Candidate</option>
                <option value="admin">Admin</option>
            </select>
          </div>
          <div class="form-group">
            <label for="Password">Password</label>
            <input type="password" name="password" class="form-control" id="Password" placeholder="Password">
          </div>
          <div class="form-group">
            <label for="Password1">Repeat Password</label>
            <input type="password" name="password1" class="form-control" id="Password1" placeholder="Repeat Password">
          </div>
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
          </div>
          <button type="submit" class="btn btn-primary">Register</button>&nbsp;
          <button id="loginBtn" class="btn btn-danger">Sign In</button>
        </form>

      </div>
      <div class="col-md-4 col-lg-4">
            &nbsp;
      </div>
  </div>
</div>