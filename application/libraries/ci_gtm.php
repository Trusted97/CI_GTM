<?php
/**
 * Name:    CI GTM
 * Author:  Gianluca Benucci
 *          gianlucabenucci9700@gmail.com
 *          @trusted97
 *
 *
 *
 * Created:  18.02.2020
 *
 * Description:  Library for add Google Tag Manager to CodeIgniter Project
 *
 * Requirements: PHP5.6 or above
 *
 * @package    CI-GTM
 * @author     Gianluca Benucci
 * @link       https://github.com/Trusted97/CI_GTM
 * @filesource
 */

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Class ci_gtm
 */
class ci_gtm
{
    protected $CI;
    protected $gtm_id;
    protected $enabled;
    protected $datalayer;

    public function __construct()
    {
        $this->CI =& get_instance();

        $this->CI->config->load('ci_gtm', true);

        $this->gtm_id = $this->CI->config->item('gtm_id', 'ci_gtm');
        $this->enabled = $this->CI->config->item('enabled', 'ci_gtm');
        $this->datalayer = [];

        $this->data['GTM_ID'] = $this->gtm_id;
        $this->data['enabled'] = $this->enabled;
    }

    public function set($key, $value = null)
    {
        $this->datalayer[$key] = $value;
    }

    public function toJson()
    {
        return json_encode($this->datalayer, JSON_UNESCAPED_UNICODE);
    }


    public function gtm_head()
    {
        $this->CI->load->view('ci_gtm/gtm_head', $this->data);
    }

    public function gtm_body()
    {
        $this->CI->load->view('ci_gtm/gtm_body', $this->data);
    }
}
