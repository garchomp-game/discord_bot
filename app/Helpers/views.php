<?php
/**
 * チェックタイプに応じて型を変換する
 *
    * @param type var Description
 * @return return type
 */
function checkTypeChange($type)
{
    if ($type == 'message') {
        $text = 'メッセージ';
    } elseif ($type == 'time') {
        $text = 'タイム';
    }

    return "タイプ：".$text;
}
