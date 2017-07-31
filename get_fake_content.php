function get_fake_content($number = 0)
{
    $default_content = $br_ary = [];
    $str_number = 10;   //字數預設值

    if ($number > 0) {
        $str_number = $number;
    }

    //取檔案內的所有文字
    $string = file_get_contents('words.txt');
    //標點符號
    $symbol = ["，", "。", "~", "!", "?", "；", ";", "、", "...."];
    if (isset($string) and !empty($string) and is_string($string)) {
        //拆解文字變成陣列
        $new_str_ary = preg_split('/(?<!^)(?!$)/u', $string);
    }

    for ($k = 0; $k < $str_number; $k++) {
        //隨機取一個字塞入陣列
        $default_content[] = $new_str_ary[rand(0, count($new_str_ary) - 1)];
        //隨機取一個符號塞入陣列
        if (isset($symbol[rand(count($symbol)-2, 20)])) {
            $default_content[] = $symbol[rand(0, count($symbol) - 1)];
        }
    }

    //設定字數大於20字，加入斷行
    if ($str_number > 20) {
        for ($i = 0; $i < rand(0, $str_number); $i++) {
            $br_ary[$i] = '<BR>';
        }
        //合併兩個陣列
        $new_ary = array_merge($default_content, $br_ary);
    }else {
        $new_ary = $default_content;
    }
    
    //陣列打亂
    shuffle($new_ary);

    //合成字串
    return implode("", $new_ary);
}
