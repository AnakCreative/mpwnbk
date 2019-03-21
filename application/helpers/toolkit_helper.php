<?php
// all form validation ajax
function onair($date,$timeStart,$timeEnd){
    date_default_timezone_set('Asia/Jakarta');
    $dateNow = date('Y-m-d');
    $timeNow = date('H:i:s');
    $result = false;

    if($date == $dateNow){
        if($timeStart<=$timeNow && $timeEnd>=$timeNow){
            $result = true;
        }
    }
    return $result;
}

function simple_date($date)
{
    date_default_timezone_set('Asia/Jakarta');
    return date("D, d M Y", strtotime($date));
}

function date_id($tanggal)
{
  $bulan = array (
        'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
      );
  $split = explode('-', $tanggal);
  return substr($split[2],0,2) . ' ' . $bulan[ (int)$split[1] - 1 ] . ' ' . $split[0];
}

function thumb_file($file) {
    $filename_ext = pathinfo($file, PATHINFO_EXTENSION);
    return preg_replace('/^(.*)\.' . $filename_ext . '$/', '$1_thumb.' . $filename_ext, $file);
}

function last_time($time_ago) {
    date_default_timezone_set('Asia/Jakarta');
		$estimate_time = time() - strtotime($time_ago);
    if( $estimate_time < 1 )
    {
        return 'less than 1 second ago';
    }
    $condition = array(
                12 * 30 * 24 * 60 * 60  =>  'year',
                30 * 24 * 60 * 60       =>  'month',
                24 * 60 * 60            =>  'day',
                60 * 60                 =>  'hour',
                60                      =>  'minute',
                1                       =>  'second'
    );
    foreach( $condition as $secs => $str )
    {
        $d = $estimate_time / $secs;
        if( $d >= 1 )
        {
            $r = round( $d );
            return '' . $r . ' ' . $str . ( $r > 1 ? 's' : '' ) . ' ago';
        }
    }
}

function getDatesFromRange($start, $end, $format = 'Y-m-d') {
    $array = array();
    $interval = new DateInterval('P1D');

    $realEnd = new DateTime($end);
    $realEnd->add($interval);

    $period = new DatePeriod(new DateTime($start), $interval, $realEnd);

    foreach($period as $date) {
        $array[] = $date->format($format);
    }

    return $array;
}

function sensor($text, $badwords, $replaceChar = '*') {
    return preg_replace_callback(
        array_map(function($w) { return '/\b' . preg_quote($w, '/') . '\b/i'; }, $badwords),
        function($match) use ($replaceChar) { return str_repeat($replaceChar, strlen($match[0])); },
        $text
    );
}

function getYoutubeId($videoURL){
    $parts = parse_url($videoURL);
    if(isset($parts['query'])){
        parse_str($parts['query'], $qs);
        if(isset($qs['v'])){
            return $qs['v'];
        }else if(isset($qs['vi'])){
            return $qs['vi'];
        }
    }
    if(isset($parts['path'])){
        $path = explode('/', trim($parts['path'], '/'));
        return $path[count($path)-1];
    }
    return false;
}

function getThumbYoutube($videoURL){
    // Youtube video ID
    $youtubeVideoId = getYoutubeId($videoURL);
    // Generate youtube thumbnail url
    $thumbURL = 'https://i.ytimg.com/vi/'.$youtubeVideoId.'/hqdefault.jpg';
    // Display thumbnail image
    return $thumbURL;
}


function youtube_statistics($video_id,$key) {
    $json = file_get_contents("https://www.googleapis.com/youtube/v3/videos?part=statistics&id=" . $video_id . "&key=". $key );
    $jsonData = json_decode($json);
    $views = $jsonData->items[0]->statistics->viewCount;
    return $views;
}

/* ------------------ */
/* start hashPassword */
/* ------------------ */
//make hash password for register
function hashPassword($password,$cost=13)
{
    $salt=sprintf('$2y$%02d$',$cost).strtr(generateRandomString(),array('_'=>'.','~'=>'/'));
    $hash=crypt($password,$salt);

    return $hash;
}

//check password for login
function verifyPassword($password, $hash)
{
    if(!is_string($password) || $password==='')
        return false;

    if (!$password || !preg_match('{^\$2[axy]\$(\d\d)\$[\./0-9A-Za-z]{22}}',$hash,$matches) ||
    $matches[1]<4 || $matches[1]>31)
        return false;

    $test=crypt($password,$hash);
    if(!is_string($test) || strlen($test)<32)
        return false;

    return same($test, $hash);
}

function same($a,$b)
{
    if(!is_string($a) || !is_string($b))
        return false;

    $mb=function_exists('mb_strlen');
    $length=$mb ? mb_strlen($a,'8bit') : strlen($a);
    if($length!==($mb ? mb_strlen($b,'8bit') : strlen($b)))
        return false;

    $check=0;
    for($i=0;$i<$length;$i+=1)
        $check|=(ord($a[$i])^ord($b[$i]));

    return $check===0;
}

function generateRandomString($length=22) {
    $characters = './0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
/* ---------------- */
/* end hashPassword */
/* ---------------- */
