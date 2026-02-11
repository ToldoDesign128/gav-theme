<?php
/*Replace = giornalino*/

function giornalino()
{
    register_post_type(
        'giornalino',
        array(
            'labels'                =>          array(
                'name'              =>          'Giornalino',
                'singular_name'     =>          'Giornalino',
                'all_items'         =>          'Tutti i Giornalini',
                'add_new'           =>          'Aggiungi un nuovo Giornalino',
                'add_new_item'      =>          'Aggiungi un nuovo Giornalino',
                'edit_item'         =>          'Modifica Giornalino',
                'new_item'          =>          'Nuovo Giornalino',
                'view_item'         =>          'Visualizza Giornalino',
                'search_items'      =>          'Cerca',
                'not_found'         =>          'Nessun elemento trovato',
                'not_found_in_trash' =>          'Nessun elemento nel cestino',
                'parent_item_colon' =>          '',
            ),
            'description'           =>          'giornalino',
            'public'                =>          true,
            'publicly_queryable'    =>          true,
            'exclude_from_search'   =>          false,
            'show_ui'               =>          true,
            'query_var'             =>          true,
            'menu_position'         =>          22,
            'menu_icon'             =>          'dashicons-plus-alt', //Dashicon
            'rewrite'               =>          array(
                'slug'              =>          'giornalino',
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
add_action('init', 'giornalino');
