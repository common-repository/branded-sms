<?php
global $apg_sms_settings, $wpml_activo;

//Control de tabulación
$tab = 1;

//WPML
if ( function_exists( 'icl_register_string' ) || !$wpml_activo ) { //Versión anterior a la 3.2
	$mensaje_pedido		= ( $wpml_activo ) ? icl_translate( 'apg_sms', 'mensaje_pedido', $apg_sms_settings['mensaje_pedido'] ) : $apg_sms_settings['mensaje_pedido'];
	$mensaje_recibido	= ( $wpml_activo ) ? icl_translate( 'apg_sms', 'mensaje_recibido', $apg_sms_settings['mensaje_recibido'] ) : $apg_sms_settings['mensaje_recibido'];
	$mensaje_procesando	= ( $wpml_activo ) ? icl_translate( 'apg_sms', 'mensaje_procesando', $apg_sms_settings['mensaje_procesando'] ) : $apg_sms_settings['mensaje_procesando'];
	$mensaje_completado	= ( $wpml_activo ) ? icl_translate( 'apg_sms', 'mensaje_completado', $apg_sms_settings['mensaje_completado'] ) : $apg_sms_settings['mensaje_completado'];
	$mensaje_nota		= ( $wpml_activo ) ? icl_translate( 'apg_sms', 'mensaje_nota', $apg_sms_settings['mensaje_nota'] ) : $apg_sms_settings['mensaje_nota'];
} else if ( $wpml_activo ) { //Versión 3.2 o superior
	$mensaje_pedido		= apply_filters( 'wpml_translate_single_string', $apg_sms_settings['mensaje_pedido'], 'apg_sms', 'mensaje_pedido' );
	$mensaje_recibido	= apply_filters( 'wpml_translate_single_string', $apg_sms_settings['mensaje_recibido'], 'apg_sms', 'mensaje_recibido' );
	$mensaje_procesando	= apply_filters( 'wpml_translate_single_string', $apg_sms_settings['mensaje_procesando'], 'apg_sms', 'mensaje_procesando' );
	$mensaje_completado	= apply_filters( 'wpml_translate_single_string', $apg_sms_settings['mensaje_completado'], 'apg_sms', 'mensaje_completado' );
	$mensaje_nota		= apply_filters( 'wpml_translate_single_string', $apg_sms_settings['mensaje_nota'], 'apg_sms', 'mensaje_nota' );
}

//Listado de proveedores SMS
$listado_de_proveedores = [
	"hostandsoft" 		=> "Host & Soft",
	"brandedsmsio" 		=> "BrandedSMS.io",
	"adlinks"			=> "Adlinks Labs", 
	"bulkgate"			=> "BulkGate", 
	"bulksms"			=> "BulkSMS", 
	"clickatell" 		=> "Clickatell", 
	"clockwork" 		=> "Clockwork", 
	"esebun"			=> "Esebun Business ( Enterprise & Developers only )",
	"isms"				=> "iSMS Malaysia",
	"labsmobile"		=> "LabsMobile Spain",
	"mobtexting"		=> "MobTexting",
	"moplet" 			=> "Moplet",
	"moreify" 			=> "Moreify",
	"msg91" 			=> "MSG91", 
	"msgwow"			=> "MSGWOW",
	"mvaayoo" 			=> "mVaayoo", 
	"nexmo"				=> "Nexmo",
	"plivo" 			=> "Plivo",
	"routee" 			=> "Routee",
	"sipdiscount" 		=> "SIP Discount", 
	"smscountry" 		=> "SMS Country",
	"smsdiscount" 		=> "SMS Discount", 
	"smslane" 			=> "SMS Lane ( Transactional SMS only )",
	"solutions_infini" 	=> "Solutions Infini", 
	"springedge" 		=> "Spring Edge",
	"twilio" 			=> "Twilio", 
	"twizo"				=> "Twizo",
	"voipbuster" 		=> "VoipBuster", 
	"voipbusterpro" 	=> "VoipBusterPro", 
	"voipstunt" 		=> "VoipStunt",
];
//asort( $listado_de_proveedores, SORT_NATURAL | SORT_FLAG_CASE ); //Ordena alfabeticamente los proveedores

//Campos necesarios para cada proveedor
$campos_de_proveedores = [ 
	"hostandsoft" 		=> [ 
		"identificador_hostandsoft" 			=> __( 'sender ID', 'branded-sms' ),
		"usuario_hostandsoft" 				=> __( 'username', 'branded-sms' ),
		"contrasena_hostandsoft" 			=> __( 'password', 'branded-sms' ),
		"servidor_hostandsoft" 						=> __( 'host', 'branded-sms' ),
	],
	"brandedsmsio" 		=> [ 
		"contrasena_brandedsmsio" 			=> __( 'API Key', 'branded-sms-io' ),
		"identificador_brandedsmsio" 			=> __( 'sender ID', 'branded-sms-io' ),
	],
	"adlinks"			=> [
		"usuario_adlinks"					=> __( 'authentication key', 'branded-sms' ),
		"ruta_adlinks"						=> __( 'route', 'branded-sms' ),
		"identificador_adlinks"				=> __( 'sender ID', 'branded-sms' ),
	],
   "bulkgate"			=> [
		"usuario_bulkgate"					=> __( 'application ID', 'branded-sms' ),
		"clave_bulkgate"					=> __( 'authentication Token', 'branded-sms' ),
		"identificador_bulkgate"			=> __( 'sender ID', 'branded-sms' ),
	],
   "bulksms" 			=> [ 
	   "usuario_bulksms" 					=> __( 'username', 'branded-sms' ),
	   "contrasena_bulksms" 				=> __( 'password', 'branded-sms' ),
	   "servidor_bulksms"					=> __( 'host', 'branded-sms' ),
   ],
   "clickatell" 		=> [ 
	   "identificador_clickatell" 			=> __( 'sender ID', 'branded-sms' ),
	   "usuario_clickatell" 				=> __( 'username', 'branded-sms' ),
	   "contrasena_clickatell" 			=> __( 'password', 'branded-sms' ),
   ],
   "clockwork" 		=> [ 
	   "identificador_clockwork" 			=> __( 'key', 'branded-sms' ),
   ],
   "esebun" 			=> [ 
	   "usuario_esebun" 					=> __( 'username', 'branded-sms' ),
	   "contrasena_esebun" 				=> __( 'password', 'branded-sms' ),
	   "identificador_esebun" 				=> __( 'sender ID', 'branded-sms' ),
   ],
   "isms" 				=> [ 
	   "usuario_isms" 						=> __( 'username', 'branded-sms' ),
	   "contrasena_isms" 					=> __( 'password', 'branded-sms' ),
	   "telefono_isms" 					=> __( 'mobile number', 'branded-sms' ),
   ],
   "labsmobile"		=> [
	   "usuario_labsmobile"				=> __( 'username', 'branded-sms' ),
	   "contrasena_labsmobile"				=> __( 'password', 'branded-sms' ),
	   "sid_labsmobile"					=> __( 'sender ID', 'branded-sms' ),
   ],
   "mobtexting"		=> [ 
	   "clave_mobtexting"					=> __( 'key', 'branded-sms' ),
	   "identificador_mobtexting"			=> __( 'sender ID', 'branded-sms' ),
   ],
   "moplet" 			=> [ 
	   "clave_moplet" 						=> __( 'authentication key', 'branded-sms' ),
	   "identificador_moplet" 				=> __( 'sender ID', 'branded-sms' ),
	   "ruta_moplet" 						=> __( 'route', 'branded-sms' ),
	   "servidor_moplet" 					=> __( 'host', 'branded-sms' ),
   ],
   "moreify" 			=> [ 
	   "proyecto_moreify"					=> __( 'project', 'branded-sms' ),
	   "identificador_moreify" 			=> __( 'authentication Token', 'branded-sms' ),
   ],
   "msg91" 			=> [ 
	   "clave_msg91" 						=> __( 'authentication key', 'branded-sms' ),
	   "identificador_msg91" 				=> __( 'sender ID', 'branded-sms' ),
	   "ruta_msg91" 						=> __( 'route', 'branded-sms' ),
   ],
   "msgwow" 			=> [ 
	   "clave_msgwow"						=> __( 'key', 'branded-sms' ),
	   "identificador_msgwow"				=> __( 'sender ID', 'branded-sms' ),
	   "ruta_msgwow" 						=> __( 'route', 'branded-sms' ),
	   "servidor_msgwow"					=> __( 'host', 'branded-sms' ),
   ],
   "mvaayoo" 			=> [ 
	   "usuario_mvaayoo" 					=> __( 'username', 'branded-sms' ),
	   "contrasena_mvaayoo" 				=> __( 'password', 'branded-sms' ),
	   "identificador_mvaayoo" 			=> __( 'sender ID', 'branded-sms' ),
   ],
   "nexmo" 			=> [ 
	   "clave_nexmo"						=> __( 'key', 'branded-sms' ),
	   "identificador_nexmo"				=> __( 'authentication Token', 'branded-sms' ),
   ],
   "plivo"				=> [
	   "usuario_plivo"						=> __( 'authentication ID', 'branded-sms' ),
	   "clave_plivo"						=> __( 'authentication Token', 'branded-sms' ),
	   "identificador_plivo"				=> __( 'sender ID', 'branded-sms' ),
   ],
   "routee"			=> [ 
	   "usuario_routee" 					=> __( 'application ID', 'branded-sms' ),
	   "contrasena_routee"					=> __( 'application secret', 'branded-sms' ),
	   "identificador_routee"				=> __( 'sender ID', 'branded-sms' ),
   ], 
   "sipdiscount"		=> [ 
	   "usuario_sipdiscount" 				=> __( 'username', 'branded-sms' ),
	   "contrasena_sipdiscount"			=> __( 'password', 'branded-sms' ),
   ], 
   "smscountry" 		=> [ 
	   "usuario_smscountry"				=> __( 'username', 'branded-sms' ),
	   "contrasena_smscountry" 			=> __( 'password', 'branded-sms' ),
	   "sid_smscountry" 					=> __( 'sender ID', 'branded-sms' ),
   ],
   "smsdiscount"		=> [ 
	   "usuario_smsdiscount" 				=> __( 'username', 'branded-sms' ),
	   "contrasena_smsdiscount"			=> __( 'password', 'branded-sms' ),
   ], 
   "smslane" 			=> [ 
	   "usuario_smslane" 					=> __( 'username', 'branded-sms' ),
	   "contrasena_smslane" 				=> __( 'password', 'branded-sms' ),
	   "sid_smslane" 						=> __( 'sender ID', 'branded-sms' ),
   ],
   "solutions_infini" 	=> [ 
	   "clave_solutions_infini" 			=> __( 'key', 'branded-sms' ),
	   "identificador_solutions_infini" 	=> __( 'sender ID', 'branded-sms' ),
   ],
   "springedge" 		=> [ 
	   "clave_springedge" 					=> __( 'key', 'branded-sms' ),
	   "identificador_springedge"		 	=> __( 'sender ID', 'branded-sms' ),
   ],
   "twilio" 			=> [ 
	   "clave_twilio" 						=> __( 'account Sid', 'branded-sms' ),
	   "identificador_twilio" 				=> __( 'authentication Token', 'branded-sms' ),
	   "telefono_twilio" 					=> __( 'mobile number', 'branded-sms' ),
   ],
   "twizo" 			=> [ 
	   "clave_twizo"						=> __( 'key', 'branded-sms' ),
	   "identificador_twizo"				=> __( 'sender ID', 'branded-sms' ),
	   "servidor_twizo"					=> __( 'host', 'branded-sms' ),
   ],
   "voipbuster"		=> [ 
	   "usuario_voipbuster" 				=> __( 'username', 'branded-sms' ),
	   "contrasena_voipbuster"				=> __( 'password', 'branded-sms' ),
   ], 
   "voipbusterpro"		=> [ 
	   "usuario_voipbusterpro"				=> __( 'username', 'branded-sms' ),
	   "contrasena_voipbusterpro"			=> __( 'password', 'branded-sms' ),
   ], 
   "voipstunt"			=> [ 
	   "usuario_voipstunt" 				=> __( 'username', 'branded-sms' ),
	   "contrasena_voipstunt" 				=> __( 'password', 'branded-sms' ),
   ], 
];

//Opciones de campos de selección de los proveedores
$opciones_de_proveedores = [
	"ruta_adlinks"		=> [
		1						=> 1, 
		4						=> 4,
	],
	"servidor_hostandsoft"	=> [
		"sms.hostandsoft.com:80"		=> __( 'Pakistan', 'branded-sms' ), 
		"bsms.hostandsoft.com"		=> __( 'International', 'branded-sms' ),
	],
	"servidor_bulksms"	=> [
		"bulksms.vsms.net"		=> __( 'International', 'branded-sms' ), 
		"www.bulksms.co.uk"		=> __( 'UK', 'branded-sms' ),
		"usa.bulksms.com"		=> __( 'USA', 'branded-sms' ),
		"bulksms.2way.co.za"	=> __( 'South Africa', 'branded-sms' ),
		"bulksms.com.es"		=> __( 'Spain', 'branded-sms' ),
	],
	"servidor_moplet"	=> [
		"0"						=> __( 'International', 'branded-sms' ), 
		"1"						=> __( 'USA', 'branded-sms' ), 
		"91"					=> __( 'India', 'branded-sms' ),
	],
	"ruta_msg91"		=> [
		"default"				=> __( 'Default', 'branded-sms' ), 
		1						=> 1, 
		4						=> 4,
	],
	"ruta_msgwow"		=> [
		1						=> 1, 
		4						=> 4,
	],
	"servidor_msgwow"	=> [
		"0"						=> __( 'International', 'branded-sms' ), 
		"1"						=> __( 'USA', 'branded-sms' ), 
		"91"					=> __( 'India', 'branded-sms' ), 
	],
	"servidor_twizo"	=> [
		"api-asia-01.twizo.com"	=> __( 'Singapore', 'branded-sms' ), 
		"api-eu-01.twizo.com"	=> __( 'Germany', 'branded-sms' ), 
	],
];

//Listado de estados de pedidos
$listado_de_estados				= wc_get_order_statuses();
$listado_de_estados_temporal	= [];
$estados_originales				= [ 
	'pending',
	'failed',
	'on-hold',
	'processing',
	'completed',
	'refunded',
	'cancelled',
];
foreach( $listado_de_estados as $clave => $estado ) {
	$nombre_de_estado = str_replace( "wc-", "", $clave );
	if ( !in_array( $nombre_de_estado, $estados_originales ) ) {
		$listado_de_estados_temporal[ $estado ] = $nombre_de_estado;
	}
}
$listado_de_estados = $listado_de_estados_temporal;

//Listado de mensajes personalizados
$listado_de_mensajes = [
	'todos'					=> __( 'All messages', 'branded-sms' ),
	'mensaje_pedido'		=> __( 'Owner custom message', 'branded-sms' ),
	'mensaje_recibido'		=> __( 'Order on-hold custom message', 'branded-sms' ),
	'mensaje_procesando'	=> __( 'Order processing custom message', 'branded-sms' ),
	'mensaje_completado'	=> __( 'Order completed custom message', 'branded-sms' ),
	'mensaje_nota'			=> __( 'Notes custom message', 'branded-sms' ),
];

/*
Pinta el campo select con el listado de proveedores
*/
function apg_sms_listado_de_proveedores( $listado_de_proveedores ) {
	global $apg_sms_settings;
	
	foreach ( $listado_de_proveedores as $valor => $proveedor ) {
		$chequea = ( isset( $apg_sms_settings[ 'servicio' ] ) && $apg_sms_settings[ 'servicio' ] == $valor ) ? ' selected="selected"' : '';
		echo '<option value="' . $valor . '"' . $chequea . '>' . $proveedor . '</option>' . PHP_EOL;
	}
}

/*
Pinta los campos de los proveedores
*/
function apg_sms_campos_de_proveedores( $listado_de_proveedores, $campos_de_proveedores, $opciones_de_proveedores ) {
	global $apg_sms_settings, $tab;
	
	foreach ( $listado_de_proveedores as $valor => $proveedor ) {
		foreach ( $campos_de_proveedores[$valor] as $valor_campo => $campo ) {
			if ( array_key_exists( $valor_campo, $opciones_de_proveedores ) ) { //Campo select
				echo '
  <tr valign="top" class="' . $valor . '"><!-- ' . $proveedor . ' -->
	<th scope="row" class="titledesc"> <label for="apg_sms_settings[' . $valor_campo . ']">' .ucfirst( $campo ) . ':' . '
	  <span class="woocommerce-help-tip" data-tip="' . sprintf( __( 'The %s for your account in %s', 'branded-sms' ), $campo, $proveedor ) . '"></span></label></th>
	<td class="forminp forminp-number"><select class="wc-enhanced-select" id="apg_sms_settings[' . $valor_campo . ']" name="apg_sms_settings[' . $valor_campo . ']" tabindex="' . $tab++ . '">
				';
				foreach ( $opciones_de_proveedores[$valor_campo] as $valor_opcion => $opcion ) {
					$chequea = ( isset( $apg_sms_settings[$valor_campo] ) && $apg_sms_settings[$valor_campo] == $valor_opcion ) ? ' selected="selected"' : '';
					echo '<option value="' . $valor_opcion . '"' . $chequea . '>' . $opcion . '</option>' . PHP_EOL;
				}
				echo '          </select></td>
  </tr>
				';
			} else { //Campo input
				echo '
  <tr valign="top" class="' . $valor . '"><!-- ' . $proveedor . ' -->
	<th scope="row" class="titledesc"> <label for="apg_sms_settings[' . $valor_campo . ']">' . ucfirst( $campo ) . ':' . '
	  <span class="woocommerce-help-tip" data-tip="' . sprintf( __( 'The %s for your account in %s', 'branded-sms' ), $campo, $proveedor ) . '"></span></label></th>
	<td class="forminp forminp-number"><input type="text" id="apg_sms_settings[' . $valor_campo . ']" name="apg_sms_settings[' . $valor_campo . ']" size="50" value="' . ( isset( $apg_sms_settings[$valor_campo] ) ? $apg_sms_settings[$valor_campo] : '' ) . '" tabindex="' . $tab++ . '" /></td>
  </tr>
				';
			}
		}
	}
}

/*
Pinta los campos del formulario de envío
*/
function apg_sms_campos_de_envio() {
	global $apg_sms_settings;

	$pais					= new WC_Countries();
	$campos					= $pais->get_address_fields( $pais->get_base_country(), 'shipping_' ); //Campos ordinarios
	$campos_personalizados	= apply_filters( 'woocommerce_checkout_fields', [] );
	if ( isset( $campos_personalizados[ 'shipping' ] ) ) {
		$campos += $campos_personalizados[ 'shipping' ];
	}
	foreach ( $campos as $valor => $campo ) {
		$chequea = ( isset( $apg_sms_settings['campo_envio'] ) && $apg_sms_settings['campo_envio'] == $valor ) ? ' selected="selected"' : '';
		if ( isset( $campo['label'] ) ) {
			echo '<option value="' . $valor . '"' . $chequea . '>' . $campo['label'] . '</option>' . PHP_EOL;
		}
	}
}

/*
Pinta el campo select con el listado de estados de pedido
*/
function apg_sms_listado_de_estados( $listado_de_estados ) {
	global $apg_sms_settings;

	foreach( $listado_de_estados as $nombre_de_estado => $estado ) {
		$chequea = '';
		if ( isset( $apg_sms_settings['estados_personalizados'] ) ) {
			foreach ( $apg_sms_settings['estados_personalizados'] as $estado_personalizado ) {
				if ( $estado_personalizado == $estado ) {
					$chequea = ' selected="selected"';
				}
			}
		}
		echo '<option value="' . $estado . '"' . $chequea . '>' . $nombre_de_estado . '</option>' . PHP_EOL;
	}
}

/*
Pinta el campo select con el listado de mensajes personalizados
*/
function apg_sms_listado_de_mensajes( $listado_de_mensajes ) {
	global $apg_sms_settings;
	
	$chequeado = false;
	foreach ( $listado_de_mensajes as $valor => $mensaje ) {
		if ( isset( $apg_sms_settings['mensajes'] ) && in_array( $valor, $apg_sms_settings['mensajes'] ) ) {
			$chequea	= ' selected="selected"';
			$chequeado	= true;
		} else {
			$chequea	= '';
		}
		$texto = ( !isset( $apg_sms_settings['mensajes'] ) && $valor == 'todos' && !$chequeado ) ? ' selected="selected"' : '';
		echo '<option value="' . $valor . '"' . $chequea . $texto . '>' . $mensaje . '</option>' . PHP_EOL;
	}
}
