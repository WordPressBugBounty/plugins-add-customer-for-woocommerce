<?php
/**
 * New Account notification email
 * This email is getting send, when a new user is created by Add Customer for WooCommerce.
 * For this to happen, you have to activate the option in Wordpress Backend -> Settings -> Add Customer Settings -> Send notifications to new user
 * 
 * Please do not edit this file in the plugins folder, because it will be overridden on plugin update.
 * Copy this file to: \wp-content\themes\[theme/child-theme]\woocommerce\add-customer\email\ and make your changes there.
 * 
 * @version     1.6.5
 * @package     WAC\EmailTemplate
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

extract(get_defined_vars());
$email = (isset($template_args[0])) ? $template_args[0] : ''; //The Email of the new customer
$name = (isset($template_args[1])) ? $template_args[1] : ''; //The Name of the new Customer
$reset_user_pass_link = (isset($template_args[2])) ? $template_args[2] : ''; //The password reset link
$site = (isset($template_args[3])) ? $template_args[3] : ''; //The Site name


//The WooCommerce email Header
//To change the header,copy the email-header.php from plugins\woocommerce\templates\emails to the theme folder
do_action('woocommerce_email_header', esc_html__('New account created', 'wac'), 'header_email'); ?>

<h1><?php echo sprintf(esc_html__('Hi, %s', 'wac'), $name); ?></h1>
<p><?php echo sprintf(esc_html__('Your account on %s has been created.', 'wac'), $site); ?></p>
<p><?php echo sprintf(esc_html__('Email: %s', 'wac'), $email); ?><br /></p>

<p>
    <?php echo esc_html__('To log in, you have to create a password for your account.', 'wac'); ?><br/>
    <a href="<?php echo $reset_user_pass_link; ?>"><?php echo esc_html__('Set the password for your account', 'wac'); ?></a>
</p>

<?php
//The WooCommerce email footer
//To change the header,copy the email-footer.php from plugins\woocommerce\templates\emails to the theme folder
do_action('woocommerce_email_footer', 'footer_email');
