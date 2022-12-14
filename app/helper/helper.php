<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function setting($settingname = null)
{
    @$value = \App\Setting::where('set_name', $settingname)->first()->value;
    return $value ? $value : 'Not Found';
}

function PreferedTime($num)
{
    if(\Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocale() == 'ar'){
        if ($num == 1) {
            return 'صباحا من 8ص وحتى 12م';
        } elseif ($num == 2) {
            return 'منتصف اليوم من 12م وحتى 6م';
        } elseif ($num == 3) {
            return 'مساءا من 6م وحتى 10م';
        } elseif ($num == 4) {
            return 'فى أى وقت فى اليوم';
        }
    }else{
        if ($num == 1) {
            return 'Morning from 8 am to 12 pm';
        } elseif ($num == 2) {
            return 'Mid day from 12 pm till 6 pm';
        } elseif ($num == 3) {
            return 'Evening from 6 pm to 10 pm';
        } elseif ($num == 4) {
            return 'At any time of the day';
        }
    }
}

function Level($num)
{
    if (\Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocale() == 'ar') {
        return \App\Edulevel::find($num)->title;
    }else{
        return \App\Edulevel::find($num)->slug;
    }
}
function spec($num)
{
    if (\Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocale() == 'ar') {
        return \App\Materials::where('slug',$num)->first()->title;
    }else{
        return $num;
    }

}