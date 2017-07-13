<!-- Scripts -->
{!! HTML::script(asset('https://cdnjs.cloudflare.com/ajax/libs/vue/2.3.4/vue.min.js'), array('type' => 'text/javascript', 'integrity' => 'sha256-+J5cSgDOPu6OT8mt+r5f7/cmvICoEmNdK2ZGz8ql8wc=', 'crossorigin' => 'anonymous')) !!}
{!! HTML::script(asset('https://unpkg.com/buefy@0.4.3'), array('type' => 'text/javascript')) !!}
{!! HTML::script(asset('js/app.js'), array('type' => 'text/css', 'rel' => 'stylesheet')) !!}
@yield('addScripts')
</body>
</html>