<?php
global $dg_options;
$theme_url = trailingslashit( get_stylesheet_directory_uri() );
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
<script>
window.dataLayer = window.dataLayer || [];
dataLayer.push({
  'cmsType': 'WP'
});
</script>
<script type="text/javascript" src="<?=$theme_url?>js/script.js?v=<?=DG_PLUGIN_VERSION?>"></script>
<script id="CookieConsent" src="https://policy.app.cookieinformation.com/uc.js"
    data-culture="NB" type="text/javascript"></script>
<!-- ZenDesk Chat Widget Start -->
<script>
  const snippetId = "4d0c1495-bf25-4a0d-a174-5552b507a292"
  const departmentId = 7273117729041

  window.zESettings = {
    webWidget: {
      helpCenter: {
        title: { '*': 'ProISP Hjelpesenter' },
        chatButton: { '*': 'Chat med oss' }
      },
      contactForm: {
        attachments: false,
        title: { "*": "Send oss en melding" }
      },
      color: {
        theme: "#e6f2fa",
        header: "#e6f2fa"
      },
      chat: {
        departments: {
          enabled: [departmentId],
          select: departmentId
        },
        prechatForm: {
          greeting: {
            "*": "Det er frivillig å oppgi personinformasjon. Du behøver ikke oppgi verken navn eller e-post."
          }
        },
        concierge: {
          avatarPath: "https://static.proisp.org/favicon.ico",
          name: "PRO ISP - Kundeservice",
          title: { "*": "Live Chat" }
        }
      }
    }
  }

  // on document ready
  document.addEventListener("DOMContentLoaded", function(event) {

    // Load widget
    const script = document.createElement("script");
    script.src = "https://static.zdassets.com/ekr/snippet.js?key=" + snippetId;
    script.id = "ze-snippet"
    document.body.appendChild(script)

    function setChatStatus(department) {
      if (department.id !== departmentId) return
      const isOnline = department && department.status === 'online'

      // Suppress chat
      zE('webWidget', 'updateSettings', { webWidget: { chat: { suppress: !isOnline } } });
    }

    // Widget customizations
    script.addEventListener("load", () => {
      zE("webWidget", "setLocale", "no")
      zE('webWidget', 'helpCenter:setSuggestions', { labels: ['proisptop10'] });

      // Continiously check if department is online, and show/hide chat accordingly
      zE('webWidget:on', 'chat:departmentStatus', setChatStatus);

      // Check if department is online when chat is connected, and show/hide chat accordingly
      zE('webWidget:on', 'chat:connected', function() {
        const department = zE('webWidget:get', 'chat:department', departmentId)
        setChatStatus(department)
      })

      // Automatically open the widget
//      zE('webWidget', 'open');
    })

  });

</script>
<!-- ZenDesk Chat Widget End -->
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','GTM-P5NJ34');</script>
<!-- End Google Tag Manager -->
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <base href="<?=trailingslashit($_SERVER['REQUEST_URI'])?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link type="application/opensearchdescription+xml" rel="search" href="<?=$theme_url?>osdd_<?=$dg_options['dg_theme_style']?>.xml" />
        <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
        <link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
        <?php endif; ?>
        <link rel="preconnect" href="<?=$dg_options['dg_api_url']?>">
        <link rel="preload" href="<?=$theme_url?>css/style_<?=$dg_options['dg_theme_style']?>.css?v=<?=UW_THEME_VERSION?>" as="style">
        <link rel="stylesheet" type="text/css" href="<?=$theme_url?>css/critical_<?=$dg_options['dg_theme_style']?>.css?v=<?=DG_PLUGIN_VERSION?>">
        <?php wp_head(); ?>
        <?php if( $dg_options['dg_theme_style'] == 'fn' ) : ?>
        <?php else: ?>
        <?php endif; ?>
</head>
<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P5NJ34"
  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<?php wp_body_open(); ?>
<div class="fl-page">
                <?php echo dg_notification_bar_func(); ?>
                <header>
                        <div id="logobar" class="clearfix">
                                <div id="logo"><a href="<?php echo home_url(); ?>"><img src="/wp-content/uploads/2023/07/pro-isp-logo-powered-by-one.svg"></a></div>

                                <div id="header-tools">
                                        <?=do_shortcode( '[dg_ds_form button-text="" icon="true"]' )?>
<!--                                    <a href="<?=$dg_options['dg_cart_url']?>" class="header-button" aria-label="Handlekurv">
                                                <svg class="dg-icon" viewbox="0 0 32 32">
                                                        <use xlink:href="<?=$theme_url?>assets/sprite_<?=$dg_options['dg_theme_style']?>.svg?v=<?=DG_PLUGIN_VERSION?>#icon-cart"></use>
                                                </svg>
                                                <span class="dg-header-tools-label">Handlekurv</span>
                                                        <?php
                                                                $visible = '';
                                                                $num = '';
                                                                if( isset( $_COOKIE['dg_cart_num'] ) && is_numeric( $_COOKIE['dg_cart_num'] ) && $_COOKIE['dg_cart_num'] > 0 ) {
                                                                        $visible = ' visible';
                                                                        $num = $_COOKIE['dg_cart_num'];
                                                                }
                                                        ?>
                                                        <span class="dg-cart-num<?=$visible?>"><?=$num?></span>
                                                </span>
                                        </a>
-->
                                        <div id="hamburger">
                                                <svg class="dg-icon" viewbox="0 0 32 32">
                                                        <use xlink:href="<?=$theme_url?>assets/sprite_<?=$dg_options['dg_theme_style']?>.svg?v=<?=DG_PLUGIN_VERSION?>#icon-menu"></use>
                                                </svg>
                                        </div>
                                </div>
                        </div>
                        <div id="navbar">
                                <?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'container_id' => 'navbar-left', 'container_class' => 'main_nav_container' ) ); ?>
                                <?php wp_nav_menu( array( 'theme_location' => 'customer-menu', 'container_id' => 'navbar-right', 'container_class' => 'main_nav_container' ) ); ?>
                        </div>
                </header>

                <nav id="fullscreen-nav" class="defer">
                        <svg class="dg-icon icon--white" viewbox="0 0 32 32">
                                <use xlink:href="<?=$theme_url?>assets/sprite_<?=$dg_options['dg_theme_style']?>.svg?v=<?=DG_PLUGIN_VERSION?>#icon-cross"></use>
                        </svg>
                        <div id="fullscreen-wrapper">
                                <?=do_shortcode( '[dg_ds_form button-text="" icon="true"]' )?>
                                <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
                                <?php wp_nav_menu( array( 'theme_location' => 'customer-menu' ) ); ?>
                        </div>
                </nav>
