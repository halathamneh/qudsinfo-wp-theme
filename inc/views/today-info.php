<?php
/**
 * Created by PhpStorm.
 * User: haitham
 * Date: 08/11/17
 * Time: 06:14 م
 */
?>
<div class="fb-container" style="direction: rtl;padding: 2rem;">
    <header><h1><?= $title ?></h1></header>

    <section>

<form method="post" action="<?= admin_url('admin-post.php') ?>" class="select-info-form"
      data-ajaxurl="<?= admin_url('admin-ajax.php') ?>">
    <div class="row">

        <div class="col-sm-8">

            <input type="hidden" name="action" value="set_today_info">
            <div class="infos-header">
                <span>اختر المعلومة:</span>
                <div class="fb-posts-search mr-auto">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="ابحث عن معلومة..."
                               aria-label="ابحث عن معلومة...">
                        <span class="input-group-btn">
                            <button class="btn btn-secondary" type="button">بحث</button>
                        </span>
                    </div>
                </div>
            </div>
            <table class="table table-striped">
                <tbody>
                <?php foreach ($info_array as $info) : ?>
                    <tr>
                        <th scope="row">
                            <input type="radio" name="selected_info" value="<?= $info->id ?>"
                                   data-title="<?= $info->title ?>" data-content="<?= $info->content ?>"
                                   data-image="<?= $info->image ?>">
                        </th>
                        <td>
                            <div class="row flex-nowrap">
                                <?php if ( $info->image ) : ?>
                                    <div>
                                        <img src="<?= $info->thumb ?>" height="50" width="50" alt="">
                                    </div>
                                <?php endif; ?>
                                <div class="px-3">
                                    <b><?= $info->title ?></b>
                                    <p><?= $info->content ?></p>
                                </div>


                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <a href="javascript:" class="infos-load-more" data-offset="15">
                عرض المزيد
            </a>


        </div>
        <div class="col-sm-4">
            <div class="info-review">
                <div class="notification-preview">
                    <b class="noti-title"></b>
                    <p class="noti-content"></p>
                    <div style="" class="noti-image"></div>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary">حفظ</button>
                </div>
            </div>

        </div>

    </div>
</form>
    </section>
</div>