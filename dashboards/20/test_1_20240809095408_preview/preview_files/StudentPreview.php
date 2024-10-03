<?php

require_once '../../../models/ChartJS_Bar.php';
require_once '../../../models/ChartJS_Pie.php';
require_once '../../../models/ChartJS_Line.php';
use Models\ChartJS_Bar;
use Models\ChartJS_Pie;
use Models\ChartJS_Line;

class StudentPreview {

    public function student_quiz_time ($user, $plot): string
    {
        $tempText = '';

        if ($plot === 'table'){
            if ($user === 'user') {
                $tempText .= '<div id="div_class">'.PHP_EOL.
                    "\t".'<h3 class="main_title">مدت زمان تکمیل هر آزمون توسط فراگیران در دوره های sample_teacher</h3>'.PHP_EOL. "\t".'<table class="data-table">'.PHP_EOL."\t\t".'<tr>'.PHP_EOL."\t\t".'<th>نام دوره</th>'.PHP_EOL."\t\t".'<th>نام کاربری فراگیر</th>'.PHP_EOL."\t\t".'<th>نام آزمون</th>'.PHP_EOL."\t\t".'<th>مدت زمان</th>'.PHP_EOL."\t\t".'<th>تعداد تلاش ها</th>'.PHP_EOL."\t\t".'<th>نمره</th>'.PHP_EOL."\t\t"."\t\t".'</tr>';

                $tempText .= '<tr>'.'<td>compiler_140302</td>'.'<td>emad_saeedi</td>'.'<td>Quiz 1</td>'.'<td>01:23:34</td>'.'<td>1</td>'.'<td>4.5</td>'.'</tr>';

                $tempText .= '<tr>'.'<td>compiler_140302</td>'.'<td>saeed_rashidi</td>'.'<td>Quiz 1</td>'.'<td>01:10:34</td>'.'<td>2</td>'.'<td>3.25</td>'.'</tr>';

                $tempText .= '<tr>'.'<td>compiler_140302</td>'.'<td>emad_rezaee</td>'.'<td>Quiz 1</td>'.'<td>01:17:29</td>'.'<td>1</td>'.'<td>2.75</td>'.'</tr>';

                $tempText .= '<tr>'.'<td>database_140302</td>'.'<td>ali_rahimi</td>'.'<td>Database Quiz</td>'.'<td>01:19:22</td>'.'<td>1</td>'.'<td>4.25</td>'.'</tr>';

                $tempText .= '<tr>'.'<td>database_140302</td>'.'<td>emad_rezaee</td>'.'<td>Database Quiz</td>'.'<td>01:30:07</td>'.'<td>1</td>'.'<td>1.75</td>'.'</tr>';
            }
            else {
                $tempText .= '<div id="div_class">'.PHP_EOL.
                    "\t".'<h3 class="main_title">مدت زمان تکمیل هر آزمون توسط فراگیران در تمام دوره ها</h3>'.PHP_EOL. "\t".'<table class="data-table">'.PHP_EOL."\t\t".'<tr>'.PHP_EOL."\t\t".'<th>نام دوره</th>'.PHP_EOL."\t\t".'<th>نام کاربری فراگیر</th>'.PHP_EOL."\t\t".'<th>نام آزمون</th>'.PHP_EOL."\t\t".'<th>مدت زمان</th>'.PHP_EOL."\t\t".'<th>تعداد تلاش ها</th>'.PHP_EOL."\t\t".'<th>نمره</th>'.PHP_EOL."\t\t"."\t\t".'</tr>';


                $tempText .= '<tr>'.'<td>compiler_140302</td>'.'<td>emad_saeedi</td>'.'<td>Quiz 1</td>'.'<td>01:23:35</td>'.'<td>1</td>'.'<td>4.5</td>'.'</tr>';

                $tempText .= '<tr>'.'<td>compiler_140302</td>'.'<td>saeed_rashidi</td>'.'<td>Quiz 1</td>'.'<td>01:13:34</td>'.'<td>2</td>'.'<td>3.25</td>'.'</tr>';

                $tempText .= '<tr>'.'<td>compiler_140302</td>'.'<td>emad_rezaee</td>'.'<td>Quiz 1</td>'.'<td>01:27:29</td>'.'<td>1</td>'.'<td>3.25</td>'.'</tr>';

                $tempText .= '<tr>'.'<td>database_140302</td>'.'<td>ali_rahimi</td>'.'<td>Database Quiz</td>'.'<td>01:29:22</td>'.'<td>1</td>'.'<td>2.25</td>'.'</tr>';

                $tempText .= '<tr>'.'<td>database_140302</td>'.'<td>emad_rezaee</td>'.'<td>Database Quiz</td>'.'<td>01:10:07</td>'.'<td>1</td>'.'<td>4.00</td>'.'</tr>';

                $tempText .= '<tr>'.'<td>algorithm_140302</td>'.'<td>amir_rahimi</td>'.'<td>Algorithm Quiz 1</td>'.'<td>01:28:22</td>'.'<td>1</td>'.'<td>4.75</td>'.'</tr>';

                $tempText .= '<tr>'.'<td>algorithm_140302</td>'.'<td>ahmad_ebadi</td>'.'<td>Algorithm Quiz 1</td>'.'<td>01:16:27</td>'.'<td>1</td>'.'<td>5.00</td>'.'</tr>';

                $tempText .= '<tr>'.'<td>algorithm_140302</td>'.'<td>ali_amiri</td>'.'<td>Algorithm Quiz 2</td>'.'<td>01:38:43</td>'.'<td>1</td>'.'<td>4.25</td>'.'</tr>';

                $tempText .= '<tr>'.'<td>algorithm_140302</td>'.'<td>hossain_adib</td>'.'<td>Algorithm Quiz 2</td>'.'<td>01:34:17</td>'.'<td>1</td>'.'<td>4.50</td>'.'</tr>';


            }
            $tempText .= "\t".'</table>'.PHP_EOL.'</div>'.'<br>';
        }
        else {

            if ($user === 'user') {
                $tempText .= '<div id="div_class">'.PHP_EOL.
                    "\t".'<h3 class="main_title">مدت زمان تکمیل هر آزمون توسط هر فراگیر در دوره های sample_teacher</h3>'.PHP_EOL;
                if ($plot === 'bar') {
                    $chart1 = (new ChartJS_Bar(['student1 (Quiz 1)', 'student2 (Quiz 1)', 'student3 (Quiz 1)', 'student4 (Quiz 1)', 'student1 (Quiz 2)', 'student2 (Quiz 2)', 'student3 (Quiz 2)', 'student4 (Quiz 2)'], [2.5, 1.5, 3, 2.25, 1.75, 2, 1.5, 3], 'مدت زمان تکمیل هر آزمون به دقیقه توسط هر فراگیر', ' مدت زمان تکمیل هر آزمون توسط هر فراگیر در دوره database_140302'))->renderChart();
                    $tempText .= $chart1;

                    $chart1 = (new ChartJS_Bar(['new_student1 (Quiz)', 'new_student2 (Quiz)', 'new_student3 (Quiz)', 'new_student4 (Quiz)'], [2, 1.5, 1.75, 2.5], 'مدت زمان تکمیل هر آزمون به دقیقه توسط هر فراگیر', ' مدت زمان تکمیل هر آزمون توسط هر فراگیر در دوره network_140302'))->renderChart();
                    $tempText .= $chart1;

                    $tempText .= '<h3 style="font-weight: normal">آزمونی در دوره algorithm_140302 وجود ندارد.</h3>';
                }
                else if ($plot === 'pie' || $plot === 'doughnut') {
                    $isDoughnut = $plot === 'doughnut';

                    $chart1 = (new ChartJS_Pie(['student1 (Quiz 1)', 'student2 (Quiz 1)', 'student3 (Quiz 1)', 'student4 (Quiz 1)', 'student1 (Quiz 2)', 'student2 (Quiz 2)', 'student3 (Quiz 2)', 'student4 (Quiz 2)'], [2.5, 1.5, 3, 2.25, 1.75, 2, 1.5, 3], 'مدت زمان تکمیل هر آزمون به دقیقه توسط هر فراگیر', ' مدت زمان تکمیل هر آزمون توسط هر فراگیر در دوره database_140302', $isDoughnut))->renderChart();
                    $tempText .= $chart1;

                    $chart1 = (new ChartJS_Pie(['new_student1 (Quiz)', 'new_student2 (Quiz)', 'new_student3 (Quiz)', 'new_student4 (Quiz)'], [2, 1.5, 1.75, 2.5], 'مدت زمان تکمیل هر آزمون به دقیقه توسط هر فراگیر', ' مدت زمان تکمیل هر آزمون توسط هر فراگیر در دوره network_140302', $isDoughnut))->renderChart();
                    $tempText .= $chart1;

                    $tempText .= '<h3 style="font-weight: normal">آزمونی در دوره algorithm_140302 وجود ندارد.</h3>';
                }
                else if (strpos($plot, 'line') >= 0) {
                    $isSmooth = $plot === 'line_smooth';

                    $chart1 = (new ChartJS_Line(['student1 (Quiz 1)', 'student2 (Quiz 1)', 'student3 (Quiz 1)', 'student4 (Quiz 1)', 'student1 (Quiz 2)', 'student2 (Quiz 2)', 'student3 (Quiz 2)', 'student4 (Quiz 2)'], [2.5, 1.5, 3, 2.25, 1.75, 2, 1.5, 3], 'مدت زمان تکمیل هر آزمون به دقیقه توسط هر فراگیر', ' مدت زمان تکمیل هر آزمون توسط هر فراگیر در دوره database_140302', $isSmooth))->renderChart();
                    $tempText .= $chart1;

                    $chart1 = (new ChartJS_Line(['new_student1 (Quiz)', 'new_student2 (Quiz)', 'new_student3 (Quiz)', 'new_student4 (Quiz)'], [2, 1.5, 1.75, 2.5], 'مدت زمان تکمیل هر آزمون به دقیقه توسط هر فراگیر', ' مدت زمان تکمیل هر آزمون توسط هر فراگیر در دوره network_140302', $isSmooth))->renderChart();
                    $tempText .= $chart1;

                    $tempText .= '<h3 style="font-weight: normal">آزمونی در دوره algorithm_140302 وجود ندارد.</h3>';
                }
            }
            else {
                $tempText .= '<div id="div_class">'.PHP_EOL.
                    "\t".'<h3 class="main_title">مدت زمان تکمیل هر آزمون توسط هر فراگیر در تمام دوره ها</h3>'.PHP_EOL;

                if ($plot === 'bar') {
                    $chart1 = (new ChartJS_Bar(['student01 (Quiz 1)', 'student02 (Quiz 1)', 'student03 (Quiz 1)', 'student04 (Quiz 1)', 'student01 (Quiz 2)', 'student02 (Quiz 2)', 'student03 (Quiz 2)', 'student04 (Quiz 2)', 'student01 (Quiz 3)', 'student02 (Quiz 3)', 'student03 (Quiz 3)', 'student04 (Quiz 3)'], [5.00, 1.25, 0.75, 1.25, 2.75, 1, 2.5, 3.25, 1.5, 4, 2.25, 1.75], 'مدت زمان تکمیل هر آزمون به دقیقه توسط هر فراگیر', ' مدت زمان تکمیل هر آزمون توسط هر فراگیر در دوره az_os_140302'))->renderChart();
                    $tempText .= $chart1;

                    $chart1 = (new ChartJS_Bar(['student1 (Quiz 1)', 'student2 (Quiz 1)', 'student3 (Quiz 1)', 'student4 (Quiz 1)', 'student1 (Quiz 2)', 'student2 (Quiz 2)', 'student3 (Quiz 2)', 'student4 (Quiz 2)'], [2.5, 1.5, 3, 2.25, 1.75, 2, 1.5, 3], 'مدت زمان تکمیل هر آزمون به دقیقه توسط هر فراگیر', ' مدت زمان تکمیل هر آزمون توسط هر فراگیر در دوره database_140302'))->renderChart();
                    $tempText .= $chart1;

                    $chart1 = (new ChartJS_Bar(['new_student1 (Quiz)', 'new_student2 (Quiz)', 'new_student3 (Quiz)', 'new_student4 (Quiz)'], [2, 1.5, 1.75, 2.5], 'مدت زمان تکمیل هر آزمون به دقیقه توسط هر فراگیر', ' مدت زمان تکمیل هر آزمون توسط هر فراگیر در دوره network_140302'))->renderChart();
                    $tempText .= $chart1;

                    $tempText .= '<h3 style="font-weight: normal">آزمونی در دوره algorithm_140302 وجود ندارد.</h3>';
                }
                else if ($plot === 'pie' || $plot === 'doughnut') {
                    $isDoughnut = $plot === 'doughnut';

                    $chart1 = (new ChartJS_Pie(['student01 (Quiz 1)', 'student02 (Quiz 1)', 'student03 (Quiz 1)', 'student04 (Quiz 1)', 'student01 (Quiz 2)', 'student02 (Quiz 2)', 'student03 (Quiz 2)', 'student04 (Quiz 2)', 'student01 (Quiz 3)', 'student02 (Quiz 3)', 'student03 (Quiz 3)', 'student04 (Quiz 3)'], [5.00, 1.25, 0.75, 1.25, 2.75, 1, 2.5, 3.25, 1.5, 4, 2.25, 1.75], 'مدت زمان تکمیل هر آزمون به دقیقه توسط هر فراگیر', ' مدت زمان تکمیل هر آزمون توسط هر فراگیر در دوره az_os_140302', $isDoughnut))->renderChart();
                    $tempText .= $chart1;

                    $chart1 = (new ChartJS_Pie(['student1 (Quiz 1)', 'student2 (Quiz 1)', 'student3 (Quiz 1)', 'student4 (Quiz 1)', 'student1 (Quiz 2)', 'student2 (Quiz 2)', 'student3 (Quiz 2)', 'student4 (Quiz 2)'], [2.5, 1.5, 3, 2.25, 1.75, 2, 1.5, 3], 'مدت زمان تکمیل هر آزمون به دقیقه توسط هر فراگیر', ' مدت زمان تکمیل هر آزمون توسط هر فراگیر در دوره database_140302', $isDoughnut))->renderChart();
                    $tempText .= $chart1;

                    $chart1 = (new ChartJS_Pie(['new_student1 (Quiz)', 'new_student2 (Quiz)', 'new_student3 (Quiz)', 'new_student4 (Quiz)'], [2, 1.5, 1.75, 2.5], 'مدت زمان تکمیل هر آزمون به دقیقه توسط هر فراگیر', ' مدت زمان تکمیل هر آزمون توسط هر فراگیر در دوره network_140302', $isDoughnut))->renderChart();
                    $tempText .= $chart1;

                    $tempText .= '<h3 style="font-weight: normal">آزمونی در دوره algorithm_140302 وجود ندارد.</h3>';
                }
                else if (strpos($plot, 'line') >= 0) {
                    $isSmooth = $plot === 'line_smooth';

                    $chart1 = (new ChartJS_Line(['student01 (Quiz 1)', 'student02 (Quiz 1)', 'student03 (Quiz 1)', 'student04 (Quiz 1)', 'student01 (Quiz 2)', 'student02 (Quiz 2)', 'student03 (Quiz 2)', 'student04 (Quiz 2)', 'student01 (Quiz 3)', 'student02 (Quiz 3)', 'student03 (Quiz 3)', 'student04 (Quiz 3)'], [5.00, 1.25, 0.75, 1.25, 2.75, 1, 2.5, 3.25, 1.5, 4, 2.25, 1.75], 'مدت زمان تکمیل هر آزمون به دقیقه توسط هر فراگیر', ' مدت زمان تکمیل هر آزمون توسط هر فراگیر در دوره az_os_140302', $isSmooth))->renderChart();
                    $tempText .= $chart1;

                    $chart1 = (new ChartJS_Line(['student1 (Quiz 1)', 'student2 (Quiz 1)', 'student3 (Quiz 1)', 'student4 (Quiz 1)', 'student1 (Quiz 2)', 'student2 (Quiz 2)', 'student3 (Quiz 2)', 'student4 (Quiz 2)'], [2.5, 1.5, 3, 2.25, 1.75, 2, 1.5, 3], 'مدت زمان تکمیل هر آزمون به دقیقه توسط هر فراگیر', ' مدت زمان تکمیل هر آزمون توسط هر فراگیر در دوره database_140302', $isSmooth))->renderChart();
                    $tempText .= $chart1;

                    $chart1 = (new ChartJS_Line(['new_student1 (Quiz)', 'new_student2 (Quiz)', 'new_student3 (Quiz)', 'new_student4 (Quiz)'], [2, 1.5, 1.75, 2.5], 'مدت زمان تکمیل هر آزمون به دقیقه توسط هر فراگیر', ' مدت زمان تکمیل هر آزمون توسط هر فراگیر در دوره network_140302', $isSmooth))->renderChart();
                    $tempText .= $chart1;

                    $tempText .= '<h3 style="font-weight: normal">آزمونی در دوره algorithm_140302 وجود ندارد.</h3>';
                }
            }
            $tempText .= "\t".PHP_EOL.'</div>'.'<br>';
        }
        return $tempText;

	}
    public function student_main_info ($user): string
    {
        $tempText = '';
        if ($user === 'user')
        {
            $tempText .= '<div id="div_class">'.PHP_EOL.
                "\t".'<h3 class="main_title">اطلاعات کاربری فراگیران حاضر در دوره های sample_teacher</h3>'.PHP_EOL."\t".'<table class="data-table">'.PHP_EOL."\t\t".'<tr>'.PHP_EOL.
                "\t\t".'<th>نام</th>'.PHP_EOL."\t\t".'<th>نام خانوادگی</th>'.PHP_EOL.
                "\t\t".'<th>نام کاربری</th>'.PHP_EOL."\t\t".'<th>ایمیل</th>'.PHP_EOL."\t\t".'<th>دپارتمان</th>'.PHP_EOL.
                "\t\t".'<th>تلفن</th>'.PHP_EOL."\t\t".'<th>شهر</th>'.PHP_EOL."\t\t".'<th>کشور</th>'.PHP_EOL.
                "\t\t".'</tr>';

            $tempText .= '<tr>'.'<td>امیر</td>'.'<td>اعتمادی</td>'.'<td>amir_etemadi</td>'.'<td>amir_etemadi@yahoo.com</td>'.'<td>مهندسی کامپیوتر</td>'.'<td></td>'.'<td>اصفهان</td>'.'<td>ایران</td>'.'</tr>';

            $tempText .= '<tr>'.'<td>محمد</td>'.'<td>محمدیان</td>'.'<td>mohammad_mohammadian</td>'.'<td>m_mohammadian@gmail.com</td>'.'<td>مهندسی کامپیوتر</td>'.'<td></td>'.'<td>اصفهان</td>'.'<td>ایران</td>'.'</tr>';

            $tempText .= '<tr>'.'<td>علی</td>'.'<td>کاظمی</td>'.'<td>ali_kazemi</td>'.'<td>ali_kazemi@gmail.com</td>'.'<td>مهندسی کامپیوتر</td>'.'<td></td>'.'<td>اصفهان</td>'.'<td>ایران</td>'.'</tr>';

            $tempText .= '<tr>'.'<td>سعید</td>'.'<td>منصوری</td>'.'<td>saeed_mansuri</td>'.'<td>saeed_mansuri@gmail.com</td>'.'<td>مهندسی کامپیوتر</td>'.'<td></td>'.'<td>اصفهان</td>'.'<td>ایران</td>'.'</tr>';

            $tempText .= '<tr>'.'<td>عماد</td>'.'<td>ترابی</td>'.'<td>emad_torabi</td>'.'<td>emad_torabi@gmail.com</td>'.'<td>مهندسی کامپیوتر</td>'.'<td></td>'.'<td>اصفهان</td>'.'<td>ایران</td>'.'</tr>';
        }
        else {
            $tempText .= '<div id="div_class">'.PHP_EOL.
                "\t".'<h3 class="main_title">اطلاعات کاربری فراگیران حاضر در تمام دوره ها</h3>'.PHP_EOL.
                "\t".'<table class="data-table">'.PHP_EOL."\t\t".'<tr>'.PHP_EOL.
                "\t\t".'<th>نام</th>'.PHP_EOL."\t\t".'<th>نام خانوادگی</th>'.PHP_EOL.
                "\t\t".'<th>نام کاربری</th>'.PHP_EOL."\t\t".'<th>ایمیل</th>'.PHP_EOL."\t\t".'<th>دپارتمان</th>'.PHP_EOL.
                "\t\t".'<th>تلفن</th>'.PHP_EOL."\t\t".'<th>شهر</th>'.PHP_EOL."\t\t".'<th>کشور</th>'.PHP_EOL.
                "\t\t".'</tr>';

            $tempText .= '<tr>'.'<td>امیر</td>'.'<td>اعتمادی</td>'.'<td>amir_etemadi</td>'.'<td>amir_etemadi@yahoo.com</td>'.'<td>مهندسی کامپیوتر</td>'.'<td></td>'.'<td>اصفهان</td>'.'<td>ایران</td>'.'</tr>';

            $tempText .= '<tr>'.'<td>محمد</td>'.'<td>محمدیان</td>'.'<td>mohammad_mohammadian</td>'.'<td>m_mohammadian@gmail.com</td>'.'<td>مهندسی کامپیوتر</td>'.'<td></td>'.'<td>اصفهان</td>'.'<td>ایران</td>'.'</tr>';

            $tempText .= '<tr>'.'<td>رضا</td>'.'<td>سعیدی</td>'.'<td>reza_saeedi</td>'.'<td>reza_saeedi@gmail.com</td>'.'<td>فناوری اطلاعات</td>'.'<td></td>'.'<td>اصفهان</td>'.'<td>ایران</td>'.'</tr>';

            $tempText .= '<tr>'.'<td>علی</td>'.'<td>داوری</td>'.'<td>ali_davari</td>'.'<td>ali_davari@gmail.com</td>'.'<td>فناوری اطلاعات</td>'.'<td></td>'.'<td>تهران</td>'.'<td>ایران</td>'.'</tr>';

            $tempText .= '<tr>'.'<td>وحید</td>'.'<td>پارسایی</td>'.'<td>vahid_parsaei</td>'.'<td>vahid_parsaei@gmail.com</td>'.'<td>فناوری اطلاعات</td>'.'<td></td>'.'<td>اصفهان</td>'.'<td>ایران</td>'.'</tr>';

            $tempText .= '<tr>'.'<td>علی</td>'.'<td>کاظمی</td>'.'<td>ali_kazemi</td>'.'<td>ali_kazemi@gmail.com</td>'.'<td>مهندسی کامپیوتر</td>'.'<td></td>'.'<td>اصفهان</td>'.'<td>ایران</td>'.'</tr>';

            $tempText .= '<tr>'.'<td>سعید</td>'.'<td>منصوری</td>'.'<td>saeed_mansuri</td>'.'<td>saeed_mansuri@gmail.com</td>'.'<td>مهندسی کامپیوتر</td>'.'<td></td>'.'<td>شیراز</td>'.'<td>ایران</td>'.'</tr>';

            $tempText .= '<tr>'.'<td>عماد</td>'.'<td>ترابی</td>'.'<td>emad_torabi</td>'.'<td>emad_torabi@gmail.com</td>'.'<td>مهندسی کامپیوتر</td>'.'<td></td>'.'<td>اهواز</td>'.'<td>ایران</td>'.'</tr>';

            $tempText .= '<tr>'.'<td>سعید</td>'.'<td>احمدی</td>'.'<td>saeed_ahmadi</td>'.'<td>saeed_ahmadi@gmail.com</td>'.'<td>مهندسی کامپیوتر</td>'.'<td></td>'.'<td>شیراز</td>'.'<td>ایران</td>'.'</tr>';

        }
        $tempText .= "\t".'</table>'.PHP_EOL.'</div>'.'<br>';
        return $tempText;

	}
    public function student_all_grades ($user, $plot): string {
        $tempText = '';

        if ($plot === 'table') {
            if ($user === 'user') {
                $tempText .= '<div id="div_class">'.PHP_EOL.
                    "\t".'<h3 class="main_title">نمرات فراگیران در تکالیف و آزمون ها در دوره های sample_teacher</h3>'.PHP_EOL. "\t".'<table class="data-table">'.PHP_EOL."\t\t".'<tr>'.PHP_EOL."\t\t".'<th>نام دوره</th>'.PHP_EOL."\t\t".'<th>نام کاربری فراگیر</th>'.PHP_EOL."\t\t".'<th>نام تکلیف/آزمون</th>'.PHP_EOL."\t\t".'<th>حداکثر نمره</th>'.PHP_EOL."\t\t".'<th>نمره</th>'.PHP_EOL."\t\t"."\t\t".'</tr>';

                $tempText .= '<tr>'.'<td>algorithm_140302</td>'.'<td>student01</td>'.'<td>آزمون 1</td>'.'<td>10.00</td>'.'<td>8.50</td>'.'</tr>';
                $tempText .= '<tr>'.'<td>algorithm_140302</td>'.'<td>student02</td>'.'<td>آزمون 1</td>'.'<td>10.00</td>'.'<td>7.25</td>'.'</tr>';
                $tempText .= '<tr>'.'<td>algorithm_140302</td>'.'<td>student03</td>'.'<td>آزمون 1</td>'.'<td>10.00</td>'.'<td>5.75</td>'.'</tr>';


                $tempText .= '<tr>'.'<td>compiler_140302</td>'.'<td>student01</td>'.'<td>تکلیف 1</td>'.'<td>10.00</td>'.'<td>9.00</td>'.'</tr>';
                $tempText .= '<tr>'.'<td>compiler_140302</td>'.'<td>student02</td>'.'<td>تکلیف 1</td>'.'<td>10.00</td>'.'<td>5.25</td>'.'</tr>';
                $tempText .= '<tr>'.'<td>compiler_140302</td>'.'<td>student03</td>'.'<td>تکلیف 1</td>'.'<td>10.00</td>'.'<td>7.00</td>'.'</tr>';

                $tempText .= '<tr>'.'<td>compiler_140302</td>'.'<td>student01</td>'.'<td>تکلیف 2</td>'.'<td>5.00</td>'.'<td>-</td>'.'</tr>';
                $tempText .= '<tr>'.'<td>compiler_140302</td>'.'<td>student02</td>'.'<td>تکلیف 2</td>'.'<td>5.00</td>'.'<td>4.25</td>'.'</tr>';
                $tempText .= '<tr>'.'<td>compiler_140302</td>'.'<td>student03</td>'.'<td>تکلیف 2</td>'.'<td>5.00</td>'.'<td>-</td>'.'</tr>';
            }
            else {
                $tempText .= '<div id="div_class">'.PHP_EOL.
                    "\t".'<h3 class="main_title">نمرات فراگیران در تکالیف و آزمون ها در تمام دوره ها</h3>'.PHP_EOL. "\t".'<table class="data-table">'.PHP_EOL."\t\t".'<tr>'.PHP_EOL."\t\t".'<th>نام دوره</th>'.PHP_EOL."\t\t".'<th>نام کاربری فراگیر</th>'.PHP_EOL."\t\t".'<th>نام تکلیف/آزمون</th>'.PHP_EOL."\t\t".'<th>حداکثر نمره</th>'.PHP_EOL."\t\t".'<th>نمره</th>'.PHP_EOL."\t\t"."\t\t".'</tr>';

                $tempText .= '<tr>'.'<td>algorithm_140302</td>'.'<td>new_student01</td>'.'<td>آزمون 1</td>'.'<td>10.00</td>'.'<td>8.75</td>'.'</tr>';
                $tempText .= '<tr>'.'<td>algorithm_140302</td>'.'<td>new_student02</td>'.'<td>آزمون 1</td>'.'<td>10.00</td>'.'<td>7.25</td>'.'</tr>';
                $tempText .= '<tr>'.'<td>algorithm_140302</td>'.'<td>new_student03</td>'.'<td>آزمون 1</td>'.'<td>10.00</td>'.'<td>5.75</td>'.'</tr>';


                $tempText .= '<tr>'.'<td>compiler_140302</td>'.'<td>student01</td>'.'<td>تکلیف 1</td>'.'<td>10.00</td>'.'<td>9.00</td>'.'</tr>';
                $tempText .= '<tr>'.'<td>compiler_140302</td>'.'<td>student02</td>'.'<td>تکلیف 1</td>'.'<td>10.00</td>'.'<td>5.25</td>'.'</tr>';
                $tempText .= '<tr>'.'<td>compiler_140302</td>'.'<td>student03</td>'.'<td>تکلیف 1</td>'.'<td>10.00</td>'.'<td>7.00</td>'.'</tr>';

                $tempText .= '<tr>'.'<td>compiler_140302</td>'.'<td>student01</td>'.'<td>تکلیف 2</td>'.'<td>5.00</td>'.'<td>-</td>'.'</tr>';
                $tempText .= '<tr>'.'<td>compiler_140302</td>'.'<td>student02</td>'.'<td>تکلیف 2</td>'.'<td>5.00</td>'.'<td>4.25</td>'.'</tr>';
                $tempText .= '<tr>'.'<td>compiler_140302</td>'.'<td>student03</td>'.'<td>تکلیف 2</td>'.'<td>5.00</td>'.'<td>-</td>'.'</tr>';


                $tempText .= '<tr>'.'<td>network_140302</td>'.'<td>student1</td>'.'<td>تکلیف 1</td>'.'<td>10.00</td>'.'<td>7.50</td>'.'</tr>';
                $tempText .= '<tr>'.'<td>network_140302</td>'.'<td>student2</td>'.'<td>تکلیف 1</td>'.'<td>10.00</td>'.'<td>5.25</td>'.'</tr>';
                $tempText .= '<tr>'.'<td>network_140302</td>'.'<td>student3</td>'.'<td>تکلیف 1</td>'.'<td>10.00</td>'.'<td>-</td>'.'</tr>';
            }
            $tempText .= "\t".'</table>'.PHP_EOL.'</div>'.'<br>';
        }
        else {
            if ($user === 'user') {
                $tempText .= '<div id="div_class">'.PHP_EOL.
                    "\t".'<h3 class="main_title">نمرات فراگیران در تکالیف و آزمون ها در دوره های sample_teacher</h3>'.PHP_EOL;

                if ($plot === 'bar') {
                    $chart1 = (new ChartJS_Bar(['student1', 'student2', 'student3', 'student4'], [6.5, 2.5, 3.75, 6], 'آزمون 1', 'نمرات فراگیران در آزمون 1 در دوره compiler_140302 با حداکثر نمره 10.00'))->renderChart();
                    $tempText .= $chart1;

                    $chart1 = (new ChartJS_Bar(['student1', 'student2', 'student3', 'student4'], [4.5, 3.5, 3.75, 5], 'تکلیف 1', 'نمرات فراگیران در تکلیف 1 در دوره network_140302 با حداکثر نمره 5.00'))->renderChart();
                    $tempText .= $chart1;

                    $chart1 = (new ChartJS_Bar(['student1', 'student2', 'student3', 'student4'], [0, 3.5, 0, 2.75], 'تکلیف 2', 'نمرات فراگیران در تکلیف 2 در دوره network_140302 با حداکثر نمره 5.00'))->renderChart();
                    $tempText .= $chart1;

                }
                else if ($plot === 'pie' || $plot === 'doughnut') {
                    $isDoughnut = $plot === 'doughnut';

                    $chart1 = (new ChartJS_Pie(['student1', 'student2', 'student3', 'student4'], [6.5, 2.5, 3.75, 6], 'آزمون 1', 'نمرات فراگیران در آزمون 1 در دوره compiler_140302 با حداکثر نمره 10.00', $isDoughnut))->renderChart();
                    $tempText .= $chart1;

                    $chart1 = (new ChartJS_Pie(['student1', 'student2', 'student3', 'student4'], [4.5, 3.5, 3.75, 5], 'تکلیف 1', 'نمرات فراگیران در تکلیف 1 در دوره network_140302 با حداکثر نمره 5.00', $isDoughnut))->renderChart();
                    $tempText .= $chart1;

                    $chart1 = (new ChartJS_Pie(['student1', 'student2', 'student3', 'student4'], [0, 3.5, 0, 2.75], 'تکلیف 2', 'نمرات فراگیران در تکلیف 2 در دوره network_140302 با حداکثر نمره 5.00', $isDoughnut))->renderChart();
                    $tempText .= $chart1;
                }
                else if (strpos($plot, 'line') >= 0) {
                    $isSmooth = $plot === 'line_smooth';

                    $chart1 = (new ChartJS_Line(['student1', 'student2', 'student3', 'student4'], [6.5, 2.5, 3.75, 6], 'آزمون 1', 'نمرات فراگیران در آزمون 1 در دوره compiler_140302 با حداکثر نمره 10.00', $isSmooth))->renderChart();
                    $tempText .= $chart1;

                    $chart1 = (new ChartJS_Line(['student1', 'student2', 'student3', 'student4'], [4.5, 3.5, 3.75, 5], 'تکلیف 1', 'نمرات فراگیران در تکلیف 1 در دوره network_140302 با حداکثر نمره 5.00', $isSmooth))->renderChart();
                    $tempText .= $chart1;

                    $chart1 = (new ChartJS_Line(['student1', 'student2', 'student3', 'student4'], [0, 3.5, 0, 2.75], 'تکلیف 2', 'نمرات فراگیران در تکلیف 2 در دوره network_140302 با حداکثر نمره 5.00', $isSmooth))->renderChart();
                    $tempText .= $chart1;
                }
            }
            else {

                $tempText .= '<div id="div_class">'.PHP_EOL.
                    "\t".'<h3 class="main_title">نمرات فراگیران در تکالیف و آزمون ها در تمام دوره ها</h3>'.PHP_EOL;

                if ($plot === 'bar') {
                    $chart1 = (new ChartJS_Bar(['student1', 'student2', 'student3', 'student4'], [6.5, 2.5, 3.75, 6], 'آزمون 1', 'نمرات فراگیران در آزمون 1 در دوره compiler_140302 با حداکثر نمره 10.00'))->renderChart();
                    $tempText .= $chart1;

                    $chart1 = (new ChartJS_Bar(['student1', 'student2', 'student3', 'student4'], [4.5, 3.5, 3.75, 5], 'تکلیف 1', 'نمرات فراگیران در تکلیف 1 در دوره network_140302 با حداکثر نمره 5.00'))->renderChart();
                    $tempText .= $chart1;

                    $chart1 = (new ChartJS_Bar(['student1', 'student2', 'student3', 'student4'], [0, 3.5, 0, 2.75], 'تکلیف 2', 'نمرات فراگیران در تکلیف 2 در دوره network_140302 با حداکثر نمره 5.00'))->renderChart();
                    $tempText .= $chart1;

                    $chart1 = (new ChartJS_Bar(['student01', 'student02', 'student03', 'student04', 'student05', 'student06'], [6.5, 2.5, 3.75, 6, 8.5, 9.25], 'آزمون 1', 'نمرات فراگیران در آزمون 1 در دوره ai_140302 با حداکثر نمره 10.00'))->renderChart();
                    $tempText .= $chart1;

                    $chart1 = (new ChartJS_Bar(['student_1', 'student_2', 'student_3', 'student_4', 'student_5'], [4.5, 3.5, 3.75, 5, 2.50], 'تکلیف 1', 'نمرات فراگیران در تکلیف 1 در دوره logical_circuits_140302 با حداکثر نمره 5.00'))->renderChart();
                    $tempText .= $chart1;
                }
                else if ($plot === 'pie' || $plot === 'doughnut') {
                    $isDoughnut = $plot === 'doughnut';

                    $chart1 = (new ChartJS_Pie(['student1', 'student2', 'student3', 'student4'], [6.5, 2.5, 3.75, 6], 'آزمون 1', 'نمرات فراگیران در آزمون 1 در دوره compiler_140302 با حداکثر نمره 10.00', $isDoughnut))->renderChart();
                    $tempText .= $chart1;

                    $chart1 = (new ChartJS_Pie(['student1', 'student2', 'student3', 'student4'], [4.5, 3.5, 3.75, 5], 'تکلیف 1', 'نمرات فراگیران در تکلیف 1 در دوره network_140302 با حداکثر نمره 5.00', $isDoughnut))->renderChart();
                    $tempText .= $chart1;

                    $chart1 = (new ChartJS_Pie(['student1', 'student2', 'student3', 'student4'], [0, 3.5, 0, 2.75], 'تکلیف 2', 'نمرات فراگیران در تکلیف 2 در دوره network_140302 با حداکثر نمره 5.00', $isDoughnut))->renderChart();
                    $tempText .= $chart1;

                    $chart1 = (new ChartJS_Pie(['student01', 'student02', 'student03', 'student04', 'student05', 'student06'], [6.5, 2.5, 3.75, 6, 8.5, 9.25], 'آزمون 1', 'نمرات فراگیران در آزمون 1 در دوره ai_140302 با حداکثر نمره 10.00', $isDoughnut))->renderChart();
                    $tempText .= $chart1;

                    $chart1 = (new ChartJS_Pie(['student_1', 'student_2', 'student_3', 'student_4', 'student_5'], [4.5, 3.5, 3.75, 5, 2.50], 'تکلیف 1', 'نمرات فراگیران در تکلیف 1 در دوره logical_circuits_140302 با حداکثر نمره 5.00', $isDoughnut))->renderChart();
                    $tempText .= $chart1;
                }
                else if (strpos($plot, 'line') >= 0) {
                    $isSmooth = $plot === 'line_smooth';

                    $chart1 = (new ChartJS_Line(['student1', 'student2', 'student3', 'student4'], [6.5, 2.5, 3.75, 6], 'آزمون 1', 'نمرات فراگیران در آزمون 1 در دوره compiler_140302 با حداکثر نمره 10.00', $isSmooth))->renderChart();
                    $tempText .= $chart1;

                    $chart1 = (new ChartJS_Line(['student1', 'student2', 'student3', 'student4'], [4.5, 3.5, 3.75, 5], 'تکلیف 1', 'نمرات فراگیران در تکلیف 1 در دوره network_140302 با حداکثر نمره 5.00', $isSmooth))->renderChart();
                    $tempText .= $chart1;

                    $chart1 = (new ChartJS_Line(['student1', 'student2', 'student3', 'student4'], [0, 3.5, 0, 2.75], 'تکلیف 2', 'نمرات فراگیران در تکلیف 2 در دوره network_140302 با حداکثر نمره 5.00', $isSmooth))->renderChart();
                    $tempText .= $chart1;

                    $chart1 = (new ChartJS_Line(['student01', 'student02', 'student03', 'student04', 'student05', 'student06'], [6.5, 2.5, 3.75, 6, 8.5, 9.25], 'آزمون 1', 'نمرات فراگیران در آزمون 1 در دوره ai_140302 با حداکثر نمره 10.00', $isSmooth))->renderChart();
                    $tempText .= $chart1;

                    $chart1 = (new ChartJS_Line(['student_1', 'student_2', 'student_3', 'student_4', 'student_5'], [4.5, 3.5, 3.75, 5, 2.50], 'تکلیف 1', 'نمرات فراگیران در تکلیف 1 در دوره logical_circuits_140302 با حداکثر نمره 5.00', $isSmooth))->renderChart();
                    $tempText .= $chart1;
                }
            }
            $tempText .= "\t".PHP_EOL.'</div>'.'<br>';
        }
        return $tempText;

	}
    public function student_grades_to_top_grade ($user, $plot): string
    {
        $tempText = '';
        if ($plot === 'table') {
            if ($user === 'user') {
                $tempText .= '<div id="div_class">'.PHP_EOL.
                    "\t".'<h3 class="main_title">نمرات فراگیران در مقابل بالاترین نمره تکلیف/آزمون در دوره های sample_teacher</h3>';

                $tempText .= '<br><h3 class="h3_2">نمرات فراگیران در آزمون 1 در دوره database_140302</h3><br>';
                $tempText.= PHP_EOL. "\t".'<table class="data-table">'.PHP_EOL."\t\t".'<tr>'.PHP_EOL."\t\t".'<th>نام دوره</th>'.PHP_EOL."\t\t".'<th>نام کاربری فراگیر</th>'.PHP_EOL."\t\t".'<th>نام تکلیف/آزمون</th>'.PHP_EOL."\t\t".'<th>حداکثر نمره</th>'.PHP_EOL."\t\t".'<th>نمره</th>'.PHP_EOL."\t\t"."\t\t".'</tr>';

                $tempText .= '<tr>'.'<td>database_140302</td>'.'<td>student1</td>'.'<td>تکلیف 1</td>'.'<td>10.00</td>'.'<td>6.50</td>'.'</tr>';
                $tempText .= '<tr>'.'<td>database_140302</td>'.'<td>student2</td>'.'<td>تکلیف 1</td>'.'<td>10.00</td>'.'<td>7.50</td>'.'</tr>';
                $tempText .= '<tr>'.'<td>database_140302</td>'.'<td>student3</td>'.'<td>تکلیف 1</td>'.'<td>10.00</td>'.'<td>8.00</td>'.'</tr>';

                $tempText .= "\t".'</table><br>'.PHP_EOL.'<h3 style="font-weight: normal">بالاترین نمره: 8.00</h3><br>';



                $tempText .= '<br><h3 class="h3_2">نمرات فراگیران در آزمون 1 در دوره compiler_140302</h3><br>';
                $tempText.= PHP_EOL. "\t".'<table class="data-table">'.PHP_EOL."\t\t".'<tr>'.PHP_EOL."\t\t".'<th>نام دوره</th>'.PHP_EOL."\t\t".'<th>نام کاربری فراگیر</th>'.PHP_EOL."\t\t".'<th>نام تکلیف/آزمون</th>'.PHP_EOL."\t\t".'<th>حداکثر نمره</th>'.PHP_EOL."\t\t".'<th>نمره</th>'.PHP_EOL."\t\t"."\t\t".'</tr>';

                $tempText .= '<tr>'.'<td>compiler_140302</td>'.'<td>student_1</td>'.'<td>آزمون 1</td>'.'<td>100.00</td>'.'<td>45.75</td>'.'</tr>';
                $tempText .= '<tr>'.'<td>compiler_140302</td>'.'<td>student_2</td>'.'<td>آزمون 1</td>'.'<td>100.00</td>'.'<td>90.00</td>'.'</tr>';
                $tempText .= '<tr>'.'<td>compiler_140302</td>'.'<td>student_3</td>'.'<td>آزمون 1</td>'.'<td>100.00</td>'.'<td>80.00</td>'.'</tr>';

                $tempText .= "\t".'</table><br>'.PHP_EOL.'<h3 style="font-weight: normal">بالاترین نمره: 90.00</h3><br>';

            }
            else {
                $tempText .= '<div id="div_class">'.PHP_EOL.
                    "\t".'<h3 class="main_title">نمرات فراگیران در مقابل بالاترین نمره تکلیف/آزمون در تمام دوره ها</h3>';

                $tempText .= '<br><h3 class="h3_2">نمرات فراگیران در آزمون 1 در دوره database_140302</h3><br>';
                $tempText.= PHP_EOL. "\t".'<table class="data-table">'.PHP_EOL."\t\t".'<tr>'.PHP_EOL."\t\t".'<th>نام دوره</th>'.PHP_EOL."\t\t".'<th>نام کاربری فراگیر</th>'.PHP_EOL."\t\t".'<th>نام تکلیف/آزمون</th>'.PHP_EOL."\t\t".'<th>حداکثر نمره</th>'.PHP_EOL."\t\t".'<th>نمره</th>'.PHP_EOL."\t\t"."\t\t".'</tr>';

                $tempText .= '<tr>'.'<td>database_140302</td>'.'<td>student1</td>'.'<td>تکلیف 1</td>'.'<td>10.00</td>'.'<td>6.50</td>'.'</tr>';
                $tempText .= '<tr>'.'<td>database_140302</td>'.'<td>student2</td>'.'<td>تکلیف 1</td>'.'<td>10.00</td>'.'<td>7.50</td>'.'</tr>';
                $tempText .= '<tr>'.'<td>database_140302</td>'.'<td>student3</td>'.'<td>تکلیف 1</td>'.'<td>10.00</td>'.'<td>8.00</td>'.'</tr>';

                $tempText .= "\t".'</table><br>'.PHP_EOL.'<h3 style="font-weight: normal">بالاترین نمره: 8.00</h3><br>';



                $tempText .= '<br><h3 class="h3_2">نمرات فراگیران در آزمون 1 در دوره compiler_140302</h3><br>';
                $tempText.= PHP_EOL. "\t".'<table class="data-table">'.PHP_EOL."\t\t".'<tr>'.PHP_EOL."\t\t".'<th>نام دوره</th>'.PHP_EOL."\t\t".'<th>نام کاربری فراگیر</th>'.PHP_EOL."\t\t".'<th>نام تکلیف/آزمون</th>'.PHP_EOL."\t\t".'<th>حداکثر نمره</th>'.PHP_EOL."\t\t".'<th>نمره</th>'.PHP_EOL."\t\t"."\t\t".'</tr>';

                $tempText .= '<tr>'.'<td>compiler_140302</td>'.'<td>student_1</td>'.'<td>آزمون 1</td>'.'<td>100.00</td>'.'<td>45.75</td>'.'</tr>';
                $tempText .= '<tr>'.'<td>compiler_140302</td>'.'<td>student_2</td>'.'<td>آزمون 1</td>'.'<td>100.00</td>'.'<td>90.00</td>'.'</tr>';
                $tempText .= '<tr>'.'<td>compiler_140302</td>'.'<td>student_3</td>'.'<td>آزمون 1</td>'.'<td>100.00</td>'.'<td>80.00</td>'.'</tr>';

                $tempText .= "\t".'</table><br>'.PHP_EOL.'<h3 style="font-weight: normal">بالاترین نمره: 90.00</h3><br>';




                $tempText .= '<br><h3 class="h3_2">نمرات فراگیران در آزمون 1 در دوره ai_140302</h3><br>';
                $tempText.= PHP_EOL. "\t".'<table class="data-table">'.PHP_EOL."\t\t".'<tr>'.PHP_EOL."\t\t".'<th>نام دوره</th>'.PHP_EOL."\t\t".'<th>نام کاربری فراگیر</th>'.PHP_EOL."\t\t".'<th>نام تکلیف/آزمون</th>'.PHP_EOL."\t\t".'<th>حداکثر نمره</th>'.PHP_EOL."\t\t".'<th>نمره</th>'.PHP_EOL."\t\t"."\t\t".'</tr>';

                $tempText .= '<tr>'.'<td>ai_140302</td>'.'<td>student_01</td>'.'<td>آزمون 1</td>'.'<td>100.00</td>'.'<td>54.75</td>'.'</tr>';
                $tempText .= '<tr>'.'<td>ai_140302</td>'.'<td>student_02</td>'.'<td>آزمون 1</td>'.'<td>100.00</td>'.'<td>83.00</td>'.'</tr>';
                $tempText .= '<tr>'.'<td>ai_140302</td>'.'<td>student_03</td>'.'<td>آزمون 1</td>'.'<td>100.00</td>'.'<td>67.00</td>'.'</tr>';
                $tempText .= '<tr>'.'<td>ai_140302</td>'.'<td>student_04</td>'.'<td>آزمون 1</td>'.'<td>100.00</td>'.'<td>87.00</td>'.'</tr>';

                $tempText .= "\t".'</table><br>'.PHP_EOL.'<h3 style="font-weight: normal">بالاترین نمره: 87.00</h3><br>';


                $tempText .= '<br><h3 class="h3_2">نمرات فراگیران در آزمون 1 در دوره ai_140302</h3><br>';
                $tempText.= PHP_EOL. "\t".'<table class="data-table">'.PHP_EOL."\t\t".'<tr>'.PHP_EOL."\t\t".'<th>نام دوره</th>'.PHP_EOL."\t\t".'<th>نام کاربری فراگیر</th>'.PHP_EOL."\t\t".'<th>نام تکلیف/آزمون</th>'.PHP_EOL."\t\t".'<th>حداکثر نمره</th>'.PHP_EOL."\t\t".'<th>نمره</th>'.PHP_EOL."\t\t"."\t\t".'</tr>';

                $tempText .= '<tr>'.'<td>ai_140302</td>'.'<td>student_01</td>'.'<td>آزمون 2</td>'.'<td>100.00</td>'.'<td>62.75</td>'.'</tr>';
                $tempText .= '<tr>'.'<td>ai_140302</td>'.'<td>student_02</td>'.'<td>آزمون 2</td>'.'<td>100.00</td>'.'<td>23.00</td>'.'</tr>';
                $tempText .= '<tr>'.'<td>ai_140302</td>'.'<td>student_03</td>'.'<td>آزمون 2</td>'.'<td>100.00</td>'.'<td>44.50</td>'.'</tr>';
                $tempText .= '<tr>'.'<td>ai_140302</td>'.'<td>student_04</td>'.'<td>آزمون 2</td>'.'<td>100.00</td>'.'<td>90.75</td>'.'</tr>';

                $tempText .= "\t".'</table><br>'.PHP_EOL.'<h3 style="font-weight: normal">بالاترین نمره: 90.75</h3><br>';
            }
            $tempText .= PHP_EOL.'</div>'.'<br>';
        }
        else {

            if ($user === 'user') {
                $tempText .= '<div id="div_class">'.PHP_EOL.
                    "\t".'<h3 class="main_title">نمرات فراگیران در مقابل بالاترین نمره تکلیف/آزمون در دوره های sample_teacher</h3>'.PHP_EOL;

                if ($plot === 'bar') {
                    $chart = (new ChartJS_Bar(['student1', 'student2', 'student3', 'student4', 'بالاترین نمره'], [6.50, 7.75, 5.00, 2.25, 7.75], 'آزمون 1', 'نمرات فراگیران در آزمون 1 در مقابل بالاترین نمره در دوره database_140302 با حداکثر نمره 10.00'))->renderChart();
                    $tempText .= $chart;


                    $chart = (new ChartJS_Bar(['student1', 'student2', 'student3', 'student4', 'student5', 'student6', 'بالاترین نمره'], [16.50, 15.75, 13.25, 18.25, 14.50, 13.00, 18.25], 'تکلیف 1', 'نمرات فراگیران در تکلیف 1 در مقابل بالاترین نمره در دوره algorithm_140302 با حداکثر نمره 20.00'))->renderChart();
                    $tempText .= $chart;
                }
                else if ($plot === 'pie' || $plot === 'doughnut') {
                    $isDoughnut = $plot === 'doughnut';

                    $chart = (new ChartJS_Pie(['student1', 'student2', 'student3', 'student4', 'بالاترین نمره'], [6.50, 7.75, 5.00, 2.25, 7.75], 'آزمون 1', 'نمرات فراگیران در آزمون 1 در مقابل بالاترین نمره در دوره database_140302 با حداکثر نمره 10.00', $isDoughnut))->renderChart();
                    $tempText .= $chart;


                    $chart = (new ChartJS_Pie(['student1', 'student2', 'student3', 'student4', 'student5', 'student6', 'بالاترین نمره'], [16.50, 15.75, 13.25, 18.25, 14.50, 13.00, 18.25], 'تکلیف 1', 'نمرات فراگیران در تکلیف 1 در مقابل بالاترین نمره در دوره algorithm_140302 با حداکثر نمره 20.00', $isDoughnut))->renderChart();
                    $tempText .= $chart;
                }
                else if (strpos($plot, 'line') >= 0) {
                    $isSmooth = $plot === 'line_smooth';

                    $chart = (new ChartJS_Line(['student1', 'student2', 'student3', 'student4', 'بالاترین نمره'], [6.50, 7.75, 5.00, 2.25, 7.75], 'آزمون 1', 'نمرات فراگیران در آزمون 1 در مقابل بالاترین نمره در دوره database_140302 با حداکثر نمره 10.00', $isSmooth))->renderChart();
                    $tempText .= $chart;


                    $chart = (new ChartJS_Line(['student1', 'student2', 'student3', 'student4', 'student5', 'student6', 'بالاترین نمره'], [16.50, 15.75, 13.25, 18.25, 14.50, 13.00, 18.25], 'تکلیف 1', 'نمرات فراگیران در تکلیف 1 در مقابل بالاترین نمره در دوره algorithm_140302 با حداکثر نمره 20.00', $isSmooth))->renderChart();
                    $tempText .= $chart;
                }
            }
            else {
                $tempText .= '<div id="div_class">'.PHP_EOL.
                    "\t".'<h3 class="main_title">نمرات فراگیران در مقابل بالاترین نمره تکلیف/آزمون در تمام دوره ها</h3>'.PHP_EOL;

                if ($plot === 'bar') {
                    $chart = (new ChartJS_Bar(['student1', 'student2', 'student3', 'student4', 'بالاترین نمره'], [6.50, 8.75, 5.00, 2.25, 8.75], 'آزمون 1', 'نمرات فراگیران در آزمون 1 در مقابل بالاترین نمره در دوره database_140302 با حداکثر نمره 10.00'))->renderChart();
                    $tempText .= $chart;


                    $chart = (new ChartJS_Bar(['student1', 'student2', 'student3', 'student4', 'student5', 'student6', 'بالاترین نمره'], [16.50, 15.75, 13.25, 18.25, 14.50, 13.00, 18.25], 'تکلیف 1', 'نمرات فراگیران در تکلیف 1 در مقابل بالاترین نمره در دوره algorithm_140302 با حداکثر نمره 20.00'))->renderChart();
                    $tempText .= $chart;

                    $chart = (new ChartJS_Bar(['student01', 'student02', 'student03', 'student04', 'student05', 'student06', 'student07', 'بالاترین نمره'], [12.50, 11.00, 10.5, 18.50, 15.5, 14.75, 16.25, 18.50], 'تکلیف 1', 'نمرات فراگیران در تکلیف 1 در مقابل بالاترین نمره در دوره az_database_140302 با حداکثر نمره 20.00'))->renderChart();
                    $tempText .= $chart;

                    $chart = (new ChartJS_Bar(['student_01', 'student_02', 'student_03', 'student_04', 'student_05', 'بالاترین نمره'], [65.00, 74.25, 50.00, 43.25, 67.25, 74.25], 'کوییز 1', 'نمرات فراگیران در کوییز 1 در مقابل بالاترین نمره در دوره operating_systems_140302 با حداکثر نمره 100.00'))->renderChart();
                    $tempText .= $chart;
                }
                else if ($plot === 'pie' || $plot === 'doughnut') {
                    $isDoughnut = $plot === 'doughnut';

                    $chart = (new ChartJS_Pie(['student1', 'student2', 'student3', 'student4', 'بالاترین نمره'], [6.50, 8.75, 5.00, 2.25, 8.75], 'آزمون 1', 'نمرات فراگیران در آزمون 1 در مقابل بالاترین نمره در دوره database_140302 با حداکثر نمره 10.00', $isDoughnut))->renderChart();
                    $tempText .= $chart;


                    $chart = (new ChartJS_Pie(['student1', 'student2', 'student3', 'student4', 'student5', 'student6', 'بالاترین نمره'], [16.50, 15.75, 13.25, 18.25, 14.50, 13.00, 18.25], 'تکلیف 1', 'نمرات فراگیران در تکلیف 1 در مقابل بالاترین نمره در دوره algorithm_140302 با حداکثر نمره 20.00', $isDoughnut))->renderChart();
                    $tempText .= $chart;

                    $chart = (new ChartJS_Pie(['student01', 'student02', 'student03', 'student04', 'student05', 'student06', 'student07', 'بالاترین نمره'], [12.50, 11.00, 10.5, 18.50, 15.5, 14.75, 16.25, 18.50], 'تکلیف 1', 'نمرات فراگیران در تکلیف 1 در مقابل بالاترین نمره در دوره az_database_140302 با حداکثر نمره 20.00', $isDoughnut))->renderChart();
                    $tempText .= $chart;

                    $chart = (new ChartJS_Pie(['student_01', 'student_02', 'student_03', 'student_04', 'student_05', 'بالاترین نمره'], [65.00, 74.25, 50.00, 43.25, 67.25, 74.25], 'کوییز 1', 'نمرات فراگیران در کوییز 1 در مقابل بالاترین نمره در دوره operating_systems_140302 با حداکثر نمره 100.00', $isDoughnut))->renderChart();
                    $tempText .= $chart;
                }
                else if (strpos($plot, 'line') >= 0) {
                    $isSmooth = $plot === 'line_smooth';

                    $chart = (new ChartJS_Line(['student1', 'student2', 'student3', 'student4', 'بالاترین نمره'], [6.50, 8.75, 5.00, 2.25, 8.75], 'آزمون 1', 'نمرات فراگیران در آزمون 1 در مقابل بالاترین نمره در دوره database_140302 با حداکثر نمره 10.00', $isSmooth))->renderChart();
                    $tempText .= $chart;


                    $chart = (new ChartJS_Line(['student1', 'student2', 'student3', 'student4', 'student5', 'student6', 'بالاترین نمره'], [16.50, 15.75, 13.25, 18.25, 14.50, 13.00, 18.25], 'تکلیف 1', 'نمرات فراگیران در تکلیف 1 در مقابل بالاترین نمره در دوره algorithm_140302 با حداکثر نمره 20.00', $isSmooth))->renderChart();
                    $tempText .= $chart;

                    $chart = (new ChartJS_Line(['student01', 'student02', 'student03', 'student04', 'student05', 'student06', 'student07', 'بالاترین نمره'], [12.50, 11.00, 10.5, 18.50, 15.5, 14.75, 16.25, 18.50], 'تکلیف 1', 'نمرات فراگیران در تکلیف 1 در مقابل بالاترین نمره در دوره az_database_140302 با حداکثر نمره 20.00', $isSmooth))->renderChart();
                    $tempText .= $chart;

                    $chart = (new ChartJS_Line(['student_01', 'student_02', 'student_03', 'student_04', 'student_05', 'بالاترین نمره'], [65.00, 74.25, 50.00, 43.25, 67.25, 74.25], 'کوییز 1', 'نمرات فراگیران در کوییز 1 در مقابل بالاترین نمره در دوره operating_systems_140302 با حداکثر نمره 100.00', $isSmooth))->renderChart();
                    $tempText .= $chart;
                }
            }
            $tempText .= "\t".PHP_EOL.'</div>'.'<br>';
        }
        return $tempText;

	}
    public function student_grades_to_avg_other ($user, $plot): string
    {
        $tempText = '';
        if ($plot === 'table')
        {
            if ($user === 'user') {
                $tempText .= '<div id="div_class">'.PHP_EOL.
                    "\t".'<h3 class="main_title">نمرات فراگیران در مقابل متوسط کلاس در دوره های sample_teacher</h3>';

                $tempText .= '<br><h3 class="h3_2">نمرات فراگیران در آزمون 1 در دوره database_140302</h3><br>';
                $tempText.= PHP_EOL. "\t".'<table class="data-table">'.PHP_EOL."\t\t".'<tr>'.PHP_EOL."\t\t".'<th>نام دوره</th>'.PHP_EOL."\t\t".'<th>نام کاربری فراگیر</th>'.PHP_EOL."\t\t".'<th>نام تکلیف/آزمون</th>'.PHP_EOL."\t\t".'<th>حداکثر نمره</th>'.PHP_EOL."\t\t".'<th>نمره</th>'.PHP_EOL."\t\t"."\t\t".'</tr>';

                $tempText .= '<tr>'.'<td>database_140302</td>'.'<td>student1</td>'.'<td>تکلیف 1</td>'.'<td>10.00</td>'.'<td>6.50</td>'.'</tr>';
                $tempText .= '<tr>'.'<td>database_140302</td>'.'<td>student2</td>'.'<td>تکلیف 1</td>'.'<td>10.00</td>'.'<td>7.50</td>'.'</tr>';
                $tempText .= '<tr>'.'<td>database_140302</td>'.'<td>student3</td>'.'<td>تکلیف 1</td>'.'<td>10.00</td>'.'<td>8.00</td>'.'</tr>';

                $tempText .= "\t".'</table><br>'.PHP_EOL.'<h3 style="font-weight: normal">متوسط نمره: 7.34</h3><br>';



                $tempText .= '<br><h3 class="h3_2">نمرات فراگیران در آزمون 1 در دوره compiler_140302</h3><br>';
                $tempText.= PHP_EOL. "\t".'<table class="data-table">'.PHP_EOL."\t\t".'<tr>'.PHP_EOL."\t\t".'<th>نام دوره</th>'.PHP_EOL."\t\t".'<th>نام کاربری فراگیر</th>'.PHP_EOL."\t\t".'<th>نام تکلیف/آزمون</th>'.PHP_EOL."\t\t".'<th>حداکثر نمره</th>'.PHP_EOL."\t\t".'<th>نمره</th>'.PHP_EOL."\t\t"."\t\t".'</tr>';

                $tempText .= '<tr>'.'<td>compiler_140302</td>'.'<td>student_1</td>'.'<td>آزمون 1</td>'.'<td>100.00</td>'.'<td>45.75</td>'.'</tr>';
                $tempText .= '<tr>'.'<td>compiler_140302</td>'.'<td>student_2</td>'.'<td>آزمون 1</td>'.'<td>100.00</td>'.'<td>90.00</td>'.'</tr>';
                $tempText .= '<tr>'.'<td>compiler_140302</td>'.'<td>student_3</td>'.'<td>آزمون 1</td>'.'<td>100.00</td>'.'<td>80.00</td>'.'</tr>';

                $tempText .= "\t".'</table><br>'.PHP_EOL.'<h3 style="font-weight: normal">متوسط نمره: 71.91</h3><br>';

            }
            else {
                $tempText .= '<div id="div_class">'.PHP_EOL.
                    "\t".'<h3 class="main_title">نمرات فراگیران در مقابل متوسط کلاس در تمام دوره ها</h3>';


                $tempText .= '<br><h3 class="h3_2">نمرات فراگیران در آزمون 1 در دوره database_140302</h3><br>';
                $tempText.= PHP_EOL. "\t".'<table class="data-table">'.PHP_EOL."\t\t".'<tr>'.PHP_EOL."\t\t".'<th>نام دوره</th>'.PHP_EOL."\t\t".'<th>نام کاربری فراگیر</th>'.PHP_EOL."\t\t".'<th>نام تکلیف/آزمون</th>'.PHP_EOL."\t\t".'<th>حداکثر نمره</th>'.PHP_EOL."\t\t".'<th>نمره</th>'.PHP_EOL."\t\t"."\t\t".'</tr>';

                $tempText .= '<tr>'.'<td>database_140302</td>'.'<td>student1</td>'.'<td>تکلیف 1</td>'.'<td>10.00</td>'.'<td>6.50</td>'.'</tr>';
                $tempText .= '<tr>'.'<td>database_140302</td>'.'<td>student2</td>'.'<td>تکلیف 1</td>'.'<td>10.00</td>'.'<td>7.50</td>'.'</tr>';
                $tempText .= '<tr>'.'<td>database_140302</td>'.'<td>student3</td>'.'<td>تکلیف 1</td>'.'<td>10.00</td>'.'<td>8.00</td>'.'</tr>';

                $tempText .= "\t".'</table><br>'.PHP_EOL.'<h3 style="font-weight: normal">بالاترین نمره: 7.34</h3><br>';



                $tempText .= '<br><h3 class="h3_2">نمرات فراگیران در آزمون 1 در دوره compiler_140302</h3><br>';
                $tempText.= PHP_EOL. "\t".'<table class="data-table">'.PHP_EOL."\t\t".'<tr>'.PHP_EOL."\t\t".'<th>نام دوره</th>'.PHP_EOL."\t\t".'<th>نام کاربری فراگیر</th>'.PHP_EOL."\t\t".'<th>نام تکلیف/آزمون</th>'.PHP_EOL."\t\t".'<th>حداکثر نمره</th>'.PHP_EOL."\t\t".'<th>نمره</th>'.PHP_EOL."\t\t"."\t\t".'</tr>';

                $tempText .= '<tr>'.'<td>compiler_140302</td>'.'<td>student_1</td>'.'<td>آزمون 1</td>'.'<td>100.00</td>'.'<td>45.75</td>'.'</tr>';
                $tempText .= '<tr>'.'<td>compiler_140302</td>'.'<td>student_2</td>'.'<td>آزمون 1</td>'.'<td>100.00</td>'.'<td>90.00</td>'.'</tr>';
                $tempText .= '<tr>'.'<td>compiler_140302</td>'.'<td>student_3</td>'.'<td>آزمون 1</td>'.'<td>100.00</td>'.'<td>80.00</td>'.'</tr>';

                $tempText .= "\t".'</table><br>'.PHP_EOL.'<h3 style="font-weight: normal">بالاترین نمره: 71.91</h3><br>';




                $tempText .= '<br><h3 class="h3_2">نمرات فراگیران در آزمون 1 در دوره ai_140302</h3><br>';
                $tempText.= PHP_EOL. "\t".'<table class="data-table">'.PHP_EOL."\t\t".'<tr>'.PHP_EOL."\t\t".'<th>نام دوره</th>'.PHP_EOL."\t\t".'<th>نام کاربری فراگیر</th>'.PHP_EOL."\t\t".'<th>نام تکلیف/آزمون</th>'.PHP_EOL."\t\t".'<th>حداکثر نمره</th>'.PHP_EOL."\t\t".'<th>نمره</th>'.PHP_EOL."\t\t"."\t\t".'</tr>';

                $tempText .= '<tr>'.'<td>ai_140302</td>'.'<td>student_01</td>'.'<td>آزمون 1</td>'.'<td>100.00</td>'.'<td>54.75</td>'.'</tr>';
                $tempText .= '<tr>'.'<td>ai_140302</td>'.'<td>student_02</td>'.'<td>آزمون 1</td>'.'<td>100.00</td>'.'<td>83.00</td>'.'</tr>';
                $tempText .= '<tr>'.'<td>ai_140302</td>'.'<td>student_03</td>'.'<td>آزمون 1</td>'.'<td>100.00</td>'.'<td>67.00</td>'.'</tr>';
                $tempText .= '<tr>'.'<td>ai_140302</td>'.'<td>student_04</td>'.'<td>آزمون 1</td>'.'<td>100.00</td>'.'<td>87.00</td>'.'</tr>';

                $tempText .= "\t".'</table><br>'.PHP_EOL.'<h3 style="font-weight: normal">بالاترین نمره: 72.93</h3><br>';


                $tempText .= '<br><h3 class="h3_2">نمرات فراگیران در آزمون 1 در دوره ai_140302</h3><br>';
                $tempText.= PHP_EOL. "\t".'<table class="data-table">'.PHP_EOL."\t\t".'<tr>'.PHP_EOL."\t\t".'<th>نام دوره</th>'.PHP_EOL."\t\t".'<th>نام کاربری فراگیر</th>'.PHP_EOL."\t\t".'<th>نام تکلیف/آزمون</th>'.PHP_EOL."\t\t".'<th>حداکثر نمره</th>'.PHP_EOL."\t\t".'<th>نمره</th>'.PHP_EOL."\t\t"."\t\t".'</tr>';

                $tempText .= '<tr>'.'<td>ai_140302</td>'.'<td>student_01</td>'.'<td>آزمون 2</td>'.'<td>100.00</td>'.'<td>62.75</td>'.'</tr>';
                $tempText .= '<tr>'.'<td>ai_140302</td>'.'<td>student_02</td>'.'<td>آزمون 2</td>'.'<td>100.00</td>'.'<td>23.00</td>'.'</tr>';
                $tempText .= '<tr>'.'<td>ai_140302</td>'.'<td>student_03</td>'.'<td>آزمون 2</td>'.'<td>100.00</td>'.'<td>44.50</td>'.'</tr>';
                $tempText .= '<tr>'.'<td>ai_140302</td>'.'<td>student_04</td>'.'<td>آزمون 2</td>'.'<td>100.00</td>'.'<td>90.75</td>'.'</tr>';

                $tempText .= "\t".'</table><br>'.PHP_EOL.'<h3 style="font-weight: normal">بالاترین نمره: 55.25</h3><br>';
            }
            $tempText .= PHP_EOL.'</div>'.'<br>';
        }
        else {
            if ($user === 'user') {
                $tempText .= '<div id="div_class">'.PHP_EOL.
                    "\t".'<h3 class="main_title">نمرات فراگیران در مقابل متوسط نمره در دوره های sample_teacher</h3>'.PHP_EOL;

                if ($plot === 'bar') {
                    $chart = (new ChartJS_Bar(['student1', 'student2', 'student3', 'student4', 'متوسط نمره'], [6.50, 7.75, 5.00, 2.25, 5.375], 'آزمون 1', 'نمرات فراگیران در آزمون 1 در مقابل متوسط نمره در دوره database_140302 با حداکثر نمره 10.00'))->renderChart();
                    $tempText .= $chart;


                    $chart = (new ChartJS_Bar(['student1', 'student2', 'student3', 'student4', 'student5', 'student6', 'متوسط نمره'], [16.50, 15.75, 13.25, 18.25, 14.50, 13.00, 15.20], 'تکلیف 1', 'نمرات فراگیران در تکلیف 1 در مقابل متوسط نمره در دوره algorithm_140302 با حداکثر نمره 20.00'))->renderChart();
                    $tempText .= $chart;
                }
                else if ($plot === 'pie' || $plot === 'doughnut') {
                    $isDoughnut = $plot === 'doughnut';

                    $chart = (new ChartJS_Pie(['student1', 'student2', 'student3', 'student4', 'متوسط نمره'], [6.50, 7.75, 5.00, 2.25, 5.375], 'آزمون 1', 'نمرات فراگیران در آزمون 1 در مقابل متوسط نمره در دوره database_140302 با حداکثر نمره 10.00', $isDoughnut))->renderChart();
                    $tempText .= $chart;


                    $chart = (new ChartJS_Pie(['student1', 'student2', 'student3', 'student4', 'student5', 'student6', 'متوسط نمره'], [16.50, 15.75, 13.25, 18.25, 14.50, 13.00, 15.20], 'تکلیف 1', 'نمرات فراگیران در تکلیف 1 در مقابل متوسط نمره در دوره algorithm_140302 با حداکثر نمره 20.00', $isDoughnut))->renderChart();
                    $tempText .= $chart;
                }
                else if (strpos($plot, 'line') >= 0) {
                    $isSmooth = $plot === 'line_smooth';

                    $chart = (new ChartJS_Line(['student1', 'student2', 'student3', 'student4', 'متوسط نمره'], [6.50, 7.75, 5.00, 2.25, 5.375], 'آزمون 1', 'نمرات فراگیران در آزمون 1 در مقابل متوسط نمره در دوره database_140302 با حداکثر نمره 10.00', $isSmooth))->renderChart();
                    $tempText .= $chart;


                    $chart = (new ChartJS_Line(['student1', 'student2', 'student3', 'student4', 'student5', 'student6', 'متوسط نمره'], [16.50, 15.75, 13.25, 18.25, 14.50, 13.00, 15.20], 'تکلیف 1', 'نمرات فراگیران در تکلیف 1 در مقابل متوسط نمره در دوره algorithm_140302 با حداکثر نمره 20.00', $isSmooth))->renderChart();
                    $tempText .= $chart;
                }
            }
            else {
                $tempText .= '<div id="div_class">'.PHP_EOL.
                    "\t".'<h3 class="main_title">نمرات فراگیران در مقابل متوسط نمره در تمام دوره ها</h3>'.PHP_EOL;


                if ($plot === 'bar') {
                    $chart = (new ChartJS_Bar(['student1', 'student2', 'student3', 'student4', 'متوسط نمره'], [6.50, 8.75, 5.00, 2.25, 5.625], 'آزمون 1', 'نمرات فراگیران در آزمون 1 در مقابل متوسط نمره در دوره database_140302 با حداکثر نمره 10.00'))->renderChart();
                    $tempText .= $chart;


                    $chart = (new ChartJS_Bar(['student1', 'student2', 'student3', 'student4', 'student5', 'student6', 'متوسط نمره'], [16.50, 15.75, 13.25, 18.25, 14.50, 13.00, 15.2], 'تکلیف 1', 'نمرات فراگیران در تکلیف 1 در مقابل متوسط نمره در دوره algorithm_140302 با حداکثر نمره 20.00'))->renderChart();
                    $tempText .= $chart;

                    $chart = (new ChartJS_Bar(['student01', 'student02', 'student03', 'student04', 'student05', 'student06', 'student07', 'متوسط نمره'], [12.50, 11.00, 10.5, 18.50, 15.5, 14.75, 16.25, 14.14], 'تکلیف 1', 'نمرات فراگیران در تکلیف 1 در مقابل متوسط نمره در دوره az_database_140302 با حداکثر نمره 20.00'))->renderChart();
                    $tempText .= $chart;

                    $chart = (new ChartJS_Bar(['student_01', 'student_02', 'student_03', 'student_04', 'student_05', 'متوسط نمره'], [65.00, 74.25, 50.00, 43.25, 67.25, 59.95], 'کوییز 1', 'نمرات فراگیران در کوییز 1 در مقابل متوسط نمره در دوره operating_systems_140302 با حداکثر نمره 100.00'))->renderChart();
                    $tempText .= $chart;
                }
                else if ($plot === 'pie' || $plot === 'doughnut') {
                    $isDoughnut = $plot === 'doughnut';

                    $chart = (new ChartJS_Pie(['student1', 'student2', 'student3', 'student4', 'متوسط نمره'], [6.50, 8.75, 5.00, 2.25, 5.625], 'آزمون 1', 'نمرات فراگیران در آزمون 1 در مقابل متوسط نمره در دوره database_140302 با حداکثر نمره 10.00', $isDoughnut))->renderChart();
                    $tempText .= $chart;


                    $chart = (new ChartJS_Pie(['student1', 'student2', 'student3', 'student4', 'student5', 'student6', 'متوسط نمره'], [16.50, 15.75, 13.25, 18.25, 14.50, 13.00, 15.2], 'تکلیف 1', 'نمرات فراگیران در تکلیف 1 در مقابل متوسط نمره در دوره algorithm_140302 با حداکثر نمره 20.00', $isDoughnut))->renderChart();
                    $tempText .= $chart;

                    $chart = (new ChartJS_Pie(['student01', 'student02', 'student03', 'student04', 'student05', 'student06', 'student07', 'متوسط نمره'], [12.50, 11.00, 10.5, 18.50, 15.5, 14.75, 16.25, 14.14], 'تکلیف 1', 'نمرات فراگیران در تکلیف 1 در مقابل متوسط نمره در دوره az_database_140302 با حداکثر نمره 20.00', $isDoughnut))->renderChart();
                    $tempText .= $chart;

                    $chart = (new ChartJS_Pie(['student_01', 'student_02', 'student_03', 'student_04', 'student_05', 'متوسط نمره'], [65.00, 74.25, 50.00, 43.25, 67.25, 59.95], 'کوییز 1', 'نمرات فراگیران در کوییز 1 در مقابل متوسط نمره در دوره operating_systems_140302 با حداکثر نمره 100.00', $isDoughnut))->renderChart();
                    $tempText .= $chart;
                }
                else if (strpos($plot, 'line') >= 0) {
                    $isSmooth = $plot === 'line_smooth';

                    $chart = (new ChartJS_Line(['student1', 'student2', 'student3', 'student4', 'متوسط نمره'], [6.50, 8.75, 5.00, 2.25, 5.625], 'آزمون 1', 'نمرات فراگیران در آزمون 1 در مقابل متوسط نمره در دوره database_140302 با حداکثر نمره 10.00', $isSmooth))->renderChart();
                    $tempText .= $chart;


                    $chart = (new ChartJS_Line(['student1', 'student2', 'student3', 'student4', 'student5', 'student6', 'متوسط نمره'], [16.50, 15.75, 13.25, 18.25, 14.50, 13.00, 15.2], 'تکلیف 1', 'نمرات فراگیران در تکلیف 1 در مقابل متوسط نمره در دوره algorithm_140302 با حداکثر نمره 20.00', $isSmooth))->renderChart();
                    $tempText .= $chart;

                    $chart = (new ChartJS_Line(['student01', 'student02', 'student03', 'student04', 'student05', 'student06', 'student07', 'متوسط نمره'], [12.50, 11.00, 10.5, 18.50, 15.5, 14.75, 16.25, 14.14], 'تکلیف 1', 'نمرات فراگیران در تکلیف 1 در مقابل متوسط نمره در دوره az_database_140302 با حداکثر نمره 20.00', $isSmooth))->renderChart();
                    $tempText .= $chart;

                    $chart = (new ChartJS_Line(['student_01', 'student_02', 'student_03', 'student_04', 'student_05', 'متوسط نمره'], [65.00, 74.25, 50.00, 43.25, 67.25, 59.95], 'کوییز 1', 'نمرات فراگیران در کوییز 1 در مقابل متوسط نمره در دوره operating_systems_140302 با حداکثر نمره 100.00', $isSmooth))->renderChart();
                    $tempText .= $chart;
                }
            }
            $tempText .= "\t".PHP_EOL.'</div>'.'<br>';
        }
        return $tempText;

	}
    public function student_active_students ($user, $plot): string
    {
        $tempText = '';

        if ($plot === 'table') {
            if ($user === 'user') {
                $tempText .= '<div id="div_class">'.PHP_EOL.
                    "\t".'<h3 class="main_title">درصد و تعداد فراگیران فعال در انجمن در دوره های sample_teacher</h3>'.PHP_EOL. "\t".'<table class="data-table">'.PHP_EOL."\t\t".'<tr>'.PHP_EOL."\t\t".'<th>نام دوره</th>'.PHP_EOL."\t\t".'<th>نام انجمن</th>'.PHP_EOL."\t\t".'<th>تعداد فراگیران</th>'.PHP_EOL."\t\t".'<th>تعداد فراگیران فعال</th>'.'<th>درصد</th>'.PHP_EOL."\t\t"."\t\t".'</tr>';

                $tempText .= '<tr>'.'<td>database_140302</td>'.'<td>انجمن دوره پایگاه داده 140302</td>'.'<td>10</td>'.'<td>2</td>'.'<td>20.00%</td>'.'</tr>';
                $tempText .= '<tr>'.'<td>operating_system_140302</td>'.'<td>انجمن دوره سیستم عامل 140302</td>'.'<td>15</td>'.'<td>5</td>'.'<td>33.34%</td>'.'</tr>';
            }
            else {
                $tempText .= '<div id="div_class">'.PHP_EOL.
                    "\t".'<h3 class="main_title">درصد و تعداد فراگیران فعال در انجمن در تمام دوره ها </h3>'.PHP_EOL. "\t".'<table class="data-table">'.PHP_EOL."\t\t".'<tr>'.PHP_EOL."\t\t".'<th>نام دوره</th>'.PHP_EOL."\t\t".'<th>نام انجمن</th>'.PHP_EOL."\t\t".'<th>تعداد فراگیران</th>'.PHP_EOL."\t\t".'<th>تعداد فراگیران فعال</th>'.'<th>درصد</th>'.PHP_EOL."\t\t"."\t\t".'</tr>';

                $tempText .= '<tr>'.'<td>software_engineering_140302</td>'.'<td>انجمن دوره مهندسی نرم افزار 140302</td>'.'<td>20</td>'.'<td>10</td>'.'<td>50.00%</td>'.'</tr>';
                $tempText .= '<tr>'.'<td>az_database_140302</td>'.'<td>انجمن دوره آز پایگاه داده 140302</td>'.'<td>20</td>'.'<td>5</td>'.'<td>25.00%</td>'.'</tr>';

                $tempText .= '<tr>'.'<td>database_140302</td>'.'<td>انجمن دوره پایگاه داده 140302</td>'.'<td>10</td>'.'<td>2</td>'.'<td>20.00%</td>'.'</tr>';
                $tempText .= '<tr>'.'<td>operating_system_140302</td>'.'<td>انجمن دوره سیستم عامل 140302</td>'.'<td>15</td>'.'<td>5</td>'.'<td>33.34%</td>'.'</tr>';
            }
            $tempText .= "\t".'</table>'.PHP_EOL.'</div>'.'<br>';
        }
        else {
            if ($user === 'user') {
                $tempText .= '<div id="div_class">'.PHP_EOL.
                    "\t".'<h3 class="main_title">درصد و تعداد فراگیران فعال در انجمن در دوره های sample_teacher</h3>'.PHP_EOL;

                if ($plot === 'bar') {
                    $chart = (new ChartJS_Bar(['database_140302 (10)', 'ai_140302 (4)', 'compiler_140302 (6)'], [50, 20, 30], 'درصد و تعداد فراگیران فعال در انجمن', 'درصد و تعداد فراگیران فعال در دوره های sample_teacher'))->renderChart();
                    $tempText .= $chart;
                }
                else if ($plot === 'pie' || $plot === 'doughnut') {
                    $isDoughnut = $plot === 'doughnut';

                    $chart = (new ChartJS_Pie(['database_140302 (10)', 'ai_140302 (4)', 'compiler_140302 (6)'], [50, 20, 30], 'درصد و تعداد فراگیران فعال در انجمن', 'درصد و تعداد فراگیران فعال در دوره های sample_teacher', $isDoughnut))->renderChart();
                    $tempText .= $chart;
                }
                else if (strpos($plot, 'line') >= 0) {
                    $isSmooth = $plot === 'line_smooth';

                    $chart = (new ChartJS_Line(['database_140302 (10)', 'ai_140302 (4)', 'compiler_140302 (6)'], [50, 20, 30], 'درصد و تعداد فراگیران فعال در انجمن', 'درصد و تعداد فراگیران فعال در دوره های sample_teacher', $isSmooth))->renderChart();
                    $tempText .= $chart;
                }
            }
            else {
                $tempText .= '<div id="div_class">'.PHP_EOL.
                    "\t".'<h3 class="main_title">درصد و تعداد فراگیران فعال در انجمن در تمام دوره ها</h3>'.PHP_EOL;

                if ($plot === 'bar') {
                    $chart = (new ChartJS_Bar(['database (10)', 'ai (4)', 'compiler (6)', 'os (5)', 'algorithm (6)', 'programming (2)'], [50, 20, 30, 50, 60, 10], 'درصد و تعداد فراگیران فعال در انجمن', 'درصد و تعداد فراگیران فعال در تمام دوره ها'))->renderChart();
                    $tempText .= $chart;
                }
                else if ($plot === 'pie' || $plot === 'doughnut') {
                    $isDoughnut = $plot === 'doughnut';

                    $chart = (new ChartJS_Pie(['database (10)', 'ai (4)', 'compiler (6)', 'os (5)', 'algorithm (6)', 'programming (2)'], [50, 20, 30, 50, 60, 10], 'درصد و تعداد فراگیران فعال در انجمن', 'درصد و تعداد فراگیران فعال در تمام دوره ها', $isDoughnut))->renderChart();
                    $tempText .= $chart;
                }
                else if (strpos($plot, 'line') >= 0) {
                    $isSmooth = $plot === 'line_smooth';

                    $chart = (new ChartJS_Line(['database (10)', 'ai (4)', 'compiler (6)', 'os (5)', 'algorithm (6)', 'programming (2)'], [50, 20, 30, 50, 60, 10], 'درصد و تعداد فراگیران فعال در انجمن', 'درصد و تعداد فراگیران فعال در تمام دوره ها', $isSmooth))->renderChart();
                    $tempText .= $chart;
                }
            }
            $tempText .= "\t".PHP_EOL.'</div>'.'<br>';
        }
        return $tempText;

	}
    public function student_login_count ($user, $plot): string
    {
        $tempText = '';

        if ($plot === 'table') {
            if ($user === 'user') {
                $tempText .= '<div id="div_class">'.PHP_EOL.
                    "\t".'<h3 class="main_title">تعداد ورود فراگیران به محیط یادگیری در دوره های sample_teacher</h3>'.PHP_EOL. "\t".'<table class="data-table">'.PHP_EOL."\t\t".'<tr>'.PHP_EOL."\t\t".'<th>نام دوره</th>'.PHP_EOL."\t\t".'<th>تعداد فراگیران</th>'.PHP_EOL."\t\t".'<th>تعداد ورود</th>'.'<th>میانگین دوره</th>'.PHP_EOL."\t\t"."\t\t".'</tr>';

                $tempText .= '<tr>'.'<td>system_validation_140302</td>'.'<td>20</td>'.'<td>54</td>'.'<td>2.70</td>'.'</tr>';
                $tempText .= '<tr>'.'<td>logical_circuits_140302</td>'.'<td>25</td>'.'<td>78</td>'.'<td>3.12</td>'.'</tr>';

            }
            else {
                $tempText .= '<div id="div_class">'.PHP_EOL.
                    "\t".'<h3 class="main_title">تعداد ورود فراگیران به محیط یادگیری برای تمام دوره ها</h3>'.PHP_EOL. "\t".'<table class="data-table">'.PHP_EOL."\t\t".'<tr>'.PHP_EOL."\t\t".'<th>نام دوره</th>'.PHP_EOL."\t\t".'<th>تعداد فراگیران</th>'.PHP_EOL."\t\t".'<th>تعداد ورود</th>'.'<th>میانگین دوره</th>'.PHP_EOL."\t\t"."\t\t".'</tr>';

                $tempText .= '<tr>'.'<td>operating_systems_140302</td>'.'<td>18</td>'.'<td>49</td>'.'<td>2.72</td>'.'</tr>';
                $tempText .= '<tr>'.'<td>compiler_140302</td>'.'<td>25</td>'.'<td>83</td>'.'<td>3.32</td>'.'</tr>';
                $tempText .= '<tr>'.'<td>algorithm_design_140302</td>'.'<td>25</td>'.'<td>90</td>'.'<td>3.6</td>'.'</tr>';

                $tempText .= '<tr>'.'<td>system_validation_140302</td>'.'<td>20</td>'.'<td>54</td>'.'<td>2.70</td>'.'</tr>';
                $tempText .= '<tr>'.'<td>logical_circuits_140302</td>'.'<td>25</td>'.'<td>78</td>'.'<td>3.12</td>'.'</tr>';
            }
            $tempText .= "\t".'</table>'.PHP_EOL.'</div>'.'<br>';
        }
        else {
            if ($user === 'user') {
                $tempText .= '<div id="div_class">'.PHP_EOL.
                    "\t".'<h3 class="main_title">تعداد ورود فراگیران به محیط یادگیری در دوره های sample_teacher</h3>'.PHP_EOL;

                if ($plot === 'bar') {
                    $chart = (new ChartJS_Bar(['algorithm_design_140302', 'database_140302', 'compiler_140302'], [35, 52, 47], 'تعداد ورود فراگیران به محیط یادگیری', ' تعداد ورود فراگیران به محیط یادگیری در دوره های sample_teacher'));
                    $series1 = $chart->renderChart(false);

                    $series1->addDataset(
                        [
                            'data' => [12, 15.5, 17],
                            'backgroundColor' => '#f38400',
                            'borderColor' => '#f38400',
                            'label' => 'میانگین ورود فراگیران به محیط یادگیری'
                        ]
                    );
                    $chartData = $series1->renderCanvas();
                    $tempText .= $chartData;
                }
                else if ($plot === 'pie' || $plot === 'doughnut') {
                    $isDoughnut = $plot === 'doughnut';

                    $chart = (new ChartJS_Pie(['algorithm_design_140302', 'database_140302', 'compiler_140302'], [35, 52, 47], 'تعداد ورود فراگیران به محیط یادگیری', ' تعداد ورود فراگیران به محیط یادگیری در دوره های sample_teacher', $isDoughnut))->renderChart();

                    $tempText .= $chart;

                    $chart = (new ChartJS_Pie(['algorithm_design_140302', 'database_140302', 'compiler_140302'], [12, 15.5, 17], 'میانگین تعداد ورود فراگیران به محیط یادگیری', ' میانگین تعداد ورود فراگیران به محیط یادگیری در دوره های sample_teacher', $isDoughnut))->renderChart();

                    $tempText .= $chart;
                }
                else if (strpos($plot, 'line') >= 0) {
                    $isSmooth = $plot === 'line_smooth';

                    $chart = (new ChartJS_Line(['algorithm_design_140302', 'database_140302', 'compiler_140302'], [35, 52, 47], 'تعداد ورود فراگیران به محیط یادگیری', ' تعداد ورود فراگیران به محیط یادگیری در دوره های sample_teacher', $isSmooth));
                    $series1 = $chart->renderChart(false);

                    $series1->addDataset(
                        [
                            'data' => [12, 15.5, 17],
                            'backgroundColor' => '#f38400',
                            'borderColor' => '#f38400',
                            'label' => 'میانگین ورود فراگیران به محیط یادگیری',
                            'fill' => false,
                            'tension' => ($isSmooth) ? 0.3 : 0,
                        ]
                    );
                    $chartData = $series1->renderCanvas();
                    $tempText .= $chartData;
                }
            }
            else {
                $tempText .= '<div id="div_class">'.PHP_EOL.
                    "\t".'<h3 class="main_title">تعداد ورود فراگیران به محیط یادگیری در تمام دوره ها</h3>'.PHP_EOL;

                if ($plot === 'bar') {
                    $chart = (new ChartJS_Bar(['algorithm_design', 'database', 'compiler', 'az_database', 'az_os', 'big_data'], [35, 52, 47, 56, 38, 63], 'تعداد ورود فراگیران به محیط یادگیری', ' تعداد ورود فراگیران به محیط یادگیری در تمام دوره ها'));
                    $series1 = $chart->renderChart(false);

                    $series1->addDataset(
                        [
                            'data' => [12, 15.5, 17, 16, 13.4, 15],
                            'backgroundColor' => '#f38400',
                            'borderColor' => '#f38400',
                            'label' => 'میانگین ورود فراگیران به محیط یادگیری'
                        ]
                    );
                    $chartData = $series1->renderCanvas();
                    $tempText .= $chartData;
                }
                else if ($plot === 'pie' || $plot === 'doughnut') {
                    $isDoughnut = $plot === 'doughnut';

                    $chart = (new ChartJS_Pie(['algorithm_design', 'database', 'compiler', 'az_database', 'az_os', 'big_data'], [35, 52, 47, 56, 38, 63], 'تعداد ورود فراگیران به محیط یادگیری', ' تعداد ورود فراگیران به محیط یادگیری در تمام دوره ها', $isDoughnut))->renderChart();
                    $tempText .= $chart;


                    $chart = (new ChartJS_Pie(['algorithm_design', 'database', 'compiler', 'az_database', 'az_os', 'big_data'], [12, 15.5, 18, 16, 13.4, 15], 'میانگین تعداد ورود فراگیران به محیط یادگیری', ' میانگین تعداد ورود فراگیران به محیط یادگیری در تمام دوره ها', $isDoughnut))->renderChart();
                    $tempText .= $chart;

                }
                else if (strpos($plot, 'line') >= 0) {
                    $isSmooth = $plot === 'line_smooth';

                    $chart = (new ChartJS_Line(['algorithm_design', 'database', 'compiler', 'az_database', 'az_os', 'big_data'], [35, 52, 47, 56, 38, 63], 'تعداد ورود فراگیران به محیط یادگیری', ' تعداد ورود فراگیران به محیط یادگیری در تمام دوره ها', $isSmooth));
                    $series1 = $chart->renderChart(false);

                    $series1->addDataset(
                        [
                            'data' => [12, 15.5, 18, 16, 13.4, 15],
                            'backgroundColor' => '#f38400',
                            'borderColor' => '#f38400',
                            'label' => 'میانگین ورود فراگیران به محیط یادگیری',
                            'fill' => false,
                            'tension' => ($isSmooth) ? 0.3 : 0,
                        ]
                    );
                    $chartData = $series1->renderCanvas();
                    $tempText .= $chartData;
                }
            }
            $tempText .= "\t".PHP_EOL.'</div>'.'<br>';
        }
        return $tempText;

	}

}

?>