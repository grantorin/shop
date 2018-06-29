<!doctype html>
<html lang="ru">
<head>
    {* Required meta tags *}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    {* Bootstrap CSS *}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <link rel="stylesheet" href="{$templateWebPath}css/style.css">

    <title>{$titlePage}</title>
</head>
<body>
<div class="container">
    <header class="header">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="/">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/page/1/">Contacts</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <main class="main mt-5">
        <div class="row">

            {*Sidebar*}
            <div class="col-lg-4">
                {include file='sidebar-left.tpl'}
            </div>

            {*Main Content*}
            <div class="col-lg-8">

                <h1 class="h2 mb-3" >{$titlePage}</h1>