window.onscroll = function () {
    scrollFunction();
};

function scrollFunction() {
    var btnScrollTop = document.getElementById("btn-scroll-top");

    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        btnScrollTop.style.display = "block";
    } else {
        btnScrollTop.style.display = "none";
    }
}

function scrollToTop() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
