document.addEventListener('DOMContentLoaded', function() {
    setTimeout(function() {
        document.getElementById('dragon').style.display = 'none';
        $('body').css({
            background: 'white'
        });
        document.getElementById('container').style.display = 'block';
    }, 1000);
});
