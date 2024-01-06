<?php
$t_id = $_GET['t_id'];
$query = "
SELECT * FROM tbl_prd WHERE ref_t_id = $t_id ORDER BY p_id DESC";
$result = mysqli_query($condb, $query) or die("Error: " . mysqli_error($condb));
// echo $query;
?>

<!-- start prd -->

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-12">
            <h3> :: List Product ::</h3>
        </div>
        <?php while ($row = mysqli_fetch_array($result)) { ?>
            <div class="col-md-4 mt-3 col-lg-3">
                <div class="thumbnail">
                    <img src="pimg/<?php echo $row['p_img']; ?>" width="100%" height="225" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <div class="caption">
                        <h6 x="50%" y="50%" fill="#eceeef" dy=".3em"><?php echo $row['p_name']; ?>
                            ราคา <?php echo $row['p_price']; ?> บาท
                        </h6>
                        <p class="card-text"><?php echo $row['p_intro']; ?></p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group" role="button" style="width: 100%;">
                                <a href="detail.php?p_id=<?php echo $row['p_id']; ?>" class="btn btn-sm btn-outline-info">รายละเอียด</a>

                            </div>
                            <!-- <small class="text-body-secondary">9 mins</small> -->
                        </div>
                    </div>
                </div>


            </div>

        <?php } ?>
    </div>
</div>

<!-- end prd -->


<!-- <div class="album py-5 bg-body-tertiary">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <div class="col">
          <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                </div>
                <small class="text-body-secondary">9 mins</small>
              </div>
            </div>
          </div>
        </div>
            </div>
          </div>
        </div> -->