<?php

function bulanIndonesia($param){
  $months = [
    "january" => "Januari",
    "february" => "Februari",
    "march" => "Maret",
    "april" => "April",
    "may" => "Mei",
    "june" => "Juni",
    "july" => "Juli",
    "august" => "Agustus",
    "september" => "September",
    "october" => "Oktober",
    "november" => "November",
    "december" => "Desember"
  ];

  return $months[$param];
}