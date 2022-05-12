<?php /* Template Name: Login template */ ?>
<?php
get_header();
?>
<body class="custom-login-page">
<div class="form-container boxed">
    <h1><?= the_title(); ?></h1>
    <?php
if ( ! is_user_logged_in() ) { // Display WordPress login form:
    $args = array(
        'redirect' => admin_url(), 
        'form_id' => 'loginform-custom',
        'label_username' => __( 'Username:' ),
        'label_password' => __( 'Password:' ),
        'label_remember' => __( 'Remember Me?' ),
        'label_log_in' => __( 'Log In' ),
        'remember' => true
    );
    wp_login_form( $args );
} else { // If logged in:
    wp_loginout( home_url() ); // Display "Log Out" link.
    echo " | ";
    wp_register('', ''); // Display "Site Admin" link.
}
?>
</div>
