<?php
$debug = false;
/* ************ ANTIBOTS K3map v.2.1 ************ */
# Language : PHP
# Coder    : @Davidluna27
# [+] Contact :    t.me/Davidluna27   
/*
-------------------------------------------------
# [+] What's New in this version ?
# 01/ ip verification
# 05/ proxy, vpn and tor detection
# 03/ locking by user agent
# 04/ isp lock
# 05/ country blocking
# 06/ Language lock
# 07/ Block by referrers
# 08/ Block by Operative system
# 09/ trafic mode / adwords/spam/facebook
---------------------------------------------------
*/

#Referencias a bloquear segun el tipo de trafico
$spreading = 'spam';
#paises a permitir
$countries_allowed = ["VE","ES"];       
#Idiomas a permitir           
$languages_allowed = ["ES"];     
#sistemas operativos a bloquear    
$bad_operate_systems = array('Windows Server 2003/XP x64','Windows XP','Windows 2000','Windows ME','Windows 98','Windows 95','Windows 3.11','Ubuntu','Windows 7','Windows 8','Windows 8.1','Windows 10','Mac OS X','Mac OS 9');


#Antibots configuration
$comprobate_country = false;
$comprobate_language = false;
$comprobate_bots = false;
$comprobate_bad_os = false;
$comprobate_bad_referer = false;
$comprobate_proxy = false;
$comprobate_isp = false;
?>