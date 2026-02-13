<?php
/*Replace = progetti*/

function progetti()
{
    register_post_type(
        'progetti',
        array(
            'labels'                =>          array(
                'name'              =>          'Progetti',
                'singular_name'     =>          'Progetto',
                'all_items'         =>          'Tutti i Progetti',
                'add_new'           =>          'Aggiungi un nuovo Progetto',
                'add_new_item'      =>          'Aggiungi un nuovo Progetto',
                'edit_item'         =>          'Modifica Progetto',
                'new_item'          =>          'Nuovo Progetto',
                'view_item'         =>          'Visualizza Progetto',
                'search_items'      =>          'Cerca',
                'not_found'         =>          'Nessun elemento trovato',
                'not_found_in_trash' =>          'Nessun elemento nel cestino',
                'parent_item_colon' =>          '',
            ),
            'description'           =>          'progetti',
            'public'                =>          true,
            'publicly_queryable'    =>          true,
            'exclude_from_search'   =>          false,
            'show_ui'               =>          true,
            'query_var'             =>          true,
            'menu_position'         =>          20,
            'menu_icon'             =>          'dashicons-plus-alt', //Dashicon
            'rewrite'               =>          array(
                'slug'              =>          'progetti',
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
add_action('init', 'progetti');
