<?php
/*
Plugin Name: Signal
Plugin URI: https://github.com/pluginsWordpress/signal/blob/main/signal.php
Description: Plugin de signal personnalisé pour WordPress
Version: 1.0
Author: Mohamed
Author URI: https://github.com/Echchoaui007
*/
// Fonction d'activation du plugin

// Activation function for the plugin
function mon_plugin_activation()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'signal';

    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        nom varchar(255) NOT NULL,
        prenom varchar(255) NOT NULL,
        email varchar(255) NOT NULL,
        type_signal varchar(255) NOT NULL,
        raison_signal varchar(255) NOT NULL,
        commentaire varchar(255) NOT NULL,
        date datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY  (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}
register_activation_hook(__FILE__, 'mon_plugin_activation');

// Fonction de désactivation du plugin
function mon_plugin_desactivation()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'signal';

    $wpdb->query("DROP TABLE IF EXISTS $table_name");
}
register_deactivation_hook(__FILE__, 'mon_plugin_desactivation');

// Function to add the "Signal" menu page in the admin dashboard
function signal_add_menu_page()
{
    add_menu_page(
        __('Signal', 'textdomain'),
        'Signal',
        'manage_options',
        'Signal',
        '',
        'dashicons-admin-plugins',
        6
    );
    add_submenu_page(
        'Signal',
        __('Books Shortcode Reference', 'textdomain'),
        __('Shortcode Reference', 'textdomain'),
        'manage_options',
        'Signal',
        'Signal_callback'
    );
}
add_action('admin_menu', 'signal_add_menu_page');
// Callback function for the "Signal" menu page
function Signal_callback()
{
?>
    
    <style>
    .form {
        margin-top: 50px;
    }

    form {
        width: 60%;
        margin: 0 auto;
    }

    form div {
        margin-bottom: 20px;
    }

    form label {
        display: block;
        font-size: 16px;
        font-weight: bold;
        margin-bottom: 5px;
    }

    form input[type=text],
    form textarea {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .Submit {
        display: inline-block;
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        font-size: 16px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .Submit:hover {
        background-color: #45a049;
    }
</style>

    <form class="form" id="form">
        <div>
            <input type="checkbox" name="nom" id="nom">
            <label class="labelForm" for="nom">nom:</label>
        </div>
        <div>
            <input type="checkbox" name="prenom" id="prenom">
            <label class="labelForm" for="prenom">prenom:</label>
        </div>
        <div>
            <input type="checkbox" name="email" id="email">
            <label class="labelForm" for="email">Email:</label>
        </div>
        <div>
            <input type="checkbox" name="type_signal" id="type_signal">
            <label class="labelForm" for="type_signal">le type de signal:</label>
        </div>
        <div>
            <input type="checkbox" name="raison_signal" id="raison_signal">
            <label class="labelForm" for="raison_signal">le raison de votre signal:</label>
        </div>
        <div>
            <input type="checkbox" name="commentaire" id="commentaire">
            <label class="labelForm" for="commentaire">un commentaire:</label>
        </div>
        <div>
            <input class="Submit" type="submit" value="Save">
        </div>
    </form>
    <script>
        var form = document.getElementById('form')
        form.addEventListener('submit', event => {
            event.preventDefault();
            const formData = new FormData(form);
            const data = Object.fromEntries(formData);
            if (data.nom == 'on') {
                var nomInput = `<div>
                                    <label for="nom">nom:</label>
                                    <input type="text" name="nom" id="nom">
                                </div>`
            } else {
                var nomInput = `<input type="hidden" value=' ' name="nom" id="nom">`
            }
            if (data.prenom == 'on') {
                var prenomInput = `<div>
                                    <label for="prenom">prenom:</label>
                                    <input type="text" name="prenom" id="prenom">
                                </div>`
            } else {
                var prenomInput = `<input type="hidden" value=' ' name="prenom" id="prenom">`
            }
            if (data.email == 'on') {
                var emailInput = `<div>
                                    <label for="email">email:</label>
                                    <input type="email" name="email" id="email">
                                </div>`
            } else {
                var emailInput = `<input type="hidden" value=' ' name="email" id="email">`
            }
            if (data.type_signal == 'on') {
                var typeInput = `<div>
                                    <label for="type_signal">type de signal:</label>
                                    <select name="type_signal" id="type_signal">
                                        <option value="type 1">type 1</option>
                                        <option value="type 2">type 2</option>
                                        <option value="type 3">type 3</option>
                                    </select>
                                </div>`
            } else {
                var typeInput = `<input type="hidden" value=' ' name="type_signal" id="type_signal">`
            }
            if (data.raison_signal == 'on') {
                var raisonInput = `<div>
                                    <label for="raison_signal">raison de signal:</label>
                                    <select name="raison_signal" id="raison_signal">
                                        <option value="raison 1">raison 1</option>
                                        <option value="raison 2">raison 2</option>
                                        <option value="raison 3">raison 3</option>
                                    </select>
                                </div>`
            } else {
                var raisonInput = `<input type="hidden" value=' ' name="raison_signal" id="raison_signal">`
            }
            if (data.commentaire == 'on') {
                var commentaireInput = `<div>
                                    <label for="commentaire">commentaire:</label>
                                    <textarea style="resize:none" name="commentaire" id="commentaire" cols="30" rows="10"></textarea>
                                </div>`
            } else {
                var commentaireInput = `<input type="hidden" value=' ' name="commentaire" id="commentaire">`
            }
            var formSelected = `<form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
                                    ${nomInput}
                                    ${prenomInput}
                                    ${emailInput}
                                    ${typeInput}
                                    ${raisonInput}
                                    ${commentaireInput}
                                    <div>
                                        <input type="hidden" name="action" value="mon_plugin_register">
                                        <input class="Submit" type="submit" value="Envoyer">
                                    </div>
                                </form>`
            localStorage.setItem("formSelected", formSelected)
        })
    </script>
<?php
}
function mon_plugin_shortcode_signal()
{
    ob_start();
?>
    <style>
    p form {
        display: flex;
        flex-direction: column;
        gap: 15px;
        width: 60%;
        margin: 0 20%;
        padding: 30px;
        background-color: #f0f0f0;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        animation: fadeIn 1s ease-in forwards;
    }

    @keyframes fadeIn {
        0% {
            opacity: 0;
        }
        100% {
            opacity: 1;
        }
    }

    p form div {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
    }

    p form label {
        font-size: 1.1rem;
        font-weight: 500;
    }

    p form input,
    p form textarea,
    p form select {
        font-size: 1rem;
        padding: 5px;
        width: 60%;
        border: 1px solid #ccc;
        border-radius: 5px;
        transition: border-color 0.3s;
    }

    p form input:focus,
    p form textarea:focus,
    p form select:focus {
        border-color: #0d6efd;
    }

    .Submit {
        background-color: #0d6efd;
        color: white;
        font-size: 1rem;
        padding: 8px 16px;
        display: flex;
        justify-content: center;
        border: none;
        border-radius: 7px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .Submit:hover {
        background-color: #1a8fff;
    }
</style>

    <p id="p"></p>
    <script>
        var p = document.getElementById('p')
        var formSelected = localStorage.getItem("formSelected")
        p.innerHTML = formSelected
    </script>
<?php
    return ob_get_clean();
}
add_shortcode('form_signal', 'mon_plugin_shortcode_signal');
function mon_plugin_register()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'signal';


    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $type_signal = $_POST['type_signal'];
    $raison_signal = $_POST['raison_signal'];
    $commentaire = $_POST['commentaire'];

    $wpdb->insert(
        $table_name,
        array(
            'nom' => $nom,
            'prenom' => $prenom,
            'email' => $email,
            'type_signal' => $type_signal,
            'raison_signal' => $raison_signal,
            'commentaire' => $commentaire
        )
    );

    wp_redirect(home_url(''));
    exit;
}
add_action('admin_post_mon_plugin_register', 'mon_plugin_register');


function affiche_signal_add_menu_page()
{
    add_menu_page(
        __('affiche_Signal', 'textdomain'),
        'affiche_Signal',
        'manage_options',
        'affiche_Signal',
        '',
        'dashicons-admin-home',
        6
    );
    add_submenu_page(
        'affiche_Signal',
        __('Books Shortcode Reference', 'textdomain'),
        __('Shortcode Reference', 'textdomain'),
        'manage_options',
        'affiche_Signal',
        'affiche_Signal_callback'
    );
}
add_action('admin_menu', 'affiche_signal_add_menu_page');

function affiche_Signal_callback()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'signal';

    $results = $wpdb->get_results("SELECT * FROM $table_name");
?>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #0d1333;
    }

    table {
        border-collapse: collapse;
        width: 100%;
        margin: 20px 0;
        color: #cfd8dc;
    }

    th,
    td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #272d40;
    }

    th {
        background-color: #1c2331;
        color: #81d4fa;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-size: 14px;
    }

    tr:nth-child(odd) {
        background-color: #1c2331;
    }

    tr:nth-child(even) {
        background-color: #212832;
    }

    tr:hover {
        background-color: #465881;
    }
</style>
    <table>
        <tr>
            <td>nom</td>
            <td>prenom</td>
            <td>email</td>
            <td>type_signal</td>
            <td>raison_signal</td>
            <td>commentaire</td>
            <td>date</td>
        </tr>
        <?php foreach ($results as $result) { ?>
            <tr>
                <td><?= $result->nom ?></td>
                <td><?= $result->prenom ?></td>
                <td><?= $result->email ?></td>
                <td><?= $result->type_signal ?></td>
                <td><?= $result->raison_signal ?></td>
                <td><?= $result->commentaire ?></td>
                <td><?= $result->date ?></td>
            </tr>
        <?php } ?>
    </table>
<?php
}
?>