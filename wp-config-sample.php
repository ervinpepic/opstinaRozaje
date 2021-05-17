<?php
/**
 * Bazna konfiguracija WordPressa.
 *
 * wp-config.php instalacijska skripta koristi ovaj fajl prilikom
 * instalacije. Ne morate koristiti web stranicu, ovaj fajl
 * možete kopirati kao "wp-config.php" i popuniti vrijednosti.
 *
 * Ovaj falj sadrži sljedeće postavke:
 *
 * MySQL postavke
 * Tajne ključeve
 * Prefiks baze podataka
 * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL postavke - Informacije o postavkama možete dobiti od vašeg web hosting servisa ** //
/** Ime vaše baze podataka za WordPress */
define( 'DB_NAME', 'ovdje_upišite_ime_vaše_baze' );

/** MySQL korisničko ime za bazu podataka */
define( 'DB_USER', 'ovdje_upišite_korisničko_ime' );

/** MySQL šifra baze podataka */
define( 'DB_PASSWORD', 'ovdje_upišite_šifru_za_bazu' );

/** MySQL naziv hostinga*/
define( 'DB_HOST', 'localhost' );

/** Kodiranje znakova koje će se koristiti u tabelama unutar baze podataka. */
define( 'DB_CHARSET', 'utf8' );

/** Collate tip baze podataka. Ne mijenjajte ovo ako niste sigurni. */
define('DB_COLLATE', '');

/**#@+
 * Unikatni ključevi za autentifikaciju i salts.
 *
 * Promijenite ključeve u vaše unikatne fraze!
 * Ključeve možete generisati pomoću WordPress.org servisa za generisanje ključeva {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Ključeve možete promijeniti bilo kada. Svi korisnici će se morati ponovo prijaviti jer kolačići neće važiti nakon izmjene ključeva.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'upišite vašu jedinstvenu frazu ovdje' );
define( 'SECURE_AUTH_KEY',  'upišite vašu jedinstvenu frazu ovdje' );
define( 'LOGGED_IN_KEY',    'upišite vašu jedinstvenu frazu ovdje' );
define( 'NONCE_KEY',        'upišite vašu jedinstvenu frazu ovdje' );
define( 'AUTH_SALT',        'upišite vašu jedinstvenu frazu ovdje' );
define( 'SECURE_AUTH_SALT', 'upišite vašu jedinstvenu frazu ovdje' );
define( 'LOGGED_IN_SALT',   'upišite vašu jedinstvenu frazu ovdje' );
define( 'NONCE_SALT',       'upišite vašu jedinstvenu frazu ovdje' );

/**#@-*/

/**
 * Prefiks WordPressove tabele u bazi podataka.
 *
 * Možete imati više instalacija unutar jedne baze ukoliko svakoj date jedinstven prefiks.
 * Molimo vas da koristite samo brojeve, slova, i donje crtice!
 */
$table_prefix = 'wp_';

/**
 * Za programere: WordPress debugging mod.
 *
 * Promijenite ovu vrijednost u true da omogućite prikaz obavijesti prilikom razvoja.
 * Preporučeno je da programeri tema i plugina koriste WP_DEBUG
 * u svojim razvojnim okruženjima.
 *
 * Za informacije o drugim konstantama za debugovanje, posjetite Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* To je sve, ne morate više ništa mijenjati! Sretno objavljivanje. */

/** Apsolutna putanja do WordPress foldera. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Postavke za WordPress varijable i već uključene datoteke. */
require_once( ABSPATH . 'wp-settings.php' );
