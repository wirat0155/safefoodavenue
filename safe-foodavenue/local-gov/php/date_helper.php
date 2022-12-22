<?php

function set_time_zone()
{
     date_default_timezone_set('Asia/Bangkok');
}

function get_date_today()
{
     return date("Y-m-d");
}

function get_time_now()
{
     return date("H:i");
}

function get_date_year($old_date)
{

    $year_now = $old_date = substr($old_date, 0, strpos($old_date, '-'));
    $year_thai = intval($year_now) + 543;
     return $year_thai;
}


function to_format($old_date)
{
     $month_name = [
          "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน",
          "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"
     ];


     //$a =  "2021 - 12 - 30";
     $year = substr($old_date, 0, strpos($old_date, '-'));

     $year_thai = intval($year) + 543;

     $month =   substr($old_date, strpos($old_date, '-') + 1, 2);
     $day   =  substr($old_date, strpos($old_date, '-') + 4, 2);



     if (intval($month) - 1 < 0) {
          $format = "-";
     } else {
          $format = $day  . " " . $month_name[intval($month) - 1] . " " . $year_thai;
     }


     return  $format;
}

/*
* to_format_abbreviation
* set format date โดยเดือนเป็นตัวย่อ
* @input -
* @output -
* @author 
* @Create 
* @Update Date -
*/
function to_format_abbreviation($old_date)
{
     $month_name = [ "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.", ];


     //$a =  "2021 - 12 - 30";
     $year = substr($old_date, 0, strpos($old_date, '-'));

     $year_thai = intval($year) + 543;

     $month =   substr($old_date, strpos($old_date, '-') + 1, 2);
     $day   =  substr($old_date, strpos($old_date, '-') + 4, 2);



     if (intval($month) - 1 < 0) {
          $format = "-";
     } else {
          $format = $day  . " " . $month_name[intval($month) - 1] . " " . $year_thai;
     }


     return  $format;
}