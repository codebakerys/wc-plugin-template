<?php

namespace WPP\Model;

/**
 * Name: Post Meta
 * @package Model
 * @since 1.0.0
 */
class PostMeta
{
    private $prefix;

    public function __construct()
    {
        $this->prefix = WPP_PLUGIN_SLUG;
    }

    /**
     * Update post meta
     * @since 1.0.0
     * @param int $id
     * @param string $meta
     * @param mixed $value
     * @return array|bool
     */
    public function update( $id, $meta, $value )
    {
        $postmeta = $this->prefix . $meta;

        $result = update_post_meta( $id, $postmeta, $value );
        return $result;
    }

    /**
     * Get post meta
     * @since 1.0.0
     * @param int $id
     * @param string $meta
     * @param mixed $value
     * @return array|bool
     */
    public function get( $id, $meta )
    {
        $postmeta = $this->prefix . $meta;
        $result = get_post_meta( $id, $postmeta );
        
        return $result;
    }


    /**
     * Create post meta
     * @since 1.0.0
     * @param int $id
     * @param string $meta
     * @param mixed $value
     * @return array|bool
     */
    public function create( $id, $meta, $value )
    {
        $postmeta = $this->prefix . $meta;

        $result = add_post_meta( $id, $postmeta, $value );
        return $result;
    }
}