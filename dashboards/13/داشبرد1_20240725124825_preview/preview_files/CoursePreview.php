<?php

require_once '../../../models/ChartJS_Bar.php';
require_once '../../../models/ChartJS_Pie.php';
require_once '../../../models/ChartJS_Line.php';
use Models\ChartJS_Bar;
use Models\ChartJS_Pie;
use Models\ChartJS_Line;

class CoursePreview {

    public function course_student_participants($user): string
    {
        $tempText = '';
        if ($user === 'user') {
            $tempText .= '<div id="div_class">' . PHP_EOL .
                "\t" . '<h3 class="main_title">تعداد فراگیران در دوره های sample_teacher</h3>' . PHP_EOL . "\t" . '<table class="data-table">' . PHP_EOL . "\t\t" . '<tr>' . PHP_EOL .
                "\t\t" . '<th>نام دوره</th>' . PHP_EOL . "\t\t" . '<th>تعداد فراگیران</th>' . "\t\t" . '</tr>';

            $tempText .= '<tr>' . '<td>logical_circuits_140302</td>' . '<td>20</td>' . '</tr>';
            $tempText .= '<tr>' . '<td>operating_systems_140302</td>' . '<td>15</td>' . '</tr>';
            $tempText .= '<tr>' . '<td>algorithm_design_140302</td>' . '<td>18</td>' . '</tr>';

        } else {
            $tempText .= '<div id="div_class">' . PHP_EOL .
                "\t" . '<h3 class="main_title">تعداد فراگیران در تمام دوره ها</h3>' . PHP_EOL .
                "\t" . '<table class="data-table">' . PHP_EOL . "\t\t" . '<tr>' . PHP_EOL .
                "\t\t" . '<th>نام دوره</th>' . PHP_EOL . "\t\t" . '<th>تعداد فراگیران</th>' . "\t\t" . '</tr>';

            $tempText .= '<tr>' . '<td>software_engineering_140302</td>' . '<td>20</td>' . '</tr>';
            $tempText .= '<tr>' . '<td>system_validation_140302</td>' . '<td>25</td>' . '</tr>';
            $tempText .= '<tr>' . '<td>database_140302</td>' . '<td>17</td>' . '</tr>';

            $tempText .= '<tr>' . '<td>logical_circuits_140302</td>' . '<td>20</td>' . '</tr>';
            $tempText .= '<tr>' . '<td>operating_systems_140302</td>' . '<td>15</td>' . '</tr>';
            $tempText .= '<tr>' . '<td>algorithm_design_140302</td>' . '<td>18</td>' . '</tr>';
        }
        $tempText .= "\t" . '</table>' . PHP_EOL . '</div>' . '<br>';
        return $tempText;

	}
    public function course_student_activity_to_view_percentage($user, $plot, $group): string
    {
        $tempText = '';
        if ($plot === 'table') {
            if ($user === 'user') {
                $tempText .= '<div id="div_class">' . PHP_EOL .
                    "\t" . '<h3 class="main_title">نسبت فعالیت  به بازدید فراگیران در دوره های sample_teacher</h3>' . PHP_EOL .
                    "\t" . '<table class="data-table">' . PHP_EOL . "\t\t" . '<tr>' . PHP_EOL .
                    "\t\t" . '<th>نام دوره</th>' . PHP_EOL . "\t\t" . '<th>تعداد فعالیت ها</th>' . PHP_EOL . "\t\t" . '<th>تعداد بازدید</th>' . PHP_EOL . "\t\t" . '<th>نسبت فعالیت به بازدید</th>' . PHP_EOL . "\t\t" . '</tr>';

                $tempText .= '<tr>' . '<td>algorithm_design</td>' . '<td>10</td>' . '<td>183</td>' . '<td>0.05</td>' . '</tr>';
                $tempText .= '<tr>' . '<td>database</td>' . '<td>14</td>' . '<td>123</td>' . '<td>0.11</td>' . '</tr>';

            } else {
                $tempText .= '<div id="div_class">' . PHP_EOL .
                    "\t" . '<h3 class="main_title">نسبت فعالیت به بازدید در تمام دوره ها</h3>' . PHP_EOL .
                    "\t" . '<table class="data-table">' . PHP_EOL . "\t\t" . '<tr>' . PHP_EOL .
                    "\t\t" . '<th>نام دوره</th>' . PHP_EOL . "\t\t" . '<th>تعداد فعالیت ها</th>' . PHP_EOL . "\t\t" . '<th>تعداد بازدید</th>' . PHP_EOL . "\t\t" . '<th>نسبت فعالیت به بازدید</th>' . PHP_EOL . "\t\t" . '</tr>';

                $tempText .= '<tr>' . '<td>operating_systems</td>' . '<td>18</td>' . '<td>191</td>' . '<td>0.09</td>' . '</tr>';
                $tempText .= '<tr>' . '<td>advanced_programming</td>' . '<td>26</td>' . '<td>211</td>' . '<td>0.12</td>' . '</tr>';

                $tempText .= '<tr>' . '<td>algorithm_design</td>' . '<td>10</td>' . '<td>183</td>' . '<td>0.05</td>' . '</tr>';
                $tempText .= '<tr>' . '<td>database</td>' . '<td>14</td>' . '<td>123</td>' . '<td>0.11</td>' . '</tr>';
            }
            $tempText .= "\t" . '</table>' . PHP_EOL . '</div>' . '<br>';
        } else {
            $timeText = 'روزانه';
            if ($group === 'weekly') $timeText = 'هفتگی';

            if ($user === 'user') {
                $tempText .= '<div id="div_class">' . PHP_EOL .
                    "\t" . '<h3 class="main_title">نسبت فعالیت به بازدید فراگیران در دوره های sample_teacher به صورت ' . $timeText . '</h3>' . PHP_EOL . "\t";

                if ($plot === 'bar') {
                    if ($group === 'daily') {
                        $chart = (new ChartJS_Bar(['68', '72', '75', '78', '81', '84', '86', '90'], [0.17, 0.02, 0.26, 0.31, 0.16, 0.23, 0.03, 0.12], 'operating_systems', 'نسبت فعالیت به بازدید فراگیران در دوره operating_systems'))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Bar(['76', '78', '79', '81', '82', '83', '86', '88', '91', '92'], [0.37, 0.11, 0.27, 0.04, 0.19, 0.33, 0.13, 0.42, 0.15, 0.22], 'project_management', 'نسبت فعالیت به بازدید فراگیران در دوره project_management'))->renderChart();
                        $tempText .= $chart;
                    } else {
                        $chart = (new ChartJS_Bar(['5', '7', '10', '12', '13', '14'], [0.15, 0.09, 0.11, 0.21, 0.26, 0.33], 'operating_systems', 'نسبت فعالیت به بازدید فراگیران در دوره operating_systems'))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Bar(['10', '12', '13', '14', '16', '17', '18', '21', '22', '23', '25'], [0.27, 0.17, 0.31, 0.01, 0.13, 0.23, 0.03, 0.12, 0.18, 0.36, 0.09], 'project_management', 'نسبت فعالیت به بازدید فراگیران در دوره project_management'))->renderChart();
                        $tempText .= $chart;
                    }
                } else if ($plot === 'pie' || $plot === 'doughnut') {
                    $isDoughnut = $plot === 'doughnut';

                    if ($group === 'daily') {
                        $chart = (new ChartJS_Pie(['68', '72', '75', '78', '81', '84', '86', '90'], [0.17, 0.02, 0.26, 0.31, 0.16, 0.23, 0.03, 0.12], 'operating_systems', 'نسبت فعالیت به بازدید فراگیران در دوره operating_systems', $isDoughnut))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Pie(['76', '78', '79', '81', '82', '83', '86', '88', '91', '92'], [0.37, 0.11, 0.27, 0.04, 0.19, 0.33, 0.13, 0.42, 0.15, 0.22], 'project_management', 'نسبت فعالیت به بازدید فراگیران در دوره project_management', $isDoughnut))->renderChart();
                        $tempText .= $chart;
                    } else {
                        $chart = (new ChartJS_Pie(['5', '7', '10', '12', '13', '14'], [0.15, 0.09, 0.11, 0.21, 0.26, 0.33], 'operating_systems', 'نسبت فعالیت به بازدید فراگیران در دوره operating_systems', $isDoughnut))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Pie(['10', '12', '13', '14', '16', '17', '18', '21', '22', '23', '25'], [0.27, 0.17, 0.31, 0.01, 0.13, 0.23, 0.03, 0.12, 0.18, 0.36, 0.09], 'project_management', 'نسبت فعالیت به بازدید فراگیران در دوره project_management', $isDoughnut))->renderChart();
                        $tempText .= $chart;
                    }
                } else if (strpos($plot, 'line') >= 0) {
                    $isSmooth = $plot === 'line_smooth';

                    if ($group === 'daily') {
                        $chart = (new ChartJS_Line(['68', '72', '75', '78', '81', '84', '86', '90'], [0.17, 0.02, 0.26, 0.31, 0.16, 0.23, 0.03, 0.12], 'operating_systems', 'نسبت فعالیت به بازدید فراگیران در دوره operating_systems', $isSmooth))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Line(['76', '78', '79', '81', '82', '83', '86', '88', '91', '92'], [0.37, 0.11, 0.27, 0.04, 0.19, 0.33, 0.13, 0.42, 0.15, 0.22], 'project_management', 'نسبت فعالیت به بازدید فراگیران در دوره project_management', $isSmooth))->renderChart();
                        $tempText .= $chart;
                    } else {
                        $chart = (new ChartJS_Line(['5', '7', '10', '12', '13', '14'], [0.15, 0.09, 0.11, 0.21, 0.26, 0.33], 'operating_systems', 'نسبت فعالیت به بازدید فراگیران در دوره operating_systems', $isSmooth))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Line(['10', '12', '13', '14', '16', '17', '18', '21', '22', '23', '25'], [0.27, 0.17, 0.31, 0.01, 0.13, 0.23, 0.03, 0.12, 0.18, 0.36, 0.09], 'project_management', 'نسبت فعالیت به بازدید فراگیران در دوره project_management', $isSmooth))->renderChart();
                        $tempText .= $chart;
                    }
                }
            } else {
                $tempText .= '<div id="div_class">' . PHP_EOL .
                    "\t" . '<h3 class="main_title">نسبت فعالیت به بازدید فراگیران در تمام دوره ها به صورت ' . $timeText . '</h3>' . PHP_EOL .
                    "\t";

                if ($plot === 'bar') {
                    if ($group === 'daily') {
                        $chart = (new ChartJS_Bar(['73', '76', '78', '81', '84', '86', '89', '93'], [0.27, 0.12, 0.36, 0.01, 0.36, 0.25, 0.13, 0.1], 'compiler', 'نسبت فعالیت به بازدید فراگیران در دوره compiler'))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Bar(['68', '72', '75', '78', '81', '84', '86', '90'], [0.17, 0.02, 0.26, 0.31, 0.16, 0.23, 0.03, 0.12], 'operating_systems', 'نسبت فعالیت به بازدید فراگیران در دوره operating_systems'))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Bar(['76', '78', '79', '81', '82', '83', '86', '88', '91', '92'], [0.37, 0.11, 0.27, 0.04, 0.19, 0.33, 0.13, 0.42, 0.15, 0.22], 'project_management', 'نسبت فعالیت به بازدید فراگیران در دوره project_management'))->renderChart();
                        $tempText .= $chart;
                    } else {
                        $chart = (new ChartJS_Bar(['11', '16', '18', '21', '24', '26', '29', '34'], [0.37, 0.42, 0.21, 0.04, 0.16, 0.29, 0.14, 0.29], 'compiler', 'نسبت فعالیت به بازدید فراگیران در دوره compiler'))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Bar(['5', '7', '10', '12', '13', '14'], [0.15, 0.09, 0.11, 0.21, 0.26, 0.33], 'operating_systems', 'نسبت فعالیت به بازدید فراگیران در دوره operating_systems'))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Bar(['10', '12', '13', '14', '16', '17', '18', '21', '22', '23', '25'], [0.27, 0.17, 0.31, 0.01, 0.13, 0.23, 0.03, 0.12, 0.18, 0.36, 0.09], 'project_management', 'نسبت فعالیت به بازدید فراگیران در دوره project_management'))->renderChart();
                        $tempText .= $chart;
                    }
                } else if ($plot === 'pie' || $plot === 'doughnut') {
                    $isDoughnut = $plot === 'doughnut';

                    if ($group === 'daily') {
                        $chart = (new ChartJS_Pie(['73', '76', '78', '81', '84', '86', '89', '93'], [0.27, 0.12, 0.36, 0.01, 0.36, 0.25, 0.13, 0.1], 'compiler', 'نسبت فعالیت به بازدید فراگیران در دوره compiler', $isDoughnut))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Pie(['68', '72', '75', '78', '81', '84', '86', '90'], [0.17, 0.02, 0.26, 0.31, 0.16, 0.23, 0.03, 0.12], 'operating_systems', 'نسبت فعالیت به بازدید فراگیران در دوره operating_systems', $isDoughnut))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Pie(['76', '78', '79', '81', '82', '83', '86', '88', '91', '92'], [0.37, 0.11, 0.27, 0.04, 0.19, 0.33, 0.13, 0.42, 0.15, 0.22], 'project_management', 'نسبت فعالیت به بازدید فراگیران در دوره project_management', $isDoughnut))->renderChart();
                        $tempText .= $chart;
                    } else {
                        $chart = (new ChartJS_Pie(['11', '16', '18', '21', '24', '26', '29', '34'], [0.37, 0.42, 0.21, 0.04, 0.16, 0.29, 0.14, 0.29], 'compiler', 'نسبت فعالیت به بازدید فراگیران در دوره compiler', $isDoughnut))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Pie(['5', '7', '10', '12', '13', '14'], [0.15, 0.09, 0.11, 0.21, 0.26, 0.33], 'operating_systems', 'نسبت فعالیت به بازدید فراگیران در دوره operating_systems', $isDoughnut))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Pie(['10', '12', '13', '14', '16', '17', '18', '21', '22', '23', '25'], [0.27, 0.17, 0.31, 0.01, 0.13, 0.23, 0.03, 0.12, 0.18, 0.36, 0.09], 'project_management', 'نسبت فعالیت به بازدید فراگیران در دوره project_management', $isDoughnut))->renderChart();
                        $tempText .= $chart;
                    }
                } else if (strpos($plot, 'line') >= 0) {
                    $isSmooth = $plot === 'line_smooth';

                    if ($group === 'daily') {
                        $chart = (new ChartJS_Line(['73', '76', '78', '81', '84', '86', '89', '93'], [0.27, 0.12, 0.36, 0.01, 0.36, 0.25, 0.13, 0.1], 'compiler', 'نسبت فعالیت به بازدید فراگیران در دوره compiler', $isSmooth))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Line(['68', '72', '75', '78', '81', '84', '86', '90'], [0.17, 0.02, 0.26, 0.31, 0.16, 0.23, 0.03, 0.12], 'operating_systems', 'نسبت فعالیت به بازدید فراگیران در دوره operating_systems', $isSmooth))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Line(['76', '78', '79', '81', '82', '83', '86', '88', '91', '92'], [0.37, 0.11, 0.27, 0.04, 0.19, 0.33, 0.13, 0.42, 0.15, 0.22], 'project_management', 'نسبت فعالیت به بازدید فراگیران در دوره project_management', $isSmooth))->renderChart();
                        $tempText .= $chart;
                    } else {
                        $chart = (new ChartJS_Line(['11', '16', '18', '21', '24', '26', '29', '34'], [0.37, 0.42, 0.21, 0.04, 0.16, 0.29, 0.14, 0.29], 'compiler', 'نسبت فعالیت به بازدید فراگیران در دوره compiler', $isSmooth))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Line(['5', '7', '10', '12', '13', '14'], [0.15, 0.09, 0.11, 0.21, 0.26, 0.33], 'operating_systems', 'نسبت فعالیت به بازدید فراگیران در دوره operating_systems', $isSmooth))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Line(['10', '12', '13', '14', '16', '17', '18', '21', '22', '23', '25'], [0.27, 0.17, 0.31, 0.01, 0.13, 0.23, 0.03, 0.12, 0.18, 0.36, 0.09], 'project_management', 'نسبت فعالیت به بازدید فراگیران در دوره project_management', $isSmooth))->renderChart();
                        $tempText .= $chart;
                    }
                }
            }
            $tempText .= "\t" . PHP_EOL . '</div>' . '<br>';
        }
        return $tempText;

	}
    public function course_student_activity_percentage($user, $plot, $group): string
    {
        $tempText = '';
        if ($plot === 'table') {
            if ($user === 'user') {
                $tempText .= '<div id="div_class">' . PHP_EOL .
                    "\t" . '<h3 class="main_title">درصد فعالیت فراگیران در دوره های sample_teacher</h3>' . PHP_EOL .
                    "\t" . '<table class="data-table">' . PHP_EOL . "\t\t" . '<tr>' . PHP_EOL .
                    "\t\t" . '<th>نام دوره</th>' . PHP_EOL . "\t\t" . '<th>درصد فعالیت ها</th>' . PHP_EOL . "\t\t" . '</tr>';

                $tempText .= '<tr>' . '<td>algorithm_design</td>' . '<td>24.50%</td>' . '</tr>';
                $tempText .= '<tr>' . '<td>database</td>' . '<td>33.34%</td>' . '</tr>';
            } else {
                $tempText .= '<div id="div_class">' . PHP_EOL .
                    "\t" . '<h3 class="main_title">درصد فعالیت فراگیران در تمام دوره ها</h3>' . PHP_EOL .
                    "\t" . '<table class="data-table">' . PHP_EOL . "\t\t" . '<tr>' . PHP_EOL .
                    "\t\t" . '<th>نام دوره</th>' . PHP_EOL . "\t\t" . '<th>درصد فعالیت ها</th>' . PHP_EOL . "\t\t" . '</tr>';
                $tempText .= '<tr>' . '<td>operating_systems</td>' . '<td>52.00%</td>' . '</tr>';
                $tempText .= '<tr>' . '<td>logical_circuits</td>' . '<td>20.55%</td>' . '</tr>';

                $tempText .= '<tr>' . '<td>algorithm_design</td>' . '<td>24.50%</td>' . '</tr>';
                $tempText .= '<tr>' . '<td>database</td>' . '<td>33.34%</td>' . '</tr>';
            }
            $tempText .= "\t" . '</table>' . PHP_EOL . '</div>' . '<br>';
        } else {
            $timeText = 'روزانه';
            if ($group === 'weekly') $timeText = 'هفتگی';

            if ($user === 'user') {
                $tempText .= '<div id="div_class">' . PHP_EOL .
                    "\t" . '<h3 class="main_title">درصد فعالیت فراگیران در دوره های sample_teacher به صورت ' . $timeText . '</h3>' . PHP_EOL . "\t";


                if ($plot === 'bar') {
                    if ($group === 'daily') {
                        $chart = (new ChartJS_Bar(['70', '74', '81', '83', '95', '102', '110', '112', '115'], [83, 62, 19, 28, 71, 92, 23, 49, 27], 'database', 'درصد فعالیت فراگیران در دوره database'))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Bar(['72', '73', '76', '83', '91', '106', '113'], [34, 69, 26, 38, 41, 12, 53], 'algorithm', 'درصد فعالیت فراگیران در دوره algorithm'))->renderChart();
                        $tempText .= $chart;
                    } else {
                        $chart = (new ChartJS_Bar(['10', '11', '14', '15', '16', '17'], [23, 39, 18, 51, 92, 49], 'database', 'درصد فعالیت فراگیران در دوره database'))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Bar(['12', '14', '15', '18', '21', '22', '23'], [44, 11, 26, 78, 36, 82, 53], 'algorithm', 'درصد فعالیت فراگیران در دوره algorithm'))->renderChart();
                        $tempText .= $chart;
                    }
                } else if ($plot === 'pie' || $plot === 'doughnut') {
                    $isDoughnut = $plot === 'doughnut';

                    if ($group === 'daily') {
                        $chart = (new ChartJS_Pie(['70', '74', '81', '83', '95', '102', '110', '112', '115'], [83, 62, 19, 28, 71, 92, 23, 49, 27], 'database', 'درصد فعالیت فراگیران در دوره database', $isDoughnut))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Pie(['72', '73', '76', '83', '91', '106', '113'], [34, 69, 26, 38, 41, 12, 53], 'algorithm', 'درصد فعالیت فراگیران در دوره algorithm', $isDoughnut))->renderChart();
                        $tempText .= $chart;
                    } else {
                        $chart = (new ChartJS_Pie(['10', '11', '14', '15', '16', '17'], [23, 39, 18, 51, 92, 49], 'database', 'درصد فعالیت فراگیران در دوره database', $isDoughnut))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Pie(['12', '14', '15', '18', '21', '22', '23'], [44, 11, 26, 78, 36, 82, 53], 'algorithm', 'درصد فعالیت فراگیران در دوره algorithm', $isDoughnut))->renderChart();
                        $tempText .= $chart;
                    }
                } else if (strpos($plot, 'line') >= 0) {
                    $isSmooth = $plot === 'line_smooth';

                    if ($group === 'daily') {
                        $chart = (new ChartJS_Line(['70', '74', '81', '83', '95', '102', '110', '112', '115'], [83, 62, 19, 28, 71, 92, 23, 49, 27], 'database', 'درصد فعالیت فراگیران در دوره database', $isSmooth))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Line(['72', '73', '76', '83', '91', '106', '113'], [34, 69, 26, 38, 41, 12, 53], 'algorithm', 'درصد فعالیت فراگیران در دوره algorithm', $isSmooth))->renderChart();
                        $tempText .= $chart;
                    } else {
                        $chart = (new ChartJS_Line(['10', '11', '14', '15', '16', '17'], [23, 39, 18, 51, 92, 49], 'database', 'درصد فعالیت فراگیران در دوره database', $isSmooth))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Line(['12', '14', '15', '18', '21', '22', '23'], [44, 11, 26, 78, 36, 82, 53], 'algorithm', 'درصد فعالیت فراگیران در دوره algorithm', $isSmooth))->renderChart();
                        $tempText .= $chart;
                    }
                }
            } else {
                $tempText .= '<div id="div_class">' . PHP_EOL .
                    "\t" . '<h3 class="main_title">درصد فعالیت فراگیران در تمام دوره ها به صورت ' . $timeText . '</h3>' . PHP_EOL .
                    "\t";

                if ($plot === 'bar') {
                    if ($group === 'daily') {
                        $chart = (new ChartJS_Bar(['80', '83', '86', '89', '91', '92', '100', '102', '105'], [13, 42, 29, 68, 31, 72, 43, 49, 27], 'operating_systems', 'درصد فعالیت فراگیران در دوره operating_systems'))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Bar(['81', '84', '87', '88', '93', '95', '102', '106', '108'], [21, 32, 83, 78, 61, 52, 41, 69, 77], 'advanced_programming', 'درصد فعالیت فراگیران در دوره advanced_programming'))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Bar(['70', '74', '81', '83', '95', '102', '110', '112', '115'], [83, 62, 19, 28, 71, 92, 23, 49, 27], 'database', 'درصد فعالیت فراگیران در دوره database'))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Bar(['72', '73', '76', '83', '91', '106', '113'], [34, 69, 26, 38, 41, 12, 53], 'algorithm', 'درصد فعالیت فراگیران در دوره algorithm'))->renderChart();
                        $tempText .= $chart;
                    } else {
                        $chart = (new ChartJS_Bar(['8', '11', '14', '15', '18', '19', '23', '24', '25'], [63, 44, 30, 58, 41, 62, 23, 39, 21], 'operating_systems', 'درصد فعالیت فراگیران در دوره operating_systems'))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Bar(['9', '12', '13', '15', '17', '18', '19', '22', '25', '26'], [19, 35, 53, 48, 9, 13, 73, 61, 77, 25], 'advanced_programming', 'درصد فعالیت فراگیران در دوره advanced_programming'))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Bar(['10', '11', '14', '15', '16', '17'], [0.23, 0.39, 0.18, 0.51, 0.92, 0.49], 'database', 'درصد فعالیت فراگیران در دوره database'))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Bar(['12', '14', '15', '18', '21', '22', '23'], [0.44, 0.11, 0.26, 0.78, 0.36, 0.82, 0.53], 'algorithm', 'درصد فعالیت فراگیران در دوره algorithm'))->renderChart();
                        $tempText .= $chart;
                    }
                } else if ($plot === 'pie' || $plot === 'doughnut') {
                    $isDoughnut = $plot === 'doughnut';

                    if ($group === 'daily') {
                        $chart = (new ChartJS_Pie(['80', '83', '86', '89', '91', '92', '100', '102', '105'], [13, 42, 29, 68, 31, 72, 43, 49, 27], 'operating_systems', 'درصد فعالیت فراگیران در دوره operating_systems', $isDoughnut))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Pie(['81', '84', '87', '88', '93', '95', '102', '106', '108'], [21, 32, 83, 78, 61, 52, 41, 69, 77], 'advanced_programming', 'درصد فعالیت فراگیران در دوره advanced_programming', $isDoughnut))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Pie(['70', '74', '81', '83', '95', '102', '110', '112', '115'], [83, 62, 19, 28, 71, 92, 23, 49, 27], 'database', 'درصد فعالیت فراگیران در دوره database', $isDoughnut))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Pie(['72', '73', '76', '83', '91', '106', '113'], [34, 69, 26, 38, 41, 12, 53], 'algorithm', 'درصد فعالیت فراگیران در دوره algorithm', $isDoughnut))->renderChart();
                        $tempText .= $chart;
                    } else {
                        $chart = (new ChartJS_Pie(['8', '11', '14', '15', '18', '19', '23', '24', '25'], [63, 44, 30, 58, 41, 62, 23, 39, 21], 'operating_systems', 'درصد فعالیت فراگیران در دوره operating_systems', $isDoughnut))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Pie(['9', '12', '13', '15', '17', '18', '19', '22', '25', '26'], [19, 35, 53, 48, 9, 13, 73, 61, 77, 25], 'advanced_programming', 'درصد فعالیت فراگیران در دوره advanced_programming', $isDoughnut))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Pie(['10', '11', '14', '15', '16', '17'], [0.23, 0.39, 0.18, 0.51, 0.92, 0.49], 'database', 'درصد فعالیت فراگیران در دوره database', $isDoughnut))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Pie(['12', '14', '15', '18', '21', '22', '23'], [0.44, 0.11, 0.26, 0.78, 0.36, 0.82, 0.53], 'algorithm', 'درصد فعالیت فراگیران در دوره algorithm', $isDoughnut))->renderChart();
                        $tempText .= $chart;
                    }
                } else if (strpos($plot, 'line') >= 0) {
                    $isSmooth = $plot === 'line_smooth';

                    if ($group === 'daily') {
                        $chart = (new ChartJS_Line(['80', '83', '86', '89', '91', '92', '100', '102', '105'], [13, 42, 29, 68, 31, 72, 43, 49, 27], 'operating_systems', 'درصد فعالیت فراگیران در دوره operating_systems', $isSmooth))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Line(['81', '84', '87', '88', '93', '95', '102', '106', '108'], [21, 32, 83, 78, 61, 52, 41, 69, 77], 'advanced_programming', 'درصد فعالیت فراگیران در دوره advanced_programming', $isSmooth))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Line(['70', '74', '81', '83', '95', '102', '110', '112', '115'], [83, 62, 19, 28, 71, 92, 23, 49, 27], 'database', 'درصد فعالیت فراگیران در دوره database', $isSmooth))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Line(['72', '73', '76', '83', '91', '106', '113'], [34, 69, 26, 38, 41, 12, 53], 'algorithm', 'درصد فعالیت فراگیران در دوره algorithm', $isSmooth))->renderChart();
                        $tempText .= $chart;
                    } else {
                        $chart = (new ChartJS_Line(['8', '11', '14', '15', '18', '19', '23', '24', '25'], [63, 44, 30, 58, 41, 62, 23, 39, 21], 'operating_systems', 'درصد فعالیت فراگیران در دوره operating_systems', $isSmooth))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Line(['9', '12', '13', '15', '17', '18', '19', '22', '25', '26'], [19, 35, 53, 48, 9, 13, 73, 61, 77, 25], 'advanced_programming', 'درصد فعالیت فراگیران در دوره advanced_programming', $isSmooth))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Line(['10', '11', '14', '15', '16', '17'], [0.23, 0.39, 0.18, 0.51, 0.92, 0.49], 'database', 'درصد فعالیت فراگیران در دوره database', $isSmooth))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Line(['12', '14', '15', '18', '21', '22', '23'], [0.44, 0.11, 0.26, 0.78, 0.36, 0.82, 0.53], 'algorithm', 'درصد فعالیت فراگیران در دوره algorithm', $isSmooth))->renderChart();
                        $tempText .= $chart;
                    }
                }
            }
            $tempText .= "\t" . PHP_EOL . '</div>' . '<br>';
        }
        return $tempText;

	}
    public function course_view_count($user, $plot, $group): string
    {
        $tempText = '';

        if ($plot === 'total') {
            if ($user === 'user') {
                $tempText .= '<div id="div_class">' . PHP_EOL .
                    "\t" . '<h3 class="main_title">تعداد بازدید از دوره های sample_teacher</h3>' . PHP_EOL . "\t" . '<table class="data-table">' . PHP_EOL . "\t\t" . '<tr>' . PHP_EOL .
                    "\t\t" . '<th>نام دوره</th>' . PHP_EOL . "\t\t" . '<th>تعداد بازدید</th>' . "\t\t" . '</tr>';

                $tempText .= '<tr>' . '<td>algorithm_design_140302</td>' . '<td>54</td>' . '</tr>';
                $tempText .= '<tr>' . '<td>database_140302</td>' . '<td>43</td>' . '</tr>';
            } else {
                $tempText .= '<div id="div_class">' . PHP_EOL .
                    "\t" . '<h3 class="main_title">تعداد بازدید از دوره برای تمام دوره ها</h3>' . PHP_EOL . "\t" . '<table class="data-table">' . PHP_EOL . "\t\t" . '<tr>' . PHP_EOL .
                    "\t\t" . '<th>نام دوره</th>' . PHP_EOL . "\t\t" . '<th>تعداد بازدید</th>' . "\t\t" . '</tr>';


                $tempText .= '<tr>' . '<td>logical_circuits_140302</td>' . '<td>69</td>' . '</tr>';
                $tempText .= '<tr>' . '<td>system_validation_140302</td>' . '<td>39</td>' . '</tr>';

                $tempText .= '<tr>' . '<td>software_engineering_140302</td>' . '<td>72</td>' . '</tr>';

                $tempText .= '<tr>' . '<td>algorithm_design_140302</td>' . '<td>54</td>' . '</tr>';
                $tempText .= '<tr>' . '<td>database_140302</td>' . '<td>43</td>' . '</tr>';
            }
            $tempText .= "\t" . '</table>' . PHP_EOL . '</div>' . '<br>';
        } else {
            $timeText = 'روزانه';
            if ($group === 'weekly') $timeText = 'هفتگی';

            if ($user === 'user') {
                $tempText .= '<div id="div_class">' . PHP_EOL .
                    "\t" . '<h3 class="main_title">تعداد بازدید از دوره های sample_teacher به صورت ' . $timeText . '</h3>' . PHP_EOL . "\t";

                if ($plot === 'bar') {
                    if ($group === 'daily') {
                        $chart = (new ChartJS_Bar(['65', '72', '77', '94', '96', '99', '118', '143', '144', '150'], [1, 2, 1, 3, 4, 5, 2, 6, 3, 1], 'algorithm_140302', 'تعداد بازدید از دوره algorithm_140302'))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Bar(['75', '76', '95', '98', '100', '120', '123', '135', '140'], [1, 2, 4, 3, 4, 2, 1, 2, 3], 'database_140302', 'تعداد بازدید از دوره database_140302'))->renderChart();
                        $tempText .= $chart;
                    } else {
                        $chart = (new ChartJS_Bar(['13', '14', '15', '16', '17', '18'], [10, 12, 9, 13, 11, 14], 'algorithm_140302', 'تعداد بازدید از دوره algorithm_140302'))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Bar(['12', '15', '17', '18', '21', '23', '25'], [8, 10, 13, 15, 9, 14, 12], 'database_140302', 'تعداد بازدید از دوره database_140302'))->renderChart();
                        $tempText .= $chart;
                    }
                } else if ($plot === 'pie' || $plot === 'doughnut') {
                    $isDoughnut = $plot === 'doughnut';

                    if ($group === 'daily') {
                        $chart = (new ChartJS_Pie(['65', '72', '77', '94', '96', '99', '118', '143', '144', '150'], [1, 2, 1, 3, 4, 5, 2, 6, 3, 1], 'algorithm_140302', 'تعداد بازدید از دوره algorithm_140302', $isDoughnut))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Pie(['75', '76', '95', '98', '100', '120', '123', '135', '140'], [1, 2, 4, 3, 4, 2, 1, 2, 3], 'database_140302', 'تعداد بازدید از دوره database_140302', $isDoughnut))->renderChart();
                        $tempText .= $chart;
                    } else {
                        $chart = (new ChartJS_Pie(['13', '14', '15', '16', '17', '18'], [10, 12, 9, 13, 11, 14], 'algorithm_140302', 'تعداد بازدید از دوره algorithm_140302', $isDoughnut))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Pie(['12', '15', '17', '18', '21', '23', '25'], [8, 10, 13, 15, 9, 14, 12], 'database_140302', 'تعداد بازدید از دوره database_140302', $isDoughnut))->renderChart();
                        $tempText .= $chart;
                    }
                } else if (strpos($plot, 'line') >= 0) {
                    $isSmooth = $plot === 'line_smooth';

                    if ($group === 'daily') {
                        $chart = (new ChartJS_Line(['65', '72', '77', '94', '96', '99', '118', '143', '144', '150'], [1, 2, 1, 3, 4, 5, 2, 6, 3, 1], 'algorithm_140302', 'تعداد بازدید از دوره algorithm_140302', $isSmooth))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Line(['75', '76', '95', '98', '100', '120', '123', '135', '140'], [1, 2, 4, 3, 4, 2, 1, 2, 3], 'database_140302', 'تعداد بازدید از دوره database_140302', $isSmooth))->renderChart();
                        $tempText .= $chart;
                    } else {
                        $chart = (new ChartJS_Line(['13', '14', '15', '16', '17', '18'], [10, 12, 9, 13, 11, 14], 'algorithm_140302', 'تعداد بازدید از دوره algorithm_140302', $isSmooth))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Line(['12', '15', '17', '18', '21', '23', '25'], [8, 10, 13, 15, 9, 14, 12], 'database_140302', 'تعداد بازدید از دوره database_140302', $isSmooth))->renderChart();
                        $tempText .= $chart;
                    }
                }
            } else {
                $tempText .= '<div id="div_class">' . PHP_EOL .
                    "\t" . '<h3 class="main_title">تعداد بازدید از تمام دوره ها بر اساس ' . $timeText . '</h3>' . PHP_EOL .
                    "\t";

                if ($plot === 'bar') {
                    if ($group === 'daily') {
                        $chart = (new ChartJS_Bar(['62', '65', '74', '84', '91', '96', '98', '103', '104', '110', '111'], [3, 2, 3, 5, 2, 4, 1, 4, 1, 3, 2], 'logical_circuits_140302', 'تعداد بازدید از دوره logical_circuits_140302'))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Bar(['65', '72', '77', '94', '96', '99', '118', '143', '144', '150'], [1, 2, 1, 3, 4, 5, 2, 6, 3, 1], 'algorithm_140302', 'تعداد بازدید از دوره algorithm_140302'))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Bar(['75', '76', '95', '98', '100', '120', '123', '135', '140'], [1, 2, 4, 3, 4, 2, 1, 2, 3], 'database_140302', 'تعداد بازدید از دوره database_140302'))->renderChart();
                        $tempText .= $chart;
                    } else {
                        $chart = (new ChartJS_Bar(['12', '13', '14', '15', '16', '17', '18', '20', '21', '23'], [9, 10, 8, 12, 11, 7, 8, 9, 11, 10], 'logical_circuits_140302', 'تعداد بازدید از دوره logical_circuits_140302'))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Bar(['13', '14', '15', '16', '17', '18'], [10, 12, 9, 13, 11, 14], 'algorithm_140302', 'تعداد بازدید از دوره algorithm_140302'))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Bar(['12', '15', '17', '18', '21', '23', '25'], [8, 10, 13, 15, 9, 14, 12], 'database_140302', 'تعداد بازدید از دوره database_140302'))->renderChart();
                        $tempText .= $chart;
                    }
                } else if ($plot === 'pie' || $plot === 'doughnut') {
                    $isDoughnut = $plot === 'doughnut';

                    if ($group === 'daily') {
                        $chart = (new ChartJS_Pie(['62', '65', '74', '84', '91', '96', '98', '103', '104', '110', '111'], [3, 2, 3, 5, 2, 4, 1, 4, 1, 3, 2], 'logical_circuits_140302', 'تعداد بازدید از دوره logical_circuits_140302', $isDoughnut))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Pie(['65', '72', '77', '94', '96', '99', '118', '143', '144', '150'], [1, 2, 1, 3, 4, 5, 2, 6, 3, 1], 'algorithm_140302', 'تعداد بازدید از دوره algorithm_140302', $isDoughnut))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Pie(['75', '76', '95', '98', '100', '120', '123', '135', '140'], [1, 2, 4, 3, 4, 2, 1, 2, 3], 'database_140302', 'تعداد بازدید از دوره database_140302', $isDoughnut))->renderChart();
                        $tempText .= $chart;
                    } else {
                        $chart = (new ChartJS_Pie(['12', '13', '14', '15', '16', '17', '18', '20', '21', '23'], [9, 10, 8, 12, 11, 7, 8, 9, 11, 10], 'logical_circuits_140302', 'تعداد بازدید از دوره logical_circuits_140302', $isDoughnut))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Pie(['13', '14', '15', '16', '17', '18'], [10, 12, 9, 13, 11, 14], 'algorithm_140302', 'تعداد بازدید از دوره algorithm_140302', $isDoughnut))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Pie(['12', '15', '17', '18', '21', '23', '25'], [8, 10, 13, 15, 9, 14, 12], 'database_140302', 'تعداد بازدید از دوره database_140302', $isDoughnut))->renderChart();
                        $tempText .= $chart;
                    }
                } else if (strpos($plot, 'line') >= 0) {
                    $isSmooth = $plot === 'line_smooth';

                    if ($group === 'daily') {
                        $chart = (new ChartJS_Line(['62', '65', '74', '84', '91', '96', '98', '103', '104', '110', '111'], [3, 2, 3, 5, 2, 4, 1, 4, 1, 3, 2], 'logical_circuits_140302', 'تعداد بازدید از دوره logical_circuits_140302', $isSmooth))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Line(['65', '72', '77', '94', '96', '99', '118', '143', '144', '150'], [1, 2, 1, 3, 4, 5, 2, 6, 3, 1], 'algorithm_140302', 'تعداد بازدید از دوره algorithm_140302', $isSmooth))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Line(['75', '76', '95', '98', '100', '120', '123', '135', '140'], [1, 2, 4, 3, 4, 2, 1, 2, 3], 'database_140302', 'تعداد بازدید از دوره database_140302', $isSmooth))->renderChart();
                        $tempText .= $chart;
                    } else {
                        $chart = (new ChartJS_Line(['12', '13', '14', '15', '16', '17', '18', '20', '21', '23'], [9, 10, 8, 12, 11, 7, 8, 9, 11, 10], 'logical_circuits_140302', 'تعداد بازدید از دوره logical_circuits_140302', $isSmooth))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Line(['13', '14', '15', '16', '17', '18'], [10, 12, 9, 13, 11, 14], 'algorithm_140302', 'تعداد بازدید از دوره algorithm_140302', $isSmooth))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Line(['12', '15', '17', '18', '21', '23', '25'], [8, 10, 13, 15, 9, 14, 12], 'database_140302', 'تعداد بازدید از دوره database_140302', $isSmooth))->renderChart();
                        $tempText .= $chart;
                    }
                }
            }
            $tempText .= "\t" . PHP_EOL . '</div>' . '<br>';
        }

        return $tempText;

	}
    public function course_student_view_without_activity_rate($user, $plot, $group): string
    {
        $tempText = '';
        if ($plot === 'table') {
            if ($user === 'user') {
                $tempText .= '<div id="div_class">' . PHP_EOL .
                    "\t" . '<h3 class="main_title">نرخ بازدیدهای بدون فعالیت به کل بازدید ها (نرخ پرش) در دوره های sample_teacher</h3>' . PHP_EOL .
                    "\t" . '<table class="data-table">' . PHP_EOL . "\t\t" . '<tr>' . PHP_EOL .
                    "\t\t" . '<th>نام دوره</th>' . PHP_EOL . "\t\t" . '<th>نرخ پرش</th>' . "\t\t" . '</tr>';

                $tempText .= '<tr>' . '<td>algorithm_design</td>' . '<td>0.21</td>' . '</tr>';
                $tempText .= '<tr>' . '<td>database</td>' . '<td>0.72</td>' . '</tr>';
            } else {
                $tempText .= '<div id="div_class">' . PHP_EOL .
                    "\t" . '<h3 class="main_title">نرخ بازدیدهای بدون فعالیت به کل بازدید ها (نرخ پرش) برای تمام دوره ها</h3>' . PHP_EOL .
                    "\t" . '<table class="data-table">' . PHP_EOL . "\t\t" . '<tr>' . PHP_EOL .
                    "\t\t" . '<th>نام دوره</th>' . PHP_EOL . "\t\t" . '<th>نرخ پرش</th>' . "\t\t" . '</tr>';

                $tempText .= '<tr>' . '<td>logical_circuits</td>' . '<td>0.59</td>' . '</tr>';
                $tempText .= '<tr>' . '<td>project_management</td>' . '<td>0.33</td>' . '</tr>';

                $tempText .= '<tr>' . '<td>algorithm_design</td>' . '<td>0.21</td>' . '</tr>';
                $tempText .= '<tr>' . '<td>database</td>' . '<td>0.72</td>' . '</tr>';
            }
            $tempText .= "\t" . '</table>' . PHP_EOL . '</div>' . '<br>';
        } else {
            $timeText = 'روزانه';
            if ($group === 'weekly') $timeText = 'هفتگی';

            if ($user === 'user') {
                $tempText .= '<div id="div_class">' . PHP_EOL .
                    "\t" . '<h3 class="main_title"> نرخ بازدیدهای بدون فعالیت به کل بازدید ها (نرخ پرش) برای دوره های sample_teacher به صورت ' . $timeText . '</h3>' . PHP_EOL . "\t";

                if ($plot === 'bar') {
                    if ($group === 'daily') {
                        $chart = (new ChartJS_Bar(['60', '62', '65', '68', '72', '73', '75', '78', '83', '90', '94', '100'], [0.82, 0.21, 0.13, 0.37, 0.19, 0.34, 0.71, 0.41, 0.08, 0.15, 0.12, 0.61], 'database', 'نرخ پرش برای دوره database با مدرس sample_teacher'))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Bar(['65', '66', '69', '70', '72', '75', '78', '80', '83', '92'], [0.63, 0.27, 0.39, 0.45, 0.76, 0.54, 0.02, 0.15, 0.18, 0.41], 'algorithm_design', 'نرخ پرش برای دوره algorithm_design با مدرس sample_teacher'))->renderChart();
                        $tempText .= $chart;
                    } else {
                        $chart = (new ChartJS_Bar(['8', '9', '11', '12', '15', '17', '18', '19', '21'], [0.92, 0.21, 0.72, 0.83, 0.13, 0.42, 0.1, 0.48, 0.24], 'database', 'نرخ پرش برای دوره database با مدرس sample_teacher'))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Bar(['10', '11', '13', '15', '17', '19'], [0.71, 0.42, 0.59, 0.12, 0.27, 0.62], 'algorithm_design', 'نرخ پرش برای دوره algorithm_design با مدرس sample_teacher'))->renderChart();
                        $tempText .= $chart;
                    }
                } else if ($plot === 'pie' || $plot === 'doughnut') {
                    $isDoughnut = $plot === 'doughnut';

                    if ($group === 'daily') {
                        $chart = (new ChartJS_Pie(['60', '62', '65', '68', '72', '73', '75', '78', '83', '90', '94', '100'], [0.82, 0.21, 0.13, 0.37, 0.19, 0.34, 0.71, 0.41, 0.08, 0.15, 0.12, 0.61], 'database', 'نرخ پرش برای دوره database با مدرس sample_teacher', $isDoughnut))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Pie(['65', '66', '69', '70', '72', '75', '78', '80', '83', '92'], [0.63, 0.27, 0.39, 0.45, 0.76, 0.54, 0.02, 0.15, 0.18, 0.41], 'algorithm_design', 'نرخ پرش برای دوره algorithm_design با مدرس sample_teacher', $isDoughnut))->renderChart();
                        $tempText .= $chart;
                    } else {
                        $chart = (new ChartJS_Pie(['8', '9', '11', '12', '15', '17', '18', '19', '21'], [0.92, 0.21, 0.72, 0.83, 0.13, 0.42, 0.1, 0.48, 0.24], 'database', 'نرخ پرش برای دوره database با مدرس sample_teacher', $isDoughnut))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Pie(['10', '11', '13', '15', '17', '19'], [0.71, 0.42, 0.59, 0.12, 0.27, 0.62], 'algorithm_design', 'نرخ پرش برای دوره algorithm_design با مدرس sample_teacher', $isDoughnut))->renderChart();
                        $tempText .= $chart;
                    }
                } else if (strpos($plot, 'line') >= 0) {
                    $isSmooth = $plot === 'line_smooth';

                    if ($group === 'daily') {
                        $chart = (new ChartJS_Line(['60', '62', '65', '68', '72', '73', '75', '78', '83', '90', '94', '100'], [0.82, 0.21, 0.13, 0.37, 0.19, 0.34, 0.71, 0.41, 0.08, 0.15, 0.12, 0.61], 'database', 'نرخ پرش برای دوره database با مدرس sample_teacher', $isSmooth))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Line(['65', '66', '69', '70', '72', '75', '78', '80', '83', '92'], [0.63, 0.27, 0.39, 0.45, 0.76, 0.54, 0.02, 0.15, 0.18, 0.41], 'algorithm_design', 'نرخ پرش برای دوره algorithm_design با مدرس sample_teacher', $isSmooth))->renderChart();
                        $tempText .= $chart;
                    } else {
                        $chart = (new ChartJS_Line(['8', '9', '11', '12', '15', '17', '18', '19', '21'], [0.92, 0.21, 0.72, 0.83, 0.13, 0.42, 0.1, 0.48, 0.24], 'database', 'نرخ پرش برای دوره database با مدرس sample_teacher', $isSmooth))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Line(['10', '11', '13', '15', '17', '19'], [0.71, 0.42, 0.59, 0.12, 0.27, 0.62], 'algorithm_design', 'نرخ پرش برای دوره algorithm_design با مدرس sample_teacher', $isSmooth))->renderChart();
                        $tempText .= $chart;
                    }
                }
            } else {
                $tempText .= '<div id="div_class">' . PHP_EOL .
                    "\t" . '<h3 class="main_title">نرخ بازدیدهای بدون فعالیت به کل بازدید ها (نرخ پرش) برای تمام دوره ها به صورت ' . $timeText . '</h3>' . PHP_EOL . "\t";

                if ($plot === 'bar') {
                    if ($group === 'daily') {
                        $chart = (new ChartJS_Bar(['61', '62', '64', '66', '67', '68', '70', '71', '72', '74', '75'], [0.84, 0.12, 0.71, 0.69, 0.25, 0.47, 0.37, 0.22, 0.62, 0.81, 0.28], 'compiler', 'نرخ پرش برای دوره compiler با مدرس teacher2'))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Bar(['75', '77', '78', '79', '81', '83', '84', '85', '88'], [0.08, 0.41, 0.37, 0.21, 0.19, 0.73, 0.83, 0.92, 0.03], 'operating_systems', 'نرخ پرش برای دوره operating_systems با مدرس teacher3'))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Bar(['60', '62', '65', '68', '72', '73', '75', '78', '83', '90', '94', '100'], [0.82, 0.21, 0.13, 0.37, 0.19, 0.34, 0.71, 0.41, 0.08, 0.15, 0.12, 0.61], 'database', 'نرخ پرش برای دوره database با مدرس sample_teacher'))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Bar(['65', '66', '69', '70', '72', '75', '78', '80', '83', '92'], [0.63, 0.27, 0.39, 0.45, 0.76, 0.54, 0.02, 0.15, 0.18, 0.41], 'algorithm_design', 'نرخ پرش برای دوره algorithm_design با مدرس sample_teacher'))->renderChart();
                        $tempText .= $chart;
                    } else {
                        $chart = (new ChartJS_Bar(['7', '9', '10', '12', '13', '14', '16'], [0.63, 0.39, 0.25, 0.57, 0.13, 0.41, 0.85], 'compiler', 'نرخ پرش برای دوره compiler با مدرس teacher2'))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Bar(['9', '12', '14', '15', '16', '17'], [0.19, 0.84, 0.61, 0.35, 0.72, 0.42], 'operating_systems', 'نرخ پرش برای دوره operating_systems با مدرس teacher3'))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Bar(['8', '9', '11', '12', '15', '17', '18', '19', '21'], [0.92, 0.21, 0.72, 0.83, 0.13, 0.42, 0.1, 0.48, 0.24], 'database', 'نرخ پرش برای دوره database با مدرس sample_teacher'))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Bar(['10', '11', '13', '15', '17', '19'], [0.71, 0.42, 0.59, 0.12, 0.27, 0.62], 'algorithm_design', 'نرخ پرش برای دوره algorithm_design با مدرس sample_teacher'))->renderChart();
                        $tempText .= $chart;
                    }
                } else if ($plot === 'pie' || $plot === 'doughnut') {
                    $isDoughnut = $plot === 'doughnut';

                    if ($group === 'daily') {
                        $chart = (new ChartJS_Pie(['61', '62', '64', '66', '67', '68', '70', '71', '72', '74', '75'], [0.84, 0.12, 0.71, 0.69, 0.25, 0.47, 0.37, 0.22, 0.62, 0.81, 0.28], 'compiler', 'نرخ پرش برای دوره compiler با مدرس teacher2', $isDoughnut))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Pie(['75', '77', '78', '79', '81', '83', '84', '85', '88'], [0.08, 0.41, 0.37, 0.21, 0.19, 0.73, 0.83, 0.92, 0.03], 'operating_systems', 'نرخ پرش برای دوره operating_systems با مدرس teacher3', $isDoughnut))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Pie(['60', '62', '65', '68', '72', '73', '75', '78', '83', '90', '94', '100'], [0.82, 0.21, 0.13, 0.37, 0.19, 0.34, 0.71, 0.41, 0.08, 0.15, 0.12, 0.61], 'database', 'نرخ پرش برای دوره database با مدرس sample_teacher', $isDoughnut))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Pie(['65', '66', '69', '70', '72', '75', '78', '80', '83', '92'], [0.63, 0.27, 0.39, 0.45, 0.76, 0.54, 0.02, 0.15, 0.18, 0.41], 'algorithm_design', 'نرخ پرش برای دوره algorithm_design با مدرس sample_teacher', $isDoughnut))->renderChart();
                        $tempText .= $chart;
                    } else {
                        $chart = (new ChartJS_Pie(['7', '9', '10', '12', '13', '14', '16'], [0.63, 0.39, 0.25, 0.57, 0.13, 0.41, 0.85], 'compiler', 'نرخ پرش برای دوره compiler با مدرس teacher2', $isDoughnut))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Pie(['9', '12', '14', '15', '16', '17'], [0.19, 0.84, 0.61, 0.35, 0.72, 0.42], 'operating_systems', 'نرخ پرش برای دوره operating_systems با مدرس teacher3', $isDoughnut))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Pie(['8', '9', '11', '12', '15', '17', '18', '19', '21'], [0.92, 0.21, 0.72, 0.83, 0.13, 0.42, 0.1, 0.48, 0.24], 'database', 'نرخ پرش برای دوره database با مدرس sample_teacher', $isDoughnut))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Pie(['10', '11', '13', '15', '17', '19'], [0.71, 0.42, 0.59, 0.12, 0.27, 0.62], 'algorithm_design', 'نرخ پرش برای دوره algorithm_design با مدرس sample_teacher', $isDoughnut))->renderChart();
                        $tempText .= $chart;
                    }
                } else if (strpos($plot, 'line') >= 0) {
                    $isSmooth = $plot === 'line_smooth';

                    if ($group === 'daily') {
                        $chart = (new ChartJS_Line(['61', '62', '64', '66', '67', '68', '70', '71', '72', '74', '75'], [0.84, 0.12, 0.71, 0.69, 0.25, 0.47, 0.37, 0.22, 0.62, 0.81, 0.28], 'compiler', 'نرخ پرش برای دوره compiler با مدرس teacher2', $isSmooth))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Line(['75', '77', '78', '79', '81', '83', '84', '85', '88'], [0.08, 0.41, 0.37, 0.21, 0.19, 0.73, 0.83, 0.92, 0.03], 'operating_systems', 'نرخ پرش برای دوره operating_systems با مدرس teacher3', $isSmooth))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Line(['60', '62', '65', '68', '72', '73', '75', '78', '83', '90', '94', '100'], [0.82, 0.21, 0.13, 0.37, 0.19, 0.34, 0.71, 0.41, 0.08, 0.15, 0.12, 0.61], 'database', 'نرخ پرش برای دوره database با مدرس sample_teacher', $isSmooth))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Line(['65', '66', '69', '70', '72', '75', '78', '80', '83', '92'], [0.63, 0.27, 0.39, 0.45, 0.76, 0.54, 0.02, 0.15, 0.18, 0.41], 'algorithm_design', 'نرخ پرش برای دوره algorithm_design با مدرس sample_teacher', $isSmooth))->renderChart();
                        $tempText .= $chart;
                    } else {
                        $chart = (new ChartJS_Line(['7', '9', '10', '12', '13', '14', '16'], [0.63, 0.39, 0.25, 0.57, 0.13, 0.41, 0.85], 'compiler', 'نرخ پرش برای دوره compiler با مدرس teacher2', $isSmooth))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Line(['9', '12', '14', '15', '16', '17'], [0.19, 0.84, 0.61, 0.35, 0.72, 0.42], 'operating_systems', 'نرخ پرش برای دوره operating_systems با مدرس teacher3', $isSmooth))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Line(['8', '9', '11', '12', '15', '17', '18', '19', '21'], [0.92, 0.21, 0.72, 0.83, 0.13, 0.42, 0.1, 0.48, 0.24], 'database', 'نرخ پرش برای دوره database با مدرس sample_teacher', $isSmooth))->renderChart();
                        $tempText .= $chart;

                        $chart = (new ChartJS_Line(['10', '11', '13', '15', '17', '19'], [0.71, 0.42, 0.59, 0.12, 0.27, 0.62], 'algorithm_design', 'نرخ پرش برای دوره algorithm_design با مدرس sample_teacher', $isSmooth))->renderChart();
                        $tempText .= $chart;
                    }
                }
            }
            $tempText .= "\t" . PHP_EOL . '</div>' . '<br>';
        }
        return $tempText;

	}
    public function course_student_view_rate($user, $plot, $group): string
    {
        $tempText = '';

        if ($plot === 'table') {
            if ($user === 'user') {
                $tempText .= '<div id="div_class">' . PHP_EOL .
                    "\t" . '<h3 class="main_title">نرخ بازدید از دوره های sample_teacher</h3>' . PHP_EOL . "\t" . '<table class="data-table">' . PHP_EOL . "\t\t" . '<tr>' . PHP_EOL .
                    "\t\t" . '<th>نام دوره</th>' . PHP_EOL . "\t\t" . '<th>تعداد فراگیران</th>' . PHP_EOL . "\t\t" . '<th>نرخ بازدید</th>' . "\t\t" . '</tr>';

                $tempText .= '<tr>' . '<td>logical_circuits</td>' . '<td>20</td>' . '<td>6.73</td>' . '</tr>';
                $tempText .= '<tr>' . '<td>database</td>' . '<td>25</td>' . '<td>5.28</td>' . '</tr>';
            } else {
                $tempText .= '<div id="div_class">' . PHP_EOL .
                    "\t" . '<h3 class="main_title">نرخ بازدید از دوره برای تمام دوره ها</h3>' . PHP_EOL . "\t" . '<table class="data-table">' . PHP_EOL . "\t\t" . '<tr>' . PHP_EOL .
                    "\t\t" . '<th>نام دوره</th>' . PHP_EOL . "\t\t" . '<th>تعداد فراگیران</th>' . PHP_EOL . "\t\t" . '<th>نرخ بازدید</th>' . "\t\t" . '</tr>';

                $tempText .= '<tr>' . '<td>algorithm_design</td>' . '<td>20</td>' . '<td>8.59</td>' . '</tr>';
                $tempText .= '<tr>' . '<td>operating_systems</td>' . '<td>30</td>' . '<td>7.31</td>' . '</tr>';

                $tempText .= '<tr>' . '<td>logical_circuits</td>' . '<td>20</td>' . '<td>6.73</td>' . '</tr>';
                $tempText .= '<tr>' . '<td>database</td>' . '<td>25</td>' . '<td>5.28</td>' . '</tr>';

            }
            $tempText .= "\t" . '</table>' . PHP_EOL . '</div>' . '<br>';
        } else {
            $timeText = 'روزانه';
            if ($group === 'weekly') $timeText = 'هفتگی';

            if ($user === 'user') {
                $tempText .= '<div id="div_class">' . PHP_EOL .
                    "\t" . '<h3 class="main_title">نرخ بازدید از دوره های sample_teacher به صورت ' . $timeText . '</h3>' . PHP_EOL . "\t";

                if ($plot === 'bar') {
                    if ($group === 'daily') {
                        $chart1 = (new ChartJS_Bar(['78', '81', '86', '90', '92', '95', '99', '101', '104', '105'], [2.52, 1.26, 3.5, 2.58, 4.21, 6.25, 3.26, 2.61, 1.83, 2.93], 'algorithm_design', 'نرخ بازدید از دوره های sample_teacher با 20 نفر فراگیر'))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Bar(['78', '81', '86', '90', '92', '95', '99', '101', '104', '105', '108', '110', '112', '113', '116'], [0.83, 2.13, 1.41, 3.29, 2.24, 3.12, 1.24, 0.91, 1.68, 2.42, 1.62, 3.25, 3.12, 2.91, 1.12], 'logical_circuits', 'نرخ بازدید از دوره های sample_teacher با 17 نفر فراگیر'))->renderChart();
                        $tempText .= $chart1;
                    } else {
                        $chart1 = (new ChartJS_Bar(['11', '12', '14', '15', '16', '17'], [4.89, 5.8, 6.91, 7.48, 4.72, 6.31], 'algorithm_design', 'نرخ بازدید از دوره های sample_teacher با 20 نفر فراگیر'))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Bar(['10', '12', '13', '15', '16', '18', '21'], [2.76, 5.29, 4.85, 2.2, 1.35, 6.34, 4.81], 'logical_circuits', 'نرخ بازدید از دوره های sample_teacher با 17 نفر فراگیر'))->renderChart();
                        $tempText .= $chart1;
                    }
                } else if ($plot === 'pie' || $plot === 'doughnut') {
                    $isDoughnut = $plot === 'doughnut';

                    if ($group === 'daily') {
                        $chart1 = (new ChartJS_Pie(['78', '81', '86', '90', '92', '95', '99', '101', '104', '105'], [2.52, 1.26, 3.5, 2.58, 4.21, 6.25, 3.26, 2.61, 1.83, 2.93], 'algorithm_design', 'نرخ بازدید از دوره algorithm_design با مدرس sample_teacher با 20 نفر فراگیر', $isDoughnut))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Pie(['78', '81', '86', '90', '92', '95', '99', '101', '104', '105', '108', '110', '112', '113', '116'], [0.83, 2.13, 1.41, 3.29, 2.24, 3.12, 1.24, 0.91, 1.68, 2.42, 1.62, 3.25, 3.12, 2.91, 1.12], 'logical_circuits', 'نرخ بازدید از دوره logical_circuits با مدرس sample_teacher با 17 نفر فراگیر', $isDoughnut))->renderChart();
                        $tempText .= $chart1;
                    } else {
                        $chart1 = (new ChartJS_Pie(['11', '12', '14', '15', '16', '17'], [4.89, 5.8, 6.91, 7.48, 4.72, 6.31], 'algorithm_design', 'نرخ بازدید از دوره algorithm_design با مدرس sample_teacher با 20 نفر فراگیر', $isDoughnut))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Pie(['10', '12', '13', '15', '16', '18', '21'], [2.76, 5.29, 4.85, 2.2, 1.35, 6.34, 4.81], 'logical_circuits', 'نرخ بازدید از دوره logical_circuits با مدرس sample_teacher با 17 نفر فراگیر', $isDoughnut))->renderChart();
                        $tempText .= $chart1;
                    }
                } else if (strpos($plot, 'line') >= 0) {
                    $isSmooth = $plot === 'line_smooth';

                    if ($group === 'daily') {
                        $chart1 = (new ChartJS_Line(['78', '81', '86', '90', '92', '95', '99', '101', '104', '105'], [2.52, 1.26, 3.5, 2.58, 4.21, 6.25, 3.26, 2.61, 1.83, 2.93], 'algorithm_design', 'نرخ بازدید از دوره های sample_teacher با 20 نفر فراگیر', $isSmooth))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Line(['78', '81', '86', '90', '92', '95', '99', '101', '104', '105', '108', '110', '112', '113', '116'], [0.83, 2.13, 1.41, 3.29, 2.24, 3.12, 1.24, 0.91, 1.68, 2.42, 1.62, 3.25, 3.12, 2.91, 1.12], 'logical_circuits', 'نرخ بازدید از دوره های sample_teacher با 17 نفر فراگیر', $isSmooth))->renderChart();
                        $tempText .= $chart1;
                    } else {
                        $chart1 = (new ChartJS_Line(['11', '12', '14', '15', '16', '17'], [4.89, 5.8, 6.91, 7.48, 4.72, 6.31], 'algorithm_design', 'نرخ بازدید از دوره های sample_teacher با 20 نفر فراگیر', $isSmooth))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Line(['10', '12', '13', '15', '16', '18', '21'], [2.76, 5.29, 4.85, 2.2, 1.35, 6.34, 4.81], 'logical_circuits', 'نرخ بازدید از دوره های sample_teacher با 17 نفر فراگیر', $isSmooth))->renderChart();
                        $tempText .= $chart1;
                    }
                }
            } else {
                $tempText .= '<div id="div_class">' . PHP_EOL .
                    "\t" . '<h3 class="main_title">نرخ بازدید از تمام دوره ها بر اساس ' . $timeText . '</h3>' . PHP_EOL .
                    "\t";

                if ($plot === 'bar') {
                    if ($group === 'daily') {
                        $chart1 = (new ChartJS_Bar(['80', '82', '87', '93', '95', '98', '102', '104', '106', '109', '110'], [3.52, 1.26, 1.5, 2.58, 5.26, 3.25, 2.26, 2.91, 1.23, 4.93, 2.74], 'software_engineering', 'نرخ بازدید از دوره های teacher2 با 25 نفر فراگیر'))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Bar(['82', '83', '84', '86', '88', '90', '91', '93', '97', '99', '101', '103', '105', '106'], [7.82, 3.63, 4.8, 2.78, 4.76, 6.55, 1.94, 3.91, 2.73, 7.93, 5.74, 7.72, 4.14, 1.53], 'compiler', 'نرخ بازدید از دوره های teacher3 با 25 نفر فراگیر'))->renderChart();
                        $tempText .= $chart1;


                        $chart1 = (new ChartJS_Bar(['78', '81', '86', '90', '92', '95', '99', '101', '104', '105'], [2.52, 1.26, 3.5, 2.58, 4.21, 6.25, 3.26, 2.61, 1.83, 2.93], 'algorithm_design', 'نرخ بازدید از دوره های sample_teacher با 20 نفر فراگیر'))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Bar(['78', '81', '86', '90', '92', '95', '99', '101', '104', '105', '108', '110', '112', '113', '116'], [0.83, 2.13, 1.41, 3.29, 2.24, 3.12, 1.24, 0.91, 1.68, 2.42, 1.62, 3.25, 3.12, 2.91, 1.12], 'logical_circuits', 'نرخ بازدید از دوره های sample_teacher با 17 نفر فراگیر'))->renderChart();
                        $tempText .= $chart1;
                    } else {
                        $chart1 = (new ChartJS_Bar(['12', '13', '14', '16', '17', '19', '20', '22', '24'], [7.3, 2.23, 5.21, 1.81, 2.7, 6.72, 1.1, 3.1, 4.17], 'software_engineering', 'نرخ بازدید از دوره های teacher2 با 25 نفر فراگیر'))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Bar(['10', '13', '14', '15', '16', '18', '19', '21'], [4.2, 1.7, 2.62, 3.21, 1.3, 4.6, 3.8, 5.5], 'compiler', 'نرخ بازدید از دوره های teacher3 با 25 نفر فراگیر'))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Bar(['11', '12', '14', '15', '16', '17'], [4.89, 5.8, 6.91, 7.48, 4.72, 6.31], 'algorithm_design', 'نرخ بازدید از دوره های sample_teacher با 20 نفر فراگیر'))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Bar(['10', '12', '13', '15', '16', '18', '21'], [2.76, 5.29, 4.85, 2.2, 1.35, 6.34, 4.81], 'logical_circuits', 'نرخ بازدید از دوره های sample_teacher با 17 نفر فراگیر'))->renderChart();
                        $tempText .= $chart1;
                    }
                } else if ($plot === 'pie' || $plot === 'doughnut') {
                    $isDoughnut = $plot === 'doughnut';

                    if ($group === 'daily') {
                        $chart1 = (new ChartJS_Pie(['80', '82', '87', '93', '95', '98', '102', '104', '106', '109', '110'], [3.52, 1.26, 1.5, 2.58, 5.26, 3.25, 2.26, 2.91, 1.23, 4.93, 2.74], 'software_engineering', 'نرخ بازدید از دوره software_engineering با مدرس teacher2 با 25 نفر فراگیر', $isDoughnut))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Pie(['82', '83', '84', '86', '88', '90', '91', '93', '97', '99', '101', '103', '105', '106'], [7.82, 3.63, 4.8, 2.78, 4.76, 6.55, 1.94, 3.91, 2.73, 7.93, 5.74, 7.72, 4.14, 1.53], 'compiler', 'نرخ بازدید از دوره compiler با مدرس teacher3 با 25 نفر فراگیر', $isDoughnut))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Pie(['78', '81', '86', '90', '92', '95', '99', '101', '104', '105'], [2.52, 1.26, 3.5, 2.58, 4.21, 6.25, 3.26, 2.61, 1.83, 2.93], 'algorithm_design', 'نرخ بازدید از دوره algorithm_design با مدرس sample_teacher با 20 نفر فراگیر', $isDoughnut))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Pie(['78', '81', '86', '90', '92', '95', '99', '101', '104', '105', '108', '110', '112', '113', '116'], [0.83, 2.13, 1.41, 3.29, 2.24, 3.12, 1.24, 0.91, 1.68, 2.42, 1.62, 3.25, 3.12, 2.91, 1.12], 'logical_circuits', 'نرخ بازدید از دوره logical_circuits با مدرس sample_teacher با 17 نفر فراگیر', $isDoughnut))->renderChart();
                        $tempText .= $chart1;
                    } else {
                        $chart1 = (new ChartJS_Pie(['12', '13', '14', '16', '17', '19', '20', '22', '24'], [7.3, 2.23, 5.21, 1.81, 2.7, 6.72, 1.1, 3.1, 4.17], 'software_engineering', 'نرخ بازدید از دوره software_engineering با مدرس teacher2 با 25 نفر فراگیر', $isDoughnut))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Pie(['10', '13', '14', '15', '16', '18', '19', '21'], [4.2, 1.7, 2.62, 3.21, 1.3, 4.6, 3.8, 5.5], 'compiler', 'نرخ بازدید از دوره compiler با مدرس teacher3 با 25 نفر فراگیر', $isDoughnut))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Pie(['11', '12', '14', '15', '16', '17'], [4.89, 5.8, 6.91, 7.48, 4.72, 6.31], 'algorithm_design', 'نرخ بازدید از دوره algorithm_design با مدرس sample_teacher با 20 نفر فراگیر', $isDoughnut))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Pie(['10', '12', '13', '15', '16', '18', '21'], [2.76, 5.29, 4.85, 2.2, 1.35, 6.34, 4.81], 'logical_circuits', 'نرخ بازدید از دوره logical_circuits با مدرس sample_teacher با 17 نفر فراگیر', $isDoughnut))->renderChart();
                        $tempText .= $chart1;
                    }
                } else if (strpos($plot, 'line') >= 0) {
                    $isSmooth = $plot === 'line_smooth';

                    if ($group === 'daily') {
                        $chart1 = (new ChartJS_Line(['80', '82', '87', '93', '95', '98', '102', '104', '106', '109', '110'], [3.52, 1.26, 1.5, 2.58, 5.26, 3.25, 2.26, 2.91, 1.23, 4.93, 2.74], 'software_engineering', 'نرخ بازدید از دوره های teacher2 با 25 نفر فراگیر', $isSmooth))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Line(['82', '83', '84', '86', '88', '90', '91', '93', '97', '99', '101', '103', '105', '106'], [7.82, 3.63, 4.8, 2.78, 4.76, 6.55, 1.94, 3.91, 2.73, 7.93, 5.74, 7.72, 4.14, 1.53], 'compiler', 'نرخ بازدید از دوره های teacher3 با 25 نفر فراگیر', $isSmooth))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Line(['78', '81', '86', '90', '92', '95', '99', '101', '104', '105'], [2.52, 1.26, 3.5, 2.58, 4.21, 6.25, 3.26, 2.61, 1.83, 2.93], 'algorithm_design', 'نرخ بازدید از دوره های sample_teacher با 20 نفر فراگیر', $isSmooth))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Line(['78', '81', '86', '90', '92', '95', '99', '101', '104', '105', '108', '110', '112', '113', '116'], [0.83, 2.13, 1.41, 3.29, 2.24, 3.12, 1.24, 0.91, 1.68, 2.42, 1.62, 3.25, 3.12, 2.91, 1.12], 'logical_circuits', 'نرخ بازدید از دوره های sample_teacher با 17 نفر فراگیر', $isSmooth))->renderChart();
                        $tempText .= $chart1;
                    } else {
                        $chart1 = (new ChartJS_Line(['12', '13', '14', '16', '17', '19', '20', '22', '24'], [7.3, 2.23, 5.21, 1.81, 2.7, 6.72, 1.1, 3.1, 4.17], 'software_engineering', 'نرخ بازدید از دوره های teacher2 با 25 نفر فراگیر', $isSmooth))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Line(['10', '13', '14', '15', '16', '18', '19', '21'], [4.2, 1.7, 2.62, 3.21, 1.3, 4.6, 3.8, 5.5], 'compiler', 'نرخ بازدید از دوره های teacher3 با 25 نفر فراگیر', $isSmooth))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Line(['11', '12', '14', '15', '16', '17'], [4.89, 5.8, 6.91, 7.48, 4.72, 6.31], 'algorithm_design', 'نرخ بازدید از دوره های sample_teacher با 20 نفر فراگیر', $isSmooth))->renderChart();
                        $tempText .= $chart1;

                        $chart1 = (new ChartJS_Line(['10', '12', '13', '15', '16', '18', '21'], [2.76, 5.29, 4.85, 2.2, 1.35, 6.34, 4.81], 'logical_circuits', 'نرخ بازدید از دوره های sample_teacher با 17 نفر فراگیر', $isSmooth))->renderChart();
                        $tempText .= $chart1;
                    }
                }
            }
            $tempText .= "\t" . PHP_EOL . '</div>' . '<br>';
        }
        return $tempText;

	}

}

?>