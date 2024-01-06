<?php 
echo '<div class="container">
    <div class="row">
        <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
            ค้นหาตามราคา
            <br>
            <form action="" method="get" class="form-horizontal">
                <div class="input-group mb-3">
                    <span class="input-group-text">ราคาต่ำสุด</span>
                    <input type="number" class="form-control" name="ps" require>
                    <span class="input-group-text">ราคาสูงสุด</span>
                    <input type="number" class="form-control" name="pe" require>
                    <button type="submit" name="act" value="p" class="btn btn-success" required>ค้นหา</button>
                </div>

            </form>
        </div>
    </div>
</div>';
?>