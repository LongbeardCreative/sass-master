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
        "background": "#F1EDEA",
        "text": "#636267"
      },
      "button": {
        "background": "#9A6D32",
        "text": "#ffffff",
      }
    },
    "showLink": false,
    "content": {
      "message": "By using this website, you agree to our <a href=\"' . $privacyPolicyURL . '\" target=\"_blank\">Privacy Policy</a> and <a href=\"' . $cookiePolicyURL . '\" target=\"_blank\">Terms of Use.</a>",
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
        "background": "#F1EDEA",
        "text": "#ffffff"
      },
      "button": {
        "background": "#1cadb2",
        "text": "#ffffff",
  
      }
    },
    "showLink": false,
    "content": {
      "message": "By using this website, you agree to our <a href=\"' . $privacyPolicyURL . '\" target=\"_blank\">Privacy Policy</a> and <a href=\"' . $cookiePolicyURL . '\" target=\"_blank\">Terms of Use.</a>",
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


function wpdocs_my_search_form( $form ) {
  $form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
  <div><label class="screen-reader-text" for="s">' . __( 'Search for:' ) . '</label>
  <input type="text" value="" placeholder="Search..." name="s" id="s" />
  <button class="button" type="submit" id="searchsubmit" value="Search">Search</button>
  </div>
  </form>';

  return $form;
}
add_filter( 'get_search_form', 'wpdocs_my_search_form' );




// Get custom post types
$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

if (strpos($url,'ct_builder') !== false) { } else {
    require_once('lb-cpt.php'); 
}




//// BREADCRUMB START ////       
function the_breadcrumb() {
 
  $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
  $delimiter = '<span class="delimiter"> &frasl; </span>'; // delimiter between crumbs
  $home = 'Home'; // text for the 'Home' link
  $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
  $before = '<span class="current">'; // tag before the current crumb
  $after = '</span>'; // tag after the current crumb
 
  global $post;
  $homeLink = get_bloginfo('url'); 
 
  if (is_home() || is_front_page()) {
 
    if ($showOnHome == 1) echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a></div>';
 
  } else {
 
    echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
 
    if ( is_category() ) {
      $thisCat = get_category(get_query_var('cat'), false);
      if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
      echo $before . 'Archive by category "' . single_cat_title('', false) . '"' . $after;
 
    } elseif ( is_search() ) {
      echo $before . 'Search results for "' . get_search_query() . '"' . $after;
 
    } elseif ( is_day() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('d') . $after;
 
    } elseif ( is_month() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('F') . $after;
 
    } elseif ( is_year() ) {
      echo $before . get_the_time('Y') . $after;
 
    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
        if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        $cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
        if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
        echo $cats;
        if ($showCurrent == 1) echo $before . get_the_title() . $after;
      }
 
    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      echo $before . $post_type->labels->singular_name . $after;
 
    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
      if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
 
    } elseif ( is_page() && !$post->post_parent ) {
      if ($showCurrent == 1) echo $before . get_the_title() . $after;
 
    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      for ($i = 0; $i < count($breadcrumbs); $i++) {
        echo $breadcrumbs[$i];
        if ($i != count($breadcrumbs)-1) echo ' ' . $delimiter . ' ';
      }
      if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
 
    } elseif ( is_tag() ) {
      echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
 
    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $before . 'Articles posted by ' . $userdata->display_name . $after;
 
    } elseif ( is_404() ) {
      echo $before . 'Error 404' . $after;
    }
 
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __('Page') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }
 
    echo '</div>';
 
  }
} 

//// BREADCRUMB END ////


// filter the Gravity Forms button type
// add_filter( 'gform_submit_button_1', 'subscribe_button', 10, 2 );
// function subscribe_button( $button, $form ) {
//     return "<button class='button submit-button' id='gform_submit_button_{$form['id']}'><span>Subscribe</span></button>";
// }

// add Video Tutorials link to WP Admin

add_action('admin_menu', 'videotutorials_admin_menu');
 
function videotutorials_admin_menu() {
    global $submenu;
    $url = '/video-tutorials';
    $submenu['index.php'][] = array('Video Tutorials', 'manage_options', $url);
}