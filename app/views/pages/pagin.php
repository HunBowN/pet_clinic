<?php
echo "<ul class='pagination'>";

if ($page > 1) {
    echo "<li><a href='{$page_url}' title='Переход к первой странице'>";
    echo "Первая";
    echo "</a></li>";
}

// подсчёт общего количества страниц
$totalPages = ceil($entitiesCount / $recordsPerPage);

// диапазон ссылок для отображения
$range = 2;

// отображать ссылки на «диапазон страниц» вокруг «текущей страницы»
$initialNum = $page - $range;
$condition_limit_num = ($page + $range) + 1;

for ($x = $initialNum; $x < $condition_limit_num; $x++) {

    // убедимся, что "$x больше 0" и "меньше или равно $totalPages"
    if (($x > 0) && ($x <= $totalPages)) {

        // текущая страница
        if ($x == $page) {
            echo "<li class='active'><a href='#'>$x <span class='sr-only'>(current)</span></a></li>";
        }

        // НЕ текущая страница
        else {
            echo "<li><a href='{$page_url}page=$x'>$x</a></li>";
        }
    }
}

// ссылка на последнюю страницу
if ($page < $totalPages) {
    echo "<li><a href='{$page_url}page={$totalPages}' title='Переход к последней странице'>";
    echo "Последняя";
    echo "</a></li>";
}

echo "</ul>";