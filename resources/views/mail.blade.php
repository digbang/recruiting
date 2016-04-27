<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width"/>
    <link rel="stylesheet" href="css/foundation.css">
</head>

<body>
<!-- <style> -->
<table class="body">
    <tr>
        <td class="float-center" align="center" valign="top">
            <center>
                <table>
                    <tr>
                        <td><b>Nombre</b></td>
                        <td>{{ $name }}</td>
                    </tr>
                    <tr>
                        <td><b>Teléfono</b></td>
                        <td>{{ $phone }}</td>
                    </tr>
                    <tr>
                        <td><b>Email</b></td>
                        <td>{{ $email }}</td>
                    </tr>
                    <tr>
                        <td><b>CV</b></td>
                        <td>
                            @if($cvFol->isFile())
                                Attached
                            @else
                                {{ $cv }}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td><b>Mensaje</b></td>
                        <td>{{ $about }}</td>
                    </tr>
                    <tr>
                        <td><b>Portfolio</b></td>
                        <td>
                            @if($portfolio)
                            <ul>
                                @foreach($portfolio as $site => $url)
                                    @if($url)
                                        <li><b>{{ $site }}</b>&nbsp;&nbsp;&nbsp;&nbsp;{{ $url }}</li>
                                    @endif
                                @endforeach
                            </ul>
                            @endif
                        </td>
                    </tr>
                </table>
            </center>
        </td>
    </tr>
</table>
</body>
</html>