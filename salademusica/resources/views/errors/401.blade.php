@extends('errors::minimal')

@section('title', __('Sem Autorização'))
@section('code', '401')
@section('message', __('Sem Autorização.'))
@section('message_texto', __('Parece que você não tem autorização para entrar aqui 😥! Melhor voltar para página anterior...'))
