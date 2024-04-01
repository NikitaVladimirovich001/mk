$(document).ready(function() {
    // Получаем текущий URL страницы
    var url = window.location.href;

    // Находим ссылку в навигации, соответствующую текущему URL
    var $navLinks = $('.navbar_ul').find('a');
    $navLinks.each(function() {
        if (this.href === url) {
            $(this).parent().addClass('active');
        }
    });
});
