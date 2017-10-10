<?php
//Whois на PHP
function whois_query($domain) { 
	// исправляем доменное имя:
	 $domain = strtolower(trim($domain));
	 $domain = preg_replace('/^http:\/\//i', '', $domain);
	 $domain = preg_replace('/^www\./i', '', $domain);
	 $domain = explode('/', $domain);
	 $domain = trim($domain[0]);
	 
	$_domain = explode('.', $domain);
	 $lst = count($_domain)-1;
	 $ext = $_domain[$lst];
	 
	$servers = array(
	 "biz" =&gt; "whois.neulevel.biz",
	 "com" =&gt; "whois.internic.net",
	 "us" =&gt; "whois.nic.us",
	 "coop" =&gt; "whois.nic.coop",
	 "info" =&gt; "whois.nic.info",
	 "name" =&gt; "whois.nic.name",
	 "net" =&gt; "whois.internic.net",
	 "gov" =&gt; "whois.nic.gov",
	 "edu" =&gt; "whois.internic.net",
	 "mil" =&gt; "rs.internic.net",
	 "int" =&gt; "whois.iana.org",
	 "ac" =&gt; "whois.nic.ac",
	 "ae" =&gt; "whois.uaenic.ae",
	 "at" =&gt; "whois.ripe.net",
	 "au" =&gt; "whois.aunic.net",
	 "be" =&gt; "whois.dns.be",
	 "bg" =&gt; "whois.ripe.net",
	 "br" =&gt; "whois.registro.br",
	 "bz" =&gt; "whois.belizenic.bz",
	 "ca" =&gt; "whois.cira.ca",
	 "cc" =&gt; "whois.nic.cc",
	 "ch" =&gt; "whois.nic.ch",
	 "cl" =&gt; "whois.nic.cl",
	 "cn" =&gt; "whois.cnnic.net.cn",
	 "cz" =&gt; "whois.nic.cz",
	 "de" =&gt; "whois.nic.de",
	 "fr" =&gt; "whois.nic.fr",
	 "hu" =&gt; "whois.nic.hu",
	 "ie" =&gt; "whois.domainregistry.ie",
	 "il" =&gt; "whois.isoc.org.il",
	 "in" =&gt; "whois.ncst.ernet.in",
	 "ir" =&gt; "whois.nic.ir",
	 "mc" =&gt; "whois.ripe.net",
	 "to" =&gt; "whois.tonic.to",
	 "tv" =&gt; "whois.tv",
	 "ru" =&gt; "whois.ripn.net",
	 "org" =&gt; "whois.pir.org",
	 "aero" =&gt; "whois.information.aero",
	 "nl" =&gt; "whois.domain-registry.nl"
	 );
	 
	if (!isset($servers[$ext])){
	 die('Error: No matching nic server found!');
}
 
$nic_server = $servers[$ext];
 
$output = '';
 
 if ($conn = fsockopen ($nic_server, 43)) {
	 fputs($conn, $domain."\r\n");
	 while(!feof($conn)) {
		$output .= fgets($conn,128);
	 }
	 fclose($conn);
 }
 else { die('Error: Could not connect to ' . $nic_server . '!'); }
 
return $output;
}