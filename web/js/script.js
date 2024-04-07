$(document).ready(function() {
    // Получаем текущий URL страницы
    var url = window.location.href;

    // Находим ссылки в навигации
    var $navLinks = $('.navbar_ul').find('a');

    // Перебираем каждую ссылку
    $navLinks.each(function() {
        // Если URL ссылки совпадает с текущим URL страницы
        if (this.href === url) {
            // Добавляем класс active только к текущей ссылке
            $(this).addClass('active');
        }
    });
});