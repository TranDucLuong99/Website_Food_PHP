<?php
require_once 'helpers/Helper.php';
?>
<section class="blog-details-hero set-bg" data-setbg="assets/images/blog/details/details-hero.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="blog__details__hero__text">
                    <h2>Những Thứ Không Thể Bỏ Lỡ Trong Thực Đơn Của Bạn</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="blog-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-5 order-md-1 order-2">
                <div class="blog__sidebar">
                    <div class="blog__sidebar__search">
                        <form action="#">
                            <input type="text" placeholder="Tìm Kiếm">
                            <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </form>
                    </div>
                    <div class="blog__sidebar__item">
                        <h4>Danh Mục</h4>
                        <ul>
                            <li><a href="#">Tất cả</a></li>
                            <li><a href="#">Làm đẹp</a></li>
                            <li><a href="#">Thực phẩm dinh dưỡng</a></li>
                            <li><a href="#">Phong cách cuộc sống</a></li>
                            <li><a href="#">Du lịch</a></li>
                        </ul>
                    </div>
                    <div class="blog__sidebar__item">
                        <h4>Tin gần đây</h4>
                        <?php if (!empty($blogs)): ?>
                            <?php foreach ($blogs AS $blog):
                                $today = date('Y-m-d');
                                $to_time = strtotime($today);
                                $from_time = strtotime($blog['created_at']);
                                $round = round(abs($to_time-$from_time)/86400,2);
                                ?>
                            <?php if ($round >=45 || $blog['category_id']==14) :  continue; ?>
                            <?php else: ?>
                        <div class="blog__sidebar__recent">
                            <?php
                            $url_detail = "index.php?controller=blog&action=detail&id=" . $blog['id'];
                            ?>
                            <a href="<?php echo $url_detail ?>" class="blog__sidebar__recent__item">
                                <div class="blog__sidebar__recent__item__pic">
                                    <img src="../backend/assets/uploads/<?php echo $blog['avatar'] ?>" alt=""style="max-width: 50px">
                                </div>
                                <div class="blog__sidebar__recent__item__text">
                                    <h6><?php echo $blog['title'] ?><br /><?php echo $blog['summary'] ?></h6>
                                    <span><?php echo $blog['created_at'] ?></span>
                                </div>
                            </a>
                        </div>
                        <?php endif; ?>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-7 order-md-1 order-1">
                <div class="blog__details__text">
                    <img src="../backend/assets/uploads/<?php echo $new['avatar'] ?>" alt="">
                    <h3><?php echo $new['title']?></h3>
                    <p style="font-weight: bold"><?php echo $new['summary']?></p>
                    <p><?php echo $new['content']?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="related-blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title related-blog-title">
                    <h2>Có Thể Bạn Sẽ Thích</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php if (!empty($blogs)):
                $slug = Helper::getSlug($new['title']);
                $blog_link = "chia-se/$slug/" . $blog['id'] . ".html";
                ?>
            <?php foreach ($blogs AS $blog):
            ?>
            <?php if ($blog['category_id'] !=14) :
                continue;
                ?>
            <?php else: ?>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic">
                        <img src="../backend/assets/uploads/<?php echo $blog['avatar'] ?>" alt="">
                    </div>
                    <div class="blog__item__text">
                        <ul>
                            <li><i class="fa fa-calendar-o"></i><?php echo $blog['title']?></li>
<!--                            <li><i class="fa fa-comment-o"></i> 5</li>-->
                        </ul>
                        <?php
                        $url_detail = "index.php?controller=blog&action=detail&id=" . $blog['id'];
                        ?>
                        <h5><a href="<?php echo $url_detail ?>"><?php echo $blog['title']?></a></h5>
<!--                        <h5><a href="--><?php //echo $blog_link ?><!--">--><?php //echo $blog['title']?><!--</a></h5>-->
                        <p><?php echo $blog['summary']?></p>
                    </div>
                </div>
            </div>
                <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>
