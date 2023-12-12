<?php

function get_category($id = null)
{
    $ci = get_instance();

    if ($id == null) {
        return $ci->main->get('category');
    } else {
        $query = $ci->main->get_where('category', ['category_id' => $id]);
        return $query->category_name;
    }
}


function setMsg($type, $strong, $msg)
{
    $ci = get_instance();

    // Alert
    $text = "";
    $text .= "<div class='alert alert-{$type} alert-dismissible show' role='alert'>";
    $text .= "<strong>{$strong}</strong> ".$msg;
    $text .= ' <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>';
    $text .= "</div>";
    return $text;
}

function setFlashMsg($type, $strong, $msg)
{
    $ci = get_instance();

    // Alert
    $text = "";
    $text .= "<div class='alert alert-{$type} alert-dismissible show' role='alert'>";
    $text .= "<strong>{$strong}</strong> ".$msg;
    $text .= ' <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>';
    $text .= "</div>";
    return $ci->session->set_flashdata('msg', $text);
}

function userdata()
{
    $ci = get_instance();

    $user_id = $ci->session->userdata("user_session");
    $userdata = $ci->main->get_where("users", ["user_id" => $user_id]);

    return $userdata;
}
 
function active_menu($page)
{
    $ci = get_instance();
    $uri = $ci->uri->segment(1);

    return $uri == $page ? "active" : "";
}

function check($data1, $data2, $result = "active")
{
    return $data1 == $data2 ? $result : "";
}

function user_initial($name)
{
    return substr($name, 0, 1);
}

function custom_date($format, $date)
{
    return date($format, strtotime($date));
}

function check_session()
{
    if (!userdata()) {
        setFlashMsg('danger', 'Access Denied! ', 'harap login untuk masuk ke dashboard');
        redirect('auth');
    }
}

function check_role($role = [])
{
    check_session();

    if (!in_array(userdata()->role, $role)) {
        redirect('post');
    }
}
