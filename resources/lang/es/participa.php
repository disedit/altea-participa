<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Site name, locales and metatags
    |--------------------------------------------------------------------------
    */
    'locale' => 'es',
    'twitter_locale' => 'es',
    'facebook_locale' => 'es_ES',
    'heading' => '¡Tú decides en qué invierte el Ayuntamiento!',
    'subheading' => 'El Gobierno de Altea te abre la posibilidad de participar activamente en las decisioines que más te afectan.',
    'tweet' => 'He votado en qué proyectos quiero que @EsAltea invierta',
    'description' => 'Tú decides las inversiones del Ayuntamiento. El Gobierno de Altea te abre la posibilidad de participar activamente en las decisioines que más te afectan. Juntos queremos mejorar Altea, ¡y tu voto cuenta!',
    'keywords' => 'altea, ajuntament, ayuntamiento, govern, obert, participacio ciutadana, democracia participativa, altea participa, votació, votación, referendum',

    /*
    |--------------------------------------------------------------------------
    | Global
    |--------------------------------------------------------------------------
    */
    'skip_to_content' => 'Ir directamente al contenido',
    'select_language' => 'Selecciona idioma / Select your language',
    'current_language' => 'Idioma actual',
    'calendar_heading' => 'Votación',
    'help' => 'Incidencias y ayuda',
    'legal' => 'Aviso legal',
    'is_archive' => 'Esta votación finalizó el <strong>:end_date</strong> y está archivada. Ves a la <a href="/">edición actual</a> para consultar la votación en curso.',
    'error' => 'Error',
    'vote' => 'Vota',
    'print' => 'Imprime',
    'close' => 'Cierra',
    'ordered_randomly' => 'Ordenadas alteatoriamente',
    'SMS_notification' => 'Tu código para votar es :code',
    'video_id' => 'v3rsfPBHTTU',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    */
    'nav' => [
      'budget' => 'Presupuestos participativos',
      'decideix' => 'Altea Decide',
      'associations' => 'Asociaciones'
    ],

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    */
    'poll' => 'Votación',
    'current_poll' => 'Votación actual',
    'sidebar_dates' => 'Desde el :start_date hasta :end_date',
    'more_info' => 'Más información',
    'propose_cta' => 'Envía tu propuesta',
    'voting_places' => 'Puntos de votación',
    'voting_text' => 'Si necesitas ayuda con la votación, puedes dirigirte a uno de los siguientes puntos de votación en persona.',
    'contact' => '¿Dudas o incidencias?',
    'contact_text' => 'Nos puedes contactar en la siguiente dirección electrónica: <a href="mailto::contact_email">:contact_email</a>.',
    'past_editions' => 'Votaciones anteriores',

    /*
    |--------------------------------------------------------------------------
    | Placeholder
    |--------------------------------------------------------------------------
    */
    'voting_closed' => 'Gracias por vuestra participación 👍',
    'awaiting_results' => 'Los resultados se harán públicos en breve.',

    /*
    |--------------------------------------------------------------------------
    | Results
    |--------------------------------------------------------------------------
    */
    'results' => 'Resultados',
    'census' => 'Censo',
    'turnout' => 'Participación',
    'votes' => 'voto|votos',
    'ballots' => 'Votos',
    'top_results' => '[1] Proyecto más votado|[2] Dos proyectos más votados|[3] Tres proyectos más votados|[4] Cuatro proyectos más votados|[5,*] :num proyectos más votados',
    'other_results' => 'Resto',
    'winner' => 'Proyecto seleccionado',

    /*
    |--------------------------------------------------------------------------
    | Option information
    |--------------------------------------------------------------------------
    */
    'option_motivation' => 'Motivación',
    'option_cost' => 'Coste',
    'option_attachments' => 'Documentación adjunta',
    'option_status' => 'Estado',

    /*
    |--------------------------------------------------------------------------
    | Ballot lookup
    |--------------------------------------------------------------------------
    */
    'ballot_lookup' => 'Encuentra tu papeleta',
    'ballot_lookup_help' => 'Escribe el número de referencia de tu papeleta a continuación para verificar que se ha recontado correctamente.',
    'ballot_ref' => 'Nº de referencia',
    'ballot_not_found' => 'La papeleta no se ha encontrado',
    'ballot_not_found_text' => 'No hemos encontrado ninguna papeleta con referncia <code>:ref</code><br />en la base de datos.',
    'ballot_not_found_help' => 'Si piensas que se trata de un error, ponte en contacto con <a href="mailto::email">:email</a>.',

    /*
    |--------------------------------------------------------------------------
    | Errors
    |--------------------------------------------------------------------------
    */
    'error_404' => 'Error 404',
    'error_404_text' => 'No hemos encontrado la página que estabas buscando.',
    'error_503' => 'Tareas de mantenimiento',
    'error_503_text' => 'Estamos realizando tareas de mantenimiento. Vuelve en unos minutos.',
    'error_SMS' => 'Error al enviar el SMS',
    'error_ip_limit_exceeded' => 'Has sobrepasado el límite de votos que puede emitir una misma IP.',
    'error_lookup_limit_exceeded' => 'Has introducido un indetificador erróneo demasiadas veces.',
    'error_token_expired' => 'Tu token de seguridad ha expirado. Refresca la pàgina y vuelve a intentarlo.',

    /*
    |--------------------------------------------------------------------------
    | Months
    |--------------------------------------------------------------------------
    */
    'months_short' => ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Des'],
    'months_long' => ['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'],

];
