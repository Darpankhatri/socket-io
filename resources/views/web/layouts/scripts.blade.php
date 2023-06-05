

<script src="{{ asset('chat/js/vendor.js') }}"></script>
<script src="{{ asset('chat/js/template.js') }}"></script>


<!-- Theme mode -->
<script>
    $(document).ready(function () {
  // Will wait for everything on the page to load.
  $(window).bind('load', function () {
    $('.overlay, body').addClass('loaded');
    setTimeout(function () {
      $('.overlay').css({ 'display': 'none' })
    }, 2000)
  });

  // Will remove overlay after 1min for users cannnot load properly.
  setTimeout(function () {
    $('.overlay, body').addClass('loaded');
  }, 60000);
});
    if (localStorage.getItem('color-scheme')) {
        let scheme = localStorage.getItem('color-scheme');

        const LTCSS = document.querySelectorAll('link[class=css-lt]');
        const DKCSS = document.querySelectorAll('link[class=css-dk]');

        [...LTCSS].forEach((link) => {
            link.media = (scheme === 'light') ? 'all' : 'not all';
        });

        [...DKCSS].forEach((link) => {
            link.media = (scheme === 'dark') ? 'all' : 'not all';
        });
    }
</script>