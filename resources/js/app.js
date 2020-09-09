require('./bootstrap');

$(() => {
 $('#candidatos_filter_form input[type="checkbox"]').on('click', () => {
   $('#candidatos_filter_form').submit();
 });
});
