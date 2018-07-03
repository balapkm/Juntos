<?php
/* Smarty version 3.1.30, created on 2018-07-03 23:09:17
  from "/home/Staging/workSpace/Juntos/application/views/templates/footer_download.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5b3bb4c5a87916_76695694',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd4ed51bef39b1f0cafa56732f014f771cc3f3ea5' => 
    array (
      0 => '/home/Staging/workSpace/Juntos/application/views/templates/footer_download.tpl',
      1 => 1530639549,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b3bb4c5a87916_76695694 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
  <html><head><?php echo '<script'; ?>
>
  function subst() {
      var vars = {};
      var query_strings_from_url = document.location.search.substring(1).split('&');
      for (var query_string in query_strings_from_url) {
          if (query_strings_from_url.hasOwnProperty(query_string)) {
              var temp_var = query_strings_from_url[query_string].split('=', 2);
              vars[temp_var[0]] = decodeURI(temp_var[1]);
          }
      }
      var css_selector_classes = ['page', 'frompage', 'topage', 'webpage', 'section', 'subsection', 'date', 'isodate', 'time', 'title', 'doctitle', 'sitepage', 'sitepages'];
      for (var css_class in css_selector_classes) {
          if (css_selector_classes.hasOwnProperty(css_class)) {
              var element = document.getElementsByClassName(css_selector_classes[css_class]);
              for (var j = 0; j < element.length; ++j) {
                  element[j].textContent = vars[css_selector_classes[css_class]];
              }
          }
      }
  }
  <?php echo '</script'; ?>
></head><body style="border:0; margin: 0;" onload="subst()">
 
      <p style="text-align:right;font-size: 14px;">
        Page <span class="page"></span> of <span class="topage"></span>
      </p>
  </body></html>
<?php }
}
