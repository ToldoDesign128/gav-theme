<?php
/*Replace = collaborazioni*/

function collaborazioni()
{
    register_post_type(
        'collaborazioni',
        array(
            'labels'                =>          array(
                'name'              =>          'Collaborazioni',
                'singular_name'     =>          'Collaborazione',
                'all_items'         =>          'Tutte le Collaborazioni',
                'add_new'           =>          'Aggiungi una nuova Collaborazione',
                'add_new_item'      =>          'Aggiungi una nuova Collaborazione',
                'edit_item'         =>          'Modifica Collaborazione',
                'new_item'          =>          'Nuova Collaborazione',
                'view_item'         =>          'Visualizza Collaborazione',
                'search_items'      =>          'Cerca',
                'not_found'         =>          'Nessun elemento trovato',
                'not_found_in_trash' =>          'Nessun elemento nel cestino',
                'parent_item_colon' =>          '',
            ),
            'description'           =>          'collaborazioni',
            'public'                =>          true,
            'publicly_queryable'    =>          true,
            'exclude_from_search'   =>          false,
            'show_ui'               =>          true,
            'query_var'             =>          true,
            'menu_position'         =>          23,
            'menu_icon'             =>          'dashicons-plus-alt', //Dashicon
            'rewrite'               =>          array(
                'slug'              =>          'collaborazioni',
                'with-front'        =>          false,
            ),
            'has_archive'           =>          false,
            'taxonomies'            =>          array(''),
            'capability_type'       =>          'post',
            'hierarchical'          =>          false,
            'show_in_rest'          =>          false, //gutemberg disattivato
            'supports'              =>          array('title', 'thumbnail') //campi supportati
        )
    );
}
add_action('init', 'collaborazioni');
