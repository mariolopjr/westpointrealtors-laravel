<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {!! HTML::style(asset('https://unpkg.com/buefy@0.4.0/lib/buefy.css'), array('type' => 'text/css', 'rel' => 'stylesheet')) !!}
</head>
<body>
<div id="root">
    <input type="text" id="input" v-model="message" />

    <p>The value is: @{{ message }}</p>

    <form action="">
        <b-field label="Name">
            <b-input value="John Silver"></b-input>
        </b-field>

        <b-field label="Email"
                 type="is-danger"
                 message="This email is invalid">
            <b-input type="email"
                     value="john@"
                     maxlength="30">
            </b-input>
        </b-field>

        <b-field label="Username"
                 type="is-success"
                 message="This username is available">
            <b-input value="johnsilver" maxlength="30"></b-input>
        </b-field>

        <b-field label="Password">
            <b-input type="password"
                     value="iwantmytreasure"
                     password-reveal>
            </b-input>
        </b-field>

        <b-field label="Message">
            <b-input maxlength="200" type="textarea"></b-input>
        </b-field>
    </form>

    <div id="content"></div>
</div>

{!! HTML::script(asset('https://cdnjs.cloudflare.com/ajax/libs/vue/2.3.4/vue.min.js'), array('type' => 'text/javascript', 'integrity' => 'sha256-+J5cSgDOPu6OT8mt+r5f7/cmvICoEmNdK2ZGz8ql8wc=', 'crossorigin' => 'anonymous')) !!}
{!! HTML::script(asset('https://unpkg.com/buefy@0.4.0'), array('type' => 'text/javascript')) !!}
<script>
    Vue.use(Buefy, {
        defaultIconPack: 'fa',
        defaultContentElement: '#content'
    });

    const app = new Vue({
        el: '#root',
        data: {
            message: 'Hello!'
        }
    });
</script>
</body>
</html>