<!doctype html>
<html lang="ru">
<head>
    {* Required meta tags *}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    {*https://google.github.io/material-design-icons/#icon-font-for-the-web*}
    {*https://material.io/tools/icons/?search=info&icon=shopping_cart&style=baseline*}
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    {* Bootstrap CSS *}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <link rel="stylesheet" href="{$templateWebPath}css/admin.css">

    <title>{$titlePage}</title>
</head>
<body>
<div class="container-fluid">
    <header class="header">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="/" title="go to shop">Shop</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/admin/home/">Home <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
                <div class="d-flex align-items-center text-white">
                    <i class="material-icons mr-2">exit_to_app</i>
                    <a href="/user/logout/" class="text-white">Logout</a>
                </div>
            </div>
        </nav>
    </header>
    <main class="main">
        <div class="row">

            {*Sidebar*}
            <div class="col-md-4 col-xl-3">
                {include file='sidebar-left.tpl'}
            </div>

            {*Main Content*}
            <div class="col-md-8 col-xl-9">

                <h1 class="h2 my-3" >{$titlePage}</h1>