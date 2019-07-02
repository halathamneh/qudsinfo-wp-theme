<?php
/**
 *    The template for displaying the search form in sidebar.
 *
 * @package WordPress
 * @subpackage illdy
 */
?>
<?php
$placeholder = esc_attr_x('بحث في المعلومات والصور والأخبار ...', 'placeholder', 'illdy');
$ia = "active";
$pa = "";
?>
<form role="search" method="get" class="search-form info-s-form" action="<?php echo home_url('/'); ?>">
    <div class="search-form-box">
        <input type="search" id="s" placeholder="<?php echo $placeholder; ?>"
               value="<?php echo esc_attr(get_search_query()); ?>" name="s"
               title="<?php echo esc_attr_x('بحث عن:', 'label', 'illdy'); ?>"/>
        <?php if(isset($_GET["filter"]) && !empty($_GET["filter"])) $selected = $_GET['filter']; ?>
        <select name="filter" id="searchFilter" class="selectpicker">
            <option value="-1" disabled <?= !isset($selected) ? "selected" : "" ?>><?php esc_html_e("ابحث في:") ?></option>
            <option value="all" <?= isset($selected) && $selected == "all" ? "selected" : "" ?>><?php esc_html_e("الكل") ?></option>
            <option value="post" <?= isset($selected) && $selected == "post" ? "selected" : "" ?>><?php esc_html_e("معلومات") ?></option>
            <option value="news" <?= isset($selected) && $selected == "news" ? "selected" : "" ?>><?php esc_html_e("أخبار") ?></option>
            <option value="pics" <?= isset($selected) && $selected == "pics" ? "selected" : "" ?>><?php esc_html_e("صور") ?></option>
            <option value="book" <?= isset($selected) && $selected == "book" ? "selected" : "" ?>><?php esc_html_e("كتب") ?></option>
            <option value="videos" <?= isset($selected) && $selected == "videos" ? "selected" : "" ?>><?php esc_html_e("فيديو") ?></option>
            <option value="audio" <?= isset($selected) && $selected == "audio" ? "selected" : "" ?>><?php esc_html_e("صوتي") ?></option>
        </select>
        <button type="submit" id="searchsubmit"><i class="fa fa-search" title="<?= esc_attr_x("بحث", "button") ?>"></i></button>
        <?php /* <input type="hidden" name="post_type" value="<?php echo isset($_GET['post_type']) ? get_query_var('post_type') : 'post' ?>" id="type" />*/ ?>
    </div><!--/.search-form-box-->
</form><!--/.search-form-->