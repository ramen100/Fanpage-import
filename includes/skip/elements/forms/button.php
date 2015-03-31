<?php/** * Skip Button class * @package Skip\Forms * @since 1.0 * @ignore */ namespace skip\v1_0_0;class Button extends Form_Element{	/**	 * Constructor	 * @since 1.0	 * @param string $value The text which appears on the button.	 * @param array/string $args List of Arguments.	 */	function __construct( $value, $args = array() ){		 $defaults = array(			'name' => '',			'submit' => TRUE		);				$args = wp_parse_args( $args, $defaults );		extract( $args , EXTR_SKIP );				$args[ 'close_tag' ] = FALSE; // No Close tag for Input type Text		$args[ 'save' ] = FALSE;		$args[ 'value' ] = $value;				parent::__construct( 'input', $name, $args );				$this->add_param( 'type', 'submit' ); // This is a text field!		$this->add_param( 'class', 'button' ); // This is a text field!	}		/**	 * Rendering Button	 * @since 1.0	 * @return string $html Returns The HTML Code	 */	public function render(){		global $skip_javascripts;				$skip_javascripts[] = '$("#' . $this->params[ 'id' ] . '").button();';				return parent::render();	}}/** * Button getter Function * @see skip_button() * @ignore */function get_button( $value, $args = array(), $return = 'html' ){	$button = new Button( $value, $args );	return element_return( $button, $return );}/** * <pre>skip_button( $value, $args = array() );</pre> *  * Adding a jQueryUI button. *  * <b>Default Usage</b> * <code> * skip_button( 'Save' ); * </code> *  * <b>Parameters</b> *  * <code> * $value // (string) (required) The text which appears on the button. * $args // (array/string) (optional) Values for further settings. * </code> *  * <b>$args Settings</b> *  * <ul> * 	<li>id (string) ID if the HTML Element.</li>  * 	<li>submit (boolean) TRUE if element have to submit a form (default TRUE)</li>  * 	<li>default (string) Default Value if no Value is set before.</li> * 	<li>classes (string) Name of CSS Classes which will be inserted into HTML seperated by empty space.</li> * 	<li>before_element (string) Content before the element.</li> *	<li>after_element (string) Content after the element.</li> * </ul> * * @package Skip\Forms * @since 1.0 * @param string The text which appears on the button. * @param array/string $args List of Arguments. */function button( $value, $args = array() ){	 echo get_button( $value, $args, 'echo' );}
