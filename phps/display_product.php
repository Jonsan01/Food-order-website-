    <?php
    function display_product($name, $old, $new, $img, $id, $dis)
    {
        echo
        '<div class="col-md-3 col-sm-6 my-3 my-md-0" style="padding-bottom:30px;">
                <form action="" method="post">
                    <div class="card shadow" style="height: 500px; border-radius:20px">
                        <div>
                            <img src="./image/carts/' . $img . '" alt="image1" class="img-fluid card-img-top" style="height:170px;border-top-left-radius: 20px;border-top-right-radius: 20px;">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">' . $name . '</h5>
                            <h6>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </h6>
                            <p class="cardtext">
                                ' . $dis . '
                            </p>
                            <h5>
                                <small><s class="text-secondary prize">₹' . $old . '</s></small>
                                <span class="price prize">₹' . $new . '</span>
                            </h5>
                            <h5>
                                <input type="hidden" name="p_id" value="' . $id . '">
                                <input type="hidden" name="name" value="' . $name . '">
                                <button type="submit" class="btn btn-warning my-3" name="add">Add To Cart <i class="fas fa-shopping-cart"></i></button>
                            </h5>
                        </div>
                    </div>
                </form>
            </div>
        ';
    }
    function cartElement($img, $name, $prize, $old, $pid, $qun)
    {
        echo '
                        <div class="rounded mb-2">
                            <div class="row bg-light border" style="border-radius:6px">
                                <div class="col-md-3">
                                    <img src="./image/carts/' . $img . '" alt="img1" class="img-fluid" style="height: 100%;">
                                </div>
                                <div class="col-md-6">
                                    <h5 class="pt-2 main_name">' . $name . '</h5>
                                    <small><s class="text-secondary">₹' . $old . '</s></small>
                                    <span class="price">₹' . $prize . '<input type="hidden" name="iprize" class="iprize" value="' . $prize . '"></span>
                                    <h5>Total : <span class="itotal"></span> ₹</h5>
                                    <form action="cart.php?action=remove&id=' . $pid . '" class="cart-items" style="padding:2% 0" method="post">
                                    <input type="hidden" name="p_name" value="' . $name . '">
                                    <button type="submit" class="btn btn-danger" name="remove">Remove From Cart</button>
                                    </form>
                                </div>
                                <div class="col-md-3 py-5">
                                    <form action="cart.php" method="post">
                                    <input type="hidden" name="pid" value="' . $pid . '">
                                    <input type="hidden" name="change_quntity">    
                                    <input type="number" min="1" max="10" name="quntity" onchange="this.form.submit()" value="' . $qun . '" class="form-control iquntity w-50 text-center d-inline">
                                    </form>
                                </div>
                            </div>
                        </div>';
    }
    ?>