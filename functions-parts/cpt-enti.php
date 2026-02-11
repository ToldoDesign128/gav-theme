<?php
/*Replace = enti*/

function enti()
{
    register_post_type(
        'enti',
        array(
            'labels'                =>          array(
                'name'              =>          'Enti',
                'singular_name'     =>          'Ente',
                'all_items'         =>          'Tutti gli Enti',
                'add_new'           =>          'Aggiungi un nuovo Ente',
                'add_new_item'      =>          'Aggiungi un nuovo Ente',
                'edit_item'         =>          'Modifica Ente',
                'new_item'          =>          'Nuovo Ente',
                'view_item'         =>          'Visualizza Ente',
                'search_items'      =>          'Cerca',
                'not_found'         =>          'Nessun elemento trovato',
                'not_found_in_trash' =>          'Nessun elemento nel cestino',
                'parent_item_colon' =>          '',
            ),
            'description'           =>          'enti',
            'public'                =>          true,
            'publicly_queryable'    =>          true,
            'exclude_from_search'   =>          false,
            'show_ui'               =>          true,
            'query_var'             =>          true,
            'menu_position'         =>          24,
            'menu_icon'             =>          'dashicons-plus-alt', //Dashicon
            'rewrite'               =>          array(
                'slug'              =>          'enti',
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
add_action('init', 'enti');
