<?php

// Enqueue Google Analytics to header

function init_analytics() {
    $analyticsUA = 'UA-CODE-HERE';
    $analytics = '<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=' . $analyticsUA . '"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag(\'js\', new Date());

  gtag(\'config\', \'' . $analyticsUA . '\');
</script>';
    
echo "\n" . $analytics;
}

// add_action('wp_head', 'init_analytics', 35);

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

function init_favicons() {
  $favicons = '<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">';

  echo "\n" . $favicons;
}

// add_action('wp_head', 'init_favicons', 10);

function cookie_consent() {
  // Add policies here
  $privacyPolicyURL = 'https://example.com';
  $cookiePolicyURL = 'https://example.com';

      $cookiesEN = '<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.css" />
<script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.js"></script>
<script>
window.addEventListener("load", function(){
window.cookieconsent.initialise({
  "palette": {
    "popup": {
      "background": "#002136",
      "text": "#ffffff"
    },
    "button": {
      "background": "#1cadb2",
      "text": "#ffffff",
    }
  },
  "showLink": false,
  "content": {
    "message": "By using this website, you agree to our <a href=\"http://www.la-archdiocese.org/Pages/Help/PrivacyPolicy.aspx\" target=\"_blank\">Privacy Policy</a> and <a href=\"http://www.la-archdiocese.org/Pages/Help/TermsofUse.aspx\" target=\"_blank\">Terms of Use.</a>",
          "dismiss": "Accept"
  }
})});
</script>';

      $cookiesES = '<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.css" />
<script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.js"></script>
<script>
window.addEventListener("load", function(){
window.cookieconsent.initialise({
  "palette": {
    "popup": {
      "background": "#002136",
      "text": "#ffffff"
    },
    "button": {
      "background": "#1cadb2",
      "text": "#ffffff",

    }
  },
  "showLink": false,
  "content": {
    "message": "By using this website, you agree to our <a href=\"http://www.example.com\" target=\"_blank\">Privacy Policy</a> and <a href=\"http://example.com\" target=\"_blank\">Terms of Use.</a>",
          "dismiss": "Accept"
  }
})});
</script>';

// For multilingual sites equipped with WPML 

    // if( ICL_LANGUAGE_CODE =='es' ) {
    //     echo "\n" . $cookiesES;
    // } else {
    //     echo "\n" . $cookiesEN;
    // }

    // Regular monolingual website usage

    echo "\n" . $cookiesEN;

    
}

// add_action('wp_head', 'cookie_consent', 10);

