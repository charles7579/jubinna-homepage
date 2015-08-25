<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);
?>

<?php

for ($i=0; $i<$bo_files['count']; $i++) {

    //echo $list[$i]['icon_reply']." ";
    echo "<a href=\"".$bo_files[$i]['href']."\">";
   
    if($bo_files[$i]['file']) {
        $path = G5_DATA_URL.'/file/'.$bo_table.'/'.$bo_files[$i]['file'];
        $img_content = '<img src="'.$path.'">';
    }
    echo $img_content;
    echo "</a>";

    // if ($list[$i]['link']['count']) { echo "[{$list[$i]['link']['count']}]"; }
    // if ($list[$i]['file']['count']) { echo "<{$list[$i]['file']['count']}>"; }

    if (isset($bo_files[$i]['icon_new'])) echo " " . $bo_files[$i]['icon_new'];
    if (isset($bo_files[$i]['icon_hot'])) echo " " . $bo_files[$i]['icon_hot'];
}
if (count($bo_files) == 0) {
?>
    <b>게시물이 없습니다</b>
<?php
}
?>
