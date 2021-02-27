<?php

use App\Models\LMS\Result;
use App\Models\LMS\ResultAnswer;

function changeWordEnding($num, $words)
{
    $num = $num % 100;
    if ($num > 19) {
        $num = $num % 10;
    }
    switch ($num) {
        case 1: {
            return($words[0]);
        }
        case 2: case 3: case 4: {
        return($words[1]);
    }
        default: {
            return($words[2]);
        }
    }
}

function formatDuration($item) : string
{
    $hours = floor($item->duration / 60);
    $minutes = $item->duration % 60;

    $arrHours = ['hour', 'hours', 'hours'];
    $arrMinutes = ['minute', 'minutes', 'minutes'];

    if (app()->getLocale() === 'ru') {
        $arrHours = ['час', 'часа', 'часов'];
        $arrMinutes = ['минута', 'минут', 'минут'];
    }

    if ($hours < 1) {
        return $minutes.' '.changeWordEnding($minutes, $arrMinutes);
    } elseif ($hours > 0 && $minutes < 1) {
        return $hours.' '.changeWordEnding($hours, $arrHours);
    }
    return $hours.' '.changeWordEnding($hours, $arrHours).' '.$minutes.' '.changeWordEnding($minutes, $arrMinutes);
}

// Check For Chinese Characters
function isChineseCharacters($string) : bool
{
    if (preg_match("/\p{Han}+/u", $string)) {
        return true;
    }
    return false;
}

function simplifySentence($sentence) : string
{
    $signs = ['.', ',', '!', ':'];
    $string = str_replace($signs, '', $sentence);
    $string = preg_replace('/ {2,}/',' ',$string);

    return strtolower($string);
}

function getArrayData($array, $key)
{
    if (array_key_exists($key,  $array)) {
        return $array[$key];
    }
    return null;
}

function getResult($user, $topic)
{
    return Result::where([
        ['user_id', $user->id],
        ['topic_id', $topic->id]
    ])->first();
}

function getUserAnswer($result, $conformity)
{
    return ResultAnswer::where([
        ['result_id', $result->id],
        ['conformity_id', $conformity->id],
    ])->first();
}

function getUserAnswers($result, $conformity)
{
    return ResultAnswer::where([
        ['result_id', $result->id],
        ['conformity_id', $conformity->id],
    ])->get();
}
