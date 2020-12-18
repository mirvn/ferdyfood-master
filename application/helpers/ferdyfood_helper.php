<?php

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('id')) {
        redirect('auth');
    } else {
        if ($ci->session->userdata('role') == 2) {
            redirect('kasir');
        }
    }
}
