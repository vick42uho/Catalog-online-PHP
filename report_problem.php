<?php 
include('header.php');
// include('menu.php');
?>
<br><br><br><br>
<div class="container">
          <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-7">
              <h3> Form แจ้งปัญหาการใช้งานเว็บไซต์ </h3>
              <form action="report_problem_db.php" method="post" class="form-horizontal">
                <div class="form-group">
                  <div class="col-sm-3 control-label">
                    ปัญหา :
                  </div>
                  <div class="col-sm-9">
                    <textarea name="p_detail" required class="form-control"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-3 control-label">
                    Email :
                  </div>
                  <div class="col-sm-9">
                    <input type="email" name="p_email" required class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-3 control-label">
                    Phone :
                  </div>
                  <div class="col-sm-9">
                    <input type="text" name="p_phone" required class="form-control">
                  </div>
                </div>
                <br>
                <div class="form-group">
                  <div class="col-sm-3">
                  </div>
                  <div class="col-sm-4">
                    <button type="submit" class="btn btn-primary">แจ้งปัญหา</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>

<?php
include('footer.php');
include('button.php');
?>