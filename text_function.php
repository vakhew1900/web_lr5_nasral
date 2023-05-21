<?php

//набросок

function read_preset(int $index){

    $prefix = $_SERVER['DOCUMENT_ROOT'] ."/LR4/tests/preset";
    
    if($index < 1 || $index > 3){
        return '';
    }

    $path = $prefix.$index.'.html';
    echo $path;
    if (file_exists($path)){
        $content = file_get_contents($path);

        return $content;
    }

    return '';
}


function filter_bad_words($text) {

    $simple_bad_words = array("около", "для",  "пух", "рот", "рта", "рту", "делать", "ехать");
  
    #замена около и для
    foreach ($simple_bad_words as $word) {
        $pattern = "/" . $word . "/iu"; // создаем регулярное выражение для поиска слова с учетом производных
        $replacement = str_repeat("#", mb_strlen($word)); // создаем строку замены с нужным количеством символов
        $text = preg_replace($pattern, $replacement, $text); // заменяем все найденные слова
    }

    return $text;

    // $bad_words_verbs = array("делать", "делал", "делают", "делаю", "делаешь", "делаем", "делаешь", "делайте", "делай", "делает",
    //                           "ехать", "ехал", "едут", "еду", "едет", "едем", "едешь");
    

    // foreach ($bad_words_verbs as $word) {
    //     $pattern = "/" . $word . "/iu"; // создаем регулярное выражение для поиска слова с учетом производных
    //     $replacement = str_repeat("#", mb_strlen($word)); // создаем строку замены с нужным количеством символов
    //     $text = preg_replace($pattern, $replacement, $text); // заменяем все найденные слова
    // }

    // $hard_simple_bad_word = array("пуховик", "пухов", "пухн",
    // "пухав", "пухл");

    // $dict = arr_to_dict($hard_simple_bad_word, "пух");

    // foreach ($dict as $word => $replacement) {
    //     $pattern = "/" . $word . "/iu"; // создаем регулярное выражение для поиска слова с учетом производных
    //     $text = preg_replace($pattern, $replacement, $text); // заменяем все найденные слова
    // }


    // $very_hard_bad_word = array("большерот", "полорот", "желторот", "косорот", "ротов", "криворот", "широкорот", "рот", "ротик", 
    // "ротищ");

    // $rot_dict = arr_to_dict($very_hard_bad_word, "рот");

    // foreach ($rot_dict as $word => $replacement) {
    //     $pattern = "/\b" . $word . "/iu"; // создаем регулярное выражение для поиска слова с учетом производных
    //     $text = preg_replace($pattern, $replacement, $text); // заменяем все найденные слова
    // }

    // return $text;
}


function arr_to_dict(array $arr, string $word){
    $dict = array();

    foreach($arr as $elem){
        $replacement =  str_repeat("#", mb_strlen($word)); 
        $key = $elem;
        $value = str_replace($word, $replacement, $elem);
        $dict[$key] = $value;
    }

    return $dict;
}





//набросок
function createLinkIndex($html){

    echo ($html);
    $doc = new DOMDocument();


      $id = 0;
      $toc = ""; // оглавление
    // Поиск по регулярке и замена при помощи callback функции вместо replacement в preg_replace
    $html = preg_replace_callback( "/(<a[^>]*?)>(.*?)<\/a>/iu", function ($match) use (&$toc, &$id) {
        
      //   var_dump($match);
        $innerText = $match[2];
        $pattern = "/<a[\W]?[^>]*?>/iu";
        // echo "dgfjshdskjdgfshbdgfsodgf<br/>";
        $tagName =$match[1];
        
        // echo "error";
        
        // echo htmlspecialchars($tagName[0]);
        //Добавляеми оглавление с ссылкой на id
        $tmp_id = $id;
        $exist_id =[];
       $flag = preg_match("/\bid=\"([^\"]*?)\"/ui", $tagName, $exist_id);
   //     echo $flag;
     //   echo $exist_id;
        if ($flag == false){
            $tagName = substr($tagName, 0, strlen($tagName) - 1)."id=\"$id\">";
        }
        else {
    //        echo "<br/>";
      //      var_dump($exist_id);
            $tmp_id = $exist_id[1];
        }

        $toc .= "<li><a href=\"#$tmp_id\"> Ссылка  №" . ($id) ." </a>$innerText</li>";
        $id++;

        echo "tabgName=".htmlspecialchars($tagName);



        return $tagName.$innerText."</a>";
    }, $html);


    return [
        'linkIndex' => "<ul>\n$toc</ul>",
        'new_html' => $html
    ];

}




//     error_reporting(0);
//     $doc->loadHTML(mb_convert_encoding( $html, 'HTML-ENTITIES', 'UTF-8' ), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD); 

//     $links = array();
//     $cnt = 0;
//     foreach ($doc->getElementsByTagName('a') as $anchor) {
//         $link_text = $anchor->nodeValue;
//         if ($link_text !== '') {

//             if ($anchor->hasAttribute("id") == false){
//                 $anchor->setAttribute('id', strval($cnt++));
//             }

//             $links[] = array(
//                 'text' => $link_text,
//                 'id' => $anchor->getAttribute('id')
//             );
//         }
//     }

//     $new_html = $doc->saveHTML();
//     $resultString = '<ol>';

//     foreach ($links as $i => $link) {
//         $tmp = "<li><a href=\"#$link[id]\"> Ссылка  №" . ($i + 1) ." </a>$link[text]</li>";
//         $resultString .= $tmp;
//     }

//    $resultString .= '</ol>';

//    $result = array(
//     'new_html' => $new_html,
//     'linkIndex' => $resultString
//    );
   
//    error_reporting(-1);

//    return $result;
// }

//набросок
function replaceDash($text){
    $text_with_ndash = str_replace(" - ", " &ndash; ", $text);
    $text_with_mdash = str_replace(" -- ", "&nbsp;&mdash; ", $text_with_ndash);
    return $text_with_mdash;
}

function editAbbreviation($text){
    

    // $text = str_replace("итд ", "и т.д. ", $text);
    // $text = str_replace("итп ", "и т.п. ", $text);
    // $text = str_replace("итд.", "и т.д.", $text);
    // $text = str_replace("итп.", "и т.п.", $text);
    // $text = str_replace("тп.", "т.п.", $text);
    // $text = str_replace("тд.", "т.д.", $text);
    // $text = str_replace("тп", "т.п.", $text);
    // $text = str_replace("тд", "т.д.", $text);

    $text = preg_replace("/(\bит\.?д)((\.)|((?=[\W^\.])))/iu", "и т.д.", $text);
    $text = preg_replace("/(\bит\.?п)((\.)|((?=[\W^\.])))/iu", "и т.п.", $text);
    $text = preg_replace("/(\bт\.?д)((\.)|((?=[\W^\.])))/iu", "т.д.", $text);
    $text = preg_replace("/(\bт\.?п)((\.)|((?=[\W^\.])))/iu", "т.п.", $text);

    return $text;
}


function echoEx($text){

    // echo $text;

    $text = editAbbreviation($text);
    $text = replaceDash($text);
    $text = filter_bad_words($text);

    echo "<h6> Задание 14  Автоматически сформировать “Указатель ссылок”. Работает как оглавление, но ссылки делаются якорными на ссылки в документе </h6>";
    $result = createLinkIndex($text);
    $text = $result['new_html'];
    $linkIndex = $result['linkIndex'];

    echo $linkIndex;

    echo '<h3> Переработанный текст </h3>';

    $ex5 = '<h6> 5. Тире, вставленное минусом между двумя пробелами заменять на среднее тире (&ndash;), двойной минуc между пробелами
             заменять на &mdash; и привязывать его к предыдущему слову неразрывным пробелом. </h6>';   
    echo $ex5;

    $ex8 = '<h6> 8. Расстановка точек в сокращениях «и т. д. и т. п.». </h6>';
    $ex16 = '<h6> 16 .Фильтр запретных слов. “Запретными словами” в рамках ЛР признаются (в любом регистре) слова “пух”, “рот”, “делать”, “ехать”, “около”, “для”. </h6>';
    echo $ex8;
    echo $ex16;


    echo $text;
}

?>