    </div>
</div>

<!-- Scripts -->
{!! HTML::script(asset('https://use.fontawesome.com/ffe4b59639.js'), array('type' => 'text/javascript')) !!}
{!! HTML::script(asset('https://cdnjs.cloudflare.com/ajax/libs/vue/2.3.4/vue.min.js'), array('type' => 'text/javascript', 'integrity' => 'sha256-+J5cSgDOPu6OT8mt+r5f7/cmvICoEmNdK2ZGz8ql8wc=', 'crossorigin' => 'anonymous')) !!}
{!! HTML::script(asset('https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.6.7/tinymce.min.js'), array('type' => 'text/javascript', 'integrity' => 'sha256-m1XH51XIIl4SQhJSLOfGOa0oYpfnkVe5Fe4xZcCAOL0=', 'crossorigin' => 'anonymous')) !!}
{!! HTML::script(asset('https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.1.1/min/dropzone.min.js'), array('type' => 'text/javascript', 'integrity' => 'sha256-0dCrNKhVyiX4bBpScyU5PT/iZpxzlxjn2oyaR7GQutE=', 'crossorigin' => 'anonymous')) !!}
{!! HTML::script(asset('https://maps.googleapis.com/maps/api/js?key=AIzaSyB0WIdwnWTVKT7OHxkzCOBnlKTDlNonlzE'), array('type' => 'text/javascript')) !!}
{!! HTML::script(asset('/js/app.js'), array('type' => 'text/javascript')) !!}
@yield('addScripts')
</body>
</html>
