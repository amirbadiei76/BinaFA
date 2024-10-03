<?php

require_once '../../../models/ChartJS_Bar.php';
require_once '../../../models/ChartJS_Pie.php';
require_once '../../../models/ChartJS_Line.php';
use Models\ChartJS_Bar;
use Models\ChartJS_Pie;
use Models\ChartJS_Line;

class StudentPreview {

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