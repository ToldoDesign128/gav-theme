<?php
/*Replace = servizi*/

function servizi()
{
    register_post_type(
        'servizi',
        array(
            'labels'                =>          array(
                'name'              =>          'Servizi',
                'singular_name'     =>          'Servizio',
                'all_items'         =>          'Tutti i Servizi',
                'add_new'           =>          'Aggiungi un nuovo Servizio',
                'add_new_item'      =>          'Aggiungi un nuovo Servizio',
                'edit_item'         =>          'Modifica Servizio',
                'new_item'          =>          'Nuovo Servizio',
                'view_item'         =>          'Visualizza Servizio',
                'search_items'      =>          'Cerca',
                'not_found'         =>          'Nessun elemento trovato',
                'not_found_in_trash' =>          'Nessun elemento nel cestino',
                'parent_item_colon' =>          '',
            ),
            'description'           =>          'servizi',
            'public'                =>          true,
            'publicly_queryable'    =>          true,
            'exclude_from_search'   =>          false,
            'show_ui'               =>          true,
            'query_var'             =>          true,
            'menu_position'         =>          21,
            'menu_icon'             =>          'dashicons-plus-alt', //Dashicon
            'rewrite'               =>          array(
                'slug'              =>          'servizi',
                'with-front'        =>          false,
            ),
            'has_archive'           =>          true,
            'taxonomies'            =>          array(''),
            'capability_type'       =>          'post',
            'hierarchical'          =>          false,
            'show_in_rest'          =>          false, //gutemberg disattivato
            'supports'              =>          array('title', 'thumbnail') //campi supportati
        )
    );
}
add_action('init', 'servizi');
