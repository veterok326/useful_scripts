<?php
//Определения города в PHP
function detect_city($ip) {
        $default = 'UNKNOWN';

        if (!is_string($ip) || strlen($ip) &lt; 1 || $ip == '127.0.0.1' || $ip == 'localhost')
 $ip = '8.8.8.8';

        $curlopt_useragent = 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.2) Gecko/20100115 Firefox/3.6 (.NET CLR 3.5.30729)';

        $url = 'http://ipinfodb.com/ip_locator.php?ip=' . urlencode($ip);
        $ch = curl_init();

        $curl_opt = array(
		 CURLOPT_FOLLOWLOCATION  =&gt; 1,
		 CURLOPT_HEADER      =&gt; 0,
		 CURLOPT_RETURNTRANSFER  =&gt; 1,
		 CURLOPT_USERAGENT   =&gt; $curlopt_useragent,
		 CURLOPT_URL       =&gt; $url,
		 CURLOPT_TIMEOUT         =&gt; 1,
		 CURLOPT_REFERER         =&gt; 'http://' . $_SERVER['HTTP_HOST'],
        );

        curl_setopt_array($ch, $curl_opt);

        $content = curl_exec($ch);

        if (!is_null($curl_info)) {
			$curl_info = curl_getinfo($ch);
        }

        curl_close($ch);

        if ( preg_match('{<br>City : ([^&lt;]*)<br>}i', $content, $regs) )  {
		$city = $regs[1];
        }
        if ( preg_match('{<br>State/Province : ([^&lt;]*)<br>}i', $content, $regs) )  {
		$state = $regs[1];
        }

        if( $city!='' &amp;&amp; $state!='' ){
          $location = $city . ', ' . $state;
          return $location;
        }else{
          return $default;
        }

}