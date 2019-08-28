<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Site name, locales and metatags
    |--------------------------------------------------------------------------
    */
    'locale' => 'ca',
    'twitter_locale' => 'es',
    'facebook_locale' => 'ca_ES',
    'heading' => 'Tu decideixes en què inverteix l\'Ajuntament!',
    'subheading' => 'El Govern d\'Altea t\'obri la possibilitat de participar activament en les decisions que més t\'afecten.',
    'tweet' => 'He votat en què projectes vull que @EsAltea invertisca',
    'description' => 'Tu decideixes les inversions de l\'Ajuntament. El Govern d\'Altea t\'obri la possibilitat de participar activament en les decisions que més t\'afecten. Junts volem millorar Altea, i el teu vot compta!',
    'keywords' => 'altea, ajuntament, ayuntamiento, govern, obert, participacio ciutadana, democracia participativa, altea participa, votació, votación, referendum',

    /*
    |--------------------------------------------------------------------------
    | Global
    |--------------------------------------------------------------------------
    */
    'skip_to_content' => 'Ves directament al contingut',
    'select_language' => 'Selecciona idioma / Select your language',
    'current_language' => 'Idioma actual',
    'calendar_heading' => 'Votació',
    'help' => 'Incidències i ajuda',
    'legal' => 'Avís legal',
    'is_archive' => 'Aquesta votació va finalitzar el <strong>:end_date</strong> i està arxivada. Ves a l\'<a href="/">edició actual</a> per a consultar la votació en curs.',
    'error' => 'Error',
    'vote' => 'Vota',
    'print' => 'Imprimeix',
    'close' => 'Tanca',
    'ordered_randomly' => 'Ordenades alteatòriament',
    'SMS_notification' => 'El teu codi per a votar és :code',
    'video_id' => 'erM03GK0MXI',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    */
    'nav' => [
      'calendar' => 'Calendari',
      'proposals' => 'Propostes',
      'info' => 'Informació',
      'archive' => 'Arxiu'
    ],

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    */
    'poll' => 'Votació',
    'current_poll' => 'Votació actual',
    'sidebar_dates' => 'Des del :start_date fins a :end_date',
    'more_info' => 'Més informació',
    'propose_cta' => 'Envia la teua proposta',
    'voting_places' => 'Punts de votació',
    'voting_text' => 'Si necessites ajuda amb la votació, pots dirigir-te a un dels següents punts de votació en persona.',
    'contact' => 'Dubtes o incidències?',
    'contact_text' => 'Ens pots contactar a la següent adreça electrònica: <a href="mailto::contact_email">:contact_email</a>.',
    'past_editions' => 'Votacions anteriors',

    /*
    |--------------------------------------------------------------------------
    | Placeholder
    |--------------------------------------------------------------------------
    */
    'voting_closed' => 'Gràcies per la vostra participació 👍',
    'awaiting_results' => 'Els resultats es faran públics en breu.',

    /*
    |--------------------------------------------------------------------------
    | Results
    |--------------------------------------------------------------------------
    */
    'results' => 'Resultats',
    'census' => 'Cens',
    'turnout' => 'Participació',
    'votes' => 'vot|vots',
    'ballots' => 'Vots',
    'top_results' => '[1] Projecte més votat|[2] Dos projectes més votats|[3] Tres projectes més votats|[4] Quatre projectes més votats|[5,*] :num projectes més votats',
    'other_results' => 'Resta',

    /*
    |--------------------------------------------------------------------------
    | Option information
    |--------------------------------------------------------------------------
    */
    'option_motivation' => 'Motivació',
    'option_cost' => 'Cost',
    'option_attachments' => 'Documentació adjunta',

    /*
    |--------------------------------------------------------------------------
    | Ballot lookup
    |--------------------------------------------------------------------------
    */
    'ballot_lookup' => 'Troba la teua papereta',
    'ballot_lookup_help' => 'Escriu el número de referència de la teua papereta a continuació per a verificar que s\'ha recomptat correctament.',
    'ballot_ref' => 'Núm. de referència',
    'ballot_not_found' => 'La papereta no s\'ha trobat',
    'ballot_not_found_text' => 'No hem trobat cap papereta amb referència <code>:ref</code><br />a la base de dades.',
    'ballot_not_found_help' => 'Si penses que es tracta d\'un error, posa\'t en contacte amb <a href="mailto::email">:email</a>.',

    /*
    |--------------------------------------------------------------------------
    | Errors
    |--------------------------------------------------------------------------
    */
    'error_404' => 'Error 404',
    'error_404_text' => 'No hem trobat la pàgina que estaves buscant.',
    'error_503' => 'Tasques de manteniment',
    'error_503_text' => 'Estem realitzant tasques de manteniment. Torna en uns minuts.',
    'error_SMS' => 'Error enviant l\'SMS',
    'error_ip_limit_exceeded' => 'Has sobrepassat el límit de vots que una mateixa IP pot emetre',
    'error_lookup_limit_exceeded' => 'Has introduit un Identificador erroni massa vegades',
    'error_token_expired' => 'El token de seguretat ha caducat. Refresca la pàgina i torna a intentar-ho.',

    /*
    |--------------------------------------------------------------------------
    | Months
    |--------------------------------------------------------------------------
    */
    'months_short' => ['Gen', 'Feb', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Set', 'Nov', 'Des'],
    'months_long' => ['gener', 'febrer', 'març', 'abril', 'maig', 'juny', 'juliol', 'agost', 'setembre', 'octubre', 'novembre', 'desembre'],

];
