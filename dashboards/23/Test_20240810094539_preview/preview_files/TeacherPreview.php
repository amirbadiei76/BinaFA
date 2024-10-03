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
    public function teacher_activities ($user, $plot, $timeGrouping): string {
        $tempText = '';

        if ($plot === 'table') {
            if ($user === 'user')
            {
                $tempText .= '<div id="div_class">'.PHP_EOL.
                    "\t".'<h3 class="main_title">تعداد فعالیت های sample_teacher2</h3>'.PHP_EOL.
                    "\t".'<table class="data-table">'.PHP_EOL."\t\t".'<tr>'.PHP_EOL.
                    "\t\t".'<th>نام دوره</th>'.PHP_EOL."\t\t".'<th>تعداد فعالیت ها</th>'.PHP_EOL."\t\t".'</tr>';

                $tempText .= '<tr>'.'<td>algorithm_design_140301</td>'.'<td>10</td>'.'</tr>';
                $tempText .= '<tr>'.'<td>operating_system_140301</td>'.'<td>6</td>'.'</tr>';
            }
            else
            {
                $tempText .= '<div id="div_class">'.PHP_EOL.
                    "\t".'<h3 class="main_title">تعداد فعالیت های تمام مدرسان</h3>'.PHP_EOL.
                    "\t".'<table class="data-table">'.PHP_EOL."\t\t".'<tr>'.PHP_EOL."\t\t".'<th>نام    کاربری</th>'.
                    PHP_EOL."\t\t".'<th>نام دوره</th>'.PHP_EOL."\t\t".'<th>تعداد فعالیت ها</th>'.PHP_EOL."\t\t".'</tr>';

                $tempText .= '<tr>'.'<td>teacher1</td>'.'<td>compiler_140301</td>'.'<td>9</td>'.'</tr>';

                $tempText .= '<tr>'.'<td>sample_teacher2</td>'.'<td>algorithm_design_140301</td>'.'<td>10</td>'.'</tr>';
                $tempText .= '<tr>'.'<td>sample_teacher2</td>'.'<td>operating_system_140301</td>'.'<td>6</td>'.'</tr>';

                $tempText .= '<tr>'.'<td>new_teacher3</td>'.'<td>artificial_intelijence_140301</td>'.'<td>3</td>'.'</tr>';
                $tempText .= '<tr>'.'<td>teacher4</td>'.'<td>artificial_intelijence_140301</td>'.'<td>2</td>'.'</tr>';
            }
            $tempText .= "\t".'</table>'.PHP_EOL.'</div>'."<br>";
        }
        else
        {
            $timeText = 'روزانه';
            if ($timeGrouping === 'weekly') $timeText = 'هفتگی';

            if ($user === 'user')
            {
                $tempText .= '<div id="div_class">'.PHP_EOL.
                    "\t".'<h3 class="main_title">تعداد فعالیت های انجام شده توسط sample_teacher2 به  صورت '.$timeText.'</h3>';

                // user chart
                if ($plot === 'bar') {
                    if ($timeGrouping === 'daily') {
                        $chart1 = (new ChartJS_Bar(['67', '68', '71', '72', '73', '75', '78'], [2, 1, 3, 1, 1, 1, 2], 'database_140301', 'تعداد فعالیت های sample_teacher2'))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Bar(['76', '77', '81', '84'], [1, 1, 3, 2], 'compiler_140301', 'تعداد فعالیت های sample_teacher2'))->renderChart();
                        $tempText .= $chart1;

                    }
                    else {
                        $chart1 = (new ChartJS_Bar(['13', '14', '15', '17', '18'], [4, 1, 3, 1, 2], 'database_140302', 'تعداد فعالیت های sample_teacher2'))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Bar(['10', '11', '13', '14'], [1, 1, 3, 2], 'compiler_140302', 'تعداد فعالیت های sample_teacher2'))->renderChart();
                        $tempText .= $chart1;
                    }
                }
                else if ($plot === 'pie' || $plot === 'doughnut') {
                    $isDoughnut = $plot === 'doughnut';
                    if ($timeGrouping === 'daily') {
                        $chart1 = (new ChartJS_Pie(['67', '68', '71', '72', '73', '75', '78'], [2, 1, 3, 1, 1, 1, 2], 'ai_140302', 'تعداد فعالیت های sample_teacher2 در دوره ai_140302', $isDoughnut))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Pie(['76', '77', '81', '84'], [1, 1, 3, 2], 'compiler_140302', 'تعداد فعالیت های sample_teacher2 در دوره compiler_140302', $isDoughnut))->renderChart();
                        $tempText .= $chart1;
                    }
                    else {
                        $chart1 = (new ChartJS_Pie(['13', '14', '15', '17', '18'], [4, 1, 3, 1, 2], 'ai_140302', 'تعداد فعالیت های sample_teacher2 در دوره ai_140302', $isDoughnut))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Pie(['10', '11', '13', '14'], [1, 1, 3, 2], 'compiler_140302', 'تعداد فعالیت های sample_teacher2 در دوره compiler_140302', $isDoughnut))->renderChart();
                        $tempText .= $chart1;
                    }
                }
                else if (strpos($plot, 'line') >= 0) {
                    $isSmooth = $plot === 'line_smooth';

                    if ($timeGrouping === 'daily') {
                        $chart1 = (new ChartJS_Line(['67', '68', '71', '72', '73', '75', '78'], [2, 1, 3, 1, 1, 1, 2], 'ai_140302', 'تعداد فعالیت های sample_teacher2', $isSmooth))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Line(['76', '77', '81', '84'], [1, 1, 3, 2], 'compiler_140302', 'تعداد فعالیت های sample_teacher2', $isSmooth))->renderChart();
                        $tempText .= $chart1;
                    }
                    else {
                        $chart1 = (new ChartJS_Line(['13', '14', '15', '17', '18'], [4, 1, 3, 1, 2], 'ai_140302', 'تعداد فعالیت های sample_teacher2', $isSmooth))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Line(['10', '11', '13', '14'], [1, 1, 3, 2], 'compiler_140302', 'تعداد فعالیت های sample_teacher2', $isSmooth))->renderChart();
                        $tempText .= $chart1;
                    }
                }
            }
            else
            {
                $tempText .= '<div id="div_class">'.PHP_EOL.
                    "\t".'<h3 class="main_title">تعداد فعالیت های انجام شده تمام مدرسان به صورت '.$timeText.'</h3>';

                // all chart
                if ($plot === 'bar') {
                    if ($timeGrouping === 'daily') {
                        $chart1 = (new ChartJS_Bar(['52', '54', '55', '61', '68', '75', '78', '83', '84'], [2, 1, 1, 1, 3, 1, 1, 2, 3], 'ai_140301', 'تعداد فعالیت های teacher1'))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Bar(['67', '68', '71', '72', '73', '75', '78'], [2, 1, 3, 1, 1, 1, 2], 'database_140301', 'تعداد فعالیت های sample_teacher2'))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Bar(['76', '77', '81', '84'], [1, 1, 3, 2], 'compiler_140301', 'تعداد فعالیت های sample_teacher2'))->renderChart();
                        $tempText .= $chart1;

                    }
                    else {
                        $chart1 = (new ChartJS_Bar(['11', '12', '14', '15', '17', '19'], [4, 2, 1, 1, 3, 1], 'ai_140301', 'تعداد فعالیت های teacher1'))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Bar(['13', '14', '15', '17', '18'], [4, 1, 3, 1, 2], 'database_140302', 'تعداد فعالیت های sample_teacher3'))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Bar(['10', '11', '13', '14'], [1, 1, 3, 2], 'compiler_140302', 'تعداد فعالیت های sample_teacher2'))->renderChart();
                        $tempText .= $chart1;
                    }
                }
                else if ($plot === 'pie' || $plot === 'doughnut') {
                    $isDoughnut = $plot === 'doughnut';
                    if ($timeGrouping === 'daily') {
                        $chart1 = (new ChartJS_Pie(['52', '54', '55', '61', '68', '75', '78', '83', '84'], [2, 1, 1, 1, 3, 1, 1, 2, 3], 'database_140302', 'تعداد فعالیت های teacher3 در دوره database_140302', $isDoughnut))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Pie(['67', '68', '71', '72', '73', '75', '78'], [2, 1, 3, 1, 1, 1, 2], 'ai_140302', 'تعداد فعالیت های sample_teacher در دوره ai_140302', $isDoughnut))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Pie(['76', '77', '81', '84'], [1, 1, 3, 2], 'compiler_140302', 'تعداد فعالیت های new_teacher2 در دوره compiler_140302', $isDoughnut))->renderChart();
                        $tempText .= $chart1;
                    }
                    else {
                        $chart1 = (new ChartJS_Pie(['11', '12', '14', '15', '17', '19'], [4, 2, 1, 1, 3, 1], 'az_database_140302', 'تعداد فعالیت های sample_teacher در دوره az_database_140302', $isDoughnut))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Pie(['13', '14', '15', '17', '18'], [4, 1, 3, 1, 2], 'ai_140302', 'تعداد فعالیت های teacher2 در دوره ai_140302', $isDoughnut))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Pie(['10', '11', '13', '14'], [1, 1, 3, 2], 'compiler_140302', 'تعداد فعالیت های sample_teacher در دوره compiler_140302', $isDoughnut))->renderChart();
                        $tempText .= $chart1;
                    }
                }
                else if (strpos($plot, 'line') >= 0) {
                    $isSmooth = $plot === 'line_smooth';

                    if ($timeGrouping === 'daily') {
                        $chart1 = (new ChartJS_Line(['52', '54', '55', '61', '68', '75', '78', '83', '84'], [2, 1, 1, 1, 3, 1, 1, 2, 3], 'database_140302', 'تعداد فعالیت های teacher3', $isSmooth))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Line(['67', '68', '71', '72', '73', '75', '78'], [2, 1, 3, 1, 2, 1, 2], 'ai_140302', 'تعداد فعالیت های sample_teacher2', $isSmooth))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Line(['76', '77', '81', '84'], [2, 1, 3, 1], 'compiler_140302', 'تعداد فعالیت های new_teacher2', $isSmooth))->renderChart();
                        $tempText .= $chart1;
                    }
                    else {
                        $chart1 = (new ChartJS_Line(['11', '12', '14', '15', '17', '19'], [1, 3, 2, 1, 3, 1], 'az_database_140302', 'تعداد فعالیت های sample_teacher', $isSmooth))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Line(['13', '14', '15', '17', '18'], [4, 1, 3, 1, 2], 'ai_140302', 'تعداد فعالیت های sample_teacher2', $isSmooth))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Line(['10', '11', '13', '14'], [2, 1, 3, 4], 'compiler_140302', 'تعداد فعالیت های new_teacher', $isSmooth))->renderChart();
                        $tempText .= $chart1;
                    }
                }
            }
            $tempText .= "\t\t".'</div>'."<br>";
        }
        return $tempText;

	}
    public function teacher_times_pent ($user, $plot, $timeGrouping): string
    {
        $tempText = '';
        if ($plot === 'total') {
            $tempText .= '<div id="div_class">'.PHP_EOL."\t";
            if ($user === 'user') {
                $tempText .= '<h3 class="main_title">مجموع مدت زمان سپری شده در سامانه برای sample_teacher</h3>';
                $tempText .= '<h3 style="font-weight: normal">6.12 (ساعت)</h3>';

            }
            else {
                $tempText .= '<h3 class="main_title">مجموع مدت زمان سپری شده در سامانه برای تمام مدرسان</h3>';

                $tempText .= '<table class="data-table">'.PHP_EOL."\t\t".'<tr>'.PHP_EOL."\t\t".'<th>نام کاربری</th>'.
                    PHP_EOL."\t\t".'<th>مجموع مدت زمان ها (ساعت)</th>'.PHP_EOL."\t\t".'</tr>';

                $tempText .= '<tr>'.'<td>teacher1</td>'.'<td>1.88</td>'.'</tr>';
                $tempText .= '<tr>'.'<td>teacher2</td>'.'<td>6.12</td>'.'</tr>';
                $tempText .= '<tr>'.'<td>new_teacher3</td>'.'<td>0.22</td>'.'</tr>';
                $tempText .= '<tr>'.'<td>teacher4</td>'.'<td>0.07</td>'.'</tr>';

                $tempText .= '</table>'.PHP_EOL;
            }
            $tempText .= PHP_EOL.'</div>'."<br>";
        }
        else {
            $timeText = 'روزانه';
            if ($timeGrouping === 'weekly') $timeText = 'هفتگی';

            if ($user === 'user') {
                $tempText .= '<div id="div_class">'.PHP_EOL."\t";
                $tempText .= '<h3 class="main_title">مدت زمان سپری شده در سامانه برای sample_teacher2 به صورت '.$timeText.'</h3>';

                if ($plot === 'bar') {
                    if ($timeGrouping === 'daily') {
                        $chart1 = (new ChartJS_Bar(['78', '89', '94', '97', /*1*/ '99', '100', '102', '117', /*2*/ '118', '119', '120', '121', /*3*/ '122', '123', '124', '126', /*4*/ '131', '137', '138', '139', /*5*/ '140', '141', '142', '143', /*6*/ '144', '145', '146', '148'], [0.43, 0.09, 0.03, 0.25, /*1*/ 0.2, 0.04, 0.22, 0.16, /*2*/ 0.19, 0.15, 0.014, 0.011, /*3*/ 0.131, 0.129, 0.2, 0.02, /*4*/ 0.9, 0.181, 2.01, 0.014, /*5*/ 0.03, 0.018, 0.18, 0.1, /*6*/ 0.01, 0.025, 0.19, 0.01], 'sample_teacher2', 'مدت زمان سپری شده برای sample_teacher2 در سامانه'))->renderChart();
                        $tempText .= $chart1;
                    }
                    else {
                        $chart1 = (new ChartJS_Bar(['13', '15', '16', '17', /*1*/ '18', '19', '21', '22', /*2*/ '23', '24', '26', '27', /*3*/ '28', '30', '31', '32'], [0.9, 0.81, 0.7, 0.5, /*1*/ 0.8, 1.14, 2.01, 1.16, /*2*/ 0.9, 1.03, 1.3, 3.96, /*3*/ 0.84, 0.89, 0.72, 1.22], 'sample_teacher2', 'مدت زمان سپری شده برای sample_teacher2 در سامانه'))->renderChart();
                        $tempText .= $chart1;
                    }
                }
                else if ($plot === 'pie' || $plot === 'doughnut') {
                    $isDoughnut = $plot === 'doughnut';
                    if ($timeGrouping === 'daily') {
                        $chart1 = (new ChartJS_Pie(['78', '89', '94', '97', /*1*/ '99', '100', '102', '117', /*2*/ '118', '119', '120', '121', /*3*/ '122', '123', '124', '126', /*4*/ '131', '137', '138', '139', /*5*/ '140', '141', '142', '143', /*6*/ '144', '145', '146', '148'], [0.43, 0.09, 0.03, 0.25, /*1*/ 0.2, 0.04, 0.22, 0.16, /*2*/ 0.19, 0.15, 0.014, 0.011, /*3*/ 0.131, 0.129, 0.2, 0.02, /*4*/ 0.9, 0.181, 2.01, 0.014, /*5*/ 0.03, 0.018, 0.18, 0.1, /*6*/ 0.01, 0.025, 0.19, 0.01], 'sample_teacher2', 'مدت زمان سپری شده برای sample_teacher2 در سامانه', $isDoughnut))->renderChart();
                        $tempText .= $chart1;
                    }
                    else {
                        $chart1 = (new ChartJS_Pie(['13', '15', '16', '17', /*1*/ '18', '19', '21', '22', /*2*/ '23', '24', '26', '27', /*3*/ '28', '30', '31', '32'], [0.9, 0.81, 0.7, 0.5, /*1*/ 0.8, 1.14, 2.01, 1.16, /*2*/ 0.9, 1.03, 1.3, 3.96, /*3*/ 0.85, 0.89, 0.99, 1.22], 'sample_teacher2', 'مدت زمان سپری شده برای sample_teacher2 در سامانه', $isDoughnut))->renderChart();
                        $tempText .= $chart1;
                    }
                }
                else if (strpos($plot, 'line') >= 0) {
                    $isSmooth = $plot === 'line_smooth';
                    if ($timeGrouping === 'daily') {
                        $chart1 = (new ChartJS_Line(['78', '89', '94', '97', /*1*/ '99', '100', '102', '117', /*2*/ '118', '119', '120', '121', /*3*/ '122', '123', '125', '127', /*4*/ '131', '137', '138', '139', /*5*/ '140', '141', '142', '143', /*6*/ '144', '145', '146', '148'], [0.43, 0.09, 0.03, 0.25, /*1*/ 0.2, 0.04, 0.22, 0.16, /*2*/ 0.19, 0.15, 0.014, 0.011, /*3*/ 0.131, 0.129, 0.2, 0.02, /*4*/ 0.9, 0.181, 2.01, 0.014, /*5*/ 0.03, 0.018, 0.18, 0.1, /*6*/ 0.01, 0.025, 0.19, 0.01], 'sample_teacher2', 'مدت زمان سپری شده برای sample_teacher2 در سامانه', $isSmooth))->renderChart();
                        $tempText .= $chart1;
                    }
                    else {
                        $chart1 = (new ChartJS_Line(['13', '15', '16', '17', /*1*/ '18', '19', '21', '22', /*2*/ '23', '24', '26', '27', /*3*/ '29', '30', '31', '32'], [0.9, 0.81, 0.7, 0.5, /*1*/ 0.8, 1.14, 2.01, 1.16, /*2*/ 0.9, 1.03, 1.3, 3.96, /*3*/ 0.84, 0.89, 0.72, 1.22], 'sample_teacher2', 'مدت زمان سپری شده برای sample_teacher2 در سامانه', $isSmooth))->renderChart();
                        $tempText .= $chart1;
                    }
                }
            }
            else {

                $tempText .= '<div id="div_class">'.PHP_EOL."\t";
                $tempText .= '<h3 class="main_title">مجموع مدت زمان سپری شده در سامانه برای تمام مدرسان به صورت '.$timeText.'</h3>';

                if ($plot === 'bar') {
                    if ($timeGrouping === 'daily') {
                        $chart1 = (new ChartJS_Bar(['78', '89', '94', '97', /*1*/ '99', '100', '102', '117', /*2*/ '118', '119', '120', '121', /*3*/ '122', '123', '124', '126', /*4*/ '131', '137', '138', '139', /*5*/ '140', '141', '142', '143', /*6*/ '144', '145', '146', '148'], [0.43, 0.09, 0.03, 0.25, /*1*/ 0.2, 0.04, 0.22, 0.16, /*2*/ 0.19, 0.15, 0.014, 0.011, /*3*/ 0.131, 0.129, 0.2, 0.02, /*4*/ 0.9, 0.181, 2.01, 0.014, /*5*/ 0.05, 0.018, 0.18, 0.1, /*6*/ 0.01, 0.025, 0.19, 0.01], 'sample_teacher2', 'مدت زمان سپری شده برای sample_teacher2 در سامانه'))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Bar(['78', '91', '93', '95', /*1*/ '96', '101', '103', '111', /*2*/ '118', '119', '120', '121', /*3*/ '122', '125', '126', '130', /*4*/ '135', '137', '136', '139', /*5*/ '141', '143', '145', '146'], [0.93, 0.23, 0.03, 0.191, /*1*/ 0.11, 0.03, 0.22, 0.16, /*2*/ 0.14, 0.15, 0.34, 0.011, /*3*/ 0.131, 0.129, 0.2, 0.02, /*4*/ 0.9, 0.131, 2.01, 0.019, /*5*/ 0.1, 0.018, 0.42, 0.2], 'teacher1', 'مدت زمان سپری شده برای teacher1 در سامانه'))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Bar(['91', '95', '96', '98', /*1*/ '100', '102', '108', '115', /*2*/ '117', '118', '121', '122', /*3*/ '124', '125', '127', '130'], [0.43, 0.13, 0.05, 0.28, /*1*/ 0.91, 1.03, 0.82, 0.16, /*2*/ 0.54, 1.95, 1.24, 0.91, /*3*/ 0.31, 0.23, 0.19, 0.19], 'new_teacher', 'مدت زمان سپری شده برای new_teacher در سامانه'))->renderChart();
                        $tempText .= $chart1;
                    }
                    else {
                        $chart1 = (new ChartJS_Bar(['13', '15', '16', '17', /*1*/ '18', '19', '21', '22', /*2*/ '23', '24', '26', '27', /*3*/ '28', '30', '31', '32'], [0.9, 0.81, 0.7, 0.58, /*1*/ 0.8, 1.14, 2.01, 1.16, /*2*/ 0.9, 1.03, 1.3, 3.96, /*3*/ 0.89, 1, 0.72, 1.22], 'sample_teacher2', 'مدت زمان سپری شده برای sample_teacher2 در سامانه'))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Bar(['11', '12', '14', '15', /*1*/ '16', '17', '18', '19', /*2*/ '20', '22', '23', '24', /*3*/ '25', '26', '28', '30'], [1.9, 2.23, 0.63, 1, /*1*/ 2.04, 0.43, 0.72, 1.96, /*2*/ 0.84, 1.45, 1.34, 1.011, /*3*/ 0.131, 0.129, 0.2, 0.02], 'teacher1', 'مدت زمان سپری شده برای teacher1 در سامانه'))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Bar(['9', '11', '12', '13', /*1*/ '14', '15', '16', '17', /*2*/ '18', '19', '21', '22'], [1.13, 2.03, 0.95, 0.82, /*1*/ 1.91, 0.73, 0.82, 1.16, /*2*/ 1.54, 0.95, 1.24, 2.51], 'new_teacher', 'مدت زمان سپری شده برای new_teacher در سامانه'))->renderChart();
                        $tempText .= $chart1;
                    }
                }
                else if ($plot === 'pie' || $plot === 'doughnut') {
                    $isDoughnut = $plot === 'doughnut';
                    if ($timeGrouping === 'daily') {
                        $chart1 = (new ChartJS_Pie(['78', '89', '94', '97', /*1*/ '99', '100', '102', '117', /*2*/ '118', '119', '120', '121', /*3*/ '122', '123', '124', '126', /*4*/ '131', '137', '138', '139', /*5*/ '140', '141', '142', '143', /*6*/ '144', '145', '146', '148'], [0.43, 0.09, 0.03, 0.25, /*1*/ 0.2, 0.04, 0.22, 0.16, /*2*/ 0.19, 0.15, 0.014, 0.011, /*3*/ 0.131, 0.129, 0.2, 0.02, /*4*/ 0.9, 0.181, 2.01, 0.014, /*5*/ 0.05, 0.018, 0.18, 0.1, /*6*/ 0.01, 0.025, 0.19, 0.01], 'sample_teacher2', 'مدت زمان سپری شده برای sample_teacher2 در سامانه', $isDoughnut))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Pie(['78', '91', '93', '95', /*1*/ '96', '101', '103', '111', /*2*/ '118', '119', '120', '121', /*3*/ '122', '125', '126', '130', /*4*/ '135', '137', '136', '139', /*5*/ '141', '143', '145', '146'], [0.93, 0.23, 0.03, 0.191, /*1*/ 0.11, 0.03, 0.22, 0.16, /*2*/ 0.14, 0.15, 0.34, 0.011, /*3*/ 0.131, 0.129, 0.2, 0.02, /*4*/ 0.9, 0.131, 2.01, 0.019, /*5*/ 0.1, 0.018, 0.42, 0.2], 'teacher1', 'مدت زمان سپری شده برای teacher1 در سامانه', $isDoughnut))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Pie(['91', '95', '96', '98', /*1*/ '100', '102', '108', '115', /*2*/ '117', '118', '121', '122', /*3*/ '124', '125', '127', '130'], [0.43, 0.13, 0.05, 0.28, /*1*/ 0.91, 1.03, 0.82, 0.16, /*2*/ 0.54, 1.95, 1.24, 0.91, /*3*/ 0.31, 0.23, 0.19, 0.19], 'new_teacher', 'مدت زمان سپری شده برای new_teacher در سامانه', $isDoughnut))->renderChart();
                        $tempText .= $chart1;
                    }
                    else {
                        $chart1 = (new ChartJS_Pie(['13', '15', '16', '17', /*1*/ '18', '19', '21', '22', /*2*/ '23', '24', '26', '27', /*3*/ '28', '30', '31', '32'], [0.9, 0.81, 0.7, 0.58, /*1*/ 0.8, 1.14, 2.01, 1.16, /*2*/ 0.9, 1.03, 1.3, 3.96, /*3*/ 0.89, 1, 0.72, 1.22], 'sample_teacher2', 'مدت زمان سپری شده برای sample_teacher2 در سامانه', $isDoughnut))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Pie(['11', '12', '14', '15', /*1*/ '16', '17', '18', '19', /*2*/ '20', '22', '23', '24', /*3*/ '25', '26', '28', '30'], [1.9, 2.23, 0.63, 1, /*1*/ 2.04, 0.43, 0.72, 1.96, /*2*/ 0.84, 1.45, 1.34, 1.011, /*3*/ 0.131, 0.129, 0.2, 0.02], 'teacher1', 'مدت زمان سپری شده برای teacher1 در سامانه', $isDoughnut))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Pie(['9', '11', '12', '13', /*1*/ '14', '15', '16', '17', /*2*/ '18', '19', '21', '22'], [1.13, 2.03, 0.95, 0.82, /*1*/ 1.91, 0.73, 0.82, 1.16, /*2*/ 1.54, 0.95, 1.24, 2.51], 'new_teacher', 'مدت زمان سپری شده برای new_teacher در سامانه', $isDoughnut))->renderChart();
                        $tempText .= $chart1;
                    }
                }
                else if (strpos($plot, 'line') >= 0) {
                    $isSmooth = $plot === 'line_smooth';
                    if ($timeGrouping === 'daily') {
                        $chart1 = (new ChartJS_Line(['78', '89', '94', '98', /*1*/ '99', '100', '102', '117', /*2*/ '118', '119', '120', '121', /*3*/ '122', '123', '124', '126', /*4*/ '131', '137', '138', '139', /*5*/ '140', '141', '142', '143', /*6*/ '144', '145', '146', '148'], [0.43, 0.09, 0.03, 0.25, /*1*/ 0.2, 0.04, 0.22, 0.16, /*2*/ 0.19, 0.15, 0.014, 0.011, /*3*/ 0.131, 0.129, 0.2, 0.02, /*4*/ 0.9, 0.181, 2.01, 0.014, /*5*/ 0.05, 0.018, 0.18, 0.1, /*6*/ 0.01, 0.025, 0.19, 0.01], 'sample_teacher2', 'مدت زمان سپری شده برای sample_teacher2 در سامانه', $isSmooth))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Line(['78', '92', '93', '95', /*1*/ '96', '101', '103', '111', /*2*/ '118', '119', '120', '121', /*3*/ '122', '125', '126', '130', /*4*/ '135', '137', '136', '139', /*5*/ '141', '143', '145', '146'], [0.93, 0.23, 0.03, 0.191, /*1*/ 0.11, 0.03, 0.22, 0.16, /*2*/ 0.14, 0.15, 0.34, 0.011, /*3*/ 0.131, 0.129, 0.2, 0.02, /*4*/ 0.9, 0.131, 2.01, 0.019, /*5*/ 0.1, 0.018, 0.42, 0.2], 'teacher1', 'مدت زمان سپری شده برای teacher1 در سامانه', $isSmooth))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Line(['90', '95', '96', '98', /*1*/ '100', '102', '108', '115', /*2*/ '117', '118', '121', '122', /*3*/ '124', '125', '127', '130'], [0.43, 0.13, 0.05, 0.28, /*1*/ 0.91, 1.03, 0.82, 0.16, /*2*/ 0.54, 1.95, 1.24, 0.91, /*3*/ 0.31, 0.23, 0.19, 0.19], 'new_teacher', 'مدت زمان سپری شده برای new_teacher در سامانه', $isSmooth))->renderChart();
                        $tempText .= $chart1;
                    }
                    else {
                        $chart1 = (new ChartJS_Line(['13', '15', '16', '17', /*1*/ '18', '19', '21', '22', /*2*/ '23', '24', '26', '27', /*3*/ '28', '30', '31', '32'], [0.9, 0.81, 0.7, 0.58, /*1*/ 0.8, 1.14, 2.01, 1.16, /*2*/ 0.9, 1.03, 1.3, 3.96, /*3*/ 0.89, 1, 0.72, 1.22], 'sample_teacher2', 'مدت زمان سپری شده برای sample_teacher2 در سامانه', $isSmooth))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Line(['11', '12', '14', '15', /*1*/ '16', '17', '18', '19', /*2*/ '20', '22', '23', '24', /*3*/ '25', '26', '28', '30'], [1.9, 2.23, 0.63, 1, /*1*/ 2.04, 0.43, 0.72, 1.96, /*2*/ 0.84, 1.45, 1.34, 1.011, /*3*/ 0.131, 0.129, 0.2, 0.02], 'teacher1', 'مدت زمان سپری شده برای teacher1 در سامانه', $isSmooth))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Line(['9', '11', '12', '13', /*1*/ '14', '15', '16', '17', /*2*/ '18', '19', '21', '22'], [1.13, 2.03, 0.95, 0.82, /*1*/ 1.91, 0.73, 0.82, 1.16, /*2*/ 1.54, 0.95, 1.24, 2.51], 'new_teacher', 'مدت زمان سپری شده برای new_teacher در سامانه', $isSmooth))->renderChart();
                        $tempText .= $chart1;
                    }
                }
            }
            $tempText .= "\t\t".'</div>'."<br>";
        }

        return $tempText;

	}
    public function teacher_average_times_pent ($user, $plot, $timeGrouping): string
    {
        $tempText = '';

        if ($plot === 'total') {
            $tempText .= '<div id="div_class">'.PHP_EOL."\t";
            if ($user === 'user') {
                $tempText .= '<h3 class="main_title">میانگین مدت زمان سپری شده در سامانه برای sample_teacher_username</h3>';

                $tempText .= '<h3 style="font-weight: normal">2.23 (ساعت)</h3>';

            }
            else {
                $tempText .= '<h3 class="main_title">میانگین مدت زمان سپری شده در سامانه برای تمام مدرسان</h3>';

                $tempText .= '<table class="data-table">'.PHP_EOL."\t\t".'<tr>'.PHP_EOL."\t\t".'<th>نام کاربری</th>'.PHP_EOL."\t\t".'<th>میانگین مدت زمان ها (ساعت)</th>'.PHP_EOL."\t\t".'</tr>';


                $tempText .= '<tr>'.'<td>sample_teacher_username</td>'.'<td>2.24</td>'.'</tr>';
                $tempText .= '<tr>'.'<td>new_teacher1</td>'.'<td>0.83</td>'.'</tr>';
                $tempText .= '<tr>'.'<td>teacher2</td>'.'<td>3.12</td>'.'</tr>';
                $tempText .= '<tr>'.'<td>new_teacher3</td>'.'<td>0.59</td>'.'</tr>';
                $tempText .= '<tr>'.'<td>teacher4</td>'.'<td>1.03</td>'.'</tr>';

                $tempText .= '</table>'.PHP_EOL;
            }
            $tempText .= PHP_EOL.'</div>'."<br>";
        }
        else {
            $timeText = 'روزانه';
            if ($timeGrouping === 'weekly') $timeText = 'هفتگی';

            if ($user === 'user') {
                $tempText .= '<div id="div_class">'.PHP_EOL."\t";
                $tempText .= '<h3 class="main_title">میانگین مدت زمان سپری شده در سامانه برای sample_teacher2 به صورت '.$timeText.'</h3>';

                if ($plot === 'bar') {
                    if ($timeGrouping === 'daily') {
                        $chart1 = (new ChartJS_Bar(['89', '94', '97', /*1*/ '99', '100', '102', '117', /*2*/ '118', '119', '120', '121', /*3*/ '122', '123', '124', '126', /*4*/ '131', '137', '138', '139', /*5*/ '140', '141', '142', '143', /*6*/ '144', '145', '146', '148'], [0.09, 0.03, 0.25, /*1*/ 0.1, 0.02, 0.12, 0.2, /*2*/ 0.14, 0.15, 0.014, 0.011, /*3*/ 0.101, 0.109, 0.1, 0.02, /*4*/ 0.4, 0.181, 1.01, 0.014, /*5*/ 0.03, 0.018, 0.18, 0.1, /*6*/ 0.01, 0.03, 0.02, 0.14], 'sample_teacher2', 'میانگین مدت زمان سپری شده برای sample_teacher2 در سامانه'))->renderChart();
                        $tempText .= $chart1;
                    }
                    else {
                        $chart1 = (new ChartJS_Bar(['13', '14', '15', '16', /*1*/ '18', '20', '21', '22', /*2*/ '23', '24', '26', '27', /*3*/ '28', '30', '31', '32'], [0.4, 0.41, 0.3, 0.25, /*1*/ 0.4, 0.52, 1.01, 0.66, /*2*/ 0.45, 0.53, 0.62, 1.86, /*3*/ 0.44, 0.49, 0.32, 0.62], 'sample_teacher2', 'میانگین مدت زمان سپری شده برای sample_teacher2 در سامانه'))->renderChart();
                        $tempText .= $chart1;
                    }
                }
                else if ($plot === 'pie' || $plot === 'doughnut') {
                    $isDoughnut = $plot === 'doughnut';

                    if ($timeGrouping === 'daily') {
                        $chart1 = (new ChartJS_Pie(['89', '94', '97', /*1*/ '99', '100', '102', '117', /*2*/ '118', '119', '120', '121', /*3*/ '122', '123', '124', '126', /*4*/ '131', '137', '138', '139', /*5*/ '140', '141', '142', '143', /*6*/ '144', '145', '146', '148'], [0.09, 0.03, 0.25, /*1*/ 0.1, 0.02, 0.12, 0.2, /*2*/ 0.14, 0.15, 0.014, 0.011, /*3*/ 0.101, 0.109, 0.1, 0.02, /*4*/ 0.4, 0.181, 1.01, 0.014, /*5*/ 0.03, 0.018, 0.18, 0.1, /*6*/ 0.01, 0.03, 0.02, 0.14], 'sample_teacher2', 'میانگین مدت زمان سپری شده برای sample_teacher2 در سامانه', $isDoughnut))->renderChart();
                        $tempText .= $chart1;
                    }
                    else {
                        $chart1 = (new ChartJS_Pie(['14', '15', '16', /*1*/ '18', '20', '21', '22', /*2*/ '23', '24', '26', '27', /*3*/ '28', '30', '31', '32'], [0.41, 0.3, 0.25, /*1*/ 0.4, 0.52, 1.01, 0.66, /*2*/ 0.45, 0.53, 0.62, 1.86, /*3*/ 0.44, 0.49, 0.32, 0.62], 'sample_teacher2', 'میانگین مدت زمان سپری شده برای sample_teacher2 در سامانه', $isDoughnut))->renderChart();
                        $tempText .= $chart1;
                    }
                }
                else if (strpos($plot, 'line') >= 0) {
                    $isSmooth = $plot === 'line_smooth';

                    if ($timeGrouping === 'daily') {
                        $chart1 = (new ChartJS_Line(['89', '94', '97', /*1*/ '99', '100', '102', '117', /*2*/ '118', '119', '120', '121', /*3*/ '122', '123', '124', '126', /*4*/ '131', '137', '138', '139', /*5*/ '140', '141', '142', '143', /*6*/ '144', '145', '146', '148'], [0.09, 0.03, 0.25, /*1*/ 0.1, 0.03, 0.12, 0.2, /*2*/ 0.14, 0.15, 0.014, 0.011, /*3*/ 0.101, 0.109, 0.1, 0.02, /*4*/ 0.4, 0.181, 1.01, 0.014, /*5*/ 0.03, 0.018, 0.18, 0.1, /*6*/ 0.01, 0.03, 0.02, 0.14], 'sample_teacher2', 'میانگین مدت زمان سپری شده برای sample_teacher2 در سامانه', $isSmooth))->renderChart();
                        $tempText .= $chart1;
                    }
                    else {
                        $chart1 = (new ChartJS_Line(['14', '15', '16', /*1*/ '18', '20', '21', '22', /*2*/ '23', '24', '26', '27', /*3*/ '28', '30', '31', '32'], [0.41, 0.3, 0.25, /*1*/ 0.4, 0.52, 1.01, 0.66, /*2*/ 0.45, 0.53, 0.63, 1.86, /*3*/ 0.44, 0.49, 0.32, 0.62], 'sample_teacher2', 'میانگین مدت زمان سپری شده برای sample_teacher2 در سامانه', $isSmooth))->renderChart();
                        $tempText .= $chart1;
                    }
                }
            }
            else {
                $tempText .= '<div id="div_class">'.PHP_EOL."\t";
                $tempText .= '<h3 class="main_title">میانگین مدت زمان سپری شده در سامانه برای تمام مدرسان به صورت '.$timeText.'</h3>';

                if ($plot === 'bar') {
                    if ($timeGrouping === 'daily') {
                        $chart1 = (new ChartJS_Bar(['89', '94', '97', /*1*/ '99', '100', '102', '117', /*2*/ '118', '119', '120', '121', /*3*/ '122', '123', '124', '126', /*4*/ '131', '137', '138', '139', /*5*/ '140', '141', '142', '143', /*6*/ '144', '145', '146', '148'], [0.09, 0.03, 0.25, /*1*/ 0.1, 0.02, 0.12, 0.2, /*2*/ 0.14, 0.15, 0.014, 0.011, /*3*/ 0.101, 0.109, 0.1, 0.02, /*4*/ 0.4, 0.181, 1.01, 0.014, /*5*/ 0.03, 0.018, 0.18, 0.1, /*6*/ 0.01, 0.03, 0.02, 0.14], 'sample_teacher2', 'میانگین مدت زمان سپری شده برای sample_teacher2 در سامانه'))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Bar(['99', '100', '102', '117', /*2*/ '118', '119', '120', '121', /*3*/ '122', '123', '124', '126', /*4*/ '131', '137', '138', '139', /*5*/ '140', '141', '142', '143', /*6*/ '144', '145', '146', '148'], [ 0.03, 0.02, 0.12, 0.4, /*2*/ 0.14, 0.52, 0.014, 0.015, /*3*/ 0.101, 0.109, 0.1, 0.02, /*4*/ 0.35, 0.181, 0.71, 0.014, /*5*/ 0.04, 0.018, 0.14, 0.3, /*6*/ 0.02, 0.11, 0.09, 0.24], 'teacher4', 'میانگین مدت زمان سپری شده برای teacher4 در سامانه'))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Bar(['95', '101', '102', '110', /*2*/ '115', '117', '119', '121', /*3*/ '122', '123', '125', '127', /*4*/ '135', '137', '138', '139'], [ 0.03, 0.04, 0.09, 0.25, /*2*/ 0.19, 0.04, 0.024, 0.031, /*3*/ 0.11, 0.102, 0.05, 0.023, /*4*/ 0.251, 0.081, 0.31, 0.014], 'teacher5', 'میانگین مدت زمان سپری شده برای teacher5 در سامانه'))->renderChart();
                        $tempText .= $chart1;

                        $tempText .= '<h3 style="font-weight: normal">sample_teacher3 هیچ زمانی را در سامانه سپری نکرده است.</h3>';
                    }
                    else {
                        $chart1 = (new ChartJS_Bar(['13', '14', '15', '16', /*1*/ '18', '20', '21', '22', /*2*/ '23', '24', '26', '27', /*3*/ '28', '30', '31', '32'], [0.4, 0.41, 0.3, 0.25, /*1*/ 0.4, 0.52, 1.01, 0.66, /*2*/ 0.45, 0.53, 0.62, 1.86, /*3*/ 0.44, 0.49, 0.32, 0.62], 'sample_teacher2', 'میانگین مدت زمان سپری شده برای sample_teacher2 در سامانه'))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Bar(['11', '12', '14', '15', /*2*/ '16', '17', '19', '21', /*3*/ '22', '23', '24', '26'], [ 0.43, 0.22, 0.72, 1.04, /*2*/ 0.14, 0.42, 0.014, 0.15, /*3*/ 0.151, 0.19, 0.89, 0.52], 'teacher4', 'میانگین مدت زمان سپری شده برای teacher4 در سامانه'))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Bar(['10', '11', '12', '13', /*2*/ '14', '15', '16', '18', /*3*/ '19', '21', '23', '25', /*4*/ '26', '27', '28', '29', /*5*/ '31'], [ 0.19, 0.74, 0.6, 0.25, /*2*/ 0.19, 0.04, 0.024, 0.031, /*3*/ 0.11, 0.102, 0.05, 0.23, /*4*/ 0.351, 0.81, 0.31, 0.014, /*5*/ 0.9], 'teacher5', 'میانگین مدت زمان سپری شده برای teacher5 در سامانه'))->renderChart();
                        $tempText .= $chart1;

                        $tempText .= '<h3 style="font-weight: normal">sample_teacher3 هیچ زمانی را در سامانه سپری نکرده است.</h3>';
                    }
                }
                else if ($plot === 'pie' || $plot === 'doughnut') {
                    $isDoughnut = $plot === 'doughnut';

                    if ($timeGrouping === 'daily') {
                        $chart1 = (new ChartJS_Pie(['89', '94', '97', /*1*/ '99', '100', '102', '117', /*2*/ '118', '119', '120', '121', /*3*/ '122', '123', '124', '126', /*4*/ '131', '137', '138', '139', /*5*/ '140', '141', '142', '143', /*6*/ '144', '145', '146', '148'], [0.09, 0.03, 0.25, /*1*/ 0.1, 0.02, 0.12, 0.2, /*2*/ 0.14, 0.15, 0.014, 0.011, /*3*/ 0.101, 0.109, 0.1, 0.02, /*4*/ 0.4, 0.181, 1.01, 0.014, /*5*/ 0.03, 0.018, 0.18, 0.1, /*6*/ 0.01, 0.03, 0.02, 0.14], 'sample_teacher2', 'میانگین مدت زمان سپری شده برای sample_teacher2 در سامانه', $isDoughnut))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Pie(['99', '100', '102', '117', /*2*/ '118', '119', '120', '121', /*3*/ '122', '123', '124', '126', /*4*/ '131', '137', '138', '139', /*5*/ '140', '141', '142', '143', /*6*/ '144', '145', '146', '148'], [ 0.03, 0.02, 0.12, 0.4, /*2*/ 0.14, 0.52, 0.014, 0.015, /*3*/ 0.101, 0.109, 0.1, 0.02, /*4*/ 0.35, 0.181, 0.71, 0.014, /*5*/ 0.04, 0.018, 0.14, 0.3, /*6*/ 0.02, 0.11, 0.09, 0.24], 'teacher4', 'میانگین مدت زمان سپری شده برای teacher4 در سامانه', $isDoughnut))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Pie(['95', '101', '102', '110', /*2*/ '115', '117', '119', '121', /*3*/ '122', '123', '125', '127', /*4*/ '135', '137', '138', '139'], [ 0.03, 0.04, 0.09, 0.25, /*2*/ 0.19, 0.04, 0.024, 0.031, /*3*/ 0.11, 0.102, 0.05, 0.023, /*4*/ 0.251, 0.081, 0.31, 0.014], 'teacher5', 'میانگین مدت زمان سپری شده برای teacher5 در سامانه', $isDoughnut))->renderChart();
                        $tempText .= $chart1;

                        $tempText .= '<h3 style="font-weight: normal">sample_teacher3 هیچ زمانی را در سامانه سپری نکرده است.</h3>';
                    }
                    else {
                        $chart1 = (new ChartJS_Pie(['13', '14', '15', '16', /*1*/ '18', '20', '21', '22', /*2*/ '23', '24', '26', '27', /*3*/ '28', '30', '31', '32'], [0.4, 0.41, 0.3, 0.25, /*1*/ 0.4, 0.52, 1.01, 0.66, /*2*/ 0.45, 0.53, 0.62, 1.86, /*3*/ 0.44, 0.49, 0.32, 0.62], 'sample_teacher2', 'میانگین مدت زمان سپری شده برای sample_teacher2 در سامانه', $isDoughnut))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Pie(['11', '12', '14', '15', /*2*/ '16', '17', '19', '21', /*3*/ '22', '23', '24', '26'], [ 0.43, 0.22, 0.72, 1.04, /*2*/ 0.14, 0.42, 0.014, 0.15, /*3*/ 0.151, 0.19, 0.89, 0.52], 'teacher4', 'میانگین مدت زمان سپری شده برای teacher4 در سامانه', $isDoughnut))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Pie(['10', '11', '12', '13', /*2*/ '14', '15', '16', '18', /*3*/ '19', '21', '23', '25', /*4*/ '26', '27', '28', '29', /*5*/ '31'], [ 0.19, 0.74, 0.6, 0.25, /*2*/ 0.19, 0.04, 0.024, 0.031, /*3*/ 0.11, 0.102, 0.05, 0.23, /*4*/ 0.351, 0.81, 0.31, 0.014, /*5*/ 0.9], 'teacher5', 'میانگین مدت زمان سپری شده برای teacher5 در سامانه', $isDoughnut))->renderChart();
                        $tempText .= $chart1;

                        $tempText .= '<h3 style="font-weight: normal">sample_teacher3 هیچ زمانی را در سامانه سپری نکرده است.</h3>';
                    }
                }
                else if (strpos($plot, 'line') >= 0) {
                    $isSmooth = $plot === 'line_smooth';

                    if ($timeGrouping === 'daily') {
                        $chart1 = (new ChartJS_Line(['89', '94', '97', /*1*/ '99', '100', '102', '117', /*2*/ '118', '119', '120', '121', /*3*/ '122', '123', '124', '126', /*4*/ '131', '137', '138', '139', /*5*/ '140', '141', '142', '143', /*6*/ '144', '145', '146', '148'], [0.09, 0.03, 0.25, /*1*/ 0.1, 0.02, 0.12, 0.2, /*2*/ 0.14, 0.15, 0.014, 0.011, /*3*/ 0.101, 0.109, 0.1, 0.02, /*4*/ 0.4, 0.181, 1.01, 0.014, /*5*/ 0.03, 0.018, 0.18, 0.1, /*6*/ 0.01, 0.03, 0.02, 0.14], 'sample_teacher2', 'میانگین مدت زمان سپری شده برای sample_teacher2 در سامانه', $isSmooth))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Line(['99', '100', '102', '117', /*2*/ '118', '119', '120', '121', /*3*/ '122', '123', '124', '126', /*4*/ '131', '137', '138', '139', /*5*/ '140', '141', '142', '143', /*6*/ '144', '145', '146', '148'], [ 0.03, 0.02, 0.12, 0.4, /*2*/ 0.14, 0.52, 0.014, 0.015, /*3*/ 0.101, 0.109, 0.1, 0.02, /*4*/ 0.35, 0.181, 0.71, 0.014, /*5*/ 0.04, 0.018, 0.14, 0.3, /*6*/ 0.02, 0.11, 0.09, 0.24], 'teacher4', 'میانگین مدت زمان سپری شده برای teacher4 در سامانه', $isSmooth))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Line(['95', '101', '102', '110', /*2*/ '115', '117', '119', '121', /*3*/ '122', '123', '125', '127', /*4*/ '135', '137', '138', '139'], [ 0.03, 0.04, 0.09, 0.25, /*2*/ 0.19, 0.04, 0.024, 0.031, /*3*/ 0.11, 0.102, 0.05, 0.023, /*4*/ 0.251, 0.081, 0.31, 0.014], 'teacher5', 'میانگین مدت زمان سپری شده برای teacher5 در سامانه', $isSmooth))->renderChart();
                        $tempText .= $chart1;

                        $tempText .= '<h3 style="font-weight: normal">sample_teacher3 هیچ زمانی را در سامانه سپری نکرده است.</h3>';
                    }
                    else {
                        $chart1 = (new ChartJS_Line(['13', '14', '15', '16', /*1*/ '18', '20', '21', '22', /*2*/ '23', '24', '26', '27', /*3*/ '28', '30', '31', '32'], [0.4, 0.41, 0.3, 0.25, /*1*/ 0.4, 0.52, 1.01, 0.66, /*2*/ 0.45, 0.53, 0.62, 1.86, /*3*/ 0.44, 0.49, 0.32, 0.62], 'sample_teacher2', 'میانگین مدت زمان سپری شده برای sample_teacher2 در سامانه', $isSmooth))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Line(['11', '12', '14', '15', /*2*/ '16', '17', '19', '21', /*3*/ '22', '23', '24', '26'], [ 0.43, 0.22, 0.72, 1.04, /*2*/ 0.14, 0.42, 0.014, 0.15, /*3*/ 0.151, 0.19, 0.89, 0.52], 'teacher4', 'میانگین مدت زمان سپری شده برای teacher4 در سامانه', $isSmooth))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Line(['10', '11', '12', '13', /*2*/ '14', '15', '16', '18', /*3*/ '19', '21', '23', '25', /*4*/ '26', '27', '28', '29', /*5*/ '31'], [ 0.19, 0.74, 0.6, 0.25, /*2*/ 0.19, 0.04, 0.024, 0.031, /*3*/ 0.11, 0.102, 0.05, 0.23, /*4*/ 0.351, 0.81, 0.31, 0.014, /*5*/ 0.9], 'teacher5', 'میانگین مدت زمان سپری شده برای teacher5 در سامانه', $isSmooth))->renderChart();
                        $tempText .= $chart1;

                        $tempText .= '<h3 style="font-weight: normal">sample_teacher3 هیچ زمانی را در سامانه سپری نکرده است.</h3>';
                    }
                }
            }
            $tempText .= "\t\t".'</div>'."<br>";
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