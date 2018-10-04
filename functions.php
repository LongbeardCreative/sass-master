<?php

// enqueue the child theme stylesheet

function wp_lb_enqueue_scripts() {
wp_register_style( 'childstyle', get_stylesheet_directory_uri() . '../../../plugins/nitrogen/assets/style.css'  );
wp_enqueue_style( 'childstyle' );
wp_enqueue_script( 'lb_custom-js', get_stylesheet_directory_uri() . '../../../plugins/nitrogen/assets/js/lb_custom.js', array( 'jquery' ), '1.0', true );
};
add_action( 'wp_enqueue_scripts', 'wp_lb_enqueue_scripts', 11);

// Enqueue Google Analytics to header

function init_analytics() {
    $analyticsUA = 'UA-CODE-HERE';
    $analytics = '<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-67479109-23"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag(\'js\', new Date());

  gtag(\'config\', \'' . $analyticsUA . '\');
</script>';
    
echo "\n" . $analytics;
}

add_action('wp_head', 'init_analytics', 35);

function init_pixel() {
    $pixelID = '123456789';
    $pixel = '<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version=\'2.0\';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,\'script\',
  \'https://connect.facebook.net/en_US/fbevents.js\');
  fbq(\'init\', \'' . $pixelID . '\');
  fbq(\'track\', \'PageView\');
</script>
<noscript><img height=\'1\' width=\'1\' style=\'display:none\'
  src=\'https://www.facebook.com/tr?id=' . $pixelID . ' &ev=PageView&noscript=1\'
/></noscript><!-- End Facebook Pixel Code -->';

echo "\n" . $pixel;
}

// add_action('wp_head', 'init_pixel', 35);




