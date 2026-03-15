{% extends 'base.html.twig' %}

{% block title %}Créer un compte{% endblock %}

{% block stylesheets %}
<style>
    .creer-wrapper {
        max-width: 500px;
        margin: 2rem auto;
        padding: 0 1rem;
        font-family: sans-serif;
    }

    .creer-title {
        font-size: 20px;
        font-weight: 600;
        color: #111;
        margin-bottom: 1.5rem;
    }

    .creer-card {
        background: #fff;
        border: 1px solid #e5e5e5;
        border-radius: 16px;
        padding: 1.5rem;
    }

    .form-group {
        margin-bottom: 1rem;
    }

    .form-group label {
        font-size: 13px;
        color: #666;
        display: block;
        margin-bottom: 4px;
    }

    .form-group input {
        width: 100%;
        padding: 8px 12px;
        border: 1px solid #d1d5db;
        border-radius: 8px;
        font-size: 14px;
        color: #111;
    }

    .form-footer {
        display: flex;
        justify-content: space-between;
        margin-top: 1.5rem;
    }

    .btn-save {
        padding: 8px 24px;
        font-size: 14px;
        border: none;
        border-radius: 8px;
        background: #2d6a4a;
        color: #fff;
        cursor: pointer;
    }

    .btn-save:hover { background: #3a7d5a; }

    .btn-cancel {
        padding: 8px 24px;
        font-size: 14px;
        border: 1px solid #d1d5db;
        border-radius: 8px;
        background: #fff;
        color: #111;
        text-decoration: none;
    }
</style>
{% endblock %}

{% block body %}
<div class="creer-wrapper">
    <p class="creer-title">Créer un compte {{ role == 'admin' ? 'administrateur' : 'utilisateur' }}</p>

    <div class="creer-card">
        <form method="POST">
            <div class="form-group">
                <label>Prénom</label>
                <input type="text" name="firstname" required>
            </div>
            <div class="form-group">
                <label>Nom</label>
                <input type="text" name="lastname" required>
            </div>
            <div class="form-group">
                <label>Pseudo</label>
                <input type="text" name="username" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" required>
            </div>
            <p style="font-size:12px;color:#aaa;margin-top:0.5rem;">
                Le mot de passe par défaut sera : <strong>CesiZen123</strong>
            </p>
            <div class="form-footer">
                <a href="{{ path('app_gestion_compte') }}" class="btn-cancel">Annuler</a>
                <button type="submit" class="btn-save">Créer le compte</button>
            </div>
        </form>
    </div>
</div>
{% endblock %}
