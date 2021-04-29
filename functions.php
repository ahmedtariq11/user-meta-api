add_action( 'rest_api_init', 'adding_user_meta_rest' );

    /**
     * Adds user_meta to rest api 'user' endpoint.
     */
    function adding_user_meta_rest() {
        register_rest_field( 'user',
            'user_meta',
            array(
                'get_callback'      => 'user_meta_callback',
                'update_callback'   => null,
                'schema'            => null,
            )
        );
    }

    /**
     * Return user meta object.
     *
     * @param array $user User.
     * @param string $field_name Registered custom field name ( In this case 'user_meta' )
     * @param object $request Request object.
     *
     * @return mixed
     */
    function user_meta_callback( $user, $field_name, $request) {
        return get_user_meta( $user['id'] );
    }
    wp.data.select('core').getCurrentUser();
