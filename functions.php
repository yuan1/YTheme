<?php

function themeConfig($form) {    

    $siteIcon = new Typecho_Widget_Helper_Form_Element_Text('siteIcon', NULL, NULL, _t('标题栏和书签栏Icon'), _t('在这里填入一个图片URL地址, 作为标题栏和书签栏Icon, 默认不显示'));
    $form->addInput($siteIcon);

    $miibeian = new Typecho_Widget_Helper_Form_Element_Text('miibeian', NULL, _t(''), _t('备案号'), _t('在这里填入天朝备案号，不显示则留空'));
    $form->addInput($miibeian);

    $misc = new Typecho_Widget_Helper_Form_Element_Checkbox('misc', array(
        'ShowLogin' => _t('前台显示登录入口'),
        'ShowLoadTime' => _t('页脚显示加载耗时')
        ),
    array('ShowLogin'), _t('杂项'));
    $form->addInput($misc->multiMode());
}

function timer_start() {
    global $timestart;
    $mtime = explode( ' ', microtime() );
    $timestart = $mtime[1] + $mtime[0];
    return true;
}
timer_start();
 
function timer_stop( $display = 0, $precision = 3 ) {
    global $timestart, $timeend;
    $mtime = explode( ' ', microtime() );
    $timeend = $mtime[1] + $mtime[0];
    $timetotal = $timeend - $timestart;
    $r = number_format( $timetotal, $precision );
    if ( $display )
    echo $r;
    return $r;
}
