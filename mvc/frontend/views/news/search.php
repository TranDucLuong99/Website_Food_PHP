<?php
require_once 'helpers/Helper.php';
?>
<section class="breadcrumb-section set-bg" data-setbg="assets/images/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Tin Tức</h2>
                    <div class="breadcrumb__option">
                        <a href="index.php?controller=home&action=index">Trang chủ</a>
                        <span>Tin tức</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-5">
                <div class="blog__sidebar">
                    <div class="blog__sidebar__search">
                        <form action="#" method="get">
                            <input type="hidden" name="controller" value="new"/>
                            <input type="hidden" name="action" value="searchData"/>
                            <input type="text" name="title" id="title"
                                   value="<?php echo isset($_GET['title']) ? $_GET['title'] : '' ?>" placeholder="Bạn cần gì"/>
                            <button type="submit" name="search"><i class="fa fa-search" aria-hidden="true"></i></span></button>
                        </form>
                    </div>
                    <div class="blog__sidebar__item">
                        <h4>Danh Mục</h4>
                        <ul>
                            <li><a href="#">Tất cả</a></li>
                            <li><a href="#">Làm đẹp</a></li>
                            <li><a href="#">Thực phẩm dinh dưỡng</a></li>
                            <li><a href="#">Phong các sống</a></li>
                            <li><a href="#">Du lịch</a></li>
                        </ul>
                    </div>
                    <div class="blog__sidebar__item">
                        <h4>Tin Tức Gần Đây</h4>
                        <?php if (!empty($news)): ?>
                            <?php foreach ($news AS $new):
                                $today = date('Y-m-d');
                                $to_time = strtotime($today);
                                $from_time = strtotime($new['created_at']);
                                $round = round(abs($to_time-$from_time)/86400,2);
                                ?>
                                <?php if (($round >=14) || $new['category_id']==14) :  continue; ?>

                            <?php else: ?>
                                <?php
                                $url_detail = "index.php?controller=blog&action=detail&id=" . $new['id'];
                                ?>
                                <div class="blog__sidebar__recent">
                                    <a href="<?php echo $url_detail ?>" class="blog__sidebar__recent__item">
                                        <div class="blog__sidebar__recent__item__pic">
                                            <img src="../backend/assets/uploads/<?php echo $new['avatar'] ?>" alt="" style="max-width: 50px">
                                        </div>
                                        <div class="blog__sidebar__recent__item__text">
                                            <h6><?php echo $new['title'] ?><br /><?php echo $new['summary'] ?></h6>
                                            <span><?php echo $new['created_at'] ?></span>
                                        </div>
                                    </a>
                                </div>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-7">
                <div class="row">
                    <?php if (!empty($newss)): ?>
                        <?php foreach ($newss AS $new): ?>
                            <?php if ($new['category_id'] == 14) : continue; ?>
                            <?php else: ?>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="blog__item">
                                        <div class="blog__item__pic">
                                            <img src="../backend/assets/uploads/<?php echo $new['avatar'] ?>" alt="">
                                        </div>
                                        <div class="blog__item__text">
                                            <ul>
                                                <li><i class="fa fa-calendar-o"></i><?php echo $new['created_at'] ?></li>
                                                <li><i class="fa fa-comment-o"></i></li>
                                            </ul>
                                            <h5><a href="#"><?php echo $new['title'] ?></a></h5>
                                            <p> <?php echo $new['summary'] ?></p>
                                            <?php
                                            $url_detail = "index.php?controller=blog&action=detail&id=" .$new['id'];
                                            ?>
                                            <a href="<?php echo $url_detail ?>" class="blog__btn" name="submit">Xem thêm <i class="fa fa-search-plus" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <!--            <div class="product__pagination">-->
        <!--                --><?php //echo $pages; ?>
        <!--            </div>-->
    </div>
    </div>
</section>
