/* Toggle Mobile Navigation and Sidebar */

(function() {

    var base = document.body,
        toggle = document.querySelectorAll('.blog-sidebar-toggle'),
        menu = document.querySelectorAll('.blog-navigation .ul a, .blog-navigation .ul .a'), ul;

    if (menu.length) {
        function do_toggle_menu(e) {
            ul = this.parentNode.children[1];
            if (ul && ul.nodeName.toLowerCase() === 'ul') {
                this.classList.toggle('active');
                e.preventDefault();
            }
        }
        for (var i = 0, len = menu.length; i < len; ++i) {
            menu[i].addEventListener("click", do_toggle_menu, false);
        }
    }

    if (toggle.length) {
        function do_toggle_bar($, e, side) {
            $.classList.toggle('active');
            base.classList.toggle('blog-sidebar-' + side + '-is-visible');
            e.preventDefault();
        }
        toggle[0].addEventListener("click", function(e) {
            do_toggle_bar(this, e, 'left');
        }, false);
        toggle[1].addEventListener("click", function(e) {
            do_toggle_bar(this, e, 'right');
        }, false);
    }

})();