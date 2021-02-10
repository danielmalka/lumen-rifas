<!DOCTYPE html>
<html>
<head>
    <title>{{ env('APP_NAME') }}</title>
</head>
<body>
<h3>Obrigado, {{ $participanteNome }}</h3>
<p>Você acaba de se inscrever na rifa <b>{{ $rifaNome }}</b> e tem como valor para participar os itens abaixo:<br /><br /> {{ $valorRifa }}<br /><br />Responda este email com o comprovante do valor da Rifa ou entre em contato para confirmarmos sua participação.</p>

<p>Atenciosamente,<br />{{ env('MAIL_FROM_NAME') }}</p>
</body>
</html>
