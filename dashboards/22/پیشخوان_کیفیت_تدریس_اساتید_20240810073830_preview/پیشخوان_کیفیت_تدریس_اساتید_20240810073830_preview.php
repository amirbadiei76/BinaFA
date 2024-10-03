<?php

session_start();

if (!isset($_SESSION["loggedin"]) || !$_SESSION["loggedin"]) {
    header('Location: ./');
}
else {
    if ($_SERVER['REQUEST_URI'] === '/preview.php') {
        header('Location: projects.php');
    }
}

$username = $_SESSION["username"];

include_once 'preview_files/StudentPreview.php';
$student = new StudentPreview();
include_once 'preview_files/TeacherPreview.php';
$teacher = new TeacherPreview();
include_once 'preview_files/CoursePreview.php';
$course = new CoursePreview();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>پیش نمایش</title>
    <link rel="stylesheet" href="../../../main_files/Styles/styles.css">
    <link rel="stylesheet" href="../../../assets/previewStyle.css">
    <link rel="shortcut icon" type="image/x-icon" href="../../../assets/moodle_icon_page.png" />
</head>
<body>
<div class="preview_top_header">
    <button type="button" class="moodle_menu_image_container">
        <img alt="منو" src="../../../assets/moodle_menu.svg">
    </button>
    <label >سامانه مودل</label>
    <div class="empty_view"></div>
    <img alt="bell" class="bell_img" width="15" height="17" src="../../../assets/bell.png">
    <img alt="chat" class="chat_img" style="margin-left: 20px; margin-right: 20px" width="16" height="14" src="../../../assets/moodle_chat.png">
    <div class="top_username_profile_container" >
        <label class="profile_username"><?php echo $username ?></label>
        <img alt="top_profile" width="38" height="38" src="../../../assets/profile2.png">
        <img class="profile_drop" alt="profile_drop" src="../../../assets/moodle_profile_drop.svg">
    </div>

</div>
<div class="preview_main_content">
    <div class="preview_left_content">
        <div id="side_left_item" class="side_left_item">
            <img width="19" height="15" class="side_left_item_image" src="../../../assets/moodle_dashboard_logo-4.png">
            <label class="side_left_item_label">میز کار</label>
        </div>
        <div id="side_left_item" class="side_left_item">
            <img width="18" height="16" class="side_left_item_image" src="../../../assets/moodle_home.png">
            <label class="side_left_item_label">صفحه اصلی سایت</label>
        </div>
        <div id="side_left_item" class="side_left_item">
            <img class="side_left_item_image" src="../../../assets/moodle_calendar.svg">
            <label class="side_left_item_label">تقویم</label>
        </div>
        <div id="side_left_item" class="side_left_item">
            <img class="side_left_item_image" src="../../../assets/moodle_file.svg">
            <label class="side_left_item_label">فایل های شخصی</label>
        </div>
        <div id="side_left_item" class="side_left_item">
            <img width="18" height="18" class="side_left_item_image" src="../../../assets/moodle_brush_content.png">
            <label class="side_left_item_label">بانک محتوا</label>
        </div>
        <div id="side_left_item" class="side_left_item">
            <img style="margin-left: 11px" width="28" height="20" class="side_left_item_image" src="../../../assets/moodle_chart6.png">
            <label class="side_left_item_label">پیشخوان تحلیل عملکرد مدرسان</label>
        </div>

        <div style="margin-top: 8px" id="side_left_item" class="side_left_item">
            <img width="18" height="18" class="side_left_item_image" src="../../../assets/moodle_admin_tools.png">
            <label class="side_left_item_label">مدیریت سایت</label>
        </div>
    </div>

    <div class="preview_right_main_container">
        <div class="preview_right_content">
            <div class="preview_right_top_content">
                <div class="preview_top_content_column">
                    <div class="preview_top_content_row">
                        <img style="cursor: pointer" alt="profile2" width="100" height="100" src="../../../assets/profile2.png">
                        <label class="preview_title_name">پیشخوان تحلیل عملکرد مدرسان</label>
                    </div>
                </div>
                <label ><label class="preview_title_nav">میز کار</label>      /      <label class="preview_title_nav"> پیشخوان تحلیل عملکرد مدرسان </label></label>
            </div>
            <div class="preview_right_bottom_content">
                <?php
                    echo $student->student_quiz_time('user','table');
echo $student->student_main_info('user');
echo $student->student_all_grades('user','table');
echo $student->student_grades_to_top_grade('user','table');
echo $student->student_grades_to_avg_other('user','table');
echo $student->student_active_students('user','table');
echo $student->student_login_count('user','table');
echo $teacher->teacher_uploaded_content('user','pie','daily');
echo $teacher->teacher_activities('user','table',null);
echo $teacher->teacher_times_pent('user','total','daily');
echo $teacher->teacher_average_times_pent('user','total','daily');
echo $teacher->teacher_time_response('user','table',null);
echo $teacher->teacher_main_info('user');
echo $course->course_student_avg_attempts_to_pass('user','table',null);
echo $course->course_student_passed_percentage_first_attempt('user','table',null);
echo $course->course_student_participants('user');
echo $course->course_student_activity_to_view_percentage('user','table',null);
echo $course->course_student_activity_percentage('user','table',null);
echo $course->course_view_count('user','total','daily');
echo $course->course_student_view_without_activity_rate('user','table',null);
echo $course->course_student_view_rate('user','table',null);

                ?>
            </div>
        </div>
        <div class="preview_right_footer">
            <div style="margin-bottom: 15px">
                <img style="margin-left: 10px; margin-right: 8px" alt="info" width="15" height="15" src="../../../assets/info_icon.png">
                <label class="preview_bottom_info_label">اسناد مودل برای این صفحه</label>
            </div>
            <label style="text-decoration-line: none; cursor: default" class="preview_bottom_info_label">شما در قالب <label class="preview_bottom_info_label"><?php echo $username ?></label> وارد سایت شده‌اید <label class="preview_bottom_info_label">(خروج از سایت)</label></label>

            <label style="margin-top: 8px" class="preview_bottom_info_label">خانه</label>
            <label style="margin-top: 8px" class="preview_bottom_info_label">خلاصه حفظ داده ها</label>
        </div>
    </div>

</div>

<div class="scroll_top" onclick="window.scrollTo(0, 0)"><img alt="scroll_top" src="../../../assets/scroll_top2.svg"></div>

</body>
</html>


<script src="../../../assets/preview.js"></script>
<script src="../../../vendor/ejdamm/chart.js-php/js/Chart.min.js"></script>
<script src="../../../vendor/ejdamm/chart.js-php/js/driver.js"></script>

<script>
    (function() {
        loadChartJsPhp();
    })();
</script>