<?php
/** 
 * As configurações básicas do WordPress.
 *
 * Esse arquivo contém as seguintes configurações: configurações de MySQL, Prefixo de Tabelas,
 * Chaves secretas, Idioma do WordPress, e ABSPATH. Você pode encontrar mais informações
 * visitando {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. Você pode obter as configurações de MySQL de seu servidor de hospedagem.
 *
 * Esse arquivo é usado pelo script ed criação wp-config.php durante a
 * instalação. Você não precisa usar o site, você pode apenas salvar esse arquivo
 * como "wp-config.php" e preencher os valores.
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar essas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'riema');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'riema');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', 'riema14');

/** nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Conjunto de caracteres do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8');

/** O tipo de collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Você pode alterá-las a qualquer momento para desvalidar quaisquer cookies existentes. Isto irá forçar todos os usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '7j [b}*-x8%D>i9zV22T=4<o]OE;Tlf3L[hHaG4>)PgF}0{GIFf4)!`NZO)*uapv');
define('SECURE_AUTH_KEY',  'RTX5C[{hQz8:SNUiM-ev@Dg&Igq`U/FMs~f5ioR}r:UW?#;NNS#5fYP(!n.2Vr7r');
define('LOGGED_IN_KEY',    'S+4uVXvU<-a_E]Ne]Xlkb,_X$f|[H]ESGpawQyyPzC!5DdGCxlU;ufGuRsGmbNea');
define('NONCE_KEY',        'V+1|/s2q)xH  qjtHpm$SPyv:3+?:QE6bvIHOHQmJHE>4MH?.LEC{V2hC~HpDtfg');
define('AUTH_SALT',        '17bVP;,ayu~_)<7tVt+Rx8o+#mD>8T;Is$uekMPMWb|+? ie|}:p4IV_,+Z)QBD-');
define('SECURE_AUTH_SALT', '9/iyLLGqE(jU` NiZoo1O+-7l5y8_JIDH]|&y%:!tDHN*%56GbcBR%&,|QR+zrZ1');
define('LOGGED_IN_SALT',   '_*g(l.Gw`0L=*}6?QR2s&pEE=&lq0V+9^y5/+HTEL9))Xy& Vf*61cr-Y(&J;8B1');
define('NONCE_SALT',       'J$OQqu9a;^Ox13*h-NPO!ee~leFNig|JcKvvti:k-[Y^+8uy9)Hr#I#Y.}c^+a@~');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der para cada um um único
 * prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = 'riewp_';


/**
 * Para desenvolvedores: Modo debugging WordPress.
 *
 * altere isto para true para ativar a exibição de avisos durante o desenvolvimento.
 * é altamente recomendável que os desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
	
/** Configura as variáveis do WordPress e arquivos inclusos. */
require_once(ABSPATH . 'wp-settings.php');
