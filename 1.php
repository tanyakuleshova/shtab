<?php
require_once  '../../config.php';
require_once '../../classes/db.class.php';
require_once '../../classes/news.class.php';
$title = "Add news";
$msg = '';
$db = new DB($db_host, $db_user, $db_password, $db_name);
$form = new News($_POST);

if ($_POST) {
        if ($form->validate()) {
            $target_dir = "../../images/news_images";
            $file_name = $_FILES['uploadfile']['name'];
            $file_tmp = $_FILES['uploadfile']['tmp_name'];
            $final_name = $target_dir . '/' . $file_name;
            // проверяем расширение файла
            $allowed_extension = array('jpg', 'png', 'jpeg', 'gif');
            $extension = pathinfo($final_name, PATHINFO_EXTENSION);
            $success = 0;
            var_dump($final_name);
            if (in_array($extension, $allowed_extension) && move_uploaded_file($file_tmp, $final_name)) {
                $success = 1;
            } else {
                echo "{$_FILES['uploadfile']['error']}";
            }
            if ($success) {
                $img = $file_name;
            }

            $news_title = $db->check($db->escape($form->getNewsTitle()));
            $short_content = $db->check($db->escape($form->getShortContent()));
            $content = $db->check($db->escape($form->getContent()));
            $date = $db->check($db->escape($form->getDate()));
            $source = $db->check($db->escape($form->getSource()));

            $res = $db->query("INSERT INTO news set h1 = '{$news_title}', short_content = '{$short_content}',
                        content = '{$content}', img = '{$img}'");

        } else {
            $msg = 'Please fill the fields';
        }
}



require_once '../../lib/forms_header.php'; ?>
<body class="bg-dark">
<div class="d-flex align-content-center flex-wrap">
    <div class="container">
        <div class="add-news-content">
            <div class="add-news-form">
                <form method="post" enctype = "multipart/form-data">
                    <span style="color: red;"><?=$msg;?></span>
                    <div class="form-group">
                        <label>News name</label>
                        <input type="text" name="news_title" value="" placeholder="Title..." class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Announcement</label>
                        <input type="text" name="short_content" placeholder="Short content..." class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <textarea name="content" placeholder="Full content..." class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Post Date</label>
                        <div class="controls input-append date form_date" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                            <input name="date" size="16" type="text" placeholder="Post day..." class="form-control post-date">
                            <span class="add-on"><i class="icon-remove"></i></span>
                            <span class="add-on"><i class="icon-th"></i></span>
                        </div>
                        <input type="hidden" id="dtp_input2" /><br/>
                    </div>

                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="uploadfile" class="form-control-file shtab-img">
                    </div>

                    <div class="form-group">
                        <label>Source</label>
                        <input type="text" name="source" placeholder="Authors..." class="form-control">
                    </div>

                    <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Publish</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
<?php require_once '../../lib/forms_footer.php';
