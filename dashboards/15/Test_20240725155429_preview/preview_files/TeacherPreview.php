<?php

require_once '../../../models/ChartJS_Bar.php';
require_once '../../../models/ChartJS_Pie.php';
require_once '../../../models/ChartJS_Line.php';
use Models\ChartJS_Bar;
use Models\ChartJS_Pie;
use Models\ChartJS_Line;

class TeacherPreview {

    public function teacher_uploaded_content ($user, $plot, $timeGrouping): string
    {

        $tempText = '';

        if ($plot === 'table') {

            if ($user === 'user') {
                $tempText .= '<div id="div_class">'.PHP_EOL.
                    "\t".'<h3 class="main_title">تعداد فایل های بارگذاری شده sample_teacher</h3>'.PHP_EOL.
                    "\t".'<table class="data-table">'.PHP_EOL."\t\t".'<tr>'.PHP_EOL.
                    "\t\t".'<th>نام درس</th>'.PHP_EOL."\t\t".'<th>تعداد فایل ها</th>'.PHP_EOL."\t\t".'</tr>';

                $tempText .= '<tr>'.'<td>database_140301</td>'.'<td>2</td>'.'</tr>';
                $tempText .= '<tr>'.'<td>algorithm_design_140301</td>'.'<td>4</td>'.'</tr>';

            } else {
                $tempText .= '<div id="div_class">'.PHP_EOL.
                    "\t".'<h3 class="main_title">تعداد فایل های بارگذاری شده مدرسان</h3>'.PHP_EOL.
                    "\t".'<table class="data-table">'.PHP_EOL."\t\t".'<tr>'.PHP_EOL."\t\t".'<th>نام درس</th>'
                    .PHP_EOL."\t\t".'<th>نام کاربری مدرس</th>'.PHP_EOL."\t\t".'<th>تعداد فایل ها</th>'.PHP_EOL."\t\t".'</tr>';

                $tempText .= '<tr>'.'<td>artificial_intelijence_140301</td>'.'<td>sample_teacher1</td>'.'<td>5</td>'.'</tr>';
                $tempText .= '<tr>'.'<td>database_140301</td>'.'<td>sample_teacher</td>'.'<td>2</td>'.'</tr>';
                $tempText .= '<tr>'.'<td>algorithm_design_140301</td>'.'<td>sample_teacher</td>'.'<td>4</td>'.'</tr>';
                $tempText .= '<tr>'.'<td>operating_system_140301</td>'.'<td>sample_teacher2</td>'.'<td>6</td>'.'</tr>';
                $tempText .= '<tr>'.'<td>compiler_140301</td>'.'<td>new_teacher3</td>'.'<td>2</td>'.'</tr>';
            }
            $tempText .= "\t".'</table>'.PHP_EOL.'</div>'.'<br>';
        }
        else {
            $timeText = 'روزانه';
            if ($timeGrouping === 'weekly') $timeText = 'هفتگی';

            if ($user === 'user') {
                $tempText .= '<div id="div_class">'.PHP_EOL.
                    "\t".'<h3 class="main_title">تعداد فایل های بارگذاری شده sample_teacher به صورت '.$timeText.'</h3>';

                if ($plot === 'bar') {
                    if ($timeGrouping === 'daily') {
                        $bar1 = new ChartJS_Bar(['94', '117', '138', '143'], [1, 2, 1, 1], 'database_140301', 'تعداد فایل های بارگذاری شده sample_teacher');
                        $chart1 = $bar1->renderChart();
                        $tempText .= $chart1;


                        $bar2 = new ChartJS_Bar(['122', '138'], [1, 2], 'compiler_140301', 'تعداد فایل های بارگذاری شده sample_teacher');
                        $chart2 = $bar2->renderChart();
                        $tempText .= $chart2;
                    }
                    else {
                        $bar1 = new ChartJS_Bar(['13', '16', '19', '20'], [1, 2, 1, 1], 'database_140301', 'تعداد فایل های بارگذاری شده sample_teacher');
                        $chart1 = $bar1->renderChart();
                        $tempText .= $chart1;


                        $bar2 = new ChartJS_Bar(['17', '19'], [1, 3], 'compiler_140301', 'تعداد فایل های بارگذاری شده sample_teacher');
                        $chart2 = $bar2->renderChart();
                        $tempText .= $chart2;
                    }
                }
                else if ($plot === 'pie' || $plot === 'doughnut') {
                    $isDoughnut = ($plot === 'doughnut')? true : false;

                    if ($timeGrouping === 'daily') {
                        $pie1 = new ChartJS_Pie(['94', '117', '138', '143', '145', '146'], [1, 2, 1, 1, 3, 2], 'database_140301', 'تعداد فایل های بارگذاری شده sample_teacher در دوره database_140301', $isDoughnut);
                        $chart1 = $pie1->renderChart();
                        $tempText .= $chart1;


                        $pie2 = new ChartJS_Pie(['122', '138'], [1, 2], 'ai_140301', 'تعداد فایل های بارگذاری شده sample_teacher در دوره ai_140301', $isDoughnut);
                        $chart2 = $pie2->renderChart();
                        $tempText .= $chart2;
                    }
                    else {
                        $pie1 = new ChartJS_Pie(['13', '16', '19', '20', '21'], [1, 2, 1, 1, 3], 'compiler_140301', 'تعداد فایل های بارگذاری شده sample_teacher در دوره compiler_140301', $isDoughnut);
                        $chart1 = $pie1->renderChart();
                        $tempText .= $chart1;


                        $pie2 = new ChartJS_Pie(['17', '19'], [1, 2], 'ai_140301', 'تعداد فایل های بارگذاری شده sample_teacher در دوره ai_140301', $isDoughnut);
                        $chart2 = $pie2->renderChart();
                        $tempText .= $chart2;
                    }
                }
                else if (strpos($plot, 'line') >= 0) {
                    $isSmooth = ($plot === 'line_smooth');

                    if ($timeGrouping === 'daily') {
                        $chart1 = (new ChartJS_Line(['94', '117', '138', '143', '144', '146'], [1, 2, 1, 1, 3, 2], 'database_140301', 'تعداد فایل های بارگذاری شده sample_teacher', $isSmooth))->renderChart();
                        $tempText .= $chart1;

                        $chart2 = (new ChartJS_Line(['136', '138', '139'], [1, 2, 1], 'compiler_140301', 'تعداد فایل های بارگذاری شده sample_teacher', $isSmooth))->renderChart();
                        $tempText .= $chart2;
                    }
                    else {

                        $chart1 = (new ChartJS_Line(['11', '13', '14', '15'], [3, 4, 1, 2], 'database_140301', 'تعداد فایل های بارگذاری شده sample_teacher', $isSmooth))->renderChart();
                        $tempText .= $chart1;

                        $chart2 = (new ChartJS_Line(['13', '15', '16'], [2, 3, 1], 'compiler_140301', 'تعداد فایل های بارگذاری شده sample_teacher', $isSmooth))->renderChart();
                        $tempText .= $chart2;
                    }
                }
            }
            else {
                $tempText .= '<div id="div_class">'.PHP_EOL.
                    "\t".'<h3 class="main_title">تعداد فایل های بارگذاری شده مدرسان به صورت '.$timeText.'</h3>';

                if ($plot === 'bar') {
                    if ($timeGrouping === 'daily') {
                        $bar0 = new ChartJS_Bar(['98', '112', '114', '120'], [2, 2, 1, 3], 'operating_system_140301', 'تعداد فایل های بارگذاری شده teacher2');
                        $chart0 = $bar0->renderChart();
                        $tempText .= $chart0;

                        $bar1 = new ChartJS_Bar(['94', '117', '138', '143'], [1, 2, 1, 1], 'database_140301', 'تعداد فایل های بارگذاری شده sample_teacher');
                        $chart1 = $bar1->renderChart();
                        $tempText .= $chart1;


                        $bar2 = new ChartJS_Bar(['122', '138'], [1, 2], 'compiler_140301', 'تعداد فایل های بارگذاری شده sample_teacher');
                        $chart2 = $bar2->renderChart();
                        $tempText .= $chart2;
                    }
                    else {
                        $bar0 = new ChartJS_Bar(['12', '18', '21', '24'], [2, 4, 1, 3], 'operating_system_140301', 'تعداد فایل های بارگذاری شده sample_teacher1');
                        $chart0 = $bar0->renderChart();
                        $tempText .= $chart0;


                        $bar1 = new ChartJS_Bar(['13', '16', '19', '20'], [1, 2, 1, 1], 'database_140301', 'تعداد فایل های بارگذاری شده sample_teacher');
                        $chart1 = $bar1->renderChart();
                        $tempText .= $chart1;


                        $bar2 = new ChartJS_Bar(['17', '19'], [1, 3], 'compiler_140301', 'تعداد فایل های بارگذاری شده sample_teacher');
                        $chart2 = $bar2->renderChart();
                        $tempText .= $chart2;
                    }
                }
                else if ($plot === 'pie' || $plot === 'doughnut') {
                    $isDoughnut = ($plot === 'doughnut')? true : false;

                    if ($timeGrouping === 'daily') {
                        $pie0 = new ChartJS_Pie(['98', '112', '114', '120', '121'], [2, 2, 1, 3, 1], 'operating_system_140301', 'تعداد فایل های بارگذاری شده new_teacher2 در دوره operating_system_140301', $isDoughnut);
                        $chart0 = $pie0->renderChart();
                        $tempText .= $chart0;

                        $pie1 = new ChartJS_Pie(['94', '117', '138', '143', '145', '146'], [1, 2, 1, 1, 3, 2], 'database_140301', 'تعداد فایل های بارگذاری شده sample_teacher در دوره database_140301', $isDoughnut);
                        $chart1 = $pie1->renderChart();
                        $tempText .= $chart1;


                        $pie2 = new ChartJS_Pie(['122', '138'], [1, 2], 'ai_140301', 'تعداد فایل های بارگذاری شده sample_teacher در دوره ai_140301', $isDoughnut);
                        $chart2 = $pie2->renderChart();
                        $tempText .= $chart2;
                    }
                    else {
                        $pie0 = new ChartJS_Pie(['15', '16', '19', '24'], [2, 1, 1, 4], 'operating_system_140301', 'تعداد فایل های بارگذاری شده new_teacher2 در دوره operating_system_140301', $isDoughnut);
                        $chart0 = $pie0->renderChart();
                        $tempText .= $chart0;

                        $pie1 = new ChartJS_Pie(['13', '16', '19', '20', '21'], [1, 2, 1, 1, 3], 'compiler_140301', 'تعداد فایل های بارگذاری شده sample_teacher در دوره compiler_140301', $isDoughnut);
                        $chart1 = $pie1->renderChart();
                        $tempText .= $chart1;


                        $pie2 = new ChartJS_Pie(['17', '19'], [1, 2], 'ai_140301', 'تعداد فایل های بارگذاری شده sample_teacher در دوره ai_140301', $isDoughnut);
                        $chart2 = $pie2->renderChart();
                        $tempText .= $chart2;
                    }
                }
                else if (strpos($plot, 'line') >= 0) {
                    $isSmooth = ($plot === 'line_smooth');

                    if ($timeGrouping === 'daily') {
                        $chart1 = (new ChartJS_Line(['98', '112', '114', '120'], [2, 2, 1, 3], 'database_140301', 'تعداد فایل های بارگذاری شده teacher3', $isSmooth))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Line(['94', '117', '138', '143', '144', '146'], [1, 2, 1, 1, 3, 2], 'database_140301', 'تعداد فایل های بارگذاری شده teacher1', $isSmooth))->renderChart();
                        $tempText .= $chart1;

                        $chart2 = (new ChartJS_Line(['136', '138', '139'], [1, 2, 1], 'compiler_140301', 'تعداد فایل های بارگذاری شده teacher1', $isSmooth))->renderChart();
                        $tempText .= $chart2;
                    }
                    else {
                        $chart1 = (new ChartJS_Line(['15', '16', '19', '24'], [2, 1, 1, 4], 'operating_system_140301', 'تعداد فایل های بارگذاری شده teacher1', $isSmooth))->renderChart();
                        $tempText .= $chart1;


                        $chart1 = (new ChartJS_Line(['11', '13', '14', '15'], [3, 4, 1, 2], 'database_140301', 'تعداد فایل های بارگذاری شده sample_teacher2', $isSmooth))->renderChart();
                        $tempText .= $chart1;

                        $chart2 = (new ChartJS_Line(['13', '15', '16'], [2, 3, 1], 'compiler_140301', 'تعداد فایل های بارگذاری شده sample_teacher2', $isSmooth))->renderChart();
                        $tempText .= $chart2;
                    }
                }
            }

            $tempText .= "\t\t".'</div>'.'<br>';
        }
        return $tempText;

	}
    public function teacher_time_response ($user, $plot, $group): string
    {
        $tempText = '';

        if ($plot === 'total') {
            if ($user === 'user')
            {
                $tempText .= '<div id="div_class">'.PHP_EOL.
                    "\t".'<h3 class="main_title">مدت زمان پاسخگویی sample_teacher به سوالات در انجمن (فروم)</h3>'.PHP_EOL."\t".'<table class="data-table">'.PHP_EOL."\t\t".'<th>نام دوره</th>'.PHP_EOL."\t\t".'<th>مدت زمان</th>'.PHP_EOL."\t\t".'</tr>';

                $tempText .= '<tr>'.'<td>database_140302</td>'.'<td>2 ساعت و 20 دقیقه</td>'.'</tr>';
                $tempText .= '<tr>'.'<td>az_os_140302</td>'.'<td>1 ساعت و 12 دقیقه</td>'.'</tr>';
                $tempText .= '<tr>'.'<td>compiler_140302</td>'.'<td>42 دقیقه</td>'.'</tr>';
            }
            else
            {
                $tempText .= '<div id="div_class">'.PHP_EOL.
                    "\t".'<h3 class="main_title">مدت زمان پاسخگویی تمام مدرسان به سوالات در انجمن (فروم)</h3>'.PHP_EOL.
                    "\t".'<table class="data-table">'.PHP_EOL."\t\t".'<tr>'.PHP_EOL."\t\t".'<th>نام مدرس</th>'.
                    PHP_EOL."\t\t".'<th>نام دوره</th>'.PHP_EOL."\t\t".'<th>مدت زمان پاسخ</th>'.PHP_EOL."\t\t".'</tr>';

                $tempText .= '<tr>'.'<td>new_teacher1</td>'.'<td>project_management_140302</td>'.'<td>27 دقیقه</td>'.'</tr>';
                $tempText .= '<tr>'.'<td>new_teacher2</td>'.'<td>software_engineering_140302</td>'.'<td>54 دقیقه</td>'.'</tr>';
                $tempText .= '<tr>'.'<td>sample_teacher</td>'.'<td>database_140302</td>'.'<td>2 ساعت و 20 دقیقه</td>'.'</tr>';
                $tempText .= '<tr>'.'<td>sample_teacher</td>'.'<td>az_os_140302</td>'.'<td>1 ساعت و 12 دقیقه</td>'.'</tr>';
                $tempText .= '<tr>'.'<td>sample_teacher</td>'.'<td>compiler_140302</td>'.'<td>42 دقیقه</td>'.'</tr>';
            }
            $tempText .= "\t".'</table>'.PHP_EOL.'</div>'."<br>";
        }
        else if ($plot === 'table') {
            if ($user === 'user')
            {
                $tempText .= '<div id="div_class">'.PHP_EOL.
                    "\t".'<h3 class="main_title">مدت زمان پاسخگویی sample_teacher به سوالات در انجمن (فروم)</h3>'.PHP_EOL.
                    "\t".'<table class="data-table">'.PHP_EOL."\t\t".'<tr>'.PHP_EOL."\t\t".'<th>عنوان پاسخ</th>'.PHP_EOL."\t\t".'<th>نام کاربری فراگیر</th>'.PHP_EOL."\t\t".'<th>نام دوره</th>'.PHP_EOL."\t\t".'<th>مدت زمان</th>'.PHP_EOL."\t\t".'</tr>';

                $tempText .= '<tr>'.'<td>عنوان پاسخ 1</td>'.'<td>sample_student1</td>'.'<td>compiler_140302</td>'.'<td>01:55:03</td>'.'</tr>';
                $tempText .= '<tr>'.'<td>عنوان پاسخ 1</td>'.'<td>sample_student2</td>'.'<td>compiler_140302</td>'.'<td>02:30:40</td>'.'</tr>';
                $tempText .= '<tr>'.'<td>عنوان پاسخ در درس مدریت پروژه 140302</td>'.'<td>new_student3</td>'.'<td>project_management_140302</td>'.'<td>00:12:30</td>'.'</tr>';
//                $tempText .= '<tr>'.'<td>عنوان پاسخ 2</td>'.'<td>sample_student1</td>'.'<td>algorithm_140302</td>'.'<td>00:25:03</td>'.'</tr>';
            }
            else {
                $tempText .= '<div id="div_class">'.PHP_EOL.
                    "\t".'<h3 class="main_title">مدت زمان پاسخگویی تمام مدرسان به سوالات در انجمن (فروم)</h3>'.PHP_EOL.
                    "\t".'<table class="data-table">'.PHP_EOL."\t\t".'<tr>'.PHP_EOL."\t\t".'<th>نام مدرس</th>'.
                    PHP_EOL."\t\t".'<th>عنوان پاسخ</th>'.PHP_EOL."\t\t".'<th>نام کاربری فراگیر</th>'.PHP_EOL."\t\t".'<th>نام دوره</th>'.PHP_EOL."\t\t".'<th>مدت زمان پاسخ</th>'.PHP_EOL."\t\t".'</tr>';

                $tempText .= '<tr>'.'<td>sample_teacher</td>'.'<td>عنوان پاسخ 1</td>'.'<td>sample_student1</td>'.'<td>compiler_140302</td>'.'<td>01:55:03</td>'.'</tr>';
                $tempText .= '<tr>'.'<td>sample_teacher</td>'.'<td>عنوان پاسخ 1</td>'.'<td>sample_student2</td>'.'<td>compiler_140302</td>'.'<td>02:30:40</td>'.'</tr>';
                $tempText .= '<tr>'.'<td>sample_teacher</td>'.'<td>عنوان پاسخ در دوره مدریت پروژه 140302</td>'.'<td>sample_student1</td>'.'<td>project_management_140302</td>'.'<td>00:12:30</td>'.'</tr>';
                $tempText .= '<tr>'.'<td>teacher2</td>'.'<td>عنوان پاسخ در دوره سیستم عامل 140302</td>'.'<td>student4</td>'.'<td>operating_system_140302</td>'.'<td>00:10:52</td>'.'</tr>';
                $tempText .= '<tr>'.'<td>teacher3</td>'.'<td>عنوان پاسخ دوره شبکه</td>'.'<td>new_student5</td>'.'<td>network_140302</td>'.'<td>03:02:37</td>'.'</tr>';
                $tempText .= '<tr>'.'<td>teacher3</td>'.'<td>عنوان پاسخ دوره رایانش امن</td>'.'<td>new_student5</td>'.'<td>iot_computing_140302</td>'.'<td>01:02:37</td>'.'</tr>';
            }
            $tempText .= "\t".'</table>'.PHP_EOL.'</div>'."<br>";
        }
        else {
            // charts
            $timeText = 'روزانه';
            if ($group === 'weekly') $timeText = 'هفتگی';

            if ($user === 'user') {
                $tempText .= '<div id="div_class">'.PHP_EOL.
                    "\t".'<h3 class="main_title">مدت زمان پاسخگویی sample_teacher_username به سوالات در انجمن (فروم) به صورت '.$timeText.'</h3>';

                if ($plot === 'bar') {
                    if ($group === 'daily') {
                        $chart1 = (new ChartJS_Bar(['78', '118', '123', '124', '130', '140'], [0.05, 0.3, 0.5, 0.75, 0.03, 0.16], 'iot_computing_140302', 'مدت زمان پاسخ sample_teacher_username'))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Bar(['94', '110', '122', '126'], [0.25, 0.17, 0.44, 0.05], 'network_140302', 'مدت زمان پاسخ sample_teacher_username'))->renderChart();
                        $tempText .= $chart1;
                    }
                    else
                    {
                        $chart1 = (new ChartJS_Bar(['13', '14', '15', '17', '18'], [0.45, 0.31, 1, 0.35, 0.12], 'iot_computing_140302', 'مدت زمان پاسخ sample_teacher_username'))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Bar(['11', '12', '13', '15'], [0.25, 0.87, 0.94, 0.75], 'network_140302', 'مدت زمان پاسخ sample_teacher_username'))->renderChart();
                        $tempText .= $chart1;
                    }
                }
                else if ($plot === 'pie' || $plot === 'doughnut') {
                    $isDoughnut = $plot === 'doughnut';

                    if ($group === 'daily') {
                        $chart1 = (new ChartJS_Pie(['78', '118', '123', '124', '130', '140'], [0.05, 0.3, 0.5, 0.75, 0.03, 0.16], 'iot_computing_140302', 'مدت زمان پاسخ sample_teacher_username در دوره iot_computing_140302', $isDoughnut))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Pie(['94', '110', '122', '126'], [0.25, 0.17, 0.44, 0.05], 'network_140302', 'مدت زمان پاسخ sample_teacher_username در دوره network_140302', $isDoughnut))->renderChart();
                        $tempText .= $chart1;
                    } else {
                        $chart1 = (new ChartJS_Pie(['13', '14', '15', '17', '18'], [0.45, 0.31, 1, 0.35, 0.12], 'iot_computing_140302', 'مدت زمان پاسخ sample_teacher_username در دوره iot_computing_140302', $isDoughnut))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Pie(['11', '12', '13', '15'], [0.25, 0.87, 0.94, 0.75], 'network_140302', 'مدت زمان پاسخ sample_teacher_username در دوره network_140302', $isDoughnut))->renderChart();
                        $tempText .= $chart1;
                    }
                }
                else if (strpos($plot, 'line') >= 0) {
                    $isSmooth = $plot === 'line_smooth';

                    if ($group === 'daily') {
                        $chart1 = (new ChartJS_Line(['78', '118', '123', '124', '130', '140'], [0.05, 0.3, 0.5, 0.75, 0.03, 0.16], 'iot_computing_140302', 'مدت زمان پاسخ sample_teacher_username', $isSmooth))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Line(['94', '110', '122', '126'], [0.25, 0.17, 0.44, 0.05], 'network_140302', 'مدت زمان پاسخ sample_teacher_username', $isSmooth))->renderChart();
                        $tempText .= $chart1;
                    } else {
                        $chart1 = (new ChartJS_Line(['13', '14', '15', '17', '18'], [0.45, 0.31, 1, 0.35, 0.12], 'iot_computing_140302', 'مدت زمان پاسخ sample_teacher_username', $isSmooth))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Line(['11', '12', '13', '15'], [0.25, 0.87, 0.94, 0.75], 'network_140302', 'مدت زمان پاسخ sample_teacher_username', $isSmooth))->renderChart();
                        $tempText .= $chart1;
                    }
                }
            }
            else {
                $tempText .= '<div id="div_class">'.PHP_EOL.
                    "\t".'<h3 class="main_title">مدت زمان پاسخگویی تمام مدرسان به سوالات در انجمن (فروم) به صورت '.$timeText.'</h3>';

                if ($plot === 'bar') {
                    if ($group === 'daily') {
                        $chart1 = (new ChartJS_Bar(['92', '111', '112', '118', '120', '122', '125'], [0.1, 0.27, 0.14, 0.35, 0.42, 0.29, 0.7], 'system_validation_verification_140302', 'مدت زمان پاسخ teacher2'))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Bar(['91', '110', '115', '117', '121', '123'], [0.15, 0.47, 0.34, 0.3, 0.02, 0.23], 'database_140302', 'مدت زمان پاسخ teacher3'))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Bar(['78', '118', '123', '124', '130', '140'], [0.05, 0.3, 0.5, 0.75, 0.03, 0.16], 'iot_computing_140302', 'مدت زمان پاسخ sample_teacher_username'))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Bar(['94', '110', '122', '126'], [0.25, 0.17, 0.44, 0.05], 'network_140302', 'مدت زمان پاسخ sample_teacher_username'))->renderChart();
                        $tempText .= $chart1;
                    }
                    else {
                        $chart1 = (new ChartJS_Bar(['11', '12', '14', '15', '16'], [0.7, 0.93, 0.6, 0.7, 0.4], 'system_validation_verification_140302', 'مدت زمان پاسخ teacher2'))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Bar(['12', '13', '14', '15', '17', '19'], [0.83, 0.49, 0.72, 0.36, 0.41, 0.43], 'database_140302', 'مدت زمان پاسخ teacher3'))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Bar(['13', '14', '15', '17', '18'], [0.65, 0.71, 1, 0.35, 0.22], 'iot_computing_140302', 'مدت زمان پاسخ sample_teacher_username'))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Bar(['11', '12', '14', '15'], [0.35, 0.7, 0.96, 0.78], 'network_140302', 'مدت زمان پاسخ sample_teacher_username'))->renderChart();
                        $tempText .= $chart1;
                    }
                }
                else if ($plot === 'pie' || $plot === 'doughnut') {
                    $isDoughnut = $plot === 'doughnut';

                    if ($group === 'daily') {
                        $chart1 = (new ChartJS_Pie(['92', '111', '115', '118', '120', '122', '125'], [0.1, 0.27, 0.14, 0.35, 0.42, 0.29, 0.7], 'system_validation_verification_140302', 'مدت زمان پاسخ teacher2 در دوره system_validation_verification_140302', $isDoughnut))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Pie(['91', '110', '115', '117', '121', '123'], [0.15, 0.47, 0.34, 0.3, 0.02, 0.23], 'database_140302', 'مدت زمان پاسخ teacher3 در دوره database_140302', $isDoughnut))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Pie(['78', '119', '123', '124', '136', '140'], [0.05, 0.3, 0.5, 0.75, 0.03, 0.16], 'iot_computing_140302', 'مدت زمان پاسخ sample_teacher_username در دوره iot_computing_140302', $isDoughnut))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Pie(['94', '110', '122', '127'], [0.25, 0.17, 0.44, 0.05], 'network_140302', 'مدت زمان پاسخ sample_teacher_username در دوره network_140302', $isDoughnut))->renderChart();
                        $tempText .= $chart1;
                    }
                    else {
                        $chart1 = (new ChartJS_Pie(['11', '12', '13', '15', '16'], [0.7, 0.93, 0.6, 0.7, 0.4], 'system_validation_verification_140302', 'مدت زمان پاسخ teacher2 در دوره system_validation_verification_140302', $isDoughnut))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Pie(['12', '13', '14', '15', '17', '19'], [0.83, 0.49, 0.72, 0.36, 0.41, 0.43], 'database_140302', 'مدت زمان پاسخ teacher3 در دوره database_140302', $isDoughnut))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Pie(['13', '14', '15', '17', '18'], [0.65, 0.71, 1, 0.35, 0.22], 'iot_computing_140302', 'مدت زمان پاسخ sample_teacher_username در دوره iot_computing_140302', $isDoughnut))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Pie(['11', '12', '14', '15'], [0.35, 0.7, 0.96, 0.78], 'network_140302', 'مدت زمان پاسخ sample_teacher_username در دوره network_140302', $isDoughnut))->renderChart();
                        $tempText .= $chart1;
                    }
                }
                else if (strpos($plot, 'line') >= 0) {
                    $isSmooth = $plot === 'line_smooth';

                    if ($group === 'daily') {
                        $chart1 = (new ChartJS_Line(['92', '111', '112', '118', '120', '122', '125'], [0.1, 0.27, 0.14, 0.35, 0.42, 0.29, 0.7], 'system_validation_verification_140302', 'مدت زمان پاسخ teacher2', $isSmooth))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Line(['91', '110', '115', '117', '121', '123'], [0.15, 0.47, 0.34, 0.3, 0.02, 0.23], 'database_140302', 'مدت زمان پاسخ teacher3', $isSmooth))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Line(['78', '118', '123', '124', '130', '140'], [0.05, 0.3, 0.5, 0.75, 0.03, 0.16], 'iot_computing_140302', 'مدت زمان پاسخ sample_teacher_username', $isSmooth))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Line(['94', '110', '122', '126'], [0.25, 0.17, 0.44, 0.05], 'network_140302', 'مدت زمان پاسخ sample_teacher_username', $isSmooth))->renderChart();
                        $tempText .= $chart1;
                    }
                    else {
                        $chart1 = (new ChartJS_Line(['11', '12', '14', '15', '16'], [0.7, 0.93, 0.6, 0.7, 0.4], 'system_validation_verification_140302', 'مدت زمان پاسخ teacher2', $isSmooth))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Line(['12', '13', '14', '15', '17', '19'], [0.83, 0.49, 0.72, 0.36, 0.41, 0.43], 'database_140302', 'مدت زمان پاسخ teacher3', $isSmooth))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Line(['13', '14', '15', '17', '18'], [0.65, 0.71, 1, 0.35, 0.22], 'iot_computing_140302', 'مدت زمان پاسخ sample_teacher_username', $isSmooth))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Line(['11', '12', '14', '15'], [0.35, 0.7, 0.96, 0.78], 'network_140302', 'مدت زمان پاسخ sample_teacher_username', $isSmooth))->renderChart();
                        $tempText .= $chart1;
                    }
                }
            }
            $tempText .= "\t\t".'</div>'."<br>";
        }
        return $tempText;

	}
    public function teacher_main_info ($user): string {
        $tempText = '';
        if ($user === 'user') {
            $tempText .= '<div id="div_class">'.PHP_EOL.
                "\t".'<h3 class="main_title">اطلاعات کاربری sample_teacher</h3>'.PHP_EOL.
                "\t".'<table class="data-table">'.PHP_EOL."\t\t".'<tr>'.PHP_EOL.
                "\t\t".'<th>نام</th>'.PHP_EOL."\t\t".'<th>نام خانوادگی</th>'.PHP_EOL.
                "\t\t".'<th>نقش</th>'.PHP_EOL."\t\t".'<th>ایمیل</th>'.PHP_EOL."\t\t".'<th>دپارتمان</th>'.PHP_EOL.
                "\t\t".'<th>تلفن</th>'.PHP_EOL."\t\t".'<th>شهر</th>'.PHP_EOL."\t\t".'<th>کشور</th>'.PHP_EOL.
                "\t\t".'</tr>';

            $tempText .= '<tr>'.'<td>عماد</td>'.'<td>سعیدی</td>'.'<td>editingteacher</td>'.'<td>emad_saeedi@outlook.com</td>'.'<td>مهندسی کامپیوتر</td>'.'<td></td>'.'<td>اصفهان</td>'.'<td>ایران</td>'.'</tr>';
        }
        else {
            $tempText .= '<div id="div_class">'.PHP_EOL.
                "\t".'<h3 class="main_title">اطلاعات کاربری تمام مدرسان</h3>'.PHP_EOL.
                "\t".'<table class="data-table">'.PHP_EOL."\t\t".'<tr>'.PHP_EOL.
                "\t\t".'<th>نام</th>'.PHP_EOL."\t\t".'<th>نام خانوادگی</th>'.PHP_EOL.
                "\t\t".'<th>نقش</th>'.PHP_EOL."\t\t".'<th>ایمیل</th>'.PHP_EOL."\t\t".'<th>دپارتمان</th>'.PHP_EOL.
                "\t\t".'<th>تلفن</th>'.PHP_EOL."\t\t".'<th>شهر</th>'.PHP_EOL."\t\t".'<th>کشور</th>'.PHP_EOL.
                "\t\t".'</tr>';

            $tempText .= '<tr>'.'<td>داوود</td>'.'<td>پرهیزکار</td>'.'<td>editingteacher</td>'.'<td>davoud_parhizkar@yahoo.com</td>'.'<td>مهندسی کامپیوتر</td>'.'<td></td>'.'<td>اصفهان</td>'.'<td>ایران</td>'.'</tr>';

            $tempText .= '<tr>'.'<td>عماد</td>'.'<td>سعیدی</td>'.'<td>editingteacher</td>'.'<td>emad_saeedi@outlook.com</td>'.'<td>مهندسی کامپیوتر</td>'.'<td></td>'.'<td>اصفهان</td>'.'<td>ایران</td>'.'</tr>';

            $tempText .= '<tr>'.'<td>محمد</td>'.'<td>رضایی</td>'.'<td>editingteacher</td>'.'<td>mohammad_rezaei@gmail.com</td>'.'<td>مهندسی کامپیوتر</td>'.'<td></td>'.'<td>اصفهان</td>'.'<td>ایران</td>'.'</tr>';

            $tempText .= '<tr>'.'<td>امیر</td>'.'<td>باقری</td>'.'<td>editingteacher</td>'.'<td>amir.bagheri@hotmail.com</td>'.'<td>مهندسی کامپیوتر</td>'.'<td></td>'.'<td>اصفهان</td>'.'<td>ایران</td>'.'</tr>';
        }

        $tempText .= "\t".'</table>'.PHP_EOL.'</div>'.'<br>';
        return $tempText;

	}

}

?>