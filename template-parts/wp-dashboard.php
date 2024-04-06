<?php
// function to declare to add the dasboard widget
function pmd_add_dashboard_widgets()
{
    wp_add_dashboard_widget("pmd_tutorial", "Video Tutorial", "pmd_widget_function");
}

add_action('wp_dashboard_setup', 'pmd_add_dashboard_widgets');

function pmd_widget_function()
{
    echo "<p>Here is some content for the dashboard widget.</p>";
    echo '<iframe width="400" height="auto" src="' . esc_url('https://www.youtube.com/embed/TVNSGc6ouWw?si=BfpEysR4egu9H3Ys') . '" title="YouTube video player" frameborder="0" allowfullscreen></iframe>';
}



// function to setup the remove dashboard setup
function remove_dashboard_widgets()
{
    remove_meta_box("dashboard_primary", "dashboard", "side");
    remove_meta_box("dashboard_quick_press", "dashboard", "side");
    remove_meta_box("dashboard_right_now", "dashboard", "main");
    remove_meta_box("dashboard_site_health", "dashboard", "main");
    remove_meta_box("dashboard_activity", "dashboard", "side");


    // function to remove from the dashboard
    // 1st argument is to declare the id of the widget
    // 2nd is the place your removing it from hence dashboard
    // 3rd argument is either main or side but most widgets which are
    // accordions are side which is what they are on the dashbaord
}

add_action("wp_dashboard_setup", "remove_dashboard_widgets");
// function to modify the dashboard setup and call your function


function remove_comments_menu()
{
    remove_menu_page('edit-comments.php');
    remove_menu_page('edit.php');
}
add_action('admin_menu', 'remove_comments_menu');
