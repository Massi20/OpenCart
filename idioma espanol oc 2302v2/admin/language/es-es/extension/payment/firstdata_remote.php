<?php
// Heading
$_['heading_title']					= 'Primeros Datos EMEA API de Servicio Web';

// Text
$_['text_firstdata_remote']			= '<img src="view/image/payment/firstdata.png" alt="Primeros Datos" title="Primeros Datos" style="border: 1px solid #EEEEEE;" />';
$_['text_extension']   = 'Extenciones';
$_['text_success']					= 'Exito: Ha modificado detalles de Cuenta de Primeros Datos!';
$_['text_edit']                     = 'Editar Primeros Datos EMEA API de Servicio Web';
$_['text_card_type']				= 'Tipo de Tarjeta';
$_['text_enabled']					= 'Habilitado';
$_['text_merchant_id']				= 'ID de Tienda';
$_['text_subaccount']				= 'SubCuenta';
$_['text_user_id']					= 'ID de Usuario';
$_['text_capture_ok']				= 'Captura fue exitosa';
$_['text_capture_ok_order']			= 'Captura fue exitosa, estado de Orden actualizada a exitosa - acordada';
$_['text_refund_ok']				= 'Reembolso fue exitoso';
$_['text_refund_ok_order']			= 'Reembolso fue exitoso, estado de Orden actualizada a reembolsada';
$_['text_void_ok']					= 'Anulación fue exitosa, estado de Orden actualizada a anulada';
$_['text_settle_auto']				= 'Venta';
$_['text_settle_delayed']			= 'Pre Autorización';
$_['text_mastercard']				= 'Mastercard';
$_['text_visa']						= 'Visa';
$_['text_diners']					= 'Diners';
$_['text_amex']						= 'American Express';
$_['text_maestro']					= 'Maestro';
$_['text_payment_info']				= 'Info de Pago';
$_['text_capture_status']			= 'Pago capturado';
$_['text_void_status']				= 'Pago anulado';
$_['text_refund_status']			= 'Pago reembolsado';
$_['text_order_ref']				= 'Referencia de Orden';
$_['text_order_total']				= 'Total autorizado';
$_['text_total_captured']			= 'Total capturado';
$_['text_transactions']				= 'Transacciones';
$_['text_column_amount']			= 'Cantidad';
$_['text_column_type']				= 'Tipo';
$_['text_column_date_added']		= 'Creado';
$_['text_confirm_void']				= 'Estas seguro que deseas anular el Pago?';
$_['text_confirm_capture']			= 'Estas seguro que deseas capturar el Pago?';
$_['text_confirm_refund']			= 'Estas seguro que deseas reembolsar el Pago?';

// Entry
$_['entry_certificate_path']		= 'Ruta de Certificado';
$_['entry_certificate_key_path']	= 'Ruta de Clave Privada';
$_['entry_certificate_key_pw']		= 'Contraseña de Clave Privada';
$_['entry_certificate_ca_path']		= 'Ruta de CA';
$_['entry_merchant_id']				= 'ID de Tienda';
$_['entry_user_id']					= 'ID de Usuario';
$_['entry_password']				= 'Contraseña';
$_['entry_total']					= 'Total';
$_['entry_sort_order']				= 'Orden';
$_['entry_geo_zone']				= 'Zona Geográfica';
$_['entry_status']					= 'Estado';
$_['entry_debug']					= 'Conexión a Depurar';
$_['entry_auto_settle']				= 'Tipo de Arreglo';
$_['entry_status_success_settled']	= 'Exito - acordado';
$_['entry_status_success_unsettled'] = 'Exito - no acordado';
$_['entry_status_decline']			 = 'Declinar';
$_['entry_status_void']				 = 'Anulado';
$_['entry_status_refund']			 = 'Reembolsado';
$_['entry_enable_card_store']		 = 'Activar guardar tokens de Tarjetas';
$_['entry_cards_accepted']			 = 'Tipo de Tarjetas aceptadas';

// Help
$_['help_total']					 = 'El Total que debe alcanzar la Orden antes de que el Método de Pago se active';
$_['help_certificate']				 = 'Certificados y Claves Privadas deben ser guardadas fuera de tus carpetas públicas en la Web';
$_['help_card_select']				 = 'Preguntar al Usuario si escoge el Tipo de Tarjeta antes de ser redireccionado';
$_['help_notification']				 = 'Necesitas proveer esta URL a Primeros Datos para obtener notificaciones de Pago';
$_['help_debug']					 = 'Activar la Depuración reescribirá información sensitiva a la bitácora. Siempre debes desactivar al menos que se te instruya lo contrario';
$_['help_settle']					 = 'Si usas pre-autorización debes completar la acción de post-autorización dentro de 3 a 5 días de otra manera la transacción sera anulada';

// Tab
$_['tab_account']					 = 'Info de API';
$_['tab_order_status']				 = 'Estado de Orden';
$_['tab_payment']					 = 'Configuración de Pago';

// Button
$_['button_capture']				= 'Captura';
$_['button_refund']					= 'Reembolso';
$_['button_void']					= 'Anulada';

// Error
$_['error_merchant_id']				= 'ID de Tienda es requerido';
$_['error_user_id']					= 'ID de Usuario es requerido';
$_['error_password']				= 'Contraseña es requerida';
$_['error_certificate']				= 'Ruta de Certificado es requerido';
$_['error_key']						= 'Clave de Certificado es requerido';
$_['error_key_pw']					= 'Contraseña de Certificado es requerida';
$_['error_ca']						= 'Autoridad de Certificado (CA) es requerido';