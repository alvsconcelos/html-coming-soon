<?php

namespace Admin;

use HTML_Coming_Soon\TypistTech\WPBetterSettings\Builder;
use HTML_Coming_Soon\TypistTech\WPBetterSettings\Registrar;
use HTML_Coming_Soon\TypistTech\WPBetterSettings\Section;
use HTML_Coming_Soon\TypistTech\WPOptionStore\Factory;
use Models\Html_Coming_Soon_Template;

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       mailto:ialvsconcelos@gmail.com
 * @since      1.0.0
 *
 * @package    PluginName
 * @subpackage PluginName/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    PluginName
 * @subpackage PluginName/admin
 * @author     Alvaro Vasconcelos - @alvsconcelos <ialvsconcelos@gmail.com>
 */
class Html_Coming_Soon_Admin
{

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version)
	{
		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Html_Coming_Soon_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Html_Coming_Soon_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style($this->plugin_name, HTML_COMING_SOON_URL . 'assets/admin/css/html-coming-soon-admin.css', array('wp-codemirror'), $this->version, 'all');
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Html_Coming_Soon_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Html_Coming_Soon_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script($this->plugin_name, HTML_COMING_SOON_URL . 'assets/admin/js/html-coming-soon-admin.js', array('jquery', 'wp-theme-plugin-editor'), $this->version, false);
		wp_localize_script($this->plugin_name, 'htmlcs', array(
			'editor_settings' => wp_enqueue_code_editor(array('type' => 'text/html'))
		));
	}

	public function register_admin_page()
	{
		add_menu_page(
			__('HTML Coming Soon', 'html-coming-soon'),
			__('HTML Coming Soon', 'html-coming-soon'),
			'manage_options',
			HTML_COMING_SOON_SLUG,
			array($this, 'render_admin_page'),
			'dashicons-clock',
			80,
		);
	}

	public function render_admin_page()
	{
?>
		<div class="wrap">
			<?php settings_errors(); ?>
			<h1><?php _e(esc_html(get_admin_page_title())); ?></h1>
			<p><?php _e('Aqui você pode configurar o comportamento do plugin.', 'html-coming-soon') ?></p>
			<p><?php printf(__('Caso escolha a renderização de um template, ele deve ser um arquivo ".php" estar presente no seu tema, no caminho: <code>%s</code>.', 'html-coming-soon'), Html_Coming_Soon_Template::get_template_override_path()); ?></p>
			<p><?php _e('Lembre-se, a renderização de código PHP só é possível no modo template.', 'html-coming-soon'); ?></p>
			<form action="options.php" method="post">
				<?php settings_fields(HTML_COMING_SOON_SLUG); ?>
				<?php do_settings_sections(HTML_COMING_SOON_SLUG); ?>
				<?php submit_button(); ?>
			</form>
		</div>
<?php }

	public function build_admin_page()
	{
		$builder = new Builder(
			Factory::build()
		);

		$basicSection = new Section(
			'settings',
			__('Configurações', 'html-coming-soon')
		);

		$basicSection->add(
			$builder->select(
				'behavior',
				__('O que será renderizado', 'html-coming-soon'),
				[
					'none' => __('Nada / Desativado', 'html-coming-soon'),
					'html' => __('Código HTML', 'html-coming-soon'),
					'template' => __('Template', 'html-coming-soon'),
				]
			),
			$builder->textarea(
				'html',
				__('Código HTML', 'html-coming-soon'),
				array('sanitize_callback' => array($this, 'sanitize_html_code'))
			),
		);

		$registrar = new Registrar(HTML_COMING_SOON_SLUG);
		$registrar->add($basicSection);

		$registrar->run();
	}

	public function sanitize_html_code($code)
	{
		$default_tags = wp_kses_allowed_html('post');
		$div_tags = $default_tags['div'];

		$allowed_tags = array_merge(
			$default_tags,
			array(
				'head' => true,
				'title' => true,
				'html' => array(
					'xmlns' => true,
					'lang' => true,
				),
				'meta' => array(
					'charset' => true,
					'content' => true,
					'name' => true,
				),
				'link' => array(
					'crossorigin' => true,
					'href' => true,
					'hreflang' => true,
					'media' => true,
					'referrerpolicy' => true,
					'rel' => true,
					'sizes' => true,
					'title' => true,
					'type' => true,
				),
				'script' => array(
					'src' => true,
					'type' => true,
					'async' => true,
					'defer' => true,
					'integrity' => true,
					'crossorigin' => true,
				),
				'style' => array(
					'media' => true,
					'type' => true,
				),
				'iframe' => array(
					'allow' => true,
					'allowfullscreen' => true,
					'allowpaymentrequest' => true,
					'height' => true,
					'loading' => true,
					'name' => true,
					'referrerpolicy' => true,
					'sandbox' => true,
					'src' => true,
					'srcdoc' => true,
					'width' => true
				),
				'body' => $div_tags,
				'main' => $div_tags,
				'footer' => $div_tags,
			)
		);
		// dd($allowed_tags);
		return wp_kses($code, $allowed_tags);
	}
}
