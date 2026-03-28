<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Список участников</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Список участников</h1>
    <?php
    session_start();
    $date_today = date('d.m.Y');
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['attendance'])) {
        $_SESSION['attendance'][$date_today] = $_POST['attendance'];
    }
    $attendance = isset($_SESSION['attendance'][$date_today]) ? $_SESSION['attendance'][$date_today] : [];
    ?>
    <form method="post">
        <table>
            <thead>
                <tr>
                    <th>ФИО</th>
                    <th>Пол</th>
                    <th>Дата рождения</th>
                    <th>Присутствие сегодня</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $data = [
                    ['Абдыева А', 'ж', '21.06.2007'],
                    ['Авазова М', 'ж', '12.02.2007'],
                    ['Аширбекова Н', 'ж', '29.09.2006'],
                    ['Ибрагимова А', 'ж', '20.06.2006'],
                    ['Ильяз Уулу Б', 'м', '23.06.2006'],
                    ['Исаков Т', 'м', '31.03.2007'],
                    ['Калыбекова А', 'ж', '05.12.2005'],
                    ['Кубатова К', 'ж', '16.06.2006'],
                    ['Кудайбердиева А', 'ж', '07.08.2007'],
                    ['Кырбашова А', 'ж', '16.02.2007'],
                    ['Молдогараева Ж', 'ж', '26.07.2007'],
                    ['Мухидинов Ш', 'м', '21.08.2006'],
                    ['Райымкулова А', 'ж', '07.10.2006'],
                    ['Рустам кызы Ш', 'ж', '19.05.2006'],
                    ['Рысбек кызы А', 'ж', '02.11.2006'],
                    ['Сайдинова С', 'ж', '04.05.2007'],
                    ['Салыбаева А', 'ж', '20.07.2006'],
                    ['Сатыбалдиев И', 'м', '03.08.2006'],
                    ['Солтонов Д', 'м', '16.07.2007'],
                    ['Тагаева А', 'ж', '31.10.2006'],
                    ['Токтошова С', 'ж', '23.06.2006'],
                    ['Уланова А', 'ж', '01.12.2005'],
                    ['Урманбетова А', 'ж', '14.03.2006'],
                    ['Шукурбаева ж', 'ж', '11.11.2006']
                ];

                foreach ($data as $index => $row) {
                    echo '<tr>';
                    foreach ($row as $cell) {
                        echo '<td>' . htmlspecialchars($cell) . '</td>';
                    }
                    $checked = in_array($index, $attendance) ? 'checked' : '';
                    echo '<td><input type="checkbox" name="attendance[]" value="' . $index . '" ' . $checked . '></td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
        <br>
        <input type="submit" value="Сохранить присутствие">
    </form>
    <h2>Результаты на сегодня (<?php echo $date_today; ?>)</h2>
    <h3>Присутствующие:</h3>
    <ul>
        <?php
        foreach ($attendance as $idx) {
            echo '<li>' . htmlspecialchars($data[$idx][0]) . '</li>';
        }
        ?>
    </ul>
    <h3>Отсутствующие:</h3>
    <ul>
        <?php
        foreach ($data as $index => $row) {
            if (!in_array($index, $attendance)) {
                echo '<li>' . htmlspecialchars($row[0]) . '</li>';
            }
        }
        ?>
    </ul>
</body>
</html>