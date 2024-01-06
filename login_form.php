<div class="container">
  <div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
      <h2>Form Login</h2>
     <form action="chklogin.php" method="post" class="form-horizontal">
        <div class="form-group">
         <img class="mb-4" src="" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

    <div class="form-floating">
      <input type="text" name="m_username" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Username</label>
    </div>
    <br>
    <div class="form-floating">
      <input type="password" name="m_password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <div class="form-check text-start my-3">
      <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
      <label class="form-check-label" for="flexCheckDefault">
        Remember me
      </label>
    </div>
    <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-body-secondary">© 2017–2023</p>
          
        </div>
        
      </form>
    </div>
    <!-- <div class="col-6 col-sm col-md col-lg col-xl">
      <img src="img/b.jpg" width="100%">
    </div> -->
  </div>
</div>


<?php include('button.php')?>