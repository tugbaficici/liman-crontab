<?php

$ip = '192.168.1.201'; //extensiondb 192.168.1.200
$domainname= 'tugba.lab';//tugba.lab
$user = "Administrator@".$domainname;// tugba
$pass = 'Tugba65535+';
$server = 'ldaps://'.$ip;

$ldap = ldap_connect($server);
ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
ldap_set_option($ldap, LDAP_OPT_X_TLS_REQUIRE_CERT, LDAP_OPT_X_TLS_NEVER);
ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);

$bind=ldap_bind($ldap, $user, $pass);
if (!$bind) {
    exit('Binding failed');
} 
// cn=users,dc=home => DN 
//cn=Administrator, cn=Users, DC=home DC=lab

$filter = "(cn=Administrator)";
$result = ldap_search($ldap, "cn=Users,dc=home,dc=lab", $filter);
$entries = ldap_get_entries($ldap,$result);
//$count = ldap_count_entries($ldap, $result);

var_dump($entries);